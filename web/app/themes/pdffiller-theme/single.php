<?php
/**
 * @package        WPblog Theme
 * @author         GoGetThemes.com
 * @copyright      2017 GoGetThemes
 * @version        Release: v1.0
 * The Template for displaying all single posts
 */

get_header(); ?>
    <div class="row">
        <div class="container margin-container">
            <div id="primary" class="col-lg-8 col-md-8 col-xs-12 col-sm-12 site-content">


                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'content', get_post_format() ); ?>

                    <div class="author-box">
                        <div class="author-content">

                            <h4 class="title"><i class="icon-user"></i><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></h4>
                            <?php if ( get_the_author_meta('description')): ?>
                                <div class="description"><?php echo esc_html(get_the_author_meta('description'));?></div>
                            <?php endif; ?>
                        </div>
                        <div class="author-avatar">
                            <?php echo get_avatar( get_the_author_meta('ID'), 96); /*max 512*/?>
                        </div>
                    </div>


                    <?php comments_template( '', true ); ?>

                <?php endwhile; // end of the loop. ?>

            </div>
            <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12 vertical-sidebar">
                <?php get_sidebar (); ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>