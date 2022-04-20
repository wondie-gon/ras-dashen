<?php
/**
* Functions for customizing different featured products of company on frontpage
*
* 
* @package Ras_Dashen
* 
* @since 1.0.0
*/
// Get defaults for theme customizer
$default = ras_dashen_get_default_mods();


/*
* Section for frontpage featured products highlight
*/
$wp_customize->add_section(
	'ras_dashen_front_featured_products_list',
		array(
			'title'		=>	esc_html__( 'Featured Products List', 'ras-dashen' ),
			'panel'		=> 'ras_dashen_frontpage_panel',
		)
	);
/*
* enabling and Setting contents for frontpage featured products section
*/
$wp_customize->add_setting(
	'ras_dashen_front_featured_products_list_enabled',
		array(
			'default'			=>	0,
			'sanitize_callback'	=>	'ras_dashen_sanitize_checkbox',
		)
	);


$wp_customize->add_control( 
	new WP_Customize_Control(
	$wp_customize,
	'ras_dashen_front_featured_products_list_enabled',
		array(
			'section'		=>	'ras_dashen_front_featured_products_list',
			'label'			=>	esc_html__( 'Enable Section', 'ras-dashen' ),
			'description' 	=>	esc_html__( 'Check to display featured products section on frontpage.', 'ras-dashen' ),
			'settings'		=>	'ras_dashen_front_featured_products_list_enabled',
			'type'			=>	'checkbox',
		)
  	)
);

// section title
$wp_customize->add_setting(
	'ras_dashen_front_featured_products_list_section_heading',
	array(
		'default'			=>	$default['ras_dashen_front_featured_products_list_section_heading'],
		'sanitize_callback'	=>	'sanitize_text_field',
		'transport'			=>	'postMessage',
	)
);

$wp_customize->add_control( 
	new WP_Customize_Control(
		$wp_customize, 
		'ras_dashen_front_featured_products_list_section_heading', 
		array(
			'label'				=>	esc_html__( 'Section heading: ', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_featured_products_list',
			'settings'			=>	'ras_dashen_front_featured_products_list_section_heading',
			'active_callback'	=>	'ras_dashen_if_featured_products_section_enabled',
		)
	)
);

// section intro
$wp_customize->add_setting(
	'ras_dashen_front_featured_products_list_section_txt', 
	array(
		'default'			=>	'',
		'transport'			=>	'postMessage',
		'sanitize_callback'	=>	'sanitize_textarea_field',
		)
	);

$wp_customize->add_control( 
	new WP_Customize_Control(
		$wp_customize, 
		'ras_dashen_front_featured_products_list_section_txt', 
		array(
			'label'				=>	esc_html__( 'Section introduction', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_featured_products_list',
			'type'				=>	'textarea',
			'settings'			=>	'ras_dashen_front_featured_products_list_section_txt',
			'active_callback'	=>	'ras_dashen_if_featured_products_section_enabled',
			'input_attrs' => array(
				'class' => 'custm-txtarea',
				'style' => 'border: 1px solid #999',
				'placeholder' => esc_html__( 'Enter section description...', 'ras-dashen' ),
	      	),
		)
	)
);

/*
* Number of cards
*/
$wp_customize->add_setting(
	'ras_dashen_number_of_featured_products_cards',
		array(
			'default'			=>	$default['ras_dashen_number_of_featured_products_cards'],
			'sanitize_callback'	=>	'ras_dashen_sanitize_number',
			'transport'			=>	'refresh',
		)
	);
	
$wp_customize->add_control( 
	new WP_Customize_Control(
		$wp_customize,
		'ras_dashen_number_of_featured_products_cards',
		array(
			'label'				=>	esc_html__( 'Number of product cards', 'ras-dashen' ),
			'section'			=>	'ras_dashen_front_featured_products_list',
			'settings'			=>	'ras_dashen_number_of_featured_products_cards',
			'active_callback'	=>	'ras_dashen_if_featured_products_section_enabled',
			'type' 				=>	'number',
		)
  	)
);


/*
* select posts and customize featured products cards
*/
$num_of_featured_products = absint( get_theme_mod( 'ras_dashen_number_of_featured_products_cards', $default['ras_dashen_number_of_featured_products_cards'] ) );

$prd = 0;

while ( $prd < $num_of_featured_products ) :

	// select post
	$wp_customize->add_setting(
		'ras_dashen_featured_products_list_post_' . $prd, 
		array(
			'default'			=>	'',
			'sanitize_callback'	=>	'absint',
		)
	);
	$wp_customize->add_control(
		new Ras_Dashen_Post_Dropdown_Custom_Control(
			$wp_customize, 
			'ras_dashen_featured_products_list_post_' . $prd, 
			array(
				'label'				=>	esc_html__( 'Post ', 'ras-dashen' ) . $prd,
				'section'			=>	'ras_dashen_front_featured_products_list',
				'settings'			=>	'ras_dashen_featured_products_list_post_' . $prd, 
				'active_callback'	=>	'ras_dashen_if_featured_products_section_enabled',
			)
		)
		
	);

	

	// Custom separator for summary cards
	$wp_customize->add_setting(
	'ras_dashen_featured_products_highlight_cards_custom_separator_' . $prd, 
		array(
			'sanitize_callback'	=>	'ras_dashen_sanitize_html'
		)
	);
	$wp_customize->add_control( 
		new Ras_Dashen_Separator_Custom_Control(
			$wp_customize, 
			'ras_dashen_featured_products_highlight_cards_custom_separator_' . $prd,
				array(
					'type'	            =>	'ras-dashen-separator',
					'section'	        =>	'ras_dashen_front_featured_products_list',
					'settings'	        =>	'ras_dashen_featured_products_highlight_cards_custom_separator_' . $prd,
					'active_callback'	=>	'ras_dashen_if_featured_products_section_enabled',
				)
		)
	);

	$prd++;

endwhile;

//---------------------featured products section style customizers-----------------------------

// section background color
$wp_customize->add_setting( 
	'ras_dashen_featured_products_section_bg_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_featured_products_section_bg_color', 
		array(
			'label'				=> 	esc_html__( 'Section Background Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_featured_products_list',
			'settings'			=> 	'ras_dashen_featured_products_section_bg_color',
			'active_callback'	=>	'ras_dashen_if_featured_products_section_enabled',
		) 
	) 
);

// section header color
$wp_customize->add_setting( 
	'ras_dashen_featured_products_section_hdng_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_featured_products_section_hdng_color', 
		array(
			'label'				=> 	esc_html__( 'Section Heading Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_featured_products_list',
			'settings'			=> 	'ras_dashen_featured_products_section_hdng_color',
			'active_callback'	=>	'ras_dashen_if_featured_products_section_enabled',
		) 
	) 
);

// cards background color
$wp_customize->add_setting( 
	'ras_dashen_featured_products_cards_bg_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_featured_products_cards_bg_color', 
		array(
			'label'				=> 	esc_html__( 'Cards Background Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_featured_products_list',
			'settings'			=> 	'ras_dashen_featured_products_cards_bg_color',
			'active_callback'	=> 	'ras_dashen_if_featured_products_section_enabled',
		) 
	) 
);

// cards title color
$wp_customize->add_setting( 
	'ras_dashen_featured_products_cards_title_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_featured_products_cards_title_color', 
		array(
			'label'				=> 	esc_html__( 'Cards title Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_featured_products_list',
			'settings'			=> 	'ras_dashen_featured_products_cards_title_color',
			'active_callback'	=> 	'ras_dashen_if_featured_products_section_enabled',
		) 
	) 
);

// button background color
$wp_customize->add_setting( 
	'ras_dashen_featured_products_btn_bg_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_featured_products_btn_bg_color', 
		array(
			'label'				=> 	esc_html__( 'Button Background Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_featured_products_list',
			'settings'			=> 	'ras_dashen_featured_products_btn_bg_color',
			'active_callback'	=> 	'ras_dashen_if_featured_products_section_enabled',
		) 
	) 
);

// button link color
$wp_customize->add_setting( 
	'ras_dashen_featured_products_btn_text_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_featured_products_btn_text_color', 
		array(
			'label'				=> 	esc_html__( 'Button link Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_featured_products_list',
			'settings'			=> 	'ras_dashen_featured_products_btn_text_color',
			'active_callback'	=> 	'ras_dashen_if_featured_products_section_enabled',
		) 
	) 
);