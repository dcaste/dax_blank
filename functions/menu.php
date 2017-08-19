<?php
/**
 * Register menus and functions to call them.
 *
 * @package dax_blank
 */

if ( ! function_exists( 'dax_blank_menus' ) ) :
	function dax_blank_menus() {
		$locations = array(
			'main' => __( 'Main Menu' ),
			//'footer' => __( 'Footer Menu' ),
			//'other' => __( 'Other Menu' ),
		);
		register_nav_menus( $locations );
	}
add_action( 'init', 'dax_blank_menus' );
endif; // Ends if Menu function exists.
