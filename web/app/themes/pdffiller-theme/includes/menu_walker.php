<?php

class wpblog_theme_walker_nav_menu extends Walker_Nav_Menu {

//    private function column($id) {
//        return get_post_meta($id, 'menu-item-columns-switch', true);
//    }
//
//    function start_lvl( &$output, $depth = 0, $args = array() ) {
//        $indent = str_repeat("\t", $depth);
//
//        $output .= "\n$indent<div class=\"sub-menu ul ul-level-".($depth+1)."\">\n";
//    }
//
//    function end_lvl( &$output, $depth = 0, $args = array() ) {
//        $indent = str_repeat("\t", $depth);
//        $output .= "$indent</div>\n";
//    }
//
//    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0, $parent_in_column = false) {
//        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
//
//        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
//        $classes[] = 'menu-item-' . $item->ID;
//        $classes[] = 'li-level-' . ($depth+1);
//        $classes[] = 'li';
//
//        if (wpblog_theme_walker_nav_menu::column($item->ID)) $classes[] = 'in-column';
//
//        $child_in_column = wpblog_theme_walker_nav_menu::column($item->menu_item_parent)? true:false;
//
//        /**
//         * Filter the arguments for a single nav menu item.
//         *
//         */
//        $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
//
//        /**
//         * Filter the CSS class(es) applied to a menu item's list item element.
//         *
//         */
//        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
//        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
//
//        /**
//         * Filter the ID applied to a menu item's list item element.
//         *
//         */
//        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
//        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
//
//        $output .= $indent . '<div' . $id . $class_names .'>';
//
//        $atts = array();
//        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
//        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
//        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
//        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
//
//        /**
//         * Filter the HTML attributes applied to a menu item's anchor element.
//         *
//         */
//        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
//
//        $attributes = '';
//        foreach ( $atts as $attr => $value ) {
//            if ( ! empty( $value ) ) {
//                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
//                $attributes .= ' ' . $attr . '="' . $value . '"';
//            }
//        }
//
//        /** This filter is documented in wp-includes/post-template.php */
//        $title = apply_filters( 'the_title', $item->title, $item->ID );
//
//        /**
//         * Filter a menu item's title.
//         *
//         */
//        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
//        if ( $parent_in_column ) echo '$parent_in_column';
//
//        $item_output = $args->before;
//        $item_output .= ($child_in_column)?'<span class="title">':'<a'. $attributes .'>';
//        $item_output .= $args->link_before . $title . $args->link_after;
//        $item_output .= ($child_in_column)?'</span>':'</a>';
//        $item_output .= $args->after;
//
//        /**
//         * Filter a menu item's starting output.
//         *
//         * The menu item's starting output only includes `$args->before`, the opening `<a>`,
//         * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
//         * no filter for modifying the opening and closing `<li>` for a menu item.
//         *
//         */
//        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
//    }
//
//    function end_el( &$output, $item, $depth = 0, $args = array() ) {
//        $output .= "</div>\n";
//    }
//
//
//    function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
//        if ( ! $element ) {
//            return;
//        }
//
//        $id_field = $this->db_fields['id'];
//        $id       = $element->$id_field;
//
//        //display this element
//        $this->has_children = ! empty( $children_elements[ $id ] );
//        if ( isset( $args[0] ) && is_array( $args[0] ) ) {
//            $args[0]['has_children'] = $this->has_children; // Backwards compatibility.
//        }
//
//        $cb_args = array_merge( array(&$output, $element, $depth), $args);
//        call_user_func_array(array($this, 'start_el'), $cb_args);
//
//        // descend only when the depth is right and there are childrens for this element
//        if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {
//
//            foreach ( $children_elements[ $id ] as $child ){
//
//                if ( !isset($newlevel) ) {
//                    $newlevel = true;
//                    //start the child delimiter
//                    $cb_args = array_merge( array(&$output, $depth), $args);
//                    call_user_func_array(array($this, 'start_lvl'), $cb_args);
//                }
//                $this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
//            }
//            unset( $children_elements[ $id ] );
//        }
//
//        if ( isset($newlevel) && $newlevel ){
//            //end the child delimiter
//            $cb_args = array_merge( array(&$output, $depth), $args);
//            call_user_func_array(array($this, 'end_lvl'), $cb_args);
//        }
//
//        //end this element
//        $cb_args = array_merge( array(&$output, $element, $depth), $args);
//        call_user_func_array(array($this, 'end_el'), $cb_args);
//    }

}