<?php
/**
* Functions for customizing frontpage hero section
*
* 
* @package Ras_Dashen
* 
* @since 1.0.0
*/
// Get defaults for theme customizer
$default = ras_dashen_get_default_mods();


/*
* Section for frontpage hero
*/
$wp_customize->add_section(
	'ras_dashen_front_hero',
	array(
		'title'		=>	esc_html__( 'Front Hero', 'ras-dashen' ),
		'panel'		=> 'ras_dashen_frontpage_panel',
	)
);
/*
* enabling and Setting contents for section
*/
$wp_customize->add_setting(
	'ras_dashen_front_hero_enabled',
	array(
		'default'			=>	0,
		'sanitize_callback'	=>	'ras_dashen_sanitize_checkbox',
		'transport'			=>	'refresh',
	)
);


$wp_customize->add_control( 
	new WP_Customize_Control(
	$wp_customize,
	'ras_dashen_front_hero_enabled',
		array(
			'label'			=>	esc_html__( 'Enable Section', 'ras-dashen' ),
			'description' 	=>	esc_html__( 'Check to display hero section.', 'ras-dashen' ),
			'section'		=>	'ras_dashen_front_hero',
			'settings'		=>	'ras_dashen_front_hero_enabled',
			'type'			=>	'checkbox',
		)
  	)
);

// section title
$wp_customize->add_setting(
	'ras_dashen_front_hero_section_heading',
	array(
		'default'			=>	$default['ras_dashen_front_hero_section_heading'],
		'sanitize_callback'	=>	'sanitize_text_field',
		'transport'			=>	'postMessage',
	)
);

$wp_customize->add_control( 
	'ras_dashen_front_hero_section_heading', 
	array(
		'label'				=>	esc_html__( 'Section title: ', 'ras-dashen' ),
		'section'			=> 	'ras_dashen_front_hero',
		'settings'			=>	'ras_dashen_front_hero_section_heading',
		'active_callback'	=>	'ras_dashen_if_front_hero_enabled',
	)
);

// excerpt heading
$wp_customize->add_setting(
	'ras_dashen_front_hero_heading', 
	array(
		'default'			=>	$default['ras_dashen_front_hero_heading'],
		'transport'			=>	'postMessage',
		'sanitize_callback'	=>	'sanitize_text_field',
	)
);

$wp_customize->add_control( 
	'ras_dashen_front_hero_heading', 
	array(
		'label'				=>	esc_html__( 'Front Hero heading: ', 'ras-dashen' ),
		'section'			=> 	'ras_dashen_front_hero',
		'settings'			=>	'ras_dashen_front_hero_heading',
		'active_callback'	=>	'ras_dashen_if_front_hero_enabled',
	)
);


// Add excerpt message
$wp_customize->add_setting(
	'ras_dashen_front_hero_text', 
	array(
		'default'			=>	$default['ras_dashen_front_hero_text'],
		'transport'			=>	'postMessage',
		'sanitize_callback'	=>	'sanitize_textarea_field',
		)
	);

$wp_customize->add_control( 
	new WP_Customize_Control(
		$wp_customize, 
		'ras_dashen_front_hero_text', 
		array(
			'label'				=>	esc_html__( 'Front Hero Text: ', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_hero',
			'type'				=>	'textarea',
			'settings'			=>	'ras_dashen_front_hero_text',
			'active_callback'	=>	'ras_dashen_if_front_hero_enabled',
		)
	)
);

// Add custom image
$wp_customize->add_setting(
	'ras_dashen_front_hero_custom_image', 
	array(
		'transport'			=>	'refresh',
		'sanitize_callback' =>	'absint',	
	)
);

$wp_customize->add_control( 
	new WP_Customize_Cropped_Image_Control(
		$wp_customize, 
		'ras_dashen_front_hero_custom_image', 
			array(
				'label'				=> 	esc_html__( 'Custom Image ', 'ras-dashen' ),
				'description'		=> 	esc_html__( 'Select and upload a custom image', 'ras-dashen' ),
				'section'			=> 	'ras_dashen_front_hero',
				'settings'			=>	'ras_dashen_front_hero_custom_image',
				'active_callback'	=>	'ras_dashen_if_front_hero_enabled',
				'width'				=>	600,
				'height'			=>	450,
			)
	)
);

// primary btn text
$wp_customize->add_setting(
	'ras_dashen_front_hero_primary_custom_btn_text', 
	array(
		'default'			=>	$default['ras_dashen_front_hero_primary_custom_btn_text'],
		'transport'			=>	'postMessage',
		'sanitize_callback'	=>	'sanitize_text_field',
	)
);

$wp_customize->add_control( 
	'ras_dashen_front_hero_primary_custom_btn_text', 
	array(
		'label'				=>	esc_html__( 'Primary Button: ', 'ras-dashen' ),
		'section'			=> 	'ras_dashen_front_hero',
		'settings'			=>	'ras_dashen_front_hero_primary_custom_btn_text',
		'active_callback'	=>	'ras_dashen_if_front_hero_enabled',
	)
);

// primary btn link
$wp_customize->add_setting(
	'ras_dashen_front_hero_primary_custom_btn_link',
	array(
		'default'			=>	'',
		'transport'			=>	'refresh',
		'sanitize_callback'	=>	'esc_url_raw',
	)
);

$wp_customize->add_control( 
	new WP_Customize_Control(
		$wp_customize, 
		'ras_dashen_front_hero_primary_custom_btn_link', 
		array(
			'label'				=>	esc_html__( 'Link ', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_hero',
			'settings'			=>	'ras_dashen_front_hero_primary_custom_btn_link',
			'active_callback'	=>	'ras_dashen_if_front_hero_enabled',
		)
	)
);

// secondary btn text
$wp_customize->add_setting(
	'ras_dashen_front_hero_secondary_custom_btn_text', 
	array(
		'default'			=>	$default['ras_dashen_front_hero_secondary_custom_btn_text'],
		'transport'			=>	'postMessage',
		'sanitize_callback'	=>	'sanitize_text_field',
	)
);

$wp_customize->add_control( 
	'ras_dashen_front_hero_secondary_custom_btn_text', 
	array(
		'label'				=>	esc_html__( 'Secondary Button: ', 'ras-dashen' ),
		'section'			=> 	'ras_dashen_front_hero',
		'settings'			=>	'ras_dashen_front_hero_secondary_custom_btn_text',
		'active_callback'	=>	'ras_dashen_if_front_hero_enabled',
	)
);

// secondary btn link
$wp_customize->add_setting(
	'ras_dashen_front_hero_secondary_custom_btn_link',
	array(
		'default'			=>	'',
		'transport'			=>	'refresh',
		'sanitize_callback'	=>	'esc_url_raw',
	)
);

$wp_customize->add_control( 
	new WP_Customize_Control(
		$wp_customize, 
		'ras_dashen_front_hero_secondary_custom_btn_link', 
		array(
			'label'				=>	esc_html__( 'Link ', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_hero',
			'settings'			=>	'ras_dashen_front_hero_secondary_custom_btn_link',
			'active_callback'	=>	'ras_dashen_if_front_hero_enabled',
		)
	)
);


//---------------------hero section style customizers-----------------------------

// section background color
$wp_customize->add_setting( 
	'ras_dashen_front_hero_section_bg_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_front_hero_section_bg_color', 
		array(
			'label'				=> 	esc_html__( 'Section Background Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_hero',
			'settings'			=> 	'ras_dashen_front_hero_section_bg_color',
			'active_callback'	=>	'ras_dashen_if_front_hero_enabled',
		) 
	) 
);

// section title color
$wp_customize->add_setting( 
	'ras_dashen_front_hero_section_hdng_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_front_hero_section_hdng_color', 
		array(
			'label'				=> 	esc_html__( 'Section Title Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_hero',
			'settings'			=> 	'ras_dashen_front_hero_section_hdng_color',
			'active_callback'	=>	'ras_dashen_if_front_hero_enabled',
		) 
	) 
);

// excerpt header color
$wp_customize->add_setting( 
	'ras_dashen_front_hero_hdng_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_front_hero_hdng_color', 
		array(
			'label'				=> 	esc_html__( 'Excerpt Heading Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_hero',
			'settings'			=> 	'ras_dashen_front_hero_hdng_color',
			'active_callback'	=>	'ras_dashen_if_front_hero_enabled',
		) 
	) 
);

// excerpt text color
$wp_customize->add_setting( 
	'ras_dashen_front_hero_text_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_front_hero_text_color', 
		array(
			'label'				=> 	esc_html__( 'Excerpt Text Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_hero',
			'settings'			=> 	'ras_dashen_front_hero_text_color',
			'active_callback'	=>	'ras_dashen_if_front_hero_enabled',
		) 
	) 
);

