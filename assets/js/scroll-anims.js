/*
Animations triggered on scrolling of pages
Version: 1.0.0
Author:  Wondwossen Birhanie
*/

// Detect request animation frame
var scroll = window.requestAnimationFrame ||
             window.webkitRequestAnimationFrame ||
             window.mozRequestAnimationFrame ||
             window.msRequestAnimationFrame ||
             window.oRequestAnimationFrame ||
             // IE Fallback, you can even fallback to onscroll
             function(callback){ window.setTimeout(callback, 1000/60) };
var elmntsToAnimate = document.querySelectorAll('.has-scroll-anim'); 

function triggerAnimationOnScroll() {

    elmntsToAnimate.forEach(function (elmnt) {
      if (isAnimElementInView(elmnt)) {
        elmnt.classList.add('scrolled');
      } else {
        elmnt.classList.remove('scrolled');
      }
    });

    scroll(triggerAnimationOnScroll);
}

// Call the loop for the first time
if ( elmntsToAnimate ) {
  triggerAnimationOnScroll();
}

// Helper function from: http://stackoverflow.com/a/7557433/274826
function isAnimElementInView(the_el) {
  // special bonus for those using jQuery
  if (typeof jQuery === "function" && the_el instanceof jQuery) {
    the_el = the_el[0];
  }
  var el_box = the_el.getBoundingClientRect();
  return (
    (el_box.top <= 0
      && el_box.bottom >= 0)
    ||
    (el_box.bottom >= (window.innerHeight || document.documentElement.clientHeight) &&
      el_box.top <= (window.innerHeight || document.documentElement.clientHeight))
    ||
    (el_box.top >= 0 &&
      el_box.bottom <= (window.innerHeight || document.documentElement.clientHeight))
  );
}

/* 
* jQuery function for animation effects
* of frontpage welcoming and intro section
*/
jQuery( document ).ready( function( $ ) {

  /*
  * Animations triggered on scrolling of pages
  *
  * Author: Wondwossen Birhanie
  */
  $( window ).scroll( function() {

      // the anim section
      $animSection = $( '.anim-on-scroll' );

      if ( elementIsInViewPort( $animSection ) ) {

        setTimeout( function() {

          $animSection.addClass( 'anim-triggered' );

        }, 500 );

      } else {

        $animSection.removeClass( 'anim-triggered' );
        
      }

  } );

  // function to check element is in view
  function elementIsInViewPort( el ) {
    
      $thisWin = $( window );

      // the anim section
      $el = $( el );
      // elment height
      $elHgt = $el.outerHeight();
      // top of section
      $el_top = $el.offset().top;
      // bottom of section
      $el_bottom = $el_top + $elHgt;
      // top of screen
      $thisWin_top = $thisWin.scrollTop();
      // bottom of screen
      $thisWin_bottom = $thisWin_top + $thisWin.innerHeight();

      // check if element is in viewport
      if ( $thisWin_bottom > $el_top && $thisWin_top < $el_bottom ) {
        // the element is in viewport
        return true;

      } else {
        // not in viewport
        return false;
      }

  }

} );

