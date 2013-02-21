<?php
/**
 * Various functions, filters, and actions used by the plugin.
 *
 * @package    Literary
 * @subpackage Includes
 * @since      0.1.0
 * @author     Justin Tadlock <justin@justintadlock.com>
 * @copyright  Copyright (c) 2013, Justin Tadlock
 * @link       http://themehybrid.com/plugins/literary
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Filter the post type archive title. */
add_filter( 'post_type_archive_title', 'literary_post_type_archive_title' );

/* Filter the post type permalink. */
add_filter( 'post_type_link', 'literary_post_type_link', 10, 2 );

/* Filter the breadcrumb trail args (Breadcrumb Trail script/plugin). */
add_filter( 'breadcrumb_trail_args', 'literary_breadcrumb_trail_args' );

/**
 * Breadcrumb trail arguments.
 *
 * @since  0.1.0
 * @access public
 * @param  array  $args
 * @return array
 */
function literary_breadcrumb_trail_args( $args ) {

	$args['post_taxonomy']['literature'] = 'literary_form';

	return $args;
}

/**
 * Filter on 'post_type_archive_title' to allow for the use of the 'archive_title' label that isn't supported 
 * by WordPress.  That's okay since we can roll our own labels.
 *
 * @since  0.1.0
 * @access public
 * @param  string $title
 * @return string
 */
function literary_post_type_archive_title( $title ) {

	if ( is_post_type_archive( 'literary' ) ) {
		$post_type = get_post_type_object( 'literary' );
		$title = isset( $post_type->labels->archive_title ) ? $post_type->labels->archive_title : $title;
	}

	return $title;
}

/**
 * Filter on 'post_type_link' to allow users to use '%portfolio%' (the 'portfolio' taxonomy) in their 
 * portfolio item URLs.
 *
 * @since  0.1.0
 * @access public
 * @param  string $post_link
 * @param  object $post
 * @return string
 */
function literary_post_type_link( $post_link, $post ) {

	if ( 'literary' !== $post->post_type )
		return $post_link;

	/* Allow %portfolio% in the custom post type permalink. */
	if ( false !== strpos( $post_link, '%form_or_technique%' ) ) {

		$terms = get_the_terms( $post, 'literary_technique' );

		if ( empty( $terms ) )
			$terms = get_the_terms( $post, 'literary_form' );
	
		/* Check that terms were returned. */
		if ( !empty( $terms ) && is_array( $terms ) ) {

			usort( $terms, '_usort_terms_by_ID' );

			$post_link = str_replace( '%form_or_technique%', $terms[0]->slug, $post_link );
		}

		else {
			$post_link = str_replace( '%form_or_technique%', 'work', $post_link );
		}
	}

	return $post_link;
}

?>