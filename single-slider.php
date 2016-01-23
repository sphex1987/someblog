<div id="home-slider" class="carousel slide" data-ride="carousel">
	<?php //Indicator ?>

		<ol class="carousel-indicators">
		<?php
		// The Query
		$args = array(
				'post_type' => 'post',
				'posts_per_page' => 7,
				'cat' => someblog('someblog_featured_cat')
			);

		$the_query = new WP_Query( $args );

		// The Loop
		$x = 0;
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$is_active = '';
			if($x == 0) { $is_active = 'class="active"'; }
			echo '<li data-target="#home-slider" data-slide-to="' . $x . '" ' . $is_active . '></li>';
			$x++;
		}
		/* Restore original Post Data */
		wp_reset_postdata();
		?>
	</ol>

  <?php //  Wrapper for slides ?>
  <div class="carousel-inner" role="listbox">
  	<?php 
  	$the_query = new WP_Query( $args );
  	$x = 0;
  	while ( $the_query->have_posts() ) { $the_query->the_post(); ?>

	    <div class="item <?php if($x == 0) { echo 'active'; } ?>">
	      <?php the_post_thumbnail('someblog-single-slide'); ?>
	      <div class="carousel-caption">
	        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	        <?php //<p>some description here</p> ?>
	      </div>
	    </div>
	<?php $x++; } wp_reset_postdata(); ?>
  </div>

  <?php // Controls ?>
  <a class="left carousel-control" href="#home-slider" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#home-slider" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
