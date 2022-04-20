<?php
/**
 * Customizer styles
 *
 * @package Ras_Dashen
 */

// outputting customizer styles
function ras_dashen_customizer_styles() {
	?>
	<style type="text/css">
	<?php
	// frontpage customize styles
	if ( is_front_page() ) {
		// ------hero section customizer styles------
		if ( get_theme_mod( 'ras_dashen_front_hero_section_bg_color' ) ) {
			echo '.hero-section {background-color: ' . get_theme_mod( 'ras_dashen_front_hero_section_bg_color' ) . '}';
		}
		// section title color
		if ( get_theme_mod( 'ras_dashen_front_hero_section_hdng_color' ) ) {
			echo '.hero-section .section-title {color: ' . get_theme_mod( 'ras_dashen_front_hero_section_hdng_color' ) . '}';
		}
		// excerpt block title color
		if ( get_theme_mod( 'ras_dashen_front_hero_hdng_color' ) ) {
			echo '.hero-section .block-title {color: ' . get_theme_mod( 'ras_dashen_front_hero_hdng_color' ) . '}';
		}
		// excerpt block text color
		if ( get_theme_mod( 'ras_dashen_front_hero_text_color' ) ) {
			echo '.hero-section .excerpt-block p {color: ' . get_theme_mod( 'ras_dashen_front_hero_text_color' ) . '}';
		}

		// ------about_site section customized styles------
		// section bg color
		if ( get_theme_mod( 'ras_dashen_front_about_site_section_bg_color' ) ) {
			echo '.about-site-section {background-color: ' . get_theme_mod( 'ras_dashen_front_about_site_section_bg_color' ) . '}';
		}
		// excerpt block bg color
		if ( get_theme_mod( 'ras_dashen_about_site_excerpt_blocks_bg_color' ) ) {
			echo '.about-site-section .excerpt-block {background-color: ' . get_theme_mod( 'ras_dashen_about_site_excerpt_blocks_bg_color' ) . '}';
		}
		// excerpt block title color
		if ( get_theme_mod( 'ras_dashen_about_site_excerpt_blocks_title_color' ) ) {
			echo '.about-site-section .block-title a {color: ' . get_theme_mod( 'ras_dashen_about_site_excerpt_blocks_title_color' ) . '}';
		}
		// excerpt block text color
		if ( get_theme_mod( 'ras_dashen_about_site_excerpt_blocks_text_color' ) ) {
			echo '.about-site-section .excerpt-block p {color: ' . get_theme_mod( 'ras_dashen_about_site_excerpt_blocks_text_color' ) . '}';
		}
		// btn bg color
		if ( get_theme_mod( 'ras_dashen_about_site_btn_bg_color' ) ) {
			echo '.about-site-section .btn-main-light {background-color: ' . get_theme_mod( 'ras_dashen_about_site_btn_bg_color' ) . '}';
		}
		// btn text color
		if ( get_theme_mod( 'ras_dashen_about_site_btn_link_color' ) ) {
			echo '.about-site-section .btn-main-light {color: ' . get_theme_mod( 'ras_dashen_about_site_btn_link_color' ) . '}';
		}

		// ------latest_picks section customizer styles------
		if ( get_theme_mod( 'ras_dashen_latest_picks_section_bg_color' ) ) {
			echo '.latest-picks-section {background-color: ' . get_theme_mod( 'ras_dashen_latest_picks_section_bg_color' ) . '}';
		}
		// section title color
		if ( get_theme_mod( 'ras_dashen_latest_picks_section_hdng_color' ) ) {
			echo '.latest-picks-section .section-title {color: ' . get_theme_mod( 'ras_dashen_latest_picks_section_hdng_color' ) . '}';
		}
		// excerpt block title color
		if ( get_theme_mod( 'ras_dashen_latest_picks_excerpt_blocks_title_color' ) ) {
			echo '.latest-picks-section .block-title {color: ' . get_theme_mod( 'ras_dashen_latest_picks_excerpt_blocks_title_color' ) . '}';
		}
		// excerpt block text color
		if ( get_theme_mod( 'ras_dashen_latest_picks_excerpt_blocks_text_color' ) ) {
			echo '.latest-picks-section .excerpt-block p {color: ' . get_theme_mod( 'ras_dashen_latest_picks_excerpt_blocks_text_color' ) . '}';
		}
		// btn bg color
		if ( get_theme_mod( 'ras_dashen_latest_picks_btn_bg_color' ) ) {
			echo '.latest-picks-section .btn-main-dark {background-color: ' . get_theme_mod( 'ras_dashen_latest_picks_btn_bg_color' ) . '}';
		}
		// btn text color
		if ( get_theme_mod( 'ras_dashen_about_site_btn_link_color' ) ) {
			echo '.latest-picks-section .btn-main-dark {color: ' . get_theme_mod( 'ras_dashen_about_site_btn_link_color' ) . '}';
		}

		// ------primary_features section customizer styles------
		if ( get_theme_mod( 'ras_dashen_primary_feature_section_bg_color' ) ) {
			echo '.primary-features-section {background-color: ' . get_theme_mod( 'ras_dashen_primary_feature_section_bg_color' ) . '}';
		}
		// section title color
		if ( get_theme_mod( 'ras_dashen_primary_feature_section_hdng_color' ) ) {
			echo '.primary-features-section .section-title {color: ' . get_theme_mod( 'ras_dashen_primary_feature_section_hdng_color' ) . '}';
		}
		
		// excerpt blocks bg color
		if ( get_theme_mod( 'ras_dashen_primary_feature_excerpt_blocks_bg_color' ) ) {
			echo '.primary-features-section .primary-feature {background-color: ' . get_theme_mod( 'ras_dashen_primary_feature_excerpt_blocks_bg_color' ) . '}';
		}
		// excerpt block title color
		if ( get_theme_mod( 'ras_dashen_primary_feature_excerpt_blocks_title_color' ) ) {
			echo '.primary-features-section .featured-title a {color: ' . get_theme_mod( 'ras_dashen_primary_feature_excerpt_blocks_title_color' ) . '}';
		}
		// excerpt block text color
		if ( get_theme_mod( 'ras_dashen_primary_feature_excerpt_blocks_text_color' ) ) {
			echo '.primary-features-section .featured-text p {color: ' . get_theme_mod( 'ras_dashen_primary_feature_excerpt_blocks_text_color' ) . '}';
		}
		// btn bg color
		if ( get_theme_mod( 'ras_dashen_primary_feature_btn_bg_color' ) ) {
			echo '.primary-features-section .btn-main-dark {background-color: ' . get_theme_mod( 'ras_dashen_primary_feature_btn_bg_color' ) . '}';
		}
		// btn text color
		if ( get_theme_mod( 'ras_dashen_primary_feature_btn_link_color' ) ) {
			echo '.primary-features-section .btn-main-dark {color: ' . get_theme_mod( 'ras_dashen_primary_feature_btn_link_color' ) . '}';
		}



		/**
		* ----primary services section customizer styles----
		*/
		if ( get_theme_mod( 'ras_dashen_primary_services_section_bg_color' ) ) {
			echo '.primary-services-section {background-color: ' . get_theme_mod( 'ras_dashen_primary_services_section_bg_color' ) . '}';
		}
		// section title color
		if ( get_theme_mod( 'ras_dashen_primary_services_section_hdng_color' ) ) {
			echo '.primary-services-section .section-title {color: ' . get_theme_mod( 'ras_dashen_primary_services_section_hdng_color' ) . '}';
		}
		
		// cards bg color
		if ( get_theme_mod( 'ras_dashen_primary_services_cards_bg_color' ) ) {
			echo '.primary-services-section .card.service-card {background-color: ' . get_theme_mod( 'ras_dashen_primary_services_cards_bg_color' ) . '}';
		}
		// card title color
		if ( get_theme_mod( 'ras_dashen_primary_services_cards_title_color' ) ) {
			echo '.primary-services-section .card-title a {color: ' . get_theme_mod( 'ras_dashen_primary_services_cards_title_color' ) . '}';
		}
		// card text color
		if ( get_theme_mod( 'ras_dashen_primary_services_cards_text_color' ) ) {
			echo '.primary-services-section .card-text {color: ' . get_theme_mod( 'ras_dashen_primary_services_cards_text_color' ) . '}';
		}
		// btn bg color
		if ( get_theme_mod( 'ras_dashen_primary_services_btn_bg_color' ) ) {
			echo '.primary-services-section .btn-main-dark {background-color: ' . get_theme_mod( 'ras_dashen_primary_services_btn_bg_color' ) . '}';
		}
		// btn text color
		if ( get_theme_mod( 'ras_dashen_primary_services_btn_link_color' ) ) {
			echo '.primary-services-section .btn-main-dark {color: ' . get_theme_mod( 'ras_dashen_primary_services_btn_link_color' ) . '}';
		}

		/**
		* ----featured products section customizer styles----
		*/
		if ( get_theme_mod( 'ras_dashen_featured_products_section_bg_color' ) ) {
			echo '.featured-products-section {background-color: ' . get_theme_mod( 'ras_dashen_featured_products_section_bg_color' ) . '}';
		}
		// section title color
		if ( get_theme_mod( 'ras_dashen_featured_products_section_hdng_color' ) ) {
			echo '.featured-products-section .section-title {color: ' . get_theme_mod( 'ras_dashen_featured_products_section_hdng_color' ) . '}';
		}
		// cards bg color
		if ( get_theme_mod( 'ras_dashen_featured_products_cards_bg_color' ) ) {
			echo '.featured-products-section .card.product-card {background-color: ' . get_theme_mod( 'ras_dashen_featured_products_cards_bg_color' ) . '}';
		}
		// card title color
		if ( get_theme_mod( 'ras_dashen_featured_products_cards_title_color' ) ) {
			echo '.featured-products-section .card-title a {color: ' . get_theme_mod( 'ras_dashen_featured_products_cards_title_color' ) . '}';
		}
		// btn bg color
		if ( get_theme_mod( 'ras_dashen_featured_products_btn_bg_color' ) ) {
			echo '.featured-products-section .light-outline-btn {background-color: ' . get_theme_mod( 'ras_dashen_featured_products_btn_bg_color' ) . '}';
		}
		// btn text color
		if ( get_theme_mod( 'ras_dashen_featured_products_btn_text_color' ) ) {
			echo '.featured-products-section .light-outline-btn {color: ' . get_theme_mod( 'ras_dashen_featured_products_btn_text_color' ) . '}';
		}

		
		/**
		* ----secondary services section customizer styles----
		*/
		if ( get_theme_mod( 'ras_dashen_secondary_services_section_bg_color' ) ) {
			echo '.secondary-services-section {background-color: ' . get_theme_mod( 'ras_dashen_secondary_services_section_bg_color' ) . '}';
		}
		// section title color
		if ( get_theme_mod( 'ras_dashen_secondary_services_section_hdng_color' ) ) {
			echo '.secondary-services-section .section-title {color: ' . get_theme_mod( 'ras_dashen_secondary_services_section_hdng_color' ) . '}';
		}
		// cards bg color
		if ( get_theme_mod( 'ras_dashen_secondary_services_cards_bg_color' ) ) {
			echo '.secondary-services-section .card.service-card {background-color: ' . get_theme_mod( 'ras_dashen_secondary_services_cards_bg_color' ) . '}';
		}
		// card title color
		if ( get_theme_mod( 'ras_dashen_secondary_services_cards_title_color' ) ) {
			echo '.secondary-services-section .card-title a {color: ' . get_theme_mod( 'ras_dashen_secondary_services_cards_title_color' ) . '}';
		}
		// card text color
		if ( get_theme_mod( 'ras_dashen_secondary_services_cards_text_color' ) ) {
			echo '.secondary-services-section .card-text {color: ' . get_theme_mod( 'ras_dashen_secondary_services_cards_text_color' ) . '}';
		}
		// btn bg color
		if ( get_theme_mod( 'ras_dashen_secondary_services_btn_bg_color' ) ) {
			echo '.secondary-services-section .btn-main-dark {background-color: ' . get_theme_mod( 'ras_dashen_secondary_services_btn_bg_color' ) . '}';
		}
		// btn text color
		if ( get_theme_mod( 'ras_dashen_secondary_services_btn_link_color' ) ) {
			echo '.secondary-services-section .btn-main-dark {color: ' . get_theme_mod( 'ras_dashen_secondary_services_btn_link_color' ) . '}';
		}


		/**
		* ----featured resources section customizer styles----
		*/
		if ( get_theme_mod( 'ras_dashen_featured_resources_section_bg_color' ) ) {
			echo '.featured-resources-section {background-color: ' . get_theme_mod( 'ras_dashen_featured_resources_section_bg_color' ) . '}';
		}
		// section title color
		if ( get_theme_mod( 'ras_dashen_featured_resources_section_hdng_color' ) ) {
			echo '.featured-resources-section .section-title {color: ' . get_theme_mod( 'ras_dashen_featured_resources_section_hdng_color' ) . '}';
		}
		// cards bg color
		if ( get_theme_mod( 'ras_dashen_featured_resources_cards_bg_color' ) ) {
			echo '.featured-resources-section .card.resource-card {background-color: ' . get_theme_mod( 'ras_dashen_featured_resources_cards_bg_color' ) . '}';
		}
		// card title color
		if ( get_theme_mod( 'ras_dashen_featured_resources_cards_title_color' ) ) {
			echo '.featured-resources-section .card-title a {color: ' . get_theme_mod( 'ras_dashen_featured_resources_cards_title_color' ) . '}';
		}
		// card text color
		if ( get_theme_mod( 'ras_dashen_featured_resources_cards_text_color' ) ) {
			echo '.featured-resources-section .card-text {color: ' . get_theme_mod( 'ras_dashen_featured_resources_cards_text_color' ) . '}';
		}
		// btn bg color
		if ( get_theme_mod( 'ras_dashen_featured_resources_btn_bg_color' ) ) {
			echo '.featured-resources-section .btn-main-dark {background-color: ' . get_theme_mod( 'ras_dashen_featured_resources_btn_bg_color' ) . '}';
		}
		// btn text color
		if ( get_theme_mod( 'ras_dashen_featured_resources_btn_link_color' ) ) {
			echo '.featured-resources-section .btn-main-dark {color: ' . get_theme_mod( 'ras_dashen_featured_resources_btn_link_color' ) . '}';
		}


		/**
		* ----current affairs section customizer styles----
		*/
		if ( get_theme_mod( 'ras_dashen_current_affairs_section_bg_color' ) ) {
			echo '.ui-front-currentaffairs {background-color: ' . get_theme_mod( 'ras_dashen_current_affairs_section_bg_color' ) . '}';
		}
		// section title color
		if ( get_theme_mod( 'ras_dashen_current_affairs_section_hdng_color' ) ) {
			echo '.ui-front-currentaffairs .ui-front-heading .heading-title {color: ' . get_theme_mod( 'ras_dashen_current_affairs_section_hdng_color' ) . '}';
		}
		// carousel caption bg color
		if ( get_theme_mod( 'ras_dashen_current_affairs_carousel_caption_bg_color' ) ) {
			echo '.ui-front-currentaffairs .offseted-carousel .carousel-caption {background-color: ' . get_theme_mod( 'ras_dashen_current_affairs_carousel_caption_bg_color' ) . '}';
		}
		// carousel caption color
		if ( get_theme_mod( 'ras_dashen_current_affairs_carousel_caption_color' ) ) {
			echo '.ui-front-currentaffairs .offseted-carousel .carousel-caption, .ui-front-currentaffairs .offseted-carousel .carousel-caption .entry-title a {color: ' . get_theme_mod( 'ras_dashen_current_affairs_carousel_caption_color' ) . '}';
		}

	} // end is_front_page 
	


	
	?>
	</style>
	<?php
}
