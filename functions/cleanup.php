<?php
/**
 * Clean up WordPress defaults.
 *
 * @package dax_blank
 */

if ( ! function_exists( 'dax_blank_start_cleanup' ) ) :

	function dax_blank_start_cleanup() {
		add_action( 'init', 'dax_blank_cleanup_head' ); // Launching operation cleanup.
		add_filter( 'the_generator', 'dax_blank_remove_rss_version' ); // Remove WP version from RSS.
		add_filter( 'wp_head', 'dax_blank_remove_wp_widget_recent_comments_style', 1 ); // Remove pesky injected css for recent comments widget.
		add_action( 'wp_head', 'dax_blank_remove_recent_comments_style', 1 ); // Clean up comment styles in the head.
		add_filter( 'img_caption_shortcode', 'dax_blank_remove_figure_inline_style', 10, 3 ); // Remove inline width attribute from figure tag.
	} // Ends Cleanup function.

	add_action( 'after_setup_theme','dax_blank_start_cleanup' );

endif;

// Clean up head.
if ( ! function_exists( 'dax_blank_cleanup_head' ) ) :
function dax_blank_cleanup_head() {
	remove_action( 'wp_head', 'rsd_link' ); // EditURI link.
	remove_action( 'wp_head', 'feed_links_extra', 3 ); // Category feed links.
	remove_action( 'wp_head', 'feed_links', 2 ); // Post and comment feed links.
	remove_action( 'wp_head', 'wlwmanifest_link' ); // Windows Live Writer.
	remove_action( 'wp_head', 'index_rel_link' ); // Index link.
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // Previous link.
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // Start link.
	remove_action( 'wp_head', 'rel_canonical', 10, 0 ); // Canonical.
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 ); // Shortlink.
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Links for adjacent posts.
	remove_action( 'wp_head', 'wp_generator' ); // WP version.
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); // Emoji detection script.
	remove_action( 'wp_print_styles', 'print_emoji_styles' ); // Emoji styles.
}
endif;

// Remove WP version from RSS.
if ( ! function_exists( 'dax_blank_remove_rss_version' ) ) :
function dax_blank_remove_rss_version() { return ''; }
endif;

// Remove injected CSS for recent comments widget.
if ( ! function_exists( 'dax_blank_remove_wp_widget_recent_comments_style' ) ) :
function dax_blank_remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
	  remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}
endif;

// Remove injected CSS from recent comments widget.
if ( ! function_exists( 'dax_blank_remove_recent_comments_style' ) ) :
function dax_blank_remove_recent_comments_style() {
	global $wp_widget_factory;
	if ( isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments']) ) {
	remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
	}
}
endif;

// Remove inline width attribute from figure tag causing images wider than 100% of its conainer
if ( ! function_exists( 'dax_blank_remove_figure_inline_style' ) ) :
function dax_blank_remove_figure_inline_style( $output, $attr, $content ) {
	$atts = shortcode_atts( array(
		'id'	  => '',
		'align'	  => 'alignnone',
		'width'	  => '',
		'caption' => '',
		'class'   => '',
	), $attr, 'caption' );

	$atts['width'] = (int) $atts['width'];
	if ( $atts['width'] < 1 || empty( $atts['caption'] ) ) {
		return $content;
	}

	if ( ! empty( $atts['id'] ) ) {
		$atts['id'] = 'id="' . esc_attr( $atts['id'] ) . '" ';
	}

	$class = trim( 'wp-caption ' . $atts['align'] . ' ' . $atts['class'] );

	if ( current_theme_supports( 'html5', 'caption' ) ) {
		return '<figure ' . $atts['id'] . ' class="' . esc_attr( $class ) . '">'
		. do_shortcode( $content ) . '<figcaption class="wp-caption-text">' . $atts['caption'] . '</figcaption></figure>';
	}

}
endif;

// Add WooCommerce support for wrappers per http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
add_action('woocommerce_before_main_content', 'dax_blank_before_content', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_after_main_content', 'dax_blank_after_content', 10);

// Removes script version in filenames.
function remove_script_version( $src ){
	return remove_query_arg( 'ver', $src );
}
add_filter( 'script_loader_src', 'remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'remove_script_version', 15, 1 );
