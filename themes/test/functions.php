<?php
/**
 * test functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package test
 */

if ( ! function_exists( 'test_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function test_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on test, use a find and replace
		 * to change 'test' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'test', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'test' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'test_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'test_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function test_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'test_content_width', 640 );
}
add_action( 'after_setup_theme', 'test_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function test_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'test' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'test' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'test_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function test_scripts() {
	wp_enqueue_style('bootstrap_css', get_template_directory_uri() . '/dev/css/bootstrap.min.css');
	wp_enqueue_style('slick', get_template_directory_uri() . '/dev/css/slick.css');
	wp_enqueue_style('slick_theme', get_template_directory_uri() . '/dev/css/slick-theme.css');
	wp_enqueue_style('style_css', get_template_directory_uri() . '/dev/css/style.css');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/dev/css/responsive.css');



	wp_enqueue_style('test-style', get_stylesheet_uri() );
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/dev/js/bootstrap.min.js', array(), '1.0.0', true);
	wp_enqueue_script('popper_js', get_template_directory_uri() . '/dev/js/popper.js', array(), '1.0.0', true);
    wp_enqueue_script('script_js', get_template_directory_uri() . '/dev/js/script.js', array(), '1.0.0', true);
    wp_enqueue_script('slick_js', get_template_directory_uri() . '/dev/js/slick.js', array(), '1.0.0', true);
	wp_enqueue_script( 'test-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'test-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'test_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
/*
* Creating a function to create our CPT
*/
 
function news_custom_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'News', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'News', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( 'News', 'twentythirteen' ),
        'parent_item_colon'   => __( 'Parent Movie', 'twentythirteen' ),
        'all_items'           => __( 'All News', 'twentythirteen' ),
        'view_item'           => __( 'View News', 'twentythirteen' ),
        'add_new_item'        => __( 'Add New News', 'twentythirteen' ),
        'add_new'             => __( 'Add New', 'twentythirteen' ),
        'edit_item'           => __( 'Edit News', 'twentythirteen' ),
        'update_item'         => __( 'Update News', 'twentythirteen' ),
        'search_items'        => __( 'Search News', 'twentythirteen' ),
        'not_found'           => __( 'Not Found', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'news', 'twentythirteen' ),
        'description'         => __( 'News description', 'twentythirteen' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'news', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'news_custom_post_type', 0 );

add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Header Search', 'theme-slug' ),
        'id' => 'head_search',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) );
}
add_action('wp_head','delay_remove');
function delay_remove() {
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
    remove_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 30 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
}
//This snippet removes the default sorting dropdown in StoreFront Theme

add_shortcode("test_shortcode","custom_shortcode");
function custom_shortcode(){
	return '<div class = "test-shortcode"> Hello World! </div>';
}

add_filter( 'wp_nav_menu_items', 'wti_loginout_menu_link', 10, 2 );

function wti_loginout_menu_link( $items, $args ) {
	
   if ($args->theme_location == 'menu-1') {
        $items .= '<li class="right"><a class="contact_btn" href="#">'. __("Contact") .'</a></li>';
   }
   return $items;
}