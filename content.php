<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="home_post_img">
		<?php 
		if( !is_singular() ) :
			if(has_post_thumbnail()) { 
				echo '<a href="' . get_permalink() . '">';
				if ( 'grid-2-column' == someblog( 'sb_home_layout' ) ) {
					the_post_thumbnail('someblog-home-grid2'); 
				} else {
					the_post_thumbnail('someblog-home-image'); 
				}
				echo '</a>';
			} 
		endif;
		?>
	</div>

	<?php if ( is_singular() ) : ?>	
		<h3 class="single_category">		
		</h3>
		<h1 class="single_title"><?php the_title(); ?></h1>
	<?php else : ?>
		<h3 class="single_catefory"><?php the_category(', '); ?></h3>
		<h3 class="post_title center"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<?php endif; ?>

	<p class="post_meta center">By <?php the_author(); ?> &middot; <?php the_time('F d, Y'); ?><?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?> &middot; <?php comments_popup_link( __( 'Leave a comment', 'someblog' ), __( '1 Comment', 'someblog' ), __( '% Comments', 'someblog' ) ); ?> <?php endif; ?></p>




	<?php if ( is_singular() ) : ?>
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'someblog' ), 'after' => '</div>' ) ); ?>
	<?php else : ?>
		<p class="post_excerpt"><?php echo someblog_get_excerpt(250); ?></p>
	<?php endif; ?>

	<?php
	$read_more_text = 'Read More';

	if(someblog( 'sb_home_read_more_text' ) != '')
		$read_more_text = someblog( 'sb_home_read_more_text' );
	?>

	<p class="read_more"><a href="<?php the_permalink(); ?>"><?php echo $read_more_text; ?></a></p>
	<?php if( is_single() ) : ?>
		<div class="post_meta_bottom">Category: <?php the_category(', '); ?></div>
	<?php endif; ?>

</article>