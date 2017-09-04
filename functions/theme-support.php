<?php
/**
 * Theme support.
 *
 * @package dax_blank
 */

if ( ! function_exists( 'dax_blank_theme_support' ) ) :

	function dax_blank_theme_support() {

		// Wordpress will create the <title> tag.
		add_theme_support( 'title-tag' );

		// Support for thumbnails and custom image sizes. Custom image sizes are found in /functions/thumbnails.php.
		add_theme_support('post-thumbnails');

		// Print fields in HTML5 format.
		add_theme_support( 'html5', array('search-form','comment-form','comment-list','gallery','caption', ) );

		// Add post formats support: http://codex.wordpress.org/Post_Formats
		add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat') );

		// Declare WooCommerce support per http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
		add_theme_support( 'woocommerce' );

		// Add styles.css as editor style https://codex.wordpress.org/Editor_Style
		add_editor_style( '/css/styles.min.css' );

		// RSS.
		// add_theme_support( 'automatic-feed-links' );

		// Menu support.
		add_theme_support('menus');

	} // End Theme Support function.

	add_action( 'after_setup_theme', 'dax_blank_theme_support' );

endif; // End if Theme Support function exists.