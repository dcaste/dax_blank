<?php
/**
 * Funciones y definiciones del theme.
 *
 * @package dax_blank
 */

require get_template_directory() . '/functions/theme-support.php';

require get_template_directory() . '/functions/enqueue.php';

require get_template_directory() . '/functions/helpers.php';

require get_template_directory() . '/functions/menu.php';

require get_template_directory() . '/functions/sidebars.php';

require get_template_directory() . '/functions/thumbnails.php';

require get_template_directory() . '/functions/pagination.php';

if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/functions/woocommerce.php';
}
