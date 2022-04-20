<?php
/**
 * General theme customization 
 *
 * 
 * @package Ras_Dashen 
* @since 1.0.0
 */

// Get defaults for theme customizer
$default = ras_dashen_get_default_mods();

/*
* Panel Theme General Setting
*/
$wp_customize->add_panel(
	'ras_dashen_general_options_panel',
	array(
		'title'	=>	esc_html__( 'General Theme Options', 'ras-dashen' ),
		'priority'	=>	65,
	)
);

// theme social media links navigation customizer
require get_template_directory() . '/inc/customizers/general-theme-customizers/social-media-nav.php';

// social media share links customizer
require get_template_directory() . '/inc/customizers/general-theme-customizers/social-media-sharing.php';