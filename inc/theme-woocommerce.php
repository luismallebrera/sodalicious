<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

/**
 * Remove WooCommerce styles
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Custom product category title
 */
if ( ! function_exists( 'sodalicious_woocommerce_template_loop_category_title' ) ) {
	function sodalicious_woocommerce_template_loop_category_title( $category ) { ?>

		<div class="vlt-product-content">

			<h3 class="vlt-product-title">

				<?php

					/**
					* woocommerce_before_subcategory hook.
					*
					* @hooked woocommerce_template_loop_category_link_open - 10
					*/
					do_action( 'woocommerce_before_subcategory', $category );

					echo esc_html( $category->name );

					if ( $category->count > 0 ) {
						echo apply_filters( 'woocommerce_subcategory_count_html', ' <span class="count">(' . $category->count . ')</span>', $category );
					}

					/**
					* woocommerce_after_subcategory hook.
					*
					* @hooked woocommerce_template_loop_category_link_close - 10
					*/
					do_action( 'woocommerce_after_subcategory', $category );

				?>

			</h3>
			<!-- /.vlt-product-title -->

		</div>

		<?php
	}
}
remove_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10 );
add_action( 'woocommerce_shop_loop_subcategory_title', 'sodalicious_woocommerce_template_loop_category_title', 10 );

/**
 * Custom product category thumbnail
 */
if ( ! function_exists( 'sodalicious_woocommerce_subcategory_thumbnail' ) ) {
	function sodalicious_woocommerce_subcategory_thumbnail( $category ) {
		$small_thumbnail_size = apply_filters( 'subcategory_archive_thumbnail_size', 'woocommerce_thumbnail' );
		$dimensions = wc_get_image_size( $small_thumbnail_size );
		$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );

		if ( $thumbnail_id ) {
			$image = wp_get_attachment_image_src( $thumbnail_id, $small_thumbnail_size );
			$image = $image[0];
			$image_srcset = function_exists( 'wp_get_attachment_image_srcset' ) ? wp_get_attachment_image_srcset( $thumbnail_id, $small_thumbnail_size ) : false;
			$image_sizes = function_exists( 'wp_get_attachment_image_sizes' ) ? wp_get_attachment_image_sizes( $thumbnail_id, $small_thumbnail_size ) : false;
		} else {
			$image = wc_placeholder_img_src();
			$image_srcset = false;
			$image_sizes = false;
		}

		if ( $image ) {
			// Prevent esc_url from breaking spaces in urls for image embeds.
			// Ref: https://core.trac.wordpress.org/ticket/23605.
			$image = str_replace( ' ', '%20', $image );

			// Add responsive image markup if available.
			echo '<div class="vlt-product-media">';

			/**
			* woocommerce_before_subcategory hook.
			*
			* @hooked woocommerce_template_loop_category_link_open - 10
			*/
			do_action( 'woocommerce_before_subcategory', $category );

			if ( $image_srcset && $image_sizes ) {
				echo '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '" width="' . esc_attr( $dimensions['width'] ) . '" height="' . esc_attr( $dimensions['height'] ) . '" srcset="' . esc_attr( $image_srcset ) . '" sizes="' . esc_attr( $image_sizes ) . '" />';
			} else {
				echo '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '" width="' . esc_attr( $dimensions['width'] ) . '" height="' . esc_attr( $dimensions['height'] ) . '" />';
			}

			/**
			* woocommerce_after_subcategory hook.
			*
			* @hooked woocommerce_template_loop_category_link_close - 10
			*/
			do_action( 'woocommerce_after_subcategory', $category );

			echo '</div>';
		}
	}
}
remove_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10 );
add_action( 'woocommerce_before_subcategory_title', 'sodalicious_woocommerce_subcategory_thumbnail', 10 );

/**
 * Update cart via AJAX
 */
if ( ! function_exists( 'sodalicious_update_cart_data' ) ) {
	function sodalicious_update_cart_data( $array ) {
		$array['.vlt-shop-cart-icon'] = '<a href="' . esc_url( wc_get_cart_url() ) .'" class="vlt-shop-cart-icon">
			<i class="ri-shopping-bag-line"></i>
			<span>' . esc_html( WC()->cart->get_cart_contents_count() ) . '</span>
			</a>';
		return $array;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'sodalicious_update_cart_data' );

/**
 * Add comma to tag widget
 */
if ( ! function_exists( 'sodalicious_filter_woo_tag_cloud' ) ) {
	function sodalicious_filter_woo_tag_cloud( $array ) {
		$array['smallest'] = 14;
		$array['largest'] = 14;
		$array['unit'] = 'px';
		$array['separator']= '';
		return $array;
	}
}
add_filter ( 'woocommerce_product_tag_cloud_widget_args', 'sodalicious_filter_woo_tag_cloud' );

/**
 * Define the woocommerce_share callback
 */
if ( ! function_exists( 'sodalicious_action_woocommerce_share' ) ) {
	function sodalicious_action_woocommerce_share() {
		if ( ! function_exists( 'sodalicious_get_post_share_buttons' ) ) {
			return;
		}
		echo '<div class="vlt-social-share">';
		echo sodalicious_get_post_share_buttons( get_the_ID() );
		echo '</div>';
	}
}
add_action( 'woocommerce_share', 'sodalicious_action_woocommerce_share', 10 );

/**
 * Reviews args
 */
if ( ! function_exists( 'sodalicious_product_review_list_args' ) ) {
	function sodalicious_product_review_list_args($args) {
		$args['style'] = 'ul';
		$args['avatar_size'] = 90;
		return $args;
	}
}
add_filter( 'woocommerce_product_review_list_args', 'sodalicious_product_review_list_args' );

/**
* Max upsells Products
*/
if ( ! function_exists( 'sodalicious_max_upsell_products' ) ) {
	function sodalicious_max_upsell_products( $args ) {
		$args['posts_per_page'] = 4;
		return $args;
	}
}
add_filter( 'woocommerce_output_related_products_args', 'sodalicious_max_upsell_products' );

/**
* Max crossells Products
*/
if ( ! function_exists( 'sodalicious_max_crosssell_products' ) ) {
	function sodalicious_max_crosssell_products( $total ) {
		$total = '4';
		return $total;
	}
}
add_filter( 'woocommerce_cross_sells_total', 'sodalicious_max_crosssell_products' );

/**
* Max related Products
*/
if ( ! function_exists( 'sodalicious_related_products_args' ) ) {
	function sodalicious_related_products_args( $args ) {
		$args['posts_per_page'] = 4;
		return $args;
	}
}
add_filter( 'woocommerce_output_related_products_args', 'sodalicious_related_products_args' );

/**
* Custom gallery image html
*/
if ( ! function_exists( 'sodalicious_get_gallery_image_html' ) ) {
	function sodalicious_get_gallery_image_html( $attachment_id, $main_image = false ) {
		$flexslider = (bool) apply_filters( 'woocommerce_single_product_flexslider_enabled', get_theme_support( 'wc-product-gallery-slider' ) );
		$gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
		$thumbnail_size = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
		$image_size = apply_filters( 'woocommerce_gallery_image_size', $flexslider || $main_image ? 'woocommerce_single' : $thumbnail_size );
		$full_size = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
		$thumbnail_src = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
		$full_src = wp_get_attachment_image_src( $attachment_id, $full_size );
		$alt_text = trim( wp_strip_all_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) );
		$image = wp_get_attachment_image(
			$attachment_id,
			$image_size,
			false,
			apply_filters(
				'woocommerce_gallery_image_html_attachment_image_params',
				array(
					'title' => _wp_specialchars( get_post_field( 'post_title', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
					'data-caption' => _wp_specialchars( get_post_field( 'post_excerpt', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
					'data-src' => esc_url( $full_src[0] ),
					'data-large_image' => esc_url( $full_src[0] ),
					'data-large_image_width' => esc_attr( $full_src[1] ),
					'data-large_image_height' => esc_attr( $full_src[2] ),
					'class' => esc_attr( $main_image ? 'wp-post-image' : '' ),
				),
				$attachment_id,
				$image_size,
				$main_image
			)
		);

		return '<div data-thumb="' . esc_url( $thumbnail_src[0] ) . '" data-thumb-alt="' . esc_attr( $alt_text ) . '" class="woocommerce-product-gallery__image"><a data-fancybox="" href="' . esc_url( $full_src[0] ) . '">' . $image . '</a></div>';
	}
}

/**
* Get product price
*/
if ( ! function_exists( 'sodalicious_get_product_price' ) ) {
	function sodalicious_get_product_price( $product ) {
		$output = '';
		if ( $product->get_price_html() ) {
			$output .= '<div class="price">';
			$output .= $product->get_price_html();
			$output .= '</div>';
		}
		return $output;
	}
}