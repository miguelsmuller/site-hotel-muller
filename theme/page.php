<?php session_start(); ?>
<?php get_header(); ?>
<main class="container" role="main">
    <section id="row-full">

        <article id="col-left">

            <?php
                if (isset($_SESSION['info'])) {
                    echo $_SESSION['info'];
                    unset($_SESSION['info']);
                }
            ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <header class="title-simple">
                    <h1><?php the_title(); ?></h1>
                    <span></span>
                </header>

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