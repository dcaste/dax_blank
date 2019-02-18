<?php
/**
 * Enqueue scripts.
 *
 * @package dax_blank
 */

if ( ! function_exists( 'dax_blank_register_css' ) ) :

	/**
	 * Enqueue CSS files.
	 */
	function dax_blank_register_css() {
		wp_register_style( 'styles', get_template_directory_uri() . 'dist/css/styles.css', array(), '1.0.0', 'all' );
		wp_enqueue_style( 'styles' );
	}

	add_action( 'wp_enqueue_scripts', 'dax_blank_register_css' );
	add_action( 'login_enqueue_scripts', 'dax_blank_register_css', 10 ); // Add styles to login area.

endif;

if ( ! function_exists( 'dax_blank_register_scripts' ) ) :

	/**
	 * Register JS scripts.
	 * Deregister the jQuery version bundled with WordPress and load it in the header since some plugins required it.
	 * Change the 'false' attribute to 'true' if you want to load it in  footer.
	 */
	function dax_blank_register_scripts() {
		if ( is_admin() ) {
			return;
		} else {
			wp_deregister_script( 'jquery' );
			wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), '3.3.1', false );
		}

		// Enqueue local scripts.
		wp_enqueue_script( 'medco-vendors', get_template_directory_uri() . '/dist/js/scripts.js', array(), '1.0.0', 'all' );
	}
	add_action( 'wp_enqueue_scripts', 'dax_blank_register_scripts' );

endif;
