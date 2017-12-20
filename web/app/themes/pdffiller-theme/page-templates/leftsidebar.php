<?php
/**
 * Template Name: Left Main Sidebar Page | Without Title
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 */

get_header(); ?>



<div class="container margin-container">
    <div class="col-lg-3 col-md-4 col-xs-12 col-sm-12 vertical-sidebar">
        <?php get_sidebar('main-sidebar'); ?>
    </div>
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