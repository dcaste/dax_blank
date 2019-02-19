<?php
/**
 * Search results page.
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
					printf( esc_html__( 'Search results: %s' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header>

			<div id="search-container">

				<div id="search-results">

					<?php
					while ( have_posts() ) :
						the_post();
					?>

						<article>

							<?php if ( has_post_thumbnail() ) : ?>
								<p class="post-thumbnail">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php the_post_thumbnail(); ?>
									</a>
								</p>
							<?php endif; ?>

							<header>
								<h2 class="post-title">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php the_title(); ?>
									</a>
								</h2>

								<p class="post-meta">
									<?php
									the_date();
									if ( has_tag() ) {
										echo ' | ';
										the_tags();
									}
									?>
								</p>
							</header>

							<p class="post-excerpt">
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
						endwhile; // Ends while have posts.
					?>

				</div><!-- #search-results -->

			</div><!-- #search-container -->
		<?php
		else :
		?>

			<div class="blog-content">
				<h2>Missing content.</h2>
			</div>

		<?php
		endif; // Ends if have posts.
		?>

		<?php get_sidebar(); ?>

	</main>

<?php
get_footer();
