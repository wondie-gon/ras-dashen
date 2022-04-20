/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	/**
	* Dropdown post select control
	*/
	$( '.custom-select-control option' ).on( 'change', function() {
		$(this).prop('selected', true);
	} );

	
} )( jQuery );
