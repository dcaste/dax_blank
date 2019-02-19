<?php
/**
 * Lista de servicios en Homepage.
 *
 * @package dax_blank
 */

?>

<?php
$args = array(
	'post_type' => array( 'medco_servicios' ),
);

// The Query
$servicios = new WP_Query( $args );

// The Loop
if ( $servicios->have_posts() ) :
?>

<section id="home-servicios" class="grid-container">

	<?php
	while ( $servicios->have_posts() ) :
	$servicios->the_post();
	?>

		<div class="servicio">

			<?php if ( has_post_thumbnail() ) :

				?>
				<div class="servicio-foto">
					<a href="<?php the_permalink(); ?>" >
						<img class="lazy" data-src="<?php the_post_thumbnail_url( 'slideshow-mobile' ); ?>"/>
					</a>
				</div>
			<?php endif; ?>

			<div class="servicio-contenido">
				<?php the_title( '<h3 class="servicio-titulo">', '</h3>' ); ?>
				<?php the_excerpt(); ?>
				<p><a href="<?php the_permalink(); ?>" class="boton-blanco">Conocer más...</a></p>
			</div>

		</div>

	<?php endwhile; // Finaliza while have posts. ?>
	
</section>

<?php
endif; // Finaliza si hay posts.

// Restore original Post Data
wp_reset_postdata();
