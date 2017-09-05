<?php
/**
 * Header logo
 *
 * @package dax_blank
 */

// Get logo image from ACF field. If field is empty, use fallback image instead.
$logo_header = get_field( 'logo_main', 'option' );
if ( $logo_header ) {
	$logo_header_url = $logo_header['url'];
	$logo_header_alt = $logo_header['alt'];
} else {
	$logo_header_url = get_template_directory_uri() . '/assets/img/logo_header.png';
	$logo_header_alt = bloginfo( 'name' );
};

$logo_output = '<div id="header-logo-container" itemscope itemtype="http://schema.org/">';

if ( is_front_page() || is_home() ) :
	$logo_output = $logo_output . '<a href="' . home_url() . '" rel="home">';
	$logo_output = $logo_output . '<h1><span itemprop="name">' . get_bloginfo( 'name' ) . '</span></h1>';
	$logo_output = $logo_output . '<img itemprop="logo" src="' . $logo_header_url . '" alt="' . $logo_header_alt . '" /></a>';
else:
	$logo_output = $logo_output . '<a href="' . home_url() . '" rel="home">';
	$logo_output = $logo_output . '<img itemprop="logo" src="' . $logo_header_url . '" alt="' . $logo_header_alt . '" /></a>';
	echo $logo_output;
endif; // Ends if is frontpage.

$logo_output = $logo_output . '</div>';
echo $logo_output;
