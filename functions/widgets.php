<?php
/**
 * Register widget areas.
 *
 * @package dax_blank
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! function_exists( 'dax_blank_sidebars' ) ) {

	function dax_blank_sidebars() {
		$args = array(
			'id'            => 'sidebar_1',
			'class'         => 'sidebar_1',
			'name'          => __( 'Sidebar 1', 'dax_blank' ),
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
		);
		register_sidebar( $args );

		$args = array(
			'id'            => 'sidebar_2',
			'class'         => 'sidebar_2',
			'name'          => __( 'Sidebar 2', 'dax_blank' ),
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
		);
		register_sidebar( $args );

	} // Ends Sidebars function.

	add_action( 'widgets_init', 'dax_blank_sidebars' );

} // End if Sidebars function exists.

// Allow shortcodes in widgets.
add_filter('widget_text', 'do_shortcode');

// Removes <p> in widgets.
add_filter('widget_text', 'shortcode_unautop');
