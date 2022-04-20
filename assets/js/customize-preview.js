jQuery( document ).ready( function($) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.navbar.ui-main-navbar .navbar-brand a, .site-title, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	/**
	* customizer preview of frontpage hero section
	*/
	// section title
	wp.customize( 'ras_dashen_front_hero_section_heading', function( value ) {
		value.bind( function( newval ) {
			$( '.hero-section .section-title' ).text( newval );
		} );
	} );
	// excerpt block heading
	wp.customize( 'ras_dashen_front_hero_heading', function( value ) {
		value.bind( function( newval ) {
			$( '.hero-section .block-title' ).text( newval );
		} );
	} );
	// excerpt block text
	wp.customize( 'ras_dashen_front_hero_text', function( value ) {
		value.bind( function( newval ) {
			$( '.hero-section .excerpt-block p' ).text( newval );
		} );
	} );

	//Update section background color...
	wp.customize( 'ras_dashen_front_hero_section_bg_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.hero-section' ).css( 'backgroundColor', newval );
			}
		} );
	} );

	//Update section title color in real time...
	wp.customize( 'ras_dashen_front_hero_section_hdng_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.hero-section .section-title' ).css( 'color', newval );
			}
		} );
	} );

	// Update excerpt block title color
	wp.customize( 'ras_dashen_front_hero_hdng_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.hero-section .block-title' ).css( 'color', newval );
			}
		} );
	} );

	// Update excerpt block text color
	wp.customize( 'ras_dashen_front_hero_text_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.hero-section .excerpt-block p' ).css( 'color', newval );
			}
		} );
	} );

	/**
	* customizer preview of frontpage about_site section
	*/
	//Update section background color...
	wp.customize( 'ras_dashen_front_about_site_section_bg_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.about-site-section' ).css( 'backgroundColor', newval );
			}
		} );
	} );

	//Update excerpt block background color...
	wp.customize( 'ras_dashen_about_site_excerpt_blocks_bg_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.about-site-section .excerpt-block' ).css( 'backgroundColor', newval );
			}
		} );
	} );

	// Update excerpt block title color
	wp.customize( 'ras_dashen_about_site_excerpt_blocks_title_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.about-site-section .block-title a' ).css( 'color', newval );
			}
		} );
	} );

	//Update excerpt block excerpt color...
	wp.customize( 'ras_dashen_about_site_excerpt_blocks_text_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.about-site-section .excerpt-block p' ).css( 'color', newval );
			}
		} );
	} );

	// Update excerpt block btn background color...
	wp.customize( 'ras_dashen_about_site_btn_bg_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.about-site-section .btn-main-light' ).css( 'backgroundColor', newval );
			}
		} );
	} );

	// Update excerpt block btn link color...
	wp.customize( 'ras_dashen_about_site_btn_link_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.about-site-section .btn-main-light' ).css( 'color', newval );
			}
		} );
	} );

	/**
	* customizer preview of frontpage latest_picks section
	*/
	// section title text
	wp.customize( 'ras_dashen_front_latest_picks_section_heading', function( value ) {
		value.bind( function( newval ) {
			$( '.latest-picks-section .section-title' ).text( newval );
		} );
	} );
	//Update section background color...
	wp.customize( 'ras_dashen_latest_picks_section_bg_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.latest-picks-section' ).css( 'backgroundColor', newval );
			}
		} );
	} );
	//Update section title color
	wp.customize( 'ras_dashen_latest_picks_section_hdng_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.latest-picks-section .section-title' ).css( 'color', newval );
			}
		} );
	} );
	//Update excerpt block title color
	wp.customize( 'ras_dashen_latest_picks_excerpt_blocks_title_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.latest-picks-section .block-title a' ).css( 'color', newval );
			}
		} );
	} );
	//Update excerpt block excerpt color...
	wp.customize( 'ras_dashen_latest_picks_excerpt_blocks_text_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.latest-picks-section .excerpt-block p' ).css( 'color', newval );
			}
		} );
	} );
	// Update excerpt block btn background color...
	wp.customize( 'ras_dashen_latest_picks_btn_bg_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.latest-picks-section .btn-main-dark' ).css( 'backgroundColor', newval );
			}
		} );
	} );

	// Update excerpt block btn link color...
	wp.customize( 'ras_dashen_latest_picks_btn_link_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.latest-picks-section .btn-main-dark' ).css( 'color', newval );
			}
		} );
	} );

	/**
	* customizer preview of primary_features frontpage section
	*/
	// section title text
	wp.customize( 'ras_dashen_front_primary_feature_section_heading', function( value ) {
		value.bind( function( newval ) {
			$( '.primary-features-section .section-title' ).text( newval );
		} );
	} );

	// Update section background...
	wp.customize( 'ras_dashen_primary_feature_section_bg_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.primary-features-section' ).css( 'backgroundColor', newval );
			}
		} );
	} );
	//Update section title color
	wp.customize( 'ras_dashen_primary_feature_section_hdng_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.primary-features-section .section-title' ).css( 'color', newval );
			}
		} );
	} );
	// excerpt block bg color
	wp.customize( 'ras_dashen_primary_feature_excerpt_blocks_bg_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.primary-features-section .primary-feature' ).css( 'backgroundColor', newval );
			}
		} );
	} );
	//Update excerpt block title color
	wp.customize( 'ras_dashen_primary_feature_excerpt_blocks_title_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.primary-features-section .featured-title a' ).css( 'color', newval );
			}
		} );
	} );
	//Update excerpt block excerpt color...
	wp.customize( 'ras_dashen_primary_feature_excerpt_blocks_text_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.primary-features-section .featured-text p' ).css( 'color', newval );
			}
		} );
	} );
	// Update excerpt block btn background color...
	wp.customize( 'ras_dashen_primary_feature_btn_bg_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.primary-features-section .btn-main-dark' ).css( 'backgroundColor', newval );
			}
		} );
	} );

	// Update excerpt block btn color...
	wp.customize( 'ras_dashen_primary_feature_btn_link_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.primary-features-section .btn-main-dark' ).css( 'color', newval );
			}
		} );
	} );

	/**
	* primary services frontpage display live preview
	*/
	// section title text
	wp.customize( 'ras_dashen_front_primary_services_highlight_section_heading', function( value ) {
		value.bind( function( newval ) {
			$( '.primary-services-section .section-title' ).text( newval );
		} );
	} );

	// section intro text
	wp.customize( 'ras_dashen_front_primary_services_highlight_section_txt', function( value ) {
		value.bind( function( newval ) {
			$( '.primary-services-section .section-description' ).text( newval );
		} );
	} );

	// Update section background...
	wp.customize( 'ras_dashen_primary_services_section_bg_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.primary-services-section' ).css('backgroundColor', newval );
			}
		} );
	} );
	//Update section title color
	wp.customize( 'ras_dashen_primary_services_section_hdng_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.primary-services-section .section-title' ).css('color', newval );
			}
		} );
	} );
	// card bg color
	wp.customize( 'ras_dashen_primary_services_cards_bg_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.primary-services-section .card.service-card' ).css('backgroundColor', newval );
			}
		} );
	} );
	//Update cards title color
	wp.customize( 'ras_dashen_primary_services_cards_title_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.primary-services-section .card-title a' ).css('color', newval );
			}
		} );
	} );
	//Update card excerpt color...
	wp.customize( 'ras_dashen_primary_services_cards_text_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$('.primary-services-section .card-text').css('color', newval );
			}
		} );
	} );
	// Update business flows cards btn background color...
	wp.customize( 'ras_dashen_primary_services_btn_bg_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$('.primary-services-section .btn-main-dark').css('backgroundColor', newval );
			}
		} );
	} );

	/**
	* featured products front display live prreview
	*/
	// section title text
	wp.customize( 'ras_dashen_front_featured_products_list_section_heading', function( value ) {
		value.bind( function( newval ) {
			$( '.featured-products-section .section-title' ).text( newval );
		} );
	} );

	// section intro text
	wp.customize( 'ras_dashen_front_featured_products_list_section_txt', function( value ) {
		value.bind( function( newval ) {
			$( '.featured-products-section .section-description' ).text( newval );
		} );
	} );

	// Update section background...
	wp.customize( 'ras_dashen_featured_products_section_bg_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.featured-products-section' ).css('backgroundColor', newval );
			}
		} );
	} );
	//Update section title color
	wp.customize( 'ras_dashen_featured_products_section_hdng_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.featured-products-section .section-title' ).css('color', newval );
			}
		} );
	} );
	// card bg color
	wp.customize( 'ras_dashen_featured_products_cards_bg_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.featured-products-section .card.product-card' ).css('backgroundColor', newval );
			}
		} );
	} );
	//Update cards title color
	wp.customize( 'ras_dashen_featured_products_cards_title_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.featured-products-section .card-title a' ).css('color', newval );
			}
		} );
	} );
	// Update cards btn background color...
	wp.customize( 'ras_dashen_featured_products_btn_bg_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$('.featured-products-section .light-outline-btn').css('backgroundColor', newval );
			}
		} );
	} );
	//Update btn text color...
	wp.customize( 'ras_dashen_featured_products_btn_text_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$('.featured-products-section .light-outline-btn').css('color', newval );
			}
		} );
	} );

	/**
	* secondary services frontpage display live preview
	*/
	// section title text
	wp.customize( 'ras_dashen_front_secondary_services_highlight_section_heading', function( value ) {
		value.bind( function( newval ) {
			$( '.secondary-services-section .section-title' ).text( newval );
		} );
	} );

	// section intro text
	wp.customize( 'ras_dashen_front_secondary_services_highlight_section_txt', function( value ) {
		value.bind( function( newval ) {
			$( '.secondary-services-section .section-description' ).text( newval );
		} );
	} );

	// Update section background...
	wp.customize( 'ras_dashen_secondary_services_section_bg_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.secondary-services-section' ).css('backgroundColor', newval );
			}
		} );
	} );
	//Update section title color
	wp.customize( 'ras_dashen_secondary_services_section_hdng_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.secondary-services-section .section-title' ).css('color', newval );
			}
		} );
	} );
	// card bg color
	wp.customize( 'ras_dashen_secondary_services_cards_bg_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.secondary-services-section .card.service-card' ).css('backgroundColor', newval );
			}
		} );
	} );
	//Update cards title color
	wp.customize( 'ras_dashen_secondary_services_cards_title_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.secondary-services-section .card-title a' ).css('color', newval );
			}
		} );
	} );
	//Update card excerpt color...
	wp.customize( 'ras_dashen_secondary_services_cards_text_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$('.secondary-services-section .card-text').css('color', newval );
			}
		} );
	} );
	// Update secondary services cards btn background color...
	wp.customize( 'ras_dashen_secondary_services_btn_bg_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$('.secondary-services-section .btn-main-dark').css('backgroundColor', newval );
			}
		} );
	} );


	/**
	* featured resources front display live prreview
	*/
	// section title text
	wp.customize( 'ras_dashen_front_featured_resources_highlight_section_heading', function( value ) {
		value.bind( function( newval ) {
			$( '.featured-resources-section .section-title' ).text( newval );
		} );
	} );

	// section intro text
	wp.customize( 'ras_dashen_front_featured_resources_highlight_section_txt', function( value ) {
		value.bind( function( newval ) {
			$( '.featured-resources-section .section-description' ).text( newval );
		} );
	} );

	// Update section background...
	wp.customize( 'ras_dashen_featured_resources_section_bg_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.featured-resources-section' ).css('backgroundColor', newval );
			}
		} );
	} );
	//Update section title color
	wp.customize( 'ras_dashen_featured_resources_section_hdng_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.featured-resources-section .section-title' ).css('color', newval );
			}
		} );
	} );
	// card bg color
	wp.customize( 'ras_dashen_featured_resources_cards_bg_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.featured-resources-section .card.resource-card' ).css('backgroundColor', newval );
			}
		} );
	} );
	//Update cards title color
	wp.customize( 'ras_dashen_featured_resources_cards_title_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.featured-resources-section .card-title a' ).css('color', newval );
			}
		} );
	} );
	//Update card excerpt color...
	wp.customize( 'ras_dashen_featured_resources_cards_text_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$('.featured-resources-section .card-text').css('color', newval );
			}
		} );
	} );
	// Update cards btn background color...
	wp.customize( 'ras_dashen_featured_resources_btn_bg_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$('.featured-resources-section .btn-main-dark').css('backgroundColor', newval );
			}
		} );
	} );

	//Update btn text color...
	wp.customize( 'ras_dashen_featured_resources_btn_link_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$('.featured-products-section .btn-main-dark').css('color', newval );
			}
		} );
	} );

	/**
	* front current affairs customizer live prreview
	*/
	// section title text
	wp.customize( 'ras_dashen_front_current_affairs_section_heading', function( value ) {
		value.bind( function( newval ) {
			$( '.ui-front-currentaffairs .ui-front-heading .heading-title' ).text( newval );
		} );
	} );

	// Live preview of section background...
	wp.customize( 'ras_dashen_current_affairs_section_bg_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.ui-front-currentaffairs' ).css('backgroundColor', newval );
			}
		} );
	} );
	// Live preview of section title color
	wp.customize( 'ras_dashen_current_affairs_section_hdng_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.ui-front-currentaffairs .ui-front-heading .heading-title' ).css('color', newval );
			}
		} );
	} );
	// Live preview of s carousel caption bg color
	wp.customize( 'ras_dashen_current_affairs_carousel_caption_bg_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.ui-front-currentaffairs .offseted-carousel .carousel-caption' ).css('backgroundColor', newval );
			}
		} );
	} );
	//Live preview of carousel caption color
	wp.customize( 'ras_dashen_current_affairs_carousel_caption_color', function( value ) {
		value.bind( function( newval ) {
			if ( newval ) {
				$( '.ui-front-currentaffairs .offseted-carousel .carousel-caption, .ui-front-currentaffairs .offseted-carousel .carousel-caption .entry-title a' ).css('color', newval );
			}
		} );
	} );


	
} );