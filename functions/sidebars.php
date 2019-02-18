<?php
/**
 * Register sidebar areas.
 *
 * @package dax_blank
 */

if ( ! function_exists( 'dax_blank_sidebars' ) ) {

	/**
	 * Register sidebars.
	 */
	function dax_blank_sidebars() {
		$args = array(
			'id'            => 'main_sidebar',
			'class'         => 'main_sidebar',
			'name'          => 'Main sidebar',
			'description'   => 'Main sidebar description',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
			'before_widget' => '<div class="widget %2$s">',
			'after_widget'  => '</div>',
		);
		register_sidebar( $args );

		$args = array(
			'id'            => 'secondary_sidebar',
			'class'         => 'secondary_sidebar',
			'name'          => 'Secondary sidebar',
			'description'   => 'Secondary sidebar description',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
			'before_widget' => '<div class="widget %2$s">',
			'after_widget'  => '</div>',
		);
		register_sidebar( $args );

	}

	add_action( 'widgets_init', 'dax_blank_sidebars' );

}
