<?php
/**
 * @package dax_blank
 */

// Add theme support.
require_once( get_template_directory().'/functions/theme-support.php' );

// Register menus and menu walkers.
require_once( get_template_directory().'/functions/menu.php' );

// Configure thumbnails and image related functions.
require_once( get_template_directory().'/functions/thumbnails.php' );

// Enqueue scripts.
require_once( get_template_directory().'/functions/enqueue.php' );

// Widget areas.
require_once( get_template_directory().'/functions/widgets.php' );

// Clean up functions.
// require_once( get_template_directory().'/functions/cleanup.php' );

// Clean up menu code.
// require_once( get_template_directory().'/functions/cleanup_menu.php' );

// Pagination.
require_once( get_template_directory().'/functions/pagination.php' );

// Comments.
require_once( get_template_directory().'/functions/comments.php' );

// Add Woocommerce.
require_once( get_template_directory().'/functions/woocommerce.php' );

// Add helpers functions.
require_once( get_template_directory().'/functions/helpers.php' );
