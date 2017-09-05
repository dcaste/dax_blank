<?php
/**
 * Enqueue scripts.
 *
 * @package dax_blank
 */

// Enqueue the main Stylesheet.
if ( ! function_exists( 'dax_blank_register_styles' ) ) :
	function dax_blank_register_styles()
	{
		wp_register_style('styles', get_template_directory_uri() . '/assets/css/styles.css', array(), '1.0.0', 'all');
		wp_enqueue_style('styles');
		wp_register_style('fontawesome', 'https://use.fontawesome.com/50b3308390.css', array(), '4.7.0', 'all');
		wp_enqueue_style('fontawesome');
	}
	add_action( 'wp_enqueue_scripts', 'dax_blank_register_styles' );
	add_action( 'login_enqueue_scripts', 'dax_blank_register_styles', 10 ); // Add our styes to Login page.
endif;

if ( ! function_exists( 'dax_blank_register_scripts' ) ) :

	function dax_blank_register_scripts() {

		// Deregister the jquery version bundled with WordPress.
		wp_deregister_script( 'jquery' );

		// jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
		wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-3.2.1.min.js', array(), '3.2.1', false );

		// Site scripts loaded at the footer. jQuery is required in the array.
		wp_enqueue_script( 'dax_blank_js', get_template_directory_uri() . '/assets/js/scripts.min.js', array('jquery'), '1.0.0', true );

		// Add the comment-reply library on pages where it is necessary.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	} // Ends function.

	add_action( 'wp_enqueue_scripts', 'dax_blank_register_scripts', 999 );

endif;
