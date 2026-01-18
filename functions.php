<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

define( 'SODALICIOUS_THEME_DIRECTORY', trailingslashit( get_template_directory_uri() ) );
define( 'SODALICIOUS_REQUIRE_DIRECTORY', trailingslashit( get_template_directory() ) );
define( 'SODALICIOUS_WOOCOMMERCE', class_exists( 'WooCommerce' ) ? true : false );
define( 'SODALICIOUS_DEVELOPMENT', false );

/**
 * After setup theme
 */
if ( ! function_exists( 'sodalicious_setup' ) ) {
	function sodalicious_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Sodalicious, use a find and replace
		 * to change 'sodalicious' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'sodalicious', get_template_directory() . '/languages' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1920, 9999 );

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

		add_theme_support( 'post-formats', array(
			'gallery',
			'link',
			'quote',
			'video',
			'audio'
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name' => esc_html__( 'Small', 'sodalicious' ),
					'shortName' => esc_html__( 'S', 'sodalicious' ),
					'size' => 14,
					'slug' => 'small',
				),
				array(
					'name' => esc_html__( 'Normal', 'sodalicious' ),
					'shortName' => esc_html__( 'M', 'sodalicious' ),
					'size' => 16,
					'slug' => 'normal',
				),
				array(
					'name' => esc_html__( 'Large', 'sodalicious' ),
					'shortName' => esc_html__( 'L', 'sodalicious' ),
					'size' => 24,
					'slug' => 'large',
				),
				array(
					'name' => esc_html__( 'Huge', 'sodalicious' ),
					'shortName' => esc_html__( 'XL', 'sodalicious' ),
					'size' => 32,
					'slug' => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => esc_html__( 'Gray', 'sodalicious' ),
				'slug' => 'gray',
				'color' => '#848484',
			),
			array(
				'name' => esc_html__( 'Light Gray', 'sodalicious' ),
				'slug' => 'light-gray',
				'color' => '#e6e6e6',
			),
			array(
				'name' => esc_html__( 'Extra Light Gray', 'sodalicious' ),
				'slug' => 'extra-light-gray',
				'color' => '#f5f5f5',
			),
			array(
				'name' => esc_html__( 'White', 'sodalicious' ),
				'slug' => 'white',
				'color' => '#ffffff',
			),
			array(
				'name' => esc_html__( 'Black', 'sodalicious' ),
				'slug' => 'black',
				'color' => '#101010',
			)
		) );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// WooCommerce
		if ( SODALICIOUS_WOOCOMMERCE ) {
			add_theme_support( 'woocommerce' );
			add_theme_support( 'wc-product-gallery-slider' );
			add_theme_support( 'woocommerce', array(
				'thumbnail_image_width' => 700,
				'gallery_thumbnail_image_width' => 150,
				'single_image_width' => 700,
			) );
		}

		// register nav menus
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary Menu', 'sodalicious' )
		) );

		// 800x600
		add_image_size( 'sodalicious-800x600_crop', 800, 600, true );
		add_image_size( 'sodalicious-800x600', 800 );

		// 1280x853
		add_image_size( 'sodalicious-1280x853_crop', 1280, 853, true );
		add_image_size( 'sodalicious-1280x853', 1280 );

		// 1920x1080
		add_image_size( 'sodalicious-1920x1080_crop', 1920, 1080, true );
		add_image_size( 'sodalicious-1920x1080', 1920 );

		// 1920x960
		add_image_size( 'sodalicious-1920x960_crop', 1920, 960, true );

	}
}
add_action( 'after_setup_theme', 'sodalicious_setup' );

/**
 * Content width
 */
if ( ! function_exists( 'sodalicious_content_width' ) ) {
	function sodalicious_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'sodalicious/content_width', 1920 );
	}
}
add_action( 'after_setup_theme', 'sodalicious_content_width', 0 );

/**
 * Import ACF fields
 */
if ( ! SODALICIOUS_DEVELOPMENT ) {
	function sodalicious_acf_show_admin_panel() {
		return apply_filters( 'sodalicious/acf_show_admin_panel', false );
	}
	add_filter( 'acf/settings/show_admin', 'sodalicious_acf_show_admin_panel' );
}

if ( ! SODALICIOUS_DEVELOPMENT ) {
	require_once SODALICIOUS_REQUIRE_DIRECTORY . 'inc/helper/custom-fields/custom-fields.php';
}

if ( ! function_exists( 'sodalicious_acf_save_json' ) ) {
	function sodalicious_acf_save_json( $path ) {
		$path = SODALICIOUS_REQUIRE_DIRECTORY . 'inc/helper/custom-fields';
		return $path;
	}
}
add_filter( 'acf/settings/save_json', 'sodalicious_acf_save_json' );

if ( SODALICIOUS_DEVELOPMENT ) {
	if ( ! function_exists( 'sodalicious_acf_load_json' ) ) {
		function sodalicious_acf_load_json( $paths ) {
			unset( $paths[0] );
			$paths[] = SODALICIOUS_REQUIRE_DIRECTORY . 'inc/helper/custom-fields';
			return $paths;
		}
	}
	add_filter( 'acf/settings/load_json', 'sodalicious_acf_load_json' );
}

/**
 * Include Kirki fields
 */
require_once SODALICIOUS_REQUIRE_DIRECTORY . 'inc/framework/customizer-helper.php';
require_once SODALICIOUS_REQUIRE_DIRECTORY . 'inc/framework/customizer.php';

/**
 * Required files
 */
$sodalicious_theme_includes = array(
	'required-plugins',
	'enqueue',
	'includes',
	'demo-import',
	'functions',
	'actions',
	'filters',
	'menus',
	'elementor',
	'portfolio'
);

if ( SODALICIOUS_WOOCOMMERCE ) {
	$sodalicious_theme_includes[] = 'woocommerce';
}

foreach ( $sodalicious_theme_includes as $file ) {
	require_once SODALICIOUS_REQUIRE_DIRECTORY . 'inc/theme-' . $file . '.php';
}

// Unset the global variable.
unset( $sodalicious_theme_includes );

add_filter( 'vpf_enqueue_plugin_swiper', '__return_false' );