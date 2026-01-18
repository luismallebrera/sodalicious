<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$priority = 0;

/**
 * Portfolio Single
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sps_1',
	'section' => 'section_single_portfolio',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Navigation', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'work_navigation',
	'section' => 'section_single_portfolio',
	'label' => esc_html__( 'Work Navigation', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'sodalicious' ),
		'hide' => esc_html__( 'Hide', 'sodalicious' )
	),
	'default' => 'show',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'work_navigation_style',
	'section' => 'section_single_portfolio',
	'label' => esc_html__( 'Navigation Style', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'style-1' => esc_html__( 'Style 1', 'sodalicious' ),
		'style-2' => esc_html__( 'Style 2', 'sodalicious' )
	),
	'default' => 'style-1',
	'active_callback' => array(
		array(
			'setting' => 'work_navigation',
			'operator' => '==',
			'value' => 'show'
		)
	),
) );

if ( class_exists( 'Kirki_Helper' ) ) {
	VLT_Options::add_field( array(
		'type' => 'select',
		'settings' => 'portfolio_link',
		'section' => 'section_single_portfolio',
		'label' => esc_html__( 'Portfolio Link', 'sodalicious' ),
		'tooltip' => esc_html__( 'For back button.', 'sodalicious' ),
		'priority' => $priority++,
		'transport' => 'auto',
		'multiple' => 1,
		'choices' => Kirki_Helper::get_posts(
			array(
				'posts_per_page' => 9999,
				'post_type' => 'page'
			)
		),
		'default' => '',
		'active_callback' => array(
			array(
				'setting' => 'work_navigation',
				'operator' => '==',
				'value' => 'show'
			)
		),
	) );
}