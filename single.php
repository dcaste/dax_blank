<?php
/**
 * @package dax_blank
 */
get_header();
?>

<?php if (have_posts()): ?>

	<main>
		<section>

			<?php while (have_posts()) : the_post(); ?>

				<header id="main-blog-title">
					<div class="row column">

						<?php
						if ( is_single() ) :
							the_title( '<h1 class="post-title">', '</h1>' );
						else :
							the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						endif; ?>

					</div>
				</header>

				<div id="main-content" class="row">

					<article id="post-<?php the_ID(); ?>" <?php post_class( 'small-12 large-8 columns' ); ?> >
						<?php the_content(); ?>
						<?php comments_template(); ?>
					</article>

					<?php get_sidebar() ?>

				</div>

			<?php endwhile; // Ends while have posts. ?>

		</section>
	</main>

<?php else: ?>

				<article>
					<h2><?php esc_html_e( 'Sorry, nothing to display.', 'dax_blank' ); ?></h2>
				</article>

<?php endif; ?>

<?php get_footer(); ?>