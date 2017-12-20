<?php

/**
 * Menu Item Custom Fields
 *
 * @package Menu_Item_Custom_Fields
 * @version 0.3.0
 * @author Dzikri Aziz <kvcrvt@gmail.com>
 *
 * Plugin name: Menu Item Custom Fields
 * Plugin URI: https://github.com/kucrut/wp-menu-item-custom-fields
 * Description: Easily add custom fields to nav menu items
 * Version: 0.3.0
 * Author: Dzikri Aziz
 * Author URI: http://kucrut.org/
 * License: GPLv2
 * Text Domain: menu-item-custom-fields
 */

if(!isset($_REQUEST["import"])) {

    if ( ! class_exists( 'Menu_Item_Custom_Fields' ) ) :
        /**
         * Menu Item Custom Fields Loader
         */
        class Menu_Item_Custom_Fields {

            /**
             * Add filter
             *
             * @wp_hook action wp_loaded
             */
            public static function load() {
                add_filter( 'wp_edit_nav_menu_walker', array( __CLASS__, '_filter_walker' ), 99 );
            }


            /**
             * Replace default menu editor walker with ours
             *
             * We don't actually replace the default walker. We're still using it and
             * only injecting some HTMLs.
             *
             * @since   0.1.0
             * @access  private
             * @wp_hook filter wp_edit_nav_menu_walker
             * @param   string $walker Walker class name
             * @return  string Walker class name
             */
/*
           if (empty($this->extension_dir)) {
                $this->extension_dir = trailingslashit(str_replace('\\', '/', get_template_directory()));
                $this->extension_url = site_url(str_replace(trailingslashit(str_replace('\\', '/', ABSPATH)), '', $this->extension_dir));
            }

*/

            public static function _filter_walker( $walker ) {
                $walker = 'wpblog_Menu_Item_Custom_Fields_Walker';
                if ( ! class_exists( $walker ) ) {
                    require_once get_template_directory() . '/includes/wp-menu-item-custom-fields/walker-nav-menu-edit.php';
                }

                return $walker;
            }
        }
        add_action( 'wp_loaded', array( 'Menu_Item_Custom_Fields', 'load' ), 9 );
    endif; // class_exists( 'Menu_Item_Custom_Fields' )

// Uncomment the following line to test this plugin
    require_once get_template_directory() . '/includes/wp-menu-item-custom-fields/doc/menu-item-custom-fields-example.php';

}
