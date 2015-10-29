
<?php 
/* Prepare varibles */ 

if(isset($node) && $node->type == 'page'){
  $page_layout = mym_field_get_value($node, 'field_page_layout');
  $show_header = mym_field_get_value($node, 'field_page_show_header');
  $subtitle = mym_field_get_value($node, 'field_page_subtitle');
  $show_breadcrumbs = mym_field_get_value($node, 'field_page_show_breadcrumbs');
  
  $page_titlebar_color = mym_field_get_value($node, 'field_title_bar_text_color');
  
  $page_bgcolor = mym_field_get_value($node, 'field_page_bgcolor');
  $page_bg_img = mym_field_get_value($node, 'field_header_bg_img', 'original');
  $page_header_bg_type = mym_field_get_value($node, 'field_page_header_background');
  
  $header_bg_style = "background-color: ". $page_bgcolor ."; 
                      background-image: url(". $page_bg_img ."); ";

  drupal_add_css('.titlebar {
                    background-color: '. $page_bgcolor .'; 
                    background-image: url('. $page_bg_img .');
                  }  
                  .titlebar,
                  .titlebar .title,
                  .breadcrumbs, 
                  .breadcrumbs a, 
                  .breadcrumbs > .current a { color: '. $page_titlebar_color .'; }'
                  
                  , array('group' => CSS_THEME, 'type' => 'inline'));
}else{  
  //!TODO Dynimaze it
  $page_layout = 1;
  $show_header = 1;
  $show_breadcrumbs = 1;
  $page_header_bg_type = "color";
  
  //$node = node_load(28); ///////////////!\\\\\\\\\\\\\\\\\\\\\  
  $page_bgcolor = '#E8E9EA';
  $page_bg_img = '';                      
  drupal_add_css('.titlebar {
                    background-color: '. $page_bgcolor .'; 
                    background-image: url('. $page_bg_img .');
                  }'                  
                  , array('group' => CSS_THEME, 'type' => 'inline'));
}

// is the breadcrumbs is hidden so add paading to the bottom of title bar
if($show_breadcrumbs != 1 && empty($subtitle) && $show_header == 1) {
  drupal_add_css('.titlebar { padding-bottom: 35px; }'                
                , array('group' => CSS_THEME, 'type' => 'inline'));
}elseif(empty($subtitle) && $show_header == 1) {
  drupal_add_css('.titlebar { padding-bottom: 15px; }'                
                , array('group' => CSS_THEME, 'type' => 'inline'));
}
?>


  
<?php if($show_header == 1 && $title): ?>
  <section class="titlebar <?php if($page_header_bg_type == "image") print " with-bg "; ?>">
    <div class="row">
      <div class="large-8 columns"> 
        <?php if ($title): ?>
          <?php print render($title_prefix); ?>
          <h1 id="page-title" class="title"><?php print $title; ?></h1>
          <?php print render($title_suffix); ?>
        <?php endif; ?>
        
        <?php if (!empty($subtitle)): ?>
          <p id="page-subtitle" class="subtitle"><?php print $subtitle; ?></p>
        <?php endif; ?>
      </div> 
      <div class="large-4 columns m-t-50">
        <?php if($show_breadcrumbs == 1): ?>
          <?php print $breadcrumb; ?>
        <?php endif; ?>
      </div>   
    </div>
  </section> 
<?php endif; ?>