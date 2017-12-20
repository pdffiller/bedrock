<?php
/**
 * @package        WPblog Theme
 * @author         GoGetThemes.com
 * @copyright      2017 GoGetThemes
 * @version        Release: v1.0
 * The template for displaying posts in the Image post format
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
			<?php 
				if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				}
				the_content();
			?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<h2><?php the_title(); ?></h2>
			</a>
            <div class="blog-date"><time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo get_the_date(); ?></time></div>
            <?php if ( comments_open() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'wpblog-theme') . '</span>', __( '1 Reply', 'wpblog-theme'), __( '% Replies', 'wpblog-theme') ); ?>
			</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>
			<?php edit_post_link( __( 'Edit', 'wpblog-theme'), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
