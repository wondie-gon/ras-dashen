<?php
/**
* Functions for customizing frontpage about site introduction
*
* 
* @package Ras_Dashen
* 
* @since 1.0.0
*/
// Get defaults for theme customizer
$default = ras_dashen_get_default_mods();


/*
* Section for frontpage about site
*/
$wp_customize->add_section(
	'ras_dashen_front_about_site',
	array(
		'title'		=>	esc_html__( 'About Site', 'ras-dashen' ),
		'panel'		=> 'ras_dashen_frontpage_panel',
	)
);
/*
* enabling and Setting contents for frontpage about_site
*/
$wp_customize->add_setting(
	'ras_dashen_front_about_site_enabled',
	array(
		'default'			=>	0,
		'sanitize_callback'	=>	'ras_dashen_sanitize_checkbox',
		'transport'			=>	'refresh',
	)
);


$wp_customize->add_control( 
	new WP_Customize_Control(
	$wp_customize,
	'ras_dashen_front_about_site_enabled',
		array(
			'label'			=>	esc_html__( 'Enable Section', 'ras-dashen' ),
			'description' 	=>	esc_html__( 'Check to display about site section on frontpage.', 'ras-dashen' ),
			'section'		=>	'ras_dashen_front_about_site',
			'settings'		=>	'ras_dashen_front_about_site_enabled',
			'type'			=>	'checkbox',
		)
  	)
);

/*
* Number of blocks
*/
$wp_customize->add_setting(
	'ras_dashen_num_of_about_site_excerpt_blocks',
		array(
			'default'			=>	$default['ras_dashen_num_of_about_site_excerpt_blocks'],
			'transport'			=>	'refresh',
			'sanitize_callback'	=>	'ras_dashen_sanitize_number',
		)
	);
	
$wp_customize->add_control( 
	new WP_Customize_Control(
		$wp_customize,
		'ras_dashen_num_of_about_site_excerpt_blocks',
		array(
			'label'				=>	esc_html__('Number of blocks', 'ras-dashen'),
			'description'		=>	esc_html__('How many excerpt blocks you want to display on this section.', 'ras-dashen'),
			'section'			=>	'ras_dashen_front_about_site',
			'settings'			=>	'ras_dashen_num_of_about_site_excerpt_blocks',
			'active_callback'	=>	'ras_dashen_if_about_site_section_enabled',
			'type' 				=>	'number',
		)
  	)
);

/*
* select post types to display as excerpt blocks
*/
$wp_customize->add_setting(
	'ras_dashen_about_site_excerpt_blocks_content_type',
	array(
		'default'			=>	'',
		'sanitize_callback'	=>	'ras_dashen_sanitize_select',
		'transport'			=>	'refresh', 
	)
);


$wp_customize->add_control( 
	new WP_Customize_Control(
		$wp_customize,
		'ras_dashen_about_site_excerpt_blocks_content_type',
		array(
			'label'				=>	esc_html__( 'Cards post type', 'ras-dashen' ),
			'description' 		=>	esc_html__( 'Select the content type to display on excerpt blocks', 'ras-dashen' ),
			'section'			=>	'ras_dashen_front_about_site',
			'settings'			=>	'ras_dashen_about_site_excerpt_blocks_content_type',
			'active_callback'	=>	'ras_dashen_if_about_site_section_enabled',
			'type'				=>	'select',
			'choices'			=>	array(
				''						=>	esc_html__( 'Select type', 'ras-dashen' ),
				'post'					=>	esc_html__( 'Post', 'ras-dashen' ),
				'page'					=>	esc_html__( 'Page', 'ras-dashen' ),
				'custom_cards'			=>	esc_html__( 'Custom', 'ras-dashen' ),
			)
		)
  	)
);

/*
* select and customize excerpt blocks based on selected content post type
*/
$about_cards_num = absint( get_theme_mod( 'ras_dashen_num_of_about_site_excerpt_blocks', $default['ras_dashen_num_of_about_site_excerpt_blocks'] ) );

for ( $sc = 0; $sc < $about_cards_num; $sc++ ) {

	// if ( 'custom_cards' === $card_post_type ) {} else if ( 'page' === $card_post_type ) {} else {} // end if 

	// excerpt blocks title
	$wp_customize->add_setting(
		'ras_dashen_custom_about_site_excerpt_block_title_' . $sc,
		array(
			'default'			=>	$default['ras_dashen_custom_about_site_excerpt_block_title'],
			'transport'			=>	'refresh',
			'sanitize_callback'	=>	'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 
		new WP_Customize_Control(
			$wp_customize, 
			'ras_dashen_custom_about_site_excerpt_block_title_' . $sc, 
			array(
				'label'				=>	esc_html__( 'Custom title ', 'ras-dashen' ) . $sc,
				'section'			=> 	'ras_dashen_front_about_site',
				'settings'			=>	'ras_dashen_custom_about_site_excerpt_block_title_' . $sc,
				'active_callback'	=>	'ras_dashen_if_about_site_excerpt_block_custom',
			)
		)
	);

	// excerpt blocks body text
	$wp_customize->add_setting(
		'ras_dashen_custom_about_site_excerpt_block_description_' . $sc,
		array(
			'default'			=>	$default['ras_dashen_custom_about_site_excerpt_block_description'],
			'transport'			=>	'refresh',
			'sanitize_callback'	=>	'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Control(
			$wp_customize, 
			'ras_dashen_custom_about_site_excerpt_block_description_' . $sc, 
			array(
				'label'				=>	esc_html__( 'Custom description ', 'ras-dashen' ) . $sc,
				'type'				=>	'textarea',
				'section'			=> 	'ras_dashen_front_about_site',
				'settings'			=>	'ras_dashen_custom_about_site_excerpt_block_description_' . $sc,
				'active_callback'	=>	'ras_dashen_if_about_site_excerpt_block_custom',
			)
		)
	);

	// Add custom image for custom cards
	$wp_customize->add_setting(
		'ras_dashen_about_site_img_custom_excerpt_block_' . $sc, 
		array(
			'default'			=>	'',
			'transport'			=>	'refresh',
			'sanitize_callback' =>	'absint',	
		)
	);

	$wp_customize->add_control( 
		new WP_Customize_Cropped_Image_Control(
			$wp_customize, 
			'ras_dashen_about_site_img_custom_excerpt_block_' . $sc, 
				array(
					'label'				=> 	esc_html__( 'Custom Image ', 'ras-dashen' ) . $sc,
					'description'		=> 	esc_html__( 'Select and upload a custom image for the custom card.', 'ras-dashen' ),
					'section'			=> 	'ras_dashen_front_about_site',
					'settings'			=>	'ras_dashen_about_site_img_custom_excerpt_block_' . $sc,
					'active_callback'	=>	'ras_dashen_if_about_site_excerpt_block_custom',
					'width'				=>	600,
					'height'			=>	450,
				)
		)
	);

	// excerpt blocks link to
	$wp_customize->add_setting(
		'ras_dashen_custom_about_site_link_' . $sc,
		array(
			'default'			=>	'#',
			'transport'			=>	'refresh',
			'sanitize_callback'	=>	'esc_url_raw',
		)
	);

	$wp_customize->add_control( 
		new WP_Customize_Control(
			$wp_customize, 
			'ras_dashen_custom_about_site_link_' . $sc, 
			array(
				'label'				=>	esc_html__( 'Link ', 'ras-dashen' ) . $sc,
				'section'			=> 	'ras_dashen_front_about_site',
				'settings'			=>	'ras_dashen_custom_about_site_link_' . $sc,
				'active_callback'	=>	'ras_dashen_if_about_site_excerpt_block_custom',
			)
		)
	);

	// select page
	$wp_customize->add_setting(
		'ras_dashen_about_site_excerpt_block_page_' . $sc,
		array(
			'default'			=>	'',
			'sanitize_callback'	=>	'ras_dashen_sanitize_dropdown_pages', 
			'transport'			=>	'refresh',
		)
	);

	$wp_customize->add_control( 
		'ras_dashen_about_site_excerpt_block_page_' . $sc, 
		array(
            'label'				=>	esc_html__('Page ', 'ras-dashen') . $sc,
			'type'				=>	'dropdown-pages',
			'section'			=>	'ras_dashen_front_about_site',
			'settings'			=>	'ras_dashen_about_site_excerpt_block_page_' . $sc,
			'active_callback'	=>	'ras_dashen_if_about_site_excerpt_block_page',
    	) 
	);

	// Add custom image for page cards
	$wp_customize->add_setting(
		'ras_dashen_about_site_img_page_' . $sc, 
		array(
			'transport'			=>	'refresh',
			'sanitize_callback' =>	'absint',	
		)
	);

	$wp_customize->add_control( 
		new WP_Customize_Cropped_Image_Control(
			$wp_customize, 
			'ras_dashen_about_site_img_page_' . $sc, 
				array(
					'label'				=> 	esc_html__( 'Custom Image ', 'ras-dashen' ) . $sc,
					'description'		=> 	esc_html__( 'Select and upload a custom image for the page card.', 'ras-dashen' ),
					'section'			=> 	'ras_dashen_front_about_site',
					'settings'			=>	'ras_dashen_about_site_img_page_' . $sc,
					'active_callback'	=>	'ras_dashen_if_about_site_excerpt_block_page',
					'width'				=>	600,
					'height'			=>	450,
				)
		)
	);


	// select post
	$wp_customize->add_setting(
		'ras_dashen_about_site_excerpt_block_post_' . $sc,
			array(
				'default'			=>	'',
				'sanitize_callback'	=>	'absint',
			)
		);
	$wp_customize->add_control(
		new Ras_Dashen_Post_Dropdown_Custom_Control(
			$wp_customize, 
			'ras_dashen_about_site_excerpt_block_post_' . $sc,
			array(
				'label'				=>	esc_html__('Post ', 'ras-dashen') . $sc,
				'section'			=>	'ras_dashen_front_about_site',
				'settings'			=>	'ras_dashen_about_site_excerpt_block_post_' . $sc,
				'active_callback'	=>	'ras_dashen_if_about_site_excerpt_block_post',
			)
		)
		
	);

	// Custom separator for excerpt blocks
	$wp_customize->add_setting(
	'ras_dashen_about_site_excerpt_blocks_custom_separator_' . $sc, 
		array(
			'sanitize_callback'	=>	'ras_dashen_sanitize_html'
		)
	);
	$wp_customize->add_control( 
		new Ras_Dashen_Separator_Custom_Control(
			$wp_customize, 
			'ras_dashen_about_site_excerpt_blocks_custom_separator_' . $sc,
				array(
					'type'	            =>	'ras-dashen-separator',
					'section'	        =>	'ras_dashen_front_about_site',
					'settings'	        =>	'ras_dashen_about_site_excerpt_blocks_custom_separator_' . $sc,
					'active_callback'	=>	'ras_dashen_if_about_site_excerpt_block_content_type_selected',
				)
		)
	);
	
}


//---------------------about_site section style customizers-----------------------------

// section background color
$wp_customize->add_setting( 
	'ras_dashen_front_about_site_section_bg_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_front_about_site_section_bg_color', 
		array(
			'label'				=> 	esc_html__( 'Section Background Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_about_site',
			'settings'			=> 	'ras_dashen_front_about_site_section_bg_color',
			'active_callback'	=>	'ras_dashen_if_about_site_excerpt_block_content_type_selected',
		) 
	) 
);


// cards background color
$wp_customize->add_setting( 
	'ras_dashen_about_site_excerpt_blocks_bg_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_about_site_excerpt_blocks_bg_color', 
		array(
			'label'				=> 	esc_html__( 'Excerpt Background Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_about_site',
			'settings'			=> 	'ras_dashen_about_site_excerpt_blocks_bg_color',
			'active_callback'	=> 	'ras_dashen_if_about_site_excerpt_block_content_type_selected',
		) 
	) 
);

// cards title color
$wp_customize->add_setting( 
	'ras_dashen_about_site_excerpt_blocks_title_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_about_site_excerpt_blocks_title_color', 
		array(
			'label'				=> 	esc_html__( 'Excerpt title Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_about_site',
			'settings'			=> 	'ras_dashen_about_site_excerpt_blocks_title_color',
			'active_callback'	=> 	'ras_dashen_if_about_site_excerpt_block_content_type_selected',
		) 
	) 
);

// cards text color
$wp_customize->add_setting( 
	'ras_dashen_about_site_excerpt_blocks_text_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_about_site_excerpt_blocks_text_color', 
		array(
			'label'				=> 	esc_html__( 'Excerpt text Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_about_site',
			'settings'			=> 	'ras_dashen_about_site_excerpt_blocks_text_color',
			'active_callback'	=> 	'ras_dashen_if_about_site_excerpt_block_content_type_selected',
		) 
	) 
);

// button background color
$wp_customize->add_setting( 
	'ras_dashen_about_site_btn_bg_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_about_site_btn_bg_color', 
		array(
			'label'				=> 	esc_html__( 'Button Background Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_about_site',
			'settings'			=> 	'ras_dashen_about_site_btn_bg_color',
			'active_callback'	=> 	'ras_dashen_if_about_site_excerpt_block_content_type_selected',
		) 
	) 
);

// button link color
$wp_customize->add_setting( 
	'ras_dashen_about_site_btn_link_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_about_site_btn_link_color', 
		array(
			'label'				=> 	esc_html__( 'Button link Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_about_site',
			'settings'			=> 	'ras_dashen_about_site_btn_link_color',
			'active_callback'	=> 	'ras_dashen_if_about_site_excerpt_block_content_type_selected',
		) 
	) 
);
