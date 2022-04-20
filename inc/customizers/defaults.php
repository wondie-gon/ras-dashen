<?php
/**
* Default values of customizer
*
* @package Ras_Dashen
* 
* @since 1.0.0
*/
if ( ! function_exists( 'ras_dashen_get_default_mods' ) ) :
	/**
	 * Get default theme options
	 *
	 * @return array Default theme options.
	 */
	function ras_dashen_get_default_mods() {
		
		$defaults = array();

		// Frontpage hero section defaults
		$defaults['ras_dashen_front_hero_section_heading']						=	esc_html__( 'Welcome!', 'ras-dashen' );
		$defaults['ras_dashen_front_hero_heading']								=	esc_html__( 'Hero Heading', 'ras-dashen' );
		$defaults['ras_dashen_front_hero_text']									=	esc_html__( 'Write Text Here', 'ras-dashen' );
		$defaults['ras_dashen_front_hero_primary_custom_btn_text']					=	esc_html__( 'Button Text', 'ras-dashen' );
		$defaults['ras_dashen_front_hero_secondary_custom_btn_text']				=	esc_html__( 'Button Text', 'ras-dashen' );

		// Frontpage about_site section defaults
		$defaults['ras_dashen_num_of_about_site_excerpt_blocks']					=	3;
		$defaults['ras_dashen_custom_about_site_excerpt_block_title']				=	esc_html__( 'Custom Excerpt Title Here', 'ras-dashen' );
		$defaults['ras_dashen_custom_about_site_excerpt_block_description']			=	esc_html__( 'Write cusom excerpt', 'ras-dashen' );

		// Frontpage latest_picks section defaults
		$defaults['ras_dashen_front_latest_picks_section_heading']					=	esc_html__( 'Latest Picks', 'ras-dashen' );
		$defaults['ras_dashen_num_of_latest_pick_excerpt_blocks']					=	4;

		$defaults['ras_dashen_custom_latest_pick_card_title']						=	esc_html__( 'Custom Excerpt Title Here', 'ras-dashen' );
		$defaults['ras_dashen_custom_latest_pick_card_description']					=	esc_html__( 'Write cusom excerpt', 'ras-dashen' );

		// Frontpage primary_feature section defaults
		// primary_feature
		$defaults['ras_dashen_front_primary_feature_section_heading']					=	esc_html__( 'Primary Features', 'ras-dashen' );
		$defaults['ras_dashen_primary_feature_num_of_excerpt_blocks']			       	=	4;
		$defaults['ras_dashen_custom_primary_feature_highlight_block_title']			=	esc_html__( 'Custom Excerpt Title Here', 'ras-dashen' );
		$defaults['ras_dashen_custom_primary_feature_highlight_block_description']		=	esc_html__( 'Feature Description Here', 'ras-dashen' );

		// Frontpage primary_services section defaults
		$defaults['ras_dashen_front_primary_services_highlight_section_heading']		=	esc_html__( 'Services', 'ras-dashen' );
		$defaults['ras_dashen_front_primary_services_highlight_section_txt']			=	esc_html__( 'Enter description of section', 'ras-dashen' );
		$defaults['ras_dashen_primary_services_num_of_highlight_cards']					=	3;
		$defaults['ras_dashen_custom_primary_services_highlight_card_title']			=	esc_html__( 'Card Title Here', 'ras-dashen' );
		$defaults['ras_dashen_custom_primary_services_highlight_card_description']		=	esc_html__( 'Card Description Here', 'ras-dashen' );

		// featured_products
		$defaults['ras_dashen_front_featured_products_list_section_heading']				=	esc_html__( 'Featured Products', 'ras-dashen' );
		$defaults['ras_dashen_number_of_featured_products_cards']					   		=	4;

		// secondary services
		$defaults['ras_dashen_front_secondary_services_highlight_section_heading']			=	esc_html__( 'Secondary Services', 'ras-dashen' );
		$defaults['ras_dashen_front_secondary_services_highlight_section_txt']				=	esc_html__( 'Enter description of section', 'ras-dashen' );
		$defaults['ras_dashen_secondary_services_num_of_highlight_cards']					=	3;
		$defaults['ras_dashen_custom_secondary_services_highlight_card_title']				=	esc_html__( 'Card Title Here', 'ras-dashen' );
		$defaults['ras_dashen_custom_secondary_services_highlight_card_description']		=	esc_html__( 'Card Description Here', 'ras-dashen' );

		// featured_resources
		$defaults['ras_dashen_front_featured_resources_highlight_section_heading']			=	esc_html__( 'Featured Resources', 'ras-dashen' );
		$defaults['ras_dashen_featured_resources_num_of_highlight_cards']					=	4;

		// current_affairs defaults
		$defaults['ras_dashen_front_current_affairs_section_heading']						=	esc_html__( 'Latest Affairs', 'ras-dashen' );

		// Social media link default
		$defaults['enable_ras_dashen_social_media_link_nav']					=	1;

		$defaults['ras_dashen_facebook_link_username']							=	'#';
		$defaults['ras_dashen_twitter_link_username']							=	'#';
		$defaults['ras_dashen_googleplus_link_username']						=	'#';
		$defaults['ras_dashen_pinterest_link_username']							=	'#';
		$defaults['ras_dashen_linkedin_link_username']	    					=	'#';
		$defaults['ras_dashen_instagram_link_username']							=	'#';
		$defaults['ras_dashen_youtube_link_username']							=	'#';

		$defaults['ras_dashen_enable_social_media_on_header']					=	1;
		$defaults['ras_dashen_enable_social_media_on_footer']					=	1;

		// Social media sharing default
		$defaults['enable_ras_dashen_social_media_sharing']						=	0;
		$defaults['ras_dashen_select_facebook_to_share_post']					=	0;
		$defaults['ras_dashen_select_twitter_to_share_post']					=	0;
		$defaults['ras_dashen_select_googleplus_to_share_post']					=	0;
		$defaults['ras_dashen_select_pinterest_to_share_post']					=	0;
		$defaults['ras_dashen_select_linkedin_to_share_post']	    			=	0;
		$defaults['ras_dashen_select_instagram_to_share_post']					=	0;

		// footer defaults
		$defaults['ras_dashen_footer_column_layout']							=	'four-column';
		$defaults['ras_dashen_enable_extra_bottom_footer']						=	0;
		$defaults['ras_dashen_enable_bottom_footer_page_links']					=	0;
		$defaults['ras_dashen_enable_scroll_to_top_button']						=	0;
		$defaults['ras_dashen_bottom_footer_copyright_text']					=	'';
		$defaults['ras_dashen_enable_bottom_footer_site_name']					=	1;
		$defaults['ras_dashen_enable_bottom_footer_powered_by']					=	1;
		




		

		$defaults = apply_filters( 'ras_dashen_filter_default_mods', $defaults );

		return $defaults;
	}
endif;