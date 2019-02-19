<?php
/**
 * Header para desktop.
 *
 * @package dax_blank
 */

?>

<header id="nav-desktop" class="regular">
	<div class="grid-container">

		<?php if ( is_front_page() && is_home() ) : ?>

			<h1>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img class="logo-header" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logo-medco-xolotlan.webp' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
				</a>
			</h1>

		<?php else : ?>

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img class="logo-header" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logo-medco-xolotlan.webp' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
			</a>

		<?php endif; // Ends if is homepage. ?>

		<div class="col-derecha">

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

			<a class="boton-tel-1800" href="tel:1800 2224">
				<span class="color-rojo">1800-</span><span class="color-azul">2224 <i class="icon-moto"></i></span>
			</a>

			<a class="enlace-whatsapp" href="https://wa.me/50587131519">
				<i class="icon-whatsapp"></i>
			</a>

			<?php	if ( function_exists( 'medco_woocommerce_header_cart' ) ) {
				medco_woocommerce_header_cart();
			}	?>

		</div>

	</div>
</header>
