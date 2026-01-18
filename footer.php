<?php

	// Elementor `footer` location
	if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) {
		get_template_part( 'template-parts/footer/footer' );
	}

	$acf_back_to_top = sodalicious_get_theme_mod( 'page_custom_back_to_top', true );

	if ( sodalicious_get_theme_mod( 'back_to_top', $acf_back_to_top ) == 'show' ) {
		echo '<a href="#" class="vlt-site-back-to-top">';
		echo esc_html__( 'Top', 'sodalicious' );
		echo '</a>';
	}

?>

<?php wp_footer(); ?>

</body>
</html>