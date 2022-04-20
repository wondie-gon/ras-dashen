<?php
/**
* action hook functions for contact info widget
*
* @package Ras_Dashen 
* @since 1.0.0
*
*/
/**
* Action hook function to display contact info
*/
// contact info sidebar main content
if ( ! function_exists( 'ras_dashen_contact_address_widgets_content_action' ) ) {
	function ras_dashen_contact_address_widgets_content_action() {
		?>
		<div class="col-12">
        	<h4><?php _e( 'Contact us &amp; let\'s work together', 'ras-dashen' ); ?></h4>
      	</div>
		<?php
		if ( is_active_sidebar( 'contact-widget-area' ) ) {
			dynamic_sidebar( 'contact-widget-area' );
		}

	}
}
add_action( 'ras_dashen_contact_address_widgets_content', 'ras_dashen_contact_address_widgets_content_action', 10 );