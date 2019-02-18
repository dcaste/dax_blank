<?php
/**
 * Thumbnails and image related functions.
 *
 * @package dax_blank
 */

 if ( ! function_exists( 'dax_blank_thumbnails' ) ) :

	/**
	 * Register several thmbnail sizes.
	 */
	function dax_blank_thumbnails() {

		add_image_size( 'slideshow', 1200, 600, true );
		add_image_size( 'vertical', 480, 600, true );

		/**
		 * Register thumbnail size in Wordpress backend.
		 *
		 * @param  array $sizes.
		 */
		function dax_blank_custom_thumbnail_sizes( $sizes ) {
			return array_merge(
				$sizes, array(
					'slideshow' => ( 'Slideshow' ),
					'vertical' => ( 'Vertical' ),
				)
			);
		}
		add_filter( 'image_size_names_choose', 'dax_blank_custom_thumbnail_sizes' );

	}
	add_action( 'after_setup_theme', 'dax_blank_thumbnails' );

endif; // End if thumbnails function exists.

// Sets a better image quality.
add_filter( 'jpeg_quality', 'tgm_image_full_quality' );
add_filter( 'wp_editor_set_quality', 'tgm_image_full_quality' );

/**
 * Filters the image quality for thumbnails to be at the highest ratio possible.
 *
 * Supports the new 'wp_editor_set_quality' filter added in WP 3.5.
 *
 * @since 1.0.0
 *
 * @param int $quality  The default quality (90).
 * @return int $quality Amended quality (100).
 */
function tgm_image_full_quality( $quality ) {
	return 100;
}

/**
 * Change dashboard icon.
 */
function wpb_custom_logo() { ?>
	<style type="text/css">
	.wp-admin #wpadminbar #wp-admin-bar-site-name > .ab-item::before{
	background-image: url("<?php bloginfo( 'stylesheet_directory' ); ?>/dist/img/dashboard-icon.png") !important;
	background-position: center center;
	background-size: contain;
	color:rgba(0, 0, 0, 0);
	background-repeat: no-repeat;
	width: 32px;
	height: 20px;
	}
	#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
	background-position: 0 0;
	}
	</style>
<?php
}
add_action( 'wp_before_admin_bar_render', 'wpb_custom_logo' );
