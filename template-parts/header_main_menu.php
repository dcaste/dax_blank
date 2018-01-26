<?php
/**
 * HEader Main Menu
 *
 * @package dax_blank
 */

// Prints the main menu.
$menu_defaults = array(
	'theme_location'	=> 'main',
	'menu' 				=> '',
	'container' 		=> false,
	'container_class' 	=> '',
	'container_id' 		=> '',
	'menu_class' 		=> '',
	'menu_id' 			=> '',
	'echo'				=> true,
	'fallback-cb'		=> '',
	'before'			=> '',
	'after'				=> '',
	'link_before'		=> '',
	'link_after'		=> '',
	'items_wrap'		=> '<ul class="%2$s">%3$s</ul>',
	'depth' 			=> 0,
	'walker' 			=> ''
);
echo '<div>';
wp_nav_menu( $menu_defaults );
echo '</div>';
