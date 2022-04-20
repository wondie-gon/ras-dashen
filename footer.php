<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package Ras_Dashen
 * 
 * @since 1.0.0
 */
?>

			<footer id="footerMain" class="site-footer container-fluid ui-sitemain-footer">
				<!-- inner-top section -->
				<?php get_template_part( 'template-parts/footer/footer', 'inner-top' ); ?>

				<?php  
					/**
					* Hook - ras_dashen_footer_social_media_links
					*
					* @hooked ras_dashen_footer_social_media_links_action - 10
					*/
					do_action( 'ras_dashen_footer_social_media_links' );
				?>

				<!-- inner-bottom section -->
				<?php get_template_part( 'template-parts/footer/footer', 'inner-bottom' ); ?>

				<!-- footer social media links -->

				<?php  
					/**
					* Hook - ras_dashen_scroll_to_top_feature
					*
					* @hooked ras_dashen_scroll_to_top_feature_action - 10
					*/
					do_action( 'ras_dashen_scroll_to_top_feature' );
				?>
	    
			</footer><!-- #footerMain -->
		</div><!-- #page -->

		<?php wp_footer(); ?>

</body>
</html>
