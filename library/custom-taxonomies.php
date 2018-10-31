<?php

// ********* CREATE CUSTOM TAXONOMIES *********

function create_adp_taxonomies() {
	$labels = array(
		'name'              => _x( 'CUSTOM_TAXONOMY', 'taxonomy general name' ),
		'singular_name'     => _x( 'CUSTOM_TAXONOMY', 'taxonomy singular name' ),
		'search_items'      => __( 'Search CUSTOM_TAXONOMYs' ),
		'all_items'         => __( 'All CUSTOM_TAXONOMYs' ),
		'parent_item'       => __( 'Parent CUSTOM_TAXONOMY' ),
		'parent_item_colon' => __( 'Parent CUSTOM_TAXONOMY:' ),
		'edit_item'         => __( 'Edit CUSTOM_TAXONOMY' ),
		'update_item'       => __( 'Update CUSTOM_TAXONOMY' ),
		'add_new_item'      => __( 'Add New CUSTOM_TAXONOMY' ),
		'new_item_name'     => __( 'New CUSTOM_TAXONOMY Name' ),
		'menu_name'         => __( 'CUSTOM_TAXONOMYs' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'CUSTOM_TAXONOMYs' ),
	);

register_taxonomy( 'CUSTOM_TAXONOMY', array('POSTTYPE'), $args );

}

add_action( 'init', 'create_adp_taxonomies', 0 );