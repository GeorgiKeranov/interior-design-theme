<?php
/**
 * Interior Design Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Interior_Design_Theme
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

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

		/**
		 * Add custom options like template fields and global theme fields to the theme
		 */
		function idt_add_custom_options_to_theme() {
			include_once(IDT_THEME_DIR . '/custom-options/post-meta.php');
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
				'menu-1' => esc_html__( 'Primary', 'idt' ),
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
	wp_enqueue_style( 'idt-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'idt-style', 'rtl', 'replace' );

	wp_enqueue_style( 'google-ubuntu-font', 'https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap', array(), _S_VERSION );

	wp_enqueue_script( 'idt-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery',), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'idt_scripts' );

/**
 * Implement the Custom Header feature.
 */
require IDT_THEME_DIR . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require IDT_THEME_DIR . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require IDT_THEME_DIR . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require IDT_THEME_DIR . '/inc/customizer.php';

/**
 * Disable guttenberg editor for certain templates
 */
require IDT_THEME_DIR . '/inc/disable-gutenberg.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require IDT_THEME_DIR . '/inc/jetpack.php';
}

