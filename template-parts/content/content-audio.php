<?php
/**
* Template part for displaying video posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Ras_Dashen
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col' ); ?>>

	<div class="row no-gutters">

		<div class="card card-sm card-audio">
			<?php if ( is_single() ) { ?>
				<div class="card-body">
					<div class="d-flex flex-column flex-md-row justify-content-between align-items-start">
				      	<h2 class="entry-title"><?php the_title(); ?></h2>
				      	<div class="text-muted"><?php ras_dashen_posted_on(); ?></div>
				  	</div>
					<div class="entry-content">
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
	                </div>
	            </div><!-- .card-body -->
			<?php } else { ?>
				<a class="media-holder audio-link" href="<?php the_permalink(); ?>">
		        	<?php echo ras_dashen_get_embedded_audio( get_the_ID() ); ?>
		        </a>
		        <div class="card-body">
		          	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		            <div class="text-muted">
		             <?php ras_dashen_posted_on(); ?>
		            </div>
		        </div>
			<?php } ?>
	  	</div>

  	</div><!-- .row.no-gutters -->

</article><!-- #post-<?php the_ID(); ?> -->