<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$header_class = 'vlt-header vlt-header--aside';
$navbar_class = 'vlt-navbar vlt-navbar--main';

?>

<div class="d-none d-lg-block">

	<header class="<?php echo sodalicious_sanitize_class( $header_class ); ?>">

		<div class="<?php echo sodalicious_sanitize_class( $navbar_class ); ?>">

			<div class="vlt-navbar-inner">

				<nav class="vlt-nav vlt-nav--aside" data-submenu-effect="style-2">

					<div class="vlt-nav-table">

						<div class="vlt-nav-row">

							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="vlt-navbar-logo vlt-navbar-logo--small">

								<?php if ( sodalicious_get_theme_mod( 'header_logo_small' ) ) : ?>

									<img src="<?php echo esc_url( sodalicious_get_theme_mod( 'header_logo_small' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="black" loading="lazy">

									<img src="<?php echo esc_url( sodalicious_get_theme_mod( 'header_logo_small_white' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="white" loading="lazy">

								<?php else: ?>

									<h2><?php echo substr( get_bloginfo( 'name' ), 0, 1 ); ?></h2>

								<?php endif; ?>

							</a>
							<!-- .vlt-navbar-logo -->

						</div>

						<div class="vlt-nav-row vlt-nav-row--full vlt-nav-row--center">

							<div class="vlt-nav--aside__navigation">

								<?php get_template_part( 'template-parts/header/partials/partial', 'primary-menu' ); ?>

							</div>

						</div>

						<div class="vlt-nav-row">

							<?php if ( sodalicious_get_theme_mod( 'header_social_list' ) ) : ?>

								<div class="vlt-navbar-socials">

									<?php

										foreach ( sodalicious_get_theme_mod( 'header_social_list' ) as $socialItem ):
											echo '<a class="vlt-social-icon vlt-social-icon--style-2" href="' . esc_url( $socialItem[ 'social_url' ] ) . '" target="_blank"><i class="' . sodalicious_sanitize_class( $socialItem[ 'social_icon' ] ) . '"></i></a>';
										endforeach;

									?>

								</div>

							<?php endif; ?>

						</div>

					</div>

				</nav>
				<!-- /.vlt-nav -->

			</div>

		</div>
		<!-- /.vlt-navbar -->

	</header>
	<!-- /.vlt-header--aside -->

</div>
<!-- ./d-none d-lg-block -->