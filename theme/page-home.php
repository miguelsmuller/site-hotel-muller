<?php
/*
Template Name: Página Inicial
*/
?>
<?php get_header(); ?>

<div class="wrap">
  <?php get_template_part( 'inc/template-header' ); ?>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php if( get_field('show-section-introducao') == '1' ): ?>
      <section id="section-home-introduction">
        <div class="container">
          <div class="introduction-content">
            <div class="introduction-cta">
              <h1>
                <?php
                $introducao_titulo = get_field('introducao_titulo');
                $introducao_titulo = ($introducao_titulo != "" ? $introducao_titulo : 'Titulo de Exemplo');
                echo($introducao_titulo);
                ?>
              </h1>

              <?php
              $introducao_texto = get_field('introducao_texto');
              $introducao_texto = ($introducao_texto != "" ? $introducao_texto : 'Descrição de Exemplo');
              echo($introducao_texto);
              ?>

              <a class="btn btn-primary-v2" data-toggle="modal" data-target="#modalReservation">Ver Disponibilidade</a>
            </div>

            <div class="introduction-image">
              <?php
              $image = get_field('introducao_imagem');
              ?>
              <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>

    <?php if( get_field('show-section-historia') == '1' ): ?>
      <section id="section-home-history">
        <h1 class="section-heading">
          <?php
          $historia_titulo = get_field('historia_titulo');
          $historia_titulo = ($historia_titulo != "" ? $historia_titulo : 'Título História');
          echo($historia_titulo);

          $historia_sub_titulo = get_field('historia_sub_titulo');
          $historia_sub_titulo = ($historia_sub_titulo != "" ? $historia_sub_titulo : '');
          echo('<span>' . $historia_sub_titulo . '</span>');
          ?>
        </h1>

        <div class="container">
          <div class="history-content">
            <?php
            $historia_texto = get_field('historia_texto');
            $historia_texto = ($historia_texto != "" ? $historia_texto : '');
            echo($historia_texto);
            ?>
          </div>

          <?php
          $images = get_field('historia_fotos');
          if( $images ): ?>
            <div class="gallery">
              <?php foreach( $images as $image ): ?>
                <a href="<?php echo esc_url($image['url']); ?>" data-fancybox="history" data-caption="<?php echo esc_attr($image['title']); ?>">
                  <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" data-title="<?php echo esc_attr($image['title']); ?>" />
                </a>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      </section>
    <?php endif; ?>

    <?php if( get_field('show-section-acomodacoes') == '1' ): ?>
      <section id="section-home-accommodations">
        <h1 class="section-heading">
          <?php
          $acomodacoes_titulo = get_field('acomodacoes_titulo');
          $acomodacoes_titulo = ($acomodacoes_titulo != "" ? $acomodacoes_titulo : 'Título Acomodações');
          echo($acomodacoes_titulo);

          $acomodacoes_sub_titulo = get_field('acomodacoes_sub_titulo');
          $acomodacoes_sub_titulo = ($acomodacoes_sub_titulo != "" ? $acomodacoes_sub_titulo : '');
          echo('<span>' . $acomodacoes_sub_titulo . '</span>');
          ?>
        </h1>

        <div class="container">
        <?php
        if( have_rows('acomodacoes_tipo') ):
          while ( have_rows('acomodacoes_tipo') ) : the_row();
            ?>
              <div class="accommodations-item">
                <div class="accommodations-image">
                  <?php
                  $image = get_sub_field('foto_acomodacao');
                  ?>
                  <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                </div>
                <div class="accommodations-content">
                  <div class="accommodations-content-middle">
                    <h2><?php the_sub_field('nome_acomodacao'); ?></h2>
                    <p><?php the_sub_field('descricao_acomodacao'); ?></p>
                    <a class="btn btn-primary-v2" href="#">Conhecer</a>
                  </div>
                </div>
              </div>
            <?php
          endwhile;
        else :
        endif;
        ?>
        </div>
      </section>
    <?php endif; ?>

    <?php if( get_field('show-section-depoimentos') == '1' ): ?>
      <section id="section-home-depositions">
        <h1 class="section-heading">
          <?php
          $depoimentos_titulo = get_field('depoimentos_titulo');
          $depoimentos_titulo = ($depoimentos_titulo != "" ? $depoimentos_titulo : 'Título Depoimentos');
          echo($depoimentos_titulo);

          $depoimentos_sub_titulo = get_field('depoimentos_sub_titulo');
          $depoimentos_sub_titulo = ($depoimentos_sub_titulo != "" ? $depoimentos_sub_titulo : '');
          echo('<span>' . $depoimentos_sub_titulo . '</span>');
          ?>
        </h1>

        <div class="depositions-list">
          <div class="container">
            <div class="owl-carousel owl-theme">

              <?php
              $reviews = new WP_Query(array(
                'post_type'      => 'review',
                'orderby'        => 'date',
                'order'          => 'RAND',
                'posts_per_page' => '4',
                'no_found_rows'  => true
              ));
              ?>

              <?php if ( $reviews->have_posts() ) : ?>

                <?php while ( $reviews->have_posts() ) : $reviews->the_post(); ?>
                  <div class="depositions-item">
                    <div class="depositions-autor">
                      <h2><?php the_title(); ?></h2>
                      <span class="text-small">Há <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' atrás'; ?> via <?php the_field('origem_review'); ?></span>
                    </div>
                    <div class="depositions-message">
                      <p><?php the_field('review'); ?></p>
                    </div>
                  </div>
                <?php endwhile;?>
                <?php wp_reset_postdata(); ?>

              <?php endif; ?>

            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>

    <?php if( get_field('show-section-cidade') == '1' ): ?>
      <section id="section-home-city">
        <h1 class="section-heading">
          <?php
          $cidade_titulo = get_field('cidade_titulo');
          $cidade_titulo = ($cidade_titulo != "" ? $cidade_titulo : 'Título Cidade');
          echo($cidade_titulo);

          $cidade_sub_titulo = get_field('cidade_sub_titulo');
          $cidade_sub_titulo = ($cidade_sub_titulo != "" ? $cidade_sub_titulo : '');
          echo('<span>' . $cidade_sub_titulo . '</span>');
          ?>
        </h1>

        <div class="container">
          <div class="city-content">
            <div class="city-video">
              <?php
              $cidade_video = get_field('cidade_video');
              $cidade_video = ($cidade_video != "" ? $cidade_video : '');
              ?>

              <a data-fancybox href="<?php echo($cidade_video); ?>" href="#">
                <img src="<?php bloginfo('template_directory'); ?>/dist/images/video-city.png" alt="">
              </a>
            </div>
            <div class="city-text">
              <?php
              $cidade_texto = get_field('cidade_texto');
              $cidade_texto = ($cidade_texto != "" ? $cidade_texto : '');
              echo($cidade_texto);
              ?>
            </div>
          </div>

          <?php
          $images = get_field('cidade_fotos');
          if( $images ): ?>
            <div class="gallery">
              <?php foreach( $images as $image ): ?>
                <a href="<?php echo esc_url($image['url']); ?>" data-fancybox="city" data-caption="<?php echo esc_attr($image['title']); ?>">
                  <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" data-title="<?php echo esc_attr($image['title']); ?>"/>
                </a>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>

        </div>

        <?php
        $cidade_parallax = get_field('cidade_parallax');
        if( $cidade_parallax ): ?>
          <div class="parallax-content">
            <div class="parallax-image" style="background-image:url('<?php echo($cidade_parallax); ?>');"></div>
          </div>
        <?php endif; ?>
      </section>
    <?php endif; ?>

    <?php if( get_field('show-section-noticias') == '1' ): ?>
      <section id="section-home-news">
        <h1 class="section-heading">
          <?php
          $noticias_titulo = get_field('noticias_titulo');
          $noticias_titulo = ($noticias_titulo != "" ? $noticias_titulo : 'Título Notícias');
          echo($noticias_titulo);

          $noticias_sub_titulo = get_field('noticias_sub_titulo');
          $noticias_sub_titulo = ($noticias_sub_titulo != "" ? $noticias_sub_titulo : '');
          echo('<span>' . $noticias_sub_titulo . '</span>');
          ?>
        </h1>

        <div class="container">
          <?php get_template_part( 'inc/loop-news' ); ?>

          <div class="news-more">
            <Button class="btn btn-primary">Ver todas as notícias</Button>
          </div>
        </div>
      </section>
    <?php endif; ?>

    <?php if( get_field('show-section-contato') == '1' ): ?>
      <section id="section-home-contact">
        <h1 class="section-heading">
          <?php
          $contato_titulo = get_field('contato_titulo');

          $contato_titulo = ($contato_titulo != "" ? $contato_titulo : 'Título Contato');
          echo($contato_titulo);

          $contato_sub_titulo = get_field('contato_sub_titulo');
          $contato_sub_titulo = ($contato_sub_titulo != "" ? $contato_sub_titulo : '');
          echo('<span>' . $contato_sub_titulo . '</span>');
          ?>
        </h1>

        <div class="container">
          <div class="contact-social">
            <?php
            if( have_rows('redes_sociais', 'option') ):
              while ( have_rows('redes_sociais', 'option') ) : the_row();
            ?>

                <a href="<?php the_sub_field('social_url'); ?>">
                  <?php the_sub_field('social_icone'); ?>
                </a>

            <?php
              endwhile;
            else :
            endif;
            ?>

          </div>

          <div class="contact-mode">

            <div class="contact-icons">
              <?php
              if( have_rows('contatos', 'option') ):
                while ( have_rows('contatos', 'option') ) : the_row();
              ?>

                <a href="<?php the_sub_field('contato_url'); ?>">
                  <?php the_sub_field('contato_icone'); ?>
                  <span><?php the_sub_field('contato_texto'); ?></span>
                </a>

              <?php
                endwhile;
              else :
              endif;
              ?>
            </div>

            <small><?php the_field('contato_horario'); ?></small>
          </div>
          <div class="contact-content">
            <div class="contact-form">

                <?php the_field('contato_texto'); ?>

                <?php
                $contactForm = get_field('contato_formulario');

                if (is_object($contactForm) && property_exists($contactForm, 'ID')) {
                  echo do_shortcode( '[contact-form-7 id="'. $contactForm->ID .'" html_id="form-contato" html_class="form form-validate"]' );
                }
                ?>

            </div>
            <div class="contact-map">
              <?php
              $contato_mapa = get_field('contato_mapa');
              $contato_mapa = ($contato_mapa != "" ? $contato_mapa : '');
              ?>

              <a data-fancybox data-options="{'iframe' : {'css' : {'width' : '80%', 'height' : '80%'}}}" href="<?php echo($contato_mapa); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="239" height="155" viewBox="0 0 239 155"><defs><style>.a{fill:#57564f;}.b{fill:#edeaea;font-size:24px;font-family:OpenSans-Bold, Open Sans;font-weight:700;}.c{fill:#f5f5f5;}</style></defs><g transform="translate(-886 -5711)"><rect class="a" width="239" height="59" rx="6" transform="translate(886 5807)"/><text class="b" transform="translate(1005 5845)"><tspan x="-79.506" y="0">Como Chegar</tspan></text><g transform="translate(0 50)"><path class="a" d="M30.954,90.144C4.846,52.295,0,48.41,0,34.5a34.5,34.5,0,0,1,69,0c0,13.91-4.846,17.795-30.954,55.644a4.314,4.314,0,0,1-7.091,0Z" transform="translate(971 5661)"/><path class="c" d="M26.524,13.448,4.525.443A2.983,2.983,0,0,0,0,3.024V29.029A3,3,0,0,0,4.525,31.61l22-13a3,3,0,0,0,0-5.162Z" transform="translate(994 5680.968)"/></g></g></svg>
              </a>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>

  <?php endwhile; else : endif;?>

  <?php get_template_part( 'inc/template-footer' ); ?>
</div>

<?php get_footer(); ?>