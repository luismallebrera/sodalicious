<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$topbar_class = 'vlt-top-bar vlt-top-bar--template';
$acf_topbar = sodalicious_get_theme_mod( 'page_custom_topbar', true );

$topbar_template = sodalicious_get_theme_mod( 'topbar_template', $acf_topbar );

?>

<div class="<?php echo sodalicious_sanitize_class( $topbar_class ); ?>">

	<?php echo sodalicious_render_elementor_template( $topbar_template ); ?>

</div>
<!-- /.vlt-top-bar -->