<?php
/**
 * contact-us page template action-hook functions
 *
 * Note: It is important to name the 'Contact us' page permalink as 'contact-us.php' when page is created
 * 
 * @package Ras_Dashen
 */

/**
* Action hook function for contact page
*/
add_action( 'ras_dashen_contact_us_page', 'ras_dashen_contact_page_main_wrapper_start', 10 );

add_action( 'ras_dashen_contact_us_page', 'ras_dashen_contact_page_content_layout', 20 );
// add_action( 'ras_dashen_contact_us_page', 'ras_dashen_contact_page_sidebar', 30 );

add_action( 'ras_dashen_contact_us_page', 'ras_dashen_contact_page_main_wrapper_end', 30 );

// contact us page main wrappers starting template
if ( ! function_exists( 'ras_dashen_contact_page_main_wrapper_start' ) ) {
	
	function ras_dashen_contact_page_main_wrapper_start() {
		?>
		<main class="container-fluid ui-page-main page-main">
  			<div class="row">
  				<header class="page-header col-12">

			    	<h1 class="page-title"><?php the_title(); ?></h1>

			  	</header> <!-- .page-header -->
		<?php
	}

}

// contact us page main content part template
if ( ! function_exists( 'ras_dashen_contact_page_main_col_content_action' ) ) {
	
	function ras_dashen_contact_page_main_col_content_action( $has_address_widget_activated ) {

		/*
		* changing layout of form containing column 
		* based on activation of sidebar
		*/
		// wrapper div contaning form
		if ( true == $has_address_widget_activated ) {

			$form_holder_classes = array( 'col-md-6 py-3 contact-form-col' );

		} else {

			$form_holder_classes = array( 'col-md-8 py-3 contact-form-col' );

		}
		?>

	  	<div class="<?php echo esc_attr( implode( ' ', $form_holder_classes ) ); ?>">

		<?php
		// get content from page editor
	    while(have_posts()) : the_post();

      		the_content();

      	endwhile; 
      	?>
		</div><!-- .contact-form-col -->
		<?php
	}

}
add_action( 'ras_dashen_contact_page_main_col_content', 'ras_dashen_contact_page_main_col_content_action', 10, 1 );

// contact us page main wrappers ending template
if ( ! function_exists( 'ras_dashen_contact_page_main_wrapper_end' ) ) {
	
	function ras_dashen_contact_page_main_wrapper_end() {
		?>
			</div><!-- .row -->
		</main><!-- main.ui-page-main.page-main -->
		<?php
	}

}

// get contact us page contents layouted
function ras_dashen_contact_page_content_layout() {

	/**
	* Hook - ras_dashen_contact_page_main_col_content.
	*
	* @hooked ras_dashen_contact_page_main_col_content_action - 10
	*/  
	do_action( 'ras_dashen_contact_page_main_col_content', is_active_sidebar( 'contact-widget-area' ) );

	/**
	* Hook - ras_dashen_contact_page_sidebar.
	*
	* @hooked ras_dashen_contact_page_sidebar_action - 10
	*/  
	do_action( 'ras_dashen_contact_page_sidebar', is_active_sidebar( 'contact-widget-area' ) );
               

}

