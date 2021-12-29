<header>
  <div class="container">
    <a href="<?php echo esc_url( site_url() ); ?>" class="logo-site">
      <?php get_template_part( 'inc/logo-hotel' ); ?>
    </a>

    <a class="button-menu-mobile" href="#main-menu"><i class="fas fa-bars"></i></a>

    <nav id="main-menu">
    <?php
      wp_nav_menu(array(
        'theme_location' => 'menu-principal',
        'container'      => true,
      ));
    ?>
    </nav>
  </div>
</header>