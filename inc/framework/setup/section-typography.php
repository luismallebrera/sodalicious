<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$priority = 0;

/**
 * General fonts
 */
VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'primary_font',
	'section' => 'typography_fonts',
	'label' => esc_html__( 'Primary Font', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => apply_filters(
		'sodalicious_fonts_choices', [
			'variant' => [
				'regular',
				'italic',
				'600'
			]
		]
	),
	'default' => array(
		'font-family' => 'IBM Plex Sans'
	),
	'output' => array(
		array(
			'choice' => 'font-family',
			'element' => ':root',
			'property' => '--vlt-primary-font',
			'context' => array( 'editor', 'front' ),
		)
	)
) );

/**
 * Body typography
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'tt_1',
	'section' => 'typography_text',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Text Typography', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'text_typography',
	'section' => 'typography_text',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => apply_filters(
		'sodalicious_fonts_choices', [
			'variant' => [
				'regular',
				'italic',
				'600'
			]
		]
	),
	'default' => array(
		'font-family' => 'IBM Plex Sans',
		'variant' => 'regular',
		'font-size' => '1rem',
		'line-height' => '1.7',
		'color' => '#454545',
		'letter-spacing' => '0',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'body'
		),
		array(
			'element' => '.edit-post-visual-editor.editor-styles-wrapper',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'text_typography_tablet',
	'section' => 'typography_text',
	'label' => '<span class="dashicons dashicons-tablet" style="margin-right: 5px;"></span>' . esc_html__( 'Tablet', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '1rem',
		'line-height' => '1.7',
	),
	'output' => array(
		array(
			'element' => 'body',
			'media_query' => '@media (max-width: 767px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'text_typography_phone',
	'section' => 'typography_text',
	'label' => '<span class="dashicons dashicons-smartphone" style="margin-right: 5px;"></span>' . esc_html__( 'Phone', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '1rem',
		'line-height' => '1.7',
	),
	'output' => array(
		array(
			'element' => 'body',
			'media_query' => '@media (max-width: 575px)'
		)
	)
) );

/**
 * Heading typography
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'th_1',
	'section' => 'typography_headings',
	'default' => '<div class="kirki-separator">' . esc_html__( 'H1 Titles', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h1_titles',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => apply_filters(
		'sodalicious_fonts_choices', [
			'variant' => [
				'regular',
				'italic',
				'600'
			]
		]
	),
	'default' => array(
		'font-family' => 'IBM Plex Sans',
		'variant' => '600',
		'font-size' => '4.375rem',
		'line-height' => '1.25',
		'color' => '#101010',
		'letter-spacing' => '-.01em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h1, .h1'
		),
		array(
			'element' => '.editor-block-list__block h1, .wp-block-heading h1.editor-rich-text__tinymce, .editor-post-title__block .editor-post-title__input',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h1_titles_tablet',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-tablet" style="margin-right: 5px;"></span>' . esc_html__( 'Tablet', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '4.375rem',
		'line-height' => '1.25',
	),
	'output' => array(
		array(
			'element' => 'h1, .h1',
			'media_query' => '@media (max-width: 767px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h1_titles_phone',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-smartphone" style="margin-right: 5px;"></span>' . esc_html__( 'Phone', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '4.375rem',
		'line-height' => '1.25',
	),
	'output' => array(
		array(
			'element' => 'h1, .h1',
			'media_query' => '@media (max-width: 575px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'th_2',
	'section' => 'typography_headings',
	'default' => '<div class="kirki-separator">' . esc_html__( 'H2 Titles', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h2_titles',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => apply_filters(
		'sodalicious_fonts_choices', [
			'variant' => [
				'regular',
				'italic',
				'600'
			]
		]
	),
	'default' => array(
		'font-family' => 'IBM Plex Sans',
		'variant' => '600',
		'font-size' => '2.875rem',
		'line-height' => '1.4',
		'color' => '#101010',
		'letter-spacing' => '-.01em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h2, .h2'
		),
		array(
			'element' => '.editor-block-list__block h2, .wp-block-heading h2.editor-rich-text__tinymce',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h2_titles_tablet',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-tablet" style="margin-right: 5px;"></span>' . esc_html__( 'Tablet', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '2.875rem',
		'line-height' => '1.4',
	),
	'output' => array(
		array(
			'element' => 'h2, .h2',
			'media_query' => '@media (max-width: 767px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h2_titles_phone',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-smartphone" style="margin-right: 5px;"></span>' . esc_html__( 'Phone', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '2.875rem',
		'line-height' => '1.4',
	),
	'output' => array(
		array(
			'element' => 'h2, .h2',
			'media_query' => '@media (max-width: 575px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'th_3',
	'section' => 'typography_headings',
	'default' => '<div class="kirki-separator">' . esc_html__( 'H3 Titles', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h3_titles',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => apply_filters(
		'sodalicious_fonts_choices', [
			'variant' => [
				'regular',
				'italic',
				'600'
			]
		]
	),
	'default' => array(
		'font-family' => 'IBM Plex Sans',
		'variant' => '600',
		'font-size' => '2rem',
		'line-height' => '1.5',
		'color' => '#101010',
		'letter-spacing' => '-.01em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h3, .h3'
		),
		array(
			'element' => '.editor-block-list__block h3, .wp-block-heading h3.editor-rich-text__tinymce',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h3_titles_tablet',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-tablet" style="margin-right: 5px;"></span>' . esc_html__( 'Tablet', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '2rem',
		'line-height' => '1.5',
	),
	'output' => array(
		array(
			'element' => 'h3, .h3',
			'media_query' => '@media (max-width: 767px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h3_titles_phone',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-smartphone" style="margin-right: 5px;"></span>' . esc_html__( 'Phone', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '2rem',
		'line-height' => '1.5',
	),
	'output' => array(
		array(
			'element' => 'h3, .h3',
			'media_query' => '@media (max-width: 575px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'th_4',
	'section' => 'typography_headings',
	'default' => '<div class="kirki-separator">' . esc_html__( 'H4 Titles', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h4_titles',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => apply_filters(
		'sodalicious_fonts_choices', [
			'variant' => [
				'regular',
				'italic',
				'600'
			]
		]
	),
	'default' => array(
		'font-family' => 'IBM Plex Sans',
		'variant' => '600',
		'font-size' => '1.625rem',
		'line-height' => '1.5',
		'color' => '#101010',
		'letter-spacing' => '-.01em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h4, .h4'
		),
		array(
			'element' => '.editor-block-list__block h4, .wp-block-heading h4.editor-rich-text__tinymce',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h4_titles_tablet',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-tablet" style="margin-right: 5px;"></span>' . esc_html__( 'Tablet', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '1.625rem',
		'line-height' => '1.5',
	),
	'output' => array(
		array(
			'element' => 'h4, .h4',
			'media_query' => '@media (max-width: 767px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h4_titles_phone',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-smartphone" style="margin-right: 5px;"></span>' . esc_html__( 'Phone', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '1.625rem',
		'line-height' => '1.5',
	),
	'output' => array(
		array(
			'element' => 'h4, .h4',
			'media_query' => '@media (max-width: 575px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'th_5',
	'section' => 'typography_headings',
	'default' => '<div class="kirki-separator">' . esc_html__( 'H5 Titles', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h5_titles',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => apply_filters(
		'sodalicious_fonts_choices', [
			'variant' => [
				'regular',
				'italic',
				'600'
			]
		]
	),
	'default' => array(
		'font-family' => 'IBM Plex Sans',
		'variant' => '600',
		'font-size' => '1.375rem',
		'line-height' => '1.5',
		'color' => '#101010',
		'letter-spacing' => '-.01em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h5, .h5'
		),
		array(
			'element' => '.editor-block-list__block h5, .wp-block-heading h5.editor-rich-text__tinymce',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h5_titles_tablet',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-tablet" style="margin-right: 5px;"></span>' . esc_html__( 'Tablet', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '1.375rem',
		'line-height' => '1.5',
	),
	'output' => array(
		array(
			'element' => 'h5, .h5',
			'media_query' => '@media (max-width: 767px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h5_titles_phone',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-smartphone" style="margin-right: 5px;"></span>' . esc_html__( 'Phone', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '1.375rem',
		'line-height' => '1.5',
	),
	'output' => array(
		array(
			'element' => 'h5, .h5',
			'media_query' => '@media (max-width: 575px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'th_6',
	'section' => 'typography_headings',
	'default' => '<div class="kirki-separator">' . esc_html__( 'H6 Titles', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h6_titles',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => apply_filters(
		'sodalicious_fonts_choices', [
			'variant' => [
				'regular',
				'italic',
				'600'
			]
		]
	),
	'default' => array(
		'font-family' => 'IBM Plex Sans',
		'variant' => '600',
		'font-size' => '1.125rem',
		'line-height' => '1.5',
		'color' => '#101010',
		'letter-spacing' => '-.01em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h6, .h6'
		),
		array(
			'element' => '.editor-block-list__block h6, .wp-block-heading h6.editor-rich-text__tinymce',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h6_titles_tablet',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-tablet" style="margin-right: 5px;"></span>' . esc_html__( 'Tablet', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '1.125rem',
		'line-height' => '1.5',
	),
	'output' => array(
		array(
			'element' => 'h6, .h6',
			'media_query' => '@media (max-width: 767px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h6_titles_phone',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-smartphone" style="margin-right: 5px;"></span>' . esc_html__( 'Phone', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '1.125rem',
		'line-height' => '1.5',
	),
	'output' => array(
		array(
			'element' => 'h6, .h6',
			'media_query' => '@media (max-width: 575px)'
		)
	)
) );

/**
 * Blockquote typography
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'tb_1',
	'section' => 'typography_blockquote',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Blockquote', 'sodalicious' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'blockquote_typography',
	'section' => 'typography_blockquote',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => apply_filters(
		'sodalicious_fonts_choices', [
			'variant' => [
				'regular',
				'italic',
				'600'
			]
		]
	),
	'default' => array(
		'font-family' => 'IBM Plex Sans',
		'variant' => 'italic',
		'font-size' => '1.125rem',
		'line-height' => '1.7',
		'letter-spacing' => '0',
		'color' => '#101010',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'blockquote'
		),
		array(
			'element' => '.wp-block-quote, .wp-block-pullquote',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'blockquote_typography_tablet',
	'section' => 'typography_blockquote',
	'label' => '<span class="dashicons dashicons-tablet" style="margin-right: 5px;"></span>' . esc_html__( 'Tablet', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '1.125rem',
		'line-height' => '1.7',
	),
	'output' => array(
		array(
			'element' => 'blockquote',
			'media_query' => '@media (max-width: 767px)'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'blockquote_typography_phone',
	'section' => 'typography_blockquote',
	'label' => '<span class="dashicons dashicons-smartphone" style="margin-right: 5px;"></span>' . esc_html__( 'Phone', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'font-size' => '1.125rem',
		'line-height' => '1.7',
	),
	'output' => array(
		array(
			'element' => 'blockquote',
			'media_query' => '@media (max-width: 575px)'
		)
	)
) );

/**
 * Button typography
 */
VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_button',
	'section' => 'typography_buttons',
	'label' => esc_html__( 'Button Typography', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => apply_filters(
		'sodalicious_fonts_choices', [
			'variant' => [
				'regular',
				'italic',
				'600'
			]
		]
	),
	'default' => array(
		'font-family' => 'IBM Plex Sans',
		'variant' => 'regular',
		'font-size' => '1rem',
		'line-height' => '1.1',
		'letter-spacing' => '0',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => '.vlt-btn'
		)
	)
) );

/**
 * Input typography
 */
VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_input',
	'section' => 'typography_input',
	'label' => esc_html__( 'Input Typography', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => apply_filters(
		'sodalicious_fonts_choices', [
			'variant' => [
				'regular',
				'italic',
				'600'
			]
		]
	),
	'default' => array(
		'font-family' => 'IBM Plex Sans',
		'variant' => 'regular',
		'font-size' => '1rem',
		'letter-spacing' => '0',
		'color' => '#101010',
		'line-height' => '1.5',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => '
				input[type="text"],
				input[type="date"],
				input[type="email"],
				input[type="password"],
				input[type="tel"],
				input[type="url"],
				input[type="search"],
				input[type="number"],
				textarea,
				select
			'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_label',
	'section' => 'typography_input',
	'label' => esc_html__( 'Label Typography', 'sodalicious' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => apply_filters(
		'sodalicious_fonts_choices', [
			'variant' => [
				'regular',
				'italic',
				'600'
			]
		]
	),
	'default' => array(
		'font-family' => 'IBM Plex Sans',
		'variant' => 'regular',
		'font-size' => '1rem',
		'line-height' => '1.5',
		'letter-spacing' => '0',
		'color' => '#101010',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'label'
		)
	)
) );