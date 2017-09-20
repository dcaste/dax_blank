<?php
/**
 * @package dax_blank
 */
?>
<aside id="sidebar" class="small-12 large-4 columns">

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar_1')) ?>
	</div>

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar_2')) ?>
	</div>

</aside>