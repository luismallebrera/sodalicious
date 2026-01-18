<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$footer_class = 'vlt-footer vlt-footer--template';
$acf_footer = sodalicious_get_theme_mod( 'page_custom_footer', true );

if ( sodalicious_get_theme_mod( 'footer_fixed', $acf_footer ) == 'enable' ) {
	$footer_class .= ' vlt-footer--fixed';
}

$footer_template = sodalicious_get_theme_mod( 'footer_template', $acf_footer );

?>

<footer class="<?php echo sodalicious_sanitize_class( $footer_class ); ?>">

	<?php echo sodalicious_render_elementor_template( $footer_template ); ?>

</footer>
<!-- /.vlt-footer -->