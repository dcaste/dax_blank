<?php
/**
 * Entrada single de posts.
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

		<header class="entry-header">
			<?php the_title( '<h1>', '</h1>' ); ?>
		</header>

		<div id="blog-container" class="grid-container">
			
					<!-- Inicia columna izquierda de contenido. -->
					<div>
						<article class="articulo">

							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'slideshow-mobile' ); ?>
							<?php endif; ?>

							<header>
								<p class="articulo-meta">
									<?php
									the_date();
									if ( has_tag() ) {
										echo ' | ';
										the_tags();
									}
									?>
								</p>
							</header>

							<?php the_content(); ?>

							<?php the_post_navigation(); ?>

						</article>
					</div>
					<!-- Finaliza columna izquierda de contenido. -->

					<!-- Inicia sidebar. -->
					<div>
						<?php get_sidebar(); ?>
					</div>
					<!-- Finaliza sidebar. -->

		</div><!-- Blog container. -->

	<?php
	endwhile; // End of the loop.
	?>

	</main><!-- #main -->

<?php
get_footer();
