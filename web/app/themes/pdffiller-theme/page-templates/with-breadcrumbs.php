<?php
/**
 * Template Name: Breadcrumbs Page | Without Sidebar
 *
 */

get_header(); ?>

<div class="breadcrumb-wrap">
    <div class="container">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <?php if ( ! is_page_template( 'page-templates/front-page.php' ) ) : ?>
                <div class="entry-title"><?php the_title(); ?></div>
            <?php endif; ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <?php wpblog_theme_custom_breadcrumbs(); ?>
        </div>
    </div>

</div>


	<div id="primary" class="container color-container">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>