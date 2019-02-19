<?php
/**
 * Página principal. Homepage.
 *
 * @package dax_blank
 *
 * Template Name: Homepage
 */

get_header();
?>

<main id="main">
	<article>

		<?php get_template_part( 'template-parts/home-slideshow' ); ?>
		<?php get_template_part( 'template-parts/home-servicios' ); ?>
		<?php get_template_part( 'template-parts/salud-dia' ); ?>
		<?php get_template_part( 'template-parts/productos-destacados' ); ?>
		<?php get_template_part( 'template-parts/testimonials' ); ?>

	</article>
</main>

<?php
get_footer();
