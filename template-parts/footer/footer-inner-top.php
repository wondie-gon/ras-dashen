<?php
/**
 * The template for displaying footer's inner top
 *
 * @package Ras_Dashen
 * 
 * @since 1.0.0
 */
// Get default customization
$default = ras_dashen_get_default_mods();

// Main footer column layout selected from theme customizer
$ras_dashen_footer_column = esc_attr( get_theme_mod( 'ras_dashen_footer_column_layout', $default['ras_dashen_footer_column_layout'] ) );

if ( is_active_sidebar( 'footer-widget1' ) || is_active_sidebar( 'footer-widget2' ) || is_active_sidebar( 'footer-widget3' ) || is_active_sidebar( 'footer-widget4' ) ) {
  ?>
  <div class="row inner-top">
  <?php
    switch ( $ras_dashen_footer_column ) :
      case 'one-column':

        /**
        * Hook - ras_dashen_main_footer_one_column_layout
        *
        * @hooked ras_dashen_main_footer_one_column_layout_action - 10
        */

        do_action( 'ras_dashen_main_footer_one_column_layout' );

        break;

      case 'two-column':
      
        /**
        * Hook - ras_dashen_main_footer_two_column_layout
        *
        * @hooked ras_dashen_main_footer_two_column_layout_action - 10
        */

        do_action( 'ras_dashen_main_footer_two_column_layout' );

        break;

      case 'three-column':
      
        /**
        * Hook - ras_dashen_main_footer_three_column_layout
        *
        * @hooked ras_dashen_main_footer_three_column_layout_action - 10
        */

        do_action( 'ras_dashen_main_footer_three_column_layout' );

        break;
      
      default:
        
        case 'four-column':
      
        /**
        * Hook - ras_dashen_main_footer_four_column_layout
        *
        * @hooked ras_dashen_main_footer_four_column_layout_action - 10
        */

        do_action( 'ras_dashen_main_footer_four_column_layout' );

        break;

    endswitch;
  ?>
  </div><!-- .row.inner-top -->
  <?php
}
?>