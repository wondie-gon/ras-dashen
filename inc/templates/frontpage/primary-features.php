<?php
/**
 * Template part to display primary_features on frontpage 
 *
 *
 * @package Ras_Dashen
 *
 * @since 1.0.0
 */

// get section enabler
$primary_features_section_enabled = get_theme_mod( 'ras_dashen_front_primary_feature_section_enabled' );

// display none if not enabled
if ( $primary_features_section_enabled == false ) {
  return;
}

// display primary features section content
/**
* Hook - ras_dashen_primary_features.
*
*/
do_action( 'ras_dashen_primary_features' );