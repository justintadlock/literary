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

add_action( 'admin_menu', 'literary_admin_setup' );

function literary_admin_setup() {
	add_action( 'load-post.php', 'literary_admin_load_meta_boxes' );
	add_action( 'load-post-new.php', 'literary_admin_load_meta_boxes' );
}

function literary_admin_load_meta_boxes() {
	add_action( 'add_meta_boxes', 'literary_meta_boxes' );
	add_action( 'save_post', 'literary_save_meta', 10, 2 );
}

function literary_meta_boxes( $post_type ) {

	if ( 'literature' == $post_type )
		add_meta_box( 'literary-notes-box', __( 'Notes', 'literary' ), 'literary_notes_meta_box', $post_type, 'normal', 'high' );
}

function literary_notes_meta_box( $post, $box ) {

	wp_nonce_field( basename( __FILE__ ), 'literary-notes-nonce' ); ?>

	<p>
		<textarea class="widefat" name="literary-notes" id="literary-notes" cols="60" rows="5"><?php echo esc_textarea( get_post_meta( $post->ID, 'notes', true ) ); ?></textarea>
	</p>
	<?php
}

function literary_save_meta( $post_id, $post ) {

	/* Verify the nonce before proceeding. */
	if ( !isset( $_POST['literary-notes-nonce'] ) || !wp_verify_nonce( $_POST['literary-notes-nonce'], basename( __FILE__ ) ) )
		return $post_id;

	$meta = array(
		'notes' => $_POST['literary-notes']
	);

	foreach ( $meta as $meta_key => $new_meta_value ) {

		/* Get the meta value of the custom field key. */
		$meta_value = get_post_meta( $post_id, $meta_key, true );

		/* If there is no new meta value but an old value exists, delete it. */
		if ( current_user_can( 'delete_post_meta', $post_id, $meta_key ) && '' == $new_meta_value && $meta_value )
			delete_post_meta( $post_id, $meta_key, $meta_value );

		/* If a new meta value was added and there was no previous value, add it. */
		elseif ( current_user_can( 'add_post_meta', $post_id, $meta_key ) && $new_meta_value && '' == $meta_value )
			add_post_meta( $post_id, $meta_key, $new_meta_value, true );

		/* If the new meta value does not match the old value, update it. */
		elseif ( current_user_can( 'edit_post_meta', $post_id, $meta_key ) && $new_meta_value && $new_meta_value != $meta_value )
			update_post_meta( $post_id, $meta_key, $new_meta_value );
	}
}

?>