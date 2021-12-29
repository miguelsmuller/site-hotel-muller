<div class="post-grid">
<?php $news = new WP_Query(array('posts_per_page' => 4)); ?>

<?php if ( $news->have_posts() ) : while ( $news->have_posts() ) : $news->the_post(); ?>

<a href="<?php the_permalink() ?>" class="post-item">
  <h2 class="post-title">
    <?php the_title(); ?>
  </h2>
  <?php
    the_post_thumbnail('thumbnail', array('class' => "post-image"));
  ?>
</a>

<?php endwhile; else : ?>
<?php endif; ?>

<?php wp_reset_postdata(); ?>
</div>