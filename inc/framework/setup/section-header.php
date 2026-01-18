<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$priority = 0;

/**
 * Header general
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_1',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_show',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Header Show', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'sodalicious' ),
		'hide' => esc_html__( 'Hide', 'sodalicious' ),
	),
	'default' => 'show',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_type',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Header Layout', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'default' => esc_html__( 'Default', 'sodalicious' ),
		'default-center' => esc_html__( 'Default Center', 'sodalicious' ),
		'default-left' => esc_html__( 'Default Left', 'sodalicious' ),
		'fullscreen' => esc_html__( 'Fullscreen', 'sodalicious' ),
		'fullscreen-dark' => esc_html__( 'Fullscreen Dark', 'sodalicious' ),
		'offcanvas' => esc_html__( 'Offcanvas', 'sodalicious' ),
		'offcanvas-dark' => esc_html__( 'Offcanvas Dark', 'sodalicious' ),
		'aside' => esc_html__( 'Aside', 'sodalicious' ),
		'slide' => esc_html__( 'Slide', 'sodalicious' )
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		)
	),
	'default' => 'default',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_2',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Navigation', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'slide',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'aside',
		),
	),
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_opaque',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Navigation Opaque', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'sodalicious' ),
		'disable' => esc_html__( 'Disable', 'sodalicious' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'slide',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'aside',
		),
	),
	'default' => 'enable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_transparent',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Transparent', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'sodalicious' ),
		'disable' => esc_html__( 'Disable', 'sodalicious' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'slide',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'aside',
		),
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_transparent_always',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Transparent Always', 'sodalicious' ),
	'description' => esc_html__( 'Transparent also after page scrolled down.', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'sodalicious' ),
		'disable' => esc_html__( 'Disable', 'sodalicious' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'slide',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'aside',
		),
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_sticky',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Sticky', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'sodalicious' ),
		'disable' => esc_html__( 'Disable', 'sodalicious' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'slide',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'aside',
		),
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_hide_on_scroll',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Hide on Scroll', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'sodalicious' ),
		'disable' => esc_html__( 'Disable', 'sodalicious' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'navigation_sticky',
			'operator' => '==',
			'value' => 'enable',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'slide',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'aside',
		),
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_white_text_on_top',
	'section' => 'section_header_general',
	'label' => esc_html__( 'White Text on Top', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'sodalicious' ),
		'disable' => esc_html__( 'Disable', 'sodalicious' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'slide',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'aside',
		),
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_dark',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Dark Navbar', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'sodalicious' ),
		'disable' => esc_html__( 'Disable', 'sodalicious' ),
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'slide',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'aside',
		),
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_3',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Search', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'slide',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'aside',
		),
	),
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'header_search_icon',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Search Icon', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'sodalicious' ),
		'hide' => esc_html__( 'Hide', 'sodalicious' )
	),
	'default' => 'hide',
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'slide',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'aside',
		),
	),
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'header_search_ajax',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Search AJAX', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'sodalicious' ),
		'disable' => esc_html__( 'Disable', 'sodalicious' )
	),
	'default' => 'disable',
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'slide',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'aside',
		),
		array(
			'setting' => 'header_search_icon',
			'operator' => '==',
			'value' => 'show'
		)
	),
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_4',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Fullscreen Site', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'slide',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'aside',
		),
	),
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'site_fullscreen_icon',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Fullscreen Site Icon', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'sodalicious' ),
		'hide' => esc_html__( 'Hide', 'sodalicious' )
	),
	'default' => 'hide',
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'slide',
		),
		array(
			'setting' => 'navigation_type',
			'operator' => '!=',
			'value' => 'aside',
		),
	),
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_5',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Logo', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'header_logo',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Logo', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'header_logo_white',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Logo White', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'header_logo_height',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Logo Height', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
	'output' => array(
		array(
			'element' => '.vlt-navbar-logo img',
			'property' => 'height'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_6',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Logo Small', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'header_logo_small',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Logo', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'header_logo_small_white',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Logo White', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'header_logo_small_height',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Logo Height', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
	'output' => array(
		array(
			'element' => '.vlt-navbar-logo.vlt-navbar-logo--small img',
			'property' => 'height'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'header_tagline',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Tagline', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'sodalicious' ),
		'hide' => esc_html__( 'Hide', 'sodalicious' )
	),
	'default' => 'show'
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_7',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Socials', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'repeater',
	'settings' => 'header_social_list',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Social List', 'sodalicious' ),
	'description' => esc_html__( 'Social icons is shown only for some styles of menu. (It works for aside, offcanvas and slide menus)', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'row_label' => array(
		'type' => 'text',
		'value' => esc_html__( 'social', 'sodalicious' )
	),
	'fields' => array(
		'social_icon' => array(
			'type' => 'select',
			'label' => esc_html__( 'Social Icon', 'sodalicious' ),
			'choices' => sodalicious_get_social_icons()
		),
		'social_url' => array(
			'type' => 'text',
			'label' => esc_html__( 'Social Url', 'sodalicious' )
		),
	),
	'default' => ''
) );

if ( SODALICIOUS_WOOCOMMERCE ) {

	VLT_Options::add_field( array(
		'type' => 'custom',
		'settings' => 'shg_8',
		'section' => 'section_header_general',
		'default' => '<div class="kirki-separator">' . esc_html__( 'WooCommerce', 'sodalicious' ) . '</div>',
		'priority' => $priority++,
		'active_callback' => array(
			array(
				'setting' => 'navigation_show',
				'operator' => '==',
				'value' => 'show',
			),
			array(
				'setting' => 'navigation_type',
				'operator' => '!=',
				'value' => 'slide',
			),
			array(
				'setting' => 'navigation_type',
				'operator' => '!=',
				'value' => 'aside',
			),
		),
	) );

	VLT_Options::add_field( array(
		'type' => 'select',
		'settings' => 'header_cart_icon',
		'section' => 'section_header_general',
		'label' => esc_html__( 'Cart Icon', 'sodalicious' ),
		'description' => esc_html__( 'The cart icon is shown only on pages related to the store.', 'sodalicious' ),
		'priority' => $priority++,
		'transport' => 'auto',
		'choices' => array(
			'show' => esc_html__( 'Show', 'sodalicious' ),
			'hide' => esc_html__( 'Hide', 'sodalicious' )
		),
		'default' => 'show',
		'active_callback' => array(
			array(
				'setting' => 'navigation_show',
				'operator' => '==',
				'value' => 'show',
			),
			array(
				'setting' => 'navigation_type',
				'operator' => '!=',
				'value' => 'slide',
			),
			array(
				'setting' => 'navigation_type',
				'operator' => '!=',
				'value' => 'aside',
			),
		),
	) );

}

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_9',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Menu Sounds', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'menu_toggle_sound',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Menu Toggle Sound', 'sodalicious' ),
	'description' => esc_html__( 'Sounds when you open / close menu.', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'sodalicious' ),
		'disable' => esc_html__( 'Disable', 'sodalicious' )
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'upload',
	'settings' => 'open_click_sound',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Audio for "Open Menu"', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
	'active_callback' => array(
		array(
			'setting' => 'menu_toggle_sound',
			'operator' => '==',
			'value' => 'enable',
		)
	),
) );

VLT_Options::add_field( array(
	'type' => 'upload',
	'settings' => 'close_click_sound',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Audio for "Close Menu"', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
	'active_callback' => array(
		array(
			'setting' => 'menu_toggle_sound',
			'operator' => '==',
			'value' => 'enable',
		)
	),
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_10',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Topbar', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'topbar_show',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Topbar Show', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'sodalicious' ),
		'hide' => esc_html__( 'Hide', 'sodalicious' ),
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'topbar_template',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Topbar Template', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => sodalicious_get_elementor_templates(),
	'active_callback' => array(
		array(
			'setting' => 'topbar_show',
			'operator' => '==',
			'value' => 'show'
		),
	)
) );