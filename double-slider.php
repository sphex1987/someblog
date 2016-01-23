<div class="home-slider-version2">

<?php
	// The Query
	$args = array(
			'post_type' => 'post',
			'posts_per_page' => 8,
			'cat' => someblog('someblog_featured_cat')
		);

	$the_query = new WP_Query( $args );

	while ($the_query->have_posts()) : $the_query->the_post();
		$feat_bg = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' ); ?>

		<div class="s_item" style="background:url('<?php echo $feat_bg; ?>');">
			<div class="slider_inner">
				<h3><a href=""><?php the_title(); ?></a></h3>
				<p class="post_excerpt"><?php echo someblog_get_excerpt(100); ?></p>
			</div>
		</div>							

	<?php 
	endwhile; 
	wp_reset_postdata(); ?>

</div>