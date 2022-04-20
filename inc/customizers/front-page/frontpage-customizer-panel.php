<?php
/**
* Frontpage sections customizer panel
*
* 
* @package Ras_Dashen
* 
* @since 1.0.0
*/

// Adding frontpage customizer panel
$wp_customize->add_panel(
	'ras_dashen_frontpage_panel', 
	array(
		'title'				=>	esc_html__( 'Frontpage Sections', 'ras-dashen' ),
		'priority'			=>	125,
		'active_callback' 	=> 'is_front_page',
	)
);

// customizer for frontpage hero section
require get_template_directory() . '/inc/customizers/front-page/hero.php';

// customizer for frontpage about site section
require get_template_directory() . '/inc/customizers/front-page/about-site.php';

// customizer for frontpage latest picks section
require get_template_directory() . '/inc/customizers/front-page/latest-picks.php';

// customizer for frontpage primary features section
require get_template_directory() . '/inc/customizers/front-page/primary-features.php';
// customizer for frontpage primary_services highlight section
require get_template_directory() . '/inc/customizers/front-page/primary-services.php';

// customizer for frontpage featured_products highlight section
require get_template_directory() . '/inc/customizers/front-page/featured-products.php';

// customizer for frontpage secondary_services highlight section
require get_template_directory() . '/inc/customizers/front-page/secondary-services.php';

// customizer for frontpage featured_resources highlight section
require get_template_directory() . '/inc/customizers/front-page/featured-resources.php';

// customizer for frontpage company current affairs section
require get_template_directory() . '/inc/customizers/front-page/company-current-affairs.php';
