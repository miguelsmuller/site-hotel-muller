<?php while ( have_posts() ) : the_post(); ?>
<article class="article post">
    <div class="box-dark box-dark-news">
        <a href="<?php the_permalink() ?>">
        <?php
        the_post_thumbnail('post-thumbnail', array('class' => "img-responsive"));
        ?></a>
        <header><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></header>
    </div>
</article>
<?php endwhile; ?>