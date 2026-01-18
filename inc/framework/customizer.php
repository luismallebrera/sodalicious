<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

/**
* Add config
*/
VLT_Options::add_config( array(
	'capability' => 'edit_theme_options',
	'option_type' => 'theme_mod',
) );

$first_level = 10;
$second_level = 10;

/**
 * General
 */
VLT_Options::add_panel( 'panel_core', array(
	'title' => esc_html__( 'Core Options', 'sodalicious' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-admin-generic',
) );

VLT_Options::add_section( 'core_general', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'General Options', 'sodalicious' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-admin-generic',
) );

VLT_Options::add_section( 'core_site_protection', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'Site Protection', 'sodalicious' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-shield',
) );

VLT_Options::add_section( 'core_selection', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'Selection', 'sodalicious' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-editor-underline',
) );

VLT_Options::add_section( 'core_theme_border', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'Theme Border', 'sodalicious' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-fullscreen-alt',
) );

VLT_Options::add_section( 'core_scrollbar', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'Scrollbar', 'sodalicious' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-sort',
) );

VLT_Options::add_section( 'core_sidebars', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'Custom Sidebars', 'sodalicious' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-format-aside',
) );

VLT_Options::add_section( 'core_login_logo', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'Login Page', 'sodalicious' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-lock',
) );

require_once SODALICIOUS_REQUIRE_DIRECTORY . 'inc/framework/setup/section-core.php';

/**
 * Header
 */
VLT_Options::add_section( 'section_header_general', array(
	'title' => esc_html__( 'Header Options', 'sodalicious' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-arrow-up-alt',
) );

require_once SODALICIOUS_REQUIRE_DIRECTORY . 'inc/framework/setup/section-header.php';

/**
 * Footer
 */
VLT_Options::add_section( 'section_footer_general', array(
	'title' => esc_html__( 'Footer Options', 'sodalicious' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-arrow-down-alt',
) );

require_once SODALICIOUS_REQUIRE_DIRECTORY . 'inc/framework/setup/section-footer.php';

/**
 * Pages
 */
VLT_Options::add_panel( 'panel_page', array(
	'title' => esc_html__( 'Page Options', 'sodalicious' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-admin-page',
) );

VLT_Options::add_section( 'section_blog_general', array(
	'panel' => 'panel_page',
	'title' => esc_html__( 'General Options', 'sodalicious' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-admin-generic',
) );

VLT_Options::add_section( 'section_blog', array(
	'panel' => 'panel_page',
	'title' => esc_html__( 'Blog Options', 'sodalicious' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-admin-post',
) );

VLT_Options::add_section( 'section_archive', array(
	'panel' => 'panel_page',
	'title' => esc_html__( 'Archive Options', 'sodalicious' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-category',
) );

VLT_Options::add_section( 'section_search', array(
	'panel' => 'panel_page',
	'title' => esc_html__( 'Search Options', 'sodalicious' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-search',
) );

VLT_Options::add_section( 'section_single_post', array(
	'panel' => 'panel_page',
	'title' => esc_html__( 'Single Post', 'sodalicious' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-welcome-write-blog',
) );

VLT_Options::add_section( 'section_404', array(
	'panel' => 'panel_page',
	'title' => esc_html__( 'Page 404', 'sodalicious' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-warning',
) );

require SODALICIOUS_REQUIRE_DIRECTORY . 'inc/framework/setup/section-pages.php';

/**
 * Portfolio
 */
VLT_Options::add_section( 'section_single_portfolio', array(
	'panel' => '',
	'title' => esc_html__( 'Portfolio Options', 'sodalicious' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-grid-view',
) );

require_once SODALICIOUS_REQUIRE_DIRECTORY . 'inc/framework/setup/section-portfolio.php';

/**
 * WooCommerce
 */
if ( SODALICIOUS_WOOCOMMERCE ) {

	VLT_Options::add_section( 'section_single_product', array(
		'panel' => 'woocommerce',
		'title' => esc_html__( 'Single Product', 'sodalicious' ),
		'priority' => $second_level++,
	) );

	require_once SODALICIOUS_REQUIRE_DIRECTORY . 'inc/framework/setup/section-woocommerce.php';

}

/**
 * Typography
 */
VLT_Options::add_panel( 'panel_typography', array(
	'title' => esc_html__( 'Typography Options', 'sodalicious' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-editor-bold',
) );

VLT_Options::add_section( 'typography_fonts', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'General Fonts', 'sodalicious' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-editor-bold',
) );

VLT_Options::add_section( 'typography_text', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Text Options', 'sodalicious' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-text',
) );

VLT_Options::add_section( 'typography_headings', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Heading Options', 'sodalicious' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-editor-textcolor',
) );

VLT_Options::add_section( 'typography_blockquote', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Blockquote Options', 'sodalicious' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-editor-quote',
) );

VLT_Options::add_section( 'typography_buttons', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Button Options', 'sodalicious' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-admin-links',
) );

VLT_Options::add_section( 'typography_input', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Input Options', 'sodalicious' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-edit',
) );

VLT_Options::add_section( 'typography_widget', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Widget Options', 'sodalicious' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-welcome-widgets-menus',
) );

require_once SODALICIOUS_REQUIRE_DIRECTORY . 'inc/framework/setup/section-typography.php';

/**
 * Google map
 */
VLT_Options::add_section( 'section_google_map', array(
	'title' => esc_html__( 'Google Map', 'sodalicious' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-location',
) );

require_once SODALICIOUS_REQUIRE_DIRECTORY . 'inc/framework/setup/section-google-map.php';

/**
 * Advanced
 */
VLT_Options::add_section( 'section_advanced', array(
	'title' => esc_html__( 'Advanced', 'sodalicious' ),
	'priority' => 9999,
	'icon' => 'dashicons-star-filled',
) );

require_once SODALICIOUS_REQUIRE_DIRECTORY . 'inc/framework/setup/section-advanced.php';