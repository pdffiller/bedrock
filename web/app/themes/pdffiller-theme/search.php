<?php
/**
 * @package        WPblog Theme
 * @author         GoGetThemes.com
 * @copyright      2017 GoGetThemes
 * @version        Release: v1.0
 * The template for displaying Search Results pages
 */

get_header(); ?>

<div class="row">
    <div class="container margin-container">
        <div id="primary" class="col-lg-8 col-md-8 col-xs-12 col-sm-12 site-content">
            <div id="content" role="main">



		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h3 class="page-title"><?php printf( __( 'Search Results for: %s', 'wpblog-theme'), '<span>' . get_search_query() . '</span>' ); ?></h3>
			</header>

			<?php wpblog_theme_content_nav( 'nav-above' ); ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php wpblog_theme_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'wpblog-theme'); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'wpblog-theme'); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>

        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12 vertical-sidebar">
        <?php get_sidebar (); ?>
    </div>
    </div>
    </div>
<?php get_footer(); ?>