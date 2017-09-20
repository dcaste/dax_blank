<?php
/**
 * Enqueue scripts.
 *
 * @package dax_blank
 */

// CSS files.
add_action( 'wp_enqueue_scripts', 'dax_blank_register_styles' ); // Add styles.
add_action( 'login_enqueue_scripts', 'dax_blank_register_styles', 10 ); // Add our styes to Login page.

// JS scripts. Use it in development process. It loads the scripts separately.
add_action( 'wp_enqueue_scripts', 'dax_blank_register_dev_scripts', 999 );

// Main JS script. Use it in production. It loads one single minified file.
// add_action( 'wp_enqueue_scripts', 'dax_blank_register_production_scripts', 999 );


// Enqueue the main Stylesheet.
if ( ! function_exists( 'dax_blank_register_styles' ) ) :
	function dax_blank_register_styles()
	{
		wp_register_style('styles', get_template_directory_uri() . '/assets/css/styles.css', array(), '1.0.0', 'all');
		wp_enqueue_style('styles');
		wp_register_style('fontawesome', 'https://use.fontawesome.com/50b3308390.css', array(), '4.7.0', 'all');
		wp_enqueue_style('fontawesome');
	}
endif;

// Loads several scripts used in the development process.
if ( ! function_exists( 'dax_blank_register_dev_scripts' ) ) :

	function dax_blank_register_dev_scripts() {

		// Deregister the jquery version bundled with WordPress.
		wp_deregister_script( 'jquery' );

		// jQuery placed in the header because some plugins require that jQuery is loaded in the header.
		wp_enqueue_script( 'jquery', get_template_directory_uri() . '/src/js/vendors/jquery.js', array(), '3.2.1', false );

		// What Input scripts loaded at the footer. jQuery is required in the array.
		wp_enqueue_script( 'what-input', get_template_directory_uri() . '/src/js/vendors/what-input.js', array('jquery'), '5.0.1', true );

		// Foundation scripts loaded at the footer. jQuery is required in the array.
		wp_enqueue_script( 'foundation', get_template_directory_uri() . '/src/js/vendors/foundation.js', array('jquery'), '6.4.3', true );

		// Custom scripts loaded at the footer. jQuery is required in the array.
		wp_enqueue_script( 'dax_blank_custom_js', get_template_directory_uri() . '/src/js/custom/custom_scripts.js', array('jquery'), '1.0.0', true );

		// Add the comment-reply library on pages where it is necessary.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	} // Ends function.
endif;

// Loads only one single JS file.
if ( ! function_exists( 'dax_blank_register_production_scripts' ) ) :

	function dax_blank_register_production_scripts() {

		wp_deregister_script( 'jquery' );
		wp_enqueue_script( 'dax_blank_js', get_template_directory_uri() . '/assets/js/scripts.min.js', array(), '1.0.0', true );

		// Add the comment-reply library on pages where it is necessary.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	} // Ends function.

endif;

