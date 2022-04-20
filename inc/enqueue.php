<?php
/**
 * Functions to enqueue scripts and styles
 *
 * @package Ras_Dashen
 *
 * @since 1.0.0
 */

/**
* Enqueuing theme main style
*
*/
if ( ! function_exists( 'ras_dashen_main_theme_style' ) ) {
	function ras_dashen_main_theme_style() {
		// Theme main style
		wp_enqueue_style( 'ras_dashen_style', get_stylesheet_uri(), array(), _S_VERSION );
		wp_style_add_data( 'ras_dashen_style', 'rtl', 'replace' );
	}
}

/**
* Registering and enqueuing theme Styles
*
* @since 1.0.0
*/
if ( ! function_exists( 'ras_dashen_enqueue_theme_styles' ) ) {
	function ras_dashen_enqueue_theme_styles() {

		// theme uri
		$thm_uri = get_theme_file_uri();

		// dynamic version
		$vers = RD_DEV_MODE ? time() : _S_VERSION;

		// cdn: register fontawesome
		// wp_register_style( 'ras_dashen_fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css', array(), null );

		// cdn: register Bootstrap stylesheet
		wp_register_style( 'ras_dashen_bootstrap_css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', false, Null, 'all' );


		// register theme custom style
		wp_register_style( 'ras_dashen_custom_css', $thm_uri . '/assets/css/custom/custom-style.css', array(), $vers );


		// Enqueueing styles
		// wp_enqueue_style( 'ras_dashen_fontawesome' );
		wp_enqueue_style( 'ras_dashen_bootstrap_css' );
		wp_enqueue_style( 'ras_dashen_custom_css' );

		// Threaded comment reply styles.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
	}
}


/**
* enqueue style for theme's admin pages
*
* @since 1.0.0
*/
if ( ! function_exists( 'ras_dashen_enqueue_admin_scripts' ) ) :
	
	function ras_dashen_enqueue_admin_scripts() {

		// theme uri
		$thm_uri = get_theme_file_uri();

		// dynamic version
		$vers = RD_DEV_MODE ? time() : _S_VERSION;

		wp_register_style( 'ras-dashen-admin-style', $thm_uri . '/assets/css/admin-style.css', array(), $vers );
		wp_enqueue_style( 'ras-dashen-admin-style' );

	}

endif;


/**
* Register and enqueue js files
*
* @since 1.0.0
*/
function ras_dashen_enqueue_js_scripts() {

	// theme uri
	$thm_uri = get_theme_file_uri();

	// dynamic version
	$vers = RD_DEV_MODE ? time() : _S_VERSION;

	/**
	* Register and Enqueue HTML5shiv to support HTML5 elements in older IE versions
	*/
	wp_register_script( 
		'html5shiv', 
		$thm_uri . '/assets/js/html5shiv.js', 
		array(), 
		'3.7.3', 
		false 
	);

	// cdn: register latest Bootstrap popper Js
	wp_register_script( 
		'ras_dashen_bootstrap_popper_js', 
		'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', 
		array('jquery'), 
		Null, 
		true 
	);
	// cdn: register latest Bootstrap Js
	wp_register_script( 
		'ras_dashen_bootstrap_js', 
		'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', 
		array('jquery'), 
		Null, 
		true 
	);

	wp_register_script( 
		'ras_dashen_navigation', 
		$thm_uri . '/assets/js/navigation.js', 
		array(), 
		$vers, 
		true );

	// register custom general script
	wp_register_script(
		'ras_dashen_custom_js',
		$thm_uri . '/assets/js/custom-general.js',
		array(),
		$vers,
		true
	);

	// mega nav menu jQuery
	wp_register_script(
		'ras_dashen_megamenu_js',
		$thm_uri . '/assets/js/mega-nav-menu.js',
		array(),
		$vers,
		true
	);

	// register back to top scroll script
	wp_register_script( 
		'ras_dashen_totopjs', 
		$thm_uri . '/assets/js/totop.js', 
		array(), 
		$vers, 
		true 
	);
/*
	// register scroll animation effects script
	wp_register_script(
		'ras_dashen_scrollanim_js',
		$thm_uri . '/assets/js/scroll-anims.js',
		array(),
		$vers,
		true
	);
*/

	// Enqueue all required scripts
	wp_enqueue_script( 'html5shiv' );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	// enqueue jquery from WP
	wp_enqueue_script( 'jquery' );

	// bootstraps js
	wp_enqueue_script( 'ras_dashen_bootstrap_js' );

	wp_enqueue_script( 'ras_dashen_navigation' );
	wp_enqueue_script( 'ras_dashen_custom_js' );

	if ( has_nav_menu( 'mega-menu' ) ) {
		wp_enqueue_script( 'ras_dashen_megamenu_js' );
	}

	// outside admin pages
	if ( ! is_admin() ) {
		
		wp_enqueue_script( 'ras_dashen_totopjs' );

		// only for front page
		if ( is_front_page() && is_home() ) {
			wp_enqueue_script( 'ras_dashen_scrollanim_js' );
		}
	}

}