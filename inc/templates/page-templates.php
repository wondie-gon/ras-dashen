<?php
/**
 * Template functions for action hooks to be used in various pages
 * 
 * @package Ras_Dashen
 */

/**
* Action hook for front hero section
*
*/
add_action( 'ras_dashen_hero_section', 'front_hero_section_start_action', 10 );
// add_action( 'ras_dashen_hero_section', 'ras_dashen_display_hero_section_title_action', 15 );
add_action( 'ras_dashen_hero_section', 'ras_dashen_display_front_custom_hero_action', 20 );
add_action( 'ras_dashen_hero_section', 'front_hero_section_end_action', 25 );

/**
* Function to start front hero section
*
*/
if ( ! function_exists( 'front_hero_section_start_action' ) ) {
	function front_hero_section_start_action() {
		?>
		<section class="hero-section">
  			<div class="container-fluid section-inner">
  				<div class="row content-wrap-row">
		<?php
	}
}

/**
* Function to end front hero section
*
*/
if ( ! function_exists( 'front_hero_section_end_action' ) ) {
	function front_hero_section_end_action() {
		?>
				</div><!-- .content-wrap-row -->
			</div><!-- .section-inner -->
			<?php ras_dashen_render_svg_hero_section_divider(); ?>
		</section><!-- .hero-section -->
		<hr class="section-divider my-5">
		<?php
	}
}

/**
* Action hook for front about_site section
*
*/
add_action( 'ras_dashen_about_site_section', 'front_about_site_section_start_action', 10 );
add_action( 'ras_dashen_about_site_section', 'ras_dashen_front_about_site_content_action', 15 );
add_action( 'ras_dashen_about_site_section', 'front_about_site_section_end_action', 20 );

/**
* Function to start front about_site section
*
*/
if ( ! function_exists( 'front_about_site_section_start_action' ) ) {
	function front_about_site_section_start_action() {
		?>
		<section class="about-site-section py-3">
  			<div class="container-fluid section-inner">
  				<div class="row row-cols-2 row-cols-md-3 content-wrap-row">
		<?php
	}
}

/**
* Function to end front about_site section
*
*/
if ( ! function_exists( 'front_about_site_section_end_action' ) ) {
	function front_about_site_section_end_action() {
		?>
				</div><!-- .content-wrap-row -->
			</div><!-- .section-inner -->
		</section><!-- .about-site-section -->
		<hr class="section-divider my-5">
		<?php
	}
}

/**
* Action hook for front latest_picks section
*
*/
add_action( 'ras_dashen_latest_picks_section', 'front_latest_picks_section_start_action', 10 );
add_action( 'ras_dashen_latest_picks_section', 'ras_dashen_display_latest_picks_section_heading_action', 15 );
add_action( 'ras_dashen_latest_picks_section', 'ras_dashen_display_front_post_latest_picks_action', 20 );
add_action( 'ras_dashen_latest_picks_section', 'front_latest_picks_section_end_action', 25 );

/**
* Function to start front latest picks section
*
*/
if ( ! function_exists( 'front_latest_picks_section_start_action' ) ) {
	function front_latest_picks_section_start_action() {
		?>
		<section class="latest-picks-section py-3">
  			<div class="container-fluid section-inner">
		<?php
	}
}

/**
* Function to end front latest_picks section
*
*/
if ( ! function_exists( 'front_latest_picks_section_end_action' ) ) {
	function front_latest_picks_section_end_action() {
		?>		
			</div><!-- .section-inner -->
		</section><!-- .latest-picks-section -->
		<hr class="section-divider my-5">
		<?php
	}
}

/**
* Action hook for front primary_features section
*
*/
add_action( 'ras_dashen_primary_features', 'front_primary_features_list_section_start_action', 10 );
add_action( 'ras_dashen_primary_features', 'ras_dashen_primary_feature_section_header_action', 15 );
add_action( 'ras_dashen_primary_features', 'ras_dashen_front_primary_features_content_action', 20 );
add_action( 'ras_dashen_primary_features', 'front_primary_features_list_section_end_action', 25 );

/**
* Function to start front primary_features list section
*
*/
if ( ! function_exists( 'front_primary_features_list_section_start_action' ) ) {
	function front_primary_features_list_section_start_action() {
		?>
		<section class="primary-features-section py-3">
  			<div class="container-fluid section-inner">
  				<div class="row content-wrap-row">
		<?php
	}
}

/**
* Function to end front primary_features list section
*
*/
if ( ! function_exists( 'front_primary_features_list_section_end_action' ) ) {
	function front_primary_features_list_section_end_action() {
		?>
				</div><!-- .content-wrap-row -->
			</div><!-- .section-inner -->
		</section><!-- .primary-features-section -->
		<hr class="section-divider my-5">
		<?php
	}
}

/**
* Action hook for front primary_services section
*
*/
add_action( 'ras_dashen_primary_services_section', 'front_primary_services_section_start_action', 10 );
add_action( 'ras_dashen_primary_services_section', 'ras_dashen_front_primary_services_section_header_action', 15 );
add_action( 'ras_dashen_primary_services_section', 'ras_dashen_front_primary_services_content_blocks_action', 20 );
add_action( 'ras_dashen_primary_services_section', 'front_primary_services_section_end_action', 25 );

/**
* Function to start front primary_services section
*
*/
if ( ! function_exists( 'front_primary_services_section_start_action' ) ) {
	function front_primary_services_section_start_action() {
		?>
		<section class="primary-services-section">
			<?php ras_dashen_render_svg_primary_services_section_divider(); ?>
  			<div class="container-fluid section-inner">
  				<div class="row content-wrap-row">
		<?php
	}
}

/**
* Function to end front primary_services section
*
*/
if ( ! function_exists( 'front_primary_services_section_end_action' ) ) {
	function front_primary_services_section_end_action() {
		?>
				</div><!-- .content-wrap-row -->
			</div><!-- .section-inner -->
		</section><!-- .primary-services-section -->
		<hr class="section-divider my-5">
		<?php
	}
}

/**
* Action hook for front featured_products section
*
*/
add_action( 'ras_dashen_featured_products_section', 'front_featured_products_section_start_action', 10 );
add_action( 'ras_dashen_featured_products_section', 'ras_dashen_front_featured_products_section_header_action', 15 );
add_action( 'ras_dashen_featured_products_section', 'ras_dashen_display_selected_front_featured_products_action', 20 );
add_action( 'ras_dashen_featured_products_section', 'front_featured_products_section_end_action', 25 );

/**
* Function to start front featured_products section
*
*/
if ( ! function_exists( 'front_featured_products_section_start_action' ) ) {
	function front_featured_products_section_start_action() {
		?>
		<section class="featured-products-section py-3">
  			<div class="container-fluid section-inner">
		<?php
	}
}

/**
* Function to end front featured_products section
*
*/
if ( ! function_exists( 'front_featured_products_section_end_action' ) ) {
	function front_featured_products_section_end_action() {
		?>
			</div><!-- .section-inner -->
		</section><!-- .featured-products-section -->
		<hr class="section-divider my-5">
		<?php
	}
}

/**
* Action hook for front secondary_services section
*
*/
add_action( 'ras_dashen_secondary_services_section', 'front_secondary_services_section_start_action', 10 );
add_action( 'ras_dashen_secondary_services_section', 'ras_dashen_front_secondary_services_section_header_action', 15 );
add_action( 'ras_dashen_secondary_services_section', 'ras_dashen_front_secondary_services_content_blocks_action', 20 );
add_action( 'ras_dashen_secondary_services_section', 'front_secondary_services_section_end_action', 25 );

/**
* Function to start front secondary_services section
*
*/
if ( ! function_exists( 'front_secondary_services_section_start_action' ) ) {
	function front_secondary_services_section_start_action() {
		?>
		<section class="secondary-services-section py-3">
  			<div class="container-fluid section-inner">
  				<div class="row content-wrap-row">
		<?php
	}
}

/**
* Function to end front secondary_services section
*
*/
if ( ! function_exists( 'front_secondary_services_section_end_action' ) ) {
	function front_secondary_services_section_end_action() {
		?>
				</div><!-- .content-wrap-row -->
			</div><!-- .section-inner -->
		</section><!-- .secondary-services-section -->
		<hr class="section-divider my-5">
		<?php
	}
}

/**
* Action hook for front featured_resources section
*
*/
add_action( 'ras_dashen_featured_resources_section', 'front_featured_resources_section_start_action', 10 );
add_action( 'ras_dashen_featured_resources_section', 'ras_dashen_front_featured_resources_section_header_action', 15 );
add_action( 'ras_dashen_featured_resources_section', 'ras_dashen_display_selected_front_featured_resources_action', 20 );
add_action( 'ras_dashen_featured_resources_section', 'front_featured_resources_section_end_action', 25 );

/**
* Function to start front featured_resources section
*
*/
if ( ! function_exists( 'front_featured_resources_section_start_action' ) ) {
	function front_featured_resources_section_start_action() {
		?>
		<section class="featured-resources-section py-3">
  			<div class="container-fluid section-inner">
  				<div class="row content-wrap-row">
		<?php
	}
}

/**
* Function to end front featured_resources section
*
*/
if ( ! function_exists( 'front_featured_resources_section_end_action' ) ) {
	function front_featured_resources_section_end_action() {
		?>
				</div><!-- .content-wrap-row -->
			</div><!-- .section-inner -->
		</section><!-- .featured-resources-section -->
		<hr class="section-divider my-5">
		<?php
	}
}