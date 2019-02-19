<?php
/**
 * Comercios Afiliados.
 *
 * @package dax_blank
 */

?>

<?php
$args = array(
	'post_type' => array( 'medco_comercios' ),
);
$comercios = new WP_Query( $args );
if ( $comercios->have_posts() ) :
?>

	<section id="comercios-afiliados">

		<div class="grid-container">

			<header>
				<h2 class="titulo">Comercios <span class="color-rojo">Afiliados</span></h2>	
				<p>Al ser miembro del programa salud al día podés hacer uso de tu memebresía en la red de comercios afiliados y presentando tu membresía obtenés descuentos preferenciales.</p>
			</header>

			<div class="comercios">
				<?php
				while ( $comercios->have_posts() ) :
					$comercios->the_post();
				?>

				<div class="comercio">
					<?php if ( has_post_thumbnail() ) { ?>
						<p class="foto"><?php the_post_thumbnail( 'medium' ); ?></p>
					<?php } ?>
					<p class="promocion"><?php the_field( 'promo' ); ?></p>
					<p class="desc"><?php the_field( 'promo_desc' ); ?></p>
				</div>

				<?php endwhile; ?>

				</div>
				
			</div>

	</section>

<?php
endif; // Finaliza si hay posts.
wp_reset_postdata();
