<?php
/**
* Template functions for contact us page sidebar
*
* @package Ras_Dashen
*
*/

// contact us page side widget content part
if ( ! function_exists( 'ras_dashen_contact_page_sidebar_action' ) ) {
	
	function ras_dashen_contact_page_sidebar_action( $has_address_widget_activated ) {

		// check if address info widget activated
		if ( true == $has_address_widget_activated ) { ?>
			<div class="col-md-6 py-3 contact-addr-col">
				<div class="row">
				<?php
					/**
					* Hook - ras_dashen_contact_address_widgets_content
					*
					* @hooked - ras_dashen_contact_address_widgets_content_action - 10
					*/
					do_action( 'ras_dashen_contact_address_widgets_content' );
			    ?>
				</div><!-- .row -->
			</div><!-- .col-md-6.contact-addr-col -->
		<?php

		} else {

			// get the default sidebar
			get_sidebar();
		}

	}

}
add_action( 'ras_dashen_contact_page_sidebar', 'ras_dashen_contact_page_sidebar_action', 10, 1 );
