<?php
/**
 * Template Name: Breadcrumbs Page | Left Main Sidebar
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
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


<div class="container">
    <div class="col-lg-3 col-md-4 col-xs-12 col-sm-12 vertical-sidebar"><?php dynamic_sidebar ('main-sidebar'); ?></div>
    <div class="col-lg-9 col-md-8 col-xs-12 col-sm-12">
        <div id="primary" class="color-container">
            <div id="content" role="main">

                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', 'page' ); ?>
                    <?php comments_template( '', true ); ?>
                <?php endwhile; // end of the loop. ?>

            </div><!-- #content -->
        </div><!-- #primary -->

    </div>
</div>




<?php get_footer(); ?>