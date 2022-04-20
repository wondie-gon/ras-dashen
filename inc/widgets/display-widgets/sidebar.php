<?php
/**
* action hook functions for sidebar widget areas
*
* @package Ras_Dashen 
* @since 1.0.0
*
*/

/**
* Action hook function to display sidebar
*/
add_action( 'ras_dashen_sidebar', 'ras_dashen_sidebar_before_content', 10 );
add_action( 'ras_dashen_sidebar', 'ras_dashen_sidebar_content', 20 );
add_action( 'ras_dashen_sidebar', 'ras_dashen_sidebar_after_content', 30 );

// sidebar wrapper before content
if ( ! function_exists( 'ras_dashen_sidebar_before_content' ) ) {
	function ras_dashen_sidebar_before_content() {
		?>
		<aside id="secondary" class="widget-area col-md-4 sidebar-col" role="complementary">
		<?php
	}
}

// content of sidebar
if ( ! function_exists( 'ras_dashen_sidebar_content' ) ) {
	function ras_dashen_sidebar_content() {
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			?>
			<div class="row sidebar-inner mb-4">
				<div class="col-12 py-3">
					<ul class="list-group">
						<li class="list-group-item mb-4 widget widget-categories">
							<?php ras_dashen_sidebar_post_category_list(); ?>
						</li>
						<li class="list-group-item mb-4 widget widget-archive">
							<?php ras_dashen_sidebar_post_archive_list(); ?>
						</li>
					</ul><!-- .list-group -->
				</div>
			</div><!-- .row.sidebar-inner -->
			<?php
		} else { 
		?>
			<div class="row sidebar-inner mb-4">
				<div class="col-12">
					<ul class="list-group auto-sidebar">
						<?php dynamic_sidebar( 'sidebar-1' ); ?>
					</ul>
				</div>
			</div><!-- .row.sidebar-inner -->
		<?php
		}
	}
}

// sidebar wrapper after content
if ( ! function_exists( 'ras_dashen_sidebar_after_content' ) ) {
	function ras_dashen_sidebar_after_content() {
		?>
		</aside><!-- #secondary.widget-area.sidebar-col -->
		<?php
	}
}

// post archive list for sidebar
if ( ! function_exists( 'ras_dashen_sidebar_post_archive_list' ) ) {
	function ras_dashen_sidebar_post_archive_list() {

		$type        = 'monthly';

		$args = array(
		  'type'     => $type
		);  
		?>
		<ul class="list-group">
			<li class="list-group-item active"><b><?php _e( 'Archive', 'ras-dashen' ); ?></b></li>
			<?php wp_get_archives( $args ); ?>
		</ul>
		<?php
	}
}

// post categories list
if ( ! function_exists( 'ras_dashen_sidebar_post_category_list' ) ) {
	function ras_dashen_sidebar_post_category_list() {

		$rd_cats = get_terms( array(
	      'taxonomy'     => 'category', 
	      'hide_empty'   => 0, 
	      'parent'       => 0, 
	      'orderby'      => 'count',
	      'order'        => 'DESC',
	      ) ); 
		?>
		<?php

	    if ( ! empty( $rd_cats ) ) :
	    ?>

	        <ul class="list-group">
	            <li class="list-group-item active"><b><?php _e( 'Categories', 'ras-dashen' ); ?></b></li>
	            <?php 
	              foreach ( $rd_cats as $rd_cat ) {
	                $rd_cat_id = $rd_cat->term_id;
	                $rd_cat_name = $rd_cat->name;
	                $rd_cat_posts_count = $rd_cat->count;
	                echo sprintf( 
	                  '<li class="list-group-item d-flex justify-content-between align-items-center"><a href="%1$s">%2$s</a></li>', 
	                  esc_url( get_term_link( $rd_cat_id ) ), 
	                  // Translators: %s is a category name
	                  sprintf( 
	                    __( '%s', 'ras-dashen' ), 
	                    esc_attr( $rd_cat_name ) 
	                    ),
	                    esc_attr( $rd_cat_posts_count ) 
	                  );
	              } 
	            ?>
	        </ul>
	    <?php 
	    endif;
	}
}