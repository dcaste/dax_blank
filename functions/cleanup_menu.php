<?php
/**
 * Clean up WordPress menu.
 *
 * @package dax_blank
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Removes <div> that wraps menus.
function remove_div_nav($args = '')
{
    $args['container'] = false;
    return $args;
}
add_filter('wp_nav_menu_args', 'remove_div_nav');

// Removes classes and ID's from <li> in navigation menus.
function remove_ids_clases_nav($var)
{
    return is_array($var) ? array() : '';
}
add_filter('nav_menu_css_class', 'remove_ids_clases_nav', 100, 1);	// Remove classes in <li>
add_filter('nav_menu_item_id', 'remove_ids_clases_nav', 100, 1);	// Remove ID's in <li>
add_filter('page_css_class', 'remove_ids_clases_nav', 100, 1);		// Remove ID's in pages in <li>
