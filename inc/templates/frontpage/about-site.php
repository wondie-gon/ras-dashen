<?php
/**
 * Template part for displaying frontpage about_site
 *
 *
 * @package Ras_Dashen
 *
 * @since 1.0.0
 */

// get section enabler
$about_section_enabled = get_theme_mod( 'ras_dashen_front_about_site_enabled' );

// display none if not enabled
if ( false == $about_section_enabled ) {
  return;
}

// display about_site section content
/**
* Hook - ras_dashen_about_section.
*
*/
do_action( 'ras_dashen_about_site_section' );
