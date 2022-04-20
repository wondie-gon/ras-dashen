<?php
/**
 * Site brand in navigation bar
 *
 * @package Ras_Dashen
 *
 * @since 1.0.0
 */

$ras_dashen_site_info    = get_bloginfo( 'name' );
$ras_dashen_site_description  = get_bloginfo( 'description', 'display' );
// $show_site_title   = ( true === get_theme_mod( 'display_title_and_tagline', true ) );
?>

<div id="site-logo" class="navbar-brand site-branding">

	<?php
		if ( has_custom_logo() ) {
			the_custom_logo();
		} else {

			// use stored logo
			if ( is_front_page() || is_home() ) { ?>

				<img class="logo" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/logo.svg'; ?>" alt="<?php echo esc_html( $ras_dashen_site_info ); ?>&#39;s logo" />

				<?php if ( display_header_text() === true ) { ?>
					<span class="site-title"><?php echo esc_html( $ras_dashen_site_info ); ?></span>
			<?php } ?>

			<?php } else { ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					
					<img class="logo" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/logo.svg'; ?>" alt="<?php echo esc_html( $ras_dashen_site_info ); ?>&#39;s logo" />

					<?php if ( display_header_text() === true ) { ?>
						<span class="site-title"><?php echo esc_html( $ras_dashen_site_info ); ?></span>
					<?php } ?>

				</a>
			<?php } ?>

	<?php } ?>
	
</div><!-- #site-logo.navbar-brand.site-branding -->
