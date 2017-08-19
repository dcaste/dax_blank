<?php
/**
 * @package dax_blank
 */
get_header();
?>
<main>
	<section>

		<?php if ( have_posts() ): ?>

			<?php the_archive_title( '<h1>', '</h1>' ); ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<article>
					<h2><?php the_title(); ?></h2>

				</article>
			<?php endwhile; //Ends while have_posts. ?>

		<?php else: ?>

			<article>
				<h2><?php esc_html_e( 'Sorry, nothing to display.', 'dax_blank' ); ?></h2>
			</article>

		<?php endif; //Ends if have_posts. ?>

	</section>
</main>
<?php get_footer(); ?>