<div class="post-grid">

<?php
  global $wp_query;

	$args['name'] = '';
	$args['pagename'] = '';
  $args = array_merge( $wp_query->query_vars, $args );

  query_posts( $args );

	$total_results = $wp_query->found_posts;
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

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

</div>