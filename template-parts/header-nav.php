<?php
/**
 * Header navigation.
 *
 * @package dax_blank
 */

?>

<header id="header-nav">

		<?php if ( is_front_page() && is_home() ) : ?>

			<h1>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img class="header-logo" src="<?php echo esc_url( get_template_directory_uri() . '/dist/img/logo-image.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
				</a>
			</h1>

		<?php else : ?>

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img class="header-logo" src="<?php echo esc_url( get_template_directory_uri() . '/dist/img/logo-image.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
			</a>

		<?php endif; // Ends if is homepage. ?>

		<nav class="header-nav">
			<?php
			// Imprime el menú de navegación.
			$menu_defaults = array(
				'theme_location'  => 'main',
				'menu'            => '',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,
				'fallback-cb'     => '',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul>%3$s</ul>',
				'depth'           => 0,
				'walker'          => '',
			);
			wp_nav_menu( $menu_defaults );
			?>
		</nav>

	</div>
</header>
