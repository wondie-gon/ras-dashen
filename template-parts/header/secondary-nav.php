<?php
/**
 * Display secondary nav in header nav
 *
 * @package Ras_Dashen
 *
 * @since 1.0.0
 */
?>
<?php  
	if ( has_nav_menu( 'top-secondary-menu' ) ) {

		wp_nav_menu(
			array(
				'menu'  			=> 'top-secondary-menu',
				'theme_location'  	=> 'top-secondary-menu',
				'menu_class'      	=> 'navbar-nav accessory-nav',
				'container'			=> '',
				'items_wrap'      	=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'fallback_cb'     	=> false,
				'walker'			=> new WP_Bootstrap_Mega_Navwalker(),
			)
		);
		
	}
?>