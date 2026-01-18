<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$single_post_default_style = sodalicious_get_theme_mod( 'single_post_default_style' );

if ( $single_post_default_style !== 'none' && $single_post_default_style !== 'default' ) {
	get_template_part( 'single-post', $single_post_default_style );
	return;
}

get_header();

while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/single-post/layout/layout', 'style-1' );

endwhile;

get_footer(); ?>