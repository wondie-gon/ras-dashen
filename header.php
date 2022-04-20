<?php
/**
 * The header for theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package Ras_Dashen
 * 
 * @since 1.0.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
<!-- <meta charset="<?php bloginfo( 'charset' ); ?>"> -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">

		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'ras-dashen' ); ?></a>

		<?php 
			if ( is_front_page() && is_home() ) {

				$header_classes = array( 'site-header ui-main-header home-hdr' );

			} else {

				$header_classes = array( 'site-header ui-main-header' );

			} 
		?>

		<header id="masthead" class="<?php echo esc_attr( implode( ' ', $header_classes ) ); ?>">

			<?php

				// get all nav menu contents
				get_template_part( 'template-parts/header/navbar-wrapper' );

			?>
		</header><!-- #masthead -->
