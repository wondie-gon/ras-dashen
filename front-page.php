<?php
/**
 * The front page template file
 *
 * This template file is to display custom front page of the website
 *
 * @package Ras_Dashen
 *
 * @since 1.0.0
 */
get_header();
?>

  <main class="ui-page-main py-3">

    <!-- frontpage hero section -->
    <?php get_template_part( 'inc/templates/frontpage/hero' ); ?>

    <!-- frontpage about-site section -->
    <?php get_template_part( 'inc/templates/frontpage/about-site' ); ?>

    <!-- frontpage latest-picks display -->
    <?php get_template_part( 'inc/templates/frontpage/latest-picks' ); ?>

    <!-- frontpage section to display primary-features of the website -->
    <?php get_template_part( 'inc/templates/frontpage/primary-features' ); ?>

    <!-- frontpage section to display primary-services provided by company -->
    <?php get_template_part( 'inc/templates/frontpage/primary-services' ); ?>

    <!-- frontpage section to display other featured products -->
    <?php get_template_part( 'inc/templates/frontpage/featured-products' ); ?>

    <!-- frontpage section to display other secondary-services -->
    <?php get_template_part( 'inc/templates/frontpage/secondary-services' ); ?>

    <!-- frontpage section to display other featured-resources -->
    <?php get_template_part( 'inc/templates/frontpage/featured-resources' ); ?>

  </main><!-- main.ui-page-main -->
<?php
get_footer();