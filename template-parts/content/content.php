<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ras_Dashen
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-12' ); ?>>

	<div class="row">

		<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
			<div class="post-thumbnail col-md-5">
				<a href="<?php the_permalink(); ?>">
					<?php ras_dashen_post_thumbnail(); ?>
				</a>
			</div><!-- .post-thumbnail -->
		<?php endif; ?>

		<div class="col-md-7 post-entry-content">
			<div class="row">
				<header class="entry-header col-12">
					<?php

					if ( is_single() ) {
						the_title( '<h1 class="entry-title">', '</h1>' );
					} elseif ( is_front_page() && is_home() ) {
						the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
					} else {
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					}

					if ( 'post' === get_post_type() ) {
						echo '<div class="entry-meta my-2">';
						if ( is_single() ) {
							ras_dashen_posted_on();
						} else {
							ras_dashen_posted_on();
							ras_dashen_posted_by();
						}
						echo '</div><!-- .entry-meta -->';
					}

					
					?>
				</header><!-- .entry-header -->
				<div class="entry-content col-12">
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

					<a class="btn-main-dark my-2" href="<?php the_permalink(); ?>"><?php _e( 'Learn More', 'ras-dashen' ); ?>
						<i class="fa fa-arrow-right"></i>
					</a>
				</div><!-- .entry-content -->
			</div><!-- .row -->
		</div>

		<?php
		if ( is_single() ) {
			ras_dashen_get_post_taxonomies();
		}
		?>
	</div><!-- .row.no-gutters -->

</article><!-- #post-<?php the_ID(); ?> -->
