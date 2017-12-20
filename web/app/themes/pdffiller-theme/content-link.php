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
		<header><div class="emb-link"><i class="icon-link"></i><?php _e( 'Link', 'wpblog-theme'); ?></div></header>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading', 'wpblog-theme') . ' <span class="meta-nav">&rarr;</span>' ); ?>
		</div><!-- .entry-content -->
	</article><!-- #post -->
