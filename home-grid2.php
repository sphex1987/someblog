			<div class="col-md-12">
				

				<?php if ( have_posts() ) : ?>
					
					<div class="two_column row">
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>	
						<div class="col-md-6 one_col">	
							<div class="home_blog_box">							
								<?php get_template_part('content', get_post_format()); ?>
							</div>	
						</div>

					<?php endwhile; ?>
					</div>

					<div class="someblog_nav">
						<div class="row">
							<div class="col-md-6 someblog_nav_prev"><?php previous_posts_link( '&laquo; Previous Entries' ); ?></div>
							<div class="col-md-6 someblog_nav_next"><?php next_posts_link( 'Next Entries &raquo;', '' ); ?></div>
						</div>
					</div>

				<?php else : ?>

					<div class="home_blog_box">
						<p>Ready to publish your first post? <a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>">Get started here</a>.</p>
					</div>

				<?php endif; ?>		

			</div>				