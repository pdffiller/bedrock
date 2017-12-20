<?php

/**
 * @package        WPblog Theme
 * @author         GoGetThemes.com
 * @copyright      2017 GoGetThemes
 * @version        Release: v1.0
 */

function wpblog_theme_option($key, $child = null)
{
    global $theme_options;

    if (!$child) {
        return isset($theme_options[$key]) ? $theme_options[$key] : false;
    } else {
        return isset($theme_options[$key]) && isset($theme_options[$key][$child]) ? $theme_options[$key][$child] : false;
    }
}

function wpblog_theme_get_header($child = null)
{   
    if (!class_exists( 'Redux' )) {
        get_template_part('/includes/headers/default');
    } else if (wpblog_theme_option('header-type-select')) {
        get_template_part('/includes/headers/'. wpblog_theme_option('header-type-select'));
    } else {
        get_template_part('/includes/headers/type1');
    }
}

function wpblog_theme_header()
{   
    wpblog_theme_get_header();
}

function wpblog_theme_get_header_contact($name)
{   
    /* Checking and creating fields for office */
    $office = wpblog_theme_option($name);
    if (!$office) {
        return;
    }

    $result = '';
    foreach ($office as $key => $value) {
        if (!$value) continue;
        switch ($key) {
            case 'address':
                $result .= '<div class="content-address"><i class="ggctrl-location-pin"></i><span>' . esc_html($value) . '</span></div>';
                break;
            
            case 'phone':
                $result .= '<div class="content-phone"><i class="ggctrl-phone"></i><span>' . esc_html($value) . '</span></div>';
                break;

            case 'email':
                $result .= '<div class="content-email"><i class="ggctrl-mail"></i><span>' . esc_html($value) . '</span></div>';
                break;
        }
    }

    return $result;
}

function wpblog_theme_get_header_wrap()
{   
    $active = false;
    if (wpblog_theme_option('header-switch-1')) {
        $office = '<div class="offices-tab';
        if (!$active) {
            $office .= ' active';
            $active = true;
        }
        $office .= '" id="office1"><div class="offices-content">';
        echo $office ;
        echo wpblog_theme_get_header_contact('header-office-values-1');
        echo '</div></div>';
    }
    if (wpblog_theme_option('header-switch-2')) {
        $office = '<div class="offices-tab';
        if (!$active) {
            $office .= ' active';
            $active = true;
        }
        $office .= '" id="office2"><div class="offices-content">';
        echo $office;
        echo wpblog_theme_get_header_contact('header-office-values-2');
        echo '</div></div>';
    }
    if (wpblog_theme_option('header-switch-3')) {
        $office = '<div class="offices-tab';
        if (!$active) {
            $office .= ' active';
            $active = true;
        }
        $office .= '" id="office3"><div class="offices-content">';
        echo $office;
        echo wpblog_theme_get_header_contact('header-office-values-3');
        echo '</div></div>';
    }
    if (wpblog_theme_option('header-switch-4')) {
        $office = '<div class="offices-tab';
        if (!$active) {
            $office .= ' active';
            $active = true;
        }
        $office .= '" id="office4"><div class="offices-content">';
        echo $office;
        echo wpblog_theme_get_header_contact('header-office-values-4');
        echo '</div></div>';
    }
    if (wpblog_theme_option('header-switch-5')) {
        $office = '<div class="offices-tab';
        if (!$active) {
            $office .= ' active';
            $active = true;
        }
        $office .= '" id="office5"><div class="offices-content">';
        echo $office;
        echo wpblog_theme_get_header_contact('header-office-values-5');
        echo '</div></div>';
    }
}

//Detect of mobile and tablet
function wpblog_theme_mobile()
{
    get_template_part('/includes/Mobile_Detect');
    $detect = new Mobile_Detect;

    return ($detect->isMobile() || $detect->isTablet())? true:false;
}

function wpblog_theme_walker_nav_menu($mobile=false)
{
    if ($mobile) {
        wp_nav_menu( array( 'theme_location'    => 'top-menu',
                            'menu_class' => 'nav-menu mobile-menu'
        )
    );

        return;
    }
    wp_nav_menu(
        array(
            'theme_location'    => 'top-menu',
            'menu_class' => 'nav-menu desktop-menu',
            'items_wrap' => '<ul id="%1$s" class="%2$s ul">%3$s</ul>',
//            'walker' => new wpblog_theme_walker_nav_menu()
        )
    );

}