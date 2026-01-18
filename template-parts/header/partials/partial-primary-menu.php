<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

wp_nav_menu( array(
	'theme_location' => 'primary-menu',
	'container' => false,
	'depth' => 3,
	'link_before' => '<span>',
	'link_after' => '</span>',
	'menu_class' => 'sf-menu',
	'fallback_cb' => 'sodalicious_fallback_menu'
) );