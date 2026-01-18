<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

/**
 * Demo import
 */
if ( ! function_exists( 'sodalicious_demo_import_files' ) ) {
	function sodalicious_demo_import_files() {
		return array(
			array(
				'import_file_name' => esc_html__( 'Demo Import', 'sodalicious' ),
				'local_import_file' => SODALICIOUS_REQUIRE_DIRECTORY . 'inc/demo/demo-content.xml',
				'local_import_widget_file' => SODALICIOUS_REQUIRE_DIRECTORY . 'inc/demo/widgets.wie',
				'local_import_customizer_file' => SODALICIOUS_REQUIRE_DIRECTORY . 'inc/demo/customizer.dat'
			),
		);
	}
}
add_filter( 'pt-ocdi/import_files', 'sodalicious_demo_import_files' );

/**
 * Disable regenerate thumbnails
 */
add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );

/**
 * After setup function
 */
if ( ! function_exists( 'sodalicious_after_import_setup' ) ) {
	function sodalicious_after_import_setup() {

		global $wp_rewrite;

		// Set menus
		$primary_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );

		set_theme_mod( 'nav_menu_locations', array(
			'primary-menu' => $primary_menu->term_id
		) );

		// Set pages
		$front_page = get_page_by_title( 'Home digital agency' );
		if ( isset( $front_page->ID ) ) {
			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $front_page->ID );
		}

		// Update option
		update_option( 'date_format', 'm M, Y' );

		// Update permalink
		$wp_rewrite->set_permalink_structure( '/%postname%/' );

		// Set default vars for Elementor
		if( class_exists( '\Elementor\Plugin' ) ) {
			$kit = \Elementor\Plugin::$instance->kits_manager->get_active_kit_for_frontend();
			$kit->update_settings( [
				'container_width' => [
					'size' => '1230',
					'unit' => 'px'
				],
				'space_between_widgets' => [
					'column' => '0',
					'row' => '0',
					'unit' => 'px'
				],
				'global_image_lightbox' => '',
			] );
			\Elementor\Plugin::$instance->files_manager->clear_cache();
		}

		// Set default options for Elementor
		$elementor_options = array(
			'elementor_experiment-container' => 'active',
			'elementor_experiment-container_grid' => 'active',
			'elementor_experiment-e_swiper_latest' => 'inactive',
			'elementor_experiment-e_optimized_css_loading' => 'inactive',
			'elementor_experiment-e_font_icon_svg' => 'inactive',
			'elementor_unfiltered_files_upload' => true,
			'elementor_disable_color_schemes' => 'yes',
			'elementor_disable_typography_schemes' => 'yes'
		);

		foreach( $elementor_options as $key => $value ) {
			update_option( $key, $value );
		}

		$cpt_support = get_option( 'elementor_cpt_support' );

		// Check if option DOESN'T exist in db
		if ( ! $cpt_support ) {
			$cpt_support = [ 'page', 'post', 'portfolio', 'product' ]; // create array of our default supported post types
			update_option( 'elementor_cpt_support', $cpt_support ); // write it to the database
		}

		// If it DOES exist, but portfolio is NOT defined
		else if ( ! in_array( 'portfolio', $cpt_support ) ) {
			$cpt_support[] = 'portfolio'; // append to array
			update_option( 'elementor_cpt_support', $cpt_support ); // update database
		}

	}
}
add_action( 'pt-ocdi/after_import', 'sodalicious_after_import_setup' );