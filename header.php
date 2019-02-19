<?php
/**
 * Header
 *
 * @package dax_blank
 */

?>

<!doctype html>
<html <?php language_attributes(); ?> >

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_html( get_template_directory_uri() ); ?>/assets/img/favicon-32x32.png">
	<?php get_template_part( 'template-parts/header-css' ); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="header-desktop">
	<?php
		get_template_part( 'template-parts/header-top-bar' );
		get_template_part( 'template-parts/header-desktop' );
	?>
</div>

	<?php
	get_template_part( 'template-parts/header-mobile' );
