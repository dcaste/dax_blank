<?php
/**
 * Header para Mobile.
 *
 * @package dax_blank
 */

?>

<header id="nav-mobile">

<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img class="mobile-logo" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logo-medco-xolotlan.webp' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
	</a>
	
	<a id="mobile-toggle" href="#mobile-menu" class="boton-blanco">
		<i class="icon-menu"></i>
	</a>

</header>

<div id="mobile-menu">
				
	<div class="modal-content">
		
		<div class="close-mobile-button close-mobile-menu">X</div>	

			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logo-mobile.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
		
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

			<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="Ver carrito de compras"><i class="icon-basket"></i> Ver carrito</a>

			<?php get_search_form(); ?>

			<div class="mobile-phones">
				<a class="boton-tel-1800" href="tel:1800 2224">
					<span class="color-rojo">1800-</span><span class="color-azul">2224 <i class="icon-moto"></i></span>
				</a>

				<a class="enlace-whatsapp" href="https://wa.me/50587131519">
					<i class="icon-whatsapp"></i>
				</a>
			</div>
		
		</div>

	</div>