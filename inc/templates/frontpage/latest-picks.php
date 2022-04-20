<?php
/**
 * Template part to display latest_picks on frontpage 
 *
 *
 * @package Ras_Dashen
 *
 * @since 1.0.0
 */

// get section enabler
$latest_picks_section_enabled = get_theme_mod( 'ras_dashen_front_latest_picks_enabled' );

// display none if not enabled
if ( $latest_picks_section_enabled == false ) {
  return;
}

// display latest picks section content
/**
* Hook - ras_dashen_latest_picks_section.
*
*/
do_action( 'ras_dashen_latest_picks_section' );