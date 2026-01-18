<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

get_header();

?>

<main class="vlt-main">

	<div class="vlt-page-content">

		<?php

			// Elementor `single` location
			if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {
				get_template_part( 'template-parts/content/content', 'page-404' );
			}

		?>

	</div>

</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>