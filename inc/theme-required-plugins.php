<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

/**
 * Required plugins
 */
if ( ! function_exists( 'sodalicious_tgm_plugins' ) ) {
	function sodalicious_tgm_plugins() {

		$source = 'https://sodalicious.me/plugins/';

		$plugins = array(
			array(
				'name' => esc_html__( 'Kirki', 'sodalicious' ),
				'slug' => 'kirki',
				'required' => true,
			),
			array(
				'name' => esc_html__( 'Sodalicious Helper Plugin', 'sodalicious' ),
				'slug' => 'sodalicious_helper_plugin',
				'source' => esc_url( $source . 'sodalicious_helper_plugin.zip' ),
				'required' => true,
				'version' => '1.0.9'
			),
			array(
				'name' => esc_html__( 'Advanced Custom Fields Pro', 'sodalicious' ),
				'slug' => 'advanced-custom-fields-pro',
				'source' => esc_url( $source . 'advanced-custom-fields-pro.zip' ),
				'required' => true,
			),
			array(
				'name' => esc_html__( 'Elementor Page Builder', 'sodalicious' ),
				'slug' => 'elementor',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Revolution Slider', 'sodalicious' ),
				'slug' => 'revslider',
				'source' => esc_url( $source . 'revslider.zip' ),
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Visual Portfolio', 'sodalicious' ),
				'slug' => 'visual-portfolio',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Contact Form 7', 'sodalicious' ),
				'slug' => 'contact-form-7',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'WooCommerce', 'sodalicious' ),
				'slug' => 'woocommerce',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'MC4WP: Mailchimp for WordPress', 'sodalicious' ),
				'slug' => 'mailchimp-for-wp',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Regenerate Thumbnails', 'sodalicious' ),
				'slug' => 'regenerate-thumbnails',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'Classic Widgets', 'sodalicious' ),
				'slug' => 'classic-widgets',
				'required' => false,
			),
			array(
				'name' => esc_html__( 'One Click Demo Import', 'sodalicious' ),
				'slug' => 'one-click-demo-import',
				'required' => false,
			)
		);

		tgmpa( $plugins );
	}
}
add_action( 'tgmpa_register', 'sodalicious_tgm_plugins' );

/**
 * Print notice if helper plugin is not installed
 */
if ( ! function_exists( 'sodalicious_helper_plugin_notice' ) ) {
	function sodalicious_helper_plugin_notice() {
		if ( class_exists( 'SODAThemesHelperPlugin' ) ) {
			return;
		}
		echo '<div class="notice notice-info is-dismissible"><p>' . sprintf( __( 'Please activate <strong>%s</strong> before your work with this theme.', 'sodalicious' ), 'Sodalicious Helper Plugin' ) . '</p></div>';
	}
}
add_action( 'admin_notices', 'sodalicious_helper_plugin_notice' );