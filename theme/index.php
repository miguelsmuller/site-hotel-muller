<?php get_header(); ?>

<main class="container" role="main">

  <!--    WIDGETS    *********************************************    -->
  <section class="row-widget">
      <div class="widget-reservas ">
          <div class="box-dark">
              <header class="title-dark">
                  <h3>Checar Disponibilidade</h3>
              </header>

              <?php
              $reservationForm = get_option('reservationForm');
              if ($reservationForm) {
                echo do_shortcode( '[contact-form-7 id="'. $reservationForm .'" html_id="form-reserva" html_class="form-inline form-validate"]' );
              }
              ?>

          </div>
      </div>
      <div class="widget-social-network">
          <div class="box-dark">
              <header class="title-dark">
                  <h3>Redes Sociais</h3>
              </header>
              <div class="row-fluid">
                  <ul class="social-icons animated-list">
                      <li><a href="https://www.facebook.com/HotelMuller" target="_blank"><span class="sprites-icon-facebook"></span></a></li>
                      <li><a href="https://plus.google.com/+HotelMüllerRioClaro" rel="publisher" target="_blank"><span class="sprites-icon-google"></span></a></li>
                      <li><a href="https://www.youtube.com/user/HotelMullerRioClaro" target="_blank"><span class="sprites-icon-youtube"></span></a></li>
                  </ul>
              </div>
          </div>
      </div>
  </section>


  <!--    FAST PAGES    *********************************************    -->
  <section id="row-info">

      <div class="article page home">
          <header class="title-simple">
              <h3>Hotel Müller</h3>
              <span></span>
          </header>
          <img src="<?php bloginfo('template_directory'); ?>/assets/images/auxiliar/hotel.png" class="img-responsive">
          <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ac tortor at tellus feugiat congue quis ut nunc.</p> -->
      </div>

      <div class="article page home">
          <header class="title-simple">
              <h3>Rio Claro</h3>
              <span></span>
          </header>
          <img src="<?php bloginfo('template_directory'); ?>/assets/images/auxiliar/rioclaro.png" class="img-responsive">
          <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ac tortor at tellus feugiat congue quis ut nunc.</p> -->
      </div>

      <div class="article page home">
          <header class="title-simple">
              <h3>Nós oferecemos</h3>
              <span></span>
          </header>
          <ul class="list-decoration">
              <li>Internet Wifi</li>
              <li>Suítes e Quartos Simples</li>
              <li>TV em todas as unidades</li>
              <li>Arrumadeira, passadeira e lavadeira</li>
          </ul>
      </div>
  </section>


  <!--    LAST NEWS    *********************************************    -->
  <section id="row-news">
      <header class="title-simple">
          <h3>Últimas notícias</h3>
          <span></span>
      </header>
      <?php
          $news = new WP_Query(array(
          'posts_per_page' => get_option('quant_posts_index')
      ));
      ?>
      <?php while ( $news->have_posts() ) : $news->the_post(); ?>

          <article class="article post home">
              <div class="box-dark box-dark-news">
                  <a href="<?php the_permalink() ?>">
                  <?php
                  the_post_thumbnail('post-thumbnail', array('class' => "img-responsive"));
                  ?></a>
                  <header><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></header>

              </div>
          </article>

      <?php endwhile; ?>

  </section>
</main>
<?php get_footer(); ?>
