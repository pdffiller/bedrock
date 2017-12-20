<?php
/**
 * @package        WPblog Theme
 * @author         GoGetThemes.com
 * @copyright      2017 GoGetThemes
 * @version        Release: v1.0
 * The template for displaying posts in the Status post format
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading', 'wpblog-theme') . ' <span class="meta-nav">&rarr;</span>' ); ?>
            <div class="format-status-author"><?php the_author(); ?></div>

            <div class="status-wrap">

                <?php
                /**
                 * Filter the status avatar size.
                 *
                 * @param int $size The height and width of the avatar in pixels.
                 */
                $status_avatar = apply_filters( 'wpblog_theme_status_avatar', 48 );
                echo get_avatar( get_the_author_meta( 'ID' ), $status_avatar );
                ?>
            </div>
		</div><!-- .entry-content -->
        <footer>
            <?php echo wpblog_theme_dateformat(); ?>

        </footer>
	</article><!-- #post -->
