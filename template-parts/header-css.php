<?php
/**
 * Header CSS.
 * Estilos básicos del grid necesarios para una primera impresión del DOM.
 *
 * @package dax_blank
 */

?>

<style media="screen">

body{
	margin: 0px;
	padding: 0px;
	display: grid;
	grid-template-columns: 100%;
	grid-template-rows: auto;
	grid-template-areas:
	"topBar"
	"mainNav"
	"main"
	"footer";
}

#top-bar{ grid-area: topBar }
#nav-mobile{ grid-area: mainNav }
#nav-desktop{ grid-area: mainNav }
#main{ grid-area: main }
#footer{ grid-area: footer }

/*
 * Media Queries.
 *
 */

@media only screen and (min-width:320px) {

	#nav-mobile{ 
		display: flex;
		align-items: center;
		justify-content: space-between;
		z-index: 99;
		background: #fff;
	}
	#nav-desktop{ display: none; background: #fff; }

}

@media only screen and (min-width:480px) {

}

@media only screen and (min-width:768px) {


}

@media only screen and (min-width:1024px) {

	#nav-mobile{ display: none }
	#nav-desktop{ display: block }

}

@media only screen and (min-width:1140px) {

}

@media only screen and (min-width:1280px) {

}

@media only screen and (-webkit-min-device-pixel-ratio:1.5), only screen and (min-resolution:144dpi) {

}


</style>
