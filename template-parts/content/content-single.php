<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ras_Dashen
 *
 * @since 1.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-12' ); ?>>
	<div class="row no-gutters">
		<header class="col-12 entry-header">
		<?php 
	        echo sprintf( 
	          '<h2 class="entry-title">%1$s</h2>', 
	           sprintf( __( '%s', 'ras-dashen' ), 
	            esc_html( get_the_title() )
	            )
	          );
	    ?>
			<div class="entry-meta my-2">
			<?php
				ras_dashen_posted_on();
				ras_dashen_posted_by();
			?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->
		<?php  
	  	 /**
	      * get social media share links
	      *
	      * Hook - ras_dashen_post_social_media_share
	      * @hooked ras_dashen_post_social_media_share_action - 10
	      */
	      do_action( 'ras_dashen_post_social_media_share' );

	      if( has_post_thumbnail() ) {
	  	?>
		<div class="col-12 post-thumbnail single-post-img">
			<?php ras_dashen_post_thumbnail(); ?>
		</div>
		<?php } ?>
	  	<div class="col-12 entry-content">
	  		<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ras-dashen' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ras-dashen' ),
					'after'  => '</div>',
				) );
			?>
	  	</div><!-- .col-12.entry-content -->

	  	<div class="col-12 entry-footer">
	  		<?php
	  			// category list, tag list, comment link 
	  			ras_dashen_entry_footer(); 
	  		?>
	  	</div><!-- .col-12.entry-footer -->
  	</div><!-- .row.no-gutters -->
</article><!-- #post-<?php the_ID(); ?> -->