<?php
/**
 * Tarjeta Salud al Día.
 *
 * @package dax_blank
 */

?>

<section id="salud-al-dia" class="grid-container">
		
	<header class="wow zoomIn">
		<h2>¡Beneficios por ser<br/><span class="color-rojo">Salud al Día!</span></h2>
	</header>
		
	<!-- Inicia Formulario -->
	<form class="salud-formulario wow zoomIn">
				
		<input type="text" placeholder="Nombre">

		<input type="text" placeholder="Email">

		<input type="text" placeholder="Teléfono">

		<button type="submit" class="button">Enviar</button>

	</form>
	<!-- Finaliza Formulario -->

	<!-- Inicia Tarjeta -->
	<div id="salud-beneficios">

		<div class="beneficio1">
			<img class="lazy" data-src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logo-medicash.webp' ); ?>" alt="MediCash">		
			<h3>Acumulás dinero<br /><span class="color-rojo">para compras futuras</span></h3>
			<p>Medicash es dinero electrónico, al ser miembro activo y registrado del programa salud al día se crea automáticamente un monedero virtual, donde por las compras que realices de productos que están en promoción en nuestra guía de compras farmaguia acumulas desde un 2% a mas en dinero medicash en tu monedero, con lo cual podrás hacer compras futuras en cualquier de las farmacias medco o xolotlán de tu preferencia.</p>
		</div>

		<div class="beneficio2">
			<i class="icon-giftbox"></i>
			<h3>Participá<br /><span class="color-rojo">en promociones</span></h3>
			<p>Este beneficio es único y exclusivo para los miembros del programa salud al día ya que automáticamente por tus compras podrás participar en rifas de y sorteos aleatorios que se desarrollan durante nuestras campañas de verano, mamá, aniversario y navidad. aquí puedes ganar premios que van desde farmacia gratis hasta un vehículo último modelo.</p>
		</div>		

		<div class="beneficio3">
			<i class="icon-drugs"></i>
			<h3>Super descuentos<br /><span class="color-rojo">en medicinas</span></h3>
			<p>Al ser miembro del programa salud al día sos parte de un listado especial de descuentos y precios en medicinas, productos de consumo, cuidado e higiene personal. además recibes descuentos especiales en material de reposición periódica y equipos médicos. de esta manera obtienes el beneficio único de tener mayores descuentos en tus precios al momento de realizar tus compras en cualquiera de nuestras sucursales.</p>
		</div>

		<div class="beneficio4">
			<i class="icon-badge"></i>
			<h3>Descuentos<br /><span class="color-rojo">en comercios afiliados</span></h3>
			<p>Al ser miembro del programa salud al día podes hacer uso de tu memebresía en la red de comercios afiliados donde con solo presentar tu membresía obtienes descuentos preferenciales. a continuación puede observar nuestro listado de comercios afiliados y sus beneficios.</p>
		</div>

		<div class="imagen-tarjeta">
			<img class="lazy" data-src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/tarjeta-salud.webp' ); ?>" alt="Salud al Día">
		</div>

	</div>

</section>