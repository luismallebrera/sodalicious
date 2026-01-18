<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

/**
 * Register sidebars
 */
if ( ! function_exists( 'sodalicious_register_sidebar' ) ) {
	function sodalicious_register_sidebar() {

		register_sidebar( array(
			'name' => esc_html__( 'Blog Sidebar', 'sodalicious' ),
			'id' => 'blog_sidebar',
			'description' => esc_html__( 'Blog Widget Area', 'sodalicious' ),
			'before_widget' => '<div id="%1$s" class="vlt-widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="vlt-widget__title">',
			'after_title' => '</h5>'
		) );

		register_sidebar( array(
			'name' => esc_html__( 'Slide Menu Sidebar', 'sodalicious' ),
			'id' => 'slide_menu_sidebar',
			'description' => esc_html__( 'Slide Menu Widget Area', 'sodalicious' ),
			'before_widget' => '<div id="%1$s" class="vlt-widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="vlt-widget__title">',
			'after_title' => '</h5>'
		) );

		register_sidebar( array(
			'name' => esc_html__( 'Fullscreen Menu Sidebar', 'sodalicious' ),
			'id' => 'fullscreen_menu_sidebar',
			'description' => esc_html__( 'Fullscreen Menu Widget Area', 'sodalicious' ),
			'before_widget' => '<div id="%1$s" class="vlt-widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="vlt-widget__title">',
			'after_title' => '</h5>'
		) );

		register_sidebar( array(
			'name' => esc_html__( 'Mobile Menu Sidebar', 'sodalicious' ),
			'id' => 'mobile_menu_sidebar',
			'description' => esc_html__( 'Mobile Menu Widget Area', 'sodalicious' ),
			'before_widget' => '<div id="%1$s" class="vlt-widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="vlt-widget__title">',
			'after_title' => '</h5>'
		) );

		// shop sidebar
		if ( SODALICIOUS_WOOCOMMERCE ) {
			register_sidebar( array(
				'name' => esc_html__( 'Shop Sidebar', 'sodalicious' ),
				'id' => 'shop_sidebar',
				'description' => esc_html__( 'Shop Widget Area', 'sodalicious' ),
				'before_widget' => '<div id="%1$s" class="vlt-widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h5 class="vlt-widget__title">',
				'after_title' => '</h5>'
			) );
		}

		// custom sidebars
		if ( sodalicious_get_theme_mod( 'custom_sidebars' ) ) {
			foreach ( sodalicious_get_theme_mod( 'custom_sidebars' ) as $sidebar ) {
				if ( ! empty( $sidebar[ 'sidebar_title' ] && ! empty( $sidebar[ 'sidebar_description' ] ) ) ) {
					register_sidebar( array(
						'name' => esc_html( $sidebar[ 'sidebar_title' ] ),
						'id' => strtolower( trim( preg_replace( '/[^A-Za-z0-9-]+/', '_', $sidebar[ 'sidebar_title' ] ) ) ),
						'description' => esc_html( $sidebar[ 'sidebar_description' ] ),
						'before_widget' => '<div id="%1$s" class="vlt-widget %2$s">',
						'after_widget' => '</div>',
						'before_title' => '<h5 class="vlt-widget__title">',
						'after_title' => '</h5>'
					) );
				}
			}
		}

	}
}
add_action( 'widgets_init', 'sodalicious_register_sidebar' );

/**
 * Site protection
 */
if ( ! function_exists( 'sodalicious_site_protection' ) ) {
	function sodalicious_site_protection() {
		$acf_page_custom_site_protection = sodalicious_get_theme_mod( 'page_custom_site_protection', true );
		if ( sodalicious_get_theme_mod( 'site_protection', $acf_page_custom_site_protection ) == 'show' && ! current_user_can( 'administrator' ) ) :
			echo '<div class="vlt-site-protection"><div>';
			echo wp_kses( sodalicious_get_theme_mod( 'site_protection_content' ), 'sodalicious_site_protection' );
			echo '</div></div>';
		endif;
	}
}
add_action( 'wp_body_open', 'sodalicious_site_protection' );

/**
 * Change admin logo
 */
if ( ! function_exists( 'sodalicious_change_admin_logo' ) ) {
	function sodalicious_change_admin_logo() {
		if ( ! sodalicious_get_theme_mod( 'login_logo_image' ) ) {
			return;
		}
		$image_url = sodalicious_get_theme_mod( 'login_logo_image' );
		$image_w = sodalicious_get_theme_mod( 'login_logo_image_width' );
		$image_h = sodalicious_get_theme_mod( 'login_logo_image_height' );
		echo '<style type="text/css">
			h1 a {
				background: transparent url(' . esc_url( $image_url ) . ') 50% 50% no-repeat !important;
				width:' . esc_attr( $image_w ) . '!important;
				height:' . esc_attr( $image_h ) . '!important;
				background-size: cover !important;
			}
		</style>';
	}
}
add_action( 'login_head', 'sodalicious_change_admin_logo' );

/**
 * Prints Tracking code
 */
if ( ! function_exists( 'sodalicious_print_tracking_code' ) ) {
	function sodalicious_print_tracking_code() {
		$tracking_code = sodalicious_get_theme_mod( 'tracking_code' );
		if ( ! empty( $tracking_code ) ) {
			echo '' . $tracking_code;
		}
	}
}
add_action( 'wp_head', 'sodalicious_print_tracking_code' );

/**
 * Add cursor
 */
if ( ! function_exists( 'sodalicious_add_cursor' ) ) {
	function sodalicious_add_cursor() {

		echo '<div class="vlt-cursor">';

			echo '<div class="outer">';
				echo '<div class="circle"></div>';
			echo '</div>';

			echo '<div class="inner">';
				echo '<div class="icon">';
					echo '';
				echo '</div>';
			echo '</div>';

		echo '</div>';

	}
}
add_action( 'wp_body_open', 'sodalicious_add_cursor' );

/**
 * Add theme borders
 */
if ( ! function_exists( 'sodalicious_add_theme_borders' ) ) {
	function sodalicious_add_theme_borders() {

		$acf_theme_borders = sodalicious_get_theme_mod( 'page_custom_theme_border', true );
		if ( sodalicious_get_theme_mod( 'theme_border', $acf_theme_borders ) == 'enable' ) {

			echo '<div class="vlt-theme-borders">';
				echo '<div class="vlt-theme-borders__top vlt-theme-borders__top--shadow"></div>';
				echo '<div class="vlt-theme-borders__right vlt-theme-borders__right--shadow"></div>';
				echo '<div class="vlt-theme-borders__bottom vlt-theme-borders__bottom--shadow"></div>';
				echo '<div class="vlt-theme-borders__left vlt-theme-borders__left--shadow"></div>';

				echo '<div class="vlt-theme-borders__top"></div>';
				echo '<div class="vlt-theme-borders__right"></div>';
				echo '<div class="vlt-theme-borders__bottom"></div>';
				echo '<div class="vlt-theme-borders__left"></div>';
			echo '</div>';

		}

	}
}
add_action( 'wp_body_open', 'sodalicious_add_theme_borders' );

/**
 * Get AJAX search results
 */
if ( ! function_exists( 'sodalicious_get_ajax_search_results' ) ) {
	function sodalicious_get_ajax_search_results() {

		$args = array(
			's' => $_POST[ 'searchTarget' ],
			'posts_per_page' => -1
		);

		if ( isset( $_POST[ 'searchType' ] ) ) {
			$args[ 'post_type' ] = $_POST[ 'searchType' ];
		}

		if ( isset( $_POST[ 'searchTaxonomy' ] ) && isset( $_POST[ 'searchTermID' ] ) ) {
			$args[ 'tax_query' ] = [
				[
					'taxonomy' => $_POST[ 'searchTaxonomy' ],
					'field' => 'term_id',
					'terms' => $_POST[ 'searchTermID' ]
				]
			];
		}

		$new_query = new WP_Query( $args );

		if ( $new_query->have_posts() ) :
			echo '<ul>';
			while ( $new_query->have_posts() ) : $new_query->the_post();
				$post_type = get_post_type_object( get_post_type() );
				echo '<li class="vlt-search-result vlt-search-result--' . $post_type->name . '">';
					if ( has_post_thumbnail() ) {
						echo '<span class="vlt-search-result__thumbnail">';
						the_post_thumbnail( apply_filters( 'sodalicious/ajax-search-results-image-size', 'thumbnail' ), array( 'loading' => 'lazy' ) );
						echo '</span>';
					}
					echo '<a href="' . get_permalink() .'" class="vlt-search-result__title">' . get_the_title() . '</a>';
					echo '<span class="badge">' . esc_html( $post_type->labels->singular_name ) . '</span>';
				echo '</li>';
			endwhile;
			echo '</ul>';
		endif;
		wp_reset_postdata();

		wp_die();
	}
}
add_action( 'wp_ajax_ajax-search-results', 'sodalicious_get_ajax_search_results' );
add_action( 'wp_ajax_nopriv_ajax-search-results', 'sodalicious_get_ajax_search_results' );