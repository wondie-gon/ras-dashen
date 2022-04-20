<?php
/**
 * Template part for displaying content with gallery post format 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ras_Dashen
 *
 * @since 1.0.0
 */
  
?>
<article id="gallery-<?php the_ID(); ?>" <?php post_class( 'col-md-6 mb-4 gallery-col' ); ?>>
  <div class="card card-sm">
    <a href="<?php the_permalink(); ?>" class="d-block">
      <?php 
			$img_url = ras_dashen_get_attachment_url( 1 );
		?>
		<img src="<?php echo esc_url( $img_url ); ?>" class="img-fitBox" />
    </a>
    <div class="card-body">
		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		<div class="text-muted"><?php ras_dashen_posted_on(); ?></div>
    </div><!-- .card-body -->
  </div>
</article><!-- #gallery-<?php the_ID(); ?> -->