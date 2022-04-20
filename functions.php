<?php
/**
 * Ras Dashen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ras_Dashen
 * 
 * @since 1.0.0
 */

// theme version
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
* Dynamic version to solve caching during theme development
*
* NOTE ======> Make sure to change value to false at production
*/
if ( ! defined( 'RD_DEV_MODE' ) ) {
	define( 'RD_DEV_MODE', true );
}

/**
* setting up and initializing various settings/options of theme
*/
if ( ! function_exists( 'ras_dashen_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ras_dashen_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Ras Dashen, use a find and replace
		 * to change 'ras-dashen' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ras-dashen', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// Add theme support for Post Formats
		add_theme_support( 'post-formats', array( 'status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside', 'chat' ) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 *
		 * The following adds theme support for HTML5 Semantic Markup
		 */
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	
		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width = 250;
		$logo_height = 150;
		add_theme_support( 'custom-logo', array(
			'width'      	=> $logo_width,
			'height'      	=> $logo_height,
			'flex-width'  	=> true,
			'flex-height' 	=> true,
			'unlink-homepage-logo' => true,
		) );


		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ras_dashen_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// file path for custom editor style
		$editor_style_path = './assets/css/custom/editor-style.css'; // -----------------To be reconsidered

		// Enqueue editor styles.
		add_editor_style( $editor_style_path ); 						// -----------------To be reconsidered

		// Registering nav menus
		$locations = array(
			'mega-menu'					=> __( 'Primary Mega Menu', 'ras-dashen' ), // new mega menu 
			'primary-menu'				=> __( 'Top Primary Menu', 'ras-dashen' ),
			'top-secondary-menu'		=> __( 'Top Secondary Menu', 'ras-dashen' ),
			'admin-menu'				=> __( 'Admin Menu', 'ras-dashen' ),
			'social-menu'				=> __( 'Social Media Menu', 'ras-dashen' ),
			'footer-menu'				=> __( 'Footer Primary Menu', 'ras-dashen' ),
			'footer-secondary-menu'		=> __( 'Footer Secondary Menu', 'ras-dashen' ),
		);
		register_nav_menus( $locations );


		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/* Various Image sizes for theme */
		// front top slider image
		add_image_size( 'ras-dashen-front-top-slider', 1440, 864, true );

		// bg for front sections
		add_image_size( 'ras-dashen-img-sectionbg', 1440, 400, true );

		// the maximum sized featured image
		add_image_size( 'ras-dashen-featured-img-max', 1200, 900, true );

		// the medium sized featured image
		add_image_size( 'ras-dashen-featured-img-mid', 800, 600, true );

		// the minimum sized featured image
		add_image_size( 'ras-dashen-featured-img-min', 600, 450, true );

		// small sized image
		add_image_size( 'ras-dashen-img-small', 448, 336, true );

		// smallest sized image
		add_image_size( 'ras-dashen-img-tiny', 320, 240, true );
	}
endif;
add_action( 'after_setup_theme', 'ras_dashen_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ras_dashen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ras_dashen_content_width', 640 );
}
add_action( 'after_setup_theme', 'ras_dashen_content_width', 0 );


/**
* Include function hooks to enqueue theme styles and scripts
*
* @since 1.0.0
*/
include( get_theme_file_path( '/inc/enqueue.php' ) );

/**
* Load Fontawesome setup function file
* to enqueue from the cdn
*
* @since 1.0.0
*/
include( get_theme_file_path( '/inc/fontawesome.php' ) );

/**
* Enqueue all theme styles and scripts with function hooks
*
* @since 1.0.0
*/

// theme main style
add_action( 'wp_enqueue_scripts', 'ras_dashen_main_theme_style' );

/**
* Enqueue the latest available Fontawesome Style using setup function from fontawesome
*
* For the CDN, Go to 
* @link https://cdnjs.com/
* 
*/
ras_dashen_fa_custom_setup_cdn_webfont(
  'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css',
  'sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=='
);

// other theme styles
add_action( 'wp_enqueue_scripts', 'ras_dashen_enqueue_theme_styles' );

// admin styles
add_action( 'admin_enqueue_scripts', 'ras_dashen_enqueue_admin_scripts' );

// scripts for theme 
add_action( 'wp_enqueue_scripts', 'ras_dashen_enqueue_js_scripts' );

// customizer styles
require get_template_directory() . '/inc/customized-styles.php';

add_action( 'wp_head', 'ras_dashen_customizer_styles' );




/**
* Load Init theme widget areas
*/
// widgets for mega menu
require get_template_directory() . '/inc/widgets/mega-menu-widget.php';

// widgets for page sidebar
require get_template_directory() . '/inc/widgets/sidebar-widgets.php';

// widgets for footer area
require get_template_directory() . '/inc/widgets/footer-widgets.php';

// contact page widget for contact info widget
require get_template_directory() . '/inc/widgets/contact-info-widgets.php';

/**
* Load contact info widget class
*/
require get_template_directory() . '/inc/widgets/class-rd-contact-info-widget.php';

// register RD_Contact_Info_Widget widget
function ras_dashen_register_contact_info_widget() {
    // register RD_Contact_Info_Widget widget
 	register_widget( 'RD_Contact_Info_Widget' );
}
add_action( 'widgets_init', 'ras_dashen_register_contact_info_widget' );

/**
* Load contact info footer widget class
*/
require get_template_directory() . '/inc/widgets/class-ras-dashen-contact-info-footer-widget.php';

// register Ras_Dashen_Contact_Info_Footer_Widget widget
function ras_dashen_register_footer_contact_info_widget() {
    // register Ras_Dashen_Contact_Info_Footer_Widget widget
 	register_widget( 'Ras_Dashen_Contact_Info_Footer_Widget' );
}
add_action( 'widgets_init', 'ras_dashen_register_footer_contact_info_widget' );

/**
* Registering Bootstrap mega menu navwalker class
*/
if ( ! file_exists( get_template_directory() . '/inc/class-wp-bootstrap-mega-navwalker.php' ) ) {

    // File does not exist... return an error.
    return new WP_Error( 'class-wp-bootstrap-mega-navwalker-missing', __( 'It appears the class-wp-bootstrap-mega-navwalker.php file may be missing.', 'ras-dashen' ) );

} else {

    // File exists... require it.
    require_once get_template_directory() . '/inc/class-wp-bootstrap-mega-navwalker.php';
    
}

// contact info widget areas
require get_template_directory() . '/inc/widgets/display-widgets/contact-info-widget-areas.php';

// footer inner top functions to display widgets and others
require get_template_directory() . '/inc/widgets/display-widgets/footer-inner-top-functions.php';

// footer inner bottom functions to display widgets and others
require get_template_directory() . '/inc/widgets/display-widgets/footer-inner-bottom-functions.php';

/**
*
* Custom functions for:
*	custom metaboxes, helpers, frontpage templates
*
*/

// custom meta box for posts
require get_template_directory() . '/inc/custom-metaboxes/post-metaboxes.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

// Load customizer defaults
require get_template_directory() . '/inc/customizers/defaults.php';


/**
 * Customizer functions.
 */
require get_template_directory() . '/inc/customizers/customizer.php';

// various custom template helper functions
require get_template_directory() . '/inc/helper-functions.php';

// frontpage template functions
require get_template_directory() . '/inc/frontpage-functions.php';

/**
* Different templates
*/
// global template functions
require get_template_directory() . '/inc/templates/global-templates.php';

// about-us page template functions
require get_template_directory() . '/inc/templates/about-us-page-templates.php';

// contact-us page template functions
require get_template_directory() . '/inc/templates/contact-us-page-templates.php';

// contact-us page sidebar template
require get_template_directory() . '/inc/templates/contact-page-sidebar.php';

// template functions for custom page templates
require get_template_directory() . '/inc/templates/page-templates.php';

// social media links nav functions
require get_template_directory() . '/inc/general-theme-options/social-media-navs.php';

// miscellaneous functions
require get_template_directory() . '/inc/general-theme-options/miscellaneous-functions.php';

/**
* Load Jetpack compatibility file.
*/
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
* load wpglobus compatibility and custom menu function file
*/
if ( class_exists( 'WPGlobus' ) ) {
	require get_template_directory() . '/inc/wpglobus.php';
}

/**
* Load to update and customize Sidebar template tags and functions
*
*/
// sidebar functions to display content
require get_template_directory() . '/inc/widgets/display-widgets/sidebar.php';

// filter hook functions
require get_template_directory() . '/inc/extras.php';


// Initializing shortcodes
require get_template_directory() . '/inc/shortcodes/class-rd-shortcodes.php';
$rd_shortcodes = new RD_Shortcodes( 'ras-dashen' );
$rd_shortcodes->init();


/**
* Hiding WordPress update nag to all but admins
*/
function ras_dashen_hide_update_notice_to_all_but_admin() {
	if ( ! current_user_can( 'update_core' ) ) {
		remove_action( 'admin_notices', 'update_nag', 3 );
	}
}
add_action( 'admin_head', 'ras_dashen_hide_update_notice_to_all_but_admin', 1 );

/** 
* enabling support for different image formats for upload
*
* For example svg : 
* Info: Add <?xml version="1.0" encoding="utf-8"?> at first line of each SVG file before uploading
*
*/
function ras_dashen_add_file_formats_for_uploads( $file_types ) {

	$ras_dashen_mimes = array();

	$ras_dashen_mimes['svg'] = 'image/svg+xml';

	$file_types = array_merge($file_types, $ras_dashen_mimes );

	return $file_types;
}
add_filter( 'upload_mimes', 'ras_dashen_add_file_formats_for_uploads' );
