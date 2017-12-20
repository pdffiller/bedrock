<?php /* Header type 1 */

$logo = esc_url(wpblog_theme_option('logo_img', 'url'));
for ($i=1, $office_count = 0; $i < 5; $i++) { 
    if (wpblog_theme_option('header-switch-'.$i)) ++$office_count;
}

?>
<div id="modal-popups">
    <div class="modal fade modal-fade hidden-search" tabindex="-1" role="dialog">
        <div class="modal-wrap">
            <a class="close" aria-label="Close" data-dismiss="modal">
                <i class="ggtctrl-cross"></i>
            </a>
            <div class="modal-wrap-content">
                <div class="modal-wrap-head">Search</div>
                <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div>
                        <label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'wpblog-theme'); ?></label>
                        <input type="text" value="<?php echo esc_attr(get_search_query()); ?>" name="s" id="s" />
                        <input type="submit" id="searchsubmit" value="<?php echo esc_attr_e( 'Search',  'wpblog-theme'); ?>" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade modal-fade hidden-cart" tabindex="-1" role="dialog">
        <div class="modal-wrap">
            <a class="close" aria-label="Close" data-dismiss="modal">
                <i class="ggtctrl-cross"></i>
            </a>
            <div class="modal-wrap-content">
                <div class="modal-wrap-head">Your Cart</div>
                <div class="widget_shopping_cart_content"></div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-fade hidden-login" tabindex="-1" role="dialog">
        <div class="modal-wrap">
            <a class="close" aria-label="Close" data-dismiss="modal">
                <i class="ggtctrl-cross"></i>
            </a>
            <div class="modal-wrap-content">
                <div class="modal-wrap-head">Login</div>
                <?php wp_login_form(); ?>
            </div>
        </div>
    </div>
</div>

<div class="<?php
if( function_exists('get_field')) {
    $transparent_header = get_field('transparent_header');
    echo esc_html ( $transparent_header );
    echo esc_html ( ' ' );
    $select_header_skin = get_field('select_header_skin');
    echo esc_html ( $select_header_skin );
}
else {}
?>">

<div id="header-animated" class="header-type-1-wrap header-action">
    <div class="header-type-1-top-header top-header">

        <a id="mobile-top-header-btn" class="mobile-top-header-btn" role="button" data-toggle="collapse" href="#collapse-mobile-top-header" aria-expanded="false" aria-controls="collapse-mobile-top-header">
           <i class="icon-options"></i>
        </a>
        <div class="mobile-collapse" id="collapse-mobile-top-header">
            <div class="header-type-1-container">
                <?php 
                    if ($office_count > 1) {
                        get_template_part('/includes/headers/type1_more');
                    } elseif ($office_count == 1) {
                        get_template_part('/includes/headers/type1_one');
                    }
                ?>
                <div class="col-md-4<?php if ($office_count) echo ' col-lg-4 col-sm-6 col-xs-12';?> text-right">
                    <div class="wpml-block"><?php do_action('icl_language_selector'); ?></div>
                    <div class="social-block"><?php get_template_part("part-social-footer"); ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-type-1 main-header">
        <div class="container1">
            <div class="header-logo">
                <?php
                if( !$logo  ) { ?>
                    <a href="<?php echo esc_url(home_url()); ?>" title="<?php echo esc_attr( bloginfo( 'name' ) ); ?>" rel="home">
                        <p class="site-title"><?php bloginfo( 'name' ); ?></p>
                    </a>
                    <p class="description"><?php bloginfo( 'description' ); ?></p>
                <?php } else { ?>
                    <a href="<?php echo esc_url(home_url()); ?>" title="<?php echo esc_attr( bloginfo( 'name' ) ); ?>" rel="home">
                    <img class="logo_default" src="<?php echo esc_url(wpblog_theme_option("logo_img", "url")); ?>" alt="Logo"/>
                    <img class="logo_light" src="<?php echo esc_url(wpblog_theme_option("logo_img_light", "url")); ?>" alt="Logo"/>
                    <img class="logo_dark" src="<?php echo esc_url(wpblog_theme_option("logo_img_dark", "url")); ?>" alt="Logo dark"/>
                    </a>

                <?php } ?>

            </div>
            <div class="header-menu">
                <nav class="main-menu">
                    <?php
                        if( function_exists('wpblog_theme_walker_nav_menu')) {
                            wpblog_theme_walker_nav_menu();

                        }
                        else {}
                    ?>
                </nav>
            </div>
            <div class="header-buttons">
                <?php if (wpblog_theme_option('header_type_search_switch')) { ?>
                    <a href="#" data-toggle="modal" data-target=".hidden-search"><i class="ggtctrl-magnifying-glass"></i></a>
                <?php } ?>
                <?php if (wpblog_theme_option('header_type_cart_switch')) { ?>
                    <?php if(class_exists('WooCommerce')): ?>
                        <a href="#" data-toggle="modal" data-target=".hidden-cart"><i class="ggtctrl-shopping-cart"></i>
                            <span class="total-info"><span class="cart-count-number"><?php echo (WC()->cart->get_cart_contents_count() > 0)? WC()->cart->get_cart_contents_count(): 0;?></span></span>
                        </a>
                    <?php endif; ?>
                <?php } ?>
                <?php if (wpblog_theme_option('header_type_login_switch')) { ?>
                    <a href="#" data-toggle="modal" data-target=".hidden-login"><i class="ggtctrl-man"></i></a>
                <?php } ?>

            </div>
        </div>
    </div>


    <!-- Mobile Menu -->

    <div class="mobile-menu-wrap">
        <div class="container1">
            <div class="mobile-navigation">
                <div class="mobile-menu"><a class="mobile-menu-btn" role="button" data-toggle="collapse" href="#collapseMobileMenu" aria-expanded="false" aria-controls="collapseMobileMenu"><i class="icon-list"></i></a></div>
            </div>
            <div class="mobile-logo">
                <?php
                if( !$logo ) { ?>
                    <a href="<?php echo esc_url(home_url()); ?>" title="<?php echo esc_attr( bloginfo( 'name' ) ); ?>" rel="home">
                        <p class="site-title"><?php bloginfo( 'name' ); ?></p>
                    </a>
                    <p class="description"><?php bloginfo( 'description' ); ?></p>
                <?php } else { ?>
                    <a href="<?php echo esc_url(home_url()); ?>" title="<?php echo esc_attr( bloginfo( 'name' ) ); ?>" rel="home">
                        <img src="<?php echo esc_url ( $logo ) ?>" alt="<?php bloginfo( 'name' ); ?>">
                    </a>
                <?php } ?>
            </div>
            <div class="mobile-buttons-wrap">
                <div class="mobile-search"><a role="button" data-toggle="collapse" href="#collapseSearch" aria-expanded="false" aria-controls="collapseSearch"><i class="icon-search"></i></a></div>
                <div class="mobile-login"><a role="button" data-toggle="collapse" href="#collapseLogin" aria-expanded="false" aria-controls="collapseLogin"><i class="icon-lock"></i></a></div>
            </div>
        </div>
    </div>

    <div class="collapse" id="collapseSearch">
        <div class="mobile-collapse-container header-search-collapse">
            <div class="modal-wrap-head">Search</div>
            <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <div>
                    <label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'wpblog-theme'); ?></label>
                    <input type="text" value="<?php echo esc_attr(get_search_query()); ?>" name="s" id="s" />
                    <input type="submit" id="searchsubmit" value="<?php echo esc_attr_e( 'Search', 'wpblog-theme'); ?>" />
                </div>
            </form>
        </div>
    </div>
    <div class="collapse" id="collapseCart">
        <div class="mobile-collapse-container header-cart-collapse">
            <div class="modal-wrap-head">Cart</div>
            <div class="widget_shopping_cart_content"></div>
        </div>
    </div>
    <div class="collapse" id="collapseLogin">
        <div class="mobile-collapse-container header-login-collapse">
            <div class="modal-wrap-head">Login</div>
            <?php wp_login_form(); ?>
        </div>
    </div>
    <div class="collapse" id="collapseMobileMenu">
        <div class="mobile-collapse-container header-menu">
            <nav class="main-menu">
                <?php
                if( function_exists('wpblog_theme_walker_nav_menu')) {
                    wpblog_theme_walker_nav_menu(true);

                }
                else {}
                ?>
            </nav>
        </div>
    </div>

</div>
</div>