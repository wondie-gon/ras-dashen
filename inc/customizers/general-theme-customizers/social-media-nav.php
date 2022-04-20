<?php
/**
 * theme customizer for social media links navigation
 *
 * @package Ras_Dashen
 * @since 1.0.0 
 */
// Get defaults for theme customizer
$default = ras_dashen_get_default_mods();


// Social media link customizer section 
$wp_customize->add_section(
	'ras_dashen_social_media_link_section', 
	array(
		'title'		=>	esc_html__('Social Media Links', 'ras-dashen'),
		'panel'		=>	'ras_dashen_general_options_panel',
		'priority'	=>	10,
	)
);

/* 
* Whether to display social media link nav bar
*/
$wp_customize->add_setting(
	'enable_ras_dashen_social_media_link_nav',
		array(
			'default'	=>	$default['enable_ras_dashen_social_media_link_nav'],
			'sanitize_callback'	=>	'ras_dashen_sanitize_checkbox'
		)
	);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'enable_ras_dashen_social_media_link_nav',
		    array(
		        'label' 		=> esc_html__('Enable Social Media links', 'ras-dashen'),
		        'section' 		=> 'ras_dashen_social_media_link_section',
		        'settings'		=> 'enable_ras_dashen_social_media_link_nav',
		        'type' 			=> 'checkbox',
		    )
    	)
	);

/* 
* setting up social media usernames
*/

// Facebook
$wp_customize->add_setting(
	'ras_dashen_facebook_link_username', 
		array(
			'default'	=>	$default['ras_dashen_facebook_link_username'],
			'sanitize_callback' => 'sanitize_text_field',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'ras_dashen_facebook_link_username', 
		array(
			'section'			=>	'ras_dashen_social_media_link_section',
			'label'				=>	esc_html__('Facebook', 'ras-dashen'),
			'settings'			=> 'ras_dashen_facebook_link_username',
			'active_callback'	=>	'ras_dashen_if_social_media_link_nav_enabled',
		)
	)
);

// Twitter
$wp_customize->add_setting(
	'ras_dashen_twitter_link_username', 
	array(
		'default'	=>	$default['ras_dashen_twitter_link_username'],
		'sanitize_callback' => 'sanitize_text_field',	
	)
);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'ras_dashen_twitter_link_username', 
		array(
			'section'			=>	'ras_dashen_social_media_link_section',
			'label'				=>	esc_html__('Twitter', 'ras-dashen'),
			'settings'			=>  'ras_dashen_twitter_link_username',
			'active_callback'	=>	'ras_dashen_if_social_media_link_nav_enabled',
		)
	)
);

// googleplus
$wp_customize->add_setting(
	'ras_dashen_googleplus_link_username', 
	array(
		'default'	=>	$default['ras_dashen_googleplus_link_username'],
		'sanitize_callback' => 'sanitize_text_field',	
	)
);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'ras_dashen_googleplus_link_username', 
		array(
			'section'			=>	'ras_dashen_social_media_link_section',
			'label'				=>	esc_html__('Google+', 'ras-dashen'),
			'settings'			=>  'ras_dashen_googleplus_link_username',
			'active_callback'	=>	'ras_dashen_if_social_media_link_nav_enabled',
		)
	)
);
// pinterest
$wp_customize->add_setting(
	'ras_dashen_pinterest_link_username', 
		array(
			'default'	=>	$default['ras_dashen_pinterest_link_username'],
			'sanitize_callback' => 'sanitize_text_field',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'ras_dashen_pinterest_link_username', 
		array(
			'section'			=>	'ras_dashen_social_media_link_section',
			'label'				=>	esc_html__('Pinterest', 'ras-dashen'),
			'settings'			=>	'ras_dashen_pinterest_link_username',
			'active_callback'	=>	'ras_dashen_if_social_media_link_nav_enabled',
		)
	)
);
// linkedin
$wp_customize->add_setting(
	'ras_dashen_linkedin_link_username', 
		array(
			'default'	=>	$default['ras_dashen_linkedin_link_username'],
			'sanitize_callback' => 'sanitize_text_field',	
		)
	);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'ras_dashen_linkedin_link_username', 
		array(
			'section'			=>	'ras_dashen_social_media_link_section',
			'label'				=>	esc_html__('Linkedin', 'ras-dashen'),
			'settings'			=>	'ras_dashen_linkedin_link_username',
			'active_callback'	=>	'ras_dashen_if_social_media_link_nav_enabled',
		)
	)
);

// instagram
$wp_customize->add_setting(
	'ras_dashen_instagram_link_username', 
	array(
		'default'	=>	$default['ras_dashen_instagram_link_username'],
		'sanitize_callback' => 'sanitize_text_field',	
	)
);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'ras_dashen_instagram_link_username', 
		array(
			'section'			=>	'ras_dashen_social_media_link_section',
			'label'				=>	esc_html__('Instagram', 'ras-dashen'),
			'settings'			=>	'ras_dashen_instagram_link_username',
			'active_callback'	=>	'ras_dashen_if_social_media_link_nav_enabled',
		)
	)
);

// youtube
$wp_customize->add_setting(
	'ras_dashen_youtube_link_username', 
	array(
		'default'	=>	$default['ras_dashen_youtube_link_username'],
		'sanitize_callback' => 'sanitize_text_field',	
	)
);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'ras_dashen_youtube_link_username', 
		array(
			'section'			=>	'ras_dashen_social_media_link_section',
			'label'				=>	esc_html__('Youtube', 'ras-dashen'),
			'settings'			=>	'ras_dashen_youtube_link_username',
			'active_callback'	=>	'ras_dashen_if_social_media_link_nav_enabled',
		)
	)
);

// Social media on header
$wp_customize->add_setting(
	'ras_dashen_enable_social_media_on_header', 
	array(
		'default'	=>	$default['ras_dashen_enable_social_media_on_header'],
		'sanitize_callback' => 'ras_dashen_sanitize_checkbox',	
	)
);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'ras_dashen_enable_social_media_on_header', 
		array(
			'section'			=>	'ras_dashen_social_media_link_section',
			'label'				=>	esc_html__('In the Header', 'ras-dashen'),
			'description'		=>	esc_html__('Uncheck if you want the social media bar not to be displayed on header', 'ras-dashen'),
			'settings'			=>	'ras_dashen_enable_social_media_on_header',
			'active_callback'	=>	'ras_dashen_if_social_media_link_nav_enabled',
			'type'				=>	'checkbox',
		)
	)
);

// Social media on footer
$wp_customize->add_setting(
	'ras_dashen_enable_social_media_on_footer', 
	array(
		'default'	=>	$default['ras_dashen_enable_social_media_on_footer'],
		'sanitize_callback' => 'ras_dashen_sanitize_checkbox',	
	)
);

$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize, 
	'ras_dashen_enable_social_media_on_footer', 
		array(
			'section'			=>	'ras_dashen_social_media_link_section',
			'label'				=>	esc_html__('In the Footer', 'ras-dashen'),
			'description'		=>	esc_html__('Uncheck if you want the social media bar not to be displayed on footer', 'ras-dashen'),
			'settings'			=>	'ras_dashen_enable_social_media_on_footer',
			'active_callback'	=>	'ras_dashen_if_social_media_link_nav_enabled',
			'type'				=>	'checkbox',
		)
	)
);

