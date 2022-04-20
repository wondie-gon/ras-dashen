<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ras_Dashen
 */
?>

<article id="page-<?php the_ID(); ?>" <?php post_class( 'col-12' ); ?>>
	<div class="row no-gutters">

		<?php 
			 
			if ( has_post_thumbnail() ) {

				// image size
				$image_size = 'ras-dashen-featured-img-mid';

				// get src of post thumbnail
              	$bg_img_url = ras_dashen_get_thumbnail_url( get_the_ID(), $image_size );

				$pg_header_style = ' style="background-image: linear-gradient(to bottom, rgba(71, 115, 140, 0.6), rgba(65, 178, 226, 0.8)), url(' . esc_url( $bg_img_url ) . '); background-image: -webkit-linear-gradient(to bottom, rgba(71, 115, 140, 0.6), rgba(65, 178, 226, 0.8)), url(' . esc_url( $bg_img_url ) . ');"';
				

			} else {

				// svg imgs srcs
	            $building_svg = get_template_directory_uri() . '/assets/images/buildings-illustration.svg';

	            $gradient = get_template_directory_uri() . '/assets/images/hdr-gradient.svg';

				$pg_header_style = ' style="background-image: url(' . esc_url( $building_svg ) . '), url(' . esc_url( $gradient ) . ');"';

			}
		?>

		<header class="col-12 header-bg-img"<?php echo $pg_header_style; ?>>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .header-bg-img -->

		<div class="col-12 entry-content">
			<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ras-dashen' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

		<?php if ( get_edit_post_link() ) : ?>
		<footer class="col-12 entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'ras-dashen' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
		<?php endif; ?>

	</div><!-- .row.no-gutters -->
</article><!-- #post-<?php the_ID(); ?> -->
