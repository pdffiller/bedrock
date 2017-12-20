<?php
/**
 * @package        WPblog Theme
 * @author         GoGetThemes.com
 * @copyright      2017 GoGetThemes
 * @version        Release: v1.0
 * The template for displaying posts in the Link post format
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header><?php _e( 'Link', 'wpblog-theme'); ?></header>
		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'wpblog-theme'), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php echo get_the_date(); ?></a>
			<?php if ( comments_open() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'wpblog-theme') . '</span>', __( '1 Reply', 'wpblog-theme'), __( '% Replies', 'wpblog-theme') ); ?>
			</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>
			<?php edit_post_link( __( 'Edit', 'wpblog-theme'), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
