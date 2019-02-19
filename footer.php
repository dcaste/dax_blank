<?php
/**
 * Main Footer.
 *
 * @package dax_blank
 */

?>
		<footer id="main-footer">

			<?php get_template_part( 'template-parts/footer-menu' ); ?>

			<div id="footer-copyright">
				&copy <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>
			</div>

		</footer>

		<a href="#top-bar" id="go-to-top" class="button" title="Go to top">
			<i class="icon-up"></i>
		</a>

		<?php wp_footer(); ?>

	</body>
</html>
