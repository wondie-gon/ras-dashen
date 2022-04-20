<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Ras_Dashen
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="wrapper" id="page-wrapper">

	<div class="container-fluid ui-page-main pages-main-wrapper" id="content" tabindex="-1">

		<div class="row">

			<main id="primary" class="site-main col-md-8 main-content-col">

				<div class="row main-inner-row">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content/content', 'page' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

				</div><!-- .row.main-inner-row -->

			</main><!-- #main -->

			<?php get_sidebar(); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>
