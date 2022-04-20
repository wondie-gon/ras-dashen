<?php
/**
* Theme mega menu widget that will contain the mega-menu item's HTML
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
* @package Ras_Dashen
* @since 1.0.0
*/
//register MegaMenu widget if the Mega Menu is set as the menu location
if ( ! function_exists( 'ras_dashen_mega_menu_widget' ) ) :

	function ras_dashen_mega_menu_widget() {

		$location = 'mega-menu';
		$css_class = 'mega-menu-parent';
		$locations = get_nav_menu_locations();

		if ( isset( $locations[ $location ] ) ) {

		  $menu = get_term( $locations[ $location ], 'nav_menu' );

		  if ( $items = wp_get_nav_menu_items( $menu->name ) ) {

		    foreach ( $items as $item ) {

		      if ( in_array( $css_class, $item->classes ) ) {
		        register_sidebar( 
		        	array(
			          'id'   			=> 'mega-menu-item-' . $item->ID,
			          'description' 	=> 'Mega Menu items',
			          'name' 			=> $item->title . ' - Mega Menu',
			          'before_widget' 	=> '<li id="%1$s" class="mega-menu-item">',
			          'after_widget' 	=> '</li>', 
			        )
		        );
		      }

		    }

		  }

		}

	}
	
endif;
add_action( 'widgets_init', 'ras_dashen_mega_menu_widget' );
