<?php
/**
 * The template for displaying search results pages.
 *
 * @package wonsa
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="py-2 wrapper" id="search-wrapper">

	<div class="container-fluid ui-page-main pages-main-wrapper" id="content" tabindex="-1">

		<div class="row">

			<main id="primary" class="site-main col-md-8 main-content-col">
				<div class="row main-inner-row">

				<?php if ( have_posts() ) : ?>

					<header class="page-header col-12">

						<h1 class="page-title">
							<?php
							printf(
								/* translators: %s: query term */
								esc_html__( 'Search Results for: %s', 'wonsa' ),
								'<span>' . get_search_query() . '</span>'
							);
							?>
						</h1>

					</header><!-- .page-header -->

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content/content', 'search' );
						?>

					<?php endwhile; ?>

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

</div><!-- #search-wrapper -->

<?php get_footer(); ?>
