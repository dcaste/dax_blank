<?php
/**
 * @package dax_blank
 */
get_header();
?>
<main>
	<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<article>
				<?php the_title( '<h1>', '</h1>' ) ?>
				<?php the_content(); ?>
			</article>
		<?php endwhile; ?>
		<?php else: ?>
			<article>
				<h2><?php esc_html_e( 'Sorry, nothing to display.', 'dax_blank' ); ?></h2>
			</article>
		<?php endif; ?>

	</section>

	<?php get_sidebar(); ?>

</main>
<?php get_footer(); ?>