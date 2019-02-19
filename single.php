<?php
/**
 * Single post.
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

		<div id="blog-container">		

		<?php
		if ( have_posts() ) :
		?>

			<!-- Starts left side content. -->
			<div class="blog-content">

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

			</div>

		<?php
		else :
		?>

			<div class="blog-content">
				<h2>Missing content.</h2>
			</div>

		?>

			</div>
			<!-- Ends left side content. -->

		<?php endif; // Ends if have posts. ?>		

		<?php get_sidebar(); ?>

	<?php
	endwhile; // End of the loop.
	?>

	</main><!-- #main -->

<?php
get_footer();
