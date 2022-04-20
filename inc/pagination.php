<?php
/**
 * Pagination layout.
 *
 * @package Ras_Dashen
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'ras_dashen_pagination' ) ) {

	function ras_dashen_pagination( $args = array(), $class = 'pagination' ) {

		if ( $GLOBALS['wp_query']->max_num_pages <= 1 ) {
			return;
		}

		$args = wp_parse_args(
			$args,
			array(
				'mid_size'           => 2,
				'prev_next'          => true,
				'prev_text'          => __( '&laquo;', 'ras-dashen' ),
				'next_text'          => __( '&raquo;', 'ras-dashen' ),
				'screen_reader_text' => __( 'Posts navigation', 'ras-dashen' ),
				'type'               => 'array',
				'current'            => max( 1, get_query_var( 'paged' ) ),
			)
		);

		$links = paginate_links( $args );

		?>

		<nav aria-label="<?php echo $args['screen_reader_text']; ?>">

			<ul class="pagination">

				<?php
				foreach ( $links as $key => $link ) {
					?>
					<li class="page-item <?php echo strpos( $link, 'current' ) ? 'active' : ''; ?>">
						<?php echo str_replace( 'page-numbers', 'page-link', $link ); ?>
					</li>
					<?php
				}
				?>

			</ul>

		</nav>

		<?php
	}
}

