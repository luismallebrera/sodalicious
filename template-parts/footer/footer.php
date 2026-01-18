<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$acf_footer = sodalicious_get_theme_mod( 'page_custom_footer', true );

if ( sodalicious_get_theme_mod( 'footer_show', $acf_footer ) == 'show' ) {
	get_template_part( 'template-parts/footer/footer', 'template' );
}