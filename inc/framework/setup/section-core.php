<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$priority = 0;

/**
 * General
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sg_1',
	'section' => 'core_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Preloader', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'preloader_style',
	'section' => 'core_general',
	'label' => esc_html__( 'Style Preloader', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'none' => esc_html__( 'None', 'sodalicious' ),
		'image' => esc_html__( 'Image', 'sodalicious' ),
		'bounce' => esc_html__( 'Bounce', 'sodalicious' )
	),
	'default' => 'image'
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'preloader_image',
	'section' => 'core_general',
	'label' => esc_html__( 'Preloader Image', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => $theme_path_images . 'preloader.svg',
	'active_callback' => array(
		array(
			'setting' => 'preloader_style',
			'operator' => '==',
			'value' => 'image'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sg_2',
	'section' => 'core_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Additional', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'custom_cursor',
	'section' => 'core_general',
	'label' => esc_html__( 'Custom Cursor', 'sodalicious' ),
	'priority' => $priority++,
	'choices' => array(
		'disable' => esc_html__( 'Disable', 'sodalicious' ),
		'enable' => esc_html__( 'Enable', 'sodalicious' ),
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'back_to_top',
	'section' => 'core_general',
	'label' => esc_html__( '"Back to Top" Button', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'sodalicious' ),
		'hide' => esc_html__( 'Hide', 'sodalicious' )
	),
	'default' => 'show',
) );

VLT_Options::add_field( array(
	'type' => 'code',
	'settings' => 'tracking_code',
	'section' => 'core_general',
	'label' => esc_html__( 'Tracking Code', 'sodalicious' ),
	'description' => esc_html__( 'Copy and paste your tracking code here.', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'language' => 'php',
	),
	'default' => '',
) );

/**
 * Site Protection
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'csp_1',
	'section' => 'core_site_protection',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Click Copyright', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'site_protection',
	'section' => 'core_site_protection',
	'label' => esc_html__( 'Site Protection', 'sodalicious' ),
	'tooltip' => esc_html__( 'It works for all visitors except administrator. You can check it in "Incognito Mode".', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'sodalicious' ),
		'hide' => esc_html__( 'Hide', 'sodalicious' )
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'editor',
	'settings' => 'site_protection_content',
	'section' => 'core_site_protection',
	'label' => esc_html__( 'Content', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
	'active_callback' => array(
		array(
			'setting' => 'site_protection',
			'operator' => '==',
			'value' => 'show'
		)
	)
) );

/**
 * Selection
 */
VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'selection_text_color',
	'section' => 'core_selection',
	'label' => esc_html__( 'Selection Text Color', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'alpha' => false
	),
	'default' => '#ffffff',
	'output' => array(
		array(
			'element' => '::selection',
			'property' => 'color',
			'suffix' => '!important'
		),
		array(
			'element' => '::-moz-selection',
			'property' => 'color',
			'suffix' => '!important'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'selection_background_color',
	'section' => 'core_selection',
	'label' => esc_html__( 'Selection Background Color', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'alpha' => true
	),
	'default' => '#101010',
	'output' => array(
		array(
			'element' => '::selection',
			'property' => 'background-color',
			'suffix' => '!important'
		),
		array(
			'element' => '::-moz-selection',
			'property' => 'background-color',
			'suffix' => '!important'
		)
	)
) );

/**
 * Theme border
 */
VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'theme_border',
	'section' => 'core_theme_border',
	'label' => esc_html__( 'Theme Border', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'sodalicious' ),
		'disable' => esc_html__( 'Disable', 'sodalicious' )
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'theme_border_thickness',
	'section' => 'core_theme_border',
	'label' => esc_html__( 'Border Thickness', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '16px',
	'output' => array(
		array(
			'element' => ':root',
			'property' => '--vlt-theme-border-thickness'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'theme_border_color',
	'section' => 'core_theme_border',
	'label' => esc_html__( 'Border Color', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '#ffffff',
	'output' => array(
		array(
			'element' => ':root',
			'property' => '--vlt-theme-border-color'
		),
	)
) );

/**
 * Scrollbar
 */
VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'custom_scrollbar',
	'section' => 'core_scrollbar',
	'label' => esc_html__( 'Custom Scrollbar', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'sodalicious' ),
		'disable' => esc_html__( 'Disable', 'sodalicious' )
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'custom_scrollbar_track_color',
	'section' => 'core_scrollbar',
	'label' => esc_html__( 'Track Color', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'alpha' => true
	),
	'default' => 'rgba(16,16,16,.05)',
	'output' => array(
		array(
			'element' => '::-webkit-scrollbar',
			'property' => 'background-color'
		)
	),
	'active_callback' => array(
		array(
			'setting' => 'custom_scrollbar',
			'operator' => '==',
			'value' => 'enable'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'custom_scrollbar_bar_color',
	'section' => 'core_scrollbar',
	'label' => esc_html__( 'Bar Color', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'alpha' => false
	),
	'default' => '#101010',
	'output' => array(
		array(
			'element' => '::-webkit-scrollbar-thumb',
			'property' => 'background-color'
		)
	),
	'active_callback' => array(
		array(
			'setting' => 'custom_scrollbar',
			'operator' => '==',
			'value' => 'enable'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'slider',
	'settings' => 'custom_scrollbar_width',
	'section' => 'core_scrollbar',
	'label' => esc_html__( 'Bar Width', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'min' => '0',
		'max' => '16',
		'step' => '1'
	),
	'default' => '5',
	'output' => array(
		array(
			'element' => '::-webkit-scrollbar',
			'property' => 'width',
			'units' => 'px'
		)
	),
	'active_callback' => array(
		array(
			'setting' => 'custom_scrollbar',
			'operator' => '==',
			'value' => 'enable'
		)
	)
) );

/**
 * Custom sidebars
 */
VLT_Options::add_field( array(
	'type' => 'repeater',
	'settings' => 'custom_sidebars',
	'section' => 'core_sidebars',
	'label' => esc_attr__( 'Custom Sidebars', 'sodalicious' ),
	'description' => esc_html__( 'Create new sidebars and use them later via the page builder for different areas.', 'sodalicious' ),
	'row_label' => array(
		'type' => 'field',
		'field' => 'sidebar_title',
		'value' => esc_attr__( 'Custom Sidebar', 'sodalicious' ),
	),
	'button_label' => esc_attr__( 'Add new sidebar area', 'sodalicious' ),
	'default' => '',
	'fields' => array(
		'sidebar_title' => array(
			'type' => 'text',
			'label' => esc_attr__( 'Sidebar Title', 'sodalicious' ),
			'default' => '',
		),
		'sidebar_description' => array(
			'type' => 'textarea',
			'label' => esc_attr__( 'Sidebar Description', 'sodalicious' ),
			'default' => '',
		),
	)
));

/**
 * Admin logo
 */
VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'login_logo_image',
	'section' => 'core_login_logo',
	'label' => esc_html__( 'Authorization Logo', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => $theme_path_images . 'sodalicious.png',
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'login_logo_image_height',
	'section' => 'core_login_logo',
	'label' => esc_html__( 'Logo Height', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '115px',
	'active_callback' => array(
		array(
			'setting' => 'login_logo_image',
			'operator' => '!=',
			'value' => ''
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'login_logo_image_width',
	'section' => 'core_login_logo',
	'label' => esc_html__( 'Logo Width', 'sodalicious' ),
	'transport' => 'auto',
	'priority' => $priority++,
	'default' => '102px',
	'active_callback' => array(
		array(
			'setting' => 'login_logo_image',
			'operator' => '!=',
			'value' => ''
		)
	)
) );
