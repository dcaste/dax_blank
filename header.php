<?php
/**
 * @package dax_blank
 */
get_header(); ?><!doctype html>

<html <?php language_attributes(); ?> >

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?> >

		<header>

			<div id="main-header">
				<div class="row">
					<?php get_template_part( 'template-parts/header_main_menu' ); ?>
				</div>
			</div>

		</header>
