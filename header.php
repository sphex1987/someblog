<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header>
		<div class="header_inside_cont">
			<?php if ( someblog('sb_logo_url') != '' ) : ?>
				<div class="header_logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url(someblog('sb_logo_url')); ?>" alt="logo" /></a></div>
			<?php else : ?>
				<div class="header_title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
				<div class="header_subtitle"><?php echo get_bloginfo( 'description', 'display' ); ?></div>
			<?php endif; ?>

			<div class="header_social">
				<?php if ( someblog('someblog_facebookurl') != '' ) : ?>
					<a href="<?php echo esc_url(someblog('someblog_facebookurl')); ?>" target="_blank"><span class="fa fa-facebook"></span></a>
				<?php endif; ?>
				<?php if ( someblog('someblog_twitterurl') != '' ) : ?>
					<a href="<?php echo esc_url(someblog('someblog_twitterurl')); ?>" target="_blank"><span class="fa fa-twitter"></span></a>
				<?php endif; ?>
				<?php if ( someblog('someblog_pinteresturl') != '' ) : ?>
					<a href="<?php echo esc_url(someblog('someblog_pinteresturl')); ?>" target="_blank"><span class="fa fa-pinterest-p"></span></a>
				<?php endif; ?>
				<?php if ( someblog('someblog_googleplusurl') != '' ) : ?>
					<a href="<?php echo esc_url(someblog('someblog_googleplusurl')); ?>" target="_blank"><span class="fa fa-google-plus"></span></a>
				<?php endif; ?>
				<?php if ( someblog('someblog_behanceurl') != '' ) : ?>
					<a href="<?php echo esc_url(someblog('someblog_behanceurl')); ?>" target="_blank"><span class="fa fa-behance"></span></a>
				<?php endif; ?>
				<?php if ( someblog('someblog_dribbbleurl') != '' ) : ?>
					<a href="<?php echo esc_url(someblog('someblog_dribbbleurl')); ?>" target="_blank"><span class="fa fa-dribbble"></span></a>
				<?php endif; ?>
				<?php if ( someblog('someblog_instagramurl') != '' ) : ?>
					<a href="<?php echo esc_url(someblog('someblog_instagramurl')); ?>" target="_blank"><span class="fa fa-instagram"></span></a>
				<?php endif; ?>
				<?php if ( someblog('hiderss') == 'yes' ) : ?>
					<a href="<?php esc_url(bloginfo( 'rss2_url' )); ?>" class="rss"><span class="fa fa-rss"></span></a>
				<?php endif; ?>
			</div>

			<div class="header_menu"><?php wp_nav_menu('theme_location=header-menu&container=false&menu_id=main_header_menu'); ?></div>
		</div>
	</header>

	<?php if ( is_front_page() && is_home() ) : ?>

		<?php if ( someblog('someblog_featured_cat') != '' ): ?>		
			<div class="slider_cont">
				<div class="custom_slider">
					<div class="container">
						<?php
							if( someblog('someblog_slider_type') != '' ) {
								$s_type = someblog('someblog_slider_type');
							} else {
								$s_type = 'single';
							}
							get_template_part($s_type, 'slider');
						?>
					</div>
				</div><!-- end custom_slider -->
			</div>

		<?php endif; ?>

	<?php endif; ?>