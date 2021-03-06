<?php
/**
* Theme footer widgets
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
* @package Ras_Dashen
* @since 1.0.0
*/
if ( ! function_exists( 'ras_dashen_footer_area_widgets' ) ) {
	function ras_dashen_footer_area_widgets() {

		// Get default customization
		$default = ras_dashen_get_default_mods();

		/* Footer widget area 1 */
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area One', 'ras-dashen' ),
			'id'            => 'footer-widget1',
			'description'   => esc_html__( 'Add footer widget area one.', 'ras-dashen' ),
			'before_widget' => '<div id="%1$s" class="child-widget-1 widget foot-widget py-3 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h3 class="foot-widget-title">',
			'after_title'   => '</h3></div>',
		) );



		// Main footer column layout selected from theme customizer
		//$ras_dashen_footer_column = '';

		$ras_dashen_footer_column = esc_attr( get_theme_mod( 'ras_dashen_footer_column_layout', $default['ras_dashen_footer_column_layout'] ) );

		if ( $ras_dashen_footer_column == 'two-column' || $ras_dashen_footer_column == 'three-column' || $ras_dashen_footer_column == 'four-column' ) :
			
			/* Footer widget area 2 */
			register_sidebar( array(
				'name'          => esc_html__( 'Footer Widget Area Two', 'ras-dashen' ),
				'id'            => 'footer-widget2',
				'description'   => esc_html__( 'Add footer widget area two.', 'ras-dashen' ),
				'before_widget' => '<div id="%1$s" class="child-widget-2 widget foot-widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-title"><h3 class="foot-widget-title">',
				'after_title'   => '</h3></div>',
			) );

		endif;


		if ( $ras_dashen_footer_column == 'three-column' || $ras_dashen_footer_column == 'four-column' ) :
			
			/* Footer widget area 3 */
			register_sidebar( array(
				'name'          => esc_html__( 'Footer Widget Area Three', 'ras-dashen' ),
				'id'            => 'footer-widget3',
				'description'   => esc_html__( 'Add footer widget area three.', 'ras-dashen' ),
				'before_widget' => '<div id="%1$s" class="child-widget-3 widget foot-widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-title"><h3 class="foot-widget-title">',
				'after_title'   => '</h3></div>',
			) );

		endif;


		if ( $ras_dashen_footer_column == 'four-column' ) :
			
			/* Footer widget area 4 */
			register_sidebar( array(
				'name'          => esc_html__( 'Footer Widget Area Four', 'ras-dashen' ),
				'id'            => 'footer-widget4',
				'description'   => esc_html__( 'Add footer widget area four.', 'ras-dashen' ),
				'before_widget' => '<div id="%1$s" class="child-widget-4 widget foot-widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-title"><h3 class="foot-widget-title">',
				'after_title'   => '</h3></div>',
			) );

		endif;


		/* The social media widget area for post share */
		register_sidebar( array(
			'name'          => esc_html__( 'Social Media Widget', 'ras-dashen' ),
			'id'            => 'social-widget',
			'description'   => esc_html__( 'Add social media widget area for posts.', 'ras-dashen' ),
			'before_widget' => '<div class="row"><div id="%1$s" class="col-md-12 d-flex align-items-center justify-content-between my-2">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="widget-title"><h3 class="social-widget-title">',
			'after_title'   => '</h3></div>',
		) );

	}
}
add_action( 'widgets_init', 'ras_dashen_footer_area_widgets' );