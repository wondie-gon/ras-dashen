<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package wonsa
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="py-2 wrapper" id="index-wrapper">

	<div class="container-fluid ui-page-main pages-main-wrapper" id="content" tabindex="-1">

		<div class="row">

			<main id="primary" class="site-main col-md-8 main-content-col">

				<div class="row main-inner-row">

				<?php if ( have_posts() ) :

					/* Start the Loop */
					while ( have_posts() ) : the_post();
						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content/content', get_post_format() );
					endwhile;
					?>

				<?php else : ?>

					<?php get_template_part( 'template-parts/content/content', 'none' ); ?>

				<?php endif; ?>
					<!-- pagination row -->
					<div class="col-12 py-2 pagination-col">
						<?php ras_dashen_pagination(); ?>
					</div><!-- .pagination-col -->

				</div><!-- .row.main-inner-row -->

			</main><!-- #main -->

			<?php get_sidebar(); ?>


		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php get_footer(); ?>
