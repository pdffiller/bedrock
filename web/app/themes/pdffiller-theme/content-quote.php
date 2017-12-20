<?php
/**
 * @package        WPblog Theme
 * @author         GoGetThemes.com
 * @copyright      2017 GoGetThemes
 * @version        Release: v1.0
 * The template for displaying posts in the Quote post format
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading', 'wpblog-theme') . ' <span class="meta-nav">&rarr;</span>' ); ?>
		</div><!-- .entry-content -->
	</article><!-- #post -->
