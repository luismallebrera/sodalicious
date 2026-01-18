<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

/**
 * Fallback menu
 */
if ( ! function_exists( 'sodalicious_fallback_menu' ) ) {

	function sodalicious_fallback_menu() {

		if ( current_user_can( 'administrator' ) ) {
			echo '<p class="vlt-no-menu-message">' . esc_html__( 'Please register navigation from', 'sodalicious' ) . ' ' . '<a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" target="_blank">' . esc_html__( 'Appearance > Menus', 'sodalicious' ) . '</a></p>';
		}

	}

}

/**
 * Add mega menu class
 */
if ( ! function_exists( 'sodalicious_add_mega_menu_class' ) ) {
	function sodalicious_add_mega_menu_class( $items, $args ) {

		foreach ( $items as $item ) {

			if ( class_exists( 'acf' ) && get_field( 'megamenu', $item ) ) {

				$item->classes[] = 'menu-item-has-megamenu';

				switch ( get_field( 'columns', $item ) ) {
					case '2':
						$item->classes[] = 'menu-item-has-megamenu--two';
						break;
					case '3':
						$item->classes[] = 'menu-item-has-megamenu--three';
						break;
					case '4':
						$item->classes[] = 'menu-item-has-megamenu--four';
						break;
					case '5':
						$item->classes[] = 'menu-item-has-megamenu--five';
						break;
				}

				if ( get_field( 'show_label', $item ) ) {
					$item->classes[] = 'menu-item-has-megamenu--hide-label';
				}

			}

		}

		return $items;

	}
}
add_filter( 'wp_nav_menu_objects', 'sodalicious_add_mega_menu_class', 10, 2 );

/**
 * Remove mega menu class
 */
if ( ! function_exists( 'sodalicious_remove_mega_menu_class' ) ) {
	function sodalicious_remove_mega_menu_class( $items, $args ) {
		foreach ( $items as $item ) {
			foreach ( $item->classes as $key => $class ) {
				if ( strpos( $class, 'menu-item-has-megamenu' ) !== false ) {
					unset( $item->classes[ $key ] );
				}
			}
		}
		return $items;
	}
}