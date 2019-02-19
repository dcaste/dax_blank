<?php
/**
 * Página Contacto.
 *
 * @package dax_blank
 *
 * Template Name: Contacto
 */

get_header();
?>

<main id="main">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">
			<?php the_title( '<h1>', '</h1>' ); ?>
		</header>

		<div class="grid-container">
			<?php the_content();?>
		</div>

		<?php get_template_part( 'template-parts/mapa' ); ?>

	</article>
</main>

<?php
get_footer();
