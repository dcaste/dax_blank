<?php
/**
 * Enqueue scripts.
 *
 * @package dax_blank
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'wp_enqueue_scripts', 'dax_blank_register_styles' );
add_action( 'wp_enqueue_scripts', 'dax_blank_register_scripts', 999 );

// Stylesheets.
if ( ! function_exists( 'dax_blank_register_styles' ) ) :
	function dax_blank_register_styles()
	{
		wp_register_style('styles', get_template_directory_uri() . '/assets/css/styles.css', array(), '1.0.0', 'all');
		wp_enqueue_style('styles');
		wp_register_style('fontawesome', '//use.fontawesome.com/releases/v5.0.4/js/all.js', array(), '5.0.4', 'all');
		wp_enqueue_style('fontawesome');
	}
endif;

/*
 * Scripts.
 * Deregister the jQuery version bundled with WordPress
 * and load it in the header since some plugins required it.
 * Change the 'false' attribute to 'true' if you want to load it in the footer.
*/
if ( ! function_exists( 'dax_blank_register_scripts' ) ) :

	function dax_blank_register_scripts() {

		wp_deregister_script( 'jquery' );

		wp_enqueue_script( 'jquery', get_template_directory_uri() . '//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), '3.3.1', false );

		// Custom scripts loaded at the footer. jQuery is required in the array.
		wp_enqueue_script( 'dax_blank_custom_js', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '1.0.0', true );

	}
endif;
