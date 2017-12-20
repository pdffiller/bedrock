<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    add_action( 'redux/loaded', 'skeleton_theme' );
    
    // This is your option name where all the Redux data is stored.
    $opt_name = "theme_options";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'theme_options',
        'display_name' => 'Theme Options',
        'display_version' => '1.0.0',
        'page_title' => 'Theme Options',
        'update_notice' => TRUE,
        'admin_bar' => TRUE,
        'dev_mode'  => FALSE,
        'menu_type' => 'menu',
        'menu_title' => 'Theme Options',
        'page_parent' => 'themes.php',
        'default_mark' => '*',
        'class' => 'theme_options',
        'hints' => array(
            'icon' => 'el el-bulb',
            'icon_position' => 'right',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover click',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus click',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
/*
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );
*/
    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */
/*
    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'admin_folder' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'admin_folder' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'admin_folder' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'admin_folder' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );
*/
    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'wpblog-theme' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */




Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Header',  'wpblog-theme'),
    'id'    => 'header',
    'desc'  => esc_html__( 'Header settings description',  'wpblog-theme'),
    'icon'  => 'el el-lines'
) );


Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'Select Header',  'wpblog-theme'),
    'id'         => 'header-type',
    'desc'       => esc_html__( 'Select header type, see examples on ',  'wpblog-theme') . '<a href="//google.com" target="_blank">demo site</a>',
    'subsection' => true,
    'icon' => 'el el-icon-adjust',
    'fields'     => array(

        array(
            'id'       => 'header-type-select',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Select Header Type',  'wpblog-theme'),
            'subtitle' => esc_html__( 'Select Default Header',  'wpblog-theme'),
            'options'  => array(
                'type1' => array(
                    'alt' => 'Type 1 | Simple Horizontal Header on top',
                    'img' => get_template_directory_uri() . '/includes/redux/img/header-type1.jpg',
                ),
                'type2' => array(
                    'alt' => 'Type 2 | Simple Vertical Header on left',
                    'img' => get_template_directory_uri() . '/includes/redux/img/header-type2.jpg',
                ),
                'type3' => array(
                    'alt' => 'Type 3 | Magazine Style Horizontal Header on top',
                    'img' => get_template_directory_uri() . '/includes/redux/img/header-type3.jpg',
                ),
                'type4' => array(
                    'alt' => 'Type 4 | Only Menu on top',
                    'img' => get_template_directory_uri() . '/includes/redux/img/header-type4.jpg',
                ),
                'type5' => array(
                    'alt' => 'Type 5 | Creative',
                    'img' => get_template_directory_uri() . '/includes/redux/img/header-type5.jpg',
                )
            ),
            'default'  => 'type5'
        ),



        /*-- Header Type 1--*/

        array(
            'id' => 'header_type_sticky_1',
            'type' => 'switch',
            'on' => 'Sticky header',
            'off' => 'Standard header',
            'title' => 'Use sticky header?',
            'description' => 'Sticky header allow to see menu when page scrolled.',
            'default' => false,
        ),
//        array(
//            'id' => 'header_type_menu_by_columns_title_type1',
//            'type' => 'switch',
//            'title' => 'Menu columns title',
//            'on' => 'Show titles',
//            'off' => 'Hide titles',
//            'description' => 'Items of 2-nd level are used as columns title. This option allow hide these titles.',
//            'default' => true,
//        ),
        array(
            'id' => 'header_type_search_switch',
            'type' => 'switch',
            'title' => esc_html__('Enable Search in header?', 'wpblog-theme'),
            'subtitle' => esc_html__('Enable Search in header?', 'wpblog-theme'),
            'desc' => esc_html__('Enable Search in header?', 'wpblog-theme'),
            'default' => true
        ),
        array(
            'id' => 'header_type_cart_switch',
            'type' => 'switch',
            'title' => esc_html__('Enable Cart in header?', 'wpblog-theme'),
            'subtitle' => esc_html__('Enable Cart in header?', 'wpblog-theme'),
            'desc' => esc_html__('Enable Cart in header?', 'wpblog-theme'),
            'default' => true
        ),
        array(
            'id' => 'header_type_login_switch',
            'type' => 'switch',
            'title' => esc_html__('Enable Login in header?', 'wpblog-theme'),
            'subtitle' => esc_html__('Enable Login in header?', 'wpblog-theme'),
            'desc' => esc_html__('Enable Login in header?', 'wpblog-theme'),
            'default' => true
        ),
        array(
            'id' => 'header_type_1_heading_menu',
            'type' => 'section',
            'title' => esc_html__('Menu Colors', 'wpblog-theme'),
            'subtitle' => esc_html__('Set Menu Colors', 'wpblog-theme'),
            'indent' => true, // Indent all options below until the next 'section' option is set.
            'required' => array('header-type-select', '=', 'type1'),
        ),
        array(
            'id'       => 'header_type1_background_image',
            'type'     => 'background',
            'title'    => __('Body 1 Background', 'wpblog-theme'),
            'subtitle' => __('Body 1 background with image, color, etc.', 'wpblog-theme'),
            'desc'     => __('This is the description field, again good for additional info.', 'wpblog-theme'),
            'output' => array('background-color' => '.header-type-background-image'),
            'required' => array('header-type-select', '=', 'type1'),
            'default'  => array(
                'background-color' => '#ffffff',
            )
        ),
        array(
            'id' => 'header_type_1_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.header-type-1, .transparent .header-action.header-animated-bottom .header-type-1 '),
            'title' => esc_html__('Header Type 1 Background color', 'wpblog-theme'),
            'subtitle' => esc_html__('Header Type 1 Background color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type1'),
        ),
        array(
            'id' => 'type1_first_level_menu_color',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu .li-level-1 a, .header-action.header-animated-bottom .desktop-menu .li-level-1 a'),
            'title' => esc_html__('Select First Level Menu Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select First Level Menu Color.', 'wpblog-theme'),
            'default' => '#221c24',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type1'),
        ),
        array(
            'id' => 'type1_first_level_menu_color_hover',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu .li-level-1 > a:hover, .mobile-menu > li > a.hover'),
            'title' => esc_html__('Select First Level Menu HOVER Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select First Level Menu HOVER Color.', 'wpblog-theme'),
            'default' => '#425cbb',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type1'),
        ),
        array(
            'id' => 'type1_second_level_menu_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.desktop-menu .li .ul .li, .mobile-menu li ul li, .desktop-menu .li-level-1:hover .ul-level-1 .li:first-child::before, .mobile-menu > li.hover > ul li:first-child::before, .desktop-menu .in-column div.sub-menu.ul-level-1 > div:hover, .desktop-menu .li-level-1.in-column:hover:after'),
            'title' => esc_html__('Select Second Level Menu Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Second Level Menu Background Color.', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type1'),
        ),
        array(
            'id' => 'type1_second_level_menu_bgcolor_hover',
            'type' => 'color',
            'output' => array('background-color' => '.desktop-menu .li .ul .li:hover, .mobile-menu li ul li.hover, .desktop-menu .li .ul .li:first-child:hover:before, .mobile-menu li ul li.hover:first-child:before, .desktop-menu .in-column div.sub-menu.ul-level-1 .li-level-2 .ul-level-2 a:hover'),
            'title' => esc_html__('Select Second Level Menu Background HOVER Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Second Level Menu Background HOVER Color.', 'wpblog-theme'),
            'default' => '#82f4da',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type1'),
        ),
        array(
            'id' => 'type1_second_level_menu_color',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu .li .ul .li a, .mobile-menu li ul li a, .desktop-menu .in-column div.sub-menu.ul-level-1 .li-level-2 .ul-level-2 a'),
            'title' => esc_html__('Select Second Level Menu Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Second Level Menu Color.', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type1'),
        ),
        array(
            'id' => 'type1_second_level_menu_color_hover',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu .li .ul .li a:hover, .mobile-menu li ul li a.hover'),
            'title' => esc_html__('Select Second Level Menu HOVER Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Second Level Menu HOVER Color.', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type1'),
        ),
        array(
            'id' => 'type1_third_level_menu_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.desktop-menu .li-level-2 .ul-level-2,
                                                    .desktop-menu .li .ul.sub-menu .li .ul.sub-menu .li:first-child:before,
                                                    .mobile-menu li ul.sub-menu li ul.sub-menu li:first-child:before'),
            'title' => esc_html__('Select the Third Level Menu Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select the Third Level Menu Background Color.', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type1'),
        ),
        array(
            'id' => 'type1_third_level_menu_bgcolor_hover',
            'type' => 'color',
            'output' => array('background-color' => '.mobile-menu li ul li ul li.hover, .ul.desktop-menu .li .ul.sub-menu .li .ul.sub-menu .li:first-child:hover:before, ul.mobile-menu li ul.sub-menu li ul.sub-menu li.hover:first-child:before'),
            'title' => esc_html__('Select the Third Level Menu Background HOVER Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select the Third Level Menu Background HOVER Color.', 'wpblog-theme'),
            'default' => '#82f4da',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type1'),
        ),
        array(
            'id' => 'type1_third_level_menu_color',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu .li .ul .li .ul .li a, .mobile-menu li ul li ul li a'),
            'title' => esc_html__('Select the Third Level Menu Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select the Third Level Menu Color.', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type1'),
        ),
        array(
            'id' => 'type1_third_level_menu_color_hover',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu .li .ul .li .ul .li a:hover, .mobile-menu li ul li ul li a.hover'),
            'title' => esc_html__('Select the Third Level Menu HOVER Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select the Third Level Menu HOVER Color.', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type1'),
        ),
        array(
            'id' => 'header_type_1_buttons_color',
            'type' => 'section',
            'title' => esc_html__('Header Buttons Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Set Buttons Color', 'wpblog-theme'),
            'indent' => true, // Indent all options below until the next 'section' option is set.
            'required' => array('header-type-select', '=', 'type1'),
        ),

            array(
                'id' => 'header_type_1_buttons_icon_hover_bgcolor',
                'type' => 'color',
                'output' => array('background-color' => '.header-type-1 .header-buttons a:hover'),
                'title' => esc_html__('Select Buttons Hover Background Color', 'wpblog-theme'),
                'subtitle' => esc_html__('Select Buttons Hover Background Color', 'wpblog-theme'),
                'default' => '#425cbb',
                'validate' => 'color',
                'required' => array('header-type-select', '=', 'type1'),
            ),
            array(
                'id' => 'header_type_1_buttons_icon_color',
                'type' => 'color',
                'output' => array('color' => '.header-type-1 .mobile-buttons-wrap > div > a, .header-buttons > a, .header-action.header-animated-bottom .mobile-buttons-wrap > div > a, .header-action.header-animated-bottom .header-type-1 .header-buttons i'),
                'title' => esc_html__('Select Buttons Color', 'wpblog-theme'),
                'subtitle' => esc_html__('Select Buttons Color', 'wpblog-theme'),
                'default' => '#171717',
                'validate' => 'color',
                'required' => array('header-type-select', '=', 'type1'),
            ),
            array(
                'id' => 'header_type_1_buttons_icon_hover_color',
                'type' => 'color',
                'output' => array('color' => '.header-type-1 .header-buttons a:hover i'),
                'title' => esc_html__('Select Buttons Hover Color', 'wpblog-theme'),
                'subtitle' => esc_html__('Select Buttons Hover Color', 'wpblog-theme'),
                'default' => '#ffffff',
                'validate' => 'color',
                'required' => array('header-type-select', '=', 'type1'),
            ),
            array(
                'id' => 'header_type_1_buttons_cart_bgcolor',
                'type' => 'color',
                'output' => array('background-color' => '.header-type-1 .total-info .cart-count-number'),
                'title' => esc_html__('Select Cart Counter Background Color', 'wpblog-theme'),
                'subtitle' => esc_html__('Select Cart Counter Background Color', 'wpblog-theme'),
                'default' => '#555555',
                'validate' => 'color',
                'required' => array('header-type-select', '=', 'type1'),
            ),
            array(
                'id' => 'header_type_1_buttons_cart_bgcolor',
                'type' => 'color',
                'output' => array('background-color' => '.header-type-1 .total-info'),
                'title' => esc_html__('Select Cart Counter Background Color', 'wpblog-theme'),
                'subtitle' => esc_html__('Select Cart Counter Background Color', 'wpblog-theme'),
                'default' => '#ffffff',
                'validate' => 'color',
                'required' => array('header-type-select', '=', 'type1'),
            ),
            array(
                'id' => 'header_type_1_buttons_cart_color',
                'type' => 'color',
                'output' => array('color' => '.header-type-1 .total-info'),
                'title' => esc_html__('Select Cart Counter Color', 'wpblog-theme'),
                'subtitle' => esc_html__('Select Cart Counter Color', 'wpblog-theme'),
                'default' => '#221c24',
                'validate' => 'color',
                'required' => array('header-type-select', '=', 'type1'),
            ),


        array(
            'id' => 'header_type_1_heading_infoheader',
            'type' => 'section',
            'title' => esc_html__('Info Header Colors', 'wpblog-theme'),
            'subtitle' => esc_html__('Set Top Info Header Colors', 'wpblog-theme'),
            'indent' => true, // Indent all options below until the next 'section' option is set.
            'required' => array('header-type-select', '=', 'type1'),
        ),

        array(
            'id' => 'header_type_1_heading_infoheader_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.header-type-1-top-header, #lang_sel li'),
            'title' => esc_html__('Select Info Header Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Background Color', 'wpblog-theme'),
            'default' => '#221c24',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type1'),
        ),

        array(
            'id' => 'header_type_1_heading_infoheader_text_color',
            'type' => 'color',
            'output' => array('color' => '.header-type-1-top-header'),
            'title' => esc_html__('Select Info Header Text & Icons Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Text & Icons Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type1'),
        ),
        array(
            'id' => 'header_type_1_heading_infoheader_select_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.select-top-header-options,
                                                    .wpml-block #lang_sel_click ul ul a,
                                                    .wpml-block #lang_sel_click a.lang_sel_sel,
                                                    .wpml-block #lang_sel a.lang_sel_sel'),
            'title' => esc_html__('Select Info Header Selects Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Selects Background', 'wpblog-theme'),
            'default' => '#221c24',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type1'),
        ),
        array(
            'id' => 'header_type_1_heading_infoheader_select_hover_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.wpml-block #lang_sel_click ul ul a:hover, .select-top-header-option:hover, .select-top-header:hover .select-top-header-option, .wpml-block #lang_sel_click a.lang_sel_sel:hover'),
            'title' => esc_html__('Select Info Header Selects Hover Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Selects Hover Background Color', 'wpblog-theme'),
            'default' => '#1a151c',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type1'),
        ),
        array(
            'id' => 'header_type_1_heading_infoheader_select_text_color',
            'type' => 'color',
            'output' => array('color' => '.select-top-header-options, .wpml-block #lang_sel_click a, .wpml-block #lang_sel_click ul ul a, .select-top-header:hover:before, .wpml-block:hover .lang_sel_sel::before'),
            'title' => esc_html__('Select Info Header Selects Text Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Selects Text Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type1'),
        ),
        array(
            'id' => 'header_type_1_heading_infoheader_select_text_hover_color',
            'type' => 'color',
            'output' => array('color' => '.select-top-header-options label:hover, .wpml-block #lang_sel_click a:hover, .wpml-block #lang_sel_click ul ul a:hover, .select-top-header:hover .select-top-header-option, .select-top-header:hover:after'),
            'title' => esc_html__('Select Info Header Selects Text Hover Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Selects Text Hover Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type1'),
        ),
        array(
            'id' => 'header_type_1_heading_infoheader_select_social_color',
            'type' => 'color',
            'output' => array('color' => '.social-icons .socicon'),
            'title' => esc_html__('Select Social Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Social Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type1'),
        ),
        array(
            'id' => 'header_type_1_heading_infoheader_select_social_hover_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.social-icons .socicon:hover'),
            'title' => esc_html__('Select Social Background Hover Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Social Background Hover Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type1'),
        ),
        array(
            'id' => 'header_type_1_heading_infoheader_select_social_hover_color',
            'type' => 'color',
            'output' => array('color' => '.social-icons .socicon:hover'),
            'title' => esc_html__('Select Social Hover Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Social Hover Color', 'wpblog-theme'),
            'default' => '#444444',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type1'),
        ),

        /*-- Header Type 2--*/


        array(
            'id' => 'header_type_sticky_2',
            'type' => 'switch',
            'on' => 'Sticky header',
            'off' => 'Standard header',
            'title' => 'Use sticky header?',
            'description' => 'Sticky header allow to see menu when page scrolled.',
            'required' => array('header-type-select', '=', 'type2'),
            'default' => false,
        ),
//        array(
//            'id' => 'header_type_menu_by_columns_title_type2',
//            'type' => 'switch',
//            'title' => 'Menu columns title',
//            'on' => 'Show titles',
//            'off' => 'Hide titles',
//            'description' => 'Items of 2-nd level are used as columns title. This option allow hide these titles.',
//            'required' => array('header-type-select', '=', 'type2'),
//            'default' => true,
//        ),
        array(
            'id' => 'header_type2-logo-margin-section',
            'type' => 'section',
            'title' => esc_html__('Logo Margin', 'wpblog-theme'),
            'indent' => true, // Indent all options below until the next 'section' option is set.
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id'             => 'header-type2-logo-margin',
            'type'           => 'spacing',
            'output'         => array('.logo_default'),
            'mode'           => 'margin',
            'units'          => array('em', 'px'),
            'units_extended' => 'false',
            'title'          => __('Padding/Margin Option', 'wpblog-theme'),
            'subtitle'       => __('Allow your users to choose the spacing or margin they want.', 'wpblog-theme'),
            'desc'           => __('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'wpblog-theme'),
            'required' => array('header-type-select', '=', 'type2'),
            'default'            => array(
                'margin-top'     => '1px',
                'margin-right'   => '2px',
                'margin-bottom'  => '3px',
                'margin-left'    => '4px',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'header_type_2_heading_menu',
            'type' => 'section',
            'title' => esc_html__('Menu Colors', 'wpblog-theme'),
            'subtitle' => esc_html__('Set Menu Colors', 'wpblog-theme'),
            'indent' => true, // Indent all options below until the next 'section' option is set.
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id'       => 'header_type2_background_image',
            'type'     => 'background',
            'title'    => __('Body 2 Background', 'wpblog-theme'),
            'subtitle' => __('Body 2 background with image, color, etc.', 'wpblog-theme'),
            'desc'     => __('This is the description field, again good for additional info.', 'wpblog-theme'),
            'output' => array('background-color' => '.header-type-background-image'),
            'required' => array('header-type-select', '=', 'type2'),
            'default'  => array(
                'background-color' => '#ffffff',
            )
        ),
        array(
            'id' => 'header_type_2_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.header-type-2, .header-animated-bottom .header-type-2'),
            'title' => esc_html__('Header Type 2 Background color', 'wpblog-theme'),
            'subtitle' => esc_html__('Header Type 2 Background color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'type2_first_level_menu_color',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu .li-level-1 a'),
            'title' => esc_html__('Select First Level Menu Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select First Level Menu Color.', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'type2_first_level_menu_color_hover',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu .li-level-1 > a:hover'),
            'title' => esc_html__('Select First Level Menu HOVER Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select First Level Menu HOVER Color.', 'wpblog-theme'),
            'default' => '#555555',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'type2_second_level_menu_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.desktop-menu .li .ul .li'),
            'title' => esc_html__('Select Second Level Menu Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Second Level Menu Background Color.', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'type2_second_level_menu_bgcolor_hover',
            'type' => 'color',
            'output' => array('background-color' => '.desktop-menu .li .ul .li:hover'),
            'title' => esc_html__('Select Second Level Menu Background HOVER Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Second Level Menu Background HOVER Color.', 'wpblog-theme'),
            'default' => '#222222',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'type2_second_level_menu_color',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu .li .ul .li a'),
            'title' => esc_html__('Select Second Level Menu Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Second Level Menu Color.', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'type2_second_level_menu_color_hover',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu .li .ul .li a:hover'),
            'title' => esc_html__('Select Second Level Menu HOVER Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Second Level Menu HOVER Color.', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'type2_third_level_menu_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.desktop-menu .li .ul .li-level-3.li'),
            'title' => esc_html__('Select the Third Level Menu Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select the Third Level Menu Background Color.', 'wpblog-theme'),
            'default' => '#f5f5f5',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'type2_third_level_menu_bgcolor_hover',
            'type' => 'color',
            'output' => array('background-color' => '.desktop-menu .li .ul .li-level-3.li:hover'),
            'title' => esc_html__('Select the Third Level Menu Background HOVER Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select the Third Level Menu Background HOVER Color.', 'wpblog-theme'),
            'default' => '#222222',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'type2_third_level_menu_color',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu .li .ul .li-level-3.li a'),
            'title' => esc_html__('Select the Third Level Menu Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select the Third Level Menu Color.', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'type2_third_level_menu_color_hover',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu .li .ul .li-level-3.li a:hover'),
            'title' => esc_html__('Select the Third Level Menu HOVER Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select the Third Level Menu HOVER Color.', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'header_type_2_buttons_color',
            'type' => 'section',
            'title' => esc_html__('Header Buttons Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Set Buttons Color', 'wpblog-theme'),
            'indent' => true, // Indent all options below until the next 'section' option is set.
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'header_type_2_buttons_icon_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.header-type-2 .header-buttons a'),
            'title' => esc_html__('Select Buttons Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Buttons Background Color', 'wpblog-theme'),
            'default' => 'transparent',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'header_type_2_buttons_icon_hover_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.header-type-2 .header-buttons a:hover'),
            'title' => esc_html__('Select Buttons Hover Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Buttons Hover Background Color', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'header_type_2_buttons_icon_color',
            'type' => 'color',
            'output' => array('color' => '.header-type-2 .header-buttons i'),
            'title' => esc_html__('Select Buttons Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Buttons Color', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'header_type_2_buttons_icon_hover_color',
            'type' => 'color',
            'output' => array('color' => '.header-type-2 .header-buttons a:hover i'),
            'title' => esc_html__('Select Buttons Hover Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Buttons Hover Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'header_type_2_buttons_cart_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.header-type-2 .total-info .cart-count-number'),
            'title' => esc_html__('Select Cart Counter Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Cart Counter Background Color', 'wpblog-theme'),
            'default' => '#f5f5f5',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'header_type_2_buttons_cart_color',
            'type' => 'color',
            'output' => array('color' => '.header-type-2 .total-info'),
            'title' => esc_html__('Select Cart Counter Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Cart Counter Color', 'wpblog-theme'),
            'default' => '#999999',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),


        array(
            'id' => 'header_type_2_heading_infoheader',
            'type' => 'section',
            'title' => esc_html__('Info Header Colors', 'wpblog-theme'),
            'subtitle' => esc_html__('Set Top Info Header Colors', 'wpblog-theme'),
            'indent' => true, // Indent all options below until the next 'section' option is set.
            'required' => array('header-type-select', '=', 'type2'),
        ),

        array(
            'id' => 'header_type_2_heading_infoheader_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.header-type-2-top-header,
                                                    #lang_sel a.lang_sel_sel'),
            'title' => esc_html__('Select Info Header Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Background Color', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),

        array(
            'id' => 'header_type_2_heading_infoheader_text_color',
            'type' => 'color',
            'output' => array('color' => '.header-type-2-top-header'),
            'title' => esc_html__('Select Info Header Text Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Text Color', 'wpblog-theme'),
            'default' => '#999999',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'header_type_2_heading_infoheader_icons_color',
            'type' => 'color',
            'output' => array('color' => '.offices-content > div > i'),
            'title' => esc_html__('Select Info Header Icons Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Icons Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'header_type_2_heading_infoheader_select_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.select-top-header-options,
                                                    .wpml-block #lang_sel a.lang_sel_sel,
                                                    #lang_sel ul ul a'),
            'title' => esc_html__('Select Info Header Selects Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Selects Background', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'header_type_2_heading_infoheader_select_hover_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.wpml-block #lang_sel a:hover,
                                                    .select-top-header-option:hover,
                                                    .select-top-header-toggle.select-top-header-toggle_type_open:hover'),
            'title' => esc_html__('Select Info Header Selects Hover Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Selects Hover Background Color', 'wpblog-theme'),
            'default' => '#222222',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'header_type_2_heading_infoheader_select_text_color',
            'type' => 'color',
            'output' => array('color' => '.select-top-header-options,
                                            .wpml-block #lang_sel a.lang_sel_sel,
                                            .select-top-header::after'),
            'title' => esc_html__('Select Info Header Selects Text Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Selects Text Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'header_type_2_heading_infoheader_select_text_hover_color',
            'type' => 'color',
            'output' => array('color' => '.select-top-header-option:hover,
                                            #lang_sel a:hover,
                                            #lang_sel ul ul a:hover,
                                            #lang_sel :hover > a,
                                            #lang_sel ul ul :hover > a,
                                            .wpml-block #lang_sel a.lang_sel_sel:hover,
                                            .select-top-header:hover:after'),
            'title' => esc_html__('Select Info Header Selects Text Hover Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Selects Text Hover Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'header_type_2_social_section',
            'type' => 'section',
            'title' => esc_html__('Socials Colors', 'wpblog-theme'),
            'indent' => true, // Indent all options below until the next 'section' option is set.
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'header_type_2_heading_infoheader_select_social_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.social-icons .socicon'),
            'title' => esc_html__('Select Social Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Social Background Color', 'wpblog-theme'),
            'default' => 'transparent',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'header_type_2_heading_infoheader_select_social_color',
            'type' => 'color',
            'output' => array('color' => '.social-icons .socicon'),
            'title' => esc_html__('Select Social Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Social Color', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'header_type_2_heading_infoheader_select_social_hover_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.social-icons .socicon:hover'),
            'title' => esc_html__('Select Social Background Hover Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Social Background Hover Color', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'header_type_2_heading_infoheader_select_social_hover_color',
            'type' => 'color',
            'output' => array('color' => '.social-icons .socicon:hover'),
            'title' => esc_html__('Select Social Hover Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Social Hover Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'header_type_2_social_alt_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.social-label'),
            'title' => esc_html__('Social Alt Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Social Alt Background Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),
        array(
            'id' => 'header_type_2_social_alt_color',
            'type' => 'color',
            'output' => array('color' => '.social-label'),
            'title' => esc_html__('Social Alt Text Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Social Alt Text Color', 'wpblog-theme'),
            'default' => '#999999',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type2'),
        ),

        /*-- Header Type 3--*/

        array(
            'id' => 'header_type_sticky_3',
            'type' => 'switch',
            'on' => 'Sticky header',
            'off' => 'Standard header',
            'title' => 'Use sticky header?',
            'description' => 'Sticky header allow to see menu when page scrolled.',
            'required' => array('header-type-select', '=', 'type3'),
            'default' => false,
        ),
//        array(
//            'id' => 'header_type_menu_by_columns_title_type3',
//            'type' => 'switch',
//            'title' => 'Menu columns title',
//            'on' => 'Show titles',
//            'off' => 'Hide titles',
//            'description' => 'Items of 2-nd level are used as columns title. This option allow hide these titles.',
//            'required' => array('header-type-select', '=', 'type3'),
//            'default' => true,
//        ),
        array(
            'id' => 'header_type_3_heading_menu',
            'type' => 'section',
            'title' => esc_html__('Menu Colors', 'wpblog-theme'),
            'subtitle' => esc_html__('Set Menu Colors', 'wpblog-theme'),
            'indent' => true, // Indent all options below until the next 'section' option is set.
            'required' => array('header-type-select', '=', 'type3'),
        ),
        array(
            'id'       => 'header_type3_background_image',
            'type'     => 'background',
            'title'    => __('Body 3 Background', 'wpblog-theme'),
            'subtitle' => __('Body 3 background with image, color, etc.', 'wpblog-theme'),
            'desc'     => __('This is the description field, again good for additional info.', 'wpblog-theme'),
            'output' => array('background-color' => '.header-type-background-image'),
            'required' => array('header-type-select', '=', 'type3'),
            'default'  => array(
                'background-color' => '#ffffff',
            )
        ),
        array(
            'id' => 'header_type_3_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.header-action, .transparent .header-action.header-animated-bottom'),
            'title' => esc_html__('Header Type 3 Background color', 'wpblog-theme'),
            'subtitle' => esc_html__('Header Type 3 Background color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type3'),
        ),
        array(
            'id' => 'type3_first_level_menu_color',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu .li-level-1 a, .transparent .header-action.header-animated-bottom a, .header-action.header-animated-bottom .desktop-menu .li-level-1 a'),
            'title' => esc_html__('Select First Level Menu Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select First Level Menu Color.', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type3'),
        ),
        array(
            'id' => 'type3_first_level_menu_color_hover',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu .li-level-1 > a:hover, .mobile-menu > li > a.hover'),
            'title' => esc_html__('Select First Level Menu HOVER Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select First Level Menu HOVER Color.', 'wpblog-theme'),
            'default' => '#3c80d9',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type3'),
        ),
        array(
            'id' => 'type3_second_level_menu_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.desktop-menu .in-column div.sub-menu.ul-level-1 > div:hover,
                                                    .desktop-menu .li-level-1 .ul-level-1'),
            'title' => esc_html__('Select Second Level Menu Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Second Level Menu Background Color.', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type3'),
        ),
        array(
            'id' => 'type3_second_level_menu_bgcolor_hover',
            'type' => 'color',
            'output' => array('background-color' => '.desktop-menu .in-column div.sub-menu.ul-level-1,
                                                    .desktop-menu .li .ul .li-level-2.li::before,
                                                    .desktop-menu .ul .current_page_item.li a::after'),
            'title' => esc_html__('Select Second Level Menu Background HOVER Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Second Level Menu Background HOVER Color.', 'wpblog-theme'),
            'default' => '#82f4da',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type3'),
        ),
        array(
            'id' => 'type3_second_level_menu_color',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu .li .ul .li a, .desktop-menu .in-column div.sub-menu.ul-level-1 .li-level-2 .ul-level-2 a'),
            'title' => esc_html__('Select Second Level Menu Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Second Level Menu Color.', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type3'),
        ),
        array(
            'id' => 'type3_second_level_menu_color_hover',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu .li .ul .li a:hover'),
            'title' => esc_html__('Select Second Level Menu HOVER Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Second Level Menu HOVER Color.', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type3'),
        ),
        array(
            'id' => 'type3_third_level_menu_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.desktop-menu .li-level-2 .ul-level-2,
                                                     .desktop-menu .li-level-1 .li-level-3'),
            'title' => esc_html__('Select the Third Level Menu Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select the Third Level Menu Background Color.', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type3'),
        ),
        array(
            'id' => 'type3_third_level_menu_bgcolor_hover',
            'type' => 'color',
            'output' => array('background-color' => '.desktop-menu .li-level-1 .li-level-3.li:before'),
            'title' => esc_html__('Select the Third Level Menu Background HOVER Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select the Third Level Menu Background HOVER Color.', 'wpblog-theme'),
            'default' => '#82f4da',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type3'),
        ),
        array(
            'id' => 'type3_third_level_menu_color',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu .li .ul .li .ul .li a, .mobile-menu li ul li ul li a'),
            'title' => esc_html__('Select the Third Level Menu Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select the Third Level Menu Color.', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type3'),
        ),
        array(
            'id' => 'type3_third_level_menu_color_hover',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu .li .ul .li .ul .li a:hover, .mobile-menu li ul li ul li a.hover'),
            'title' => esc_html__('Select the Third Level Menu HOVER Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select the Third Level Menu HOVER Color.', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type3'),
        ),
        array(
            'id' => 'header_type_3_buttons_color',
            'type' => 'section',
            'title' => esc_html__('Header Buttons Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Set Buttons Color', 'wpblog-theme'),
            'indent' => true, // Indent all options below until the next 'section' option is set.
            'required' => array('header-type-select', '=', 'type3'),
        ),

        array(
            'id' => 'header_type_3_buttons_icon_hover_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.header-type-3 .header-buttons a:hover'),
            'title' => esc_html__('Select Buttons Hover Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Buttons Hover Background Color', 'wpblog-theme'),
            'default' => '#3c80d9',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type3'),
        ),
        array(
            'id' => 'header_type_3_buttons_icon_color',
            'type' => 'color',
            'output' => array('color' => '.header-type-3 .header-buttons i, .transparent .header-action.header-animated-bottom i, .header-action.header-animated-bottom .header-type-3 .header-buttons i'),
            'title' => esc_html__('Select Buttons Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Buttons Color', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type3'),
        ),
        array(
            'id' => 'header_type_3_buttons_icon_hover_color',
            'type' => 'color',
            'output' => array('color' => '.header-type-3 .header-buttons a:hover i'),
            'title' => esc_html__('Select Buttons Hover Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Buttons Hover Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type3'),
        ),
        array(
            'id' => 'header_type_3_buttons_cart_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.header-type-3 .total-info .cart-count-number'),
            'title' => esc_html__('Select Cart Counter Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Cart Counter Background Color', 'wpblog-theme'),
            'default' => '#eeeeee',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type3'),
        ),
        array(
            'id' => 'header_type_3_buttons_cart_color',
            'type' => 'color',
            'output' => array('color' => '.header-type-3 .total-info'),
            'title' => esc_html__('Select Cart Counter Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Cart Counter Color', 'wpblog-theme'),
            'default' => '#999999',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type3'),
        ),
        array(
            'id' => 'header_type_3_heading_infoheader',
            'type' => 'section',
            'title' => esc_html__('Info Header Colors', 'wpblog-theme'),
            'subtitle' => esc_html__('Set Top Info Header Colors', 'wpblog-theme'),
            'indent' => true, // Indent all options below until the next 'section' option is set.
            'required' => array('header-type-select', '=', 'type3'),
        ),

        array(
            'id' => 'header_type_3_heading_infoheader_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.header-type-3-top-header'),
            'title' => esc_html__('Select Info Header Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Background Color', 'wpblog-theme'),
            'default' => '#40c17d',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type3'),
        ),

        array(
            'id' => 'header_type_3_heading_infoheader_text_color',
            'type' => 'color',
            'output' => array('color' => '.header-type-3-top-header'),
            'title' => esc_html__('Select Info Header Text & Icons Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Text & Icons Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type3'),
        ),
        array(
            'id' => 'header_type_3_heading_infoheader_select_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.select-top-header-options, .wpml-block #lang_sel_click ul ul a, .wpml-block #lang_sel_click a.lang_sel_sel'),
            'title' => esc_html__('Select Info Header Selects Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Selects Background', 'wpblog-theme'),
            'default' => '#40c17d',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type3'),
        ),
        array(
            'id' => 'header_type_3_heading_infoheader_select_hover_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.wpml-block #lang_sel_click ul ul a:hover, .select-top-header-option:hover, .select-top-header:hover .select-top-header-option, .wpml-block #lang_sel_click a.lang_sel_sel:hover'),
            'title' => esc_html__('Select Info Header Selects Hover Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Selects Hover Background Color', 'wpblog-theme'),
            'default' => '#3bb072',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type3'),
        ),
        array(
            'id' => 'header_type_3_heading_infoheader_select_text_color',
            'type' => 'color',
            'output' => array('color' => '.select-top-header-options, .wpml-block #lang_sel_click a, .wpml-block #lang_sel_click ul ul a, .select-top-header:hover:before, .wpml-block:hover .lang_sel_sel::before'),
            'title' => esc_html__('Select Info Header Selects Text Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Selects Text Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type3'),
        ),
        array(
            'id' => 'header_type_3_heading_infoheader_select_text_hover_color',
            'type' => 'color',
            'output' => array('color' => '.select-top-header-options label:hover, .wpml-block #lang_sel_click a:hover, .wpml-block #lang_sel_click ul ul a:hover, .select-top-header:hover .select-top-header-option, .select-top-header:hover:after'),
            'title' => esc_html__('Select Info Header Selects Text Hover Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Selects Text Hover Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type3'),
        ),
        array(
            'id' => 'header_type_3_heading_infoheader_select_social_color',
            'type' => 'color',
            'output' => array('color' => '.social-icons .socicon'),
            'title' => esc_html__('Select Social Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Social Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type3'),
        ),
        array(
            'id' => 'header_type_3_heading_infoheader_select_social_hover_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.social-icons .socicon:hover'),
            'title' => esc_html__('Select Social Background Hover Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Social Background Hover Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type3'),
        ),
        array(
            'id' => 'header_type_3_heading_infoheader_select_social_hover_color',
            'type' => 'color',
            'output' => array('color' => '.social-icons .socicon:hover'),
            'title' => esc_html__('Select Social Hover Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Social Hover Color', 'wpblog-theme'),
            'default' => '#444444',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type3'),
        ),


        /*-- Header Type 4--*/

        array(
            'id' => 'header_type_sticky_4',
            'type' => 'switch',
            'on' => 'Sticky header',
            'off' => 'Standard header',
            'title' => 'Use sticky header?',
            'description' => 'Sticky header allow to see menu when page scrolled.',
            'required' => array('header-type-select', '=', 'type4'),
            'default' => false,
        ),
//        array(
//            'id' => 'header_type_menu_by_columns_title_type4',
//            'type' => 'switch',
//            'title' => 'Menu columns title',
//            'on' => 'Show titles',
//            'off' => 'Hide titles',
//            'description' => 'Items of 2-nd level are used as columns title. This option allow hide these titles.',
//            'required' => array('header-type-select', '=', 'type4'),
//            'default' => true,
//        ),
        array(
            'id' => 'header_type_4_heading_menu',
            'type' => 'section',
            'title' => esc_html__('Menu Colors', 'wpblog-theme'),
            'subtitle' => esc_html__('Set Menu Colors', 'wpblog-theme'),
            'indent' => true, // Indent all options below until the next 'section' option is set.
            'required' => array('header-type-select', '=', 'type4'),
        ),
        array(
            'id'       => 'header_type4_background_image',
            'type'     => 'background',
            'title'    => __('Body 4 Background', 'wpblog-theme'),
            'subtitle' => __('Body 4 background with image, color, etc.', 'wpblog-theme'),
            'desc'     => __('This is the description field, again good for additional info.', 'wpblog-theme'),
            'output' => array('background-color' => '.header-type-background-image'),
            'required' => array('header-type-select', '=', 'type4'),
            'default'  => array(
                'background-color' => '#ffffff',
            )
        ),
        array(
            'id' => 'header_type_4_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.header-action, .transparent .header-action.header-animated-bottom'),
            'title' => esc_html__('Header Type 4 Background color', 'wpblog-theme'),
            'subtitle' => esc_html__('Header Type 3 Background color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type4'),
        ),
        array(
            'id' => 'type4_first_level_menu_color',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu .li-level-1 a, .mobile-menu > li a'),
            'title' => esc_html__('Select First Level Menu Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select First Level Menu Color.', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type4'),
        ),
        array(
            'id' => 'type4_first_level_menu_color_hover',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu .li-level-1 > a:hover, .mobile-menu > li > a.hover'),
            'title' => esc_html__('Select First Level Menu HOVER Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select First Level Menu HOVER Color.', 'wpblog-theme'),
            'default' => '#3c80d9',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type4'),
        ),
        array(
            'id' => 'type4_second_level_menu_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.desktop-menu .li .ul .li, .mobile-menu li ul li, .desktop-menu .li-level-1:hover .ul-level-1 .li:first-child::before, .mobile-menu > li.hover > ul li:first-child::before, .desktop-menu .in-column div.sub-menu.ul-level-1 > div:hover, .desktop-menu .li-level-1.in-column:hover:after'),
            'title' => esc_html__('Select Second Level Menu Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Second Level Menu Background Color.', 'wpblog-theme'),
            'default' => '#3c80d9',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type4'),
        ),
        array(
            'id' => 'type4_second_level_menu_bgcolor_hover',
            'type' => 'color',
            'output' => array('background-color' => '.desktop-menu .li .ul .li:hover, .mobile-menu li ul li.hover, .desktop-menu .li .ul .li:first-child:hover:before, .mobile-menu li ul li.hover:first-child:before, .desktop-menu .in-column div.sub-menu.ul-level-1 .li-level-2 .ul-level-2 a:hover'),
            'title' => esc_html__('Select Second Level Menu Background HOVER Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Second Level Menu Background HOVER Color.', 'wpblog-theme'),
            'default' => '#3570be',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type4'),
        ),
        array(
            'id' => 'type4_second_level_menu_color',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu .li .ul .li a, .mobile-menu li ul li a, .desktop-menu .in-column div.sub-menu.ul-level-1 .li-level-2 .ul-level-2 a'),
            'title' => esc_html__('Select Second Level Menu Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Second Level Menu Color.', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type4'),
        ),
        array(
            'id' => 'type4_second_level_menu_color_hover',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu .li .ul .li a:hover, .mobile-menu li ul li a.hover'),
            'title' => esc_html__('Select Second Level Menu HOVER Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Second Level Menu HOVER Color.', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type4'),
        ),
        array(
            'id' => 'type4_third_level_menu_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.desktop-menu .li .ul .li .ul .li, .mobile-menu li ul li ul li, .ul.desktop-menu .li .ul.sub-menu .li .ul.sub-menu .li:first-child:before, ul.mobile-menu li ul.sub-menu li ul.sub-menu li:first-child:before'),
            'title' => esc_html__('Select the Third Level Menu Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select the Third Level Menu Background Color.', 'wpblog-theme'),
            'default' => '#383838',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type4'),
        ),
        array(
            'id' => 'type4_third_level_menu_bgcolor_hover',
            'type' => 'color',
            'output' => array('background-color' => '.mobile-menu li ul li ul li.hover, .ul.desktop-menu .li .ul.sub-menu .li .ul.sub-menu .li:first-child:hover:before, ul.mobile-menu li ul.sub-menu li ul.sub-menu li.hover:first-child:before'),
            'title' => esc_html__('Select the Third Level Menu Background HOVER Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select the Third Level Menu Background HOVER Color.', 'wpblog-theme'),
            'default' => '#222222',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type4'),
        ),
        array(
            'id' => 'type4_third_level_menu_color',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu .li .ul .li .ul .li a, .mobile-menu li ul li ul li a'),
            'title' => esc_html__('Select the Third Level Menu Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select the Third Level Menu Color.', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type4'),
        ),
        array(
            'id' => 'type4_third_level_menu_color_hover',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu .li .ul .li .ul .li a:hover, .mobile-menu li ul li ul li a.hover'),
            'title' => esc_html__('Select the Third Level Menu HOVER Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select the Third Level Menu HOVER Color.', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type4'),
        ),
        array(
            'id' => 'header_type_4_buttons_color',
            'type' => 'section',
            'title' => esc_html__('Header Buttons Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Set Buttons Color', 'wpblog-theme'),
            'indent' => true, // Indent all options below until the next 'section' option is set.
            'required' => array('header-type-select', '=', 'type4'),
        ),

        array(
            'id' => 'header_type_4_buttons_icon_hover_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.header-type-4 .header-buttons a:hover'),
            'title' => esc_html__('Select Buttons Hover Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Buttons Hover Background Color', 'wpblog-theme'),
            'default' => '#3c80d9',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type4'),
        ),
        array(
            'id' => 'header_type_4_buttons_icon_color',
            'type' => 'color',
            'output' => array('color' => '.header-type-4 .header-buttons i'),
            'title' => esc_html__('Select Buttons Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Buttons Color', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type4'),
        ),
        array(
            'id' => 'header_type_4_buttons_icon_hover_color',
            'type' => 'color',
            'output' => array('color' => '.header-type-4 .header-buttons a:hover i'),
            'title' => esc_html__('Select Buttons Hover Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Buttons Hover Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type4'),
        ),
        array(
            'id' => 'header_type_4_buttons_cart_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.header-type-4 .total-info .cart-count-number'),
            'title' => esc_html__('Select Cart Counter Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Cart Counter Background Color', 'wpblog-theme'),
            'default' => '#eeeeee',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type4'),
        ),
        array(
            'id' => 'header_type_4_buttons_cart_color',
            'type' => 'color',
            'output' => array('color' => '.header-type-4 .total-info'),
            'title' => esc_html__('Select Cart Counter Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Cart Counter Color', 'wpblog-theme'),
            'default' => '#999999',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type4'),
        ),


        array(
            'id' => 'header_type_4_heading_infoheader',
            'type' => 'section',
            'title' => esc_html__('Info Header Colors', 'wpblog-theme'),
            'subtitle' => esc_html__('Set Top Info Header Colors', 'wpblog-theme'),
            'indent' => true, // Indent all options below until the next 'section' option is set.
            'required' => array('header-type-select', '=', 'type4'),
        ),

        array(
            'id' => 'header_type_4_heading_infoheader_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.header-type-3-top-header'),
            'title' => esc_html__('Select Info Header Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Background Color', 'wpblog-theme'),
            'default' => '#40c17d',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type4'),
        ),

        array(
            'id' => 'header_type_4_heading_infoheader_text_color',
            'type' => 'color',
            'output' => array('color' => '.header-type-4-top-header'),
            'title' => esc_html__('Select Info Header Text & Icons Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Text & Icons Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type4'),
        ),
        array(
            'id' => 'header_type_4_heading_infoheader_select_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.select-top-header-options, .wpml-block #lang_sel_click ul ul a, .wpml-block #lang_sel_click a.lang_sel_sel'),
            'title' => esc_html__('Select Info Header Selects Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Selects Background', 'wpblog-theme'),
            'default' => '#40c17d',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type4'),
        ),
        array(
            'id' => 'header_type_4_heading_infoheader_select_hover_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.wpml-block #lang_sel_click ul ul a:hover, .select-top-header-option:hover, .select-top-header:hover .select-top-header-option, .wpml-block #lang_sel_click a.lang_sel_sel:hover'),
            'title' => esc_html__('Select Info Header Selects Hover Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Selects Hover Background Color', 'wpblog-theme'),
            'default' => '#3bb072',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type4'),
        ),
        array(
            'id' => 'header_type_4_heading_infoheader_select_text_color',
            'type' => 'color',
            'output' => array('color' => '.select-top-header-options, .wpml-block #lang_sel_click a, .wpml-block #lang_sel_click ul ul a, .select-top-header:hover:before, .wpml-block:hover .lang_sel_sel::before'),
            'title' => esc_html__('Select Info Header Selects Text Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Selects Text Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type4'),
        ),
        array(
            'id' => 'header_type_4_heading_infoheader_select_text_hover_color',
            'type' => 'color',
            'output' => array('color' => '.select-top-header-options label:hover, .wpml-block #lang_sel_click a:hover, .wpml-block #lang_sel_click ul ul a:hover, .select-top-header:hover .select-top-header-option, .select-top-header:hover:after'),
            'title' => esc_html__('Select Info Header Selects Text Hover Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Selects Text Hover Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type4'),
        ),
        array(
            'id' => 'header_type_4_heading_infoheader_select_social_color',
            'type' => 'color',
            'output' => array('color' => '.social-icons .socicon'),
            'title' => esc_html__('Select Social Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Social Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type4'),
        ),
        array(
            'id' => 'header_type_4_heading_infoheader_select_social_hover_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.social-icons .socicon:hover'),
            'title' => esc_html__('Select Social Background Hover Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Social Background Hover Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type4'),
        ),
        array(
            'id' => 'header_type_4_heading_infoheader_select_social_hover_color',
            'type' => 'color',
            'output' => array('color' => '.social-icons .socicon:hover'),
            'title' => esc_html__('Select Social Hover Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Social Hover Color', 'wpblog-theme'),
            'default' => '#444444',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type4'),
        ),


        /*-- Header Type 5--*/


        array(
            'id' => 'header_type_sticky_5',
            'type' => 'switch',
            'on' => 'Sticky header',
            'off' => 'Standard header',
            'title' => 'Use sticky header?',
            'description' => 'Sticky header allow to see menu when page scrolled.',
            'required' => array('header-type-select', '=', 'type5'),
            'default' => false,
        ),
//        array(
//            'id' => 'header_type_menu_by_columns_title_type5',
//            'type' => 'switch',
//            'title' => 'Menu columns title',
//            'on' => 'Show titles',
//            'off' => 'Hide titles',
//            'description' => 'Items of 2-nd level are used as columns title. This option allow hide these titles.',
//            'required' => array('header-type-select', '=', 'type5'),
//            'default' => false,
//        ),
        array(
            'id' => 'header_type5-logo-margin-section',
            'type' => 'section',
            'title' => esc_html__('Logo Margin', 'wpblog-theme'),
            'indent' => true, // Indent all options below until the next 'section' option is set.
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id'             => 'header-type5-logo-margin',
            'type'           => 'spacing',
            'output'         => array('.logo_default'),
            'mode'           => 'margin',
            'units'          => array('em', 'px'),
            'units_extended' => 'false',
            'title'          => __('Padding/Margin Option', 'wpblog-theme'),
            'subtitle'       => __('Allow your users to choose the spacing or margin they want.', 'wpblog-theme'),
            'desc'           => __('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'wpblog-theme'),
            'required' => array('header-type-select', '=', 'type5'),
            'default'            => array(
                'margin-top'     => '0px',
                'margin-right'   => '0px',
                'margin-bottom'  => '0px',
                'margin-left'    => '0px',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'header_type_5_heading_menu',
            'type' => 'section',
            'title' => esc_html__('Menu Colors', 'wpblog-theme'),
            'subtitle' => esc_html__('Set Menu Colors', 'wpblog-theme'),
            'indent' => true, // Indent all options below until the next 'section' option is set.
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id'       => 'header_type5_background_image',
            'type'     => 'background',
            'title'    => __('Body 5 Background', 'wpblog-theme'),
            'subtitle' => __('Body 5 background with image, color, etc.', 'wpblog-theme'),
            'desc'     => __('This is the description field, again good for additional info.', 'wpblog-theme'),
            'output' => array('background-color' => '.header-type-background-image, .header-animated-bottom, .header-animated-top'),
            'required' => array('header-type-select', '=', 'type5'),
            'default'  => array(
                'background-color' => '#ffffff',
            )
        ),
        array(
            'id' => 'header_type_5_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.header-type-5.top-header,
                                                    .header-animated-bottom .header-type-5.top-header,
                                                    .header-animated-top .header-type-5.top-header,
                                                    .transparent .header-action.header-animated-bottom .header-type-5.top-header'),
            'title' => esc_html__('Header Menu Background color', 'wpblog-theme'),
            'subtitle' => esc_html__('Header Menu Background color', 'wpblog-theme'),
            'default' => '#f5f5f5',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'type5_first_level_menu_color',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu li a'),
            'title' => esc_html__('Select First Level Menu Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select First Level Menu Color.', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'type5_first_level_menu_color_hover',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu li > a:hover'),
            'title' => esc_html__('Select First Level Menu HOVER Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select First Level Menu HOVER Color.', 'wpblog-theme'),
            'default' => '#555555',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'type5_second_level_menu_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.desktop-menu li ul li'),
            'title' => esc_html__('Select Second Level Menu Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Second Level Menu Background Color.', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'type5_second_level_menu_bgcolor_hover',
            'type' => 'color',
            'output' => array('background-color' => '.desktop-menu li ul li:hover'),
            'title' => esc_html__('Select Second Level Menu Background HOVER Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Second Level Menu Background HOVER Color.', 'wpblog-theme'),
            'default' => '#222222',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'type5_second_level_menu_color',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu li ul li a'),
            'title' => esc_html__('Select Second Level Menu Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Second Level Menu Color.', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'type5_second_level_menu_color_hover',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu li ul li a:hover'),
            'title' => esc_html__('Select Second Level Menu HOVER Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Second Level Menu HOVER Color.', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'type5_third_level_menu_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.desktop-menu li ul li ul li'),
            'title' => esc_html__('Select the Third Level Menu Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select the Third Level Menu Background Color.', 'wpblog-theme'),
            'default' => '#f5f5f5',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'type5_third_level_menu_bgcolor_hover',
            'type' => 'color',
            'output' => array('background-color' => '.desktop-menu li ul li ul li:hover'),
            'title' => esc_html__('Select the Third Level Menu Background HOVER Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select the Third Level Menu Background HOVER Color.', 'wpblog-theme'),
            'default' => '#222222',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'type5_third_level_menu_color',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu li ul.sub-menu li ul.sub-menu li a'),
            'title' => esc_html__('Select the Third Level Menu Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select the Third Level Menu Color.', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'type5_third_level_menu_color_hover',
            'type' => 'color',
            'output' => array('color' => '.desktop-menu li ul.sub-menu li ul.sub-menu li a:hover,
                                           .transparent .header-action.header-animated-bottom li ul.sub-menu li ul.sub-menu li a:hover'),
            'title' => esc_html__('Select the Third Level Menu HOVER Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select the Third Level Menu HOVER Color.', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'header_type_5_buttons_color',
            'type' => 'section',
            'title' => esc_html__('Header Buttons Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Set Buttons Color', 'wpblog-theme'),
            'indent' => true, // Indent all options below until the next 'section' option is set.
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'header_type_5_buttons_icon_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.header-type-5 .header-buttons a'),
            'title' => esc_html__('Select Buttons Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Buttons Background Color', 'wpblog-theme'),
            'default' => 'transparent',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'header_type_5_buttons_icon_hover_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.header-type-5 .header-buttons a:hover'),
            'title' => esc_html__('Select Buttons Hover Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Buttons Hover Background Color', 'wpblog-theme'),
            'default' => 'transparent',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'header_type_5_buttons_icon_color',
            'type' => 'color',
            'output' => array('color' => '.header-type-5 .header-buttons i'),
            'title' => esc_html__('Select Buttons Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Buttons Color', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'header_type_5_buttons_icon_hover_color',
            'type' => 'color',
            'output' => array('color' => '.header-type-5 .header-buttons a:hover i'),
            'title' => esc_html__('Select Buttons Hover Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Buttons Hover Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'header_type_5_buttons_cart_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.header-type-5 .total-info .cart-count-number'),
            'title' => esc_html__('Select Cart Counter Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Cart Counter Background Color', 'wpblog-theme'),
            'default' => 'transparent',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'header_type_5_buttons_cart_color',
            'type' => 'color',
            'output' => array('color' => '.header-type-5 .total-info',
                                'background-color' => '.header-type-5 .total-info .cart-count-number::before'),
            'title' => esc_html__('Select Cart Counter Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Cart Counter Color', 'wpblog-theme'),
            'default' => '#999999',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),


        array(
            'id' => 'header_type_5_heading_infoheader',
            'type' => 'section',
            'title' => esc_html__('Info Header Colors', 'wpblog-theme'),
            'subtitle' => esc_html__('Set Top Info Header Colors', 'wpblog-theme'),
            'indent' => true, // Indent all options below until the next 'section' option is set.
            'required' => array('header-type-select', '=', 'type5'),
        ),

        array(
            'id' => 'header_type_5_heading_infoheader_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.header-type-5-top-header,
                                                    #lang_sel a.lang_sel_sel'),
            'title' => esc_html__('Select Info Header Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Background Color', 'wpblog-theme'),
            'default' => '#f5f5f5',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),

        array(
            'id' => 'header_type_5_heading_infoheader_text_color',
            'type' => 'color',
            'output' => array('color' => '.header-type-5-top-header'),
            'title' => esc_html__('Select Info Header Text Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Text Color', 'wpblog-theme'),
            'default' => '#999999',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'header_type_5_heading_infoheader_icons_color',
            'type' => 'color',
            'output' => array('color' => '.offices-content > div > i'),
            'title' => esc_html__('Select Info Header Icons Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Icons Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'header_type_5_heading_infoheader_select_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.select-top-header-options,
                                                    .wpml-block #lang_sel a.lang_sel_sel,
                                                    #lang_sel ul ul a'),
            'title' => esc_html__('Select Info Header Selects Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Selects Background', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'header_type_5_heading_infoheader_select_hover_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.wpml-block #lang_sel a:hover,
                                                    .select-top-header-option:hover,
                                                    .select-top-header-toggle.select-top-header-toggle_type_open:hover'),
            'title' => esc_html__('Select Info Header Selects Hover Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Selects Hover Background Color', 'wpblog-theme'),
            'default' => '#222222',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'header_type_5_heading_infoheader_select_text_color',
            'type' => 'color',
            'output' => array('color' => '.select-top-header-options,
                                            .wpml-block #lang_sel a.lang_sel_sel,
                                            .select-top-header::after'),
            'title' => esc_html__('Select Info Header Selects Text Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Selects Text Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'header_type_5_heading_infoheader_select_text_hover_color',
            'type' => 'color',
            'output' => array('color' => '.select-top-header-option:hover,
                                            #lang_sel a:hover,
                                            #lang_sel ul ul a:hover,
                                            #lang_sel :hover > a,
                                            #lang_sel ul ul :hover > a,
                                            .wpml-block #lang_sel a.lang_sel_sel:hover,
                                            .select-top-header:hover:after'),
            'title' => esc_html__('Select Info Header Selects Text Hover Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Info Header Selects Text Hover Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'header_type_5_social_section',
            'type' => 'section',
            'title' => esc_html__('Socials Colors', 'wpblog-theme'),
            'indent' => true, // Indent all options below until the next 'section' option is set.
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'header_type_5_heading_infoheader_select_social_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.social-icons .socicon'),
            'title' => esc_html__('Select Social Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Social Background Color', 'wpblog-theme'),
            'default' => 'transparent',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'header_type_5_heading_infoheader_select_social_color',
            'type' => 'color',
            'output' => array('color' => '.social-icons .socicon'),
            'title' => esc_html__('Select Social Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Social Color', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'header_type_5_heading_infoheader_select_social_hover_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.social-icons .socicon:hover'),
            'title' => esc_html__('Select Social Background Hover Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Social Background Hover Color', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'header_type_5_heading_infoheader_select_social_hover_color',
            'type' => 'color',
            'output' => array('color' => '.social-icons .socicon:hover'),
            'title' => esc_html__('Select Social Hover Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Select Social Hover Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'header_type_5_social_alt_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.social-label'),
            'title' => esc_html__('Social Alt Background Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Social Alt Background Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),
        array(
            'id' => 'header_type_5_social_alt_color',
            'type' => 'color',
            'output' => array('color' => '.social-label'),
            'title' => esc_html__('Social Alt Text Color', 'wpblog-theme'),
            'subtitle' => esc_html__('Social Alt Text Color', 'wpblog-theme'),
            'default' => '#999999',
            'validate' => 'color',
            'required' => array('header-type-select', '=', 'type5'),
        ),

        )
    ) );
Redux::setSection( $opt_name, array(
    'subsection' => true,
    'icon' => 'el el-icon-adjust',
    'title' => esc_html__('Logo Settings', 'wpblog-theme'),
    'desc'  => esc_html__( 'Add and customize logo',  'wpblog-theme'),
    'fields' => array(
        array(
            'id' => 'section_logo',
            'type' => 'section',
            'title' => esc_html__('Add logo', 'wpblog-theme'),
            'subtitle' => esc_html__('Add or edit logo', 'wpblog-theme'),
            'indent' => true // Indent all options below until the next 'section' option is set.
        ),

        array(
            'id' => 'logo_img',
            'type' => 'media',
            'title' => esc_html__('Site Logo for Header & Sticky Header', 'wpblog-theme'),
            'compiler' => true,
            'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'desc' => esc_html__('Use image with at least 54px height for best quality.', 'wpblog-theme'),
            'subtitle' => esc_html__('Upload logo for your website.', 'wpblog-theme'),
            'default' => array('url' => get_template_directory_uri() . "/images/logo-colored.png"),
            'preview' => true
        ),
        array(
            'id' => 'logo_img_light',
            'type' => 'media',
            'title' => esc_html__('Site Logo for Light Header skin', 'wpblog-theme'),
            'compiler' => true,
            'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'desc' => esc_html__('Use image with at least 54px height for best quality.', 'wpblog-theme'),
            'subtitle' => esc_html__('Upload logo for your website.', 'wpblog-theme'),
            'default' => array('url' => get_template_directory_uri() . "/images/logo-light.png"),
            'preview' => true
        ),
        array(
            'id' => 'logo_img_dark',
            'type' => 'media',
            'title' => esc_html__('Site Logo for Dark Header skin', 'wpblog-theme'),
            'compiler' => true,
            'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'desc' => esc_html__('Use image with at least 54px height for best quality.', 'wpblog-theme'),
            'subtitle' => esc_html__('Upload logo for your website.', 'wpblog-theme'),
            'default' => array('url' => get_template_directory_uri() . "/images/logo-dark.png"),
            'preview' => true
        ),
        array(
            'id' => 'section_logo_img_customization',
            'type' => 'section',
            'title' => esc_html__('Image Logo Customization', 'wpblog-theme'),
            'subtitle' => esc_html__('Your website Logo Image Settings.', 'wpblog-theme'),
            'indent' => true // Indent all options below until the next 'section' option is set.
        ),
        array(
            'id' => 'logo_size',
            'type' => 'button_set',
            'title' => esc_html__('Logo Size', 'wpblog-theme'),
            'description' => esc_html__('Select size of logo.', 'wpblog-theme'),
            'default' => true,
            'required' => array('logo_img', '!=', ''),
            'options' => array(
                'width' => 'Width',
                'height' => 'Height'
            ),
            'default' => 'height',
        ),
        array(
            'id' => 'logo_width',
            'type' => 'dimensions',
            'units' => array('px'),
            'output' => array('.header-logo img'),
            'width' => true,
            'height' => false,
            'description' => esc_html__('Set width for logo', 'wpblog-theme'),
            'default' => array(
                'width' => '100',
                'units' => 'px'
            ),
            'required' => array('logo_size', '=', 'width'),
        ),
        array(
            'id' => 'logo_height',
            'type' => 'dimensions',
            'units' => array('px'),
            'output' => array('.header-logo img'),
            'width' => false,
            'height' => true,
            'description' => esc_html__('Set height for logo', 'wpblog-theme'),
            'default' => array(
                'height' => '60',
                'units' => 'px'
            ),
            'required' => array('logo_size', '=', 'height'),
        ),
        array(
            'id' => 'section-logo-end',
            'type' => 'section',
            'indent' => false // Indent all options below until the next 'section' option is set.
        ),
        array(
            'id' => 'section_logo_text_customization',
            'type' => 'section',
            'title' => esc_html__('Logo Typography', 'wpblog-theme'),
            'subtitle' => esc_html__('Your website Logo Typography Settings.', 'wpblog-theme'),
            'indent' => true // Indent all options below until the next 'section' option is set.
        ),
        array(
            'id' => 'section_text_logo',
            'type' => 'section',
            'title' => esc_html__('Text Logotype', 'wpblog-theme'),
            'subtitle' => esc_html__('Your website  Text Logotype settings.', 'wpblog-theme'),
            'indent' => true // Indent all options below until the next 'section' option is set.
        ),
        array(
            'id' => 'text_logo_typography',
            'type' => 'typography',
            'letter-spacing' => true,
            'title' => esc_html__('Text Logo Typography', 'wpblog-theme'),
            'color' => true,
            'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup' => true, // Select a backup non-google font in addition to a google font
            'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
            'output' => array('.header-logo .site-title'), // An array of CSS selectors to apply this font style to dynamically
            'compiler' => array('.header-logo .site-title'), // An array of CSS selectors to apply this font style to dynamically
            'units' => 'px', // Defaults to px
            'subtitle' => esc_html__('Text Logo typography options.', 'wpblog-theme'),
            'default' => array(
                'font-weight' => '700',
                'font-style' => 'normal',
                'font-family' => 'Hind',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'google' => true,
                'color' => '#3c80d9',
                'font-size' => '25px',
                'line-height' => '45px',
                'letter-spacing' => '0px',
                'text-transform' => 'uppercase'
            ),
            'preview' => array('text' => 'Lorem ipsum', 'always_display' => true),
        ),
        array(
            'id' => 'tagline_logo_typography',
            'type' => 'typography',
            'letter-spacing' => true,
            'title' => esc_html__('Tagline Logo Typography', 'wpblog-theme'),
            'color' => true,
            'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup' => true, // Select a backup non-google font in addition to a google font
            'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
            'output' => array('.header-logo .description'), // An array of CSS selectors to apply this font style to dynamically
            'compiler' => array('.header-logo .description'), // An array of CSS selectors to apply this font style to dynamically
            'units' => 'px', // Defaults to px
            'subtitle' => esc_html__('Tagline Logo typography options.', 'wpblog-theme'),
            'default' => array(
                'font-weight' => '400',
                'font-style' => 'normal',
                'font-family' => 'Hind',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'google' => true,
                'color' => '#999999',
                'font-size' => '10px',
                'line-height' => '15px',
                'letter-spacing' => '1px',
                'text-transform' => 'uppercase'
            ),
            'preview' => array('text' => 'Lorem ipsum', 'always_display' => true),
        ),
        array(
            'id' => 'favicon_img',
            'type' => 'media',
            'title' => esc_html__('Select Favicon', 'wpblog-theme'),
            'compiler' => true,
            'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'desc' => esc_html__('Use image with at least 16x16px for best quality.', 'wpblog-theme'),
            'subtitle' => esc_html__('Upload favicon for your website.', 'wpblog-theme'),
            'default' => array('url' => get_template_directory_uri() . "/images/favicon.ico"),
            'preview' => true
        ),
        array(
            'id' => 'custom_logo_dimensions',
            'type' => 'switch',
            'title' => esc_html__('Customize logo dimensions?', 'wpblog-theme'),
            'subtitle' => esc_html__('Customize logo dimensions?.', 'wpblog-theme'),
            'desc' => esc_html__('Customize logo dimensions?', 'wpblog-theme'),
            'default' => true
        ),
        array(
            'id' => 'logo_padding',
            'type' => 'spacing',
            'required' => array('custom_logo_dimensions', '=', '1'),
            'output' => array('.logo'),
            'mode' => 'padding',
            'units' => array('px'),
            'units_extended' => 'false',
            'title' => esc_html__('Logo Padding', 'wpblog-theme'),
            'subtitle' => esc_html__('Logo Padding', 'wpblog-theme'),
            'desc' => esc_html__('Logo Padding', 'wpblog-theme'),
            'default' => array(
                'padding-top' => '0px',
                'padding-right' => '0px',
                'padding-bottom' => '0px',
                'padding-left' => '0px',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'logo_padding_sticky',
            'type' => 'spacing',
            'required' => array('custom_logo_dimensions', '=', '1'),
            'output' => array('body.is-sticky #site-header .logo'),
            'mode' => 'padding',
            'units' => array('px'),
            'units_extended' => 'false',
            'title' => esc_html__('Logo Padding in sticky mode', 'wpblog-theme'),
            'subtitle' => esc_html__('Logo Padding in sticky mode', 'wpblog-theme'),
            'desc' => esc_html__('Logo Padding in sticky mode', 'wpblog-theme'),
            'default' => array(
                'padding-top' => '0px',
                'padding-right' => '0px',
                'padding-bottom' => '0px',
                'padding-left' => '0px',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'section_text_logo',
            'type' => 'section',
            'indent' => false // Indent all options below until the next 'section' option is set.
        ),
    )
) );




Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'Footer',  'wpblog-theme'),
    'id'         => 'footer-section',
    'subsection' => false,
    'fields'     => array(
        array(
            'id' => 'footer_logo_img',
            'type' => 'media',
            'title' => esc_html__('Footer Logo image', 'wpblog-theme'),
            'compiler' => true,
            'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'desc' => esc_html__('Use image with at least 54px height for best quality.', 'wpblog-theme'),
            'subtitle' => esc_html__('Upload logo for your website.', 'wpblog-theme'),
            'default' => array('url' => get_template_directory_uri() . "/images/footer-logo.png"),
            'preview' => true
        ),
        array(
            "title" => "Copyright",
            "desc" => "Copyright Text.",
            "id" => "copyright_text",
            "default" => "Copyright 2017 'GoGetThemes.com' All Rights Reserved ",
            "type" => "text",
            'hint' => array(
                'content' => '',
            )
        )
    )
) );


Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Color Settings',  'wpblog-theme'),
    'id'    => 'customization',
    'desc'  => esc_html__( 'Themes color settings',  'wpblog-theme'),
    'icon'  => 'el el-home'
) );


Redux::setSection( $opt_name, array(
    'subsection' => true,
    'icon' => 'el el-icon-adjust',
    'title' => esc_html__('Modal Windows', 'wpblog-theme'),
    'fields' => array(
        array(
            'id' => 'modal_border_color',
            'type' => 'color',
            'output' => array('border-color' => '.modal-wrap'),
            'title' => esc_html__('Modal Window Border color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
        ),
        array(
            'id' => 'modal_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.modal-wrap-content'),
            'title' => esc_html__('Modal Window Background color', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
        ),
        array(
            'id' => 'modal_color',
            'type' => 'color',
            'output' => array('color' => '.modal-wrap-content,
                                           .login-password,
                                           .login-username,
                                           .login-remember'),
            'title' => esc_html__('Modal Title & text color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
        ),
        array(
            'id' => 'modal_close_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.modal-wrap .close'),
            'title' => esc_html__('Modal Close Button Background color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
        ),
        array(
            'id' => 'modal_close_color',
            'type' => 'color',
            'output' => array('color' => '.modal-wrap .close'),
            'title' => esc_html__('Modal Close Button color', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
        ),
        array(
            'id' => 'modal_input_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '#user_login,
                                                    #user_pass,
                                                    .searchform input'),
            'title' => esc_html__('Modal Input Background color', 'wpblog-theme'),
            'default' => 'transparent',
            'validate' => 'color',
        ),
        array(
            'id' => 'modal_input_color',
            'type' => 'color',
            'output' => array('color' => '#user_login,
                                            #user_pass,
                                            .searchform input'),
            'title' => esc_html__('Modal Input Text color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
        ),
        array(
            'id' => 'modal_input_border_color',
            'type' => 'color',
            'output' => array('border-color' => '#user_login,
                                            #user_pass,
                                            .searchform input'),
            'title' => esc_html__('Modal Input Border color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
        ),
        array(
            'id' => 'modal_button_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '#searchsubmit,
                                                    #wp-submit,
                                                    .button.wc-forward,
                                                    .button.checkout.wc-forward'),
            'title' => esc_html__('Modal Button Background color', 'wpblog-theme'),
            'default' => 'transparent',
            'validate' => 'color',
        ),
        array(
            'id' => 'modal_button_color',
            'type' => 'color',
            'output' => array('color' => '#searchsubmit,
                                        #wp-submit,
                                        .button.wc-forward,
                                        .button.checkout.wc-forward'),
            'title' => esc_html__('Modal Button Text color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
        ),
        array(
            'id' => 'modal_button_hover_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '#searchsubmit:hover,
                                                    #wp-submit:hover,
                                                    .button.wc-forward:hover,
                                                    .button.checkout.wc-forward:hover'),
            'title' => esc_html__('Modal Button Hover Background color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
        ),
        array(
            'id' => 'modal_button_hover_color',
            'type' => 'color',
            'output' => array('color' => '#searchsubmit:hover,
                                        #wp-submit:hover,
                                        .button.wc-forward:hover,
                                        .button.checkout.wc-forward:hover'),
            'title' => esc_html__('Modal Button Hover Text color', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
        ),
        array(
            'id' => 'modal_cart_item_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.modal-wrap .mini_cart_item'),
            'title' => esc_html__('Modal Cart Item Background color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
        ),
        array(
            'id' => 'modal_cart_link_color',
            'type' => 'color',
            'output' => array('color' => '.modal-wrap .mini_cart_item a'),
            'title' => esc_html__('Modal Cart Link color', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
        ),
        array(
            'id' => 'modal_cart_price_color',
            'type' => 'color',
            'output' => array('color' => '.modal-wrap .mini_cart_item .quantity'),
            'title' => esc_html__('Modal Cart Price color', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
        ),
    )
    ));
Redux::setSection( $opt_name, array(
    'subsection' => true,
    'icon' => 'el el-icon-adjust',
    'title' => esc_html__('GGT Addon Colors', 'wpblog-theme'),
    'fields' => array(
        array(
            'id' => 'addon_maincolor',
            'type' => 'color',
            'output' => array('background-color' => '.ggt-banner:hover .ggt-banner-name::before,
                                                     .slick-slider button.slick-arrow:hover::after,
                                                     .ggt-flex-nav-prev a:hover::after,
                                                     .ggt-flex-nav-next a:hover::after,
                                                     .ggt-infobox .ggt-infobox-button::after,
                                                     .ggt-image-overlay,
                                                     .ggt-posts-carousel .ggt-posts-carousel-item .ggt-project-image .ggt-image-overlay,
                                                     .ggt-pricing-plan .ggt-tagline,
                                                     .ggt-services .ggt-service:hover .ggt-icon,
                                                     .ggt-services .ggt-service-wrapper.service-highlight .ggt-icon,
                                                     .ggt-tabs.ggt-style2 .ggt-tab-nav .ggt-tab.ggt-active a,
                                                     .ggt-team-members.ggt-style1 .ggt-team-member:hover .ggt-social-list,
                                                     .ggt-team-members.ggt-style1 .ggt-team-member .ggt-image-wrapper .ggt-social-btn::before,
                                                     .ggt-testimonials.ggt-style3 .ggt-image-wrapper:after,
                                                     body.woocommerce-page .woocommerce-breadcrumb,
                                                     .breadcrumb-btn::after,
                                                     .instagallery-items .ig-item a:hover::after',
                                'border-color' => '.ggt-banner:hover .ggt-banner-name::before,
                                                   .ggt-services.ggt-style1 .ggt-service-wrapper.service-highlight .ggt-icon::after,
                                                   .ggt-services.ggt-style2 .ggt-service-wrapper.service-highlight .ggt-icon::after,
                                                   .ggt-services.ggt-style3 .ggt-service-wrapper.service-highlight .ggt-icon::after',
                                'color' => '.ggt-services .ggt-service-wrapper .ggt-icon',
                                'border-top-color' => '.ggt-tabs.ggt-style2 .ggt-tab-nav .ggt-tab.ggt-active::after'),
            'title' => esc_html__('Main color', 'wpblog-theme'),
            'default' => '#dd3333',
            'validate' => 'color',
        ),        array(
            'id' => 'addon_invercecolor',
            'type' => 'color',
            'output' => array('color' => '.ggt-banner:hover .ggt-banner-name::before,
                                          .slick-slider button.slick-arrow:hover::before,
                                          .ggt-flex-nav-prev a:hover::before,
                                          .ggt-flex-nav-next a:hover::before,
                                          .ggt-infobox .ggt-infobox-button:hover,
                                          .ggt-infobox .ggt-infobox-button::before,
                                          .ggt-entry-info .ggt-post-title a,
                                          .ggt-pricing-plan .ggt-tagline,
                                          .ggt-service:hover .ggt-icon,
                                          .ggt-services .ggt-service-wrapper.service-highlight .ggt-icon,
                                          .ggt-tabs.ggt-style2 .ggt-tab-nav .ggt-tab.ggt-active a,
                                          .ggt-team-members.ggt-style1 .ggt-team-member .ggt-image-wrapper .ggt-social-btn::before,
                                          .ggt-testimonials.ggt-style3 .ggt-image-wrapper:after,
                                          .breadcrumb-btn::after,
                                          .breadcrumb-current-item,
                                          body.woocommerce-page .woocommerce-breadcrumb a,
                                          .ggt-portfolio-wrap .ggt-portfolio .ggt-portfolio-item .ggt-project-image .ggt-image-info .ggt-terms a'),
            'title' => esc_html__('Inverce Main color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
        ),
    )
));
    Redux::setSection( $opt_name, array(
        'subsection' => true,
        'icon' => 'el el-icon-adjust',
        'title' => esc_html__('Blog Colors', 'wpblog-theme'),
        'fields' => array(
            array(
                'id' => 'blog_page_bgcolor',
                'type' => 'color',
                'output' => array('background-color' => 'body.blog .wrapper,
                                                         body.archive .wrapper,
                                                         body.search .wrapper,
                                                         body.single-post .wrapper'),
                'title' => esc_html__('Blog Page Background color', 'wpblog-theme'),
                'subtitle' => esc_html__('Blog Page Background color', 'wpblog-theme'),
                'default' => '#f5f5f5',
                'validate' => 'color',
            ),
            array(
                'id' => 'section-content',
                'type' => 'section',
                'title' => esc_html__('Content Setting', 'wpblog-theme'),
                'indent' => true,
            ),
            array(
                'id' => 'blog_content_bgcolor',
                'type' => 'color',
                'output' => array('background-color' => 'article.post,
                                                        article.page,
                                                        article .post-wrap,
                                                        .ggt-portfolio-wrap .ggt-portfolio .ggt-portfolio-item .hentry,
                                                        .ggt-post-loop-wrap .ggt-post-loop-item article.post'),
                'title' => esc_html__('Blog Content Background color', 'wpblog-theme'),
                'subtitle' => esc_html__('Blog Content Background color', 'wpblog-theme'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_content_color',
                'type' => 'color',
                'output' => array('color' => 'article.post,
                                            article.page,
                                            .comments-area,
                                            .post-like a::before,
                                            .post-view::before'),
                'title' => esc_html__('Blog Content  Text color', 'wpblog-theme'),
                'subtitle' => esc_html__('Blog Content Text color', 'wpblog-theme'),
                'default' => '#999999',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_content_link_color',
                'type' => 'color',
                'output' => array('color' => 'article.post a,
                                             article.page a,
                                            .comments-area a'),
                'title' => esc_html__('Blog Content  Link color', 'wpblog-theme'),
                'subtitle' => esc_html__('Blog Content Link color', 'wpblog-theme'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_content_readmore_bgcolor',
                'type' => 'color',
                'output' => array('background-color' => '.read-more-link:before'),
                'title' => esc_html__('Read More Button Background color', 'wpblog-theme'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_content_readmore_color',
                'type' => 'color',
                'output' => array('color' => 'article.post .read-more-link,
                                              article.page .read-more-link'),
                'title' => esc_html__('Read More Button color', 'wpblog-theme'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_content_readmore_bgcolor_hover',
                'type' => 'color',
                'output' => array('background-color' => '.read-more-link:hover:before'),
                'title' => esc_html__('Read More Button Background HOVER color', 'wpblog-theme'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_content_readmore_color_hover',
                'type' => 'color',
                'output' => array('color' => 'article.post .read-more-link:hover,
                                              article.page .read-more-link:hover'),
                'title' => esc_html__('Read More Button HOVER color', 'wpblog-theme'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_content_meta_category_bgcolor',
                'type' => 'color',
                'output' => array('background-color' => 'article .post-categories > li a'),
                'title' => esc_html__('Meta Category Background color', 'wpblog-theme'),
                'default' => 'transparent',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_content_meta_category_color',
                'type' => 'color',
                'output' => array('color' => 'article .post-categories > li a'),
                'title' => esc_html__('Meta Category Text color', 'wpblog-theme'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_content_meta_category_bgcolor_hover',
                'type' => 'color',
                'output' => array('background-color' => 'article .post-categories > li a:hover'),
                'title' => esc_html__('Meta Category Background HOVER color', 'wpblog-theme'),
                'default' => '#f5f5f5',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_content_meta_category_color_hover',
                'type' => 'color',
                'output' => array('color' => 'article .post-categories > li:hover a'),
                'title' => esc_html__('Meta Category Text HOVER color', 'wpblog-theme'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_content_navigation_color',
                'type' => 'color',
                'output' => array('color' => '.nav-previous > a,
                                                .nav-next > a',
                                    'background-color' => '.nav-previous > a:before,
                                                           .nav-next > a:before'),
                'title' => esc_html__('Prev/Next Button Text color', 'wpblog-theme'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_content_navigation_bgcolor_hover',
                'type' => 'color',
                'output' => array('background-color' => '.nav-previous > a:hover:before,
                                                         .nav-next > a:hover:before'),
                'title' => esc_html__('Prev/Next Button Background HOVER color', 'wpblog-theme'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_content_navigation_color_hover',
                'type' => 'color',
                'output' => array('color' => '.nav-previous > a:hover,
                                              .nav-next > a:hover'),
                'title' => esc_html__('Prev/Next Button Text HOVER color', 'wpblog-theme'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),

            array(
                'id' => 'section-widget-heading',
                'type' => 'section',
                'title' => esc_html__('Widgets Setting', 'wpblog-theme'),
                'indent' => true,
            ),
            array(
                'id' => 'blog_widget_search_bgcolor',
                'type' => 'color',
                'output' => array('background-color' => '.widget.widget_search .search-field,
                                                        .widget.widget_search .search-form'),
                'title' => esc_html__('Search Widget Background color', 'wpblog-theme'),
                'subtitle' => esc_html__('Search Widget Background color', 'wpblog-theme'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_widget_search_button_bgcolor',
                'type' => 'color',
                'output' => array('background-color' => '.widget.widget_search .search-submit'),
                'title' => esc_html__('Search Button Background color', 'wpblog-theme'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_widget_search_button_text',
                'type' => 'color',
                'output' => array('color' => '.widget.widget_search .search-submit'),
                'title' => esc_html__('Search Button Text color', 'wpblog-theme'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_widget_search_button_bgcolor_hover',
                'type' => 'color',
                'output' => array('background-color' => '.widget.widget_search .search-submit:hover'),
                'title' => esc_html__('Search Button Background HOVER color', 'wpblog-theme'),
                'default' => '#f5f5f5',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_widget_search_button_text_hover',
                'type' => 'color',
                'output' => array('color' => '.widget.widget_search .search-submit:hover'),
                'title' => esc_html__('Search Button Text HOVER color', 'wpblog-theme'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_widget_bgcolor',
                'type' => 'color',
                'output' => array('background-color' => 'aside.widget'),
                'title' => esc_html__('Blog Widgets Background color', 'wpblog-theme'),
                'subtitle' => esc_html__('Blog Widgets Background color', 'wpblog-theme'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_widget_color',
                'type' => 'color',
                'output' => array('color' => 'aside.widget'),
                'title' => esc_html__('Blog Widgets Text color', 'wpblog-theme'),
                'subtitle' => esc_html__('Blog Widgets Text color', 'wpblog-theme'),
                'default' => '#999999',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_widget_link_color',
                'type' => 'color',
                'output' => array('color' => 'aside.widget a'),
                'title' => esc_html__('Blog Widgets Link color', 'wpblog-theme'),
                'subtitle' => esc_html__('Blog Widgets Link color', 'wpblog-theme'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_content_heading_color',
                'type' => 'color',
                'title' => esc_html__('Blog Content Headings color', 'wpblog-theme'),
                'subtitle' => esc_html__('Blog Content Headings color', 'wpblog-theme'),
                'output' => array('color' => 'article.post h1, article.post h2, article.post h3, article.post h4, article.post h5, article.post h6'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_widget_heading_color',
                'type' => 'color',
                'title' => esc_html__('Blog Widgets Headings color', 'wpblog-theme'),
                'subtitle' => esc_html__('Blog Widgets Headings color', 'wpblog-theme'),
                'output' => array('color' => 'aside.widget h1, aside.widget h2, aside.widget h3, aside.widget h4, aside.widget h5, aside.widget h6'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_widget_heading_bgcolor',
                'type' => 'color',
                'title' => esc_html__('Blog Widgets Headings Background color', 'wpblog-theme'),
                'subtitle' => esc_html__('Blog Widgets Headings Background color', 'wpblog-theme'),
                'output' => array('background-color' => 'aside.widget h5'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'section-authorbox',
                'type' => 'section',
                'title' => esc_html__('Author Box', 'wpblog-theme'),
                'indent' => true,
            ),
            array(
                'id' => 'blog_authorbox_bgcolor',
                'type' => 'color',
                'title' => esc_html__('Author Box Background color', 'wpblog-theme'),
                'output' => array('background-color' => '.author-box'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_authorbox_border_color',
                'type' => 'color',
                'title' => esc_html__('Author Box Border color', 'wpblog-theme'),
                'output' => array('border-color' => '.author-box'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_authorbox_name_color',
                'type' => 'color',
                'title' => esc_html__('Author Name color', 'wpblog-theme'),
                'output' => array('color' => '.author-box h4 a'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_authorbox_text_color',
                'type' => 'color',
                'title' => esc_html__('Author Text color', 'wpblog-theme'),
                'output' => array('color' => '.author-content'),
                'default' => '#999999',
                'validate' => 'color',
            ),
            array(
                'id' => 'section-comments',
                'type' => 'section',
                'title' => esc_html__('Comments', 'wpblog-theme'),
                'indent' => true,
            ),
            array(
                'id' => 'blog_comment_wrap_bgcolor',
                'type' => 'color',
                'title' => esc_html__('Comment Wrapper Background color', 'wpblog-theme'),
                'output' => array('background-color' => '.comments-area .comments-area-wrap'),
                'default' => '#f5f5f5',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_comment_wrap_title_color',
                'type' => 'color',
                'title' => esc_html__('Comment Wrapper Title Color', 'wpblog-theme'),
                'output' => array('color' => '.comments-area-wrap .comments-title'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_comment_bgcolor',
                'type' => 'color',
                'title' => esc_html__('Comment item Background color', 'wpblog-theme'),
                'output' => array('background-color' => '.comment-body'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_comment_heading_color',
                'type' => 'color',
                'title' => esc_html__('Comment Headings color', 'wpblog-theme'),
                'output' => array('color' => '.comments-area h1, .comments-area h2, .comments-area h3, .comments-area h4, .comments-area h5, .comments-area h6'),
                'default' => '#999999',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_comment_text_color',
                'type' => 'color',
                'title' => esc_html__('Comment Text color', 'wpblog-theme'),
                'output' => array('color' => '.comments-area .comments-area-wrap'),
                'default' => '#999999',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_comment_link_color',
                'type' => 'color',
                'title' => esc_html__('Comment Link color', 'wpblog-theme'),
                'output' => array('color' => '.comment-meta a'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_comment_avatar_border_color',
                'type' => 'color',
                'title' => esc_html__('Comment Avatar Border color', 'wpblog-theme'),
                'output' => array('color' => '.comment-author .avatar-wrap'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_comment_button_bgcolor',
                'type' => 'color',
                'title' => esc_html__('Comment Button "Reply & Edit" Background color', 'wpblog-theme'),
                'output' => array('background-color' => '.comment-buttons .edit-link a, .comment-buttons .reply a'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_comment_button_color',
                'type' => 'color',
                'title' => esc_html__('Comment Button "Reply & Edit" Color', 'wpblog-theme'),
                'output' => array('color' => '.comment-buttons .edit-link a, .comment-buttons .reply a'),
                'default' => '#f5f5f5',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_commentform_bgcolor',
                'type' => 'color',
                'title' => esc_html__('Comment Form Background Color', 'wpblog-theme'),
                'output' => array('background-color' => '.comment-respond'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_commentform_inner_bgcolor',
                'type' => 'color',
                'title' => esc_html__('Comment Form Inner Background Color', 'wpblog-theme'),
                'output' => array('background-color' => '.single #commentform.comment-form'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_commentform_title_color',
                'type' => 'color',
                'title' => esc_html__('Comment Form Title Color', 'wpblog-theme'),
                'output' => array('color' => '.comments-area h3.comment-reply-title'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_commentform_text_color',
                'type' => 'color',
                'title' => esc_html__('Comment Form Text Color', 'wpblog-theme'),
                'output' => array('color' => '.comment-respond'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_commentform_link_color',
                'type' => 'color',
                'title' => esc_html__('Comment Form Link Color', 'wpblog-theme'),
                'output' => array('color' => '.logged-in-as a'),
                'default' => '#999999',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_commentform_textarea_color',
                'type' => 'color',
                'title' => esc_html__('Comment Form Textarea Text Color', 'wpblog-theme'),
                'output' => array('color' => '.comment-form-comment textarea'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_commentform_button_bgcolor',
                'type' => 'color',
                'title' => esc_html__('Comment Form Button Background Color', 'wpblog-theme'),
                'output' => array('background-color' => '.comment-form input.submit'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_commentform_button_color',
                'type' => 'color',
                'title' => esc_html__('Comment Form Button Text Color', 'wpblog-theme'),
                'output' => array('color' => '.comment-form input.submit'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog_commentform_button_bgcolor_hover',
                'type' => 'color',
                'title' => esc_html__('Comment Form Button Background HOVER Color', 'wpblog-theme'),
                'output' => array('background-color' => '.comment-form input.submit:hover'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),

            array(
                'id' => 'blog_commentform_button_color_hover',
                'type' => 'color',
                'title' => esc_html__('Comment Form Button Text HOVER Color', 'wpblog-theme'),
                'output' => array('color' => '.comment-form input.submit:hover'),
                'default' => '#000000',
                'validate' => 'color',
            ),

        )
    ) );
    Redux::setSection( $opt_name, array(
        'subsection' => true,
        'icon' => 'el el-icon-adjust',
        'title' => esc_html__('General Colors', 'wpblog-theme'),
        'fields' => array(
            array(
                'id' => 'background_bgcolor',
                'type' => 'color',
                'output' => array('background-color' => 'body, .wrapper'),
                'title' => esc_html__('Main Background color', 'wpblog-theme'),
                'subtitle' => esc_html__('Main Background color.', 'wpblog-theme'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'text_color',
                'type' => 'color',
                'output' => array('color' => 'body'),
                'title' => esc_html__('Text Color', 'wpblog-theme'),
                'subtitle' => esc_html__('Select Text Color.', 'wpblog-theme'),
                'default' => '#999999',
                'validate' => 'color',
            ),
            array(
                'id' => 'link_color',
                'type' => 'color',
                'output' => array('color' => 'a'),
                'title' => esc_html__('Link Color', 'wpblog-theme'),
                'subtitle' => esc_html__('Select Link Color.', 'wpblog-theme'),
                'default' => '#dd3333',
                'validate' => 'color',
            ),
            array(
                'id' => 'link_hover_color',
                'type' => 'color',
                'output' => array('color' => 'a:hover'),
                'title' => esc_html__('Link Hover Color', 'wpblog-theme'),
                'subtitle' => esc_html__('Select Link Hover Color.', 'wpblog-theme'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'h1_color',
                'type' => 'color',
                'output' => array('color' => 'h1'),
                'title' => esc_html__('H1 Heading color', 'wpblog-theme'),
                'subtitle' => esc_html__('H1 Heading color.', 'wpblog-theme'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'h2_color',
                'type' => 'color',
                'output' => array('color' => 'h2'),
                'title' => esc_html__('H2 Heading color', 'wpblog-theme'),
                'subtitle' => esc_html__('H2 Heading color.', 'wpblog-theme'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'h3_color',
                'type' => 'color',
                'output' => array('color' => 'h3'),
                'title' => esc_html__('H3 Heading color', 'wpblog-theme'),
                'subtitle' => esc_html__('H3 Heading color.', 'wpblog-theme'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'h4_color',
                'type' => 'color',
                'output' => array('color' => 'h4'),
                'title' => esc_html__('H4 Heading color', 'wpblog-theme'),
                'subtitle' => esc_html__('H4 Heading color.', 'wpblog-theme'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'h5_color',
                'type' => 'color',
                'output' => array('color' => 'h5'),
                'title' => esc_html__('H5 Heading color', 'wpblog-theme'),
                'subtitle' => esc_html__('H5 Heading color.', 'wpblog-theme'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'h6_color',
                'type' => 'color',
                'output' => array('color' => 'h6'),
                'title' => esc_html__('H6 Heading color', 'wpblog-theme'),
                'subtitle' => esc_html__('H6 Heading color.', 'wpblog-theme'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'button_bgcolor',
                'type' => 'color',
                'output' => array('background-color' => '.form-submit > input, .menu-toggle, input[type="submit"], input[type="button"], input[type="reset"], article.post-password-required input[type="submit"], .bypostauthor cite span, #wp-calendar #prev > a, #wp-calendar #next > a, .ggt-button',
                    'border-color' => '.form-submit > input, .menu-toggle, input[type="submit"], input[type="button"], input[type="reset"], article.post-password-required input[type="submit"], .bypostauthor cite span, #wp-calendar #prev > a, #wp-calendar #next > a, .ggt-button'),
                'title' => esc_html__('Button Background Color', 'wpblog-theme'),
                'subtitle' => esc_html__('Button Background Color.', 'wpblog-theme'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'button_color',
                'type' => 'color',
                'output' => array('color' => '.form-submit > input, .menu-toggle, input[type="submit"], input[type="button"], input[type="reset"], article.post-password-required input[type="submit"], .bypostauthor cite span, #wp-calendar #prev > a, #wp-calendar #next > a, .ggt-button'),
                'title' => esc_html__('Button Text Color', 'wpblog-theme'),
                'subtitle' => esc_html__('Button Text Color.', 'wpblog-theme'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'button_bgcolor_hover',
                'type' => 'color',
                'output' => array('background-color' => '.form-submit > input:hover,
                                                        .menu-toggle:hover,
                                                        input[type="submit"]:hover,
                                                        input[type="button"]:hover,
                                                        input[type="reset"]:hover,
                                                        article.post-password-required input[type="submit"]:hover,
                                                        .bypostauthor cite span:hover,
                                                        #wp-calendar #prev > a:hover,
                                                        #wp-calendar #next > a:hover,
                                                        .ggt-button:after',
                                      'border-color' => '.form-submit > input:hover,
                                                            .menu-toggle:hover,
                                                            input[type="submit"]:hover,
                                                            input[type="button"]:hover,
                                                            input[type="reset"]:hover,
                                                            article.post-password-required input[type="submit"]:hover,
                                                            .bypostauthor cite span:hover,
                                                            #wp-calendar #prev > a:hover,
                                                            #wp-calendar #next > a:hover,
                                                            .ggt-button:hover'),
                'title' => esc_html__('Button Hover Background Color', 'wpblog-theme'),
                'subtitle' => esc_html__('Button Hover Background Color.', 'wpblog-theme'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'button_color_hover',
                'type' => 'color',
                'output' => array('color' => '.form-submit > input:hover, .menu-toggle:hover, input[type="submit"]:hover, input[type="button"]:hover, input[type="reset"]:hover, article.post-password-required input[type="submit"]:hover, .bypostauthor cite span:hover, #wp-calendar #prev > a:hover, #wp-calendar #next > a:hover, .ggt-button:hover'),
                'title' => esc_html__('Button Hover Text Color', 'wpblog-theme'),
                'subtitle' => esc_html__('Button Hover Text Color.', 'wpblog-theme'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'button_border_color_hover',
                'type' => 'color',
                'output' => array('border-color' => '.ggt-button:hover'),
                'title' => esc_html__('Button Hover Border Color', 'wpblog-theme'),
                'subtitle' => esc_html__('Button Hover Border Color.', 'wpblog-theme'),
                'default' => '#ffffff',
                'important' => 'true',
                'validate' => 'color',
            ),
            array(
                'id' => 'border_line_color',
                'type' => 'color',
                'output' => array('border-color' => '.borderline-top,
                                                     .borderline-bottom,
                                                     .borderline-left,
                                                     .borderline-right,
                                                      aside.widget h5,
                                                     .vertical-sidebar aside.widget h5,
                                                     .ggt-team-members.ggt-style2 .ggt-social-list-item > a',
                                    'background' => '.post-wrap .entry-title::before,
                                                     .ggt-post-loop-wrap .entry-title::before,
                                                     .ggt-team-members.ggt-style2 .ggt-social-list-item > a::before,
                                                     .ggt-team-members.ggt-style2 .ggt-social-list-item > a:after,
                                                     aside.widget.blog-sidebar h5::before,
                                                     .ggt-portfolio-wrap .ggt-portfolio .ggt-portfolio-item .ggt-entry-meta span a::before'),
                'title' => esc_html__('Border Line Color', 'wpblog-theme'),
                'subtitle' => esc_html__('Border line for some elements Color.', 'wpblog-theme'),
                'default' => '#dedede',
                'validate' => 'color',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'subsection' => true,
        'icon' => 'el el-icon-adjust',
        'title' => esc_html__('Shop Colors', 'wpblog-theme'),
        'fields' => array(
            array(
                'id' => 'woo_content_bgcolor',
                'type' => 'color',
                'output' => array('background-color' => 'body.post-type-archive-product .wrapper, .woocommerce-page .wrapper'),
                'title' => esc_html__('Background', 'wpblog-theme'),
                'subtitle' => esc_html__('Woocommerce Page Content Background color', 'wpblog-theme'),
                'default' => '#f5f5f5',
                'validate' => 'color',
            ),
            array(
                'id' => 'woo_content_color',
                'type' => 'color',
                'output' => array('color' => '.woocommerce-page'),
                'title' => esc_html__('Text color', 'wpblog-theme'),
                'subtitle' => esc_html__('Woocommerce Page Content Text color', 'wpblog-theme'),
                'default' => '#999999',
                'validate' => 'color',
            ),
            array(
                'id' => 'woo_content_link_color',
                'type' => 'color',
                'output' => array('color' => '.woocommerce-page a'),
                'title' => esc_html__('Link color', 'wpblog-theme'),
                'subtitle' => esc_html__('Woocommerce Page Content Link color', 'wpblog-theme'),
                'default' => '#dd3333',
                'validate' => 'color',
            ),
            array(
                'id' => 'woo_content_heading_color',
                'type' => 'color',
                'title' => esc_html__('Headings color', 'wpblog-theme'),
                'subtitle' => esc_html__('Woocommerce Page Content Headings color', 'wpblog-theme'),
                'output' => array('color' => '.woocommerce-page h1, .woocommerce-page h2, .woocommerce-page h3, .woocommerce-page h4, .woocommerce-page h5, .woocommerce-page h6'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'woo_product_heading_color',
                'type' => 'color',
                'title' => esc_html__('Product Headings color', 'wpblog-theme'),
                'subtitle' => esc_html__('Woocommerce Product Headings color', 'wpblog-theme'),
                'output' => array('color' => '.woocommerce .product h1, .woocommerce .product h2, .woocommerce .product h3, .woocommerce .product h4, .woocommerce .product h5, .woocommerce .product h6'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'woo_product_heading_hover_color',
                'type' => 'color',
                'title' => esc_html__('Product Headings Hover color', 'wpblog-theme'),
                'subtitle' => esc_html__('Woocommerce Product Headings Hover color', 'wpblog-theme'),
                'output' => array('color' => '.woocommerce .products .product:hover h1, .woocommerce .products .product:hover h2, .woocommerce .products .product:hover h3, .woocommerce .products .product:hover h4, .woocommerce .products .product:hover h5, .woocommerce .products .product:hover h6'),
                'default' => '#222222',
                'validate' => 'color',
            ),
            array(
                'id' => 'woo_breadcrumb_link_color',
                'type' => 'color',
                'title' => esc_html__('Breadcrumb Link color', 'wpblog-theme'),
                'subtitle' => esc_html__('Woocommerce Page Breadcrumb Link color', 'wpblog-theme'),
                'output' => array('color' => 'body.woocommerce-page .woocommerce-breadcrumb a'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'woo_breadcrumb_color',
                'type' => 'color',
                'title' => esc_html__('Breadcrumb color', 'wpblog-theme'),
                'subtitle' => esc_html__('Woocommerce Page Breadcrumb color', 'wpblog-theme'),
                'output' => array('color' => 'body.woocommerce-page .woocommerce-breadcrumb'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'woo_button_color',
                'type' => 'color',
                'title' => esc_html__('Buttons color', 'wpblog-theme'),
                'subtitle' => esc_html__('Buttons Rating color', 'wpblog-theme'),
                'output' => array('color' => 'body.woocommerce #respond input#submit,
                                              body.woocommerce a.button,
                                              body.woocommerce button.button,
                                              body.woocommerce input.button,
                                              .woocommerce #respond input#submit.alt,
                                              .woocommerce a.button.alt,
                                              .woocommerce button.button.alt,
                                              .woocommerce input.button.alt'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'woo_button_hover_color',
                'type' => 'color',
                'title' => esc_html__('Hover Buttons color', 'wpblog-theme'),
                'subtitle' => esc_html__('Buttons Hover color', 'wpblog-theme'),
                'output' => array('color' => 'body.woocommerce #respond input#submit:hover,
                                              body.woocommerce a.button:hover,
                                              body.woocommerce button.button:hover,
                                              body.woocommerce input.button:hoverб
                                              .woocommerce #respond input#submit.alt:hover,
                                              .woocommerce a.button.alt:hover,
                                              .woocommerce button.button.alt:hover,
                                              .woocommerce input.button.alt:hover'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'woo_button_bg',
                'type' => 'color',
                'title' => esc_html__('Buttons Background', 'wpblog-theme'),
                'subtitle' => esc_html__('Buttons Rating Background color', 'wpblog-theme'),
                'output' => array('background-color' => 'body.woocommerce #page #respond input#submit,
                                                         body.woocommerce #page a.button,
                                                         body.woocommerce #page button.button,
                                                         body.woocommerce #page input.button,
                                                         .woocommerce #respond input#submit.alt,
                                                         .woocommerce a.button.alt,
                                                         .woocommerce button.button.alt,
                                                         .woocommerce input.button.alt'),
                'default' => '#dd3333',
                'validate' => 'color',
            ),
            array(
                'id' => 'woo_button_hover_bg',
                'type' => 'color',
                'title' => esc_html__('Hover Buttons Background', 'wpblog-theme'),
                'subtitle' => esc_html__('Buttons Hover Background color', 'wpblog-theme'),
                'output' => array('background-color' => 'body.woocommerce #page #respond input#submit:hover,
                                                         body.woocommerce #page a.button:hover,
                                                         body.woocommerce #page button.button:hover,
                                                         body.woocommerce #page input.button:hover,
                                                         .woocommerce #respond input#submit.alt:hover,
                                                         .woocommerce a.button.alt:hover,
                                                         .woocommerce button.button.alt:hover,
                                                         .woocommerce input.button.alt:hover'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'woo_star_bg',
                'type' => 'color',
                'title' => esc_html__('Stars Background', 'wpblog-theme'),
                'subtitle' => esc_html__('Star Rating Background color', 'wpblog-theme'),
                'output' => array('color' => 'body.woocommerce .star-rating::before'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'woo_star_color',
                'type' => 'color',
                'title' => esc_html__('Stars color', 'wpblog-theme'),
                'subtitle' => esc_html__('Star Rating color', 'wpblog-theme'),
                'output' => array('color' => '.woocommerce .star-rating span'),
                'default' => '#dd3333',
                'validate' => 'color',
            ),
            array(
                'id' => 'woo_star_hover_color',
                'type' => 'color',
                'title' => esc_html__('Hover Stars color', 'wpblog-theme'),
                'subtitle' => esc_html__('Star Rating Hover color', 'wpblog-theme'),
                'output' => array('color' => '.woocommerce .star-rating:hover span'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'woo_sale_color',
                'type' => 'color',
                'title' => esc_html__('Sale color', 'wpblog-theme'),
                'subtitle' => esc_html__('Sale Label color', 'wpblog-theme'),
                'output' => array('color' => 'body.woocommerce span.onsale'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'woo_sale_bg',
                'type' => 'color',
                'title' => esc_html__('Sale Background', 'wpblog-theme'),
                'subtitle' => esc_html__('Sale Label Background', 'wpblog-theme'),
                'output' => array('background-color' => 'body.woocommerce span.onsale'),
                'default' => '#dd3333',
                'validate' => 'color',
            ),
            array(
                'id' => 'woo_price_color',
                'type' => 'color',
                'title' => esc_html__('Price color', 'wpblog-theme'),
                'subtitle' => esc_html__('Price text color', 'wpblog-theme'),
                'output' => array('color' => 'body.woocommerce ul.products li.product .price, body.woocommerce div.product p.price, body.woocommerce div.product span.price'),
                'default' => '#000000',
                'validate' => 'color',
            ),
            array(
                'id' => 'woo_tab_color',
                'type' => 'color',
                'title' => esc_html__('Tab color', 'wpblog-theme'),
                'subtitle' => esc_html__('Product Tab color', 'wpblog-theme'),
                'output' => array('color' => 'body.woocommerce div.product .woocommerce-tabs ul.tabs li a'),
                'default' => '#515151',
                'validate' => 'color',
            ),
            array(
                'id' => 'woo_tab_hover_color',
                'type' => 'color',
                'title' => esc_html__('Tab Hover color', 'wpblog-theme'),
                'subtitle' => esc_html__('Product Tab Hover color', 'wpblog-theme'),
                'output' => array('color' => 'body.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover'),
                'default' => '#6b6b6b',
                'validate' => 'color',
            ),
            array(
                'id' => 'woo_tab_bg',
                'type' => 'color',
                'title' => esc_html__('Tab Background', 'wpblog-theme'),
                'subtitle' => esc_html__('Product Tab Background color', 'wpblog-theme'),
                'output' => array('background-color' => 'body.woocommerce div.product .woocommerce-tabs ul.tabs li'),
                'default' => '#ebe9eb',
                'validate' => 'color',
            ),
            array(
                'id' => 'woo_tab_color_active',
                'type' => 'color',
                'title' => esc_html__('Active Tab color', 'wpblog-theme'),
                'subtitle' => esc_html__('Product Active Tab color', 'wpblog-theme'),
                'output' => array('color' => 'body.woocommerce div.product .woocommerce-tabs ul.tabs li.active a'),
                'default' => '#515151',
                'validate' => 'color',
            ),
            array(
                'id' => 'woo_tab_bg_active',
                'type' => 'color',
                'title' => esc_html__('Active Tab Background', 'wpblog-theme'),
                'subtitle' => esc_html__('Product Active Tab Background color', 'wpblog-theme'),
                'output' => array('background-color' => 'body.woocommerce div.product .woocommerce-tabs ul.tabs li.active'),
                'default' => '#fff',
                'validate' => 'color',
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'subsection' => true,
        'icon' => 'el el-adjust-alt',
        'title' => esc_html__('Mobile menu', 'wpblog-theme'),
        'fields' => array(
            array(
                'id' => 'mobile_bgcolor',
                'type' => 'color',
                'title' => 'Mobile Header Background Color',
                'subtitle' => esc_html__('Mobile Buttons Color', 'wpblog-theme'),
                'output' => array('background-color' => '.mobile-menu-wrap'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'mobile_buttons_color',
                'type' => 'color',
                'title' => 'Mobile Buttons Color',
                'subtitle' => esc_html__('Mobile Buttons Color', 'wpblog-theme'),
                'output' => array('color' => '.header-action .mobile-buttons-wrap i,
                                                .transparent .header-action.header-animated-top .mobile-buttons-wrap i,
                                                .dark_skin .header-action .mobile-buttons-wrap i,
                                                .light_skin .header-action .mobile-buttons-wrap i,
                                                .dark_skin .mobile-menu-wrap .mobile-menu-btn i,
                                                .light_skin .mobile-menu-wrap .mobile-menu-btn i,
                                                .mobile-menu-wrap .mobile-menu-btn i'),
                'default' => '#000000',
                'validate' => 'color',
            ),
        )
    ) );

Redux::setSection( $opt_name, array(
    'subsection' => true,
    'icon' => 'el el-adjust-alt',
    'title' => esc_html__('Footer', 'wpblog-theme'),
    'desc'  => esc_html__( 'Customize your footer',  'wpblog-theme'),
    'fields' => array(
        array(
            'id' => 'footer_widget_area',
            'type' => 'section',
            'title' => esc_html__('Footer Widgets Area', 'wpblog-theme'),
            'indent' => true, // Indent all options below until the next 'section' option is set.
        ),
        array(
            'id'       => 'footer_bgcolor',
            'type'     => 'background',
            'title'    => __('Footer Background color', 'wpblog-theme'),
            'output' => array('background-color' => '.footer-wrap'),
            'default'  => array(
                'background-color' => '#000000',
            )
        ),
        array(
            'id' => 'footer_widget_search_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => 'footer .widget.widget_search .search-field'),
            'title' => esc_html__('Footer Search Widget Background color', 'wpblog-theme'),
            'default' => '#222222',
            'validate' => 'color',
        ),
        array(
            'id' => 'footer_widget_search_button_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => 'footer .widget.widget_search .search-submit'),
            'title' => esc_html__('Footer Search Button Background color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
        ),
        array(
            'id' => 'footer_widget_search_button_text',
            'type' => 'color',
            'output' => array('color' => 'footer .widget.widget_search .search-submit'),
            'title' => esc_html__('Footer Search Button Text color', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
        ),
        array(
            'id' => 'footer_widget_search_button_bgcolor_hover',
            'type' => 'color',
            'output' => array('background-color' => 'footer .widget.widget_search .search-submit:hover'),
            'title' => esc_html__('Footer Search Button Background HOVER color', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
        ),
        array(
            'id' => 'footer_widget_search_button_text_hover',
            'type' => 'color',
            'output' => array('color' => 'footer .widget.widget_search .search-submit:hover'),
            'title' => esc_html__('Footer Search Button Text HOVER color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
        ),
        array(
            'id' => 'footer_widget_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => 'footer aside.widget'),
            'title' => esc_html__('Footer  Widgets Background color', 'wpblog-theme'),
            'default' => '#000000',
            'validate' => 'color',
        ),
        array(
            'id' => 'footer_widget_color',
            'type' => 'color',
            'output' => array('color' => 'footer aside.widget'),
            'title' => esc_html__('Footer  Widgets Text color', 'wpblog-theme'),
            'default' => '#999999',
            'validate' => 'color',
        ),
        array(
            'id' => 'footer_widget_link_color',
            'type' => 'color',
            'output' => array('color' => 'footer aside.widget a'),
            'title' => esc_html__('Footer Widgets Link color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
        ),
        array(
            'id' => 'footer_widget_heading_color',
            'type' => 'color',
            'title' => esc_html__('Footer Widgets Headings color', 'wpblog-theme'),
            'output' => array('color' => 'footer aside.widget h1, footer aside.widget h2, footer aside.widget h3, footer aside.widget h4, footer aside.widget h5, footer aside.widget h6'),
            'default' => '#666666',
            'validate' => 'color',
        ),
        array(
            'id' => 'footer_widget_heading_bgcolor',
            'type' => 'color',
            'title' => esc_html__('Footer Widgets Headings Background color', 'wpblog-theme'),
            'output' => array('background-color' => 'footer aside.widget h5'),
            'default' => '#000000',
            'validate' => 'color',
        ),


        array(
            'id' => 'footer_social_section',
            'type' => 'section',
            'title' => esc_html__('Footer Socials Colors', 'wpblog-theme'),
            'indent' => true, // Indent all options below until the next 'section' option is set.
        ),
        array(
            'id' => 'footer_social_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.footer-wrap .social-icons .socicon'),
            'title' => esc_html__('Select Social Background Color', 'wpblog-theme'),
            'default' => 'transparent',
            'validate' => 'color',
        ),
        array(
            'id' => 'footer_social_color',
            'type' => 'color',
            'output' => array('color' => '.footer-wrap .social-icons .socicon'),
            'title' => esc_html__('Select Social Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
        ),
        array(
            'id' => 'footer_social_hover_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.footer-wrap .social-icons .socicon:hover'),
            'title' => esc_html__('Select Social Background Hover Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
        ),
        array(
            'id' => 'footer_social_hover_color',
            'type' => 'color',
            'output' => array('color' => '.footer-wrap .social-icons .socicon:hover'),
            'title' => esc_html__('Select Social Hover Color', 'wpblog-theme'),
            'default' => '#444444',
            'validate' => 'color',
        ),
        array(
            'id' => 'footer_social_alt_bgcolor',
            'type' => 'color',
            'output' => array('background-color' => '.footer-wrap .social-label'),
            'title' => esc_html__('Social Alt Background Color', 'wpblog-theme'),
            'default' => '#ffffff',
            'validate' => 'color',
        ),
        array(
            'id' => 'footer_social_alt_color',
            'type' => 'color',
            'output' => array('color' => '.footer-wrap .social-label'),
            'title' => esc_html__('Social Alt Text Color', 'wpblog-theme'),
            'default' => '#444444',
            'validate' => 'color',
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'subsection' => true,
    'icon' => 'el el-adjust-alt',
    'title' => esc_html__('Breadcrumbs', 'wpblog-theme'),
    'desc'  => esc_html__( 'Customize Breadcrumbs',  'wpblog-theme'),
    'fields' => array(
        array(
            'id'       => 'breadcrumbs_bgcolor',
            'type'     => 'background',
            'title'    => __('Breadcrumbs Background color', 'wpblog-theme'),
            'output' => array('background-color' => '.breadcrumb-wrap'),
            'default'  => array(
                'background-color' => '#ffffff',
            )
        ),
        array(
            'id'       => 'breadcrumbs_title_color',
            'type'     => 'color',
            'title'    => __('Breadcrumbs Title color', 'wpblog-theme'),
            'output' => array('color' => '.breadcrumb-wrap .entry-title'),
            'default' => '#000000',
            'validate' => 'color',
        ),
        array(
            'id'       => 'breadcrumbs_icon_color',
            'type'     => 'color',
            'title'    => __('Breadcrumbs Icon color', 'wpblog-theme'),
            'output' => array('color' => '.bread-link.bread-home'),
            'default' => '#999999',
            'validate' => 'color',
        ),
        array(
            'id'       => 'breadcrumbs_link_color',
            'type'     => 'color',
            'title'    => __('Breadcrumbs Link color', 'wpblog-theme'),
            'output' => array('color' => '.breadcrumb-wrap a'),
            'default' => '#999999',
            'validate' => 'color',
        ),
        array(
            'id'       => 'breadcrumbs_current_link_color',
            'type'     => 'color',
            'title'    => __('Breadcrumbs Current link color', 'wpblog-theme'),
            'output' => array('color' => '.breadcrumb-wrap .bread-current'),
            'default' => '#999999',
            'validate' => 'color',
        ),
    )
));













Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'Content',  'wpblog-theme'),
    'id'         => 'content-section',
    'subsection' => false,
    'fields'     => array(
    )));

Redux::setSection( $opt_name, array(
    'subsection' => true,
    'icon' => 'el el-icon-adjust',
    'title' => esc_html__('Office 1', 'wpblog-theme'),
    'fields' => array(
        array(
            "title" => "Use option?",
            "subtitle" => "Use this pack of options?",
            "id" => "header-switch-1",
            "default" => true,
            "type" => "switch"
        ),
        array(
            'title' => 'Office name',
            'description' => 'Fill Office name',
            'id' => 'header-office-1',
            'default' => 'London Office',
            'type' => 'text',
            'validate' => 'no_html',
            'required' => array('header-switch-1','=','1'),
        ),
        array(
            "title" => "Office fields",
            "subtitle" => "Leave empty to skip the field.",
            "description" => "Drag fields for positions change.",
            "id" => "header-office-values-1",
            "type" => "sortable",
            'mode' => 'text',
            'required' => array('header-switch-1','=','1'),
            'options' => array(
                'phone' => '+44 800 123000',
                'email' => 'info@domain.com',
                'address' => '400 Oxford St, London W1A 1AB',
            ),
            'default' => array(
                'phone' => '+44 800 123000',
                'email' => 'info@domain.com',
                'address' => '400 Oxford St, London W1A 1AB',
            ),
            'label' => true,
        ),
    )
) );
Redux::setSection( $opt_name, array(
    'subsection' => true,
    'icon' => 'el el-icon-adjust',
    'title' => esc_html__('Office 2', 'wpblog-theme'),
    'fields' => array(
        array(
            "title" => "Use option?",
            "subtitle" => "Use this pack of options?",
            "id" => "header-switch-2",
            "default" => false,
            "type" => "switch"
        ),
        array(
            'title' => 'Office name',
            'description' => 'Fill Office name',
            'id' => 'header-office-2',
            'default' => 'New York Office',
            'type' => 'text',
            'validate' => 'no_html',
            'required' => array('header-switch-2','=','1'),
        ),
        array(
            "title" => "Office fields",
            "subtitle" => "Leave empty to skip the field.",
            "description" => "Drag fields for positions change.",
            "id" => "header-office-values-2",
            "type" => "sortable",
            'mode' => 'text',
            'required' => array('header-switch-2','=','1'),
            'options' => array(
                'phone' => '+61 3 8376 6284',
                'email' => 'info@domain.com',
                'address' => '39 W 45th St, New York',
            ),
            'default' => array(
                'phone' => '+61 3 8376 6284',
                'email' => 'info@domain.com',
                'address' => 'Krung Thep Maha Nakhon 10400',
            ),
            'label' => true,
        ),
    )
) );
Redux::setSection( $opt_name, array(
    'subsection' => true,
    'icon' => 'el el-icon-adjust',
    'title' => esc_html__('Office 3', 'wpblog-theme'),
    'fields' => array(
        array(
            "title" => "Use option?",
            "subtitle" => "Use this pack of options?",
            "id" => "header-switch-3",
            "default" => false,
            "type" => "switch"
        ),
        array(
            'title' => 'Office name',
            'description' => 'Fill Office name',
            'id' => 'header-office-3',
            'default' => 'Bangkok Office',
            'type' => 'text',
            'validate' => 'no_html',
            'required' => array('header-switch-3','=','1'),
        ),
        array(
            "title" => "Office fields",
            "subtitle" => "Leave empty to skip the field.",
            "description" => "Drag fields for positions change.",
            "id" => "header-office-values-3",
            "type" => "sortable",
            'mode' => 'text',
            'required' => array('header-switch-3','=','1'),
            'options' => array(
                'phone' => '+61 3 8376 6284',
                'email' => 'info@domain.com',
                'address' => '121 King Street, Melbourne Victoria 3000 Australia',
            ),
            'default' => array(
                'phone' => '+61 3 8376 6284',
                'email' => 'info@domain.com',
                'address' => '121 King Street, Melbourne Victoria 3000 Australia',
            ),
            'label' => true,
        ),
    )
) );
Redux::setSection( $opt_name, array(
    'subsection' => true,
    'icon' => 'el el-icon-adjust',
    'title' => esc_html__('Office 4', 'wpblog-theme'),
    'fields' => array(
        array(
            "title" => "Use option?",
            "subtitle" => "Use this pack of options?",
            "id" => "header-switch-4",
            "default" => false,
            "type" => "switch"
        ),
        array(
            'title' => 'Office name',
            'description' => 'Fill Office name',
            'id' => 'header-office-4',
            'default' => 'Paris Office',
            'type' => 'text',
            'validate' => 'no_html',
            'required' => array('header-switch-4','=','1'),
        ),
        array(
            "title" => "Office fields",
            "subtitle" => "Leave empty to skip the field.",
            "description" => "Drag fields for positions change.",
            "id" => "header-office-values-4",
            "type" => "sortable",
            'mode' => 'text',
            'required' => array('header-switch-4','=','1'),
            'options' => array(
                'phone' => '+61 3 8376 6284',
                'email' => 'info@domain.com',
                'address' => '121 King Street, Melbourne Victoria 3000 Australia',
            ),
            'default' => array(
                'phone' => '+61 3 8376 6284',
                'email' => 'info@domain.com',
                'address' => '121 King Street, Melbourne Victoria 3000 Australia',
            ),
            'label' => true,
        ),
    )
) );
Redux::setSection( $opt_name, array(
    'subsection' => true,
    'icon' => 'el el-icon-adjust',
    'title' => esc_html__('Office 5', 'wpblog-theme'),
    'fields' => array(
        array(
            "title" => "Use option?",
            "subtitle" => "Use this pack of options?",
            "id" => "header-switch-5",
            "default" => false,
            "type" => "switch"
        ),
        array(
            'title' => 'Office name',
            'description' => 'Fill Office name',
            'id' => 'header-office-5',
            'default' => 'Hamburg Office',
            'type' => 'text',
            'validate' => 'no_html',
            'required' => array('header-switch-5','=','1'),
        ),
        array(
            "title" => "Office fields",
            "subtitle" => "Leave empty to skip the field.",
            "description" => "Drag fields for positions change.",
            "id" => "header-office-values-5",
            "type" => "sortable",
            'mode' => 'text',
            'required' => array('header-switch-5','=','1'),
            'options' => array(
                'phone' => '+61 3 8376 6284',
                'email' => 'info@domain.com',
                'address' => '121 King Street, Melbourne Victoria 3000 Australia',
            ),
            'default' => array(
                'phone' => '+61 3 8376 6284',
                'email' => 'info@domain.com',
                'address' => '121 King Street, Melbourne Victoria 3000 Australia',
            ),
            'label' => true,
        ),
    )
) );
Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-twitter',
        'subsection' => true,
        'title' => esc_html__('Social', 'wpblog-theme'),
        'fields' => array(
            array(
                'id' => 'section-social-start',
                'type' => 'section',
                'title' => esc_html__('Social', 'wpblog-theme'),
                'subtitle' => esc_html__('Social settings.', 'wpblog-theme'),
                'indent' => true,
            ),
            array(
                "title" => "Skype",
                "desc" => "Your skype username.",
                "id" => "social_skype",
                "default" => "GoGetThemes",
                "type" => "text",
                'hint' => array(
                    'content' => 'Social links are used in header and footer. If you want to remove some icons, just leave them empty and they will be ignored.',
                )
            ),
            array(
                "title" => "Tumblr",
                "desc" => "Your Tumblr profile link.",
                "id" => "social_tumblr",
                "default" => "",
                "type" => "text"
            ),
            array(
                "title" => "Facebook",
                "desc" => "Your Facebook profile link.",
                "id" => "social_facebook",
                "default" => "",
                "type" => "text"
            ),
            array(
                "title" => "Twitter",
                "desc" => "Your Twitter profile link.",
                "id" => "social_twitter",
                "default" => "https://twitter.com/GoGetThemes",
                "type" => "text"
            ),
            array(
                "title" => "Vimeo",
                "desc" => "Your Vimeo profile link.",
                "id" => "social_vimeo",
                "default" => "",
                "type" => "text"
            ),
            array(
                "title" => "YouTube",
                "desc" => "Your YouTube profile link.",
                "id" => "social_youtube",
                "default" => "https://www.youtube.com/user/BuyGoGetThemes",
                "type" => "text"
            ),
            array(
                "title" => "Google Plus",
                "desc" => "Your Google Plus profile link.",
                "id" => "social_google",
                "default" => "http://plus.google.com/u/0/110499019224982454742",
                "type" => "text"
            ),
            array(
                "title" => "RSS",
                "desc" => "Your RSS url.",
                "id" => "social_rss",
                "default" => "",
                "type" => "text"
            ),
            array(
                "title" => "LinkedIn",
                "desc" => "Your LinkedIn profile link.",
                "id" => "social_linkedin",
                "default" => "",
                "type" => "text"
            ),
            array(
                "title" => "Pinterest",
                "desc" => "Your Pinterest profile link.",
                "id" => "social_pinterest",
                "default" => "",
                "type" => "text"
            ),
            array(
                "title" => "Foursquare",
                "desc" => "Your Foursquare profile link.",
                "id" => "social_foursquare",
                "default" => "",
                "type" => "text"
            ),
            array(
                "title" => "Soundcloud",
                "desc" => "Your Soundcloud profile link.",
                "id" => "social_soundcloud",
                "default" => "",
                "type" => "text"
            ),
            array(
                "title" => "Spotify",
                "desc" => "Your Spotify profile link.",
                "id" => "social_spotify",
                "default" => "",
                "type" => "text"
            ),
            array(
                "title" => "Vine",
                "desc" => "Your Vine profile link.",
                "id" => "social_vine",
                "default" => "",
                "type" => "text"
            ),
            array(
                "title" => "Flickr",
                "desc" => "Your Flickr profile link.",
                "id" => "social_flickr",
                "default" => "",
                "type" => "text"
            ),
            array(
                "title" => "Instagram",
                "desc" => "Your Instagram profile link.",
                "id" => "social_instagram",
                "default" => "",
                "type" => "text"
            ),
            array(
                "title" => "Dribbble",
                "desc" => "Your Dribbble profile link.",
                "id" => "social_dribbble",
                "default" => "",
                "type" => "text"
            ),
            array(
                "title" => "Behance",
                "desc" => "Your Behance profile link.",
                "id" => "social_behance",
                "default" => "",
                "type" => "text"
            ),
            array(
                "title" => "Tripadvisor",
                "desc" => "Your Tripadvisor profile link.",
                "id" => "social_tripadvisor",
                "default" => "",
                "type" => "text"
            ),
            array(
                "title" => "Reddit",
                "desc" => "Your Reddit profile link.",
                "id" => "social_reddit",
                "default" => "",
                "type" => "text"
            ),
            array(
                "title" => "AppStore",
                "desc" => "Your AppStore profile link.",
                "id" => "social_apple",
                "default" => "",
                "type" => "text"
            ),
            array(
                "title" => "Play Market",
                "desc" => "Your Play Market profile link.",
                "id" => "social_android",
                "default" => "",
                "type" => "text"
            ),
            array(
                "title" => "Deviantart",
                "desc" => "Your Deviantart profile link.",
                "id" => "social_deviantart",
                "default" => "",
                "type" => "text"
            ),
            array(
                "title" => "Forrst",
                "desc" => "Your Forrst profile link.",
                "id" => "social_forrst",
                "default" => "",
                "type" => "text"
            ),
            array(
                "title" => "GitHub",
                "desc" => "Your GitHub profile link.",
                "id" => "social_github",
                "default" => "",
                "type" => "text"
            ),
            array(
                'id' => 'section-social-end',
                'type' => 'section',
                'indent' => false // Indent all options below until the next 'section' option is set.
            ),
        )
));

Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-twitter',
    'subsection' => true,
    'title' => esc_html__('Author', 'wpblog-theme'),
    'fields' => array(
        array(
            'id' => 'section-social-start',
            'type' => 'section',
            'title' => esc_html__('Author settings', 'wpblog-theme'),
            'indent' => true,
        ),
        array(
            'id'       => 'author_background_image',
            'type'     => 'background',
            'title'    => __('Author Background Image', 'wpblog-theme'),
            'desc'     => __('Select Background image or color', 'wpblog-theme'),
            'output' => array('background-color' => '.widget-aboutme-background'),
            'default'  => array(
                'background-color' => '#ffffff',
            )
        ),
    )
));

Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-twitter',
    'subsection' => true,
    'title' => esc_html__('Subscribe settings', 'wpblog-theme'),
    'fields' => array(
        array(
            "title" => "Subscribe Button Link",
            "desc" => "Enter URL",
            "id" => "subscribe_url",
            "default" => "http://eepurl.com/cfgoSn",
            "type" => "text",

        ),
    )
));


Redux::setSection( $opt_name, array(
    'title' => esc_html__('Typography', 'wpblog-theme'),
    'id'    => 'typography-section',
    'icon' => 'el-icon-fontsize',
    'fields' => array(
        array(
            'id' => 'body-typography',
            'type' => 'typography',
            'letter-spacing' => true,
            'title' => esc_html__('Body Text Typography', 'wpblog-theme'),
            'color' => false,
            'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup' => true, // Select a backup non-google font in addition to a google font
            'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
            'output' => array('body'), // An array of CSS selectors to apply this font style to dynamically
            'compiler' => array('body'), // An array of CSS selectors to apply this font style to dynamically
            'units' => 'px', // Defaults to px
            'subtitle' => esc_html__('Body typography options.', 'wpblog-theme'),
            'default' => array(
                'font-weight' => '400',
                'font-style' => 'normal',
                'font-family' => 'Open Sans',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'google' => true,
                'font-size' => '14px',
                'line-height' => '26px',
                'letter-spacing' => '0px',
                'text-transform' => 'none'
            ),
            'preview' => array('text' => 'Lorem ipsum', 'always_display' => true),
        ),
        array(
            'id' => 'button-typography',
            'type' => 'typography',
            'title' => esc_html__(' Button Typography', 'wpblog-theme'),
            'text-transform' => true,
            'letter-spacing' => true,
            'color' => false,
            'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup' => true, // Select a backup non-google font in addition to a google font
            'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
            'output' => array('.ggt-button,
                                .read-more-link,
                                .widget.widget_search .search-submit,
                                .wpcf7-form-control.wpcf7-submit,
                                .woocommerce .button,
                                .ggt-infobox .ggt-infobox-button'), // An array of CSS selectors to apply this font style to dynamically
            'units' => 'px', // Defaults to px
            'subtitle' => esc_html__('Sub Menu Typography options.', 'wpblog-theme'),
            'default' => array(
                'font-weight' => '700',
                'font-style' => 'normal',
                'font-family' => 'Lato',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'google' => true,
                'font-size' => '12px',
                'line-height' => '20px',
                'letter-spacing' => '3px',
                'text-transform' => 'uppercase'
            ),
            'preview' => array('text' => 'Lorem ipsum', 'always_display' => true),
        ),
        array(
            'id' => 'widget-title-typography',
            'type' => 'typography',
            'title' => esc_html__(' Widgets Title Typography', 'wpblog-theme'),
            'text-transform' => true,
            'letter-spacing' => true,
            'color' => false,
            'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup' => true, // Select a backup non-google font in addition to a google font
            'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
            'output' => array('aside.widget h5,
                                footer aside.widget h5'), // An array of CSS selectors to apply this font style to dynamically
            'units' => 'px', // Defaults to px
            'subtitle' => esc_html__('Sub Menu Typography options.', 'wpblog-theme'),
            'default' => array(
                'font-weight' => '700',
                'font-style' => 'normal',
                'font-family' => 'Lato',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'google' => true,
                'font-size' => '12px',
                'line-height' => '20px',
                'letter-spacing' => '2px',
                'text-transform' => 'uppercase'
            ),
            'preview' => array('text' => 'Lorem ipsum', 'always_display' => true),
        ),
        array(
            'id' => 'different-elements-typography',
            'type' => 'typography',
            'title' => esc_html__('Different elements Typography', 'wpblog-theme'),
            'text-transform' => true,
            'letter-spacing' => true,
            'color' => false,
            'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup' => true, // Select a backup non-google font in addition to a google font
            'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
            'output' => array('article .tag-links a,
                               .ggt-terms > a,
                               article .post-categories > li a,
                               article .comments-link > a,
                               .nav-previous > a,
                               .nav-next > a,
                               article.format-quote .entry-content blockquote,
                               .modal-wrap .button,
                               #searchsubmit,
                               .button.wc-forward,
                               .button.checkout.wc-forward,
                               .comment-form input.submit,
                               .ggt-client-name,
                               .ggt-prefix,
                               .ggt-heading .ggt-subtitle,
                               .ggt-infobox .ggt-subtitle,
                               .ggt-posts-carousel .ggt-posts-carousel-item .ggt-project-image .ggt-image-info .ggt-terms a,
                               .ggt-stats-bars .ggt-stats-bar .ggt-stats-title,
                               .ggt-tabs .ggt-tab-nav .ggt-tab span.ggt-tab-title,
                               .ggt-team-members .ggt-team-member .ggt-team-member-text .ggt-team-member-position,
                               .ggt-piechart .ggt-label,
                               .ggt-style1 .ggt-author-credentials,
                               .ggt-style2 .ggt-author-credentials,
                               .ggt-style3 .ggt-author-credentials,
                               .ggt-testimonials-slider .ggt-testimonial-user .ggt-text,
                               .aboutme-firstname,
                               .aboutme-lastname,
                                .login-password label,
                                .login-username label,
                                .login-remember,
                                .ggt-calltoaction-subtitle,
                                .woocommerce #respond input#submit,
                                .woocommerce a.button,
                                .woocommerce button.button,
                                .woocommerce input.button,
                                .woocommerce div.product .woocommerce-tabs ul.tabs li,
                                 .woocommerce ul.products li.product h3,
                                 .woocommerce ul.products li.product .button,
                                 .format-status-author,
                                 .ggt-portfolio-wrap .ggt-taxonomy-filter .ggt-filter-item > a,
                                 .ggt_recentposts_widget_entries .post-title,
                                 .ggt_recentposts_widget_entries .post-author,
                                 .ggt_recentposts_widget_entries .ggtpost-thumb .post-readmore,
                                 .post-view,
                                 .post-like .count'), // An array of CSS selectors to apply this font style to dynamically
            'units' => 'px', // Defaults to px
            'subtitle' => esc_html__('Sub Menu Typography options.', 'wpblog-theme'),
            'default' => array(
                'font-weight' => '700',
                'font-style' => 'normal',
                'font-family' => 'Lato',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'google' => true,
                'font-size' => '12px',
                'line-height' => '20px',
                'letter-spacing' => '2px',
                'text-transform' => 'uppercase'
            ),
            'preview' => array('text' => 'Lorem ipsum', 'always_display' => true),
        ),
    )
));

Redux::setSection( $opt_name, array(
    'id' => 'menu-typography-section',
    'subsection' => true,
    'icon' => 'el-icon-text-width',
    'title' => esc_html__('Menu Typography', 'wpblog-theme'),
    'fields' => array(
        array(
            'id' => 'menu-typography',
            'type' => 'typography',
            'title' => esc_html__('Menu Typography', 'wpblog-theme'),
            'text-transform' => true,
//            'required' => array('menu-custom-switch', '!=', '1'),
            'letter-spacing' => true,
            'color' => false,
            'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup' => true, // Select a backup non-google font in addition to a google font
            'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
            'output' => array('nav.main-menu a,
                                nav.main-menu h5,
                                .widget.widget_nav_menu li.menu-item a'), // An array of CSS selectors to apply this font style to dynamically
            'units' => 'px', // Defaults to px
            'subtitle' => esc_html__('Menu Typography options.', 'wpblog-theme'),
            'default' => array(
                'font-weight' => '700',
                'font-style' => 'normal',
                'font-family' => 'Lato',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'google' => true,
                'font-size' => '11px',
                'line-height' => '22px',
                'letter-spacing' => '2px',
                'text-transform' => 'uppercase'
            ),
            'preview' => array('text' => 'Lorem ipsum', 'always_display' => true),
        ),
        array(
            'id' => 'menu-submenu-typography',
            'type' => 'typography',
            'title' => esc_html__(' Sub Menu Typography', 'wpblog-theme'),
            'text-transform' => true,
//            'required' => array('menu-submenu-custom-switch', '!=', '1'),
            'letter-spacing' => true,
            'color' => false,
            'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup' => true, // Select a backup non-google font in addition to a google font
            'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
            'output' => array('nav.main-menu .sub-menu a'), // An array of CSS selectors to apply this font style to dynamically
            'units' => 'px', // Defaults to px
            'subtitle' => esc_html__('Sub Menu Typography options.', 'wpblog-theme'),
            'default' => array(
                'font-weight' => '400',
                'font-style' => 'normal',
                'font-family' => 'Lato',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'google' => true,
                'font-size' => '11px',
                'line-height' => '20px',
                'letter-spacing' => '2px',
                'text-transform' => 'uppercase'
            ),
            'preview' => array('text' => 'Lorem ipsum', 'always_display' => true),
        ),
    )
));

Redux::setSection( $opt_name, array(
    'id' => 'breadcrumbs-typography-section',
    'subsection' => true,
    'icon' => 'el-icon-text-width',
    'title' => esc_html__('Breadcrumbs Typography', 'wpblog-theme'),
    'fields' => array(
        array(
            'id' => 'breadcrumbs-title-typography',
            'type' => 'typography',
            'title' => esc_html__(' Title Typography', 'wpblog-theme'),
            'text-transform' => true,
            'letter-spacing' => true,
            'color' => false,
            'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup' => true, // Select a backup non-google font in addition to a google font
            'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
            'output' => array('.breadcrumb-wrap .entry-title'), // An array of CSS selectors to apply this font style to dynamically
            'units' => 'px', // Defaults to px
            'subtitle' => esc_html__('Breadcrumbs Title Font', 'wpblog-theme'),
            'default' => array(
                'font-weight' => '400',
                'font-style' => 'normal',
                'font-family' => 'Playfair Display',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'google' => true,
                'font-size' => '25px',
                'line-height' => '35px',
                'letter-spacing' => '0px',
                'text-transform' => 'none'
            ),
            'preview' => array('text' => 'Lorem ipsum', 'always_display' => true),
        ),
        array(
            'id' => 'breadcrumbs-link-typography',
            'type' => 'typography',
            'title' => esc_html__(' Link & Current link Typography', 'wpblog-theme'),
            'text-transform' => true,
            'letter-spacing' => true,
            'color' => false,
            'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup' => true, // Select a backup non-google font in addition to a google font
            'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
            'output' => array('.breadcrumb-wrap .bread-current, .breadcrumb-wrap a'), // An array of CSS selectors to apply this font style to dynamically
            'units' => 'px', // Defaults to px
            'subtitle' => esc_html__('Breadcrumbs Link Font', 'wpblog-theme'),
            'default' => array(
                'font-weight' => '400',
                'font-style' => 'normal',
                'font-family' => 'Lato',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'google' => true,
                'font-size' => '11px',
                'line-height' => '20px',
                'letter-spacing' => '2px',
                'text-transform' => 'uppercase'
            ),
            'preview' => array('text' => 'Lorem ipsum', 'always_display' => true),
        ),
    )
));
Redux::setSection( $opt_name, array(
    'id' => 'heading-typography-section',
    'subsection' => true,
    'icon' => 'el-icon-text-width',
    'title' => esc_html__('Heading Typography', 'wpblog-theme'),
    'fields' => array(
        array(
            'id' => 'h1-typography',
            'type' => 'typography',
            'title' => esc_html__('H1 Typography', 'wpblog-theme'),
            'text-transform' => true,
//            'required' => array('h1-custom-switch', '!=', '1'),
            'letter-spacing' => true,
            'color' => false,
            'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup' => true, // Select a backup non-google font in addition to a google font
            'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
            'output' => array('h1, .h1'), // An array of CSS selectors to apply this font style to dynamically
            'compiler' => array('h1, .h1'), // An array of CSS selectors to apply this font style to dynamically
            'units' => 'px', // Defaults to px
            'subtitle' => esc_html__('Heading 1 options.', 'wpblog-theme'),
            'default' => array(
                'font-weight' => '400',
                'font-family' => 'Playfair Display',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'google' => true,
                'font-size' => '70px',
                'line-height' => '80px',
                'text-transform' => 'none',
                'letter-spacing' => '0px'
            ),
            'preview' => array('text' => 'Lorem ipsum', 'always_display' => true),
        ),
        array(
            'id' => 'h2-typography',
            'type' => 'typography',
            'title' => esc_html__('H2 Typography', 'wpblog-theme'),
            'text-transform' => true,
            'letter-spacing' => true,
            'color' => false,
            'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup' => true, // Select a backup non-google font in addition to a google font
            'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
            'output' => array('h2, .h2'), // An array of CSS selectors to apply this font style to dynamically
            'compiler' => array('h2, .h2'), // An array of CSS selectors to apply this font style to dynamically
            'units' => 'px', // Defaults to px
            'subtitle' => esc_html__('Heading 2 options.', 'wpblog-theme'),
            'default' => array(
                'font-weight' => '400',
                'font-family' => 'Playfair Display',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'google' => true,
                'font-size' => '40px',
                'line-height' => '55px',
                'text-transform' => 'none',
                'letter-spacing' => '0px'
            ),
            'preview' => array('text' => 'Lorem ipsum', 'always_display' => true),
        ),
        array(
            'id' => 'h3-typography',
            'type' => 'typography',
            'title' => esc_html__('H3 Typography', 'wpblog-theme'),
            'text-transform' => true,
            'letter-spacing' => true,
            'color' => false,
            'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup' => true, // Select a backup non-google font in addition to a google font
            'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
            'output' => array('h3, .h3'), // An array of CSS selectors to apply this font style to dynamically
            'compiler' => array('h3, .h3'), // An array of CSS selectors to apply this font style to dynamically
            'units' => 'px', // Defaults to px
            'subtitle' => esc_html__('Heading 3 options.', 'wpblog-theme'),
            'default' => array(
                'font-weight' => '400',
                'font-family' => 'Playfair Display',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'google' => true,
                'font-size' => '30px',
                'line-height' => '35px',
                'text-transform' => 'none',
                'letter-spacing' => '0px'
            ),
            'preview' => array('text' => 'Lorem ipsum', 'always_display' => true),
        ),
        array(
            'id' => 'h4-typography',
            'type' => 'typography',
            'letter-spacing' => true,
            'title' => esc_html__('H4 Typography', 'wpblog-theme'),
            'text-transform' => true,
            'color' => false,
            'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup' => true, // Select a backup non-google font in addition to a google font
            'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
            'output' => array('h4,
                                .h4'), // An array of CSS selectors to apply this font style to dynamically
            'compiler' => array('h4, .h4'), // An array of CSS selectors to apply this font style to dynamically
            'units' => 'px', // Defaults to px
            'subtitle' => esc_html__('Heading 4 options.', 'wpblog-theme'),
            'default' => array(
                'font-weight' => '400',
                'font-family' => 'Playfair Display',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'google' => true,
                'font-size' => '22px',
                'line-height' => '27px',
                'text-transform' => 'none',
                'letter-spacing' => '0px'
            ),
            'preview' => array('text' => 'Lorem ipsum', 'always_display' => true),
        ),
        array(
            'id' => 'h5-typography',
            'type' => 'typography',
            'letter-spacing' => true,
            'title' => esc_html__('H5 Typography', 'wpblog-theme'),
            'text-transform' => true,
            'color' => false,
            'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup' => true, // Select a backup non-google font in addition to a google font
            'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
            'output' => array('h5,
                               .h5'), // An array of CSS selectors to apply this font style to dynamically
            'compiler' => array('h5, .h5'), // An array of CSS selectors to apply this font style to dynamically
            'units' => 'px', // Defaults to px
            'subtitle' => esc_html__('Heading 5 options.', 'wpblog-theme'),
            'default' => array(
                'font-weight' => '400',
                'font-family' => 'Playfair Display',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'google' => true,
                'font-size' => '18px',
                'line-height' => '25px',
                'text-transform' => 'none',
                'letter-spacing' => '0px'
            ),
            'preview' => array('text' => 'Lorem ipsum', 'always_display' => true),
        ),
        array(
            'id' => 'h6-typography',
            'type' => 'typography',
            'letter-spacing' => true,
            'text-transform' => true,
            'color' => false,
            'title' => esc_html__('H6 Typography', 'wpblog-theme'),
            'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup' => true, // Select a backup non-google font in addition to a google font
            'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
            'output' => array('h6,
                            .h6,
                            .ggtpost-thumb .post-date', '.like-count', '.price_button'), // An array of CSS selectors to apply this font style to dynamically
            'compiler' => array('h6, .h6'), // An array of CSS selectors to apply this font style to dynamically
            'units' => 'px', // Defaults to px
            'subtitle' => esc_html__('Heading 6 options.', 'wpblog-theme'),
            'default' => array(
                'font-weight' => '500',
                'font-family' => 'Playfair Display',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'google' => true,
                'font-size' => '15px',
                'line-height' => '25px',
                'text-transform' => 'none',
                'letter-spacing' => '0px'
            ),
            'preview' => array('text' => 'Lorem ipsum', 'always_display' => true),
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'id' => 'footer-typography',
    'subsection' => true,
    'icon' => 'el-icon-text-width',
    'title' => esc_html__('Footer Typography', 'wpblog-theme'),
    'fields' => array(
        array(
            'id' => 'footer-heading-typography',
            'type' => 'typography',
            'title' => esc_html__('Footer Heading Typography', 'wpblog-theme'),
            'text-transform' => true,
            'letter-spacing' => true,
            'color' => false,
            'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup' => true, // Select a backup non-google font in addition to a google font
            'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
            'output' => array('footer aside.widget h5'), // An array of CSS selectors to apply this font style to dynamically
            'units' => 'px', // Defaults to px
            'subtitle' => esc_html__('Footer Widgets Heading options.', 'wpblog-theme'),
            'default' => array(
                'font-weight' => '700',
                'font-style' => 'normal',
                'font-family' => 'Lato',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'google' => true,
                'font-size' => '11px',
                'line-height' => '22px',
                'letter-spacing' => '3px',
                'text-transform' => 'uppercase'
            ),
            'preview' => array('text' => 'Lorem ipsum', 'always_display' => true),
        ),
        array(
            'id' => 'footer-text-link-typography',
            'type' => 'typography',
            'title' => esc_html__('Footer Link&Text Typography', 'wpblog-theme'),
            'text-transform' => true,
            'letter-spacing' => true,
            'color' => false,
            'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup' => true, // Select a backup non-google font in addition to a google font
            'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
            'output' => array('footer'), // An array of CSS selectors to apply this font style to dynamically
            'units' => 'px', // Defaults to px
            'subtitle' => esc_html__('Footer Typography options.', 'wpblog-theme'),
            'default' => array(
                'font-weight' => '400',
                'font-style' => 'normal',
                'font-family' => 'Open Sans',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'google' => true,
                'font-size' => '13px',
                'line-height' => '22px',
                'letter-spacing' => '0px',
                'text-transform' => 'none'
            ),
            'preview' => array('text' => 'Lorem ipsum', 'always_display' => true),
        ),
))
);










    /*
     * <--- END SECTIONS
     */
