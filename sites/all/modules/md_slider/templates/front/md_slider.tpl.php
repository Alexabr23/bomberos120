<?php
/**
 * @file: md-slider.tpl.php
 * User: Duy
 * Date: 1/29/13
 * Time: 3:01 PM
 */
?>
<div id="md-slider-<?php print $slider->slid;?>" class="md-slide-items" <?php print $data_properties;?>>
    <?php foreach ($slides as $index => $slide):?>
      <?php print theme('front_slide_render', array('index' => $index, 'slide' => $slide, 'slider_settings' => $slider->settings));?>
    <?php endforeach;?>
</div>

<?php
$megasliderjs = '(function($) {
      $(document).ready(function() {
          effectsIn = Drupal.settings.inEffects;
          effectsOut = Drupal.settings.outEffects;
          var options = Drupal.settings.md_slider_options_' . $slider->slid . ';
          $("#md-slider-' . $slider->slid . '").mdSlider(options);
      });
    })(jQuery);';
drupal_add_js($megasliderjs, 'inline');
?>
