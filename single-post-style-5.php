<?php

/**
 * Template Name: Style 5
 * Template Post Type: post
 * @author: SODAThemes
 * @version: 2.0.7
 */

get_header();

while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/single-post/layout/layout', 'style-5' );

endwhile;

get_footer(); ?>