<?php

/* Bones Custom Post Type
Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );
function bones_flush_rewrite_rules() { flush_rewrite_rules(); }

// Change Default Posts to Blog Posts (Posts moved from 5 to 6)
add_action( 'admin_menu', 'rename_posts_label' );
function rename_posts_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Blog Posts';
    $submenu['edit.php'][5][0] = 'Blog Posts';
    $submenu['edit.php'][10][0] = 'Add Blog Post';
    $submenu['edit.php'][16][0] = 'Blog Posts Tags';
    echo '';
}

// Change Default Posts to Blog Posts
add_action( 'init', 'rename_posts_object' );
function rename_posts_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Blog Posts';
    $labels->singular_name = 'Blog Post';
    $labels->add_new = 'Add Blog Post';
    $labels->add_new_item = 'Add Blog Post';
    $labels->edit_item = 'Edit Blog Post';
    $labels->new_item = 'Blog Post';
    $labels->view_item = 'View Blog Post';
    $labels->search_items = 'Search Blog Posts';
    $labels->not_found = 'No Blog Posts found';
    $labels->not_found_in_trash = 'No Blog Posts found in Trash';
    $labels->all_items = 'All Blog Posts';
    $labels->menu_name = 'Blog Posts';
    $labels->name_admin_bar = 'Blog Posts';
}

// Change Default Links to Affiliates Links
// add_action( 'admin_menu', 'rename_link_label' );
// function rename_link_label() {
//     global $menu;
//     global $submenu;
//     $menu[15][0] = 'Affiliates Links';
//     $submenu['link-manager.php'][5][0] = 'Affiliates Links';
//     $submenu['link-manager.php'][10][0] = 'Add an Affiliate Link';
//     $submenu['link-manager.php'][15][0] = 'Affiliate Link Categories';
//     echo '';
// }

// Remove WP Default Comments
add_action( 'admin_menu', 'remove_menus' );
function remove_menus(){
  remove_menu_page( 'edit-comments.php' );  
}


// Create Staff Member Profiles
require_once('cpt/staffprofiles.php');	

// Create Job Listing
require_once('cpt/jobslisting.php');		
	
// Create Care Giver Spotlight Profiles
require_once('cpt/caregiverprofiles.php');

// Create Care Giver Spotlight Profiles
require_once('cpt/newsletter.php');

// Create Care Giver Spotlight Profiles
// Removed by Stacey 5/16. These custom post types have been replaced by Advanced Custom Fields
//require_once('cpt/pressreleases.php');

// Create Affiliates
// Removed by Stacey 5/16. These custom post types have been replaced by Advanced Custom Fields
//require_once('cpt/affiliates.php');

// Add Home Page Section Meta Box
// add_action( 'add_meta_boxes', 'selectsectiontype_add_meta_box' );
function selectsectiontype_add_meta_box() {

	$screens = array( 'post', 'page' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'selectsectiontype_sectionid',
			__( 'Section Type', 'selectsectiontype_textdomain' ),
			'selectsectiontype_meta_box_callback',
			$screen
		);
	}
}

function selectsectiontype_meta_box_callback( $post ) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'selectsectiontype_meta_box', 'selectsectiontype_meta_box_nonce' );
	$value = get_post_meta( $post->ID, 'select_section_type', true );

	echo '<input type="radio" name="select_section_type" value="standard"';
	if ( isset ( $prfx_stored_meta['select_section_type'] ) ){ checked( $prfx_stored_meta['select_section_type'][0], 'standard' ); }; 
	echo'>Standard<br>';
	echo '<input type="radio" name="select_section_type" value="featured"';
	if ( isset ( $prfx_stored_meta['select_section_type'] ) ){ checked( $prfx_stored_meta['select_section_type'][0], 'featured' ); };
	echo '/>Featured (Home Page Only)<br>';
	echo '<input type="radio" name="select_section_type" value="quote"';
	if ( isset ( $prfx_stored_meta['select_section_type'] ) ){ checked( $prfx_stored_meta['select_section_type'][0], 'quote' ); };
	echo '/>Quote (Home Page Only)<br>';
	echo '<input type="radio" name="select_section_type" value="video"';
	if ( isset ( $prfx_stored_meta['select_section_type'] ) ){ checked( $prfx_stored_meta['select_section_type'][0], 'video' ); };
	echo '/>Video (Home Page Only)';
}

//add_action( 'save_post', 'selectsectiontype_save_meta_box_data' );
function selectsectiontype_save_meta_box_data( $post_id ) {


	// Check if our nonce is set.
	if ( ! isset( $_POST['selectsectiontype_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['selectsectiontype_meta_box_nonce'], 'selectsectiontype_meta_box' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */
	
	// Make sure that it is set.
	if ( ! isset( $_POST['selectsectiontype_new_field'] ) ) {
		return;
	}

	// Retrieves the stored value from the database
    $meta_value = get_post_meta( get_the_ID(), 'select_section_type', true );

	// Update the meta field in the database.
	if( isset( $_POST[ 'select_section_type' ] ) ) {
	    	update_post_meta( $post_id, 'select_section_type', $_POST[ 'select_section_type' ] );
		}
	
}


?>