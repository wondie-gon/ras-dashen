jQuery( document ).ready( function( $ ) {

	// for the body when menu is opened
	var menuBtn = $( '.navbar-toggler.collapse-menu-button' );
	menuBtn.on( 'click', function() {

		menuBtn.toggleClass( 'close' );

		if ( ! menuBtn.hasClass( 'collapsed' ) ) {
			$( document.body ).css( 'overflow', 'auto' );
		} else {
			$( document.body ).css( 'overflow', 'hidden' );
		}

	} );
	
	/* functionality for simple dropdown and mega dropdown menu */
	var dropdownLi = $( '.primary-bar .nav-item.dropdown' );

	// class to be added
	var showCls = 'show';

	if ( screen.width >= 992 ) {

		dropdownLi.on( 'mouseenter', function() {

			// if dropdown list item is inside mega menu
			if ( $( this ).hasClass( 'sub-menu-flex' ) ) {
				return;
			}

	    	$( this ).addClass( showCls );

	    	$( this ).find( '> .dropdown-toggle' ).attr( 'aria-expanded', true );

	    	$( this ).find( '> .dropdown-menu' ).addClass( showCls );
		    

		} );

		dropdownLi.on( 'mouseleave', function() {

			$( this ).removeClass( showCls );

			$( this ).find( '> .dropdown-toggle' ).attr( 'aria-expanded', false );

			$( this ).find( '> .dropdown-menu' ).removeClass( showCls );

		} );

	} else {

		// menu on smaller devices

		dropdownLi.off( 'mouseenter mouseleave' );

		dropdownLi.on( 'click focus', function() {

			if ( $( this ).hasClass( 'sub-menu-flex' ) ) {
				return;
			}

	    	$( this ).addClass( showCls );

	    	$( this ).find( '> .dropdown-toggle' ).attr( 'aria-expanded', true );

	    	$( this ).find( '> .dropdown-menu' ).addClass( showCls );

		} );

		dropdownLi.off( 'click focus', function() {

			$( this ).removeClass( showCls );

			$( this ).find( '> .dropdown-toggle' ).attr( 'aria-expanded', false );

			$( this ).find( '> .dropdown-menu' ).removeClass( showCls );

		} );

	}

} ); // end jquery