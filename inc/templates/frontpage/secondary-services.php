<?php
/**
 * Template part to display highlights of secondary_services on frontpage 
 *
 *
 * @package Ras_Dashen
 *
 * @since 1.0.0
 */

// get section enabler
$secondary_services_section_enabled = get_theme_mod( 'ras_dashen_front_secondary_services_highlight_enabled' );

// display none if not enabled
if ( $secondary_services_section_enabled == false ) {
  return;
}

// display secondary_services section content
/**
* Hook - ras_dashen_secondary_services_section
*
*/
do_action( 'ras_dashen_secondary_services_section' );