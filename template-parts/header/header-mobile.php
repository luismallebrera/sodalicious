<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$acf_navbar = sodalicious_get_theme_mod( 'page_custom_navigation', true );

$header_class = 'vlt-header vlt-header--mobile';

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

<div class="d-lg-none d-sm-block">

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

					<a href="#" class="vlt-menu-burger js-mobile-menu-toggle"><i class="ri-menu-fill"></i></a>

				</div>

			</div>
			<!-- /.vlt-navbar-inner -->

			<nav class="vlt-nav vlt-nav--mobile" data-submenu-effect="style-2">

				<div class="vlt-nav--mobile__navigation">

					<?php get_template_part( 'template-parts/header/partials/partial', 'primary-menu' ); ?>

				</div>

				<?php

					if ( is_active_sidebar( 'mobile_menu_sidebar' ) ) {

						echo '<div class="vlt-nav--mobile__footer">';

						dynamic_sidebar( 'mobile_menu_sidebar' );

						echo '</div>';

					}

				?>

			</nav>
			<!-- /.vlt-nav -->

		</div>
		<!-- /.vlt-navbar -->

	</header>
	<!-- /.vlt-header--fullscreen -->

</div>
<!-- ./d-none d-lg-block -->