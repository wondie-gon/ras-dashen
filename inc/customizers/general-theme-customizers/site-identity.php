<?php
/**
 * Site identity customizer
 *
 * @package Ras_Dashen
 *
 * @since 1.0.0
 */

// site identity customizers
$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector'        => '.site-title',
		'render_callback' => 'ras_dashen_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector'        => '.site-description',
		'render_callback' => 'ras_dashen_customize_partial_blogdescription',
	) );
}
