<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$priority = 0;

/**
 * Product Single
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'ssp_1',
	'section' => 'section_single_product',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Navigation', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'product_navigation',
	'section' => 'section_single_product',
	'label' => esc_html__( 'Product Navigation', 'sodalicious' ),
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
	'settings' => 'product_navigation_style',
	'section' => 'section_single_product',
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
			'setting' => 'product_navigation',
			'operator' => '==',
			'value' => 'show'
		)
	),
) );

if ( class_exists( 'Kirki_Helper' ) ) {
	VLT_Options::add_field( array(
		'type' => 'select',
		'settings' => 'shop_link',
		'section' => 'section_single_product',
		'label' => esc_html__( 'Shop Link', 'sodalicious' ),
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
				'setting' => 'product_navigation',
				'operator' => '==',
				'value' => 'show'
			)
		),
	) );
}