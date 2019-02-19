<?php
/**
 * Main footer navigation menu.
 *
 * @package dax_blank
 */

?>

<div id="footer-nav">
	<?php
	$footer_menu = array(
		'theme_location'  => 'footer',
		'menu'            => '',
		'container'       => '',
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => '',
		'menu_id'         => '',
		'echo'            => true,
		'fallback-cb'     => '',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => '',
	);
	wp_nav_menu( $footer_menu );
	?>
</div>
