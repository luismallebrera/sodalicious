<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$header_class = 'vlt-header vlt-header--slide';
$navbar_class = 'vlt-navbar vlt-navbar--main';

?>

<div class="d-none d-lg-block">

	<header class="<?php echo sodalicious_sanitize_class( $header_class ); ?>">

		<div class="<?php echo sodalicious_sanitize_class( $navbar_class ); ?>">

			<div class="vlt-navbar-inner">

				<div class="vlt-navbar-inner--top">

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
				<!-- /.vlt-navbar-inner--top -->

				<div class="vlt-navbar-inner--center">

					<?php if ( get_bloginfo( 'description' ) && sodalicious_get_theme_mod( 'header_tagline' ) == 'show' ) : ?>

						<em class="vlt-navbar-tagline"><?php echo get_bloginfo( 'description' ); ?></em>
						<!-- /.vlt-navbar-tagline -->

					<?php endif; ?>


				</div>
				<!-- /.vlt-navbar-inner--center -->

				<div class="vlt-navbar-inner--bottom">

					<div class="vlt-navbar-buttons">

						<a href="#" class="vlt-menu-burger js-slide-menu-toggle">
							<i class="ri-menu-fill"></i>
						</a>

					</div>

				</div>
				<!-- /.vlt-navbar-inner--bottom -->

			</div>

		</div>
		<!-- /.vlt-navbar -->

	</header>
	<!-- /.vlt-header--slide -->

	<nav class="vlt-nav vlt-nav--slide" data-submenu-effect="style-1">

		<div class="vlt-nav-table">

			<div class="vlt-nav-row vlt-nav-row--full vlt-nav-row--center">

				<div class="vlt-nav--slide__navigation">

					<?php get_template_part( 'template-parts/header/partials/partial', 'primary-menu' ); ?>

				</div>

			</div>

			<div class="vlt-nav-row">

				<?php if ( sodalicious_get_theme_mod( 'header_social_list' ) ) : ?>

					<div class="vlt-navbar-socials text-center">

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

</div>
<!-- ./d-none d-lg-block -->