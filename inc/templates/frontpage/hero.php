<?php
/**
 * Template part to display hero section on frontpage 
 *
 *
 * @package Ras_Dashen
 *
 * @since 1.0.0
 */

// get section enabler
$hero_section_enabled = get_theme_mod( 'ras_dashen_front_hero_enabled' );

// display none if not enabled
if ( $hero_section_enabled == false ) {
  return;
}

// display hero section content
/**
* Hook - ras_dashen_hero_section.
*
*/
do_action( 'ras_dashen_hero_section' );