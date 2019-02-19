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
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_html( get_template_directory_uri() ); ?>/dist/img/favicon.png">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >

<?php
get_template_part( 'template-parts/header-top-bar' );
get_template_part( 'template-parts/header-nav' );
?>
</div>