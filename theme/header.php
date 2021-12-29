<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php wp_title( '|', true, 'right' ); ?></title>

<?php wp_head();?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-49236900-3', 'auto');
  ga('send', 'pageview');

</script>

</head>
<body <?php body_class(); ?>>

<?php do_action('after_body'); ?>

<div id="wrap">

  <nav id="section-nav" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div><!--/navbar-header -->

      <div class="navbar-collapse collapse">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'menu-principal',
          'container'      => false,
          'menu_id'        => 'menu-principal',
          'menu_class'     => 'nav navbar-nav',
          'fallback_cb'    => 'fallbackNoMenu'
        ));
        ?>
      </div><!--/navbar-collapse collapse -->
    </div>
  </nav>

  <header id="header-page">
    <img src="<?php bloginfo('template_directory'); ?>/assets/images/logo-hotel.png" class="img-responsive">
  </header>
