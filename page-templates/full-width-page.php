<?php
/**
 * Template Name: Full Width Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Ras_Dashen
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
<div id="content" class="container-fluid ui-page-main pages-main-wrapper">

	<div class="row">

		<main id="primary" class="site-main col-12 main-content-col">

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

			</div>

		</main><!-- #main -->

	</div><!-- .row end -->

</div><!-- #content -->

<?php get_footer(); ?>
