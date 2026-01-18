<?php

/**
 * @author:  SODAThemes
 * @version: 2.0.7
 * Adapted for Elementor Containers
 */

/**
 * Promote pre-defined Elementor Widgets
 */
if ( ! class_exists( 'ElementorPro\Plugin' ) ) {
	add_action( 'elementor/editor/after_enqueue_styles', function() {
		echo '<style type="text/css">
			.elementor-control-dynamic-switcher,
			#elementor-notice-bar,
			#elementor-panel-get-pro-elements,
			. elementor-component-tab[data-tab="global"] {
				display: none ! important;
			}
		</style>';
	} );

	add_filter( 'elementor/editor/localize_settings', function( $settings ) {
		if ( ! empty( $settings[ 'promotionWidgets' ] ) ) {
			$settings[ 'promotionWidgets' ] = [];
		}
		return $settings;
	}, 20 );
}

/**
 * Add Navbar Offset to Sections and Containers
 */
add_action( 'elementor/element/section/section_typo/after_section_end', function( $section, $args ) {

	$section->start_controls_section(
		'section_navbar_offset', [
			'label' => esc_html__( 'Navbar Offset', 'sodalicious' ),
			'tab' => \Elementor\Controls_Manager:: TAB_STYLE,
		]
	);

	$section->add_control(
		'navbar_offset', [
			'label' => esc_html__( 'Navbar Offset', 'sodalicious' ),
			'type' => Elementor\Controls_Manager:: SWITCHER,
			'return_value' => 'has-navbar-offset',
			'prefix_class' => ''
		]
	);

	$section->end_controls_section();

}, 10, 2 );

// Add Navbar Offset to Containers
add_action( 'elementor/element/container/section_layout/after_section_end', function( $container, $args ) {

	$container->start_controls_section(
		'section_navbar_offset', [
			'label' => esc_html__( 'Navbar Offset', 'sodalicious' ),
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]
	);

	$container->add_control(
		'navbar_offset', [
			'label' => esc_html__( 'Navbar Offset', 'sodalicious' ),
			'type' => Elementor\Controls_Manager:: SWITCHER,
			'return_value' => 'has-navbar-offset',
			'prefix_class' => ''
		]
	);

	$container->end_controls_section();

}, 10, 2 );


/**
 * Add Jarallax Options to Columns and Containers
 */
add_action( 'elementor/element/column/section_style/after_section_end', function( $section, $args ) {

	$section->start_controls_section(
		'section_jarallax', [
			'label' => esc_html__( 'Jarallax', 'sodalicious' ),
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]
	);

	$section->add_control(
		'jarallax', [
			'label' => esc_html__( 'Jarallax', 'sodalicious' ),
			'type' => Elementor\Controls_Manager:: SWITCHER,
			'return_value' => 'jarallax',
			'prefix_class' => ''
		]
	);

	$section->add_control(
		'jarallax_speed', [
			'label' => esc_html__( 'Speed', 'sodalicious' ),
			'type' => Elementor\Controls_Manager:: SLIDER,
			'size_units' => [ 'px' ],
			'range' => [
				'px' => [
					'min' => -1,
					'max' => 2,
					'step' => 0.1
				],
			],
			'condition' => [
				'jarallax' => 'jarallax'
			]
		]
	);

	$section->add_control(
		'jarallax_image_size', [
			'label' => esc_html__( 'Image Size', 'sodalicious' ),
			'type' => \Elementor\Controls_Manager:: SELECT,
			'options' => [
				'' => esc_html__( 'Default', 'sodalicious' ),
				'auto' => esc_html__( 'Auto', 'sodalicious' ),
				'cover' => esc_html__( 'Cover', 'sodalicious' ),
				'contain' => esc_html__( 'Contain', 'sodalicious' ),
			],
			'default' => '',
			'condition' => [
				'jarallax' => 'jarallax'
			]
		]
	);

	$section->add_control(
		'jarallax_image_position', [
			'label' => esc_html__( 'Image Position', 'sodalicious' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'options' => [
				'' => esc_html__( 'Default', 'sodalicious' ),
				'unset' => esc_html__( 'Unset', 'sodalicious' ),
				'center center' => esc_html__( 'Center Center', 'sodalicious' ),
				'center left' => esc_html__( 'Center Left', 'sodalicious' ),
				'center right' => esc_html__( 'Center Right', 'sodalicious' ),
				'top center' => esc_html__( 'Top Center', 'sodalicious' ),
				'top left' => esc_html__( 'Top Left', 'sodalicious' ),
				'top right' => esc_html__( 'Top Right', 'sodalicious' ),
				'bottom center' => esc_html__( 'Bottom Center', 'sodalicious' ),
				'bottom left' => esc_html__( 'Bottom Left', 'sodalicious' ),
				'bottom right' => esc_html__( 'Bottom Right', 'sodalicious' ),
				'custom' => esc_html__( 'Custom', 'sodalicious' ),
			],
			'default' => '',
			'condition' => [
				'jarallax' => 'jarallax'
			]
		]
	);

	$section->add_control(
		'jarallax_image_position_custom', [
			'label' => esc_html__( 'Image Position', 'sodalicious' ),
			'type' => Elementor\Controls_Manager::TEXT,
			'condition' => [
				'jarallax_image_position' => 'custom'
			]
		]
	);

	$section->add_control(
		'jarallax_video_link', [
			'label' => esc_html__( 'Video Link', 'sodalicious' ),
			'description' => esc_html__( 'Don\'t forget "mp4:" prefix for link if you use self-hosted video. ', 'sodalicious' ),
			'type' => Elementor\Controls_Manager::TEXT,
			'condition' => [
				'jarallax' => 'jarallax'
			]
		]
	);

	$section->end_controls_section();

}, 10, 2 );

// Add Jarallax to Containers
add_action( 'elementor/element/container/section_layout/after_section_end', function( $container, $args ) {

	$container->start_controls_section(
		'section_jarallax', [
			'label' => esc_html__( 'Jarallax', 'sodalicious' ),
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]
	);

	$container->add_control(
		'jarallax', [
			'label' => esc_html__( 'Jarallax', 'sodalicious' ),
			'type' => Elementor\Controls_Manager::SWITCHER,
			'return_value' => 'jarallax',
			'prefix_class' => ''
		]
	);

	$container->add_control(
		'jarallax_speed', [
			'label' => esc_html__( 'Speed', 'sodalicious' ),
			'type' => Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px' ],
			'range' => [
				'px' => [
					'min' => -1,
					'max' => 2,
					'step' => 0.1
				],
			],
			'condition' => [
				'jarallax' => 'jarallax'
			]
		]
	);

	$container->add_control(
		'jarallax_image_size', [
			'label' => esc_html__( 'Image Size', 'sodalicious' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'options' => [
				'' => esc_html__( 'Default', 'sodalicious' ),
				'auto' => esc_html__( 'Auto', 'sodalicious' ),
				'cover' => esc_html__( 'Cover', 'sodalicious' ),
				'contain' => esc_html__( 'Contain', 'sodalicious' ),
			],
			'default' => '',
			'condition' => [
				'jarallax' => 'jarallax'
			]
		]
	);

	$container->add_control(
		'jarallax_image_position', [
			'label' => esc_html__( 'Image Position', 'sodalicious' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'options' => [
				'' => esc_html__( 'Default', 'sodalicious' ),
				'unset' => esc_html__( 'Unset', 'sodalicious' ),
				'center center' => esc_html__( 'Center Center', 'sodalicious' ),
				'center left' => esc_html__( 'Center Left', 'sodalicious' ),
				'center right' => esc_html__( 'Center Right', 'sodalicious' ),
				'top center' => esc_html__( 'Top Center', 'sodalicious' ),
				'top left' => esc_html__( 'Top Left', 'sodalicious' ),
				'top right' => esc_html__( 'Top Right', 'sodalicious' ),
				'bottom center' => esc_html__( 'Bottom Center', 'sodalicious' ),
				'bottom left' => esc_html__( 'Bottom Left', 'sodalicious' ),
				'bottom right' => esc_html__( 'Bottom Right', 'sodalicious' ),
				'custom' => esc_html__( 'Custom', 'sodalicious' ),
			],
			'default' => '',
			'condition' => [
				'jarallax' => 'jarallax'
			]
		]
	);

	$container->add_control(
		'jarallax_image_position_custom', [
			'label' => esc_html__( 'Image Position', 'sodalicious' ),
			'type' => Elementor\Controls_Manager::TEXT,
			'condition' => [
				'jarallax_image_position' => 'custom'
			]
		]
	);

	$container->add_control(
		'jarallax_video_link', [
			'label' => esc_html__( 'Video Link', 'sodalicious' ),
			'description' => esc_html__( 'Don\'t forget "mp4:" prefix for link if you use self-hosted video.', 'sodalicious' ),
			'type' => Elementor\Controls_Manager::TEXT,
			'condition' => [
				'jarallax' => 'jarallax'
			]
		]
	);

	$container->end_controls_section();

}, 10, 2 );

if ( ! function_exists( 'sodalicious_render_jarallax' ) ) {
	function sodalicious_render_jarallax( $widget ) {
		$settings = $widget->get_settings_for_display();
		if ( isset( $settings[ 'jarallax' ] ) && $settings[ 'jarallax' ] == 'jarallax' ) {
			$widget->add_render_attribute( '_wrapper', 'data-jarallax-video', $settings[ 'jarallax_video_link' ] );
		}

		if ( isset( $settings[ 'jarallax_speed' ] ) && ! empty( $settings[ 'jarallax_speed' ] ) ) {
			$widget->add_render_attribute( '_wrapper', 'data-speed', $settings[ 'jarallax_speed' ][ 'size' ] );
		}

		if ( isset( $settings[ 'jarallax_image_size' ] ) && ! empty( $settings[ 'jarallax_image_size' ] ) ) {
			$widget->add_render_attribute( '_wrapper', 'data-img-size', $settings[ 'jarallax_image_size' ] );
		}

		if ( isset( $settings[ 'jarallax_image_position' ] ) ) {
			if ( $settings[ 'jarallax_image_position' ] == 'custom' ) {
				$widget->add_render_attribute( '_wrapper', 'data-img-position', $settings[ 'jarallax_image_position_custom' ] );
			} else {
				$widget->add_render_attribute( '_wrapper', 'data-img-position', $settings[ 'jarallax_image_position' ] );
			}
		}

	}
}
add_action( 'elementor/frontend/section/before_render', 'sodalicious_render_jarallax', 10 );
add_action( 'elementor/frontend/column/before_render', 'sodalicious_render_jarallax', 10 );
add_action( 'elementor/frontend/container/before_render', 'sodalicious_render_jarallax', 10 );


add_action( 'elementor/element/after_section_end', function( $element, $section_id, $args ) {

	// For Sections
	if ( 'section' === $element->get_name() && 'section_background' === $section_id ) {

		$element->start_controls_section(
			'section_jarallax', [
				'label' => esc_html__( 'Jarallax', 'sodalicious' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$element->add_control(
			'jarallax', [
				'label' => esc_html__( 'Jarallax', 'sodalicious' ),
				'type' => Elementor\Controls_Manager:: SWITCHER,
				'return_value' => 'jarallax',
				'prefix_class' => ''
			]
		);

		$element->add_control(
			'jarallax_speed', [
				'label' => esc_html__( 'Speed', 'sodalicious' ),
				'type' => Elementor\Controls_Manager:: SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -1,
						'max' => 2,
						'step' => 0.1
					],
				],
				'condition' => [
					'jarallax' => 'jarallax'
				]
			]
		);

		$element->add_control(
			'jarallax_image_size', [
				'label' => esc_html__( 'Image Size', 'sodalicious' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Default', 'sodalicious' ),
					'auto' => esc_html__( 'Auto', 'sodalicious' ),
					'cover' => esc_html__( 'Cover', 'sodalicious' ),
					'contain' => esc_html__( 'Contain', 'sodalicious' ),
				],
				'default' => '',
				'condition' => [
					'jarallax' => 'jarallax'
				]
			]
		);

		$element->add_control(
			'jarallax_image_position', [
				'label' => esc_html__( 'Image Position', 'sodalicious' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Default', 'sodalicious' ),
					'unset' => esc_html__( 'Unset', 'sodalicious' ),
					'center center' => esc_html__( 'Center Center', 'sodalicious' ),
					'center left' => esc_html__( 'Center Left', 'sodalicious' ),
					'center right' => esc_html__( 'Center Right', 'sodalicious' ),
					'top center' => esc_html__( 'Top Center', 'sodalicious' ),
					'top left' => esc_html__( 'Top Left', 'sodalicious' ),
					'top right' => esc_html__( 'Top Right', 'sodalicious' ),
					'bottom center' => esc_html__( 'Bottom Center', 'sodalicious' ),
					'bottom left' => esc_html__( 'Bottom Left', 'sodalicious' ),
					'bottom right' => esc_html__( 'Bottom Right', 'sodalicious' ),
					'custom' => esc_html__( 'Custom', 'sodalicious' ),
				],
				'default' => '',
				'condition' => [
					'jarallax' => 'jarallax'
				]
			]
		);

		$element->add_control(
			'jarallax_image_position_custom', [
				'label' => esc_html__( 'Image Position', 'sodalicious' ),
				'type' => Elementor\Controls_Manager::TEXT,
				'condition' => [
					'jarallax_image_position' => 'custom'
				]
			]
		);

		$element->add_control(
			'jarallax_video_link', [
				'label' => esc_html__( 'Video Link', 'sodalicious' ),
				'description' => esc_html__( 'Don\'t forget "mp4:" prefix for link if you use self-hosted video.', 'sodalicious' ),
				'type' => Elementor\Controls_Manager::TEXT,
				'condition' => [
					'jarallax' => 'jarallax'
				]
			]
		);

		$element->end_controls_section();

	}

	// For Containers - after background section
	if ( 'container' === $element->get_name() && 'section_background' === $section_id ) {

		$element->start_controls_section(
			'section_jarallax_bg', [
				'label' => esc_html__( 'Jarallax', 'sodalicious' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$element->add_control(
			'jarallax', [
				'label' => esc_html__( 'Jarallax', 'sodalicious' ),
				'type' => Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'jarallax',
				'prefix_class' => ''
			]
		);

		$element->add_control(
			'jarallax_speed', [
				'label' => esc_html__( 'Speed', 'sodalicious' ),
				'type' => Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -1,
						'max' => 2,
						'step' => 0.1
					],
				],
				'condition' => [
					'jarallax' => 'jarallax'
				]
			]
		);

		$element->add_control(
			'jarallax_image_size', [
				'label' => esc_html__( 'Image Size', 'sodalicious' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Default', 'sodalicious' ),
					'auto' => esc_html__( 'Auto', 'sodalicious' ),
					'cover' => esc_html__( 'Cover', 'sodalicious' ),
					'contain' => esc_html__( 'Contain', 'sodalicious' ),
				],
				'default' => '',
				'condition' => [
					'jarallax' => 'jarallax'
				]
			]
		);

		$element->add_control(
			'jarallax_image_position', [
				'label' => esc_html__( 'Image Position', 'sodalicious' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Default', 'sodalicious' ),
					'unset' => esc_html__( 'Unset', 'sodalicious' ),
					'center center' => esc_html__( 'Center Center', 'sodalicious' ),
					'center left' => esc_html__( 'Center Left', 'sodalicious' ),
					'center right' => esc_html__( 'Center Right', 'sodalicious' ),
					'top center' => esc_html__( 'Top Center', 'sodalicious' ),
					'top left' => esc_html__( 'Top Left', 'sodalicious' ),
					'top right' => esc_html__( 'Top Right', 'sodalicious' ),
					'bottom center' => esc_html__( 'Bottom Center', 'sodalicious' ),
					'bottom left' => esc_html__( 'Bottom Left', 'sodalicious' ),
					'bottom right' => esc_html__( 'Bottom Right', 'sodalicious' ),
					'custom' => esc_html__( 'Custom', 'sodalicious' ),
				],
				'default' => '',
				'condition' => [
					'jarallax' => 'jarallax'
				]
			]
		);

		$element->add_control(
			'jarallax_image_position_custom', [
				'label' => esc_html__( 'Image Position', 'sodalicious' ),
				'type' => Elementor\Controls_Manager::TEXT,
				'condition' => [
					'jarallax_image_position' => 'custom'
				]
			]
		);

		$element->add_control(
			'jarallax_video_link', [
				'label' => esc_html__( 'Video Link', 'sodalicious' ),
				'description' => esc_html__( 'Don\'t forget "mp4:" prefix for link if you use self-hosted video.', 'sodalicious' ),
				'type' => Elementor\Controls_Manager::TEXT,
				'condition' => [
					'jarallax' => 'jarallax'
				]
			]
		);

		$element->end_controls_section();

	}

	// For Sections - Advanced settings
	if ( 'section' === $element->get_name() && 'section_advanced' === $section_id ) {

		$element->start_controls_section(
			'section_sodalicious', [
				'label' => esc_html__( 'Sodalicious', 'sodalicious' ),
				'tab' => \Elementor\Controls_Manager:: TAB_ADVANCED,
			]
		);

		$element->add_control(
			'is_inner_section', [
				'label' => esc_html__( 'Is Inner Section', 'sodalicious' ),
				'type' => Elementor\Controls_Manager:: SWITCHER,
				'return_value' => 'is-inner-section',
				'prefix_class' => ''
			]
		);

		$element->end_controls_section();

	}

	// For Containers - Advanced settings
	if ( 'container' === $element->get_name() && 'section_layout' === $section_id ) {

		$element->start_controls_section(
			'section_sodalicious', [
				'label' => esc_html__( 'Sodalicious', 'sodalicious' ),
				'tab' => \Elementor\Controls_Manager:: TAB_ADVANCED,
			]
		);

		$element->add_control(
			'is_inner_container', [
				'label' => esc_html__( 'Is Inner Container', 'sodalicious' ),
				'type' => Elementor\Controls_Manager:: SWITCHER,
				'return_value' => 'is-inner-container',
				'prefix_class' => ''
			]
		);

		$element->end_controls_section();

	}

}, 10, 3 );


/**
 * Add AOS animations to Common Elements
 */
add_action( 'elementor/element/common/_section_style/after_section_end', function( $element ) {

	$element->start_controls_section(
		'aos_animation_section', [
			'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
			'label' => esc_html__( 'AOS Animation', 'sodalicious' ),
		]
	);

	$element->add_control(
		'aos_animation_name', [
			'label' => esc_html__( 'Animation Name', 'sodalicious' ),
			'type' => \Elementor\Controls_Manager:: SELECT,
			'options' => [
				'none' => 'NONE',
				'custom' => 'CUSTOM',
				'fade' => 'FADE',
				'fade-up' => 'FADE-UP',
				'fade-down' => 'FADE-DOWN',
				'fade-left' => 'FADE-LEFT',
				'fade-right' => 'FADE-RIGHT',
				'fade-up-right' => 'FADE-UP-RIGHT',
				'fade-up-left' => 'FADE-UP-LEFT',
				'fade-down-right' => 'FADE-DOWN-RIGHT',
				'fade-down-left' => 'FADE-DOWN-LEFT',
				'flip-up' => 'FLIP-UP',
				'flip-down' => 'FLIP-DOWN',
				'flip-left' => 'FLIP-LEFT',
				'flip-right' => 'FLIP-RIGHT',
				'slide-up' => 'SLIDE-UP',
				'slide-down' => 'SLIDE-DOWN',
				'slide-left' => 'SLIDE-LEFT',
				'slide-right' => 'SLIDE-RIGHT',
				'zoom-in' => 'ZOOM-IN',
				'zoom-in-up' => 'ZOOM-IN-UP',
				'zoom-in-down' => 'ZOOM-IN-DOWN',
				'zoom-in-left' => 'ZOOM-IN-LEFT',
				'zoom-in-right' => 'ZOOM-IN-RIGHT',
				'zoom-out' => 'ZOOM-OUT',
				'zoom-out-up' => 'ZOOM-OUT-UP',
				'zoom-out-down' => 'ZOOM-OUT-DOWN',
				'zoom-out-left' => 'ZOOM-OUT-LEFT',
				'zoom-out-right' => 'ZOOM-OUT-RIGHT',
			],
			'default' => 'none',
			'frontend_available' => true,
			'render_type' => 'none',
		]
	);

	$element->add_control(
		'aos_animation_delay', [
			'label' => esc_html__( 'Animation Delay', 'sodalicious' ),
			'description' => esc_html__( 'Delay before the animation starts', 'sodalicious' ),
			'type' => \Elementor\Controls_Manager::NUMBER,
			'default' => '',
			'min' => 0,
			'step' => 50,
			'condition' => [
				'aos_animation_name!' => 'none',
			],
		]
	);

	$element->add_control(
		'aos_animation_duration', [
			'label' => esc_html__( 'Animation Duration', 'sodalicious' ),
			'description' => esc_html__( 'Change the animation duration', 'sodalicious' ),
			'type' => \Elementor\Controls_Manager::NUMBER,
			'default' => '',
			'min' => 0,
			'step' => 50,
			'condition' => [
				'aos_animation_name!' => 'none',
			],
			'frontend_available' => true,
			'render_type' => 'none',
		]
	);

	$element->add_control(
		'aos_animation_offset', [
			'label' => esc_html__( 'Animation Offset', 'sodalicious' ),
			'description' => esc_html__( 'Distance to start the animation (related to the browser bottom)', 'sodalicious' ),
			'type' => \Elementor\Controls_Manager::NUMBER,
			'default' => '',
			'min' => -500,
			'max' => 500,
			'step' => 10,
			'condition' => [
				'aos_animation_name!' => 'none',
			],
		]
	);

	$element->add_control(
		'aos_animation_once', [
			'label' => esc_html__( 'Animation Once', 'sodalicious' ),
			'description' => esc_html__( 'Animate only once while scrolling down', 'sodalicious' ),
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'return_value' => 'yes',
			'default' => 'yes',
			'condition' => [
				'aos_animation_name!' => 'none',
			],
		]
	);

	$element->end_controls_section();

}, 10, 1 );

/**
 * Add AOS animations to Sections, Columns, and Containers
 */
add_action( 'elementor/element/after_section_end', function( $element, $section_id, $args ) {

	$name = $element->get_name();

	// For Sections and Columns
	if ( ( 'section' === $name || 'column' === $name ) && 'section_advanced' === $section_id ) {

		$element->start_controls_section(
			'aos_animation_section', [
				'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
				'label' => esc_html__( 'AOS Animation', 'sodalicious' ),
			]
		);

		$element->add_control(
			'aos_animation_name', [
				'label' => esc_html__( 'Animation Name', 'sodalicious' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none' => 'NONE',
					'custom' => 'CUSTOM',
					'fade' => 'FADE',
					'fade-up' => 'FADE-UP',
					'fade-down' => 'FADE-DOWN',
					'fade-left' => 'FADE-LEFT',
					'fade-right' => 'FADE-RIGHT',
					'fade-up-right' => 'FADE-UP-RIGHT',
					'fade-up-left' => 'FADE-UP-LEFT',
					'fade-down-right' => 'FADE-DOWN-RIGHT',
					'fade-down-left' => 'FADE-DOWN-LEFT',
					'flip-up' => 'FLIP-UP',
					'flip-down' => 'FLIP-DOWN',
					'flip-left' => 'FLIP-LEFT',
					'flip-right' => 'FLIP-RIGHT',
					'slide-up' => 'SLIDE-UP',
					'slide-down' => 'SLIDE-DOWN',
					'slide-left' => 'SLIDE-LEFT',
					'slide-right' => 'SLIDE-RIGHT',
					'zoom-in' => 'ZOOM-IN',
					'zoom-in-up' => 'ZOOM-IN-UP',
					'zoom-in-down' => 'ZOOM-IN-DOWN',
					'zoom-in-left' => 'ZOOM-IN-LEFT',
					'zoom-in-right' => 'ZOOM-IN-RIGHT',
					'zoom-out' => 'ZOOM-OUT',
					'zoom-out-up' => 'ZOOM-OUT-UP',
					'zoom-out-down' => 'ZOOM-OUT-DOWN',
					'zoom-out-left' => 'ZOOM-OUT-LEFT',
					'zoom-out-right' => 'ZOOM-OUT-RIGHT',
				],
				'default' => 'none',
				'frontend_available' => true,
				'render_type' => 'none',
			]
		);

		$element->add_control(
			'aos_animation_delay', [
				'label' => esc_html__( 'Animation Delay', 'sodalicious' ),
				'description' => esc_html__( 'Delay before the animation starts', 'sodalicious' ),
				'type' => \Elementor\Controls_Manager:: NUMBER,
				'default' => '',
				'min' => 0,
				'step' => 50,
				'condition' => [
					'aos_animation_name!' => 'none',
				],
			]
		);

		$element->add_control(
			'aos_animation_duration', [
				'label' => esc_html__( 'Animation Duration', 'sodalicious' ),
				'description' => esc_html__( 'Change the animation duration', 'sodalicious' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => '',
				'min' => 0,
				'step' => 50,
				'condition' => [
					'aos_animation_name!' => 'none',
				],
				'frontend_available' => true,
				'render_type' => 'none',
			]
		);

		$element->add_control(
			'aos_animation_offset', [
				'label' => esc_html__( 'Animation Offset', 'sodalicious' ),
				'description' => esc_html__( 'Distance to start the animation (related to the browser bottom)', 'sodalicious' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => '',
				'min' => -500,
				'max' => 500,
				'step' => 10,
				'condition' => [
					'aos_animation_name!' => 'none',
				],
			]
		);

		$element->add_control(
			'aos_animation_once', [
				'label' => esc_html__( 'Animation Once', 'sodalicious' ),
				'description' => esc_html__( 'Animate only once while scrolling down', 'sodalicious' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'aos_animation_name!' => 'none',
				],
			]
		);

		$element->end_controls_section();

	}

	// For Containers
	if ( 'container' === $name && 'section_layout' === $section_id ) {

		$element->start_controls_section(
			'aos_animation_section', [
				'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
				'label' => esc_html__( 'AOS Animation', 'sodalicious' ),
			]
		);

		$element->add_control(
			'aos_animation_name', [
				'label' => esc_html__( 'Animation Name', 'sodalicious' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none' => 'NONE',
					'custom' => 'CUSTOM',
					'fade' => 'FADE',
					'fade-up' => 'FADE-UP',
					'fade-down' => 'FADE-DOWN',
					'fade-left' => 'FADE-LEFT',
					'fade-right' => 'FADE-RIGHT',
					'fade-up-right' => 'FADE-UP-RIGHT',
					'fade-up-left' => 'FADE-UP-LEFT',
					'fade-down-right' => 'FADE-DOWN-RIGHT',
					'fade-down-left' => 'FADE-DOWN-LEFT',
					'flip-up' => 'FLIP-UP',
					'flip-down' => 'FLIP-DOWN',
					'flip-left' => 'FLIP-LEFT',
					'flip-right' => 'FLIP-RIGHT',
					'slide-up' => 'SLIDE-UP',
					'slide-down' => 'SLIDE-DOWN',
					'slide-left' => 'SLIDE-LEFT',
					'slide-right' => 'SLIDE-RIGHT',
					'zoom-in' => 'ZOOM-IN',
					'zoom-in-up' => 'ZOOM-IN-UP',
					'zoom-in-down' => 'ZOOM-IN-DOWN',
					'zoom-in-left' => 'ZOOM-IN-LEFT',
					'zoom-in-right' => 'ZOOM-IN-RIGHT',
					'zoom-out' => 'ZOOM-OUT',
					'zoom-out-up' => 'ZOOM-OUT-UP',
					'zoom-out-down' => 'ZOOM-OUT-DOWN',
					'zoom-out-left' => 'ZOOM-OUT-LEFT',
					'zoom-out-right' => 'ZOOM-OUT-RIGHT',
				],
				'default' => 'none',
				'frontend_available' => true,
				'render_type' => 'none',
			]
		);

		$element->add_control(
			'aos_animation_delay', [
				'label' => esc_html__( 'Animation Delay', 'sodalicious' ),
				'description' => esc_html__( 'Delay before the animation starts', 'sodalicious' ),
				'type' => \Elementor\Controls_Manager:: NUMBER,
				'default' => '',
				'min' => 0,
				'step' => 50,
				'condition' => [
					'aos_animation_name!' => 'none',
				],
			]
		);

		$element->add_control(
			'aos_animation_duration', [
				'label' => esc_html__( 'Animation Duration', 'sodalicious' ),
				'description' => esc_html__( 'Change the animation duration', 'sodalicious' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => '',
				'min' => 0,
				'step' => 50,
				'condition' => [
					'aos_animation_name!' => 'none',
				],
				'frontend_available' => true,
				'render_type' => 'none',
			]
		);

		$element->add_control(
			'aos_animation_offset', [
				'label' => esc_html__( 'Animation Offset', 'sodalicious' ),
				'description' => esc_html__( 'Distance to start the animation (related to the browser bottom)', 'sodalicious' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => '',
				'min' => -500,
				'max' => 500,
				'step' => 10,
				'condition' => [
					'aos_animation_name!' => 'none',
				],
			]
		);

		$element->add_control(
			'aos_animation_once', [
				'label' => esc_html__( 'Animation Once', 'sodalicious' ),
				'description' => esc_html__( 'Animate only once while scrolling down', 'sodalicious' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'aos_animation_name!' => 'none',
				],
			]
		);

		$element->end_controls_section();

	}

}, 10, 3 );

if ( ! function_exists( 'sodalicious_render_aos_animation' ) ) {
	function sodalicious_render_aos_animation( $widget ) {
		$settings = $widget->get_settings_for_display();

		if ( isset( $settings[ 'aos_animation_name' ] ) && $settings[ 'aos_animation_name' ] !== 'none' ) {

			if ( !  empty( $settings[ 'aos_animation_name' ] ) ) {
				$widget->add_render_attribute( '_wrapper', 'data-aos', $settings[ 'aos_animation_name' ] );
			}

			if ( !  empty( $settings[ 'aos_animation_offset' ] ) ) {
				$widget->add_render_attribute( '_wrapper', 'data-aos-offset', $settings[ 'aos_animation_offset' ] );
			}

			if ( !  empty( $settings[ 'aos_animation_delay' ] ) ) {
				$widget->add_render_attribute( '_wrapper', 'data-aos-delay', $settings[ 'aos_animation_delay' ] );
			}

			if ( !  empty( $settings[ 'aos_animation_duration' ] ) ) {
				$widget->add_render_attribute( '_wrapper', 'data-aos-duration', $settings[ 'aos_animation_duration' ] );
			}

			if ( isset( $settings[ 'aos_animation_once' ] ) ) {
				$widget->add_render_attribute( '_wrapper', 'data-aos-once', $settings[ 'aos_animation_once' ] == 'yes' ? 'true' : 'false' );
			}

		}

	}
}

add_action( 'elementor/frontend/section/before_render', 'sodalicious_render_aos_animation', 10 );
add_action( 'elementor/frontend/column/before_render', 'sodalicious_render_aos_animation', 10 );
add_action( 'elementor/frontend/container/before_render', 'sodalicious_render_aos_animation', 10 );
add_action( 'elementor/widget/before_render_content', 'sodalicious_render_aos_animation', 10 );

/**
 * Include
 */
add_action( 'elementor/init', function() {
	if ( file_exists( SODALICIOUS_REQUIRE_DIRECTORY . 'inc/elementor/column.php' ) ) {
		require_once SODALICIOUS_REQUIRE_DIRECTORY . 'inc/elementor/column.php';
	}
	if ( file_exists( SODALICIOUS_REQUIRE_DIRECTORY . 'inc/elementor/container.php' ) ) {
		require_once SODALICIOUS_REQUIRE_DIRECTORY .  'inc/elementor/container.php';
	}
} );
