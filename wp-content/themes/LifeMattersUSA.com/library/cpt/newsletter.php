<?php
add_action( 'init', 'add_newsletter' );
function add_newsletter() {
	$labels = array(
		'name'               => _x( 'Newsletters', 'page type general name', 'lifematterstheme' ),
		'singular_name'      => _x( 'Newsletter', 'page type singular name', 'lifematterstheme' ),
		'menu_name'          => _x( 'Newsletters', 'admin menu', 'lifematterstheme' ),
		'name_admin_bar'     => _x( 'Newsletter', 'add new on admin bar', 'lifematterstheme' ),
		'add_new'            => _x( 'Add New Newsletter', 'listing', 'lifematterstheme' ),
		'add_new_item'       => __( 'Add New Newsletter', 'lifematterstheme' ),
		'new_item'           => __( 'New Newsletter', 'lifematterstheme' ),
		'edit_item'          => __( 'Edit Newsletter', 'lifematterstheme' ),
		'view_item'          => __( 'View Newsletter', 'lifematterstheme' ),
		'all_items'          => __( 'All Newsletters', 'lifematterstheme' ),
		'search_items'       => __( 'Search Newsletters', 'lifematterstheme' ),
		'parent_item_colon'  => __( 'Parent Newsletters:', 'lifematterstheme' ),
		'not_found'          => __( 'No Newsletters found.', 'lifematterstheme' ),
		'not_found_in_trash' => __( 'No Newsletters in Trash.', 'lifematterstheme' )
	);

	$args = array(
		'labels'             => $labels,
		'description' => __( 'Create and edit individual Newsletter link', 'lifematterstheme' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'nwsltr', 'with_front' => false ),
		'capability_type'    => 'page',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 7,
		'menu_icon'       	 => 'dashicons-analytics',
		'supports'           => array( 'title', 'thumbnail')
	 );

	register_post_type( 'newsletter', $args );
}

// Add Job Title Meta Box
add_action( 'add_meta_boxes', 'linktomedia_add_meta_box' );
function linktomedia_add_meta_box() {
	add_meta_box(
		'enter_linktomedia',
		__( 'Enter Link to Media', 'enterlinktomedia_textdomain' ),
		'linktomedia_meta_box_callback',
		'newsletter',
		'normal',
		'core'
	);
}

function linktomedia_meta_box_callback( $post ) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'enterlinktomedia_meta_box', 'enterlinktomedia_meta_box_nonce' );

	$value = get_post_meta( $post->ID, 'newsletterlinktomedia', true );

	echo '<label for="enterlinktomedia_new_field">';
	_e( '', 'enterlinktomedia_textdomain' );
	echo '</label><p>To add a newsletter for user to download:</p><ol><li>Enter a title above.</li><li>Click "Save Draft" on the right.</li><li>On the admin menu to the left, click "Media", then "Add New".</li><li>Upload your .pdf, .doc or other file as new media to the library.</li><li>Once the file is uploaded, select "Media", then "Library" and view the details by finding and clicking on the file you just uploaded.</li><li>On the details screen, find the URL (also called, "File URL"), select it, and copy it.</li><li>Once the URL has been copied, return to edit your newsletter post (ie. Return to this screen).</li>';
	echo '<li><input type="text" id="enterlinktomedia_new_field" name="enterlinktomedia_new_field" value="' . esc_attr( $value ) . '" size="25" placeholder="Paste URL here" /></li></ol>';
}

add_action( 'save_post', 'linktomedia_save_meta_box_data' );
function linktomedia_save_meta_box_data( $post_id ) {

	// Check if our nonce is set.
	if ( ! isset( $_POST['enterlinktomedia_meta_box_nonce'] ) ) { return; }

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['enterlinktomedia_meta_box_nonce'], 'enterlinktomedia_meta_box' ) ) { return; }

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) { return; }

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) { return; }
	}

	/* OK, it's safe for us to save the data now. */
	
	// Make sure that it is set.
	if ( ! isset( $_POST['enterlinktomedia_new_field'] ) ) { return; }

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['enterlinktomedia_new_field'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'newsletterlinktomedia', $my_data );
}



?>