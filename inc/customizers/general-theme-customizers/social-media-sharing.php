<?php
/**
 * theme customizer for social media share links
 *
 * @package Ras_Dashen
 * @since 1.0.0 
 */
// Get defaults for theme customizer
$default = ras_dashen_get_default_mods();

// Single post social media sharing 
$wp_customize->add_section(
	'ras_dashen_social_media_sharing_section', 
	array(
		'title'		=>	esc_html__('Share Post on Social Media', 'ras-dashen'),
		'panel'		=>	'ras_dashen_general_options_panel',
		'priority'	=>	20,
	)
);

/* 
* Whether to display social media sharing
*/

$wp_customize->add_setting(
	'enable_ras_dashen_social_media_sharing',
		array(
			'default'	=>	$default['enable_ras_dashen_social_media_sharing'],
			'sanitize_callback'	=>	'ras_dashen_sanitize_checkbox'
		)
	);
$wp_customize->add_control(
	'enable_ras_dashen_social_media_sharing',
	    array(
	        'label' => esc_html__('Enable Social Media Sharing', 'ras-dashen'),
	        'section' => 'ras_dashen_social_media_sharing_section',
	        'type' => 'checkbox',
	    )
	);

/* 
* Check social media to which posts are to be shared
*/
// Facebook
$wp_customize->add_setting(
	'ras_dashen_select_facebook_to_share_post', 
		array(
			'default'	=>	$default['ras_dashen_select_facebook_to_share_post'],
			'sanitize_callback' => 'ras_dashen_sanitize_checkbox',	
		)
	);

$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize, 
	'ras_dashen_select_facebook_to_share_post', 
		array(
			'section'			=>	'ras_dashen_social_media_sharing_section',
			'label'				=>	esc_html__('Facebook', 'ras-dashen'),
			'active_callback'	=>	'ras_dashen_if_social_media_sharing_enabled',
			'type'				=>	'checkbox',
		)
	)
 );
// Twitter
$wp_customize->add_setting(
	'ras_dashen_select_twitter_to_share_post', 
	array(
		'default'	=>	$default['ras_dashen_select_twitter_to_share_post'],
		'sanitize_callback' => 'ras_dashen_sanitize_checkbox',	
	)
);

$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize, 
	'ras_dashen_select_twitter_to_share_post', 
		array(
			'section'			=>	'ras_dashen_social_media_sharing_section',
			'label'				=>	esc_html__('Twitter', 'ras-dashen'),
			'active_callback'	=>	'ras_dashen_if_social_media_sharing_enabled',
			'type'				=>	'checkbox',
		)
	)
 );
// googleplus
$wp_customize->add_setting(
	'ras_dashen_select_googleplus_to_share_post', 
	array(
		'default'	=>	$default['ras_dashen_select_googleplus_to_share_post'],
		'sanitize_callback' => 'ras_dashen_sanitize_checkbox',	
	)
);

$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize, 
	'ras_dashen_select_googleplus_to_share_post', 
		array(
			'section'			=>	'ras_dashen_social_media_sharing_section',
			'label'				=>	esc_html__('Google+', 'ras-dashen'),
			'active_callback'	=>	'ras_dashen_if_social_media_sharing_enabled',
			'type'				=>	'checkbox',
		)
	)
 );
// pinterest
$wp_customize->add_setting(
	'ras_dashen_select_pinterest_to_share_post', 
		array(
			'default'	=>	$default['ras_dashen_select_pinterest_to_share_post'],
			'sanitize_callback' => 'ras_dashen_sanitize_checkbox',	
		)
	);

$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize, 
	'ras_dashen_select_pinterest_to_share_post', 
		array(
			'section'			=>	'ras_dashen_social_media_sharing_section',
			'label'				=>	esc_html__('Pinterest', 'ras-dashen'),
			'active_callback'	=>	'ras_dashen_if_social_media_sharing_enabled',
			'type'				=>	'checkbox',
		)
	)
 );

// linkedin
$wp_customize->add_setting(
	'ras_dashen_select_linkedin_to_share_post', 
		array(
			'default'	=>	$default['ras_dashen_select_linkedin_to_share_post'],
			'sanitize_callback' => 'ras_dashen_sanitize_checkbox',	
		)
	);

$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize, 
	'ras_dashen_select_linkedin_to_share_post', 
		array(
			'section'			=>	'ras_dashen_social_media_sharing_section',
			'label'				=>	esc_html__('Linkedin', 'ras-dashen'),
			'active_callback'	=>	'ras_dashen_if_social_media_sharing_enabled',
			'type'				=>	'checkbox',
		)
	)
 );