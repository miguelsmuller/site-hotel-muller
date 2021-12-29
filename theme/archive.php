<?php get_header(); ?>

<?php
if (is_date()){
    $page_title = 'Notícias Publicadas no período de '. get_the_time('F \d\e\ Y');
}elseif (is_category()){
    $categoria = single_cat_title("", false);
    $page_title = 'Notícias publicadas na categoria "'. $categoria.'"';
}elseif (is_tag()){
    $categoria = single_cat_title("", false);
    $page_title = 'Notícias publicadas com a referência "'. $categoria.'"';
}else{
    $page_title = 'Notícias Publicadas';
}
?>

<main class="container" role="main">
    <section id="row-full">

        <article id="col-left">

                <header class="title-simple">
                    <h1><?php echo $page_title; ?></h1>
                    <span></span>
                </header>

                <?php
                    $args = array( 'paged'=> $paged );
                    $args['name'] = '';
                    $args['pagename'] = '';

                    global $wp_query;
                    $args = array_merge( $wp_query->query_vars, $args );
                    //$loop_posts = new WP_Query( $args );
                    query_posts( $args );

                    global $wp_query;
                    $total_results = $wp_query->found_posts;
                ?>

                <?php if ( have_posts() ) : ?>
                    <div id="article-list" class="row">

                        <?php get_template_part( 'loop', 'content' ); ?>

                    </div>
                <?php endif; ?>

                <button id="load-more" type="button" class="btn btn-primary btn-block btn-dark btn-lg" data-loading-text="Carregando  ..." data-template="loop-content" data-post-type="post" data-posts-per-page="6" data-max-page="<?php echo $wp_query->max_num_pages; ?>" autocomplete="off">Carregar mais artigos</button>

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