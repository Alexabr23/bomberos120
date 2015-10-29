<?php
global $base_url;
define('THEME_ROOT', $base_url .'/'. drupal_get_path('theme', 'metroblocks'));


function metroblocks_form_alter(&$form, &$form_state, $form_id) {
  dsm($form);
   switch ($form_id) {
    case 'system_theme_settings':

      $form['theme_settings_general'] = array(
        '#type' => 'vertical_tabs',
      );

      $form_elements = element_children($form);
      foreach ($form_elements as $element) {

        if ( isset($form[$element]['#type'])
              && $form[$element]['#type'] == 'fieldset'
              && !isset($form['#element']['#group'])) {
          $form[$element]['#group'] = 'theme_settings_general';
          $form[$element]['#attached'] = array(
            'js' => array(drupal_get_path('module', 'themesettings_verticaltabs') . '/themesettings_verticaltabs.js'),
          );
        }
      }

      // extra submit callback
      array_unshift($form['#submit'], '_themesettings_verticaltabs_submit');

      // remove unnecessary CSS class, fixes whitespace problem
      unset($form['logo']['#attributes']['class']);
  }
}

/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @param $form
 *   The form.
 * @param $form_state
 *   The form state.
 */
function metroblocks_form_system_theme_settings_alter(&$form, &$form_state) {
    if( !isset($form['form_id']['#id']) ){
    // add function to submit process
    $form['#submit'][] = 'metroblocks_form_system_theme_settings_submit';
    
    // CSS file
    drupal_add_css(drupal_get_path('theme', 'metroblocks') . '/css/theme-settings.css');
    
    /*unset($form['zurb_foundation']['topbar']);
    unset($form['zurb_foundation']['styles_scripts']);
    unset($form['zurb_foundation']['topbar']);*/
  
    /////////////////////////////////////////// Container General settings tab ///////////////////////////////////////////  
    // show general settings in the top
    $form['zurb_foundation']['general']["#weight"] = -8;
    
    $layout = array(
      0 => t('<span class="bg_0"></span>Full Width Layout'), 
      1 => t('<span class="bg_1"></span>Boxed Layout'), 
    );
    $layout_width = theme_get_setting('layout_width');
    $form['zurb_foundation']['general']['layout_width'] = array(
      '#type' => 'radios',
      '#title' => t('Page Layout'),
      '#default_value' => isset($layout_width) ? $layout_width : 0,
      '#options' => $layout,
      '#weight' => -12,
    );
    
    $layout_s = array(
      0 => t('<span class="bg_0"></span>White Layout'), 
      1 => t('<span class="bg_1"></span>Black Layout'), 
    );
    $layout_color = theme_get_setting('layout-color');
    $form['zurb_foundation']['general']['layout-color'] = array(
      '#type' => 'radios',
      '#title' => t('Layout Scheme'),
      '#default_value' => isset($layout_color) ? $layout_color : 0,
      '#options' => $layout_s,
      '#weight' => -11,
    );
    
    
    
    
    $font_family  = theme_get_setting('font_family');
    $form['zurb_foundation']['general']['font_family'] = array(
      '#type' => 'select',
      '#title' => t('Font family to used on body/paragraphs'),
      '#options' => array(
        'Arvo, serif' => 'Arvo',
        'Copse, sans-serif' => 'Copse',
        'Droid Sans, sans-serif' => 'Droid Sans',
        'Droid Serif, serif' => 'Droid Serif',
        'Lobster, cursive' => 'Lobster',
        'Nobile, sans-serif' => 'Nobile',
        'Open Sans, sans-serif' => 'Open Sans',
        'Oswald, sans-serif' => 'Oswald',
        'Pacifico, cursive' => 'Pacifico',
        'Rokkitt, serif' => 'Rokkit',
        'PT Sans, sans-serif' => 'PT Sans',
        'Quattrocento, serif' => 'Quattrocento',
        'Raleway, cursive' => 'Raleway',
        'Titillium Web, sans-serif'  => 'Titillium Web',
        'Ubuntu, sans-serif' => 'Ubuntu',
        'Yanone Kaffeesatz, sans-serif' => 'Yanone Kaffeesatz'
      ),
      '#default_value' => !empty($font_family) ? theme_get_setting('font_family') : 'Titillium Web',
      '#description' => t('Default font family to used on body/paragraphs.'),
      '#weight' => -10,
    );
    
    $h_font_family = theme_get_setting('h_font_family');      
    $form['zurb_foundation']['general']['h_font_family'] = array(
      '#type' => 'select',
      '#title' => t('Font family to used on Titles'),
      '#options' => array(
        'Arvo, serif' => 'Arvo',
        'Copse, sans-serif' => 'Copse',
        'Droid Sans, sans-serif' => 'Droid Sans',
        'Droid Serif, serif' => 'Droid Serif',
        'Lobster, cursive' => 'Lobster',
        'Nobile, sans-serif' => 'Nobile',
        'Open Sans, sans-serif' => 'Open Sans',
        'Oswald, sans-serif' => 'Oswald',
        'Pacifico, cursive' => 'Pacifico',
        'Rokkitt, serif' => 'Rokkit',
        'PT Sans, sans-serif' => 'PT Sans',
        'Quattrocento, serif' => 'Quattrocento',
        'Raleway, cursive' => 'Raleway',
        'Titillium Web, sans-serif'  => 'Titillium Web',
        'Ubuntu, sans-serif' => 'Ubuntu',
        'Yanone Kaffeesatz, sans-serif' => 'Yanone Kaffeesatz'
      ),
      '#default_value' => !empty($h_font_family) ? $h_font_family : 'Titillium Web',
      '#description' => t('Default font family to used on h1/h2/h3/h4/h5/h6.'),
      '#weight' => -9,
    );
    
    $fontsize = theme_get_setting('fontsize');
    $form['zurb_foundation']['general']['fontsize'] = array(
      '#type' => 'textfield',
      '#title' => t('Default font-size (used all over the site)'),
      '#default_value' => !empty($fontsize) ? $fontsize : '16',
      '#description' => t('This is the default font size used in pages/articles.. etc. (Use just numbers without px)'),
      '#weight' => -8,
      '#size'=> 15,
      '#maxlength' => 3, 
    );
    
    /////////////////////////////////////////// Title Bar Settings ///////////////////////////////////////////
    /*$form['zurb_foundation']['titlebar'] = array(
      '#type' => 'fieldset',
      '#title' => t('Page Title Bar settings'),
      '#weight' => -2,
    );    
    
    $field_bases['zurb_foundation']['titlebar']['field_page_bgcolor'] = array(
      '#type' => 'color_field_rgb',
      '#title' => 'field_page_bgcolor',
    );    
    $form['zurb_foundation']['titlebar']['titlebars'] = array(
      '#type' => 'fieldset',
      '#title' => t('Page Title Bar settingssssssssssss'),
      '#weight' => -2,
    ); */
    
    /////////////////////////////////////////// Homepage Container fieldset ///////////////////////////////////////////
    /*$form['zurb_foundation']['homepage'] = array(
      '#type' => 'fieldset',
      '#title' => t('Backgrounds settings'),
      '#weight' => -2,
    );
   
    // Default path for image
    $bg_path = theme_get_setting('bg_path');
    if (file_uri_scheme($bg_path) == 'public') {
      $bg_path = file_uri_target($bg_path);
      $br_url  = file_create_url($bg_path);
    }
    
    //prepar background image preveiw url   
    // if '300x200' image stype didn't exit so use 'thumbnail' style
    $imagestyle = '';
    (!image_style_load('280x160')) ? $imagestyle = 'thumbnail' : $imagestyle = '280x160'; 
    
    global $base_url;
    $default_img_src = $base_url ."/". drupal_get_path('theme', 'asafou')."/images/cyan_laptop_.jpg";
    // set the default backgound if the path is null 
    if(empty($bg_path)){
      global $base_url;
      $img_src = $default_img_src;
    }else{
      $img_src = image_style_url($imagestyle, theme_get_setting('bg_path'));
    }
    
    // show a previw of the selected image
    $form['zurb_foundation']['homepage']['bg_preview'] = array(
      '#markup' => "<div class='right'><img src='". $img_src."' /></div>",
    );
   
    // Helpful text showing the file name, disabled to avoid the user thinking it can be used for any purpose.
    $form['zurb_foundation']['homepage']['bg_path'] = array(
      '#type' => 'textfield',
      '#title' => 'Path to homepage background image',
      '#default_value' => $bg_path,
      '#disabled' => TRUE,
    );
  
    // Upload field
    $form['zurb_foundation']['homepage']['bg_upload'] = array(
      '#type' => 'file',
      '#title' => 'Upload homepage background image',
      '#description' => 'Upload a new image for the background.',
    );
   
    // Default path for image
    $bg_path_2 = theme_get_setting('bg_path_2');
    if (file_uri_scheme($bg_path_2) == 'public') {
      $bg_path_2 = file_uri_target($bg_path_2);
      $br_url  = file_create_url($bg_path_2);
    }
  
    //prepar background image preveiw url   
    // if '300x200' image stype didn't exit so use 'thumbnail' style
    (!image_style_load('280x160')) ? $imagestyle = 'thumbnail' : $imagestyle = '280x160'; 
    
    if(empty($bg_path_2)){
      $img_src = $default_img_src;
    }else{
      $img_src = image_style_url($imagestyle, theme_get_setting('bg_path_2'));
    }  
    // show a previw of the selected image
    $form['zurb_foundation']['homepage']['bg_preview_2'] = array(
      '#markup' => "<div class='right' style='clear: both;'><img src='". $img_src ."' /></div>",
    );
   
    // Helpful text showing the file name, disabled to avoid the user thinking it can be used for any purpose.
    $form['zurb_foundation']['homepage']['bg_path_2'] = array(
      '#type' => 'textfield',
      '#title' => 'Path to internal pages background image',
      '#default_value' => $bg_path_2,
      '#disabled' => TRUE,
    );
    // Upload field
    $form['zurb_foundation']['homepage']['bg_upload_2'] = array(
      '#type' => 'file',
      '#title' => 'Upload internal pages background image',
      '#description' => 'Upload a new image for the background.',
    );*/
      
    /////////////////////////////////////////// Social Icons Container fieldset ///////////////////////////////////////////  
    $form['zurb_foundation']['social_icones'] = array(
      '#type' => 'fieldset',
      '#title' => t('Social Icons'),
      '#weight' => -1,
    );  
  
    $form['zurb_foundation']['social_icones']['twitter'] = array(
      '#type' => 'textfield',
      '#title' => t('Link to your Tiwitter profile'),
      '#default_value' => theme_get_setting('twitter'),
    );  
    $form['zurb_foundation']['social_icones']['facebook'] = array(
      '#type' => 'textfield',
      '#title' => t('Link to your Facebook page'),
      '#default_value' => theme_get_setting('facebook'),
    );
    $form['zurb_foundation']['social_icones']['flickr'] = array(
      '#type' => 'textfield',
      '#title' => t('Link to your Flickr page'),
      '#default_value' => theme_get_setting('flickr'),
    ); 
    $form['zurb_foundation']['social_icones']['googleplus'] = array(
      '#type' => 'textfield',
      '#title' => t('Link to your Google Plus profile'),
      '#default_value' => theme_get_setting('googleplus'),
    );
    $form['zurb_foundation']['social_icones']['vimeo'] = array(
      '#type' => 'textfield',
      '#title' => t('Link to your Vimeo profile'),
      '#default_value' => theme_get_setting('vimeo'),
    );  
    $form['zurb_foundation']['social_icones']['github'] = array(
      '#type' => 'textfield',
      '#title' => t('Link to your Github profile'),
      '#default_value' => theme_get_setting('github'),
    ); 
    $form['zurb_foundation']['social_icones']['pinterest'] = array(
      '#type' => 'textfield',
      '#title' => t('Link to your Pinterest profile'),
      '#default_value' => theme_get_setting('pinterest'),
    ); 
    $form['zurb_foundation']['social_icones']['dribble'] = array(
      '#type' => 'textfield',
      '#title' => t('Link to your Dribble profile'),
      '#default_value' => theme_get_setting('dribble'),
    );  
    $form['zurb_foundation']['social_icones']['linkedin'] = array(
      '#type' => 'textfield',
      '#title' => t('Link to your Linkedin profile'),
      '#default_value' => theme_get_setting('linkedin'),
    );  
    
    
    /////////////////////////////////////////// Portfolio Container fieldset ///////////////////////////////////////////
    $form['zurb_foundation']['portfolio'] = array(
      '#type' => 'fieldset',
      '#title' => t('Portfolio settings'),
      '#weight' => -1,
    );    
    $form['zurb_foundation']['portfolio']['portfolio-columns'] = array(
      '#type' => 'select',
      '#title' => t('Portfolio Columns on disktop'),
      '#options' => array(
        '3' => t('3 Column'),
        '4'  => t('4 Column'),
        '5'  => t('5 Column'),
      ),
      '#default_value' => theme_get_setting('portfolio-columns'),
    );
    $form['zurb_foundation']['portfolio']['mobile-portfolio-columns'] = array(
      '#type' => 'select',
      '#title' => t('Portfolio Columns on mobile devices '),
      '#options' => array(
        '1'   => t('1 Column'),
        '2'   => t('2 Column'),
        '3'   => t('3 Column'),
        '4'  => t('4 Column'),
      ),
      '#default_value' => theme_get_setting('mobile-portfolio-columns'),
    );  
     
  }
}

function metroblocks_form_system_theme_settings_submit(&$form, &$form_state) {
  $settings = array();
  // Get the previous value
  $previous = 'public://' . $form['zurb_foundation']['homepage']['bg_path']['#default_value'];
 
  $file = file_save_upload('bg_upload');
  if ($file) {
    $parts = pathinfo($file->filename);
    $destination = 'public://' . $parts['basename'];
    $file->status = FILE_STATUS_PERMANENT;
   
    if(file_copy($file, $destination, FILE_EXISTS_REPLACE)) {
      $_POST['bg_path'] = $form_state['values']['bg_path'] = $destination;
      // If new file has a different name than the old one, delete the old
      if ($destination != $previous) {
        drupal_unlink($previous);
      }
    }
  } else {
    // Avoid error when the form is submitted without specifying a new image
    $_POST['bg_path'] = $form_state['values']['bg_path'] = $previous;
  }
  
  // Get the previous value
  $previous = 'public://' . $form['zurb_foundation']['homepage']['bg_path_2']['#default_value'];
 
  $file = file_save_upload('bg_upload_2');
  if ($file) {
    $parts = pathinfo($file->filename);
    $destination = 'public://' . $parts['basename'];
    $file->status = FILE_STATUS_PERMANENT;
   
    if(file_copy($file, $destination, FILE_EXISTS_REPLACE)) {
      $_POST['bg_path_2'] = $form_state['values']['bg_path_2'] = $destination;
      // If new file has a different name than the old one, delete the old
      if ($destination != $previous) {
        drupal_unlink($previous);
      }
    }
  } else {
    // Avoid error when the form is submitted without specifying a new image
    $_POST['bg_path_2'] = $form_state['values']['bg_path_2'] = $previous;
  }
  
}  


/**
* Implementation of hook_preprocess_page().
*//*
function asafou_preprocess_page(&$variables) {
  $settings = theme_get_setting('asafou');
  if (!empty($settings['header_image_path'])) {
    $vars['header_image_path'] = $settings['header_image_path'];
  }
  else {
    $variables['header_image_path'] = path_to_theme().'/head.jpg';
  }
}*/

