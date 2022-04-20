<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Ras_Dashen
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="py-2 wrapper" id="archive-wrapper">

	<div class="container-fluid ui-page-main pages-main-wrapper" id="content" tabindex="-1">

		<div class="row">
			
			<main id="primary" class="site-main col-md-8 main-content-col">
				<div class="row main-inner-row">
				<?php if ( have_posts() ) : ?>

					<header class="archive-header col-12">
					<?php
						the_archive_title( '<h1 class="archive-title">', '</h1>' );
						// the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
					</header><!-- .archive-header -->

				<?php
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
					<?php
				else :
					get_template_part( 'template-parts/content/content', 'none' );
				?>
				<?php endif; ?>
					<!-- pagination row -->
					<div class="col-12 py-2 pagination-col">
						<?php ras_dashen_pagination(); ?>
					</div><!-- .pagination-col -->
				</div><!-- .row.main-inner-row -->
			</main><!-- #primary.site-main.col-md-8 -->
		
		<?php get_sidebar(); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #archive-wrapper -->

<?php get_footer(); ?>
