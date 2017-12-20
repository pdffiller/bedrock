<?php
/**
 * @package        WPblog Theme
 * @author         GoGetThemes.com
 * @copyright      2017 GoGetThemes
 * @version        Release: v1.0
 * The template for displaying Category pages
 */

get_header(); ?>

<div class="row">
    <div class="container margin-container">
        <div id="primary" class="col-lg-8 col-md-8 col-xs-12 col-sm-12 site-content">


		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h6 class="archive-title"><?php printf( __( 'Category Archives: %s', 'wpblog-theme'), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h6>

			<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo esc_html(category_description()); ?></div>
			<?php endif; ?>
			</header><!-- .archive-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/* Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

			endwhile;

			wpblog_theme_content_nav( 'nav-below' );
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>


        </div>
        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12 vertical-sidebar">
            <?php get_sidebar (); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
