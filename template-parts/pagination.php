<?php
/**
 * @package dax_blank
 */

if ( function_exists( 'dax_pagination' ) ) :
	dax_pagination();
elseif ( is_paged() ) :
?>
	<nav id="post-nav">
		<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'dax_blank' ) ); ?></div>
		<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'dax_blank' ) ); ?></div>
	</nav>
<?php endif; ?>
