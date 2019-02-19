<?php
/**
 * Widgets sidebar.
 *
 * @package dax_blank
 */

if ( ! is_active_sidebar( 'main_sidebar' ) || ! is_active_sidebar( 'secondary_sidebar' ) ) {
	return;
}
?>

<aside id="sidebar">
	<?php dynamic_sidebar(); ?>
</aside>