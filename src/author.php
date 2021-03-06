<?php get_header(); ?>

	<div class="page-header">
		<div class="container">
			<h1><?php _e( 'Author Archives for ', 'woopstrapblank' ); echo get_the_author(); ?></h1>
		</div>
	</div>


	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- col-md-9 -->
				<div class="col-md-9">

					<?php if (have_posts()): the_post(); ?>

					<?php if ( get_the_author_meta('description')) : ?>

					<?php echo get_avatar(get_the_author_meta('user_email')); ?>

						<h3><?php _e( 'About ', 'woopstrapblank' ); echo get_the_author() ; ?></h3>

						<?php echo wpautop( get_the_author_meta('description') ); ?>

					<?php endif; ?>

					<?php rewind_posts(); while (have_posts()) : the_post(); ?>

						<!-- article -->
						<div id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>

							<!-- post thumbnail -->
							<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php the_post_thumbnail(array(120,120)); // Declare pixel size you need inside the array ?>
								</a>
							<?php endif; ?>
							<!-- /post thumbnail -->

							<!-- post title -->
							<h3>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							</h3>
							<!-- /Post title -->

							<!-- post details -->
							<span class="date">
								<time datetime="<?php the_time('Y-m-d'); ?> <?php the_time('H:i'); ?>">
									<?php the_date(); ?> <?php the_time(); ?>
								</time>
							</span>
							<span class="author"><?php _e( 'Published by', 'woopstrapblank' ); ?> <?php the_author_posts_link(); ?></span>
							<span class="comments"><?php comments_popup_link( __( 'Leave your thoughts', 'woopstrapblank' ), __( '1 Comment', 'woopstrapblank' ), __( '% Comments', 'woopstrapblank' )); ?></span>
							<!-- /post details -->

							<?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>

							<br class="clear">

							<?php edit_post_link(); ?>

						</div>
						<!-- /article -->

					<?php endwhile; ?>

					<?php else: ?>

						<!-- article -->
						<div class="article">

							<h3><?php _e( 'Sorry, nothing to display.', 'woopstrapblank' ); ?></h3>

						</div>
						<!-- /article -->

					<?php endif; ?>

						<?php get_template_part('pagination'); ?>

				</div>
				<!-- /col-md-9 -->

				<!-- col-md-3 -->
				<div class="col-md-3">
					<?php get_sidebar(); ?>
				</div>
				<!-- /col-md-3 -->

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

<?php get_footer(); ?>
