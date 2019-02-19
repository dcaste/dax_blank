<?php
/**
 * Area de Testimonials.
 *
 * @package dax_blank
 */

?>

<?php
$args = array(
	'post_type' => array( 'medco_testimonials' ),
);

$testimonials = new WP_Query( $args );

if ( $testimonials->have_posts() ) :
?>

<section id="testimonials">
	<div class="grid-container">

			<h2>Lo que dicen nuestros clientes</h2>

			<div class="testimonials-lista">

				<?php
				while ( $testimonials->have_posts() ) :
					$testimonials->the_post();
				?>

					<div class="testimonial">
						<?php the_content(); ?>
					</div>

				<?php endwhile; ?>

			</div>

	</div>
</section>

<?php
endif; // Finaliza si hay testimonials.

wp_reset_postdata();
