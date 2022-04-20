<?php
/**
 * Displays manin mega navigation menu using wp-bootstrap-mega-navwalker
 *
 * @package Ras_Dashen
 *
 * @since 1.0.0
 */
/**
* ==> Where a "Mega menu" is needed in the main menu list, provide class name "has-menu-flex" for the menu item
* ==> And add class "sub-menu-flex" on the submenu part, specifically to the custom-link item that you want to use as a submenu
*     header
*/
if ( has_nav_menu( 'mega-menu' ) ) {

	wp_nav_menu(
		array(
			'theme_location'     =>	'mega-menu',
			'depth'              =>	0,
			'menu_class'         =>	'navbar-nav',
			'container'      	 =>	'div',
			'container_class'    =>	'primary-bar',
			'walker'             =>	new WP_Bootstrap_Mega_Navwalker(),
		)
	);
	
}