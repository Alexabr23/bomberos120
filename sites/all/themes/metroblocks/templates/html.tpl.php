<?php

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 */
?>
<!DOCTYPE html>
<!-- Sorry no IE7 support! -->
<!-- @see http://foundation.zurb.com/docs/index.html#basicHTMLMarkup -->

<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>




  <!-- Congifuration Panel -->
<div class="styleswitcher-contener">
    <div style="left: 0px;" class="styleswitcher">
      <div class="selector"><i class="fa fa-cog"></i></div>
      
      <div class="title-styleswitcher ">Page Layout</div>
      <div class="switch small round">
        <input id="z" name="switch-layout" type="radio" value="boxed">
        <label for="z" onclick="">Boxed</label>
        <input id="z1" name="switch-layout" type="radio" checked value="full">
        <label for="z1" onclick="">Full</label>
        <span></span>
      </div>
      <hr>
      <div class="title-styleswitcher ">Color Scheme</div>
      <div class="switch small round">
        <input id="z" name="switch-color" type="radio" value="black">
        <label for="z" onclick="">Black</label>
        <input id="z1" name="switch-color" type="radio" checked value="white">
        <label for="z1" onclick="">White</label>
        <span></span>
      </div>
      <!--<select class="width-switcher">
        <option class="width_940" value="940">940px width</option>
        <option class="width_1024" value="1024">1024px width</option>
        <option class="width_1170" value="1170">1170px width</option>
        <option class="wide">Full width</option>
      </select> -->
    </div>
  </div>

  <!-- Preloader -->
  <div id="preloader">
      <div id="status">&nbsp;</div>
  </div>
  
  <div class="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  <?php print _zurb_foundation_add_reveals(); ?>
  <script>
    (function ($, Drupal, window, document, undefined) {
      $(document).foundation();
     })(jQuery, Drupal, this, this.document); 
     
     (function ($, Drupal, window, document, undefined) {
      //<!-- Preloader -->
      $(window).load(function() { // makes sure the whole site is loaded
          $('#status').fadeOut(); // will first fade out the loading animation
          $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
          $('body').delay(350).css({'overflow':'visible'});
      });
      
    })(jQuery, Drupal, this, this.document);
  </script>
  

</body>
</html>
