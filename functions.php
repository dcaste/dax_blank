<?php
/**
 * Theme functions.
 *
 * @package dax_blank
 *
 */

require get_template_directory() . '/functions/theme-support.php';

require get_template_directory() . '/functions/enqueue.php';

require get_template_directory() . '/functions/miscellaneous.php';

require get_template_directory() . '/functions/menu.php';

require get_template_directory() . '/functions/sidebars.php';

require get_template_directory() . '/functions/thumbnails.php';

// Add WooCommerce functions.
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/functions/woocommerce.php';
}

// Display ACF Plugin requirement.
if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	add_action('admin_notices', function() {
			echo '<h2>This theme requires Advanced Custom Fields plugin.</h2>';
	});
}
