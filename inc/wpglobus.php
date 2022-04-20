<?php
/**
* WPGlobus language switcher for multilingual functionality
* to use WPGlobus (version 2.6.1)
* License: GPL-3.0-or-later
* License URI: https://spdx.org/licenses/GPL-3.0-or-later.html
*
* the active language will be hidden.
* @package Ras_Dashen
*
* @since 1.0.0
*/
function ras_dashen_wpglobus_language_switcher_action() {
	if ( class_exists( 'WPGlobus' ) ):

		$wpglobus_language_image = array(
			'en' => array( 
				'src' => WPGlobus::Config()->flags_url . WPGlobus::Config()->flag['en'],
				'alt' => 'English',
				'title' => 'English'
			),
			'am' => array( 
				'src' => WPGlobus::Config()->flags_url . WPGlobus::Config()->flag['am'],
				'alt' => 'Amharic',
				'title' => 'Amharic'
			)
		);
		echo '<div class="wpglobus-language-switcher">';
		foreach( WPGlobus::Config()->enabled_languages as $language ) {
			if ( $language == WPGlobus::Config()->language ) {
				continue;
			}
			echo '<a href="' . WPGlobus_Utils::localize_current_url( $language ). '" class="">';
			echo '<img alt="'.$wpglobus_language_image[$language]['alt'].'" title="'.$wpglobus_language_image[$language]['title'].'" src="'.$wpglobus_language_image[$language]['src'].'" />';
			echo '</a>';
		}
		echo '</div>';
		
	endif;
}
add_action( 'ras_dashen_wpglobus_language_switcher', 'ras_dashen_wpglobus_language_switcher_action' );