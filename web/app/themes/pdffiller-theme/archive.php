<?php

/**
 * @package        WPblog Theme
 * @author         GoGetThemes.com
 * @copyright      2017 GoGetThemes
 * @version        Release: v1.0
 * The template for displaying Archive pages
 */

get_header(); ?>

<div class="row">
    <div class="container margin-container">
        <div id="primary" class="col-lg-8 col-md-8 col-xs-12 col-sm-12 site-content">
            <div id="content" role="main">

            <?php if ( have_posts() ) : ?>
                <header class="page-header">
                    <?php
                    the_archive_title( '<h3 class="page-title">', '</h3>' );
                    the_archive_description( '<div class="archive-description">', '</div>' );
                    ?>
                </header>

            <?php
                while ( have_posts() ) : the_post();
                    get_template_part( 'content', get_post_format() );
                endwhile;

                wpblog_theme_content_nav( 'nav-below' );
            ?>

            <?php else : ?>
                <?php get_template_part( 'content', 'none' ); ?>
            <?php endif; ?>

		</div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12 vertical-sidebar">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
