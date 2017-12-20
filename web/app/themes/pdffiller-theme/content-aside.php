<?php
/**
 * @package        WPblog Theme
 * @author         GoGetThemes.com
 * @copyright      2017 GoGetThemes
 * @version        Release: v1.0
 * The template for displaying posts in the Aside post format
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="aside">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<div class="entry-content">
				<?php the_content( esc_html__( 'Continue reading', 'wpblog-theme') . ' <span class="meta-nav">&rarr;</span>' ); ?>
			</div><!-- .entry-content -->
		</div><!-- .aside -->

		<footer class="entry-meta">
			<?php if ( comments_open() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'wpblog-theme') . '</span>', __( '1 Reply', 'wpblog-theme'), __( '% Replies', 'wpblog-theme') ); ?>
			</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>
			<?php edit_post_link( __( 'Edit', 'wpblog-theme'), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
