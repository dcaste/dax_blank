<?php
/**
 * Register a main menu position.
 *
 * @package dax_blank
 */

if ( ! function_exists( 'dax_blank_menus' ) ) :

	/**
	 * Register menu positions.
	 */
	function dax_blank_menus() {
		$locations = array(
			'main'   => 'Main menu',
			'footer' => 'Footer Menu',
		);
		register_nav_menus( $locations );
	}
	add_action( 'init', 'dax_blank_menus' );
endif;
