<?php
/**
 * @package        WPblog Theme
 * @author         GoGetThemes.com
 * @copyright      2017 GoGetThemes
 * @version        Release: v1.0
 * The sidebar containing the main widget area
 */
?>

	<?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'blog-sidebar' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>