<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$priority = 0;

/**
 * Advanced
 */
VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'jquery_in_footer',
	'section' => 'section_advanced',
	'label' => esc_html__( 'Load jQuery in footer', 'sodalicious' ),
	'description' => esc_html__( 'Solves render-blocking issue, however can cause plugin conflicts.', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'disable' => esc_html__( 'Disable', 'sodalicious' ),
		'enable' => esc_html__( 'Enable', 'sodalicious' ),
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'acf_show_admin_panel',
	'section' => 'section_advanced',
	'label' => esc_html__( 'Show ACF in Admin Panel', 'sodalicious' ),
	'description' => esc_html__( 'This field enable tab for ACF Professional in your dashboard.', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'hide' => esc_html__( 'Hide', 'sodalicious' ),
		'show' => esc_html__( 'Show', 'sodalicious' ),
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'mobile_status_bar_color',
	'section' => 'section_advanced',
	'label' => esc_html__( 'Mobile Status Bar Colors', 'sodalicious' ),
	'description' => esc_html__( 'Field for address bar or device status bar to match your brand colors.', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '#101010',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'comment_placement',
	'section' => 'section_advanced',
	'label' => esc_html__( 'Comment Placement', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'top' => esc_html__( 'Top', 'sodalicious' ),
		'bottom' => esc_html__( 'Bottom', 'sodalicious' )
	),
	'default' => 'bottom',
) );