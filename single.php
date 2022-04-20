<?php
/**
 * The template for displaying all single posts.
 *
 * @package wonsa
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="py-2 wrapper" id="single-wrapper">

	<div class="container-fluid ui-page-main pages-main-wrapper" id="content" tabindex="-1">

		<div class="row">

			<main id="primary" class="site-main col-md-8 main-content-col single-post">
				<div class="row main-inner-row">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content/content', 'single' ); ?>

					<?php ras_dashen_post_nav(); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

				</div><!-- .row.main-inner-row -->

				<?php  
					/**
					* Getting related posts
					* Hook - ras_dashen_show_related_posts
					*
					* @hooked ras_dashen_show_related_posts_action
					*
					*/
					do_action( 'ras_dashen_show_related_posts', get_the_ID() );

					/**
					* Getting related video posts
					* Hook - ras_dashen_show_related_video_posts
					*
					* @hooked ras_dashen_show_related_video_posts_action
					*
					*/
					do_action( 'ras_dashen_show_related_video_posts', get_the_ID() );
					
				?>
			</main><!-- #main -->

			<?php get_sidebar(); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php get_footer(); ?>
