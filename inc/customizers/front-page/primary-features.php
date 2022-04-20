<?php
/**
* Functions for customizing different primary feature of company on frontpage
*
* 
* @package Ras_Dashen
* 
* @since 1.0.0
*/
// Get defaults for theme customizer
$default = ras_dashen_get_default_mods();


/*
* Section for frontpage primary_features highlight
*/
$wp_customize->add_section(
	'ras_dashen_front_primary_feature_highlight',
	array(
		'title'		=>	esc_html__( 'Primary Feaures', 'ras-dashen' ),
		'panel'		=> 'ras_dashen_frontpage_panel',
	)
);
/*
* enabling and Setting contents for frontpage primary_features highlight
*/
$wp_customize->add_setting(
	'ras_dashen_front_primary_feature_section_enabled',
	array(
		'default'			=>	0,
		'sanitize_callback'	=>	'ras_dashen_sanitize_checkbox',
	)
);


$wp_customize->add_control( 
	new WP_Customize_Control(
		$wp_customize,
		'ras_dashen_front_primary_feature_section_enabled',
		array(
			'section'		=>	'ras_dashen_front_primary_feature_highlight',
			'label'			=>	esc_html__( 'Enable Section', 'ras-dashen' ),
			'description' 	=>	esc_html__( 'Check to display primary features highlight section on frontpage.', 'ras-dashen' ),
			'settings'		=>	'ras_dashen_front_primary_feature_section_enabled',
			'type'			=>	'checkbox',
		)
  	)
);

// section title
$wp_customize->add_setting(
	'ras_dashen_front_primary_feature_section_heading',
	array(
		'default'			=>	$default['ras_dashen_front_primary_feature_section_heading'],
		'sanitize_callback'	=>	'sanitize_text_field',
		'transport'			=>	'postMessage',
	)
);

$wp_customize->add_control( 
	new WP_Customize_Control(
		$wp_customize, 
		'ras_dashen_front_primary_feature_section_heading', 
		array(
			'label'				=>	esc_html__( 'Section heading: ', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_primary_feature_highlight',
			'settings'			=>	'ras_dashen_front_primary_feature_section_heading',
			'active_callback'	=>	'ras_dashen_if_primary_feature_section_enabled',
		)
	)
);

/*
* Number of blocks
*/
$wp_customize->add_setting(
	'ras_dashen_primary_feature_num_of_excerpt_blocks',
	array(
		'default'			=>	$default['ras_dashen_primary_feature_num_of_excerpt_blocks'],
		'sanitize_callback'	=>	'ras_dashen_sanitize_number',
		'transport'			=>	'refresh',
	)
);
	
$wp_customize->add_control( 
	new WP_Customize_Control(
		$wp_customize,
		'ras_dashen_primary_feature_num_of_excerpt_blocks',
		array(
			'label'				=>	esc_html__('Number of blocks', 'ras-dashen'),
			'description'		=>	esc_html__('How many excerpt blocks you want to display on this section.', 'ras-dashen'),
			'section'			=>	'ras_dashen_front_primary_feature_highlight',
			'settings'			=>	'ras_dashen_primary_feature_num_of_excerpt_blocks',
			'active_callback'	=>	'ras_dashen_if_primary_feature_section_enabled',
			'type' 				=>	'number',
		)
  	)
);

/*
* select content type to display as summary cards
*/
$wp_customize->add_setting(
	'ras_dashen_primary_feature_highlight_blocks_content_type',
	array(
		'default'			=>	'',
		'sanitize_callback'	=>	'ras_dashen_sanitize_select',
		'transport'			=>	'refresh', 
	)
);

$wp_customize->add_control( 
	new WP_Customize_Control(
		$wp_customize,
		'ras_dashen_primary_feature_highlight_blocks_content_type',
		array(
			'label'				=>	esc_html__( 'Cards post type', 'ras-dashen' ),
			'description' 		=>	esc_html__( 'Select the content type to display on cards', 'ras-dashen' ),
			'section'			=>	'ras_dashen_front_primary_feature_highlight',
			'settings'			=>	'ras_dashen_primary_feature_highlight_blocks_content_type',
			'active_callback'	=>	'ras_dashen_if_primary_feature_section_enabled',
			'type'				=>	'select',
			'choices'			=>	array(
				''					=>	esc_html__( 'Select type', 'ras-dashen' ),
				'post'				=>	esc_html__( 'Post', 'ras-dashen' ),
				'page'				=>	esc_html__( 'Page', 'ras-dashen' ),
				'custom_card'		=>	esc_html__( 'Custom', 'ras-dashen' ),
			)
		)
  	)
);


/*
* select and customize primary features blocks based on selected content post type
*/
$num_of_primary_features = absint( get_theme_mod( 'ras_dashen_primary_feature_num_of_excerpt_blocks', $default['ras_dashen_primary_feature_num_of_excerpt_blocks'] ) );

$ftrd = 0;

while ( $ftrd < $num_of_primary_features ) :
	
	// summary cards title
	$wp_customize->add_setting(
		'ras_dashen_custom_primary_feature_highlight_block_title_' . $ftrd,
			array(
				'default'			=>	$default['ras_dashen_custom_primary_feature_highlight_block_title'],
				'transport'			=>	'refresh',
				'sanitize_callback'	=>	'sanitize_text_field',
			)
		);

	$wp_customize->add_control( 
		new WP_Customize_Control(
			$wp_customize, 
			'ras_dashen_custom_primary_feature_highlight_block_title_' . $ftrd, 
			array(
				'label'				=>	esc_html__( 'Custom title ', 'ras-dashen' ) . $ftrd,
				'section'			=>	'ras_dashen_front_primary_feature_highlight',
				'settings'			=>	'ras_dashen_custom_primary_feature_highlight_block_title_' . $ftrd, 
				'active_callback'	=>	'ras_dashen_if_primary_feature_highlight_block_custom',
			)
		)
	);

	// summary cards body text
	$wp_customize->add_setting(
		'ras_dashen_custom_primary_feature_highlight_block_description_' . $ftrd,
			array(
				'default'			=>	$default['ras_dashen_custom_primary_feature_highlight_block_description'],
				'transport'			=>	'refresh',
				'sanitize_callback'	=>	'sanitize_textarea_field',
			)
		);
	$wp_customize->add_control( 
		new WP_Customize_Control(
			$wp_customize, 
			'ras_dashen_custom_primary_feature_highlight_block_description_' . $ftrd, 
			array(
				'label'				=>	esc_html__( 'Custom description ', 'ras-dashen' ) . $ftrd,
				'section'			=>	'ras_dashen_front_primary_feature_highlight',
				'type'				=>	'textarea',
				'settings'			=>	'ras_dashen_custom_primary_feature_highlight_block_description_' . $ftrd,
				'active_callback'	=>	'ras_dashen_if_primary_feature_highlight_block_custom',
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
		'ras_dashen_primary_feature_highlight_img_custom_card_' . $ftrd, 
		array(
			'transport'			=>	'refresh',
			'sanitize_callback' =>	'ras_dashen_sanitize_image',	
		)
	);

	$wp_customize->add_control( 
		new WP_Customize_Cropped_Image_Control(
			$wp_customize, 
			'ras_dashen_primary_feature_highlight_img_custom_card_' . $ftrd, 
				array(
					'label'				=> 	esc_html__( 'Custom Image ', 'ras-dashen' ) . $ftrd,
					'description'		=> 	esc_html__( 'Select and upload a custom image for the custom card.', 'ras-dashen' ),
					'section'			=> 	'ras_dashen_front_primary_feature_highlight',
					'settings'			=>	'ras_dashen_primary_feature_highlight_img_custom_card_' . $ftrd,
					'active_callback'	=>	'ras_dashen_if_primary_feature_highlight_block_custom',
					'width'				=>	600,
					'height'			=>	450,
				)
		)
	);

	// summary cards link to
	$wp_customize->add_setting(
		'ras_dashen_custom_primary_feature_highlight_link_' . $ftrd,
			array(
				'default'			=>	'#',
				'sanitize_callback'	=>	'esc_url_raw',
			)
		);
	$wp_customize->add_control( 
		new WP_Customize_Control(
			$wp_customize, 
			'ras_dashen_custom_primary_feature_highlight_link_' . $ftrd, 
			array(
				'label'				=>	esc_html__( 'Link ', 'ras-dashen' ) . $ftrd,
				'section'			=>	'ras_dashen_front_primary_feature_highlight',
				'settings'			=>	'ras_dashen_custom_primary_feature_highlight_link_' . $ftrd,
				'active_callback'	=>	'ras_dashen_if_primary_feature_highlight_block_custom', 
			)
		)
	);

	// select page
	$wp_customize->add_setting(
		'ras_dashen_primary_feature_highlight_block_page_' . $ftrd,
		array(
			'default'			=>	'1',
			'sanitize_callback'	=>	'ras_dashen_sanitize_dropdown_pages'
		)
	);

	$wp_customize->add_control( 
		'ras_dashen_primary_feature_highlight_block_page_' . $ftrd, 
		array(
            'label'				=>	esc_html__( 'Page ', 'ras-dashen' ) . $ftrd,
			'type'  			=> 	'dropdown-pages',
			'section'			=>	'ras_dashen_front_primary_feature_highlight',
			'settings'			=>	'ras_dashen_primary_feature_highlight_block_page_' . $ftrd,
			'active_callback'	=>	'ras_dashen_is_primary_feature_cards_type_page',
    	) 
	);
	
	// Add image for page cards
	$wp_customize->add_setting(
		'ras_dashen_primary_feature_highlight_img_page_' . $ftrd, 
		array(
			'transport'			=>	'refresh',
			'sanitize_callback' =>	'ras_dashen_sanitize_image',	
		)
	);

	$wp_customize->add_control( 
		new WP_Customize_Cropped_Image_Control(
			$wp_customize, 
			'ras_dashen_primary_feature_highlight_img_page_' . $ftrd, 
				array(
					'label'				=> 	esc_html__( 'Custom Image ', 'ras-dashen' ) . $ftrd,
					'description'		=> 	esc_html__( 'Select and upload a custom image for the page card.', 'ras-dashen' ),
					'section'			=> 	'ras_dashen_front_primary_feature_highlight',
					'settings'			=>	'ras_dashen_primary_feature_highlight_img_page_' . $ftrd,
					'active_callback'	=>	'ras_dashen_is_primary_feature_cards_type_page',
					'width'				=>	600,
					'height'			=>	450,
				)
		)
	);

	// select post
	$wp_customize->add_setting(
		'ras_dashen_primary_feature_highlight_block_post_' . $ftrd, 
		array(
			'default'			=>	'',
			'sanitize_callback'	=>	'absint',
		)
	);
	$wp_customize->add_control(
		new Ras_Dashen_Post_Dropdown_Custom_Control(
			$wp_customize, 
			'ras_dashen_primary_feature_highlight_block_post_' . $ftrd, 
			array(
				'label'				=>	esc_html__('Post ', 'ras-dashen') . $ftrd,
				'section'			=>	'ras_dashen_front_primary_feature_highlight',
				'settings'			=>	'ras_dashen_primary_feature_highlight_block_post_' . $ftrd, 
				'active_callback'	=>	'ras_dashen_is_primary_feature_cards_type_post',   
			)
		)
		
	);

	// Custom separator of customizer controls
	$wp_customize->add_setting(
	'ras_dashen_primary_feature_highlight_blocks_custom_separator_' . $ftrd, 
		array(
			'sanitize_callback'	=>	'ras_dashen_sanitize_html'
		)
	);
	$wp_customize->add_control( 
		new Ras_Dashen_Separator_Custom_Control(
			$wp_customize, 
			'ras_dashen_primary_feature_highlight_blocks_custom_separator_' . $ftrd,
				array(
					'type'	            =>	'ras-dashen-separator',
					'section'	        =>	'ras_dashen_front_primary_feature_highlight',
					'settings'	        =>	'ras_dashen_primary_feature_highlight_blocks_custom_separator_' . $ftrd,
					'active_callback'	=>	'ras_dashen_if_primary_feature_highlight_content_type_selected',
				)
		)
	);

	$ftrd++;

endwhile;

//---------------------primary_features section style customizers-----------------------------

// section background color
$wp_customize->add_setting( 
	'ras_dashen_primary_feature_section_bg_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_primary_feature_section_bg_color', 
		array(
			'label'				=> 	esc_html__( 'Section Background Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_primary_feature_highlight',
			'settings'			=> 	'ras_dashen_primary_feature_section_bg_color',
			'active_callback'	=>	'ras_dashen_if_primary_feature_section_enabled',
		) 
	) 
);

// section header color
$wp_customize->add_setting( 
	'ras_dashen_primary_feature_section_hdng_color', 
	array(
		'default'			=>	'#47738c',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_primary_feature_section_hdng_color', 
		array(
			'label'				=> 	esc_html__( 'Section Heading Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_primary_feature_highlight',
			'settings'			=> 	'ras_dashen_primary_feature_section_hdng_color',
			'active_callback'	=>	'ras_dashen_if_primary_feature_section_enabled',
		) 
	) 
);

// cards background color
$wp_customize->add_setting( 
	'ras_dashen_primary_feature_excerpt_blocks_bg_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_primary_feature_excerpt_blocks_bg_color', 
		array(
			'label'				=> 	esc_html__( 'Excerpt Background Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_primary_feature_highlight',
			'settings'			=> 	'ras_dashen_primary_feature_excerpt_blocks_bg_color',
			'active_callback'	=> 	'ras_dashen_if_primary_feature_highlight_content_type_selected',
		) 
	) 
);

// cards title color
$wp_customize->add_setting( 
	'ras_dashen_primary_feature_excerpt_blocks_title_color', 
	array(
		'default'			=>	'#0091c8',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_primary_feature_excerpt_blocks_title_color', 
		array(
			'label'				=> 	esc_html__( 'Excerpt title Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_primary_feature_highlight',
			'settings'			=> 	'ras_dashen_primary_feature_excerpt_blocks_title_color',
			'active_callback'	=> 	'ras_dashen_if_primary_feature_highlight_content_type_selected',
		) 
	) 
);

// cards text color
$wp_customize->add_setting( 
	'ras_dashen_primary_feature_excerpt_blocks_text_color', 
	array(
		'default'			=>	'#47738c',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_primary_feature_excerpt_blocks_text_color', 
		array(
			'label'				=> 	esc_html__( 'Excerpt text Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_primary_feature_highlight',
			'settings'			=> 	'ras_dashen_primary_feature_excerpt_blocks_text_color',
			'active_callback'	=> 	'ras_dashen_if_primary_feature_highlight_content_type_selected',
		) 
	) 
);

// button background color
$wp_customize->add_setting( 
	'ras_dashen_primary_feature_btn_bg_color', 
	array(
		'default'			=>	'#0091c8',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_primary_feature_btn_bg_color', 
		array(
			'label'				=> 	esc_html__( 'Button Background Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_primary_feature_highlight',
			'settings'			=> 	'ras_dashen_primary_feature_btn_bg_color',
			'active_callback'	=> 	'ras_dashen_if_primary_feature_highlight_content_type_selected',
		) 
	) 
);

// button link color
$wp_customize->add_setting( 
	'ras_dashen_primary_feature_btn_link_color', 
	array(
		'default'			=>	'#ecfefe',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_primary_feature_btn_link_color', 
		array(
			'label'				=> 	esc_html__( 'Button link Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_primary_feature_highlight',
			'settings'			=> 	'ras_dashen_primary_feature_btn_link_color',
			'active_callback'	=> 	'ras_dashen_if_primary_feature_highlight_content_type_selected',
		) 
	) 
);