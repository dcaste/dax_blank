<?php
/**
 * @package dax_blank
 *
 * Template Name: Page with no sidebar.
 */
get_header(); ?>

<?php if ( have_posts() ) : ?>

	<main >
		<section>

			<?php while ( have_posts() ) : the_post(); ?>

				<header id="main-title">
					<div class="row column">
						<?php the_title( '<h1>', '</h1>' ) ?>
					</div>
				</header>

				<div id="main-content" class="row align-center">

					<article  class="small-12 large-8 column">
						<?php the_content(); ?>
					</article>

				</div>

			<?php endwhile; // Ends while have posts. ?>

		</section>
	</main>

<?php else: ?>

	<main>
		<section>

			<header id="main-title">
				<div class="row column">
					<h1><?php esc_html_e( 'Sorry, nothing to display.', 'dax_blank' ); ?></h1>
				</div>
			</header>

			<div id="main-content" class="row align-center">

				<article class="small-12 large-8 column">
					<p><?php esc_html_e( 'Sorry, nothing to display.', 'dax_blank' ); ?></p>
				</article>

			</div>

		</section>

	</main>

<?php endif; // Ends if have posts. ?>

<?php get_footer(); ?>
