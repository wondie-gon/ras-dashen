<?php
/**
* Functions for customizing different secondary services of company on frontpage
*
* 
* @package Ras_Dashen
* 
* @since 1.0.0
*/
// Get defaults for theme customizer
$default = ras_dashen_get_default_mods();


/*
* Section for frontpage secondary services highlight
*/
$wp_customize->add_section(
	'ras_dashen_front_secondary_services_highlight',
		array(
			'title'		=>	esc_html__( 'Secondary Services', 'ras-dashen' ),
			'panel'		=> 'ras_dashen_frontpage_panel',
		)
	);
/*
* enabling and Setting contents for frontpage secondary services highlight
*/
$wp_customize->add_setting(
	'ras_dashen_front_secondary_services_highlight_enabled',
		array(
			'default'			=>	0,
			'sanitize_callback'	=>	'ras_dashen_sanitize_checkbox',
		)
	);


$wp_customize->add_control( 
	new WP_Customize_Control(
	$wp_customize,
	'ras_dashen_front_secondary_services_highlight_enabled',
		array(
			'section'		=>	'ras_dashen_front_secondary_services_highlight',
			'label'			=>	esc_html__( 'Enable Section', 'ras-dashen' ),
			'description' 	=>	esc_html__( 'Check to display secondary services section on frontpage.', 'ras-dashen' ),
			'settings'		=>	'ras_dashen_front_secondary_services_highlight_enabled',
			'type'			=>	'checkbox',
		)
  	)
);

// section title
$wp_customize->add_setting(
	'ras_dashen_front_secondary_services_highlight_section_heading',
	array(
		'default'			=>	$default['ras_dashen_front_secondary_services_highlight_section_heading'],
		'sanitize_callback'	=>	'sanitize_text_field',
		'transport'			=>	'postMessage',
	)
);

$wp_customize->add_control( 
	new WP_Customize_Control(
		$wp_customize, 
		'ras_dashen_front_secondary_services_highlight_section_heading', 
		array(
			'label'				=>	esc_html__( 'Section heading: ', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_secondary_services_highlight',
			'settings'			=>	'ras_dashen_front_secondary_services_highlight_section_heading',
			'active_callback'	=>	'ras_dashen_if_secondary_services_highlight_section_enabled',
		)
	)
);

// section intro
$wp_customize->add_setting(
	'ras_dashen_front_secondary_services_highlight_section_txt', 
	array(
		'default'			=>	$default['ras_dashen_front_secondary_services_highlight_section_txt'],
		'transport'			=>	'postMessage',
		'sanitize_callback'	=>	'sanitize_textarea_field',
		)
	);

$wp_customize->add_control( 
	new WP_Customize_Control(
		$wp_customize, 
		'ras_dashen_front_secondary_services_highlight_section_txt', 
		array(
			'label'				=>	esc_html__( 'Section introduction', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_secondary_services_highlight',
			'type'				=>	'textarea',
			'settings'			=>	'ras_dashen_front_secondary_services_highlight_section_txt',
			'active_callback'	=>	'ras_dashen_if_secondary_services_highlight_section_enabled',
			'input_attrs' => array(
				'class' => 'custm-txtarea',
				'style' => 'border: 1px solid #999',
				'placeholder' => esc_html__( 'Enter card excrpt...', 'ras-dashen' ),
	      	),
		)
	)
);

/*
* Number of cards
*/
$wp_customize->add_setting(
	'ras_dashen_secondary_services_num_of_highlight_cards',
		array(
			'default'			=>	$default['ras_dashen_secondary_services_num_of_highlight_cards'],
			'sanitize_callback'	=>	'ras_dashen_sanitize_number',
			'transport'			=>	'refresh',
		)
	);
	
$wp_customize->add_control( 
	new WP_Customize_Control(
		$wp_customize,
		'ras_dashen_secondary_services_num_of_highlight_cards',
		array(
			'label'				=>	esc_html__('Number of cards', 'ras-dashen'),
			'description'		=>	esc_html__('How many cards you want to display on this section.', 'ras-dashen'),
			'section'			=>	'ras_dashen_front_secondary_services_highlight',
			'settings'			=>	'ras_dashen_secondary_services_num_of_highlight_cards',
			'active_callback'	=>	'ras_dashen_if_secondary_services_highlight_section_enabled',
			'type' 				=>	'number',
		)
  	)
);

/*
* select content type to display as summary cards
*/
$wp_customize->add_setting(
	'ras_dashen_secondary_services_highlight_cards_content_type',
		array(
			'default'			=>	'',
			'sanitize_callback'	=>	'ras_dashen_sanitize_select',
			'transport'			=>	'refresh', 
		)
	);


$wp_customize->add_control( 
	new WP_Customize_Control(
		$wp_customize,
		'ras_dashen_secondary_services_highlight_cards_content_type',
		array(
			'label'				=>	esc_html__( 'Cards post type', 'ras-dashen' ),
			'description' 		=>	esc_html__( 'Select the content type to display on cards', 'ras-dashen' ),
			'section'			=>	'ras_dashen_front_secondary_services_highlight',
			'settings'			=>	'ras_dashen_secondary_services_highlight_cards_content_type',
			'active_callback'	=>	'ras_dashen_if_secondary_services_highlight_section_enabled',
			'type'				=>	'select',
			'choices'			=>	array(
				''				=>	esc_html__( 'Select type', 'ras-dashen' ),
				'post'			=>	esc_html__( 'Post', 'ras-dashen' ),
				'page'			=>	esc_html__( 'Page', 'ras-dashen' ),
				'custom_card'	=>	esc_html__( 'Custom', 'ras-dashen' ),
			)
		)
  	)
);


/*
* select and customize secondary services cards based on selected content post type
*/
$num_of_secondary_services = absint( get_theme_mod( 'ras_dashen_secondary_services_num_of_highlight_cards', $default['ras_dashen_secondary_services_num_of_highlight_cards'] ) );

$card_indx = 0;

while ( $card_indx < $num_of_secondary_services ) :

	// summary cards title
	$wp_customize->add_setting(
		'ras_dashen_custom_secondary_services_highlight_card_title_' . $card_indx,
			array(
				'default'			=>	$default['ras_dashen_custom_secondary_services_highlight_card_title'],
				'transport'			=>	'refresh',
				'sanitize_callback'	=>	'sanitize_text_field',
			)
		);

	$wp_customize->add_control( 
		new WP_Customize_Control(
			$wp_customize, 
			'ras_dashen_custom_secondary_services_highlight_card_title_' . $card_indx, 
			array(
				'label'				=>	esc_html__( 'Custom title ', 'ras-dashen' ) . $card_indx,
				'section'			=>	'ras_dashen_front_secondary_services_highlight',
				'settings'			=>	'ras_dashen_custom_secondary_services_highlight_card_title_' . $card_indx, 
				'active_callback'	=>	'ras_dashen_if_secondary_services_highlight_card_custom',
			)
		)
	);

	// summary cards body text
	$wp_customize->add_setting(
		'ras_dashen_custom_secondary_services_highlight_card_description_' . $card_indx,
			array(
				'default'			=>	$default['ras_dashen_custom_secondary_services_highlight_card_description'],
				'transport'			=>	'refresh',
				'sanitize_callback'	=>	'sanitize_textarea_field',
			)
		);
	$wp_customize->add_control( 
		new WP_Customize_Control(
			$wp_customize, 
			'ras_dashen_custom_secondary_services_highlight_card_description_' . $card_indx, 
			array(
				'label'				=>	esc_html__( 'Custom description ', 'ras-dashen' ) . $card_indx,
				'section'			=>	'ras_dashen_front_secondary_services_highlight',
				'type'				=>	'textarea',
				'settings'			=>	'ras_dashen_custom_secondary_services_highlight_card_description_' . $card_indx,
				'active_callback'	=>	'ras_dashen_if_secondary_services_highlight_card_custom',
				'input_attrs' => array(
					'class' => 'custm-txtarea',
					'style' => 'border: 1px solid #999',
					'placeholder' => esc_html__( 'Enter card excrpt...', 'ras-dashen' ),
		      	),
			)
		)
	);

	// Add image for custom cards
	$wp_customize->add_setting(
		'ras_dashen_secondary_services_highlight_img_custom_card_' . $card_indx, 
		array(
			'transport'			=>	'refresh',
			'sanitize_callback' =>	'ras_dashen_sanitize_image',	
		)
	);

	$wp_customize->add_control( 
		new WP_Customize_Cropped_Image_Control(
			$wp_customize, 
			'ras_dashen_secondary_services_highlight_img_custom_card_' . $card_indx, 
				array(
					'label'				=> 	esc_html__( 'Custom Image ', 'ras-dashen' ) . $card_indx,
					'description'		=> 	esc_html__( 'Select and upload a custom image for the custom card.', 'ras-dashen' ),
					'section'			=> 	'ras_dashen_front_secondary_services_highlight',
					'settings'			=>	'ras_dashen_secondary_services_highlight_img_custom_card_' . $card_indx,
					'active_callback'	=>	'ras_dashen_if_secondary_services_highlight_card_custom',
					'width'				=>	600,
					'height'			=>	450,
				)
		)
	);

	// summary cards link to
	$wp_customize->add_setting(
		'ras_dashen_custom_secondary_services_highlight_link_' . $card_indx,
			array(
				'default'			=>	'#',
				'sanitize_callback'	=>	'esc_url_raw',
			)
		);
	$wp_customize->add_control( 
		new WP_Customize_Control(
			$wp_customize, 
			'ras_dashen_custom_secondary_services_highlight_link_' . $card_indx, 
			array(
				'label'				=>	esc_html__( 'Link ', 'ras-dashen' ) . $card_indx,
				'section'			=>	'ras_dashen_front_secondary_services_highlight',
				'settings'			=>	'ras_dashen_custom_secondary_services_highlight_link_' . $card_indx,
				'active_callback'	=>	'ras_dashen_if_secondary_services_highlight_card_custom', 
			)
		)
	);

	// select page
	$wp_customize->add_setting(
		'ras_dashen_secondary_services_highlight_card_page_' . $card_indx,
		array(
			'default'			=>	'',
			'sanitize_callback'	=>	'ras_dashen_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control( 
		'ras_dashen_secondary_services_highlight_card_page_' . $card_indx, 
		array(
            'label'				=>	esc_html__( 'Page ', 'ras-dashen' ) . $card_indx,
			'type'				=>	'dropdown-pages',
			'section'			=>	'ras_dashen_front_secondary_services_highlight',
			'settings'			=>	'ras_dashen_secondary_services_highlight_card_page_' . $card_indx,
			'active_callback'	=>	'ras_dashen_is_secondary_services_cards_type_page',
    	) 
	);

	// Add image for page cards
	$wp_customize->add_setting(
		'ras_dashen_secondary_services_highlight_img_page_' . $card_indx, 
		array(
			'transport'			=>	'refresh',
			'sanitize_callback' =>	'ras_dashen_sanitize_image',	
		)
	);

	$wp_customize->add_control( 
		new WP_Customize_Cropped_Image_Control(
			$wp_customize, 
			'ras_dashen_secondary_services_highlight_img_page_' . $card_indx, 
				array(
					'label'				=> 	esc_html__( 'Custom Image ', 'ras-dashen' ) . $card_indx,
					'description'		=> 	esc_html__( 'Select and upload a custom image for the page card.', 'ras-dashen' ),
					'section'			=> 	'ras_dashen_front_secondary_services_highlight',
					'settings'			=>	'ras_dashen_secondary_services_highlight_img_page_' . $card_indx,
					'active_callback'	=>	'ras_dashen_is_secondary_services_cards_type_page',
					'width'				=>	600,
					'height'			=>	450,
				)
		)
	);

	// select post
	$wp_customize->add_setting(
		'ras_dashen_secondary_services_highlight_card_post_' . $card_indx, 
		array(
			'default'			=>	'',
			'sanitize_callback'	=>	'absint',
		)
	);
	$wp_customize->add_control(
		new Ras_Dashen_Post_Dropdown_Custom_Control(
			$wp_customize, 
			'ras_dashen_secondary_services_highlight_card_post_' . $card_indx, 
			array(
				'label'				=>	esc_html__( 'Post ', 'ras-dashen' ) . $card_indx,
				'section'			=>	'ras_dashen_front_secondary_services_highlight',
				'settings'			=>	'ras_dashen_secondary_services_highlight_card_post_' . $card_indx, 
				'active_callback'	=>	'ras_dashen_is_secondary_services_cards_type_post',
			)
		)
		
	);

	

	// Custom separator for summary cards
	$wp_customize->add_setting(
	'ras_dashen_secondary_services_highlight_cards_custom_separator_' . $card_indx, 
		array(
			'sanitize_callback'	=>	'ras_dashen_sanitize_html'
		)
	);
	$wp_customize->add_control( 
		new Ras_Dashen_Separator_Custom_Control(
			$wp_customize, 
			'ras_dashen_secondary_services_highlight_cards_custom_separator_' . $card_indx,
				array(
					'type'	            =>	'ras-dashen-separator',
					'section'	        =>	'ras_dashen_front_secondary_services_highlight',
					'settings'	        =>	'ras_dashen_secondary_services_highlight_cards_custom_separator_' . $card_indx,
					'active_callback'	=>	'ras_dashen_if_secondary_services_highlight_content_type_selected',
				)
		)
	);

	$card_indx++;

endwhile;

//---------------------secondary services section style customizers-----------------------------

// section background color
$wp_customize->add_setting( 
	'ras_dashen_secondary_services_section_bg_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_secondary_services_section_bg_color', 
		array(
			'label'				=> 	esc_html__( 'Section Background Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_secondary_services_highlight',
			'settings'			=> 	'ras_dashen_secondary_services_section_bg_color',
			'active_callback'	=>	'ras_dashen_if_secondary_services_highlight_section_enabled',
		) 
	) 
);

// section header color
$wp_customize->add_setting( 
	'ras_dashen_secondary_services_section_hdng_color', 
	array(
		'default'			=>	'#47738c',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_secondary_services_section_hdng_color', 
		array(
			'label'				=> 	esc_html__( 'Section Heading Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_secondary_services_highlight',
			'settings'			=> 	'ras_dashen_secondary_services_section_hdng_color',
			'active_callback'	=>	'ras_dashen_if_secondary_services_highlight_section_enabled',
		) 
	) 
);

// cards background color
$wp_customize->add_setting( 
	'ras_dashen_secondary_services_cards_bg_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_secondary_services_cards_bg_color', 
		array(
			'label'				=> 	esc_html__( 'Cards Background Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_secondary_services_highlight',
			'settings'			=> 	'ras_dashen_secondary_services_cards_bg_color',
			'active_callback'	=> 	'ras_dashen_if_secondary_services_highlight_content_type_selected',
		) 
	) 
);

// cards title color
$wp_customize->add_setting( 
	'ras_dashen_secondary_services_cards_title_color', 
	array(
		'default'			=>	'#0091c8',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_secondary_services_cards_title_color', 
		array(
			'label'				=> 	esc_html__( 'Cards title Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_secondary_services_highlight',
			'settings'			=> 	'ras_dashen_secondary_services_cards_title_color',
			'active_callback'	=> 	'ras_dashen_if_secondary_services_highlight_content_type_selected',
		) 
	) 
);

// cards text color
$wp_customize->add_setting( 
	'ras_dashen_secondary_services_cards_text_color', 
	array(
		'default'			=>	'#47738c',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_secondary_services_cards_text_color', 
		array(
			'label'				=> 	esc_html__( 'Cards text Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_secondary_services_highlight',
			'settings'			=> 	'ras_dashen_secondary_services_cards_text_color',
			'active_callback'	=> 	'ras_dashen_if_secondary_services_highlight_content_type_selected',
		) 
	) 
);

// button background color
$wp_customize->add_setting( 
	'ras_dashen_secondary_services_btn_bg_color', 
	array(
		'default'			=>	'#0091c8',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_secondary_services_btn_bg_color', 
		array(
			'label'				=> 	esc_html__( 'Button Background Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_secondary_services_highlight',
			'settings'			=> 	'ras_dashen_secondary_services_btn_bg_color',
			'active_callback'	=> 	'ras_dashen_if_secondary_services_highlight_content_type_selected',
		) 
	) 
);

// button link color
$wp_customize->add_setting( 
	'ras_dashen_secondary_services_btn_link_color', 
	array(
		'default'			=>	'#ecfefe',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_secondary_services_btn_link_color', 
		array(
			'label'				=> 	esc_html__( 'Button link Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_secondary_services_highlight',
			'settings'			=> 	'ras_dashen_secondary_services_btn_link_color',
			'active_callback'	=> 	'ras_dashen_if_secondary_services_highlight_content_type_selected',
		) 
	) 
);