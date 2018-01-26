<?php
/**
 * @package dax_blank
 */
get_header(); ?>

	<main>
		<section>
			<h1><?php _e( 'Latest Posts'); ?></h1>
			<?php get_template_part('loop'); ?>
			<?php get_template_part('paginacion'); ?>
		</section>
		<?php get_sidebar(); ?>
	</main>
<?php get_footer(); ?>
