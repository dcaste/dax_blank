<?php
/**
 * @package dax_blank
 */
get_header(); ?>

	<main>
		<section>
			<h1><?php __( 'Latest Posts', 'dax_blank' ); ?></h1>
			<?php get_template_part( 'loop' ); ?>
		</section>
	</main>

<?php get_footer(); ?>
