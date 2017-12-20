<?php

/**
 * @package        WPblog Theme
 * @author         GoGetThemes.com
 * @copyright      2017 GoGetThemes
 * @version        Release: v1.0
 */




if (post_password_required()) {
    return;
}

function wpblog_theme_callback($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;

    $tag = ('div' === $args['style']) ? 'div' : 'li';
    ?>
    <<?php echo esc_attr($tag); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class($args["has_children"] ? 'parent' : ''); ?>>
    <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
        <footer class="comment-meta">
            <div class="comment-author vcard clearfix">
                <div class="avatar-wrap">
                    <?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>
                </div>
                <div class="comment-info">
                    <?php printf('%s <span class="says">' . __('says:', 'wpblog-theme') . '</span>', sprintf('<b class="fn">%s</b>', get_comment_author_link())); ?>
                </div>
                <div class="comment-metadata">
                    <a href="<?php echo esc_url(get_comment_link($comment->comment_ID, $args)); ?>">
                        <time datetime="<?php comment_time('c'); ?>">
                            <?php printf(_x('%1$s at %2$s', '1: date, 2: time', 'wpblog-theme'), get_comment_date(), get_comment_time()); ?>
                        </time>
                    </a>
                </div>
                <?php if ('0' == $comment->comment_approved) : ?>
                    <p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'wpblog-theme'); ?></p>
                <?php endif; ?>
            </div>
            <!-- .comment-author -->

            <div class="comment-buttons pull-right">
                <?php
                comment_reply_link(array_merge($args, array(
                    'add_below' => 'div-comment',
                    'depth' => $depth,
                    'max_depth' => $args['max_depth'],
                    'before' => '<div class="reply">',
                    'after' => '</div>'
                )));
                ?>
                <?php edit_comment_link(__('Edit', 'wpblog-theme'), '<span class="edit-link">', '</span>'); ?>
            </div>
            <!-- .comment-metadata -->
        </footer>
        <!-- .comment-meta -->

        <div class="comment-content">
            <?php comment_text(); ?>
        </div>
        <!-- .comment-content -->

    </article><!-- .comment-body -->
<?php
}
?>

<div id="comments" class="comments-area">


    <?php if (have_comments()) : ?>
    <div class="comments-area-wrap">
        <h4 class="comments-title">
            <?php
            printf(_n('One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'wpblog-theme'),
                number_format_i18n(get_comments_number()), get_the_title());
            ?>
        </h4>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text"><?php _e('Comment navigation', 'wpblog-theme'); ?></h1>

                <div
                    class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'wpblog-theme')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'wpblog-theme')); ?></div>
            </nav><!-- #comment-nav-above -->
        <?php endif; // Check for comment navigation. ?>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style' => 'ol',
                'callback' => 'wpblog_theme_callback',
                'short_ping' => true,
                'avatar_size' => 64,
            ));
            ?>
        </ol><!-- .comment-list -->

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text"><?php _e('Comment navigation', 'wpblog-theme'); ?></h1>

                <div
                    class="nav-previous"><?php previous_comments_link(_e('&larr; Older Comments', 'wpblog-theme')); ?></div>
                <div class="nav-next"><?php next_comments_link(_e('Newer Comments &rarr;', 'wpblog-theme')); ?></div>
            </nav><!-- #comment-nav-below -->
        <?php endif; // Check for comment navigation. ?>

        <?php if (!comments_open()) : ?>
            <p class="no-comments"><?php _e('Comments are closed.', 'wpblog-theme'); ?></p>
        <?php endif; ?>

    </div>
    <?php endif; // have_comments() ?>

    <?php comment_form(); ?>

</div><!-- #comments -->

















