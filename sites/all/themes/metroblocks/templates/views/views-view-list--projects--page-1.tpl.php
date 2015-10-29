<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
 
  $portfolio_columns = theme_get_setting('portfolio-columns');
  $portfolio_columns =  '3';
  $portfolio_columns = "large-block-grid-" . $portfolio_columns;
  
  $mobile_portfolio_columns = theme_get_setting('mobile-portfolio-columns');
  $mobile_portfolio_columns = isset($mobile_portfolio_columns) ?  $mobile_portfolio_columns : '1';
  $mobile_portfolio_columns = "small-block-grid-" . $mobile_portfolio_columns;
  
?>
<?php print $wrapper_prefix; ?>
  <?php if (!empty($title)) : ?>
    <h3><?php print $title; ?></h3>
  <?php endif; ?>
  <ul class="portfolio-items medium-block-grid-2 <?php print $portfolio_columns . ' ' . $mobile_portfolio_columns; ?>"> 
    <?php foreach ($rows as $id => $row): ?>
      <li class="<?php print $classes_array[$id]; ?>"><?php print $row; ?></li>
    <?php endforeach; ?>
  </ul> 
<?php print $wrapper_suffix; ?>