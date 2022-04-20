<?php
/**
* Widgets and sidebar for contact information display
*
* @package Ras_Dashen 
* @since 1.0.0
*
*/
/**
* widget area for adding sidebar contact info widget to be displayed
* contact us page
*/
function ras_dashen_register_contact_info_widget_sidebar() {
 
 	register_sidebar( 
	 	array(
		  'name' => __( 'Contact Info Widget Area', 'ras-dashen' ),
		  'id' => 'contact-widget-area',
		  'description' => __( 'Widget area for contact information display on contact us page', 'ras-dashen' ),
		  'before_widget' => '<div id="%1$s" class="col-md-6 py-3 %2$s">',
		  'after_widget' => '</div>',
		) 
 	);

}
add_action( 'widgets_init', 'ras_dashen_register_contact_info_widget_sidebar' );