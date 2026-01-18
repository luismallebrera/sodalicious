<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$priority = 0;

/**
 * Blog general
 */
VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'sticky_sidebar',
	'section' => 'section_blog_general',
	'label' => esc_html__( 'Sticky Sidebar', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', 'sodalicious' ),
		'disable' => esc_html__( 'Disable', 'sodalicious' )
	),
	'default' => 'disable',
) );

/**
 * Blog page
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sb_1',
	'section' => 'section_blog',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'blog_type_pagination',
	'section' => 'section_blog',
	'label' => esc_html__( 'Type Pagination', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'none' => esc_html__( 'None', 'sodalicious' ),
		'paged' => esc_html__( 'Paged', 'sodalicious' ),
		'numeric' => esc_html__( 'Numeric', 'sodalicious' )
	),
	'default' => 'numeric',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sb_2',
	'section' => 'section_blog',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Page Title', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'blog_title',
	'section' => 'section_blog',
	'label' => esc_html__( 'Blog Title', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => esc_html__( 'Blog', 'sodalicious' ),
) );

/**
 * Archive page
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sa_1',
	'section' => 'section_archive',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'archive_type_pagination',
	'section' => 'section_archive',
	'label' => esc_html__( 'Type Pagination', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'none' => esc_html__( 'None', 'sodalicious' ),
		'paged' => esc_html__( 'Paged', 'sodalicious' ),
		'numeric' => esc_html__( 'Numeric', 'sodalicious' )
	),
	'default' => 'numeric',
) );

/**
 * Search page
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'ss_1',
	'section' => 'section_search',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'search_type_pagination',
	'section' => 'section_search',
	'label' => esc_html__( 'Type Pagination', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'none' => esc_html__( 'None', 'sodalicious' ),
		'paged' => esc_html__( 'Paged', 'sodalicious' ),
		'numeric' => esc_html__( 'Numeric', 'sodalicious' )
	),
	'default' => 'numeric',
) );

/**
 * Single post
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'ssp_1',
	'section' => 'section_single_post',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'single_post_default_style',
	'section' => 'section_single_post',
	'label' => esc_html__( 'Default Style', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'none' => esc_html__( 'None', 'sodalicious' ),
		'default' => esc_html__( 'Style 1', 'sodalicious' ),
		'style-2' => esc_html__( 'Style 2', 'sodalicious' ),
		'style-3' => esc_html__( 'Style 3', 'sodalicious' ),
		'style-4' => esc_html__( 'Style 4', 'sodalicious' ),
		'style-5' => esc_html__( 'Style 5', 'sodalicious' ),
		'style-6' => esc_html__( 'Style 6', 'sodalicious' ),
		'style-7' => esc_html__( 'Style 7', 'sodalicious' )
	),
	'default' => 'none',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'about_author',
	'section' => 'section_single_post',
	'label' => esc_html__( 'About Author', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'sodalicious' ),
		'hide' => esc_html__( 'Hide', 'sodalicious' )
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'post_views',
	'section' => 'section_single_post',
	'label' => esc_html__( 'Post Views', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'sodalicious' ),
		'hide' => esc_html__( 'Hide', 'sodalicious' )
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'show_share_post',
	'section' => 'section_single_post',
	'label' => esc_html__( 'Post Share', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'sodalicious' ),
		'hide' => esc_html__( 'Hide', 'sodalicious' )
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'also_like_posts',
	'section' => 'section_single_post',
	'label' => esc_html__( 'Also Like Posts', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'sodalicious' ),
		'hide' => esc_html__( 'Hide', 'sodalicious' )
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'ssp_2',
	'section' => 'section_single_post',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Navigation', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'post_navigation',
	'section' => 'section_single_post',
	'label' => esc_html__( 'Post Navigation', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', 'sodalicious' ),
		'hide' => esc_html__( 'Hide', 'sodalicious' )
	),
	'default' => 'show',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'post_navigation_style',
	'section' => 'section_single_post',
	'label' => esc_html__( 'Navigation Style', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'style-1' => esc_html__( 'Style 1', 'sodalicious' ),
		'style-2' => esc_html__( 'Style 2', 'sodalicious' )
	),
	'default' => 'style-1',
	'active_callback' => array(
		array(
			'setting' => 'post_navigation',
			'operator' => '==',
			'value' => 'show'
		)
	),
) );

if ( class_exists( 'Kirki_Helper' ) ) {
	VLT_Options::add_field( array(
		'type' => 'select',
		'settings' => 'blog_link',
		'section' => 'section_single_post',
		'label' => esc_html__( 'Blog Link', 'sodalicious' ),
		'tooltip' => esc_html__( 'For back button.', 'sodalicious' ),
		'priority' => $priority++,
		'transport' => 'auto',
		'multiple' => 1,
		'choices' => Kirki_Helper::get_posts(
			array(
				'posts_per_page' => 9999,
				'post_type' => 'page'
			)
		),
		'default' => '',
		'active_callback' => array(
			array(
				'setting' => 'post_navigation',
				'operator' => '==',
				'value' => 'show'
			)
		),
	) );
}

/**
 * Page 404
 */
VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'error_title',
	'section' => 'section_404',
	'label' => esc_html__( 'Error Title', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => 'Page not found!',
) );

VLT_Options::add_field( array(
	'type' => 'textarea',
	'settings' => 'error_subtitle',
	'section' => 'section_404',
	'label' => esc_html__( 'Error Subtitle', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => 'Oops! The page you are looking for does not exist. <br>It might have been moved or deleted.',
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'error_image',
	'section' => 'section_404',
	'label' => esc_html__( 'Image', 'sodalicious' ),
	'priority' => $priority++
) );