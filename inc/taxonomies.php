<?php
/**
 * File for registering custom taxonomies.
 *
 * @package    Literary
 * @subpackage Includes
 * @since      0.1.0
 * @author     Justin Tadlock <justin@justintadlock.com>
 * @copyright  Copyright (c) 2013, Justin Tadlock
 * @link       http://themehybrid.com/plugins/literary
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Register taxonomies on the 'init' hook. */
add_action( 'init', 'literature_register_taxonomies' );

/**
 * Register taxonomies for the plugin.
 *
 * @since  0.1.0
 * @access public
 * @return void.
 */
function literature_register_taxonomies() {

	register_taxonomy(
		'literary_form',
		array(
			'literature'
		),
		array(
			'public'            => true,
			'show_ui'           => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_admin_column' => true,
			'hierarchical'      => false,
			'query_var'         => 'literary_form',

			'capabilities' => array(
				'manage_terms' => 'manage_literature',
				'edit_terms'   => 'manage_literature',
				'delete_terms' => 'manage_literature',
				'assign_terms' => 'edit_literary_work',
			),

			'rewrite' => array(
				'slug'         => 'writing/forms',
				'with_front'   => false,
				'hierarchical' => false,
				'ep_mask'      => EP_NONE
			),

			'labels' => array(
				'name'                       => __( 'Forms' ),
				'singular_name'              => __( 'Form' ),
				'menu_name'                  => __( 'Forms' ),
				'name_admin_bar'             => __( 'Form' ),
				'search_items'               => __( 'Search Forms' ),
				'popular_items'              => __( 'Popular Forms' ),
				'all_items'                  => __( 'All Forms' ),
				'edit_item'                  => __( 'Edit Form' ),
				'view_item'                  => __( 'View Form' ),
				'update_item'                => __( 'Update Form' ),
				'add_new_item'               => __( 'Add New Form' ),
				'new_item_name'              => __( 'New Form Name' ),
				'separate_items_with_commas' => __( 'Separate forms with commas' ),
				'add_or_remove_items'        => __( 'Add or remove forms' ),
				'choose_from_most_used'      => __( 'Choose from the most used forms' ),

				// Custom labels b/c WordPress doesn't support them.
				'meta_box_name'              => __( 'Literary Form' )
			)
		)
	);

	register_taxonomy(
		'literary_technique',
		array(
			'literature'
		),
		array(
			'public'            => true,
			'show_ui'           => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_admin_column' => true,
			'hierarchical'      => false,
			'query_var'         => 'literary_technique',

			'capabilities' => array(
				'manage_terms' => 'manage_literature',
				'edit_terms'   => 'manage_literature',
				'delete_terms' => 'manage_literature',
				'assign_terms' => 'edit_literary_work',
			),

			'rewrite' => array(
				'slug'         => 'writing/techniques',
				'with_front'   => false,
				'hierarchical' => false,
				'ep_mask'      => EP_NONE
			),

			'labels' => array(
				'name'                       => __( 'Techniques' ),
				'singular_name'              => __( 'Technique' ),
				'menu_name'                  => __( 'Techniques' ),
				'name_admin_bar'             => __( 'Technique' ),
				'search_items'               => __( 'Search Techniques' ),
				'popular_items'              => __( 'Popular Techniques' ),
				'all_items'                  => __( 'All Techniques' ),
				'edit_item'                  => __( 'Edit Technique' ),
				'view_item'                  => __( 'View Technique' ),
				'update_item'                => __( 'Update Technique' ),
				'add_new_item'               => __( 'Add New Technique' ),
				'new_item_name'              => __( 'New Technique Name' ),
				'separate_items_with_commas' => __( 'Separate techniques with commas' ),
				'add_or_remove_items'        => __( 'Add or remove techniques' ),
				'choose_from_most_used'      => __( 'Choose from the most used techniques' ),

				// Custom labels b/c WordPress doesn't support them.
				'meta_box_name'              => __( 'Literary Technique' )
			)
		)
	);

	register_taxonomy(
		'literary_genre',
		array(
			'literature'
		),
		array(
			'public'            => true,
			'show_ui'           => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_admin_column' => true,
			'hierarchical'      => true,
			'query_var'         => 'literary_genre',

			'capabilities' => array(
				'manage_terms' => 'manage_literature',
				'edit_terms'   => 'manage_literature',
				'delete_terms' => 'manage_literature',
				'assign_terms' => 'edit_literary_work',
			),

			'rewrite' => array(
				'slug'         => 'writing/genres',
				'with_front'   => false,
				'hierarchical' => true,
				'ep_mask'      => EP_NONE
			),

			'labels' => array(
				'name'                       => __( 'Genres' ),
				'singular_name'              => __( 'Genre' ),
				'menu_name'                  => __( 'Genres' ),
				'name_admin_bar'             => __( 'Genre' ),
				'search_items'               => __( 'Search Genres' ),
				'popular_items'              => __( 'Popular Genres' ),
				'all_items'                  => __( 'All Genres' ),
				'edit_item'                  => __( 'Edit Genre' ),
				'view_item'                  => __( 'View Genre' ),
				'update_item'                => __( 'Update Genre' ),
				'add_new_item'               => __( 'Add New Genre' ),
				'new_item_name'              => __( 'New Genre Name' ),
				'separate_items_with_commas' => __( 'Separate genres with commas' ),
				'add_or_remove_items'        => __( 'Add or remove genres' ),
				'choose_from_most_used'      => __( 'Choose from the most used genres' ),
				'parent_item'                => __( 'Parent Genre' ),
				'parent_item_colon'          => __( 'Parent Genre:' ),

				// Custom labels b/c WordPress doesn't support them.
				'meta_box_name'              => __( 'Literary Genre' )
			)
		)
	);











}

?>