<?php
/**
 * Footer logo
 *
 * @package dax_blank
 */

// Get logo image from ACF field. If field is empty, use fallback image instead.
$logo_footer = get_field( 'logo_main', 'option' );
if ( $logo_footer ) {
	$logo_footer_url = $logo_footer['url'];
	$logo_footer_alt = $logo_footer['alt'];
} else {
	$logo_footer_url = get_template_directory_uri() . '/img/logo_footer.png';
	$logo_footer_alt = bloginfo( 'name' );
};

$logo_output = '<div id="footer-logo-container" itemscope itemtype="http://schema.org/">';
$logo_output = $logo_output . '<a href="' . home_url() . '" rel="home">';
$logo_output = $logo_output . '<img itemprop="logo" src="' . $logo_footer_url . '" alt="' . $logo_footer_alt . '" /></a>';
	echo $logo_output;
$logo_output = $logo_output . '</div>';
echo $logo_output;
