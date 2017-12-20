<?php
/**
 * @package        WPblog Theme
 * @author         GoGetThemes.com
 * @copyright      2017 GoGetThemes
 * @version        Release: v1.0
 * The template for displaying all pages
 */

get_header(); ?>

    <div id="primary" class="container header-animated sticky-margin" data-animate-down="header-animated-bottom" data-animate-up="header-animated-top">
        <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12 color-container">
            <h3><?php wp_title(''); ?></h3>
            <?php
            // Start the Loop.
            while ( have_posts() ) : the_post();

                // Include the page content template.
                get_template_part( 'content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
            endwhile;
            ?>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12 vertical-sidebar"><?php get_sidebar(); ?></div>
    </div>


<?php get_footer(); ?>