jQuery(document).ready( function($) {	
	
	// Muestra/oculta el botón que desplaza hacia arriba.
	$(window).scroll( function() {
	   if ( $(this).scrollTop() >= 102) {
				$('#go-to-top').fadeIn(200);
				$('#top-bar').removeClass('visible');
				$('#top-bar').addClass('oculto');
				$('#nav-desktop').removeClass('regular');
				$('#nav-desktop').addClass('small');
	   } else {
				$('#go-to-top').fadeOut(200);
				$('#top-bar').removeClass('oculto');
				$('#top-bar').addClass('visible');
				$('#nav-desktop').removeClass('small');
				$('#nav-desktop').addClass('regular');
	   }
	});

	$('#go-to-top').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
	// Sticky menus.
	$("#header-desktop").stick_in_parent();
	$("#nav-mobile").stick_in_parent();
	
	// Muestra/Oculta el menú para mobile.
	$('#mobile-toggle').animatedModal({
		color: '#3a4790',
		animatedIn: 'slideInDown',
		animatedOut: 'slideOutUp',
		animationDuration: '0.3s'
	});

	// Muestra/Oculta lista de productos en el carrito del header.
	$('#carrito-toggle').click(function(){
		if ( $('#site-header-cart .widget_shopping_cart').hasClass('mostrar') ) {
			$('#site-header-cart .widget_shopping_cart').removeClass('mostrar');
		} else {
			$('#site-header-cart .widget_shopping_cart').addClass('mostrar');
		}
	});

	// Carousel para el homepage.
	$('.home-slideshow').slick({
		autoplay:true,
		arrows:false,
		dots: true,
		speed:1000,
	});

	// Carousel para Testimonials.
	$('.testimonials-lista').slick({
		autoplay:true,
		arrows:false,
		dots:true,
		speed:1000,
		slidesToShow:2,
		slidesToScroll:2,
		responsive: [
			{
				breakpoint: 480,
				settings: {
					slidesToShow:1,
					slidesToScroll:1
				}
			}
		]
	});

} );

new WOW().init();

var myLazyLoad = new LazyLoad({
	elements_selector: '.lazy',
});