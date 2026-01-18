<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$acf_navbar = sodalicious_get_theme_mod( 'page_custom_navigation', true );

$header_class = 'vlt-header vlt-header--fullscreen';

if ( sodalicious_get_theme_mod( 'navigation_opaque', $acf_navbar ) == 'enable' ) {
	$header_class .= apply_filters( 'sodalicious/navigation_opaque', ' vlt-header--opaque' );
}

if ( sodalicious_get_theme_mod( 'navigation_dark', $acf_navbar ) == 'enable' ) {
	$header_class .= apply_filters( 'sodalicious/navigation_dark', ' vlt-header--dark' );
}

$navbar_class = 'vlt-navbar vlt-navbar--main';

if ( sodalicious_get_theme_mod( 'navigation_transparent', $acf_navbar ) == 'enable' ) {
	$navbar_class .= apply_filters( 'sodalicious/navigation_transparent', ' vlt-navbar--transparent' );
}

if ( sodalicious_get_theme_mod( 'navigation_transparent_always', $acf_navbar ) == 'enable' ) {
	$navbar_class .= apply_filters( 'sodalicious/navigation_transparent_always', ' vlt-navbar--transparent-always' );
}

if ( sodalicious_get_theme_mod( 'navigation_sticky', $acf_navbar ) == 'enable' ) {
	$navbar_class .= apply_filters( 'sodalicious/navigation_sticky', ' vlt-navbar--sticky' );

	if ( sodalicious_get_theme_mod( 'navigation_hide_on_scroll', $acf_navbar ) == 'enable' ) {

		$navbar_class .= apply_filters( 'sodalicious/navigation_hide_on_scroll', ' vlt-navbar--hide-on-scroll' );

	}

}

if ( sodalicious_get_theme_mod( 'navigation_white_text_on_top', $acf_navbar ) == 'enable' ) {
	$navbar_class .= apply_filters( 'sodalicious/navigation_white_text_on_top', ' vlt-navbar--white-text-on-top' );
}

?>

<div class="d-none d-lg-block">

	<header class="<?php echo sodalicious_sanitize_class( $header_class ); ?>">

		<div class="<?php echo sodalicious_sanitize_class( $navbar_class ); ?>">

			<div class="vlt-navbar-inner">

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="vlt-navbar-logo">

					<?php if ( sodalicious_get_theme_mod( 'header_logo' ) ) : ?>

						<img src="<?php echo esc_url( sodalicious_get_theme_mod( 'header_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="black" loading="lazy">

						<img src="<?php echo esc_url( sodalicious_get_theme_mod( 'header_logo_white' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="white" loading="lazy">

					<?php else: ?>

						<h2><?php bloginfo( 'name' ); ?></h2>

					<?php endif; ?>

				</a>
				<!-- .vlt-navbar-logo -->

				<div class="vlt-navbar-buttons">

					<?php if ( sodalicious_get_theme_mod( 'site_fullscreen_icon' ) == 'show' ) : ?>

						<a href="#" class="vlt-site-fullscreen-icon js-site-fullscreen-toggle"><i class="ri-fullscreen-fill"></i></a>

					<?php endif; ?>

					<?php if ( sodalicious_get_theme_mod( 'header_search_icon', $acf_navbar ) == 'show' ) : ?>

						<a href="#" class="vlt-search-icon js-search-form-open"><i class="ri-search-line"></i></a>

					<?php endif; ?>

					<?php if ( SODALICIOUS_WOOCOMMERCE ) : ?>

						<?php if ( sodalicious_get_theme_mod( 'header_cart_icon' ) == 'show' && ( is_woocommerce() || is_page_template( 'template-woocommerce-page.php' ) ) ) : ?>

							<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="vlt-shop-cart-icon">

								<i class="ri-shopping-bag-line"></i>

								<span><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>

							</a>

						<?php endif; ?>

					<?php endif; ?>

					<a href="#" class="vlt-menu-burger js-fullscreen-menu-toggle">
						<i class="ri-menu-fill"></i>
					</a>

				</div>
				<!-- /.vlt-navbar-buttons -->

			</div>
			<!-- /.vlt-navbar-inner -->

		</div>
		<!-- /.vlt-navbar -->

	</header>
	<!-- /.vlt-header--fullscreen -->

	<nav class="vlt-nav vlt-nav--fullscreen" data-submenu-effect="style-1">

		<div class="vlt-nav-table">

			<div class="vlt-nav-row">

				<div class="vlt-nav--fullscreen__header">

					<a href="#" class="vlt-menu-burger js-fullscreen-menu-toggle">
						<i class="ri-close-fill"></i>
					</a>

				</div>

			</div>

			<div class="vlt-nav-row vlt-nav-row--full vlt-nav-row--center">

				<div class="container">

					<div class="vlt-nav--fullscreen__navigation">

						<?php get_template_part( 'template-parts/header/partials/partial', 'primary-menu' ); ?>

					</div>

				</div>

			</div>

			<div class="vlt-nav-row">

				<div class="vlt-nav--fullscreen__footer">

					<div class="container">

						<div class="vlt-nav--fullscreen__sidebar">

							<div class="d-flex justify-content-between align-items-end">

								<?php

									if ( is_active_sidebar( 'fullscreen_menu_sidebar' ) ) {
										dynamic_sidebar( 'fullscreen_menu_sidebar' );
									}

								?>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</nav>
	<!-- /.vlt-nav -->

	<?php

		if ( sodalicious_get_theme_mod( 'header_search_icon', $acf_navbar ) == 'show' ) {

			get_template_part( 'template-parts/header/partials/partial', 'popup-search' );

		}

	?>

</div>
<!-- ./d-none d-lg-block -->