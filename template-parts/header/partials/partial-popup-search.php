<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$acf_navbar = sodalicious_get_theme_mod( 'page_custom_navigation', true );

$search_class = 'vlt-search-popup';

if ( sodalicious_get_theme_mod( 'navigation_dark', $acf_navbar ) == 'enable' ) {
	$search_class .= ' vlt-search-popup--dark';
}

$search_form_class = 'vlt-search-form';
if ( sodalicious_get_theme_mod( 'header_search_ajax' ) == 'enable' ) {
	$search_form_class .= ' vlt-search-form--ajax';
}

?>

<div class="<?php echo sodalicious_sanitize_class( $search_class ); ?>">

	<div class="vlt-search-popup__header">

		<a href="#" class="vlt-search-icon-close js-search-form-close"><i class="ri-close-fill"></i></a>

	</div>

	<div class="vlt-search-popup__content">

		<div class="container">

			<div class="row">

				<div class="col-md-8 offset-md-2">

					<form class="<?php echo sodalicious_sanitize_class( $search_form_class ); ?>" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">

						<input type="text" name="s" placeholder="<?php esc_attr_e( 'Type here to search', 'sodalicious' ); ?>" value="<?php echo get_search_query(); ?>" autocomplete="off">

						<button><i class="ri-search-line"></i></button>

						<div class="vlt-search-form__results" style="display: none;"><?php esc_html_e( 'Loading...' , 'sodalicious' ); ?></div>

					</form>
					<!-- /.vlt-search-form -->

				</div>

			</div>

		</div>

	</div>

</div>