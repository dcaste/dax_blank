<?php
/**
 * Foto Principal
 *
 * @package dax_blank
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$icono = get_field( 'logo_sec', 'option' );

if ( is_archive() ) {
	$queried_object = get_queried_object();
	$titulo = $queried_object->name;
	$imagen = get_field('foto_cat', $queried_object );
	$imagen_vert = $image = get_field('foto_cat_vert', $queried_object );
} else {
	$imagen = get_field( 'img_h' );
	$imagen_vert = get_field( 'img_v' );
	$titulo = get_the_title();
}
if ( empty( $imagen ) ) {
	$imagen = get_template_directory_uri() . '/img/cdh_fallback_image.jpg';
}
if ( empty( $imagen_vert ) ) {
	$imagen_vert = get_template_directory_uri() . '/img/cdh_fallback_image.jpg';
}
?>
<div id="foto-principal" data-interchange="[<?php echo $imagen_vert ?>, portrait], [<?php echo $imagen ?>, landscape]" >
	<div class="wrapper">
		<div id="foto_content" class="row align-center align-middle">
			<div id="slide_content" class="columns">
				<?php if( $icono ) { ?>
					<div id="slide_icono" class="hide-for-large">
						<img src="<?php echo $icono['url']; ?>" alt="<?php echo $icono['alt']; ?>" />
					</div>
				<?php } ?>
				<h1 id="titulo"><?php echo esc_html( $titulo ) ?></h1>
			</div>
		</div>
		<div class="wrapper-color"><span></span></div>
	</div>
</div>
