<?php
/**
 * @package dax_blank
 */
?>


	<footer>
		<div class="footer-copyright">
			<?php
				$copyright_output = bloginfo('name');
				$copyright_output = $copyright_output . ' &copy ';
				$copyright_output = $copyright_output . date('Y');
				$copyright_output = $copyright_output . ' ' . __( 'All Rights Reserved' , 'dax_blank' );
				echo $copyright_output;
			?>
		</div>
	</footer>

	<?php wp_footer(); ?>

	</body>
</html>
