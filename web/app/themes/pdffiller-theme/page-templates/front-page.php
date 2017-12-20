<?php
/**
 * Template Name: Front Page | Without Margin & Sidebar
 *
 */

get_header(); ?>

<div id="primary" class="container header-animated sticky-margin" data-animate-down="header-animated-bottom" data-animate-up="header-animated-top">


			<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry-page-image">
						<?php the_post_thumbnail(); ?>
					</div><!-- .entry-page-image -->
				<?php endif; ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

	</div><!-- #primary -->

<?php get_footer(); ?>