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

		add_image_size( 'medium_fixed', '450', '450', true );
		add_image_size( 'medium_large_fixed', '768', '768', true );
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
	wp_enqueue_script( 'idt-gallery', get_template_directory_uri() . '/js/gallery.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'idt-swiper', get_template_directory_uri() . '/js/swiper.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'idt-tabs', get_template_directory_uri() . '/js/tabs.js', array('jquery'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
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
 * Disable classic editor for certain templates
 */
require IDT_THEME_DIR . '/inc/disable-classic-editor.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require IDT_THEME_DIR . '/inc/jetpack.php';
}

