<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

if ( ! function_exists( 'sodalicious_dynamic_css' ) ) {
	function sodalicious_dynamic_css( $css ) {
		$css .= '';

		return $css;
	}
}
add_filter( 'kirki_sodalicious_customize_dynamic_css', 'sodalicious_dynamic_css' );