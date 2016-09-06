<?php
add_action( 'init', 'add_job_listing' );
function add_job_listing() {
	$labels = array(
		'name'               => _x( 'Jobs Listing', 'page type general name', 'lifematterstheme' ),
		'singular_name'      => _x( 'Job Listing', 'page type singular name', 'lifematterstheme' ),
		'menu_name'          => _x( 'Jobs Listing', 'admin menu', 'lifematterstheme' ),
		'name_admin_bar'     => _x( 'Job Listing', 'add new on admin bar', 'lifematterstheme' ),
		'add_new'            => _x( 'Add New Job Listing', 'listing', 'lifematterstheme' ),
		'add_new_item'       => __( 'Add New Job Listing', 'lifematterstheme' ),
		'new_item'           => __( 'New Job Listing', 'lifematterstheme' ),
		'edit_item'          => __( 'Edit Job Listing', 'lifematterstheme' ),
		'view_item'          => __( 'View Job Listing', 'lifematterstheme' ),
		'all_items'          => __( 'All Job Listings', 'lifematterstheme' ),
		'search_items'       => __( 'Search Job Listings', 'lifematterstheme' ),
		'parent_item_colon'  => __( 'Parent Job Listings:', 'lifematterstheme' ),
		'not_found'          => __( 'No job listings found.', 'lifematterstheme' ),
		'not_found_in_trash' => __( 'No job listings in Trash.', 'lifematterstheme' )
	);

	$args = array(
		'labels'             => $labels,
		'description' => __( 'Create and edit individual job listings', 'lifematterstheme' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'job', 'with_front' => false ),
		'capability_type'    => 'page',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'menu_icon'       	 => 'dashicons-nametag',
		'supports'           => array( 'title', 'editor')
	 );

	register_post_type( 'job_listing', $args );
}


?>