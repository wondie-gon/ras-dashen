<?php
/**
 * Functions to customize theme
 *
 * @package Ras_Dashen
 *
 * @since 1.0.0
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
// Get default customization
$default = ras_dashen_get_default_mods();

function ras_dashen_customize_register( $wp_customize ) {

	// Load sanitize call backs
	require get_template_directory() . '/inc/customizers/callbacks/sanitize-callbacks.php';

	// Load active call back functions
	require get_template_directory() . '/inc/customizers/callbacks/active-callbacks.php';

	// site identity customizer
	require get_template_directory() . '/inc/customizers/general-theme-customizers/site-identity.php';

	// category dropdown class
	require get_template_directory() . '/inc/customizers/custom-controls/class-ras-dashen-category-dropdown-control.php';

	// custom post control class
	require get_template_directory() . '/inc/customizers/custom-controls/class-ras-dashen-post-dropdown-custom-control.php';

	// radio image control class
	require get_template_directory() . '/inc/customizers/custom-controls/class-ras-dashen-image-radio-button-control.php';

	// custom svg picker custom control class
	// require get_template_directory() . '/inc/customizers/custom-controls/class-ras-dashen-svg-radio-button-control.php';

	// custom post type control class
	require get_template_directory() . '/inc/customizers/custom-controls/class-ras-dashen-post-type-dropdown-custom-control.php';

	// custom menu control class
	require get_template_directory() . '/inc/customizers/custom-controls/class-ras-dashen-menu-dropdown-custom-control.php';

	// horizontal separator control class
	require get_template_directory() . '/inc/customizers/custom-controls/class-ras-dashen-separator-custom-control.php';

	// sortable custom sortable pill checkbox
	// require get_template_directory() . '/inc/customizers/custom-controls/class-ras-dashen-custom-pill-checkbox-control.php';

	// custom alpha color picker control
	require get_template_directory() . '/inc/customizers/custom-controls/class-ras-dashen-custom-alpha-color-control.php';

	// frontpage customizer
	require get_template_directory() . '/inc/customizers/front-page/frontpage-customizer-panel.php';

	// general theme options customizer
	require get_template_directory() . '/inc/customizers/general-theme-customizers/general-options-panel.php';

	// footer customizer
	require get_template_directory() . '/inc/customizers/general-theme-customizers/footer-customizer.php';
	
}
add_action( 'customize_register', 'ras_dashen_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ras_dashen_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ras_dashen_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Enqueue the stylesheet.
 */
function ras_dashen_enqueue_customizer_stylesheet() {

	wp_register_style( 'ras-dashen-customize-controls-css', get_template_directory_uri() . '/assets/css/customize-controls.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'ras-dashen-customize-controls-css' );

}
add_action( 'customize_controls_print_styles', 'ras_dashen_enqueue_customizer_stylesheet' );

/**
 * Enqueue script for custom customize control.
 */
function ras_dashen_customize_controls_enqueue() {
    wp_enqueue_script( 'ras-dashen-customize-controls-js', get_template_directory_uri() . '/assets/js/customize-controls.js', array( 'jquery', 'customize-controls' ), _S_VERSION, true );
}
add_action( 'customize_controls_enqueue_scripts', 'ras_dashen_customize_controls_enqueue' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ras_dashen_customize_preview_js() {
	wp_enqueue_script( 
		'ras-dashen-customize-preview', 
		get_template_directory_uri() . '/assets/js/customize-preview.js', 
		array( 'customize-preview', 'jquery' ) );
}
add_action( 'customize_preview_init', 'ras_dashen_customize_preview_js' );

