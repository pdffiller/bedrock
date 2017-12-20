<?php
/**
 * Template Name: Full-width Page | Without Sidebar
 *
 */

get_header(); ?>

    <div class="fullwidth-container">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>
    </div>

<?php get_footer(); ?>