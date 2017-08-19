<?php
/**
 * @package dax_blank
 */
get_header();
?>

	<main>
		<section>

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

					<header>
						<?php
						if ( is_single() ) :
							the_title( '<h1 class="post-title">', '</h1>' );
						else :
							the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						endif;

						if ( 'post' === get_post_type() ) : ?>
						<div class="post-meta">
							<?php //dax_blank_posted_on(); ?>
						</div>
						<?php
						endif; ?>
					</header>

					<?php the_content(); ?>
				</article>
			<?php endwhile; ?>

			<?php else: ?>

				<article>
					<h2><?php esc_html_e( 'Sorry, nothing to display.', 'dax_blank' ); ?></h2>
				</article>

			<?php endif; ?>

		</section>

		<?php comments_template(); ?>
		<?php get_sidebar() ?>
	</main>
<?php get_footer(); ?>