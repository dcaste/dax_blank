<?php
/**
 * Main Loop
 *
 * @package dax_blank
 */
?>

<section>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<article>

			<?php if ( has_post_thumbnail() ) : ?>
				<a class="thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
			<?php endif; ?>

			<h2>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h2>

			<small><?php the_tags( '', $sep = ', ', '' )?></small>

		</article>

		<?php endwhile; ?>

	<?php else: ?>

		<article>
			<h2><?php __( 'Sorry, nothing to display.', 'dax_blank' ); ?></h2>
		</article>

	<?php endif; ?>

</section>
