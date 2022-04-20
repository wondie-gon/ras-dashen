<?php
/**
 * Template part to display primary_services section on frontpage 
 *
 *
 * @package Ras_Dashen
 *
 * @since 1.0.0
 */

// get section enabler
$primary_services_section_enabled = get_theme_mod( 'ras_dashen_front_primary_services_highlight_enabled' );

// display none if not enabled
if ( $primary_services_section_enabled == false ) {
  return;
}

// display primary_services section content
/**
* Hook - ras_dashen_primary_services_section
*
*/
do_action( 'ras_dashen_primary_services_section' );