<?php
/**
 * Interior Design Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Interior_Design_Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

define( 'IDT_THEME_DIR', get_template_directory() );

if ( ! function_exists( 'idt_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function idt_setup() {
		// Boot the carbon fields package for custom fields
		require_once( 'vendor/autoload.php' );
		\Carbon_Fields\Carbon_Fields::boot();

		// Add custom field options to the theme
		function idt_add_custom_options_to_theme() {
			include_once(IDT_THEME_DIR . '/custom-options/post-meta.php');
			include_once(IDT_THEME_DIR . '/custom-options/theme-options.php');
		}
		add_action( 'carbon_fields_register_fields', 'idt_add_custom_options_to_theme' );

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Interior Design Theme, use a find and replace
		 * to change 'idt' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'idt', IDT_THEME_DIR . '/languages' );

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
		register_nav_menus(
			array(
				'desktop-header-left' => esc_html__( 'Заглавно меню от ляво (голям екран)', 'idt' ),
				'desktop-header-right' => esc_html__( 'Заглавно меню от дясно (голям екран)', 'idt' ),
				'tablet-mobile-header' => esc_html__( 'Заглавно меню (таблет и телефон)', 'idt' ),
				'footer' => esc_html__( 'Меню в долната част на сайта', 'idt' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'idt_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'idt_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function idt_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'idt_content_width', 640 );
}
add_action( 'after_setup_theme', 'idt_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function idt_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'idt' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'idt' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'idt_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function idt_scripts() {
	wp_enqueue_style( 'idt-photoswipe-css', get_template_directory_uri() . '/external/photoswipe/photoswipe.css', array(), _S_VERSION );
	wp_enqueue_style( 'idt-photoswipe-default-skin-css', get_template_directory_uri() . '/external/photoswipe/default-skin/default-skin.css', array(), _S_VERSION );
	wp_enqueue_style( 'idt-swiper-css', get_template_directory_uri() . '/external/swiper/swiper-bundle.min.css', array(), _S_VERSION );

	wp_enqueue_style( 'idt-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'idt-style', 'rtl', 'replace' );

	wp_enqueue_script( 'idt-photoswipe-js', get_template_directory_uri() . '/external/photoswipe/photoswipe.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'idt-photoswipe-ui-js', get_template_directory_uri() . '/external/photoswipe/photoswipe-ui-default.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'idt-swiper-js', get_template_directory_uri() . '/external/swiper/swiper-bundle.min.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'idt-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'idt-calculator', get_template_directory_uri() . '/js/calculator.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'idt-animations', get_template_directory_uri() . '/js/animations.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'idt-gallery', get_template_directory_uri() . '/js/gallery.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'idt-swiper', get_template_directory_uri() . '/js/swiper.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'idt-tabs', get_template_directory_uri() . '/js/tabs.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'idt-posts-ajax', get_template_directory_uri() . '/js/posts-ajax.js', array('jquery'), _S_VERSION, true );

	wp_localize_script( 'idt-posts-ajax', 'idt_posts', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'idt_scripts' );

/**
 * Attach custom options for the theme
 */
function idt_custom_options() {
	include_once( IDT_THEME_DIR . '/custom-options/post-types.php' );
	include_once( IDT_THEME_DIR . '/custom-options/taxonomies.php' );
	include_once( IDT_THEME_DIR . '/custom-options/shortcodes.php' );
}
add_action( 'init', 'idt_custom_options', 0 );

/**
 * Add custom image sizes to wordpress
 */
require IDT_THEME_DIR . '/inc/image-sizes.php';

/**
 * Add loading of new pages on scroll and category change
 * without reloading the page on sections with listing of posts
 */
require IDT_THEME_DIR . '/inc/posts-listing-ajax.php';

/**
 * Add function to render button based on fields of button
 */
require IDT_THEME_DIR . '/inc/button.php';

/**
 * Replace phone number special characters and make it ready to call
 */
require IDT_THEME_DIR . '/inc/phone-number-filter.php';

/**
 * Loads related posts by selected terms or just random posts in the selected post type
 */
require IDT_THEME_DIR . '/inc/related-posts.php';

/**
 * Prints html with hierarchy parent pages for current "page" or "single post" or "archive page"
 */
require IDT_THEME_DIR . '/inc/breadcrumbs.php';

/**
 * Load static svg icons from the project
 */
require IDT_THEME_DIR . '/inc/load-svg-icon.php';

/**
 * Transliterate cyrillic characters to latin ones in post permalinks
 */
require IDT_THEME_DIR . '/inc/transliterate-permalinks.php';

/**
 * Disable guttenberg editor for certain templates
 */
require IDT_THEME_DIR . '/inc/disable-gutenberg.php';

/**
 * Disable classic editor for certain templates
 */
require IDT_THEME_DIR . '/inc/disable-classic-editor.php';

/**
 * Add helper functions for all pages
 */
require IDT_THEME_DIR . '/inc/page-functions.php';

/**
 * Add customizations on admin pages
 */
require IDT_THEME_DIR . '/inc/admin-pages-customization.php';

/**
 * Add functionalities for dynamic logo on header and footer
 */
require IDT_THEME_DIR . '/inc/logo-dynamic.php';

/**
 * Stop the email notifications for automatic plugin updates
 */
add_filter( 'auto_plugin_update_send_email', '__return_false' );


/**
 * Stop the email notifications for automatic theme updates
 */
add_filter( 'auto_theme_update_send_email', '__return_false' );

/**
 * Stop the email notifications for automatic core updates
 */
add_filter( 'auto_core_update_send_email', 'wpb_stop_auto_update_emails', 10, 4 );
function wpb_stop_update_emails( $send, $type, $core_update, $result ) {
	if ( ! empty( $type ) && $type == 'success' ) {
		return false;
	}
	
	return true;
}
