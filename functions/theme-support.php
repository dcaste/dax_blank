<?php
/**
 * Theme support.
 *
 * @package dax_blank
 */

if ( ! function_exists( 'dax_blank_theme_support' ) ) :

	/**
	 * Add several theme support functions.
	 *
	 */
	function dax_blank_theme_support() {

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'menus' );

		add_theme_support( 'responsive-embeds' );

	}

	add_action( 'after_setup_theme', 'dax_blank_theme_support' );

endif;
