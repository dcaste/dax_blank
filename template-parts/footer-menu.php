<?php
/**
 * Menú de navegación que aparece en el Footer.
 *
 * @package dax_blank
 */

?>

<div id="footer-nav" class="grid-container">
	<?php
	// Imprime el menú de navegación.
	$menu_footer = array(
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
	wp_nav_menu( $menu_footer );
	?>
</div>
