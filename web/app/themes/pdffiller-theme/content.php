<?php
/**
 * @package        WPblog Theme
 * @author         GoGetThemes.com
 * @copyright      2017 GoGetThemes
 * @version        Release: v1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="post-media-wrap">
        <?php the_post_thumbnail('full', array('class' => 'aligncenter')); ?>
        <?php echo wpblog_theme_dateformat(); ?>


    </div>

    <div class="post-wrap clearfix">
        <div class="">
            <div class="entry-meta clearfix">

                <div class="blog-comments">
                    <?php if (!post_password_required() && (comments_open() || get_comments_number())) :
                        ?>
                        <span
                            class="comments-link"><i class="ggtctrl-typing"></i><?php comments_popup_link(__('Leave a comment', 'wpblog-theme'), __('1 Comment', 'wpblog-theme'), __('% Comments', 'wpblog-theme')); ?></span>
                    <?php
                    endif; ?>
                </div>
                <div
                    class="cat-links"><?php echo get_the_category_list(_x('', 'Used between list items, there is a space after the comma.', 'wpblog-theme')); ?></div>

                <?php edit_post_link(__('Edit',  'wpblog-theme'), '<span class="edit-link">', '</span>');
                ?>
            </div>
            <!-- .entry-meta -->

            <header class="entry-header">
                <?php if (is_single()) :
                    the_title('<h1 class="entry-title">', '</h1>');
                else :
                    the_title('<h2 class="entry-title"><a href="' . esc_url(get_the_permalink()) . '" rel="bookmark">', '</a></h2>');
                endif;
                ?>
                <?php echo getPostLikeLink(get_the_ID());?>
                <div class="post-view">
                    <?php echo getPostViews(get_the_ID()); ?>
                </div>
            </header>
            <!-- .entry-header -->

            <?php if (!is_single()) : ?>
                <div class="entry-summary">
                    <?php the_excerpt(); ?>
                </div><!-- .entry-summary -->
            <?php else : ?>
                <div class="entry-content">
                    <?php
                    the_content(__('Continue reading', 'wpblog-theme') . ' <span class="meta-nav">&rarr;</span>' );
                    ?>
                </div><!-- .entry-content -->
            <?php endif;
            wp_link_pages(array(
                'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'wpblog-theme') . '</span>',
                'after' => '</div>',
                'link_before' => '<span>',
                'link_after' => '</span>',
            ));
            ?>


            <?php if (!is_single()): ?>
                <div class="post-footer text-left clearfix">

                    <a href="<?php the_permalink(); ?>"
                       class="read-more-link"><?php _e("Read more", "wpblog-theme"); ?></a>
                </div>


            <?php endif; ?>

        </div>
        <div class="footer-tags">
            <?php the_tags('<span class="tag-links">', '', '</span>'); ?>
        </div>
    </div>

    <?php setPostViews(get_the_ID()); ?>

</article><!-- #post-## -->













