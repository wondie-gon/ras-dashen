<?php  
/**
* Active callback function for theme customization
*
* @package Ras_Dashen
* 
* @since 1.0.0
*/
/**
 * Check if frontpage hero section enabled
 */
function ras_dashen_if_front_hero_enabled( $control ) {

	$section_enabled = ( false != $control->manager->get_setting( 'ras_dashen_front_hero_enabled' )->value() ) ? true : false ;

	return $section_enabled;

}


/**
 * Check if frontpage about_site section enabled
 */
function ras_dashen_if_about_site_section_enabled( $control ) {

	$section_enabled = ( false != $control->manager->get_setting( 'ras_dashen_front_about_site_enabled' )->value() ) ? true : false ;

	return $section_enabled;

}

/**
* Check if about_site content is custom text
*/
function ras_dashen_if_about_site_excerpt_block_custom( $control ) {

	if ( ( false != $control->manager->get_setting( 'ras_dashen_front_about_site_enabled' )->value() ) && ( 'custom_cards' === $control->manager->get_setting( 'ras_dashen_about_site_excerpt_blocks_content_type' )->value() ) ) {
		
		return true;

	}
		
	return false;

}

/**
* Check if about_site content is post
*/
function ras_dashen_if_about_site_excerpt_block_post( $control ) {

	if ( ( false != $control->manager->get_setting( 'ras_dashen_front_about_site_enabled' )->value() ) && ( 'post' === $control->manager->get_setting( 'ras_dashen_about_site_excerpt_blocks_content_type' )->value() ) ) {
		
		return true;

	}
		
	return false;
	
}

/**
* Check if about_site content is page
*/
function ras_dashen_if_about_site_excerpt_block_page( $control ) {

	if ( ( false != $control->manager->get_setting( 'ras_dashen_front_about_site_enabled' )->value() ) && ( 'page' === $control->manager->get_setting( 'ras_dashen_about_site_excerpt_blocks_content_type' )->value() ) ) {
		
		return true;

	}
		
	return false;
	
}

/**
* Check if any post type selected for about_site
*/
function ras_dashen_if_about_site_excerpt_block_content_type_selected( $control ) {

	if ( ( false != $control->manager->get_setting( 'ras_dashen_front_about_site_enabled' )->value() ) && ( '' !== $control->manager->get_setting( 'ras_dashen_about_site_excerpt_blocks_content_type' )->value() ) ) {
		
		return true;

	}
		
	return false;
	
}


/**
 * Check if frontpage latest_picks section enabled
 */
function ras_dashen_if_latest_picks_section_enabled( $control ) {

	return ( false != $control->manager->get_setting( 'ras_dashen_front_latest_picks_enabled' )->value() ) ? true : false ;

}


/**
 * Check if frontpage primary_feature section enabled
 */
function ras_dashen_if_primary_feature_section_enabled( $control ) {

	return ( false != $control->manager->get_setting( 'ras_dashen_front_primary_feature_section_enabled' )->value() ) ? true : false ;

}

/**
* Check if post type is custom_card
*/
function ras_dashen_if_primary_feature_highlight_block_custom( $control ) {

	if ( ( false != $control->manager->get_setting( 'ras_dashen_front_primary_feature_section_enabled' )->value() ) && ( 'custom_card' === $control->manager->get_setting( 'ras_dashen_primary_feature_highlight_blocks_content_type' )->value() ) ) {
		
		return true;

	}
		
	return false;
	
}

/**
* Check if post type is page
*/
function ras_dashen_is_primary_feature_cards_type_page( $control ) {

	if ( 'page' === $control->manager->get_setting( 'ras_dashen_primary_feature_highlight_blocks_content_type' )->value() ) {
		
		return true;

	}
		
	return false;
	
}

/**
* Check if post type is post
*/
function ras_dashen_is_primary_feature_cards_type_post( $control ) {

	if ( ( false != $control->manager->get_setting( 'ras_dashen_front_primary_feature_section_enabled' )->value() ) && ( 'post' === $control->manager->get_setting( 'ras_dashen_primary_feature_highlight_blocks_content_type' )->value() ) ) {
		
		return true;

	}
		
	return false;
	
}

/**
* Check if any post type selected
*/
function ras_dashen_if_primary_feature_highlight_content_type_selected( $control ) {

	if ( ( false != $control->manager->get_setting( 'ras_dashen_front_primary_feature_section_enabled' )->value() ) && ( '' !== $control->manager->get_setting( 'ras_dashen_primary_feature_highlight_blocks_content_type' )->value() ) ) {
		
		return true;

	}
		
	return false;
	
}


/**
 * Check if frontpage primary services section enabled
 */
function ras_dashen_if_primary_services_highlight_section_enabled( $control ) {

	return ( false != $control->manager->get_setting( 'ras_dashen_front_primary_services_highlight_enabled' )->value() ) ? true : false ;

}

/**
* Check if post type is custom_card
*/
function ras_dashen_if_primary_services_highlight_card_custom( $control ) {

	if ( ( false != $control->manager->get_setting( 'ras_dashen_front_primary_services_highlight_enabled' )->value() ) && ( 'custom_card' === $control->manager->get_setting( 'ras_dashen_primary_services_highlight_cards_content_type' )->value() ) ) {
		
		return true;

	}
		
	return false;
	
}

/**
* Check if post type is page
*/
function ras_dashen_is_primary_services_cards_type_page( $control ) {

	if ( 'page' === $control->manager->get_setting( 'ras_dashen_primary_services_highlight_cards_content_type' )->value() ) {
		
		return true;

	}
		
	return false;
	
}

/**
* Check if post type is post
*/
function ras_dashen_is_primary_services_cards_type_post( $control ) {

	if ( ( false != $control->manager->get_setting( 'ras_dashen_front_primary_services_highlight_enabled' )->value() ) && ( 'post' === $control->manager->get_setting( 'ras_dashen_primary_services_highlight_cards_content_type' )->value() ) ) {
		
		return true;

	}
		
	return false;
	
}

/**
* Check if any post type selected
*/
function ras_dashen_if_primary_services_highlight_content_type_selected( $control ) {

	if ( ( false != $control->manager->get_setting( 'ras_dashen_front_primary_services_highlight_enabled' )->value() ) && ( '' !== $control->manager->get_setting( 'ras_dashen_primary_services_highlight_cards_content_type' )->value() ) ) {
		
		return true;

	}
		
	return false;
	
}

/**
* Check if frontpage featured products section enabled
*/
function ras_dashen_if_featured_products_section_enabled( $control ) {

	return ( false != $control->manager->get_setting( 'ras_dashen_front_featured_products_list_enabled' )->value() ) ? true : false ;

}

/**
 * Check if frontpage secondary services section enabled
 */
function ras_dashen_if_secondary_services_highlight_section_enabled( $control ) {

	return ( false != $control->manager->get_setting( 'ras_dashen_front_secondary_services_highlight_enabled' )->value() ) ? true : false ;

}

/**
* Check if post type is custom_card
*/
function ras_dashen_if_secondary_services_highlight_card_custom( $control ) {

	if ( ( false != $control->manager->get_setting( 'ras_dashen_front_secondary_services_highlight_enabled' )->value() ) && ( 'custom_card' === $control->manager->get_setting( 'ras_dashen_secondary_services_highlight_cards_content_type' )->value() ) ) {
		
		return true;

	}
		
	return false;
	
}

/**
* Check if post type is page
*/
function ras_dashen_is_secondary_services_cards_type_page( $control ) {

	if ( ( false != $control->manager->get_setting( 'ras_dashen_front_secondary_services_highlight_enabled' )->value() ) && ( 'page' === $control->manager->get_setting( 'ras_dashen_secondary_services_highlight_cards_content_type' )->value() ) ) {
		
		return true;

	}
		
	return false;
	
}

/**
* Check if post type is post
*/
function ras_dashen_is_secondary_services_cards_type_post( $control ) {

	if ( ( false != $control->manager->get_setting( 'ras_dashen_front_secondary_services_highlight_enabled' )->value() ) && ( 'post' === $control->manager->get_setting( 'ras_dashen_secondary_services_highlight_cards_content_type' )->value() ) ) {
		
		return true;

	}
		
	return false;
	
}

/**
* Check if any post type selected
*/
function ras_dashen_if_secondary_services_highlight_content_type_selected( $control ) {

	if ( ( false != $control->manager->get_setting( 'ras_dashen_front_secondary_services_highlight_enabled' )->value() ) && ( '' !== $control->manager->get_setting( 'ras_dashen_secondary_services_highlight_cards_content_type' )->value() ) ) {
		
		return true;

	}
		
	return false;
	
}
//--------------------------------------------End -- secondary services section

/**
* Check if frontpage featured resources section enabled
*/
function ras_dashen_if_featured_resources_section_enabled( $control ) {

	return ( false != $control->manager->get_setting( 'ras_dashen_front_featured_resources_highlight_enabled' )->value() ) ? true : false ;

}
//-----------------------------------------End -- featured resources section

/**
* Check if the extra bottom footer enabled
*/
function ras_dashen_if_extra_bottom_footer_enabled( $control ) {

	return false != $control->manager->get_setting( 'ras_dashen_enable_extra_bottom_footer' )->value();
}

/**
* Check if page links at extra bottom footer enabled
*/
function ras_dashen_if_bottom_footer_page_links_enabled( $control ) {

	return false != $control->manager->get_setting( 'ras_dashen_enable_bottom_footer_page_links' )->value();
}

/**
 * Check if the social media nav disabled
 */
function ras_dashen_if_social_media_link_nav_enabled( $control ) {

	return false != $control->manager->get_setting( 'enable_ras_dashen_social_media_link_nav' )->value();
}

/**
 * Check if the social media sharing not disabled for media posts
 */
function ras_dashen_if_social_sharing_enabled_for_media_posts( $control ) {

	return false != $control->manager->get_setting( 'ras_dashen_enable_media_posts_social_sharing_feature' )->value();
}

/**
 * Check if the social media sharing is not disabled for single post
 */
function ras_dashen_if_social_media_sharing_enabled( $control ) {

	return false != $control->manager->get_setting( 'enable_ras_dashen_social_media_sharing' )->value();
}

/**
* Check if frontpage current affairs enabled
*/
function ras_dashen_front_current_affairs_is_enabled( $control ) {

	$section_enabled = ( false != $control->manager->get_setting( 'ras_dashen_front_current_affairs_enabled' )->value() ) ? true : false ;

	return $section_enabled;

}