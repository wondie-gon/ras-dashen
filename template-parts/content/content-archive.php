<?php
/**
 * Template part for displaying archive posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ras_Dashen
 *
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'row py-2' ); ?>>
<?php  
	// video post format in archive list
	if ( has_post_format( 'video' ) ) {
		// class of excerpt
		$excerpt_div_classes = array( 'col-md-7 post-entry-content' );
	?>
		<div class="col-md-5">
			<a class="media-holder video-link" href="<?php the_permalink(); ?>">
				<?php echo ras_dashen_get_embedded_video( get_the_ID() ); ?>
			</a>
		</div>
	<?php
	// audio post format in archive list
	} elseif ( has_post_format( 'audio' ) ) {
		// class of excerpt
		$excerpt_div_classes = array( 'col-md-7 post-entry-content' );
	?>
	<div class="col-md-5">
		<a class="media-holder audio-link" href="<?php the_permalink(); ?>">
			<?php echo ras_dashen_get_embedded_audio( get_the_ID() ); ?>
		</a>
	</div>
	<?php
	} elseif ( has_post_format( array( 'image', 'gallery' ) ) ) {
		// class of excerpt
		$excerpt_div_classes = array( 'col-md-7 post-entry-content' );
		?>
		<a class="col-md-5 featured-img-link" href="<?php the_permalink(); ?>">
			<?php 
				$img_url = ras_dashen_get_attachment_url( 1 );
			?>
			<img src="<?php echo esc_url( $img_url ); ?>" class="img-fitBox" />
		</a>
		<?php
	} else { 

		if ( has_post_thumbnail() ) {

			// get url of post thumbnail
          	$bg_img_url = ras_dashen_get_thumbnail_url( get_the_ID(), 'ras-dashen-featured-img-mid' );
			?>
			<a class="col-md-5 featured-img-link" href="<?php the_permalink(); ?>">
				<div class="bgimg zooms-when-hovered rounded-65" style="background-image: url(<?php echo $bg_img_url; ?>);"></div>
			</a>
			<?php

			// class of excerpt
			$excerpt_div_classes = array( 'col-md-7 post-entry-content' );

		} else {

			// class of excerpt
			$excerpt_div_classes = array( 'col-12 post-entry-content' );

		}
	}
?>

  	<div class="<?php echo esc_attr( implode( ' ', $excerpt_div_classes ) ); ?>">

  		<div class="entry-content row">
  			<header class="entry-header col-12">
			<?php
				echo sprintf( 
                  '<h2 class="entry-title"><a href="%1$s" rel="bookmark">%2$s</a></h2>', 
                   esc_url( get_permalink() ), 
                   sprintf( __( '%s', 'ras-dashen' ), 
                    esc_html( get_the_title() )
                    )
                  );

				if ( 'post' === get_post_type() ) :
			?>
				<div class="entry-meta">
					<?php
					ras_dashen_posted_on();
					ras_dashen_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-summary col-12">
				<?php
				the_excerpt( sprintf(
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
			</div><!-- .entry-summary -->

			<?php 
				// txonomy badges
				ras_dashen_get_post_taxonomies(); 
			?>

			<div class="entry-footer col-12">

				<a class="btn-main-dark my-2" href="<?php the_permalink(); ?>"><?php _e( 'Learn More', 'ras-dashen' ); ?>
					<i class="fa fa-arrow-right"></i>
				</a>

			</div><!-- .entry-footer -->
  		</div><!-- .entry-content -->
    	
  	</div><!-- .col-md-7.post-excerpt -->

</article><!-- #post-<?php the_ID(); ?> -->
