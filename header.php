<?php
/**
 * @package dax_blank
 */
get_header();
?>
<!doctype html>
<html <?php language_attributes(); ?> >

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/img/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon-16x16.png">
		<link rel="author" href="<?php echo esc_url( get_template_directory_uri() ); ?>/humans.txt" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?> >

		<!-- Main header. -->
		<header>

			<!-- Logo, Main Navigation Menu and Social Media icons. -->
			<div id="nav-main">
				<div>
					<?php get_template_part( 'template-parts/header_info' ); ?>
					<?php get_template_part( 'template-parts/header_logo' ); ?>
					<?php get_template_part( 'template-parts/header_main_menu' ); ?>
					<?php get_template_part( 'template-parts/header_social' ); ?>
				</div>
			</div>
			<!-- Ends Logo and Main Navigation Menu. -->

		</header>
		<!-- Ends Main header. -->
