<?php
/**
 * Register a main menu position.
 *
 * @package dax_blank
 */

if ( ! function_exists( 'dax_blank_menus' ) ) :

	function dax_blank_menus() {
		$locations = array(
			'main' => __( 'Main Menu', 'dax_blank' )
		);
		register_nav_menus( $locations );
	}

add_action( 'init', 'dax_blank_menus' );

endif;
