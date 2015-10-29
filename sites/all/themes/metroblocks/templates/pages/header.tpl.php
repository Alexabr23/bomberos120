<!--.page -->
<div role="document" class="page">

  <!--.l-header region -->
  <header role="banner" class="l-header">
    
    <?php //if (!empty($page['header_top_left']) || !empty($page['header_top_right'])): ?>
      <div class="header-top hide-for-small">
        <div class="row">
          <div class="large-6 columns header_top_left">
            <ul class="social-icons accent inline-list">
              <?php if( !empty($flickr) ): ?>
                <li class="flickr"><a href="<?php print $flickr; ?>"><i class="fa fa-flickr"></i></a></li>
              <?php endif; ?>
              <?php if( !empty($facebook) ): ?>
                <li class="facebook"><a href="<?php print $facebook; ?>"><i class="fa fa-facebook"></i></a></li>
              <?php endif; ?>
              <?php if( !empty($google_plus) ): ?>
                <li class="google_plus"><a href="<?php print $google_plus; ?>"><i class="fa fa-google-plus"></i></a></li>
              <?php endif; ?>
              <?php if( !empty($twitter) ): ?>
                <li class="twitter"><a href="<?php print $twitter; ?>"><i class="fa fa-twitter"></i></a></li>
              <?php endif; ?>
              <?php if( !empty($vimeo) ): ?>
                <li class="vimeo"><a href="<?php print $vimeo; ?>"><i class="fa fa-vimeo-square"></i></a></li>
              <?php endif; ?>
              <?php if( !empty($github) ): ?>
                <li class="github"><a href="<?php print $github; ?>"><i class="fa fa-github"></i></a></li>
              <?php endif; ?>             
              <?php if( !empty($pinterest) ): ?>
                <li class="pinterest"><a href="<?php print $pinterest; ?>"><i class="fa fa-pinterest"></i></a></li>
              <?php endif; ?>
              <?php if( !empty($dribble) ): ?>
                <li class="dribbble"><a href="<?php print $dribble; ?>"><i class="fa fa-dribbble"></i></a></li>
              <?php endif; ?>
              <?php if( !empty($linkedin) ): ?>
                <li class="linkedin"><a href="<?php print $linkedin; ?>"><i class="fa fa-linkedin"></i></a></li>
              <?php endif; ?>
            </ul>
            <?php print render($page['header_top_left']); ?>
          </div>
          <div class="large-6 columns header_top_right text-right">
            <?php print render($page['header_top_right']); ?>
          </div>
        </div>
      </div>
    <?php //endif; ?>

    <?php if ($top_bar): ?>
      <!--.top-bar -->
      <?php if ($top_bar_classes): ?>
      <div class="<?php print $top_bar_classes; ?>">
      <?php endif; ?>
        <nav class="top-bar"<?php print $top_bar_options; ?>>
          <ul class="title-area">
            <li class="name"><h1><?php print $linked_site_name; ?></h1></li>
            <li class="toggle-topbar menu-icon"><a href="#"><span><?php print $top_bar_menu_text; ?></span></a></li>
          </ul>
          <section class="top-bar-section">
            <?php if ($top_bar_main_menu) :?>
              <?php print $top_bar_main_menu; ?>
            <?php endif; ?>
            <?php if ($top_bar_secondary_menu) :?>
              <?php print $top_bar_secondary_menu; ?>
            <?php endif; ?>
          </section>
        </nav>
      <?php if ($top_bar_classes): ?>
      </div>
      <?php endif; ?>
      <!--/.top-bar -->
    <?php endif; ?>

    <!-- Title, slogan and menu -->
    <?php if ($alt_header): ?>
    <section class="row <?php print $alt_header_classes; ?>">

      <?php if ($linked_logo): print $linked_logo; endif; ?>

      <?php if ($site_name): ?>
        <?php if ($title): ?>
          <div id="site-name" class="element-invisible">
            <strong>
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            </strong>
          </div>
        <?php else: /* Use h1 when the content title is empty */ ?>
          <h1 id="site-name">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
          </h1>
        <?php endif; ?>
      <?php endif; ?>

      <?php if ($site_slogan): ?>
        <h2 title="<?php print $site_slogan; ?>" class="site-slogan"><?php print $site_slogan; ?></h2>
      <?php endif; ?>

      <?php if ($alt_main_menu): ?>
        <nav id="main-menu" class="navigation" role="navigation">
          <?php print ($alt_main_menu); ?>
        </nav> <!-- /#main-menu -->
      <?php endif; ?>

      <?php if ($alt_secondary_menu): ?>
        <nav id="secondary-menu" class="navigation" role="navigation">
          <?php print $alt_secondary_menu; ?>
        </nav> <!-- /#secondary-menu -->
      <?php endif; ?>

    </section>
    <?php endif; ?>
    <!-- End title, slogan and menu -->
    
    <?php if (!empty($page['slider'])): ?>
      <section class="l-slider">
          <?php print render($page['slider']); ?>
      </section>
    <?php endif; ?>
  
  
  <?php include("titlebar.tpl.php"); ?> 
    
    
  <?php if (!empty($tabs)): ?>
    <div class="row">
      <?php print render($tabs); ?>
      <?php if (!empty($tabs2)): print render($tabs2); endif; ?>
    </div>
  <?php endif; ?>
    
  <?php if ($messages && !$zurb_foundation_messages_modal): ?>
    <!--/.l-messages -->
    <section class="l-messages row">
      <div class="large-12 columns">
        <?php if ($messages): print $messages; endif; ?>
      </div>
    </section>
    <!--/.l-messages -->
  <?php endif; ?>

    <?php if (!empty($page['header'])): ?>
      <!--.l-header-region -->
      <section class="l-header-region row">
        <div class="large-12 columns">
          <?php print render($page['header']); ?>
        </div>
      </section>
      <!--/.l-header-region -->
    <?php endif; ?>

  </header>
  <!--/.l-header -->