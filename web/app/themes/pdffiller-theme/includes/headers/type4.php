<?php /* Header type 4 */

$logo = esc_url(wpblog_theme_option('logo_img', 'url'));
for ($i=1, $office_count = 0; $i < 5; $i++) {
    if (wpblog_theme_option('header-switch-'.$i)) ++$office_count;
}

?>
<div id="modal-popups">
    <div class="modal fade modal-fade hidden-login" tabindex="-1" role="dialog">
        <div class="modal-wrap">
            <a class="close" aria-label="Close" data-dismiss="modal">
                <i class="icon-cross"></i>
            </a>
            <div class="modal-wrap-content">
                <div class="modal-wrap-head">Login</div>
                <?php wp_login_form(); ?>
            </div>
        </div>
    </div>
</div>
<div class="<?php
$transparent_header = get_field('transparent_header');
echo $transparent_header; //your field value
?>

<?php
$select_header_skin = get_field('select_header_skin');
echo $select_header_skin; //your field value
?>">
<div id="header-animated" class="header-type-4-wrap header-action">
    <div class="header-type-4 main-header">
        <div class="container-fullwidth">

            <div class="header-type-4 top-header text-center">
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
            </div>

        </div>

    </div>


    <!-- Mobile Menu -->

    <div class="mobile-menu-wrap">
        <div class="container">
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