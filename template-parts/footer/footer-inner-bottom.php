<?php
/**
 * The template for displaying footer's inner bottom
 *
 * @package Ras_Dashen
 * 
 * @since 1.0.0
 */
// Get default customization
$default = ras_dashen_get_default_mods();

$ras_dashen_extra_footer_links = get_theme_mod( 'ras_dashen_enable_bottom_footer_page_links', $default['ras_dashen_enable_bottom_footer_page_links'] );
?>
<div class="row site-info inner-bottom">
    <!-- Extra footer -->
    <?php  
    	if ( true == $ras_dashen_extra_footer_links ) :
			
    		/*
			* Hook - ras_dashen_bottom_extra_footer
			*
			* @hooked ras_dashen_bottom_extra_footer_action - 10
			*/
			do_action( 'ras_dashen_bottom_extra_footer' );

		endif;

		/*
		* Hook - ras_dashen_bottom_footer_copyright_related
		*
		* @hooked ras_dashen_bottom_footer_copyright_related_action - 10
		*/
		do_action( 'ras_dashen_bottom_footer_copyright_related' );

	?>	

</div><!-- .row.inner-bottom -->