<?php
/**
 * @package dax_blank
 */
?>

		<!-- Starts Main Footer. -->
		<footer id="footer-main" itemscope itemtype="http://schema.org/">

			<div class="row">

				<div class="small-12 medium-6 columns"><?php get_template_part( 'template-parts/footer_logo' ); ?></div>

				<div id="copyright" class="small-12 medium-6 columns"><?php bloginfo('name'); ?> &copy; <?php echo date('Y'); ?> - All Rights Reserved.</div>

			</div>

		</footer>
		<!-- Ends Main Footer. -->

		<?php wp_footer(); ?>

	</body>
</html>
