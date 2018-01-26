<?php
/**
 * @package dax_blank
 */

// Theme constants.
define( 'DAX_BLANK_URI', get_template_directory_uri() ); // The parent theme directory.
define( 'DAX_BLANK_CHILD_URI', get_stylesheet_directory_uri() ); // The child theme directory.

// Add theme support.
require_once( get_template_directory().'/functions/theme-support.php' );

// Register menus and menu walkers.
require_once( get_template_directory().'/functions/menu.php' );

// Enqueue scripts.
require_once( get_template_directory().'/functions/enqueue.php' );

// Widget areas.
require_once( get_template_directory().'/functions/widgets.php' );

// Comments.
require_once( get_template_directory().'/functions/comments.php' );

// Add helpers functions.
require_once( get_template_directory().'/functions/helpers.php' );
