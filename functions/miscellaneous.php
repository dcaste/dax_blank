<?php
/**
 * Miscellaneous functions.
 *
 * @package dax_blank
 */

/**
 * Remove title prefixes.
 *
 * @param string $title = Page title.
 */
function dax_blank_archive_title( $title ) {
if ( is_category() ) {
  $title = single_cat_title( '', false );
} elseif ( is_tag() ) {
  $title = single_tag_title( '', false );
} elseif ( is_author() ) {
  $title = '<span class="vcard">' . get_the_author() . '</span>';
} elseif ( is_post_type_archive() ) {
  $title = post_type_archive_title( '', false );
} elseif ( is_tax() ) {
  $title = single_term_title( '', false );
}
return $title;
}
add_filter( 'get_the_archive_title', 'dax_blank_archive_title' ); 
 
/**
 * Remove [...] characters from excerpt.
 *
 * @param string $more.
 * @return string
 */
function new_excerpt_more( $more ) {
  return '';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );
 
/**
 * Set a desired character excerpt length.
 *
 * @param int $length.
 * @return int change to the desired amount.
 */
function wpdocs_custom_excerpt_length( $length ) {
  return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
 
/**
* Array of allowed HTML tags to be printed in echo wp_kses.
* https://codex.wordpress.org/Validating_Sanitizing_and_Escaping_User_Data
*
* @return array $tags array of allowed tags.
*/
function allowed_tags() {

  $tags = array(
    'a'          => array(
      'class' => array(),
      'href'  => array(),
      'rel'   => array(),
      'title' => array(),
    ),
    'abbr'       => array(
      'title' => array(),
    ),
    'b'          => array(),
    'blockquote' => array(
      'cite' => array(),
    ),
    'cite'       => array(
      'title' => array(),
    ),
    'code'       => array(),
    'del'        => array(
      'datetime' => array(),
      'title'    => array(),
    ),
    'dd'         => array(),
    'div'        => array(
      'class' => array(),
      'title' => array(),
      'style' => array(),
    ),
    'dl'         => array(),
    'dt'         => array(),
    'em'         => array(),
    'h1'         => array(),
    'h2'         => array(),
    'h3'         => array(),
    'h4'         => array(),
    'h5'         => array(),
    'h6'         => array(),
    'i'          => array(
      'class' => array(),
    ),
    'img'        => array(
      'alt'    => array(),
      'class'  => array(),
      'height' => array(),
      'src'    => array(),
      'width'  => array(),
    ),
    'li'         => array(
      'class' => array(),
    ),
    'ol'         => array(
      'class' => array(),
    ),
    'p'          => array(
      'class' => array(),
    ),
    'q'          => array(
      'cite'  => array(),
      'title' => array(),
    ),
    'span'       => array(
      'class' => array(),
      'title' => array(),
      'style' => array(),
    ),
    'strike'     => array(),
    'strong'     => array(),
    'ul'         => array(
      'class' => array(),
    ),
    'form'       => array(),
    'input'      => array(
      'type'        => array(
        'email'  => array(),
        'submit' => array(),
      ),
      'class'       => array(),
      'placeholder' => array(),
      'value'       => array(),
      'style'       => array(),
    ),
    'label'      => array(),
    'textarea'   => array(),
    'svg'        => array(),
  );

  return $tags;
}