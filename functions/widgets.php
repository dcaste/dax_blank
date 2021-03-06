<?php
/**
 * Register widget areas.
 *
 * @package dax_blank
 */

if ( ! function_exists( 'dax_blank_sidebars' ) ) :

	function dax_blank_sidebars() {
		$args = array(
			'id'						=> 'sidebar-1',
			'class'         => 'sidebar-1',
			'name'          => __( 'Sidebar Area 1', 'dax_blank' ),
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
			'before_widget' => '<aside class="widget %2$s">',
			'after_widget'  => '</aside>',
		);
		register_sidebar( $args );

	}
	add_action( 'widgets_init', 'dax_blank_sidebars' );

endif;

// Allow shortcodes in widgets.
add_filter('widget_text', 'do_shortcode');

// Removes <p> in widgets.
add_filter('widget_text', 'shortcode_unautop');
