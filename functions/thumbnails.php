<?php
/**
 * Configure thumbnails and image related functions.
 *
 * @package dax_blank
 */

if ( ! function_exists( 'dax_blank_thumbnails' ) ) :

	function dax_blank_thumbnails() {

		// Default thumbnail size if needed.
		// set_post_thumbnail_size(100, 100, true);

		// Image size optimized for landscape at 16x9 aspect ratio (wide screens).
		add_image_size( 'slideshow', 1440, 810, true );

		// Optimized for mobile in vertical orientation at 4x3 aspect ratio.
		//add_image_size( 'vertical-med', 400, 533, true );

		// Optimized for mobile in vertical orientation at 4x3 aspect ratio.
		//add_image_size( 'vertical-sm', 320, 426, true );


		// Register the new image sizes for use in the add media modal in wp-admin
		function dax_blank_custom_sizes( $sizes ) {
			return array_merge( $sizes, array(
				'slideshow'  => __( 'Slideshow' ),
				// 'vertical-med' => __( 'Vertical Medium' ),
				// 'vertical-sm'  => __( 'Vertical Small' ),
			) );
		}
		add_filter( 'image_size_names_choose', 'dax_blank_custom_sizes' );

		// Remove inline width and height attributes for post thumbnails
		function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
			$html = preg_replace( '/(width|height)=\"\d*\"\s/', '', $html );
			return $html;
		}
		//add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

	} // End thumbnails.

	add_action( 'after_setup_theme', 'dax_blank_thumbnails' );

endif; // End if thumbnails function exists.