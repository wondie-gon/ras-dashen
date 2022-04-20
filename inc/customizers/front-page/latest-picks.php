<?php
/**
* Functions for customizing frontpage latest picks or processes of the company
*
* 
* @package Ras_Dashen
* 
* @since 1.0.0
*/
// Get defaults for theme customizer
$default = ras_dashen_get_default_mods();


/*
* Section for frontpage latest_picks
*/
$wp_customize->add_section(
	'ras_dashen_front_latest_picks',
		array(
			'title'		=>	esc_html__( 'Latest picks', 'ras-dashen' ),
			'panel'		=> 'ras_dashen_frontpage_panel',
		)
	);
/*
* enabling and Setting contents for frontpage latest picks
*/
$wp_customize->add_setting(
	'ras_dashen_front_latest_picks_enabled',
		array(
			'default'			=>	0,
			'sanitize_callback'	=>	'ras_dashen_sanitize_checkbox',
		)
	);


$wp_customize->add_control( 
	new WP_Customize_Control(
	$wp_customize,
	'ras_dashen_front_latest_picks_enabled',
		array(
			'section'		=>	'ras_dashen_front_latest_picks',
			'label'			=>	esc_html__( 'Enable Section', 'ras-dashen' ),
			'description' 	=>	esc_html__( 'Check to display latest picks section on frontpage.', 'ras-dashen' ),
			'settings'		=>	'ras_dashen_front_latest_picks_enabled',
			'type'			=>	'checkbox',
		)
  	)
);

// section title
$wp_customize->add_setting(
	'ras_dashen_front_latest_picks_section_heading',
	array(
		'default'			=>	$default['ras_dashen_front_latest_picks_section_heading'],
		'sanitize_callback'	=>	'sanitize_text_field',
		'transport'			=>	'postMessage',
	)
);

$wp_customize->add_control( 
	new WP_Customize_Control(
		$wp_customize, 
		'ras_dashen_front_latest_picks_section_heading', 
		array(
			'label'				=>	esc_html__( 'Section heading: ', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_latest_picks',
			'settings'			=>	'ras_dashen_front_latest_picks_section_heading',
			'active_callback'	=>	'ras_dashen_if_latest_picks_section_enabled',
		)
	)
);

/*
* Number of blocks
*/
$wp_customize->add_setting(
	'ras_dashen_num_of_latest_pick_excerpt_blocks',
		array(
			'default'			=>	$default['ras_dashen_num_of_latest_pick_excerpt_blocks'],
			'sanitize_callback'	=>	'ras_dashen_sanitize_number',
			'transport'			=>	'refresh',
		)
	);
	
$wp_customize->add_control( 
	new WP_Customize_Control(
		$wp_customize,
		'ras_dashen_num_of_latest_pick_excerpt_blocks',
		array(
			'label'				=>	esc_html__('Number of blocks', 'ras-dashen'),
			'description'		=>	esc_html__('How many excerpt blocks you want to display on this section.', 'ras-dashen'),
			'section'			=>	'ras_dashen_front_latest_picks',
			'settings'			=>	'ras_dashen_num_of_latest_pick_excerpt_blocks',
			'active_callback'	=>	'ras_dashen_if_latest_picks_section_enabled',
			'type' 				=>	'number',
		)
  	)
);


/*
* select latest picks posts for the number of posts
* to show
*/
$num_of_latest_picks = absint( get_theme_mod( 'ras_dashen_num_of_latest_pick_excerpt_blocks', $default['ras_dashen_num_of_latest_pick_excerpt_blocks'] ) );

$pst = 0;

while ( $pst < $num_of_latest_picks ) :

	// select post
	$wp_customize->add_setting(
		'ras_dashen_latest_pick_block_post_' . $pst, 
			array(
				'default'			=>	'',
				'sanitize_callback'	=>	'absint',
				'transport'			=>	'refresh',
			)
		);
	$wp_customize->add_control(
		new Ras_Dashen_Post_Dropdown_Custom_Control(
			$wp_customize, 
			'ras_dashen_latest_pick_block_post_' . $pst, 
			array(
				'label'				=>	esc_html__('Post ', 'ras-dashen') . $pst,
				'section'			=>	'ras_dashen_front_latest_picks',
				'settings'			=>	'ras_dashen_latest_pick_block_post_' . $pst,
				'active_callback'	=>	'ras_dashen_if_latest_picks_section_enabled', 
			)
		)
		
	);

	// Custom separator for excerpt blocks
	$wp_customize->add_setting(
	'ras_dashen_latest_pick_cards_custom_separator_' . $pst, 
		array(
			'sanitize_callback'	=>	'ras_dashen_sanitize_html'
		)
	);
	$wp_customize->add_control( 
		new Ras_Dashen_Separator_Custom_Control(
			$wp_customize, 
			'ras_dashen_latest_pick_cards_custom_separator_' . $pst,
				array(
					'type'	            =>	'ras-dashen-separator',
					'section'	        =>	'ras_dashen_front_latest_picks',
					'settings'	        =>	'ras_dashen_latest_pick_cards_custom_separator_' . $pst,
					'active_callback'	=>	'ras_dashen_if_latest_picks_section_enabled',
				)
		)
	);

	$pst++;

endwhile;

//---------------------latest_picks section style customizers-----------------------------

// section background color
$wp_customize->add_setting( 
	'ras_dashen_latest_picks_section_bg_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_latest_picks_section_bg_color', 
		array(
			'label'				=> 	esc_html__( 'Section Background Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_latest_picks',
			'settings'			=> 	'ras_dashen_latest_picks_section_bg_color',
			'active_callback'	=>	'ras_dashen_if_latest_picks_section_enabled',
		) 
	) 
);

// section header color
$wp_customize->add_setting( 
	'ras_dashen_latest_picks_section_hdng_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_latest_picks_section_hdng_color', 
		array(
			'label'				=> 	esc_html__( 'Section Heading Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_latest_picks',
			'settings'			=> 	'ras_dashen_latest_picks_section_hdng_color',
			'active_callback'	=>	'ras_dashen_if_latest_picks_section_enabled',
		) 
	) 
);

// cards title color
$wp_customize->add_setting( 
	'ras_dashen_latest_picks_excerpt_blocks_title_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_latest_picks_excerpt_blocks_title_color', 
		array(
			'label'				=> 	esc_html__( 'Excerpt title Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_latest_picks',
			'settings'			=> 	'ras_dashen_latest_picks_excerpt_blocks_title_color',
			'active_callback'	=> 	'ras_dashen_if_latest_picks_section_enabled',
		) 
	) 
);

// cards text color
$wp_customize->add_setting( 
	'ras_dashen_latest_picks_excerpt_blocks_text_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_latest_picks_excerpt_blocks_text_color', 
		array(
			'label'				=> 	esc_html__( 'Excerpt text Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_latest_picks',
			'settings'			=> 	'ras_dashen_latest_picks_excerpt_blocks_text_color',
			'active_callback'	=> 	'ras_dashen_if_latest_picks_section_enabled',
		) 
	) 
);

// button background color
$wp_customize->add_setting( 
	'ras_dashen_latest_picks_btn_bg_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_latest_picks_btn_bg_color', 
		array(
			'label'				=> 	esc_html__( 'Button Background Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_latest_picks',
			'settings'			=> 	'ras_dashen_latest_picks_btn_bg_color',
			'active_callback'	=> 	'ras_dashen_if_latest_picks_section_enabled',
		) 
	) 
);

// button link color
$wp_customize->add_setting( 
	'ras_dashen_latest_picks_btn_link_color', 
	array(
		'default'			=>	'',
		'transport'			=> 	'postMessage',
		'sanitize_callback'	=> 	'ras_dashen_sanitize_hex_color',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_control( 
		$wp_customize, 
		'ras_dashen_latest_picks_btn_link_color', 
		array(
			'label'				=> 	esc_html__( 'Button link Color', 'ras-dashen' ),
			'section'			=> 	'ras_dashen_front_latest_picks',
			'settings'			=> 	'ras_dashen_latest_picks_btn_link_color',
			'active_callback'	=> 	'ras_dashen_if_latest_picks_section_enabled',
		) 
	) 
);
