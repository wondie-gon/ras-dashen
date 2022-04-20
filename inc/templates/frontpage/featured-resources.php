<?php
/**
 * Template part to display feaatured resources on frontpage 
 *
 *
 * @package Ras_Dashen
 *
 * @since 1.0.0
 */

// get section enabler
$featured_resources_enabled = get_theme_mod( 'ras_dashen_front_featured_resources_highlight_enabled' );

// display none if not enabled
if ( $featured_resources_enabled == false ) {
  return;
}

// display featured resources section content
/**
* Hook - ras_dashen_featured_resources_section.
*
*/
do_action( 'ras_dashen_featured_resources_section' );