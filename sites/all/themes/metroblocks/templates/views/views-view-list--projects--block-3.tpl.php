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
  function get_uniq_img($row, $preset, $height, $img_pos = 0){
     $imagestyle = '';
    (!image_style_load($preset)) ? $imagestyle = 'thumbnail' : $imagestyle = $preset; 
    $img_src = image_style_url($imagestyle, $row->field_field_images[$img_pos]['rendered']['#item']['uri']);
    
    return  "<img src=". $img_src. " />";
  }
  
  function get_img($row, $preset, $height, $nid, $img_pos = 0){
    return l(get_uniq_img($row, $preset, $height, $img_pos), "node/".$nid, array('html' => TRUE));
  }
  
  function get_flipper($row, $preset, $height, $nid){
    $output = '';
    if( isset($row->field_field_images[1]) ){
      $output .= '<div class="flip-container" ontouchstart="this.classList.toggle(\'hover\');">
                  <div class="flipper">
                    <div class="front-face">';
      $output .=       get_img( $row, $preset, $height, $nid );
      $output .=    '</div>
                    <div class="back-face">';
      $output .=       get_img( $row, $preset, $height, $nid, 1 );
      $output .=     '</div>
                  </div>
               </div>';
    }else{
      $output = get_img( $row, $preset, $height, $nid );
    }
    
    return $output;
  }
   ?>
  
 
<div class="row boxes">  
  <div class="large-6 columns p-0-r-8 p-0-l-8"> 
    <div class="large-12 columns p-0">    
      <div class="box text-center">
         <h2><?php print $view->display[$view->current_display]->display_options['title'] ?></h2>
         <p style="color: #777;"><?php if( isset($view->display[$view->current_display]->display_options['header']) &&
                      isset($view->display[$view->current_display]->display_options['header']['area']) &&
                      isset($view->display[$view->current_display]->display_options['header']['area']['content']) ){
                        
                        print $view->display[$view->current_display]->display_options['header']['area']['content'];

                      }
            ?></p>
      </div>  
    </div> 
    <div class="large-12 columns p-0">  
      <div class="box">
        <?php print get_flipper( $view->result[6], '680x172', 243, $view->result[6]->nid ); ?>
         <div class="box-txt color-1"><?php print l($view->result[6]->node_title, "node/".$view->result[6]->nid); ?></div>
      </div> 
    </div>   
    <div class="large-12 columns p-0"> 
      <div class="box">
        <?php print get_flipper( $view->result[1], '680x172', 243, $view->result[1]->nid ); ?> 
       <div class="box-txt color-2"><?php print l($view->result[1]->node_title, "node/".$view->result[1]->nid); ?></div>
      </div>
    </div>  
  </div> 
  
  <div class="large-6 columns"> 
    <div class="row">  
      <div class="large-12 columns p-0-r-8 p-0-l-8">  
        <div class="box">
          <?php print get_flipper( $view->result[2], '680x172', 243, $view->result[2]->nid ); ?>  
          <div class="box-txt color-3"><?php print l($view->result[2]->node_title, "node/".$view->result[2]->nid); ?></div>
        </div>
      </div>   
      <div class="large-6 columns p-0-r-8 p-0-l-8">
        <div class="box">  
          <?php print get_flipper( $view->result[3], '360x486', 243, $view->result[3]->nid ); ?>
          <div class="box-txt color-4"><?php print l($view->result[3]->node_title, "node/".$view->result[3]->nid); ?></div>  
        </div>
      </div>   
      <div class="large-6 columns p-0-r-8 p-0-l-8">  
        <div class="box">
          <?php print get_flipper( $view->result[4], '360x486', 243, $view->result[4]->nid ); ?> 
          <div class="box-txt color-5"><?php print l($view->result[4]->node_title, "node/".$view->result[4]->nid); ?></div>  
        </div>
      </div>      
      <div class="large-12 columns p-0-r-8 p-0-l-8">  
        <div class="box">           
          <?php print get_flipper( $view->result[5], '680x172', 243, $view->result[5]->nid ); ?>
          <div class="box-txt color-2"><?php print l($view->result[5]->node_title, "node/".$view->result[5]->nid); ?></div>   
        </div>
      </div> 
    </div>
  </div> 
</div>