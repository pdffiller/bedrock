<?php /* Header type 1 */

$logo = esc_url(wpblog_theme_option('logo_img', 'url'));
for ($i=1, $office_count = 0; $i < 5; $i++) {
    if (wpblog_theme_option('header-switch-'.$i)) ++$office_count;
}

?>


    <div id="header-animated" class="header-type-1-wrap header-action">
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
                        <img src="<?php echo esc_url ( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                    </a>
                <?php } ?>

            </div>
            <div class="header-menu">
                <nav class="main-menu">
                    <?php
                        wp_nav_menu();

                    ?>
                </nav>
            </div>
        </div>
    </div>


    <!-- Mobile Menu -->

    <div class="mobile-menu-wrap">
        <div>
            <div class="mobile-buttons-wrap">
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

        </div>
    </div>
    <div class="collapse" id="collapseMobileMenu">
        <div class="mobile-collapse-container header-menu">
            <nav class="main-menu">
                <?php
                    if( function_exists('wpblog_theme_walker_nav_menu')) {
                        wpblog_theme_walker_nav_menu(true);

                    }
                    else {
                        wp_nav_menu();
                    }
                ?>
            </nav>
        </div>
    </div>

</div>
</div>