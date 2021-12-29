<?php get_header(); ?>

<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
    $query_split = explode("=", $string);
    $search_query[$query_split[0]] = urldecode($query_split[1]);
}

$search_query = array_merge( $search_query, array('posts_per_page' => -1) );
$search = new WP_Query($search_query);

global $wp_query;
$total_results = $wp_query->found_posts;

$titulo = 'Resultado da busca para "'. get_search_query() .'"';
?>

<main class="container" role="main">
    <section id="row-full">

        <article id="col-left">

                <header class="title-simple">
                    <h1><?php echo $titulo; ?></h1>
                    <h5 style="padding-bottom: 0;"><?php echo $total_results; ?> itens encontrados</h5>
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

                <?php if ( $search->have_posts() ) : ?>
                    <?php
                        if ( function_exists( 'paginacao' ) ) paginacao();
                    ?>
                    <div class="row">

                        <?php while ( $search->have_posts() ) : $search->the_post(); ?>

                        <article class="article post">
                <div class="box-dark box-dark-news">
                    <a href="<?php the_permalink() ?>">
                    <?php
                    the_post_thumbnail('thumbnail-large', array('class' => "img-responsive"));
                    ?></a>
                    <header><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></header>

                </div>
            </article>

                        <?php endwhile; ?>

                    </div>
                    <?php
                        if ( function_exists( 'paginacao' ) ) paginacao();
                    ?>
                <?php endif; ?>

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