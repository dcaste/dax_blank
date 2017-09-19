<?php
/**
 * Header info
 *
 * @package dax_blank
 */

// Your contact info.
$your_address 	= get_field( 'schema_address', 'option' );
$your_phone		= get_field( 'schema_phone', 'option' );
$your_email 	= get_field( 'schema_email', 'option' );

if ( $your_address || $your_email || $your_phone ): ?>

	<div id="header-info">
		<div class="row">

			<?php if ( $your_address ) { ?>
				<div class="info" itemprop="address">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
					<span itemprop="streetAddress"><?php echo esc_html( $your_address ); ?></span>
				</div>
			<?php } ?>

			<?php if ( $your_phone) { ?>
				<div class="info">
					<i class="fa fa-phone" aria-hidden="true"></i>
					<span itemprop="telephone"><a href="tel:<?php echo esc_html( $your_phone); ?>"><?php echo esc_html( $your_phone); ?></a></span>
				</div>
			<?php } ?>

			<?php if ( $your_email ) { ?>
				<div class="info">
					<i class="fa fa-envelope" aria-hidden="true"></i>
					<span itemprop="email"><?php echo esc_html( $your_email ); ?></span>
				</div>
			<?php } ?>

		</div>
	</div>

<?php endif // Ends if there is contact info. ?>