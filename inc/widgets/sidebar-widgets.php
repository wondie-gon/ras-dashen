<?php
/**
 * Theme sidebar widget
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @package Ras_Dashen
 * @since 1.0.0
 */
function ras_dashen_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ras-dashen' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ras-dashen' ),
			'before_widget' => '<li id="%1$s" class="list-group-item mb-4 widget %2$s">',
	        'after_widget'  => '</li>',
	        'before_title'  => '<h3 class="widget-title">',
	        'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'ras_dashen_widgets_init' );