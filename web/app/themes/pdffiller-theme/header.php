<?php
/**
 * @package        WPblog Theme
 * @author         GoGetThemes.com
 * @copyright      2017 GoGetThemes
 * @version        Release: v1.0
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */

?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" id="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0" />

    <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
        <?php if (wpblog_theme_option('favicon_img', 'url')) { ?>
            <link rel="shortcut icon" href="<?php echo esc_url(wpblog_theme_option('favicon_img', 'url')); ?>"
                  type="image/x-icon"/>
        <?php } ?>
    <?php } ?>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class();?>>

<div class="header-style
    <?php
    if( function_exists('get_field')) {
        $transparent_header = get_field('transparent_header');
        echo esc_html ( $transparent_header );
        echo esc_html ( ' ' );
        $select_header_skin = get_field('select_header_skin');
        echo esc_html ( $select_header_skin );

        }
    else {}
    ?>">





<div id="page" class="hfeed site page">
	<header id="masthead" class="site-header">
		<?php wpblog_theme_header();?>
	</header>
	<div id="main" class="wrapper main">