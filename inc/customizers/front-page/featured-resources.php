<?php
/**
* Functions for customizing different featured resources of company on frontpage
*
* 
* @package Ras_Dashen
* 
* @since 1.0.0
*/
// Get defaults for theme customizer
$default = ras_dashen_get_default_mods();


/*
* Section for frontpage featured resources highlight
*/
$wp_customize->add_section(
	'ras_dashen_front_featured_resources_highlight',
		array(
			'title'		=>	esc_html__( 'Featured Resources', 'ras-dashen' ),
			'panel'		=> 'ras_dashen_frontpage_panel',
		)
	);
/*
* enabling and Setting contents for frontpage featured resources section
*/
$wp_customize->add_setting(
	'ras_dashen_front_featured_resources_highlight_enabled',
		array(
			'default'			=>	0,
			'sanitize_callback'	=>	'ras_dashen_sanitize_checkbox',
		)
	);


$wp_customize->add_control( 
	new WP_Customize_Control(
	$wp_customize,
	'ras_dashen_front_featured_resources_highlight_enabled',
		array(
			'section'		=>	'ras_dashen_front_featured_resources_highlight',
			'label'			=>	esc_html__( 'Enable Section', 'ras-dashen' ),
			'description' 	=>	esc_html__( 'Check to display featured resources section on frontpage.', 'ras-dashen' ),
			'settings'		=>	'ras_dashen_front_featured_resources_highlight_enabled',
			'type'			=>	'checkbox',
		)
  	)
);

// section title
$wp_customize->add_setting(
	'ras_dashen_front_featured_resources_highlight_section_heading',
	array(
		'default'			=>	$default['ras_dashen_front_featured_resources_highlight_section_heading'],
		'sanitize_callback'	=>	'sanitize_text_field',
		'transport'			=>	'postMessage',
	)
);

$wp_customize->add_control( 
	new WP_Customize_Control(
		$wp_customize, 
		'ras_dashen_front_featured_resources_highlight_section_heading', 
		array(
			'label'				=>	esc_html__( 'Section heading: ', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_featured_resources_highlight',
			'settings'			=>	'ras_dashen_front_featured_resources_highlight_section_heading',
			'active_callback'	=>	'ras_dashen_if_featured_resources_section_enabled',
		)
	)
);

// section intro
$wp_customize->add_setting(
	'ras_dashen_front_featured_resources_highlight_section_txt', 
	array(
		'default'			=>	'',
		'transport'			=>	'postMessage',
		'sanitize_callback'	=>	'sanitize_textarea_field',
		)
	);

$wp_customize->add_control( 
	new WP_Customize_Control(
		$wp_customize, 
		'ras_dashen_front_featured_resources_highlight_section_txt', 
		array(
			'label'				=>	esc_html__( 'Section introduction', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_featured_resources_highlight',
			'type'				=>	'textarea',
			'settings'			=>	'ras_dashen_front_featured_resources_highlight_section_txt',
			'active_callback'	=>	'ras_dashen_if_featured_resources_section_enabled',
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
	'ras_dashen_featured_resources_num_of_highlight_cards',
		array(
			'default'			=>	$default['ras_dashen_featured_resources_num_of_highlight_cards'],
			'sanitize_callback'	=>	'ras_dashen_sanitize_number',
			'transport'			=>	'refresh',
		)
	);
	
$wp_customize->add_control( 
	new WP_Customize_Control(
		$wp_customize,
		'ras_dashen_featured_resources_num_of_highlight_cards',
		array(
			'label'				=>	esc_html__('Number of cards', 'ras-dashen'),
			'section'			=>	'ras_dashen_front_featured_resources_highlight',
			'settings'			=>	'ras_dashen_featured_resources_num_of_highlight_cards',
			'active_callback'	=>	'ras_dashen_if_featured_resources_section_enabled',
			'type' 				=>	'number',
		)
  	)
);


/*
* select posts to show as featured resources for the set number of posts
*/

$num_of_featured_resources = absint( get_theme_mod( 'ras_dashen_featured_resources_num_of_highlight_cards', $default['ras_dashen_featured_resources_num_of_highlight_cards'] ) );

$rIndx = 0;

while ( $rIndx < $num_of_featured_resources ) :

	// select post
	$wp_customize->add_setting(
		'ras_dashen_featured_resources_highlight_card_post_' . $rIndx, 
		array(
			'default'			=>	'',
			'sanitize_callback'	=>	'absint',
		)
	);
	$wp_customize->add_control(
		new Ras_Dashen_Post_Dropdown_Custom_Control(
			$wp_customize, 
			'ras_dashen_featured_resources_highlight_card_post_' . $rIndx, 
			array(
				'label'				=>	esc_html__( 'Post ', 'ras-dashen' ) . $rIndx,
				'section'			=>	'ras_dashen_front_featured_resources_highlight',
				'settings'			=>	'ras_dashen_featured_resources_highlight_card_post_' . $rIndx, 
				'active_callback'	=>	'ras_dashen_if_featured_resources_section_enabled',
			)
		)
		
	);

	

	// Custom separator for summary cards
	$wp_customize->add_setting(
	'ras_dashen_featured_resources_highlight_cards_custom_separator_' . $rIndx, 
		array(
			'sanitize_callback'	=>	'ras_dashen_sanitize_html'
		)
	);
	$wp_customize->add_control( 
		new Ras_Dashen_Separator_Custom_Control(
			$wp_customize, 
			'ras_dashen_featured_resources_highlight_cards_custom_separator_' . $rIndx,
				array(
					'type'	            =>	'ras-dashen-separator',
					'section'	        =>	'ras_dashen_front_featured_resources_highlight',
					'settings'	        =>	'ras_dashen_featured_resources_highlight_cards_custom_separator_' . $rIndx,
					'active_callback'	=>	'ras_dashen_if_featured_resources_section_enabled',
				)
		)
	);

	$rIndx++;

endwhile;

//---------------------featured resources section style customizers-----------------------------

// section background color
$wp_customize->add_setting( 
	'ras_dashen_featured_resources_section_bg_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_featured_resources_section_bg_color', 
		array(
			'label'				=> 	esc_html__( 'Section Background Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_featured_resources_highlight',
			'settings'			=> 	'ras_dashen_featured_resources_section_bg_color',
			'active_callback'	=>	'ras_dashen_if_featured_resources_section_enabled',
		) 
	) 
);

// section header color
$wp_customize->add_setting( 
	'ras_dashen_featured_resources_section_hdng_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_featured_resources_section_hdng_color', 
		array(
			'label'				=> 	esc_html__( 'Section Heading Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_featured_resources_highlight',
			'settings'			=> 	'ras_dashen_featured_resources_section_hdng_color',
			'active_callback'	=>	'ras_dashen_if_featured_resources_section_enabled',
		) 
	) 
);

// cards background color
$wp_customize->add_setting( 
	'ras_dashen_featured_resources_cards_bg_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_featured_resources_cards_bg_color', 
		array(
			'label'				=> 	esc_html__( 'Cards Background Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_featured_resources_highlight',
			'settings'			=> 	'ras_dashen_featured_resources_cards_bg_color',
			'active_callback'	=> 	'ras_dashen_if_featured_resources_section_enabled',
		) 
	) 
);

// cards title color
$wp_customize->add_setting( 
	'ras_dashen_featured_resources_cards_title_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_featured_resources_cards_title_color', 
		array(
			'label'				=> 	esc_html__( 'Cards title Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_featured_resources_highlight',
			'settings'			=> 	'ras_dashen_featured_resources_cards_title_color',
			'active_callback'	=> 	'ras_dashen_if_featured_resources_section_enabled',
		) 
	) 
);

// cards text color
$wp_customize->add_setting( 
	'ras_dashen_featured_resources_cards_text_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_featured_resources_cards_text_color', 
		array(
			'label'				=> 	esc_html__( 'Cards text Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_featured_resources_highlight',
			'settings'			=> 	'ras_dashen_featured_resources_cards_text_color',
			'active_callback'	=> 	'ras_dashen_if_featured_resources_section_enabled',
		) 
	) 
);

// button background color
$wp_customize->add_setting( 
	'ras_dashen_featured_resources_btn_bg_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_featured_resources_btn_bg_color', 
		array(
			'label'				=> 	esc_html__( 'Button Background Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_featured_resources_highlight',
			'settings'			=> 	'ras_dashen_featured_resources_btn_bg_color',
			'active_callback'	=> 	'ras_dashen_if_featured_resources_section_enabled',
		) 
	) 
);

// button link color
$wp_customize->add_setting( 
	'ras_dashen_featured_resources_btn_link_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_featured_resources_btn_link_color', 
		array(
			'label'				=> 	esc_html__( 'Button link Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_featured_resources_highlight',
			'settings'			=> 	'ras_dashen_featured_resources_btn_link_color',
			'active_callback'	=> 	'ras_dashen_if_featured_resources_section_enabled',
		) 
	) 
);