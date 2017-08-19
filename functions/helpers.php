<?php
/**
 * Helpers functions.
 *
 * @package dax_blank
 */

// Text to show at the footer of WP Admin.
function custom_admin_footer() {
	echo 'Web Design: Dax Castellón Meyrat | <a href="http://daxcastellon.com" target="_blank">daxcastellon.com</a>';
}
add_filter('admin_footer_text', 'custom_admin_footer');

/**
 * Max with of the content in pixels.
 *
 * @global int $content_width
 */
function dax_blank_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dax_blank_content_width', 800 );
}
add_action( 'after_setup_theme', 'dax_blank_content_width', 0 );

// Removes admin bar.
function remove_admin_bar(){
  return false;
}
add_filter('show_admin_bar', 'remove_admin_bar');

/**
 * Display ACF Plugin requirement.
 */
if ( ! function_exists( 'acf_add_local_field_group' ) ) {
    add_action('admin_notices', function() {
        echo '<h2>This theme requires Advanced Custom Fields plugin.</h2>';
    });
}

// Custom max upload size. You must change the $custom_limit value to the one you need in MB.
function custom_file_max_upload_size( $file ) {

  $size = $file['size'];                          // The size of the file you are uploading.
  $custom_limit = 4;                              // Your custom max limit in MB.
  $custom_limit_bytes = $custom_limit * 1048576;  // Convert your custom size to bytes ( 1Mb = 1048576 bytes ).

  if ( $size > $custom_limit_bytes ) {
    $file['error'] = __( 'ERROR: You cannot upload a file larger than ' . $custom_limit . 'MB', 'textdomain' );
  }
  return $file;

}
add_filter ( 'wp_handle_upload_prefilter', 'custom_file_max_upload_size', 10, 1 );

// Change the upload size limit message. You must change the $custom_limit value to the one you need in MB.
add_filter( 'upload_size_limit', 'wpse_70754_change_upload_size' );
function wpse_70754_change_upload_size(){
  $custom_limit = 4;
  return $custom_limit * 1048576;
}