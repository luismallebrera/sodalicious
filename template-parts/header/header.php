<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$acf_header = sodalicious_get_theme_mod( 'page_custom_navigation', true );
$acf_topbar = sodalicious_get_theme_mod( 'page_custom_topbar', true );

if ( sodalicious_get_theme_mod( 'topbar_show', $acf_topbar ) == 'show' ) {
	get_template_part( 'template-parts/header/partials/partial', 'top-bar' );
}

if ( sodalicious_get_theme_mod( 'navigation_show', $acf_header ) == 'show' ) {
	get_template_part( 'template-parts/header/header', sodalicious_get_theme_mod( 'navigation_type', $acf_header ) );
	get_template_part( 'template-parts/header/header', 'mobile' );
}

?>

<div class="vlt-site-overlay"></div>
<!-- /.vlt-site-overlay -->