<?php
/**
 * HEader Main Menu
 *
 * @package dax_blank
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Prints the main menu called "Top Bar".
$menu_defaults = array(
	'theme_location'	=> 'main',
	'menu' 				=> '',
	'container' 		=> false,
	'container_class' 	=> '',
	'container_id' 		=> '',
	'menu_class' 		=> 'dropdown menu',
	'menu_id' 			=> 'menu_main',
	'echo'				=> true,
	'fallback-cb'		=> '',
	'before'			=> '',
	'after'				=> '',
	'link_before'		=> '',
	'link_after'		=> '',
	'items_wrap'		=> '<ul id="%1$s" class="%2$s" data-dropdown-menu data-disable-hover="true" data-click-open="true">%3$s</ul>',
	'depth' 			=> 0,
	'walker' 			=> ''
);
echo '<div class="small-12 medium-7 columns">';
wp_nav_menu( $menu_defaults );
echo '</div>';
