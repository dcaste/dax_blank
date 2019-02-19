<?php
/**
 * Página Salud al Día.
 *
 * @package dax_blank
 *
 * Template Name: Salud al Día
 */

get_header();
?>

<main id="main">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">
			<?php the_title( '<h1>', '</h1>' ); ?>
		</header>

		<?php get_template_part( 'template-parts/salud-dia' ); ?>
		<?php get_template_part( 'template-parts/comercios-afiliados' ); ?>

	</article>
</main>

<?php
get_footer();
