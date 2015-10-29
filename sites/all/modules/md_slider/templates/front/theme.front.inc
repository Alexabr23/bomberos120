<?php
  /**
   * @file: theme.front.inc
   * User: Duy
   * Date: 1/29/13
   * Time: 4:18 PM
   */
  function template_preprocess_md_slider_render(&$variables) {
    $data_properties = array();
    $options = array();
    $slider = $variables['slider'];
    $variables['slides'] = MDSlide::get_by_slider_id($slider->slid);
    $settings = $slider->settings;

    # Create options for slider
    $options['fullwidth'] = (boolean)$settings['full_width'];
    $options['transitionsSpeed'] = $settings['transtime'];
    $options['width'] = $settings['width'];
    $options['height'] = $settings['height'];
    $options['enableDrag'] = (boolean)$settings['touch_swipe'];
    $options['responsive'] = (boolean)$settings['responsive'];
    if (isset($settings['loop']))
	  $options['loop'] = (boolean)$settings['loop'];
    else
      $options['loop'] = TRUE;
    $options['showLoading'] = ($settings['loadingbar'] != 'none') ? TRUE : FALSE;
    $options['loadingPosition'] = $settings['bar_position'];
    $options['showArrow'] = (boolean)$settings['show_next_prev_button'];
    $options['showBullet'] = (boolean)$settings['show_bullet'];
    $options['posBullet'] = $settings['bullet_position'];
    $options['showThumb'] = (boolean)$settings['show_thumbnail'];
    $options['posThumb'] = $settings['thumbnail_position'];
    $options['slideShowDelay'] = $settings['delay'];
    $options['slideShow'] = (boolean)$settings['auto_play'];
    $options['styleBorder'] = $settings['border_style'];
    $options['styleShadow'] = $settings['dropshadow_style'];
    if (isset($settings["videobox"]))
        $options["videoBox"] = (boolean)$settings["videobox"];
    else
        $options["videoBox"] = FALSE;

    drupal_add_js(array("md_slider_options_{$slider->slid}" => $options), 'setting');

    # Add google fonts
    $google_fonts = $settings['dmf_google'];
    if ($google_fonts != '' && !$settings['enable_font_css']) {
      drupal_add_css($google_fonts, array('type' => 'external'));
    }

    # Add data-thumb-width & data-thumb-height
    $data_properties[] = "data-thumb-width='{$settings['thumb_width']}'";
    $data_properties[] = "data-thumb-height='{$settings['thumb_height']}'";
    $variables['data_properties'] = implode(' ', $data_properties);

    # Create css class for layers
    md_slider_prepare_layers_class($slider->slid, $variables['slides']);
  }

  function template_preprocess_front_slide_render(&$variables) {
    $slide = $variables['slide'];
    $data_properties = array();
    $data_properties[] = "data-timeout='{$slide->settings['timelinewidth']}00'";

    // Add data transitions for slide
    if (!empty($slide->settings["transitions"]))
      $data_properties[] = 'data-transition="' . implode(",", $slide->settings["transitions"]) . '"';
    $variables['background_style'] = "";
    if ($slide->settings['background_image'] != -1) {
      # Load background image
      $background = file_load($slide->settings['background_image']);
      $create_bg_imgs = $variables['slider_settings']['create_bg_imgstyle'];
      if ($create_bg_imgs) {
        $variables['background_url'] = image_style_url('md_slider_' . $slide->slid . '_bg', $background->uri);
      } else {
        $variables['background_url'] = file_create_url($background->uri);
      }

      # Load thumbnail image
      if ($slide->settings['custom_thumbnail'] != -1) {
        $thumb = file_load($slide->settings['custom_thumbnail']);
      }
      else {
        $thumb = $background;
      }
      $thumb_url = image_style_url('md_slider_' . $slide->slid . '_thumb', $thumb->uri);
    }
    else {
      $variables['background_style'] = ' style="width: auto; height: auto; max-width: none"';
      $variables['background_url'] = file_create_url("public://md_slider_def_bg.jpg");
      if ($slide->settings['custom_thumbnail'] != -1) {
        $thumb = file_load($slide->settings['custom_thumbnail']);
        $thumb_url = image_style_url('md_slider_' . $slide->slid . '_thumb', $thumb->uri);
      }
      else {
        $thumb_url = image_style_url('md_slider_' . $slide->slid . '_thumb', "public://md_slider_def_bg.jpg");
      }
    }
    $data_properties[] = "data-thumb='{$thumb_url}'";

    $variables['data_properties'] = implode(' ', $data_properties);
    $variables['elements_height'] = $variables['slider_settings']['height'];
  }

  /**
   * Implements template_preprocess_hook for front_layers_render theme
   */
  function template_preprocess_front_layers_render(&$variables) {
    $layer = $variables['layer'];

    # Get image url for image layer
    if ($layer['type'] == 'image') {
      $layer['file_url'] = '';
      if (isset($layer['fileid'])) {
        $image = file_load($layer['fileid']);
        $layer['url'] = file_create_url($image->uri);
      }
    }


    if ($layer['type'] == 'video') {
      $layer['url'] = md_slider_generate_video_embeded_url($layer['fileid']);
    }

    $variables['data'] = process_element_data($layer);
    $variables['layer'] = (object)$layer;

    $class = array('md-object');
    if (isset($layer['style']) && $layer['style'] != 'none') {
      $class[] = $layer['style'];
    }
    $variables['class'] = implode(' ', $class);

    # Generate layer link
    if (isset($layer['link']) && is_array($layer['link'])) {
      $link = $layer['link'];
      if (strpos($link['value'], 'http') === FALSE)
        $variables["link"] = url($link['value'], array('absolute' => TRUE));
      else
          $variables["link"] = $link['value'];
    }
  }

  /**
   * Process data for elements
   */
  function process_element_data($element) {
    $type = $element['type'];
    $element_full = array_merge(MDCommon::$default_layers[$type], $element);
    $element_full['starttime'] = $element_full['starttime'];
    $element_full['stoptime'] = $element_full['stoptime'];

    $output = array();
    $output[] = "data-x='{$element_full['left']}'";
    $output[] = "data-y='{$element_full['top']}'";
    $output[] = "data-width='{$element_full['width']}'";
    $output[] = "data-height='{$element_full['height']}'";
    $output[] = "data-start='{$element_full['starttime']}'";
    $output[] = "data-stop='{$element_full['stoptime']}'";
    if ($element_full['startani'] != 'none' && $element_full['startani'] != '') {
      $output[] = "data-easein='{$element_full['startani']}'";
    }
    if ($element_full['stopani'] != 'none' && $element_full['stopani'] != '') {
      $output[] = "data-easeout='{$element_full['stopani']}'";
    }

    if (isset($element['paddingtop']) && $element['paddingtop'] > 0) {
      $output[] = "data-padding-top='{$element_full['paddingtop']}'";
    }

    if (isset($element['paddingbottom']) && $element['paddingbottom'] > 0) {
      $output[] = "data-padding-bottom='{$element['paddingbottom']}'";
    }

    if (isset($element['paddingleft']) && $element['paddingleft'] > 0) {
      $output[] = "data-padding-left='{$element['paddingleft']}'";
    }

    if (isset($element['paddingright']) && $element['paddingright'] > 0) {
      $output[] = "data-padding-right='{$element['paddingright']}'";
    }

    return implode(' ', $output);
  }

/**
 * Prepare class for layers
 */
function md_slider_prepare_layers_class($slid, &$slides) {
  foreach ($slides as $slide_index => $slide) {
    foreach ($slide->layers as $layer_index => &$layer) {
      if (isset($layer['style'])) {
        $layer['style'] = implode(' ', array($layer['style'], "md-layer-{$slid}-{$slide_index}-{$layer_index}"));
      }
      else {
        $layer['style'] = "md-layer-{$slid}-{$slide_index}-{$layer_index}";
      }
    }
  }
}
