<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Ras_Dashen
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<section class="no-results not-found col-12">
	<div class="row no-gutters">

		<header class="page-header col-12">

			<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'ras-dashen' ); ?></h1>

		</header><!-- .page-header -->

		<div class="page-content col-12">

			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

				<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'ras-dashen' ), array(
					'a' => array(
						'href' => array(),
					),
				) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

			<?php elseif ( is_search() ) : ?>

				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ras-dashen' ); ?></p>
				<?php
					get_search_form();
			else : ?>

				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ras-dashen' ); ?></p>
				<?php
					get_search_form();
			endif; ?>
		</div><!-- .page-content -->

	</div><!-- .row.no-gutters -->
</section><!-- .no-results -->
