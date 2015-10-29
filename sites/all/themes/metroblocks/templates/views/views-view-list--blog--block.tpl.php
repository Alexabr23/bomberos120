<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
?>
<?php //if (!empty($title)) : ?>
  <h3><?php print $title; ?></h3>
<?php //endif; ?>
  
  
  
  <?php 
  function get_uniq_img_($row, $preset, $height){
     $imagestyle = '';
    (!image_style_load($preset)) ? $imagestyle = 'thumbnail' : $imagestyle = $preset; 
    $img_src = image_style_url($imagestyle, $row->field_field_blog_image[0]['rendered']['#item']['uri']);
    
    return  "<img src=". $img_src. " />";
  }
  
  function get_img_($row, $preset, $height, $nid){
    return l(get_uniq_img_($row, $preset, $height), "node/".$nid, array('html' => TRUE));
  }
   ?>
  

<?php $rows_size = 3; ?>
<?php //foreach ($rows as $id => $row): ?>
  <div class="row unique-d squares" style="padding: 0px;">
    
    <div class="large-4 columns  square-row square-bottom  color-4" style="padding: 0px; height: 486px;">    
      <div class="square-txt color-4">
        <span class="arrow">&nbsp;</span>
        <h2><?php print l($view->result[0]->node_title, "node/".$view->result[0]->nid); ?></h2>
        <div class="post_text"><?php print substr( mym_field_get_value($view->result[0]->nid, 'body'),0, 170 ); ?>...</div>
        <div class="post-read-more right"><?php print l("Read more", "node/".$view->result[0]->nid) ?> </div>
      </div>
      <div class="square-img"><i class="fa fa-plus"></i><?php print get_img_( $view->result[0], '360x486', 486, $view->result[0]->nid ); ?></div> 
    </div>
    
    <div class="large-8 columns  p-0 m-0"  style="padding: 0px;">   
       
      <div class="row square-row square-left color-5"  style="min-height: 243px;">
        <div class="square-txt color-5">
          <span class="arrow">&nbsp;</span>
          <h2><?php print l($view->result[1]->node_title, "node/".$view->result[1]->nid);  ?></h2>
          <div class="post_text"><?php print substr( mym_field_get_value($view->result[1]->nid, 'body'),0, 190 ); ?>...</div>
          <div class="post-read-more right"><?php print l("Read more", "node/".$view->result[1]->nid) ?> </div>
        </div>
        <div class="square-img"><i class="fa fa-plus"></i><?php print get_img_( $view->result[1], '465x243', 243, $view->result[1]->nid ); ?></div>
      </div>
      
      <div class="row square-row square-right color-3" style="min-height: 243px;">
        <div class="square-img"><i class="fa fa-plus"></i><?php print get_img_( $view->result[2], '465x243', 243, $view->result[2]->nid ); ?></div>
        <div class="square-txt color-3">
          <span class="arrow">&nbsp;</span>
          <h2><?php print l($view->result[2]->node_title, "node/".$view->result[2]->nid); ?></h2>
          <div class="post_text"><?php print substr( mym_field_get_value($view->result[2]->nid, 'body'),0, 190 ); ?>...</div>
          <div class="post-read-more right"><?php print l("Read more", "node/".$view->result[2]->nid) ?> </div>
        </div>
      </div>  
        
    </div>
  </div>
<?php //endforeach; ?>