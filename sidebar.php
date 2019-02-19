<?php
/**
 * Sidebar de wisdgets.
 *
 * @package dax_blank
 */

if ( ! is_active_sidebar( 'sidebar_blog' ) ) {
	return;
}
?>

<aside class="sidebar-blog">
	<?php dynamic_sidebar( 'sidebar_blog' ); ?>
</aside><!-- #secondary -->
