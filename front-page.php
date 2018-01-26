<?php
/**
 * @package dax_blank
 * Template Name: Homepage.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header(); ?>

	<main id="homepage-main">

		<?php get_template_part( 'template-parts/home_bienvenida' ); ?>
		<?php get_template_part( 'template-parts/home_especiales' ); ?>
		<?php get_template_part( 'template-parts/home_galeria' ); ?>

		<section id="homepage-mapa">
			<?php get_template_part( 'template-parts/google_maps' ); ?>
		</section>
	</main>
<?php get_footer(); ?>
