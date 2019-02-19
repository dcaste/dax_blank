<?php
/**
 * Footer principal.
 *
 * @package dax_blank
 */

?>
		<footer id="footer">

			<?php get_template_part( 'template-parts/footer-info' ); ?>
			<?php get_template_part( 'template-parts/footer-menu' ); ?>
			<?php get_template_part( 'template-parts/footer-newsletter' ); ?>

			<div id="footer-copyright" class="grid-container">
				&copy <?php echo esc_html( date( 'Y' ) ); ?> Farmacias MEDCO Xolotlán. Todos los derechos reservados.
			</div>

		</footer>

		<!-- Botón #go-to-top -->
		<a href="#top-bar" id="go-to-top" class="button" title="Ir hacia arriba">
			<i class="icon-up"></i>
		</a>

		<?php wp_footer(); ?>

	</body>
</html>
