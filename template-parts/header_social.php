<?php
/**
 * Header social media
 *
 * @package dax_blank
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$facebook = get_field( 'sm_facebook', 'option' );
$instagram = get_field( 'sm_insta', 'option' );
$twitter = get_field( 'sm_twitter', 'option' );

if ( $facebook ) {
	$fb = '<div>';
	$fb = $fb . '<a href="' . esc_url( $facebook ) . ' " target="_blank" ><i class="fa fa-facebook-official" aria-hidden="true"></i></a></div>';
	echo $fb;
}

if ( $instagram ) {
	$insta = '<div>';
	$insta = $insta . '<a href="' . esc_url( $instagram ) . ' " target="_blank" ><i class="fa fa-instagram" aria-hidden="true"></i></a></div>';
	echo $insta;
}

if ( $twitter ) {
	$twt = '<div>';
	$twt = $twt . '<a href="' . esc_url( $twitter ) . ' " target="_blank" ><i class="fa fa-twitter" aria-hidden="true"></i></a></div>';
	echo $twt;
}
