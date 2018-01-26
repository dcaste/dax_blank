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

		// Menu support.
		add_theme_support('menus');

	}

	add_action( 'after_setup_theme', 'dax_blank_theme_support' );

endif; // End if Theme Support function exists.
