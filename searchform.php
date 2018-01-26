<?php
/**
 * @package dax_blank
 */

if ( ! defined( 'ABSPATH' ) ) exit;

?>

<form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
	<input class="search-input" type="search" name="s" placeholder="<?php _e( 'To search, type and hit enter.' ); ?>">
	<button class="search-submit" type="submit" role="button"><?php _e( 'Search'); ?></button>
</form>
