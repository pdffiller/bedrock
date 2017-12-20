<?php
/**
 * @package        WPblog Theme
 * @author         GoGetThemes.com
 * @copyright      2017 GoGetThemes
 * @version        Release: v1.0
 * The main template file
 */

get_header(); ?>
<div class="row">
    <div id="primary" class="container margin-container header-animated sticky-margin" data-animate-down="header-animated-bottom" data-animate-up="header-animated-top">

        <div id="primary" class="col-lg-8 col-md-8 col-xs-12 col-sm-12 site-content">
            <div id="content" role="main">
            <?php if ( have_posts() ) : ?>

                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', get_post_format() ); ?>
                <?php endwhile; ?>

                <?php wpblog_theme_content_nav( 'nav-below' ); ?>

            <?php else : ?>

                <article id="post-0" class="post no-results not-found">

                <?php if ( current_user_can( 'edit_posts' ) ) :
                    // Show a different message to a logged-in user who can add posts.
                ?>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php _e( 'No posts to display', 'wpblog-theme'); ?></h1>
                    </header>

                    <div class="entry-content">
                        <p><?php printf( __( 'Ready to publish your first post?', 'wpblog-theme') . ' <a href="%s">' . __( 'Get started here', 'wpblog-theme') . '</a>', admin_url( 'post-new.php' ) ); ?></p>
                    </div><!-- .entry-content -->

                <?php else :
                    // Show the default message to everyone else.
                ?>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php _e( 'Nothing Found', 'wpblog-theme'); ?></h1>
                    </header>

                    <div class="entry-content">
                        <p><?php esc_html_e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'wpblog-theme'); ?></p>
                        <?php get_search_form(); ?>
                    </div><!-- .entry-content -->
                <?php endif; // end current_user_can() check ?>

                </article><!-- #post-0 -->

            <?php endif; // end have_posts() check ?>

            </div><!-- #content -->
        </div><!-- #primary -->

        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12 vertical-sidebar">
            <?php get_sidebar (); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
