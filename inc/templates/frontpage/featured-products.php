<?php
/**
 * Template part to display featured products on frontpage 
 *
 *
 * @package Ras_Dashen
 *
 * @since 1.0.0
 */

// get section enabler
$featured_products_enabled = get_theme_mod( 'ras_dashen_front_featured_products_list_enabled' );

// display none if not enabled
if ( $featured_products_enabled == false ) {
  return;
}

// display featured products section content
/**
* Hook - ras_dashen_featured_products_section.
*
*/
do_action( 'ras_dashen_featured_products_section' );