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

			while ( have_posts() ) : the_post();

				if ( post_password_required( get_the_ID() ) ) {

					get_template_part( 'template-parts/content/content', 'protected' );

				} else {

					get_template_part( 'template-parts/content/content', 'custom-page' );

				}

			endwhile;

			$acf_work_navigation = sodalicious_get_theme_mod( 'work_custom_navigation', true );

			if ( sodalicious_get_theme_mod( 'work_navigation' ) == 'show' ) {
				echo sodalicious_get_post_navigation( sodalicious_get_theme_mod( 'work_navigation_style', $acf_work_navigation ), 'portfolio' );
			}

		?>

	</div>
	<!-- /.vlt-page-content -->

</main>
<!-- /.vlt-main -->

<?php get_footer(); ?>