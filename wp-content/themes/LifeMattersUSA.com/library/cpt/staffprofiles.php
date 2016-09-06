<?php

add_action( 'init', 'add_staff_member' );
function add_staff_member() {
	$labels = array(
		'name'               => _x( 'Staff Profiles', 'post type general name', 'lifematterstheme' ),
		'singular_name'      => _x( 'Staff Profile', 'post type singular name', 'lifematterstheme' ),
		'menu_name'          => _x( 'Staff Profiles', 'admin menu', 'lifematterstheme' ),
		'name_admin_bar'     => _x( 'Staff Profile', 'add new on admin bar', 'lifematterstheme' ),
		'add_new'            => _x( 'Add New Profile', 'profile', 'lifematterstheme' ),
		'add_new_item'       => __( 'Add New Staff Profile', 'lifematterstheme' ),
		'new_item'           => __( 'New Staff Profile', 'lifematterstheme' ),
		'edit_item'          => __( 'Edit Profile', 'lifematterstheme' ),
		'view_item'          => __( 'View Profile', 'lifematterstheme' ),
		'all_items'          => __( 'All Staff Profiles', 'lifematterstheme' ),
		'search_items'       => __( 'Search Staff Profiles', 'lifematterstheme' ),
		'parent_item_colon'  => __( 'Parent Staff Profiles:', 'lifematterstheme' ),
		'not_found'          => __( 'No profiles found.', 'lifematterstheme' ),
		'not_found_in_trash' => __( 'No profiles found in Trash.', 'lifematterstheme' )
	);

	$args = array(
		'labels'             => $labels,
		'description' => __( 'Create and edit Staff Member Profiles for use on the Who We Are page, and others', 'lifematterstheme' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'staff', 'with_front' => false ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 4,
		'menu_icon'       	 => 'dashicons-id-alt',
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'staff_mbr', $args );
};

// Create Grouping Taxonomy
register_taxonomy( 'grouping', 
	array('staff_mbr'), 
	array('hierarchical' => true,
		'labels' => array(
			'name' => __( 'Groupings', 'lifematterstheme' ),
			'singular_name' => __( 'Grouping', 'lifematterstheme' ),
			'search_items' =>  __( 'Search Groupings', 'lifematterstheme' ),
			'all_items' => __( 'All Groupings', 'lifematterstheme' ),
			'parent_item' => __( 'Grouping Parent', 'lifematterstheme' ),
			'parent_item_colon' => __( 'Grouping Parent:', 'lifematterstheme' ),
			'edit_item' => __( 'Edit Grouping', 'lifematterstheme' ),
			'update_item' => __( 'Update Grouping', 'lifematterstheme' ),
			'add_new_item' => __( 'Add New Grouping Type', 'lifematterstheme' ),
			'new_item_name' => __( 'New Grouping Title', 'lifematterstheme' )
		),
		'show_admin_column' => true, 
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'group' ),
	)
);

// Change Default Title Input
add_filter( 'enter_title_here', 'change_default_title_field' );
function change_default_title_field( $title ){
    $screen = get_current_screen();
    if  ( 'staff_mbr' == $screen->post_type ) { $title = 'Enter Name'; } 
    return $title;
}


// Relabel default Thumbnail Metabox
add_action('do_meta_boxes', 'change_image_box');
function change_image_box() {
    //remove_meta_box( 'postimagediv', 'custom_post_type', 'side' );
    add_meta_box('postimagediv', __('Profile Image'), 'post_thumbnail_meta_box', 'staff_mbr', 'normal', 'high');
}

// Add Job Title Meta Box
add_action( 'add_meta_boxes', 'jobtitle_add_meta_box' );
function jobtitle_add_meta_box() {
	add_meta_box(
		'enter_jobtitle',
		__( 'Enter Job Title', 'enterjobtitle_textdomain' ),
		'jobtitle_meta_box_callback',
		'staff_mbr',
		'normal',
		'core'
	);
}

function jobtitle_meta_box_callback( $post ) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'enterjobtitle_meta_box', 'enterjobtitle_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value = get_post_meta( $post->ID, 'staffjobtitle', true );

	echo '<label for="enterjobtitle_new_field">';
	_e( '', 'enterjobtitle_textdomain' );
	echo '</label> ';
	echo '<input type="text" id="enterjobtitle_new_field" name="enterjobtitle_new_field" value="' . esc_attr( $value ) . '" size="25" />';
}

add_action( 'save_post', 'jobtitle_save_meta_box_data' );
function jobtitle_save_meta_box_data( $post_id ) {

	// Check if our nonce is set.
	if ( ! isset( $_POST['enterjobtitle_meta_box_nonce'] ) ) { return; }

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['enterjobtitle_meta_box_nonce'], 'enterjobtitle_meta_box' ) ) { return; }

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
	if ( ! isset( $_POST['enterjobtitle_new_field'] ) ) { return; }

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['enterjobtitle_new_field'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'staffjobtitle', $my_data );
}


// Add Job Title and Grouping columns to edit screen
function set_staffmbr_columns($columns) {
    return array(
        'cb' => '<input type="checkbox" />',
        'title' => __('Name'),
        'jobtitle' => __('Job Title'),
        'grouping' => __('Grouping'),
        'featuredimage' =>__( 'Profile Image')
    );
}
add_filter('manage_staff_mbr_posts_columns' , 'set_staffmbr_columns');

// Populate columns
add_action( 'manage_staff_mbr_posts_custom_column' , 'custom_staffmbr_column', 10, 2 );
function custom_staffmbr_column( $column, $post_id ) {
    switch ( $column ) {

        case 'grouping' :
            $terms = get_the_term_list( $post_id , 'grouping' , '' , ',' , '' );
            if ( is_string( $terms ) )
                echo $terms;
            else
                _e( 'Unable to get grouping', 'lifematterstheme' );
            break;
        case 'jobtitle' :
            echo get_post_meta( $post_id , 'staffjobtitle' , true );
            break;
		case 'featuredimage':
			if( function_exists( 'the_post_thumbnail' ) ) {
				echo the_post_thumbnail( 'thumbnail' );
			} else {
				echo __( 'Not supported in theme', 'lifematterstheme' );
			}
			break;
    }
}

?>