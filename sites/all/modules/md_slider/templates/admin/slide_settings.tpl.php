<?php
/**
 * @file: slide_settings.tpl.php
 * @author: Duynv
 * Date: 7/26/13
 */
?>
<div id='slide-setting-dlg' title="Slide setting">
  <div class="cuteslider-popup clearfix">
    <div id="slide-setting-tabs" class="cs-popup-tabs clearfix">
      <div class="slide-setting clearfix">
        <h3>Slide settings</h3>
        <div class="choose-image">
          <a class="slide-choose-image-link" href="#">[Choose image]</a>
          <div id="slide-background-preview"></div>
        </div>
        <input type="hidden" id="slide-backgroundimage">
        <div class="choose-thumbnail">
          <a class="slide-choose-thumbnail-link" href="#">[Choose thumbnail]</a>
          <div id="slide-thumbnail-preview"></div>
        </div>
        <input type="hidden" id="slide-thumbnail">
      </div><!-- / .slide-setting -->
      <div class="transition">
        <h3>Transitions <a href="#" class="random-transition">Choose random</a></h3>
        <p>You can select multiple value, slide will take random effect form what you selected. You have to choose 3D and 2D effects, 2D effects will be using in old browsers that do not support 3D transitions.</p>
        <div id="navbar-content-transitions" class="transition-inner">
          <?php $transitions = array(
            'slit-horizontal-left-top' => "Slit horizontal left top",
            'slit-horizontal-top-right' => "Slit horizontal top right",
            'slit-horizontal-bottom-up' => "Slit horizontal bottom up",
            'slit-vertical-down' => "Slit vertical down",
            'slit-vertical-up' => "Slit vertical up",
            'strip-up-right' => "Strip up right",
            'strip-up-left' => "Strip up left",
            'strip-down-right' => "Strip down right",
            'strip-down-left' => "Strip down left",
            'strip-left-up' => "Strip left up",
            'strip-left-down' => "Strip left down",
            'strip-right-up' => "Strip right up",
            'strip-right-down' => "Strip right down",
            'strip-right-left-up' => "Strip right left up",
            'strip-right-left-down' => "Strip right left down",
            'strip-up-down-right' => "Strip up down right",
            'strip-up-down-left' => "Strip up down left",
            'left-curtain' => "Left curtain",
            'right-curtain' => "Right curtain",
            'top-curtain' => "Top curtain",
            'bottom-curtain' => "Bottom curtain",
            'slide-in-right' => "Slide in right",
            'slide-in-left' => "Slide in left",
            'slide-in-up' => "Slide in up",
            'slide-in-down' => "Slide in down",
            'fade'  => "Fade"
          ) ?>
          <div id="navbar-content" class="navbar-content navbar-content-tr clearfix">
            <ul class="columns unstyled">
              <?php foreach($transitions as $key => $transition): ?>
                <li><input type="checkbox" id="transitions_<?php echo $key?>" value="<?php echo $key ?>"/><label for="transitions_<?php echo $key?>"><?php echo $transition ?></label></li>
              <?php endforeach;?>
            </ul>
          </div>
        </div>
        <div id="md-tooltip" class="tooltip" style="display: none;">
          <div class="md-slide-wrap">
            <div class="md-slide-items" id="md-slider">
              <div class="md-slide-item" data-timeout="2000">
                <div class="md-mainimg"><img src="<?php print file_create_url(drupal_get_path('module', 'md_slider') . '/js/preview_transition/img/1.jpg');?>" style="top:0; left:0;"  /></div>
                <div class="md-objects">

                </div>
              </div>
              <div class="md-slide-item" data-timeout="2000" style="display: none;">
                <div class="md-mainimg"><img src="<?php print file_create_url(drupal_get_path('module', 'md_slider') . '/js/preview_transition/img/2.jpg');?>" style="top:0; left:0;"  /></div>
                <div class="md-objects">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- / .transitions -->

    </div><!-- / .cs-popup-tabs -->
  </div>
</div>