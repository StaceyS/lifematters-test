<?php
add_action( 'init', 'add_care_giver_spotlight' );
function add_care_giver_spotlight() {
	$labels = array(
		'name'               => _x( 'Care Giver Spotlight Profile', 'post type general name', 'lifematterstheme' ),
		'singular_name'      => _x( 'Care Giver Spotlight Profile', 'post type singular name', 'lifematterstheme' ),
		'menu_name'          => _x( 'Care Giver Spotlight', 'admin menu', 'lifematterstheme' ),
		'name_admin_bar'     => _x( 'Care Giver Spotlight', 'add new on admin bar', 'lifematterstheme' ),
		'add_new'            => _x( 'Add New Care Giver', 'listing', 'lifematterstheme' ),
		'add_new_item'       => __( 'Add New Care Giver', 'lifematterstheme' ),
		'new_item'           => __( 'New Care Giver', 'lifematterstheme' ),
		'edit_item'          => __( 'Edit Care Giver Profile', 'lifematterstheme' ),
		'view_item'          => __( 'View Care Giver Profile', 'lifematterstheme' ),
		'all_items'          => __( 'All Care Giver Spotlight Profiles', 'lifematterstheme' ),
		'search_items'       => __( 'Search Care Giver Profiles', 'lifematterstheme' ),
		'parent_item_colon'  => __( 'Parent Care Giver Spotlight Profiles:', 'lifematterstheme' ),
		'not_found'          => __( 'No Care Giver Profiles found.', 'lifematterstheme' ),
		'not_found_in_trash' => __( 'No Care Giver Profiles in Trash.', 'lifematterstheme' )
	);

	$args = array(
		'labels'             => $labels,
		'description' => __( 'Create and edit individual Care Giver Profiles to spotlight', 'lifematterstheme' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'spotlight', 'with_front' => false ),
		'capability_type'    => 'page',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'       	 => 'dashicons-star-filled',
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'care_giver', $args );
}

// Create Current Spotlight Taxonomy
register_taxonomy( 'spotlight_designation', 
	array('care_giver'), 
	array('hierarchical' => true,
		'labels' => array(
			'name' => __( 'Designation', 'lifematterstheme' ),
			'singular_name' => __( 'Designation', 'lifematterstheme' ),
			'search_items' =>  __( 'Search Designations', 'lifematterstheme' ),
			'all_items' => __( 'All Designations', 'lifematterstheme' ),
			'parent_item' => __( 'Designation Parent', 'lifematterstheme' ),
			'parent_item_colon' => __( 'Designation Parent:', 'lifematterstheme' ),
			'edit_item' => __( 'Edit Designation', 'lifematterstheme' ),
			'update_item' => __( 'Update Designation', 'lifematterstheme' ),
			'add_new_item' => __( 'Add New Designation Type', 'lifematterstheme' ),
			'new_item_name' => __( 'New Designation Title', 'lifematterstheme' )
		),
		'show_admin_column' => true, 
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'spotdesg' ),
	)
);

// Change Default Title Input
add_filter( 'enter_title_here', 'change_default_title' );
function change_default_title( $title ){
    $screen = get_current_screen();

    if  ( 'care_giver' == $screen->post_type ) { $title = 'Enter Name'; } 
    
    return $title;
}

// Relabel default Thumbnail Metabox
add_action('do_meta_boxes', 'change_thumb_box');
function change_thumb_box() {
    remove_meta_box( 'postimagediv', 'custom_post_type', 'side' );
    add_meta_box('postimagediv', __('Care Giver Image'), 'post_thumbnail_meta_box', 'care_giver', 'normal', 'high');
}

// Add Job Title and Grouping columns to edit screen
function set_caregvr_columns($columns) {
    return array(
        'cb' => '<input type="checkbox" />',
        'title' => __('Name'),
        'spotlight_designation' => __('Spotlight Designation'),
        'featuredimage' =>__( 'Profile Image')
    );
}
add_filter('manage_care_giver_posts_columns' , 'set_caregvr_columns');

// Populate columns
add_action( 'manage_care_giver_posts_custom_column' , 'custom_caregvr_column', 10, 2 );
function custom_caregvr_column( $column, $post_id ) {
    switch ( $column ) {
	    
	    case 'spotlight_designation' :
            $terms = get_the_term_list( $post_id , 'spotlight_designation' , '' , ',' , '' );
            if ( is_string( $terms ) )
                echo $terms;
            else
                _e( 'Previous Lifematter STAR Award Recipients', 'lifematterstheme' );
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