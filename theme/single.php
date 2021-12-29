<?php get_header(); ?>
<main class="container" role="main">
    <section id="row-full">

        <article id="col-left">

            <?php while ( have_posts() ) : the_post(); ?>

                <header class="title-simple">
                    <h1><?php the_title(); ?></h1>
                    <span></span>
                </header>

                <ul class="post-info">
                    <li>
                        <span class="sprites-icon-calendar"></span> <?php echo get_the_time('d/m/Y') ?>
                    </li>
                    <li>
                        <span class="sprites-icon-category"></span> <?php the_category(', '); ?>
                    </li>
                    <li>
                        <span class="sprites-icon-tag"></span> <?php the_tags(''); ?>
                    </li>
                    <li>
                        <span class="sprites-icon-coments"></span> <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
                    </li>
                </ul>

                <?php
                $postOptions = get_post_custom( $post->ID );
                $mostrar_thumbnail = isset( $postOptions['mostrar_thumbnail'] ) ? esc_attr( $postOptions['mostrar_thumbnail'][0] ) : '';
                if( $mostrar_thumbnail != TRUE ){
                    the_post_thumbnail('post-thumbnail', array('class' => "img-responsive img-thumb-post"));
                }
                ?>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>


                <?php
                    if ( comments_open() || '0' != get_comments_number() )
                        comments_template();
                ?>

            <?php endwhile; ?>
        </article>
        <aside id="col-right">
            <div class="widget-social-network">
                <div class="box-dark">
                    <header class="title-dark">
                        <h3>Redes Sociais</h3>
                    </header>
                    <div class="row-fluid">
                        <ul class="social-icons animated-list">
                            <li><a href="https://www.facebook.com/HotelMuller" target="_blank"><span class="sprites-icon-facebook"></span></a></li>
                            <li><a href="https://plus.google.com/+HotelMüllerRioClaro" rel="publisher" target="_blank"><span class="sprites-icon-google"></span></a></li>
                            <li><a href="/"><span class="sprites-icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php dynamic_sidebar('sidebar-blog'); ?>
        </aside>

    </section>
</main>

<?php get_footer(); ?>