<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
 //dsm($view);
?>
<?php print $wrapper_prefix; ?>
  <?php if (!empty($title)) : ?>
    <h3><?php print $title; ?></h3>
  <?php endif; ?>
  <div id="portfolio-horiz-scroll" class="everslider">
    <ul class="es-slides">
      <?php       
  
       for ($i=1; $i <= count($view->result) ; $i++) {   ?>
         
         
        <li class="<?php print $classes_array[$id]; ?>">
          <?php 
          
          if( $i != 2 && ( $i == 1 || ($i-1)%2 == 0 ) ): ?>
          
            <div style="width: 50%"><?php print $view->result[$i-1]->node_title; $i++; ?></div>
            <div style="width: 50%"><?php print $view->result[$i-1]->node_title; $i++; ?></div>
            <div style="width: 100%"><?php print $view->result[$i-1]->node_title; ?></div>          
          <?php else:  ?>
            
            <div style="width: 100%"><?php print $view->result[$i-1]->node_title; ?></div> 
            
          <?php endif; ?>
  
        </li>
      <?php } ?>
    </ul>
  </div>
<?php print $wrapper_suffix; ?>