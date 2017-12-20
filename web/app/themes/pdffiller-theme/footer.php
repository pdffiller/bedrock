<?php
/**
 * @package        WPblog Theme
 * @author         GoGetThemes.com
 * @copyright      2017 GoGetThemes
 * @version        Release: v1.0
 * The template for displaying the footer
 */
?>
	</div><!-- #main .wrapper -->
	<footer class="footer-wrap">
        <?php if ( is_active_sidebar( 'sidebar-subscribe1' ) || is_active_sidebar( 'sidebar-subscribe2' )) : ?>
            <div class="container">
                <?php if ( is_active_sidebar( 'sidebar-subscribe1' ) ) : ?>
                    <div class="col-lg-6">
                        <?php dynamic_sidebar( 'sidebar-subscribe1' ); ?>
                    </div>
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'sidebar-subscribe2' ) ) : ?>
                    <div class="col-lg-6">
                        <?php dynamic_sidebar( 'sidebar-subscribe2' ); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if ( is_active_sidebar( 'sidebar-footer1' ) || is_active_sidebar( 'sidebar-footer2' ) || is_active_sidebar( 'sidebar-footer3' ) || is_active_sidebar( 'sidebar-footer4' )) : ?>
            <div class="container footer-widget-area">
                <?php if ( is_active_sidebar( 'sidebar-footer1' ) ) : ?>
                    <div class="col-lg-3">
                        <?php dynamic_sidebar( 'sidebar-footer1' ); ?>
                    </div>
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'sidebar-footer2' ) ) : ?>
                    <div class="col-lg-3">
                        <?php dynamic_sidebar( 'sidebar-footer2' ); ?>
                    </div>
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'sidebar-footer3' ) ) : ?>
                    <div class="col-lg-3">
                        <?php dynamic_sidebar( 'sidebar-footer3' ); ?>
                    </div>
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'sidebar-footer4' ) ) : ?>
                    <div class="col-lg-3">
                        <?php dynamic_sidebar( 'sidebar-footer4' ); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

            <div class="row site-info-menu-wrap">
                <div class="container">
                    <div class="col-lg-4">
                        <div class="site-info-social">
                            <?php get_template_part("part-social-footer"); ?>
                        </div>
                    </div>
                    <div class="col-lg-8 site-info-menu">
                        <div class="footer-menu">
                            <?php dynamic_sidebar( 'sidebar-footer-menu' ); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row site-info">
                <div class="container">
                    <div class="col-lg-6">
                        <div class="site-info-copyright">
                            <?php if ('' != wpblog_theme_option('copyright_text')): ?>
                                <?php echo esc_html(wpblog_theme_option('copyright_text')); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 text-right">
                        <div class="site-info-logo">
                            <img src="<?php echo esc_url(wpblog_theme_option("footer_logo_img", "url")); ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>

    </footer>
</div>


<?php wp_footer(); ?>
</div>
</body>
</html>