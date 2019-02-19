<?php
/**
 * Página de resultado de búsqueda.
 *
 * @package dax_blank
 */

get_header();
?>

	<main id="main">

		<?php if ( have_posts() ) : ?>

			<header class="entry-header">
				<h1>
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Resultados de búsqueda: %s' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header>

			<div id="blog-container" class="grid-container">

				<!-- Inicia columna izquierda de contenido. -->
				<div class="blog-articulos">

					<?php
					while ( have_posts() ) :
						the_post();
					?>

						<article class="articulo">

							<?php if ( has_post_thumbnail() ) : ?>
								<p class="foto">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php the_post_thumbnail( 'slideshow-mobile' ); ?>
									</a>
								</p>
							<?php endif; ?>

							<header>
							<h2 class="titulo">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php the_title(); ?>
								</a>
							</h2>

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

						<p class="excerpt">
							<?php
							if ( has_excerpt() ) {
								the_excerpt();
							} else {
								echo esc_html( wp_trim_words( get_the_content(), 20, '...' ) );
							}
							?>
						</p>

						</article>

					<?php
						endwhile;
						pagination();
					?>

					<?php				

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>

				</div>
				<!-- Finaliza columna izquierda de contenido. -->

				<?php get_sidebar(); ?>
				</div>

			</div><!-- Blog container. -->

	</main><!-- #main -->

<?php
get_footer();
