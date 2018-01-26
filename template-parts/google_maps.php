<?php
/**
 * Google Maps
 *
 * @package dax_blank
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$location = get_field( 'mapa', 'option' );
if(  $location ):
?>
<div class="acf-map">
	<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
</div>
<?php endif; ?>
