<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ras_Dashen
 */

if ( in_category( 'uncategorized' ) ) {
	return false;
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-12' ); ?>>

	<div class="row">

		<div class="col-md-5 post-thumbnail">
			<?php ras_dashen_post_thumbnail(); ?>
		</div>

	  	<div class="col-md-7 post-entry-content">

	  		<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php
				ras_dashen_posted_on();
				ras_dashen_posted_by();
				?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
			</header><!-- .entry-header -->
			
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->

			<footer class="entry-footer col-12">
			<?php
				// txonomy badges
				ras_dashen_get_post_taxonomies();
			?>
			</footer><!-- .entry-footer -->
	    	
	  	</div><!-- .col-md-7.post-entry-content -->

  	</div><!-- .row.no-gutters -->

</article><!-- #post-<?php the_ID(); ?> -->
