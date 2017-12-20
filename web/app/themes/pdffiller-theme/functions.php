<?php
/**
 * @package        WPblog Theme
 * @author         GoGetThemes.com
 * @copyright      2017 GoGetThemes
 * @version        Release: v1.0
 */

if ( class_exists('ReduxFrameworkPlugin') ) {
    //theme styles init
    require_once get_template_directory() . '/includes/admin-init.php';
}
require_once get_template_directory() . '/includes/helpers.php';
require_once get_template_directory() . '/includes/wp-menu-item-custom-fields/menu-item-custom-fields.php';
require_once get_template_directory() . '/includes/menu_walker.php';
require_once get_template_directory() . '/includes/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'wpblog_theme_register_required_plugins');
function wpblog_theme_register_required_plugins()
{
    $plugins = array(
        array(
            'name' => esc_html__('Visual Composer', 'wpblog-theme'),
            'slug' => 'js_composer',
            'source' => get_template_directory() . '/includes/plugins/js_composer.zip',
            'required' => true,
        ),
        array(
            'name' => esc_html__('Templatera', 'wpblog-theme'),
            'slug' => 'templatera',
            'source' => get_template_directory() . '/includes/plugins/templatera.zip',
            'required' => true,
        ),
        array(
            'name' => esc_html__('Redux Framework', 'wpblog-theme'),
            'slug' => 'redux-framework',
            'required' => true,
        ),
        array(
            'name' => esc_html__('Advanced Custom Fields', 'wpblog-theme'),
            'slug' => 'advanced-custom-fields',
            'required' => true,
        ),
        array(
            'name' => esc_html__('GGT-Addon', 'wpblog-theme'),
            'slug' => 'ggt-addon',
            'source' => get_template_directory() . '/includes/plugins/ggt-addon.zip',
            'required' => true,
        ),
        array(
            'name' => esc_html__('Contact Form 7', 'wpblog-theme'),
            'slug' => 'contact-form-7',
            'required' => true,
        ),
        array(
            'name' => esc_html__('GGT-widgets', 'wpblog-theme'),
            'slug' => 'ggt-widgets',
            'source' => get_template_directory() . '/includes/plugins/ggt-widgets.zip',
            'required' => true,
        ),
        array(
            'name' => esc_html__('WooCommerce', 'wpblog-theme'),
            'slug' => 'woocommerce',
            'required' => true,
        ),
    );

    $config = array(
        'domain' => 'wpblog-theme', // Text domain - likely want to be the same as your theme.
        'default_path' => '', // Default absolute path to pre-packaged plugins
        'parent_slug' => 'themes.php', // Default parent menu slug
        'menu' => 'install-required-plugins', // Menu slug
        'has_notices' => true, // Show admin notices or not
        'is_automatic' => true, // Automatically activate plugins after installation or not
        'message' => '', // Message to output right before the plugins table
        'strings' => array(
            'page_title' => esc_html__('Install Required Plugins', 'wpblog-theme'),
            'menu_title' => esc_html__('Install Plugins', 'wpblog-theme'),
            'installing' => esc_html__('Installing Plugin: %s', 'wpblog-theme'), // %1$s = plugin name
            'oops' => esc_html__('Something went wrong with the plugin API.', 'wpblog-theme'),
            'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'wpblog-theme'), // %1$s = plugin name(s)
            'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'wpblog-theme'), // %1$s = plugin name(s)
            'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'wpblog-theme'), // %1$s = plugin name(s)
            'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'wpblog-theme'), // %1$s = plugin name(s)
            'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'wpblog-theme'), // %1$s = plugin name(s)
            'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'wpblog-theme'), // %1$s = plugin name(s)
            'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'wpblog-theme'), // %1$s = plugin name(s)
            'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'wpblog-theme'), // %1$s = plugin name(s)
            'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins', 'wpblog-theme'),
            'activate_link' => _n_noop('Activate installed plugin', 'Activate installed plugins', 'wpblog-theme'),
            'return' => esc_html__('Return to Required Plugins Installer', 'wpblog-theme'),
            'plugin_activated' => esc_html__('Plugin activated successfully.', 'wpblog-theme'),
            'complete' => esc_html__('All plugins installed and activated successfully. %s', 'wpblog-theme'), // %1$s = dashboard link
            'nag_type' => esc_html__('updated', 'wpblog-theme') // Determines admin notice type - can only be 'updated' or 'error'
        )
    );
    tgmpa($plugins, $config);
}



// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
    $content_width = 625;
}

/**
 * WPblog Theme setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * WPblog Theme supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since wpblog-theme 1.0
 */
function wpblog_theme_setup() {
    if (function_exists('vc_set_as_theme')) {
        vc_set_as_theme(true); // disable notifications
    }
    /*
     * Makes WPblog Theme available for translation.
     *
     * Translations can be added to the /languages/ directory.
     */
    load_theme_textdomain( 'wpblog-theme', get_template_directory() . '/languages' );

    add_editor_style();


    // This theme uses wp_nav_menu() in one location.
    register_nav_menu( 'top-menu', __( 'Top Menu', 'wpblog-theme') );
    register_nav_menu( 'additional-menu', __( 'Additional Top Menu', 'wpblog-theme') );



    /*
     * This theme supports custom background color and image,
     * and here we also set up the default background color.
     */

    // This theme uses a custom image size for featured images, displayed on "standard" posts.
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop

    add_theme_support('title-tag');
    add_theme_support('custom-header');
    add_theme_support('custom-background');
    add_theme_support('woocommerce');
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list',
    ));
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-formats', array( 'aside', 'audio', 'video',  'image', 'link', 'quote', 'status' ) );
}
add_action( 'after_setup_theme', 'wpblog_theme_setup' );



/**
 * Enqueue scripts and styles for front-end.
 *
 * @since wpblog-theme 1.0
 */
function wpblog_theme_scripts_styles() {
    global $wp_styles;

    /*
     * Adds JavaScript to pages with the comment form to support
     * sites with threaded comments (when in use).
     */
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    //Adding "Resize Sensor" if enabled in Theme Options. Temporarily activated permanently.
    if (wpblog_theme_option('header_type_sticky_1') || !wpblog_theme_option('footer_default') || 1) {
        wp_enqueue_script('resize_sensor', get_template_directory_uri() . '/js/resizesensor.js', array( 'jquery' ), true );
    }

    // Adding JavaScript for navigation menu if Redux not activated
    if (!class_exists( 'Redux' )) {
        wp_enqueue_script( 'wpblog_theme_navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20140711', true );
    }


    if (!class_exists( 'Redux' )) {
        $headers_css = 'default';
    } elseif (wpblog_theme_option('header-type-select')) {
        $headers_css = wpblog_theme_option('header-type-select');
    } else {
        $headers_css = 'type1';
    }

    // Loads our main stylesheet.
    wp_enqueue_style( 'wpblog_theme_style', get_stylesheet_uri());

    wp_enqueue_style('bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css', 'all');
    wp_enqueue_style('design_css', get_template_directory_uri() . '/css/design.css', 'all');
    wp_enqueue_style('ggtctrl_css', get_template_directory_uri() . '/fonts/ggtctrl.css', 'all');
    wp_enqueue_style('likes_css', get_template_directory_uri() . '/fonts/likes.css', 'all');
    wp_enqueue_style('socicon_css', get_template_directory_uri() . '/css/socicon.css', 'all');
    wp_enqueue_style('menu_css', get_template_directory_uri() . '/css/menu-'.$headers_css.'.css', 'all');
    if (class_exists( 'Redux' )) {
        wp_enqueue_style('blog_css', get_template_directory_uri() . '/css/blog.css', 'all');
    }
    wp_enqueue_style('main_css', get_template_directory_uri() . '/css/main.css', 'all');
    wp_enqueue_style('socicon_css', get_template_directory_uri() . '/css/socicon.css', 'all');
    wp_enqueue_style('headers_css', get_template_directory_uri() . '/css/'.$headers_css.'.css', 'all');
    wp_enqueue_style('addon_css', get_template_directory_uri() . '/css/addon.css', 'all');
    wp_enqueue_style('responsive_css', get_template_directory_uri() . '/css/responsive.css', 'all');
    if (class_exists('WooCommerce')) {
        wp_enqueue_style('woocommerce_css', get_template_directory_uri() . '/css/woocommerce.css', 'all');
    }



    // Loads JS
    wp_enqueue_script('bsjs', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ),  true, true);
    wp_enqueue_script('helpjs', get_template_directory_uri() . '/js/help.js', array( 'jquery' ),  true);
    // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions
    wp_enqueue_script('helpjs', get_template_directory_uri() . '/js/html5.js', array( 'jquery' ),  true);

    wp_enqueue_script('like_post', get_template_directory_uri().'/js/post-like.js', array('jquery'), '1.0');
    wp_localize_script('like_post', 'ajax_var', array(
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ajax-nonce')
    ));
}
add_action( 'wp_enqueue_scripts', 'wpblog_theme_scripts_styles' );

/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since wpblog-theme 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function wpblog_theme_blog()
{
    global $post;
    $posttype = get_post_type($post);
    return (((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ($posttype == 'post')) ? true : false;
}

function wpblog_theme_thumbnail($size = "img1920")
{
    $hd = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size);
    $retina_size = $size == "img1920" ? "img2880" : "img1024";
    $retinahd = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $retina_size);
    ?>
    <img class="img-responsive lazyload" src="<?php echo esc_url(get_template_directory_uri() . "/img/1x1.png"); ?>"
         alt="<?php esc_attr(get_the_title()); ?>" data-original="<?php echo esc_url($hd[0]); ?>"
         data-hdpi-src="<?php echo esc_url($retinahd[0]); ?>"/>
<?php
}


/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since wpblog-theme 1.0
 */
function wpblog_theme_widgets_init() {
    register_sidebar( array(
        'name' => esc_html__( 'Blog Sidebar', 'wpblog-theme'),
        'id' => 'blog-sidebar',
        'description' => esc_html__( 'Appears on posts and pages except the optional Blog, which has its own widgets', 'wpblog-theme' ),
        'before_widget' => '<aside id="%1$s" class="blog-sidebar widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Main Sidebar', 'wpblog-theme'),
        'id' => 'main-sidebar',
        'description' => esc_html__( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'wpblog-theme' ),
        'before_widget' => '<aside id="%1$s" class="main-sidebar widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ) );

    register_sidebar(array(
        'name' => esc_html__('Shop Sidebar', 'wpblog-theme'),
        'id' => 'sidebar-shop',
        'description' => esc_html__('Shop sidebar.', 'wpblog-theme'),
        'before_widget' => '<aside id="%1$s" class="shop-sidebar widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer Sidebar 1', 'wpblog-theme'),
        'id' => 'sidebar-footer1',
        'description' => esc_html__('Footer sidebar #1.', 'wpblog-theme'),
        'before_widget' => '<aside id="%1$s" class="footer-sidebar widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer Sidebar 2', 'wpblog-theme'),
        'id' => 'sidebar-footer2',
        'description' => esc_html__('Footer sidebar #2.', 'wpblog-theme'),
        'before_widget' => '<aside id="%1$s" class="footer-sidebar widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer Sidebar 3', 'wpblog-theme'),
        'id' => 'sidebar-footer3',
        'description' => esc_html__('Footer sidebar #3.', 'wpblog-theme'),
        'before_widget' => '<aside id="%1$s" class="footer-sidebar widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer Sidebar 4', 'wpblog-theme'),
        'id' => 'sidebar-footer4',
        'description' => esc_html__('Footer sidebar #4.', 'wpblog-theme'),
        'before_widget' => '<aside id="%1$s" class="footer-sidebar widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Subscribe Sidebar Left', 'wpblog-theme'),
        'id' => 'sidebar-subscribe1',
        'description' => esc_html__('Footer Subscribe Left sidebar.', 'wpblog-theme'),
        'before_widget' => '<aside id="%1$s" class="footer-sidebar widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Subscribe Sidebar Right', 'wpblog-theme'),
        'id' => 'sidebar-subscribe2',
        'description' => esc_html__('Footer Subscribe Right sidebar.', 'wpblog-theme'),
        'before_widget' => '<aside id="%1$s" class="footer-sidebar widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Menu sidebar', 'wpblog-theme'),
        'id' => 'sidebar-footer-menu',
        'description' => esc_html__('Footer Menu sidebar.', 'wpblog-theme'),
        'before_widget' => '<aside id="%1$s" class="footer-sidebar widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));


    register_sidebar(array(
        'name' => esc_html__('Additional Sidebar', 'wpblog-theme'),
        'id' => 'sidebar-additional',
        'description' => esc_html__('Additional sidebar.', 'wpblog-theme'),
        'before_widget' => '<aside id="%1$s" class="sidebar-additional widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h5 class="widget-title2">',
        'after_title' => '</h5>',
    ));
}
add_action( 'widgets_init', 'wpblog_theme_widgets_init' );

if ( ! function_exists( 'wpblog_theme_content_nav' ) ) :
    /**
     * Displays navigation to next/previous pages when applicable.
     *
     * @since wpblog-theme 1.0
     */
    function wpblog_theme_content_nav( $html_id ) {
        global $wp_query;

        if ( $wp_query->max_num_pages > 1 ) : ?>
            <nav id="<?php echo esc_attr( $html_id ); ?>" class="navigation" role="navigation">
                <h3 class="assistive-text"><?php _e( 'Post navigation', 'wpblog-theme'); ?></h3>
                <div class="nav-previous"><?php next_posts_link( '<span class="meta-nav"><i class="ggtctrl-chevron-thin-left"></i></span> ' . esc_html__('Older posts', 'wpblog-theme') ); ?></div>
                <div class="nav-next"><?php previous_posts_link( esc_html__( 'Newer posts', 'wpblog-theme') . ' <span class="meta-nav"><i class="ggtctrl-chevron-thin-right"></i></span>' ); ?></div>
            </nav><!-- .navigation -->
        <?php endif;
    }
endif;

if ( ! function_exists( 'wpblog_theme_comment' ) ) :
    /**
     * Template for comments and pingbacks.
     *
     * To override this walker in a child theme without modifying the comments template
     * simply create your own wpblog_theme_comment(), and that function will be used instead.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     *
     * @since wpblog-theme 1.0
     */
    function wpblog_theme_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) :
            case 'pingback' :
            case 'trackback' :
                // Display trackbacks differently than normal comments.
                ?>
                <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
                <p><?php esc_html_e( 'Pingback:', 'wpblog-theme'); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'wpblog-theme'), '<span class="edit-link">', '</span>' ); ?></p>
                <?php
                break;
            default :
                // Proceed with normal comments.
                global $post;
                ?>
                <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                    <article id="comment-<?php comment_ID(); ?>" class="comment">
                        <header class="comment-meta comment-author vcard">
                            <?php
                            echo get_avatar( $comment, 44 );
                            printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
                                get_comment_author_link(),
                                // If current post author is also comment author, make it known visually.
                                ( $comment->user_id === $post->post_author ) ? '<span>' . esc_html__( 'Post author', 'wpblog-theme') . '</span>' : ''
                            );
                            printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
                                esc_url( get_comment_link( $comment->comment_ID ) ),
                                get_comment_time( 'c' ),
                                /* translators: 1: date, 2: time */
                                sprintf( esc_html__( '%1$s at %2$s', 'wpblog-theme'), get_comment_date(), get_comment_time() )
                            );
                            ?>
                        </header><!-- .comment-meta -->

                        <?php if ( '0' == $comment->comment_approved ) : ?>
                            <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'wpblog-theme'); ?></p>
                        <?php endif; ?>

                        <section class="comment-content comment">
                            <?php comment_text(); ?>
                            <?php edit_comment_link( esc_html__( 'Edit', 'wpblog-theme'), '<p class="edit-link">', '</p>' ); ?>
                        </section><!-- .comment-content -->

                        <div class="reply">
                            <?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'wpblog-theme'), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                        </div><!-- .reply -->
                    </article><!-- #comment-## -->
                <?php
                break;
        endswitch; // end comment_type check
    }
endif;

if ( ! function_exists( 'wpblog_theme_entry_meta' ) ) :
    /**
     * Set up post entry meta.
     *
     * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
     *
     * Create your own wpblog_theme_entry_meta() to override in a child theme.
     *
     * @since wpblog-theme 1.0
     */
    function wpblog_theme_entry_meta() {
        // Translators: used between list items, there is a space after the comma.
        $categories_list = get_the_category_list( esc_html__( ', ', 'wpblog-theme') );

        // Translators: used between list items, there is a space after the comma.
        $tag_list = get_the_tag_list( '', esc_html__( ', ', 'wpblog-theme') );

        $date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
            esc_url( get_permalink() ),
            esc_attr( get_the_time() ),
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date() )
        );

        $author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
            esc_attr( sprintf( esc_html__( 'View all posts by %s', 'wpblog-theme'), get_the_author() ) ),
            get_the_author()
        );

        // Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
        if ( $tag_list ) {
            $utility_text = esc_html__( 'This entry was posted in %1$s and tagged %2$s on %3$s', 'wpblog-theme') . '<span class="by-author"> ' . esc_html__( 'by %4$s', 'wpblog-theme') . '</span>.';
        } elseif ( $categories_list ) {
            $utility_text = esc_html__( 'This entry was posted in %1$s on %3$s', 'wpblog-theme') . '<span class="by-author"> ' . esc_html__( 'by %4$s', 'wpblog-theme') . '</span>.';
        } else {
            $utility_text = esc_html__( 'This entry was posted on %3$s', 'wpblog-theme') . '<span class="by-author"> ' . esc_html__( 'by %4$s', 'wpblog-theme') . '</span>.';
        }

        printf(
            $utility_text,
            $categories_list,
            $tag_list,
            $date,
            $author
        );
    }
endif;


if (!function_exists('wpblog_theme_dateformat')) {

    function wpblog_theme_dateformat($format = "d", $format2 = "M") {

        $published = '<span class="published post-date"><span class="date-block" title="' . sprintf(get_the_time(esc_html__('l, F, Y, g:i a', 'wpblog-theme'))) . '">' . sprintf(get_the_time($format)) . '</span><span class="date-block">' . sprintf(get_the_time($format2)) . '</span></span>';

        return $published;

        $link = '<span class="published post-date">' . '<a href="' . get_day_link(get_the_time(esc_html__('Y', 'wpblog-theme')), get_the_time(esc_html__('m', 'wpblog-theme')), get_the_time(esc_html__('d', 'wpblog-theme'))) . '" title="' . sprintf(get_the_time(esc_html__('l, F, Y, g:i a', 'wpblog-theme'))) . '">' . '<span class="updated">' . get_the_time($format) . '</span>' . '</a></span>';

        return $link;
    }
}

function wpblog_theme_body_class( $classes ) {
     $mobile = wpblog_theme_mobile();

    $background_color = get_background_color();
    $background_image = get_background_image();

    if (wpblog_theme_option('footer_default') || $mobile || !class_exists( 'Redux' )) {
        $classes[] = 'default-footer';
    } else {
        $classes[] = 'fixed-footer';
        if (wpblog_theme_option('footer_fixed_auto'))
            $classes[] = 'fixed-footer-auto';
    }

    if (wpblog_theme_option('header_type_sticky_1') && !$mobile) {
        $classes[] = 'header-is-sticky';
    }
    if (wpblog_theme_option('header_type_sticky_1') ) {
        $classes[] = 'type-1';
    }

    if (wpblog_theme_option('header_type_sticky_2') ) {
        $classes[] = 'type-2';
    }

    if (wpblog_theme_option('header_type_sticky_3') ) {
        $classes[] = 'type-3';
    }


    $classes[] = wpblog_theme_option('header_type_menu_by_columns_title_'.wpblog_theme_option('header-type-select'))? 'columns-whis-titles': 'columns-without-titles';

    if ( ! is_active_sidebar( 'main-sidebar' ) || is_page_template( 'page-templates/full-width.php' ) ) {
        $classes[] = 'full-width';
    }

    if ( is_page_template( 'page-templates/front-page.php' ) ) {
        $classes[] = 'template-front-page';
        if ( has_post_thumbnail() )
            $classes[] = 'has-post-thumbnail';
    }

    if ( is_page_template( 'page-templates/front-page-transparent.php' ) ) {
        $classes[] = 'header-transparent';
    }

    if ( empty( $background_image ) ) {
        if ( empty( $background_color ) ) {
            $classes[] = 'custom-background-empty';
        }
        elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) ) {
            $classes[] = 'custom-background-white';
        }
    }


    if ( ! is_multi_author() ) {
        $classes[] = 'single-author';
    }

    return $classes;
}
add_filter( 'body_class', 'wpblog_theme_body_class' );

/**
 * Adjust content width in certain contexts.
 *
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since wpblog-theme 1.0
 */
function wpblog_theme_content_width() {
    if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'main-sidebar' ) ) {
        global $content_width;
        $content_width = 960;
    }
}
add_action( 'template_redirect', 'wpblog_theme_content_width' );

/**
 * Register postMessage support.
 *
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since wpblog-theme 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function wpblog_theme_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'wpblog_theme_customize_register' );

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since wpblog-theme 1.0
 */
function wpblog_theme_customize_preview_js() {
    wp_enqueue_script( 'wpblog_theme_customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20141120', true );
}
add_action( 'customize_preview_init', 'wpblog_theme_customize_preview_js' );



/* Woocommerce installation error fix*/
function woocommerce_undefined_function() {
    if (!function_exists('wc_get_screen_ids')) {
        function wc_get_screen_ids() {

            $wc_screen_id = sanitize_title( esc_html__( 'WooCommerce', 'wpblog-theme') );
            $screen_ids   = array(
                'toplevel_page_' . $wc_screen_id,
                $wc_screen_id . '_page_wc-reports',
                $wc_screen_id . '_page_wc-settings',
                $wc_screen_id . '_page_wc-status',
                $wc_screen_id . '_page_wc-addons',
                'toplevel_page_wc-reports',
                'product_page_product_attributes',
                'edit-product',
                'product',
                'edit-shop_coupon',
                'shop_coupon',
                'edit-product_cat',
                'edit-product_tag',
                'edit-product_shipping_class',
                'profile',
                'user-edit'
            );

            foreach ( wc_get_order_types() as $type ) {
                $screen_ids[] = $type;
                $screen_ids[] = 'edit-' . $type;
            }

            return apply_filters( 'woocommerce_screen_ids', $screen_ids );
        }
    }
}
add_action('init', 'woocommerce_undefined_function');

function wpblog_theme_remove_redux_menu() {
    remove_submenu_page('tools.php','redux-about');
}
add_action('admin_menu', 'wpblog_theme_remove_redux_menu',12 );

function wpblog_theme_removeDemoModeLink() {
    //remove notices of Redux Framework
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );
    }
}
add_action('activated_plugin', 'wpblog_theme_removeDemoModeLink', 10, 2 );

/** move excerpt under the cart buttons */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 35);



if ( ! function_exists( 'theme_name_remove_anonymous_object_filter' ) ){
    /**
     * Remove an anonymous object filter.
     *
     * @param  string $tag    Hook name.
     * @param  string $class  Class name
     * @param  string $method Method name
     * @return void
     */
    function wpblog_theme_remove_anonymous_object_filter( $tag, $class, $method ) {
        $filters = $GLOBALS['wp_filter'][ $tag ];

        if ( empty ( $filters ) ) {
            return;
        }

        foreach ( $filters as $priority => $filter ) {
            foreach ( $filter as $identifier => $function ) {
                if ( is_array( $function)
                    and is_a( $function['function'][0], $class )
                    and $method === $function['function'][1] ) {

                    remove_filter(
                        $tag,
                        array ( $function['function'][0], $method ),
                        $priority
                    );
                }
            }
        }
    }
}

function wpblog_theme_remove_redux_framework_admin_notices_action() {
    wpblog_theme_remove_anonymous_object_filter(
        'admin_notices',
        'ReduxFramework',
        '_admin_notices'
    );
}
add_action('admin_init', 'wpblog_theme_remove_redux_framework_admin_notices_action');


$timebeforerevote = 1;


// Post likes functions


add_action('wp_ajax_nopriv_post-like', 'post_like');
add_action('wp_ajax_post-like', 'post_like');

function post_like()
{
    $nonce = $_POST['nonce'];

    if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
        die ( 'Busted!');

    if(isset($_POST['post_like']))
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $post_id = $_POST['post_id'];

        $meta_IP = get_post_meta($post_id, "voted_IP");
        $voted_IP = $meta_IP[0];
        if(!is_array($voted_IP))
            $voted_IP = array();

        $meta_count = get_post_meta($post_id, "votes_count", true);

        if(!hasAlreadyVoted($post_id))
        {
            $voted_IP[$ip] = time();

            update_post_meta($post_id, "voted_IP", $voted_IP);
            update_post_meta($post_id, "votes_count", ++$meta_count);

            echo $meta_count;
        }
        else
            echo "already";
    }
    exit;
}

function hasAlreadyVoted($post_id)
{
    global $timebeforerevote;
    $meta_IP = get_post_meta($post_id);
    $voted_IP = $meta_IP;
    if(!is_array($voted_IP))
        $voted_IP = array();
    $ip = $_SERVER['REMOTE_ADDR'];
    if(in_array($ip, array_keys($voted_IP)))
    {
        $time = $voted_IP[$ip];
        $now = time();

        if(round(($now - $time) / 60) > $timebeforerevote)
            return false;

        return true;
    }

    return false;
}

function getPostLikeLink($post_id)
{
//    $themename = "wpblog-theme";

    $vote_count = get_post_meta($post_id, "votes_count", true);

    $output = '<p class="post-like">';
    if(hasAlreadyVoted($post_id))
        $output .= ' <span title="'.esc_html__('I like this article', 'wpblog-theme').'" class="qtip like alreadyvoted"></span>';
    else
        $output .= '<a href="#" data-post_id="'.$post_id.'">
					<span  title="'.esc_html__('I like this article', 'wpblog-theme').'"class="qtip like"></span>
				</a>';
    $output .= '<span class="count">'.$vote_count.'</span></p>';

    return $output;
}




// Post view counter

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.'';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);






// Breadcrumbs
function wpblog_theme_custom_breadcrumbs() {

    // Settings
    $separator          = '';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = '';

    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';

    // Get the query & post information
    global $post,$wp_query;

    // Do not display on the homepage
    if ( !is_front_page() ) {

        // Build the breadcrums
        echo '<ul id="' . esc_attr($breadcrums_id) . '" class="' . esc_attr($breadcrums_class) . '">';

        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() .'"><i class="ggtctrl-home"></i>' . esc_html($home_title) . '</a></li>';
        echo '<li class="separator separator-home"><i class="icon-arrow-right"></i> ' . esc_html($separator) . ' </li>';

        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

            echo '<li class="item-current item-archive"><span class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</span></li>';

        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . esc_attr($post_type) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr($post_type) . '" href="' . esc_url($post_type_archive) . '" title="' . esc_attr($post_type_object->labels->name) . '">' . esc_html($post_type_object->labels->name) . '</a></li>';
                echo '<li class="separator"> ' . esc_html($separator) . ' </li>';

            }

            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><span class="bread-current bread-archive">' . esc_html($custom_tax_name) . '</span></li>';

        } else if ( is_single() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . esc_attr($post_type) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr($post_type) . '" href="' . esc_url($post_type_archive) . '" title="' . esc_attr($post_type_object->labels->name) . '">' . esc_html($post_type_object->labels->name) . '</a></li>';
                echo '<li class="separator"> ' . esc_html($separator) . ' </li>';

            }

            // Get post category info
            $category = get_the_category();

            if(!empty($category)) {

                // Get last category post is in
                $last_category = end(array_values($category));

                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);

                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">' . esc_html($parents) . '</li>';
                    $cat_display .= '<li class="separator"> ' . esc_html($separator) . ' </li>';
                }

            }

            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;

            }

            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . esc_attr(get_the_title()) . '">' . esc_html(get_the_title()) . '</strong></li>';

                // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {

                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . esc_attr($cat_nicename) . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . esc_attr($cat_nicename) . '" href="' . $cat_link . '" title="' . esc_attr($cat_name) . '">' . esc_html($cat_name) . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . esc_attr(get_the_title()) . '">' . esc_html(get_the_title()) . '</strong></li>';

            } else {

                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . esc_attr(get_the_title()) . '">' . esc_html(get_the_title()) . '</strong></li>';

            }

        } else if ( is_category() ) {

            // Category page
            echo '<li class="item-current item-cat"><span class="bread-current bread-cat">' . single_cat_title('', false) . '</span></li>';

        } else if ( is_page() ) {

            // Standard page
            if( $post->post_parent ){

                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );

                // Get parents in the right order
                $anc = array_reverse($anc);

                // Parent page loop
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . esc_attr(get_the_title($ancestor)) . '">' . esc_html(get_the_title($ancestor)) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . esc_html($separator) . ' </li>';
                }

                // Display parent pages
                echo $parents;

                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . esc_attr(get_the_title()) . '"> ' . esc_html(get_the_title()) . '</strong></li>';

            } else {

                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '"> ' . esc_html(get_the_title()) . '</span></li>';

            }

        } else if ( is_tag() ) {

            // Tag page

            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;

            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . esc_attr($get_term_slug) . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . esc_attr($get_term_slug) . '">' . esc_html($get_term_name) . '</strong></li>';

        } elseif ( is_day() ) {

            // Day archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . esc_html($separator) . ' </li>';

            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . esc_html($separator) . ' </li>';

            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';

        } else if ( is_month() ) {

            // Month Archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . esc_html($separator) . ' </li>';

            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';

        } else if ( is_year() ) {

            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';

        } else if ( is_author() ) {

            // Auhor archive

            // Get the author information
            global $author;
            $userdata = get_userdata( $author );

            // Display author name
            echo '<li class="item-current item-current-' . esc_attr($userdata->user_nicename) . '"><strong class="bread-current bread-current-' . esc_attr($userdata->user_nicename) . '" title="' . esc_attr($userdata->display_name) . '">' . 'Author: ' . esc_html($userdata->display_name) . '</strong></li>';

        } else if ( get_query_var('paged') ) {

            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page', 'wpblog-theme') . ' ' . get_query_var('paged') . '</strong></li>';

        } else if ( is_search() ) {

            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';

        } elseif ( is_404() ) {

            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }

        echo '</ul>';

    }

}

add_action( 'redux/loaded', 'skeleton_theme' );
/**
 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
 */
if ( ! function_exists( 'skeleton_theme' ) ) {
    function skeleton_theme() {
        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_filter( 'plugin_row_meta', array(
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks'
            ), null, 2 );

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
        }
    }
}

/**
 * Fix for templatera
 */
update_option( 'templatera_migrated_templates', 'yes' );



/**
 * ACF Developer Mode
 */

define( 'ACF_LITE', false );

/**
 * ACF Export
 */


if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_headers',
        'title' => 'Headers',
        'fields' => array (
            array (
                'key' => 'field_57da4e24eac50',
                'label' => 'Transparent header?',
                'name' => 'transparent_header',
                'type' => 'select',
                'instructions' => 'Select Yes, if you want Transparent Header on Top',
                'required' => 1,
                'choices' => array (
                    'transparent' => 'Yes',
                    'not_transparent' => 'No',
                ),
                'default_value' => 'not_transparent',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array (
                'key' => 'field_57da504660244',
                'label' => 'Select Header Skin',
                'name' => 'select_header_skin',
                'type' => 'select',
                'instructions' => 'Select Skin for Transparent Header',
                'required' => 1,
                'conditional_logic' => array (
                    'status' => 1,
                    'rules' => array (
                        array (
                            'field' => 'field_57da4e24eac50',
                            'operator' => '==',
                            'value' => 'transparent',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'choices' => array (
                    'dark_skin' => 'Dark',
                    'light_skin' => 'Light',
                ),
                'default_value' => 'dark_skin',
                'allow_null' => 0,
                'multiple' => 0,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/with-breadcrumbs-leftsidebar-default.php',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
                array (
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/with-breadcrumbs-leftsidebar.php',
                    'order_no' => 1,
                    'group_no' => 0,
                ),
                array (
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/with-breadcrumbs-rightsidebar-default.php',
                    'order_no' => 2,
                    'group_no' => 0,
                ),
                array (
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/with-breadcrumbs-rightsidebar.php',
                    'order_no' => 3,
                    'group_no' => 0,
                ),
                array (
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/with-breadcrumbs.php',
                    'order_no' => 4,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'acf_after_title',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => -1,
    ));
}
