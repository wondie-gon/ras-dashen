<?php
/**
* Functions for customizing company related current affairs section on frontpage
*
* 
* @package Ras_Dashen
* 
* @since 1.0.0
*/
/*
* Section for frontpage current affairs
*/
$wp_customize->add_section(
	'ras_dashen_front_current_affairs',
		array(
			'title'		=>	esc_html__( 'Current affairs', 'ras-dashen' ),
			'panel'		=> 'ras_dashen_frontpage_panel',
		)
	);
/*
* enabling and Setting contents for frontpage current affairs
*/
$wp_customize->add_setting(
	'ras_dashen_front_current_affairs_enabled',
		array(
			'default'			=>	0,
			'sanitize_callback'	=>	'ras_dashen_sanitize_checkbox',
		)
	);


$wp_customize->add_control( 
	new WP_Customize_Control(
	$wp_customize,
	'ras_dashen_front_current_affairs_enabled',
		array(
			'section'		=>	'ras_dashen_front_current_affairs',
			'label'			=>	esc_html__( 'Enable Section', 'ras-dashen' ),
			'description' 	=>	esc_html__( 'Check to display current affairs slider section on frontpage.', 'ras-dashen' ),
			'settings'		=>	'ras_dashen_front_current_affairs_enabled',
			'type'			=>	'checkbox',
		)
  	)
);

/*
* Get category to display posts on frontpage
*/
$wp_customize->add_setting(
	'ras_dashen_front_current_affairs_category',
		array(
			'default'			=>	'0',
			'sanitize_callback'	=>	'absint',
			)
	);

$wp_customize->add_control( 
		new Ras_Dashen_Category_Dropdown_Control( 
			$wp_customize, 'ras_dashen_front_current_affairs_category', 
			array(
				'label'				=>	esc_html__( 'Select category of posts', 'ras-dashen' ),
				'section'			=>	'ras_dashen_front_current_affairs',
				'settings'			=>	'ras_dashen_front_current_affairs_category',
				'type'            	=>	'dropdown-category',
				'active_callback'	=>	'ras_dashen_front_current_affairs_is_enabled',
			) 
		) 
	);

/*
* Number of posts
*/
$wp_customize->add_setting(
	'ras_dashen_num_of_current_affairs_posts',
		array(
			'default'			=>	'4',
			'sanitize_callback'	=>	'ras_dashen_sanitize_number',
			'transport'			=>	'refresh',
		)
	);
	
$wp_customize->add_control( 
	new WP_Customize_Control(
		$wp_customize,
		'ras_dashen_num_of_current_affairs_posts',
		array(
			'label'				=>	esc_html__('Number of posts', 'ras-dashen'),
			'section'			=>	'ras_dashen_front_current_affairs',
			'settings'			=>	'ras_dashen_num_of_current_affairs_posts',
			'active_callback'	=>	'ras_dashen_front_current_affairs_is_enabled',
			'type' 				=>	'number',
		)
  	)
);

// section title
$wp_customize->add_setting(
	'ras_dashen_front_current_affairs_section_heading',
	array(
		'default'			=>	$default['ras_dashen_front_current_affairs_section_heading'],
		'sanitize_callback'	=>	'sanitize_text_field',
		'transport'			=>	'postMessage',
	)
);

$wp_customize->add_control( 
	new WP_Customize_Control(
		$wp_customize, 
		'ras_dashen_front_current_affairs_section_heading', 
		array(
			'label'				=>	esc_html__( 'Section heading: ', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_current_affairs',
			'settings'			=>	'ras_dashen_front_current_affairs_section_heading',
			'active_callback'	=>	'ras_dashen_front_current_affairs_is_enabled',
		)
	)
);

//---------------------latest affairs section style customizers-----------------------------

// section background color
$wp_customize->add_setting( 
	'ras_dashen_current_affairs_section_bg_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_current_affairs_section_bg_color', 
		array(
			'label'				=> 	esc_html__( 'Section Background Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_current_affairs',
			'settings'			=> 	'ras_dashen_current_affairs_section_bg_color',
			'active_callback'	=>	'ras_dashen_front_current_affairs_is_enabled',
		) 
	) 
);

// section header color
$wp_customize->add_setting( 
	'ras_dashen_current_affairs_section_hdng_color', 
	array(
		'default'			=>	'#47738c',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_current_affairs_section_hdng_color', 
		array(
			'label'				=> 	esc_html__( 'Section Heading Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_current_affairs',
			'settings'			=> 	'ras_dashen_current_affairs_section_hdng_color',
			'active_callback'	=>	'ras_dashen_front_current_affairs_is_enabled',
		) 
	) 
);

// slider caption background color
$wp_customize->add_setting( 
	'ras_dashen_current_affairs_carousel_caption_bg_color', 
	array(
		'default'			=>	'#47738c',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_current_affairs_carousel_caption_bg_color', 
		array(
			'label'				=> 	esc_html__( 'Carousel caption Background', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_current_affairs',
			'settings'			=> 	'ras_dashen_current_affairs_carousel_caption_bg_color',
			'active_callback'	=> 	'ras_dashen_front_current_affairs_is_enabled',
		) 
	) 
);

// slider caption content color
$wp_customize->add_setting( 
	'ras_dashen_current_affairs_carousel_caption_color', 
	array(
		'default'			=>	'#e1faff',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_current_affairs_carousel_caption_color', 
		array(
			'label'				=> 	esc_html__( 'Carousel caption Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_current_affairs',
			'settings'			=> 	'ras_dashen_current_affairs_carousel_caption_color',
			'active_callback'	=> 	'ras_dashen_front_current_affairs_is_enabled',
		) 
	) 
);