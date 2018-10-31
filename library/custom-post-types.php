<?php
function adp_CUSTOMPOSTTYPE_init() {
	
	register_post_type('CPT',
		array(
			'labels' => array(
				'name' => __('CPT'),
				'singular_name' => __('CPT'),
				'add_new' => _x('Add New', 'CPT'),
				'add_new_item' => __('Add New CPT'),
				'edit_item' => __('Edit CPT'),
				'new_item' => __('New CPT'),
				'all_items' => __('All CPT'),
				'view_item' => __('View CPT'),
				'search_items' => __('Search CPT'),
				'not_found' =>	__('No CPT found'),
				'not_found_in_trash' => __('No CPT in Trash'), 
				'parent_item_colon' => '',
				'menu_name' => 'CPT'
			),
			'menu_position' => 7,
			'public' => true,
			'has_archive' => true,
			'hierarchical'       => true,			
			'exclude_from_search' => false,
			'rewrite' => array('slug' => 'CPT'),
			'show_in_rest'       => true,			
			'supports' => array('title', 'thumbnail','editor'),
			// 'taxonomies' => array()
		)
  );
}
add_action('init', 'adp_CUSTOMPOSTTYPE_init');

?>