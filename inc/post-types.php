<?php
/**
 * File for registering custom post types.
 *
 * @package    Literary
 * @subpackage Includes
 * @since      0.1.0
 * @author     Justin Tadlock <justin@justintadlock.com>
 * @copyright  Copyright (c) 2013, Justin Tadlock
 * @link       http://themehybrid.com/plugins/literary
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Register custom post types on the 'init' hook. */
add_action( 'init', 'literature_register_post_types', 11 );

/**
 * Registers post types needed by the plugin.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function literature_register_post_types() {

	/* Set up the arguments for the portfolio item post type. */
	$args = array(
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 12,
		'menu_icon'           => null,
		'can_export'          => true,
		'delete_with_user'    => false,
		'hierarchical'        => false,
		'has_archive'         => 'writing',
		'query_var'           => 'literature',
		'capability_type'     => 'literature',
		'map_meta_cap'        => true,

		/* Only 3 caps are needed: 'manage_literature', 'create_literature', and 'edit_literature'. */
		'capabilities' => array(

			// meta caps (don't assign these to roles)
			'edit_post'              => 'edit_literature',
			'read_post'              => 'read_literature',
			'delete_post'            => 'delete_literature',

			// primitive/meta caps
			'create_posts'           => 'create_literary_work',

			// primitive caps used outside of map_meta_cap()
			'edit_posts'             => 'edit_literary_work',
			'edit_others_posts'      => 'manage_literature',
			'publish_posts'          => 'manage_literature',
			'read_private_posts'     => 'read',

			// primitive caps used inside of map_meta_cap()
			'read'                   => 'read',
			'delete_posts'           => 'manage_literature',
			'delete_private_posts'   => 'manage_literature',
			'delete_published_posts' => 'manage_literature',
			'delete_others_posts'    => 'manage_literature',
			'edit_private_posts'     => 'edit_literary_work',
			'edit_published_posts'   => 'edit_literary_work'
		),

		/* The rewrite handles the URL structure. */
		'rewrite' => array(
			'slug'       => 'writing',
			'with_front' => false,
			'pages'      => true,
			'feeds'      => false,
			'ep_mask'    => EP_PERMALINK,
		),

		/* What features the post type supports. */
		'supports' => array(
			'title',
			'editor',
			'excerpt'
		),

		/* Labels used when displaying the posts. */
		'labels' => array(
			'name'               => __( 'Literature' ),
			'singular_name'      => __( 'Literature' ),
			'menu_name'          => __( 'Literature' ),
			'name_admin_bar'     => __( 'Literature' ),
			'add_new'            => __( 'Add New' ),
			'add_new_item'       => __( 'Add New Literature' ),
			'edit_item'          => __( 'Edit Literature' ),
			'new_item'           => __( 'New Literature' ),
			'view_item'          => __( 'View Literature' ),
			'search_items'       => __( 'Search Literature' ),
			'not_found'          => __( 'No literature found' ),
			'not_found_in_trash' => __( 'No literature found in trash' ),
			'all_items'          => __( 'All Literature' ),

			// Custom labels b/c WordPress doesn't have anything to handle this.
			'archive_title'      => __( 'Writing' ),
		)
	);

	/* Register the portfolio item post type. */
	register_post_type( 'literature', $args );
}

?>