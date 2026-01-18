<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

?>

<article <?php post_class( 'vlt-page vlt-page--404' ); ?>>


	<div class="container">

		<div class="row">

			<div class="col-lg-6">

				<div class="vlt-page-error-content">

					<h2 data-aos="custom"><?php echo esc_html( sodalicious_get_theme_mod( 'error_title' ) ); ?></h2>

					<p data-aos="custom" data-aos-delay="100"><?php echo wp_kses( sodalicious_get_theme_mod( 'error_subtitle' ), 'sodalicious_error_subtitle' ); ?></p>

					<div data-aos="custom" data-aos-delay="200">

						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="vlt-simple-link"><?php esc_html_e( 'Back to Home', 'sodalicious' ); ?></a>

					</div>

					<div class="vlt-is-stroke" data-aos="custom" data-aos-delay="300"><?php esc_html_e( '404', 'sodalicious' ); ?></div>

				</div>

			</div>

			<?php if ( sodalicious_get_theme_mod( 'error_image' ) ) : ?>

				<div class="col-lg-5 offset-lg-1 has-stretch-column to-right">

					<div class="h-100 jarallax">

						<img src="<?php echo esc_url( sodalicious_get_theme_mod( 'error_image' ) ); ?>" alt="<?php esc_attr_e( '404', 'sodalicious' ); ?>" class="jarallax-img" loading="lazy">

					</div>

				</div>

			<?php endif; ?>

		</div>

	</div>

</article>
<!-- /.vlt-page -->