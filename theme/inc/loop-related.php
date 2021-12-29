<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php
$tags = wp_get_post_tags($post->ID);
if ($tags) :
  $tag_ids = array();

  foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

	$related = new WP_Query( array(
		'tag__in'      => $tag_ids,
		'post__not_in' => array($post->ID),
		'showposts'    => 4,
		'orderby'      => 'rand'
	));
?>

  <div class="post-grid">
    <?php if ( $related->have_posts() ) : while ( $related->have_posts() ) : $related->the_post(); ?>

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

<?php endif; ?>