<?php
/**
 * Default Page.
 *
 * @package dax_blank
 */

get_header();
?>

	<main id="main">

		<?php
		while ( have_posts() ) :
			the_post();
		?>

			<article <?php post_class(); ?>>

				<header class="entry-header">
					<?php the_title( '<h1>', '</h1>' ); ?>
				</header>

				<div id="content">
					<?php the_content(); ?>
				</div>

			</article>

		<?php endwhile; ?>

	</main>

<?php
get_footer();
