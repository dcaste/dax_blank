<?php
/**
 * Home Slideshow.
 * Carga los campos del homepage y los imprime en el slideshow.
 *
 * @package dax_blank
 */

?>

<?php
if ( have_rows( 'home_slideshow' ) ) :
?>

	<section class="home-slideshow">

		<?php
		while ( have_rows( 'home_slideshow' ) ) :
			the_row();

			// Variables.
			$foto = get_sub_field( 'foto' );

			if ( $foto ) {
				$foto_sm  = $foto['sizes']['slideshow-mobile'];
				$foto_md  = $foto['sizes']['medium'];
				$foto_mdl = $foto['sizes']['medium_large'];
				$foto_lg  = $foto['sizes']['large'];
				$foto_alt = $foto['alt'];
			}

			if ( ! $foto_alt ) {
				$foto_alt = "Promoción de Farmacias MEDCO Xolotlán";
			}

			$boton = get_sub_field( 'agregar_boton' );
			$color = get_sub_field( 'color' );

			/**
			 * Orden de columnas de foto y contenido en las áreas del grid.
			 * En backend, 1 = izquierda, 2 = derecha.			 * 
			 */
			$order_foto      = get_sub_field( 'foto_alineac' );
			$order_contenido = 0;
			if ( '1' === $order_foto ) {
				$order_contenido = 'derecha';
				$order_foto      = 'izquierda';
			} else {
				$order_contenido = 'izquierda';
				$order_foto      = 'derecha';
			}

		?>

		<!-- Inicia item del slideshow -->
		<div class="slider-item <?php the_sub_field( 'color' ); ?>" >
			<div class="container">

				<div class="slider-foto <?php echo esc_html( $order_foto ); ?>">
					<img class="lazy"
					srcset="<?php echo esc_url( $foto_sm ); ?> 420w,
									<?php echo esc_url( $foto_mdl ); ?> 768w,"
					sizes="(max-width: 320px) 320px,
									(max-width: 414px) 414px,
									(max-width: 768px) 768px,
									(max-width: 1024px) 512px,
									(max-width: 1280px) 632px,"
					src=<?php echo esc_url( $foto_mdl ); ?> alt="<?php echo esc_html( $foto_alt ); ?>" />
				</div>

				<div class="slider-contenido <?php echo esc_html( $order_contenido ); ?>">

					<?php if ( get_sub_field( 'headline' ) ) { ?>
						<h2 class="headline">
							<?php the_sub_field( 'headline' ); ?>
						</h2>
					<?php } ?>

					<?php if ( get_sub_field( 'tagline' ) ) { ?>
						<div class="tagline">
							<?php the_sub_field( 'tagline' ); ?>
						</div>
					<?php } ?>

					<?php if ( true === $boton ) { ?>
						<p class="area-boton">
							<a href="<?php the_sub_field( 'boton_url' ); ?>" class="boton-blanco">
								<?php the_sub_field( 'boton_copy' ); ?>
							</a>
						</p>
					<?php } ?>

				</div>

			</div>
		</div>
		<!-- Finaliza item -->

		<?php
		endwhile;
		?>

	</section>

<?php
endif; // Finaliza si existen campos en el slideshow.
