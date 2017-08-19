<?php
/**
 * Header info
 *
 * @package dax_blank
 */

// Info del restaurante HEADER.
$rest_dir = get_field( 'schema_dir', 'option' );
$rest_tel = get_field( 'schema_tel', 'option' );
$rest_email = get_field( 'schema_email', 'option' );

if ( $rest_dir ) { ?>
	<div class="info" itemprop="address">
		<i class="fa fa-map-marker" aria-hidden="true"></i>
		<span itemprop="streetAddress"><?php echo esc_html( $rest_dir ); ?></span>
	</div>
<?php } ?>
<?php if ( $rest_tel ) { ?>
	<div class="info">
		<i class="fa fa-phone" aria-hidden="true"></i>
		<span itemprop="telephone"><a href="tel:<?php echo esc_html( $rest_tel ); ?>"><?php echo esc_html( $rest_tel ); ?></a></span>
	</div>
<?php } ?>
<?php if ( $rest_email ) { ?>
	<div class="info">
		<i class="fa fa-envelope" aria-hidden="true"></i>
		<span itemprop="email"><?php echo esc_html( $rest_email ); ?></span>
	</div>
<?php } ?>
