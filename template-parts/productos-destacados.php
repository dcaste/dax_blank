<?php
/**
 * Productos destacados de WooCommerce.
 *
 * @package dax_blank
 */

?>
<section id="productos-destacados" class="grid-container wow fadeInUp" data-wow-duration="1s">
	<h2 class="titulo">¡Aprovechá<br/><span class="color-rojo">nuestras Ofertas!</span></h2>
	<?php	echo do_shortcode( '[products limit="6"]' ); ?>
	<?php	$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>
	<p class="ir-tienda"><a href="<?php echo esc_url( $shop_page_url );?>" class="button">Ir a la tienda <i class="icon-right"></i></a></p>
</section>