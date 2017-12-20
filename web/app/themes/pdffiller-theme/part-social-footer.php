<?php
/**
 * @package        WPblog Theme
 * @author         GoGetThemes.com
 * @copyright      2017 GoGetThemes
 * @version        Release: v1.0
 */
?>
<ul class="social-icons unstyled list-unstyled list-inline">
    <?php if ('' != wpblog_theme_option('social_skype')): ?>
        <li><a class="socicon socicon-skype" title="<?php _e('Skype', 'wpblog-theme'); ?>"
               href="<?php echo esc_url("skype:" . wpblog_theme_option('social_skype'), array('skype')); ?>"><span class="social-line"></span>
            </a>
        <span class="social-label"><?php _e('Skype', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
    <?php if ('' != wpblog_theme_option('social_tumblr')): ?>
        <li><a class="socicon socicon-tumblr" title="<?php _e('Tumblr', 'wpblog-theme'); ?>"
               href="<?php echo esc_url(wpblog_theme_option('social_tumblr')); ?>"><span class="social-line"></span>
            </a>
            <span class="social-label"><?php _e('Tumblr', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
    <?php if ('' != wpblog_theme_option('social_digg')): ?>
        <li><a class="socicon socicon-digg" title="<?php _e('Digg', 'wpblog-theme'); ?>"
               href="<?php echo esc_url(wpblog_theme_option('social_digg')); ?>"><span class="social-line"></span>
            </a>
            <span class="social-label"><?php _e('Digg', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
    <?php if ('' != wpblog_theme_option('social_twitter')): ?>
        <li><a class="socicon socicon-twitter" title="<?php _e('Twitter', 'wpblog-theme'); ?>"
               href="<?php echo esc_url(wpblog_theme_option('social_twitter')); ?>"><span class="social-line"></span>
            </a>
            <span class="social-label"><?php _e('Twitter', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
    <?php if ('' != wpblog_theme_option('social_facebook')): ?>
        <li><a class="socicon socicon-facebook" title="<?php _e('Facebook', 'wpblog-theme'); ?>"
               href="<?php echo esc_url(wpblog_theme_option('social_facebook')); ?>"><span class="social-line"></span>
            </a>
            <span class="social-label"><?php _e('Facebook', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
    <?php if ('' != wpblog_theme_option('social_vimeo')): ?>
        <li><a class="socicon socicon-vimeo" title="<?php _e('Vimeo', 'wpblog-theme'); ?>"
               href="<?php echo esc_url(wpblog_theme_option('social_vimeo')); ?>"><span class="social-line"></span>
            </a>
            <span class="social-label"><?php _e('Vimeo', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
    <?php if ('' != wpblog_theme_option('social_youtube')): ?>
        <li><a class="socicon socicon-youtube" title="<?php _e('Youtube', 'wpblog-theme'); ?>"
               href="<?php echo esc_url(wpblog_theme_option('social_youtube')); ?>"><span class="social-line"></span>
            </a>
            <span class="social-label"><?php _e('Youtube', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
    <?php if ('' != wpblog_theme_option('social_rss')): ?>
        <li><a class="socicon socicon-rss" title="<?php _e('RSS', 'wpblog-theme'); ?>"
               href="<?php echo esc_url(wpblog_theme_option('social_rss')); ?>"><span class="social-line"></span>
            </a>
            <span class="social-label"><?php _e('RSS', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
    <?php if ('' != wpblog_theme_option('social_linkedin')): ?>
        <li><a class="socicon socicon-linkedin" title="<?php _e('Linkedin', 'wpblog-theme'); ?>"
               href="<?php echo esc_url(wpblog_theme_option('social_linkedin')); ?>"><span class="social-line"></span>
            </a>
            <span class="social-label"><?php _e('Linkedin', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
    <?php if ('' != wpblog_theme_option('social_google')): ?>
        <li><a class="socicon socicon-google" title="<?php _e('Google+', 'wpblog-theme'); ?>"
               href="<?php echo esc_url(wpblog_theme_option('social_google')); ?>"><span class="social-line"></span>
            </a>
            <span class="social-label"><?php _e('Google+', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
    <?php if ('' != wpblog_theme_option('social_pinterest')): ?>
        <li><a class="socicon socicon-pinterest" title="<?php _e('Pinterest', 'wpblog-theme'); ?>"
               href="<?php echo esc_url(wpblog_theme_option('social_pinterest')); ?>"><span class="social-line"></span>
            </a>
            <span class="social-label"><?php _e('Pinterest', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
    <?php if ('' != wpblog_theme_option('social_foursquare')): ?>
        <li><a class="socicon socicon-foursquare" title="<?php _e('Foursquare', 'wpblog-theme'); ?>"
               href="<?php echo esc_url(wpblog_theme_option('social_foursquare')); ?>"><span class="social-line"></span>
            </a>
            <span class="social-label"><?php _e('Foursquare', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
    <?php if ('' != wpblog_theme_option('social_soundcloud')): ?>
        <li><a class="socicon socicon-soundcloud" title="<?php _e('Soundcloud', 'wpblog-theme'); ?>"
               href="<?php echo esc_url(wpblog_theme_option('social_soundcloud')); ?>"><span class="social-line"></span>
            </a>
            <span class="social-label"><?php _e('Soundcloud', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
    <?php if ('' != wpblog_theme_option('social_spotify')): ?>
        <li><a class="socicon socicon-spotify" title="<?php _e('Spotify', 'wpblog-theme'); ?>"
               href="<?php echo esc_url(wpblog_theme_option('social_spotify')); ?>"><span class="social-line"></span>
            </a>
            <span class="social-label"><?php _e('Spotify', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
    <?php if ('' != wpblog_theme_option('social_vine')): ?>
        <li><a class="socicon socicon-vine" title="<?php _e('Vine', 'wpblog-theme'); ?>"
               href="<?php echo esc_url(wpblog_theme_option('social_vine')); ?>"><span class="social-line"></span>
            </a>
            <span class="social-label"><?php _e('Vine', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
    <?php if ('' != wpblog_theme_option('social_flickr')): ?>
        <li><a class="socicon socicon-flickr" title="<?php _e('Flickr', 'wpblog-theme'); ?>"
               href="<?php echo esc_url(wpblog_theme_option('social_flickr')); ?>"><span class="social-line"></span>
            </a>
            <span class="social-label"><?php _e('Flickr', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
    <?php if ('' != wpblog_theme_option('social_instagram')): ?>
        <li><a class="socicon socicon-instagram" title="<?php _e('Instagram', 'wpblog-theme'); ?>"
               href="<?php echo esc_url(wpblog_theme_option('social_instagram')); ?>"><span class="social-line"></span>
            </a>
            <span class="social-label"><?php _e('Instagram', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
    <?php if ('' != wpblog_theme_option('social_dribbble')): ?>
        <li><a class="socicon socicon-dribbble" title="<?php _e('Dribbble', 'wpblog-theme'); ?>"
               href="<?php echo esc_url(wpblog_theme_option('social_dribbble')); ?>"><span class="social-line"></span>
            </a>
            <span class="social-label"><?php _e('Dribbble', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
    <?php if ('' != wpblog_theme_option('social_behance')): ?>
        <li><a class="socicon socicon-behance" title="<?php _e('Behance', 'wpblog-theme'); ?>"
               href="<?php echo esc_url(wpblog_theme_option('social_behance')); ?>"><span class="social-line"></span>
            </a>
            <span class="social-label"><?php _e('Behance', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
    <?php if ('' != wpblog_theme_option('social_tripadvisor')): ?>
        <li><a class="socicon socicon-tripadvisor" title="<?php _e('TripAdvisor', 'wpblog-theme'); ?>"
               href="<?php echo esc_url(wpblog_theme_option('social_tripadvisor')); ?>"><span class="social-line"></span>
            </a>
            <span class="social-label"><?php _e('TripAdvisor', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
    <?php if ('' != wpblog_theme_option('social_reddit')): ?>
        <li><a class="socicon socicon-reddit" title="<?php _e('Reddit', 'wpblog-theme'); ?>"
               href="<?php echo esc_url(wpblog_theme_option('social_reddit')); ?>"><span class="social-line"></span>
            </a>
            <span class="social-label"><?php _e('Reddit', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
    <?php if ('' != wpblog_theme_option('social_apple')): ?>
        <li><a class="socicon socicon-apple" title="<?php _e('AppStore', 'wpblog-theme'); ?>"
               href="<?php echo esc_url(wpblog_theme_option('social_apple')); ?>"><span class="social-line"></span>
            </a>
            <span class="social-label"><?php _e('AppStore', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
    <?php if ('' != wpblog_theme_option('social_android')): ?>
        <li><a class="socicon socicon-android" title="<?php _e('Play&nbsp;Market', 'wpblog-theme'); ?>"
               href="<?php echo esc_url(wpblog_theme_option('social_android')); ?>"><span class="social-line"></span>
            </a>
            <span class="social-label"><?php _e('Play&nbsp;Market', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
    <?php if ('' != wpblog_theme_option('social_deviantart')): ?>
        <li><a class="socicon socicon-deviantart" title="<?php _e('DeviantART', 'wpblog-theme'); ?>"
               href="<?php echo esc_url(wpblog_theme_option('social_deviantart')); ?>"><span class="social-line"></span>
            </a>
            <span class="social-label"><?php _e('DeviantART', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
    <?php if ('' != wpblog_theme_option('social_forrst')): ?>
        <li><a class="socicon socicon-forrst" title="<?php _e('Forrst', 'wpblog-theme'); ?>"
               href="<?php echo esc_url(wpblog_theme_option('social_forrst')); ?>"><span class="social-line"></span>
            </a>
            <span class="social-label"><?php _e('Forrst', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
    <?php if ('' != wpblog_theme_option('social_github')): ?>
        <li><a class="socicon socicon-github" title="<?php _e('GitHub', 'wpblog-theme'); ?>"
               href="<?php echo esc_url(wpblog_theme_option('social_github')); ?>"><span class="social-line"></span>
            </a>
            <span class="social-label"><?php _e('GitHub', 'wpblog-theme'); ?></span>
        </li>
    <?php endif; ?>
</ul>
