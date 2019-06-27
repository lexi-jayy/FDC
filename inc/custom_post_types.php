<?php




function add_services_post_type(){

    $labels = array(
        'name'               => _x( 'Services', 'post type general name', 'FDCTheme' ),
		'singular_name'      => _x( 'Services', 'post type singular name', 'FDCTheme' ),
		'menu_name'          => _x( 'Services', 'admin menu', 'FDCTheme' ),
		'name_admin_bar'     => _x( 'Services', 'add new on admin bar', 'FDCTheme' ),
		'add_new'            => _x( 'Add New', 'event', 'FDCTheme' ),
		'add_new_item'       => __( 'Add New Services', 'FDCTheme' ),
		'new_item'           => __( 'New Services', 'FDCTheme' ),
		'edit_item'          => __( 'Edit Services', 'FDCTheme' ),
		'view_item'          => __( 'View Services', 'FDCTheme' ),
		'all_items'          => __( 'All Services', 'FDCTheme' ),
		'search_items'       => __( 'Search Services', 'FDCTheme' ),
		'parent_item_colon'  => __( 'Parent Services:', 'FDCTheme' ),
		'not_found'          => __( 'No Services found.', 'FDCTheme' ),
		'not_found_in_trash' => __( 'No Services found in Trash.', 'FDCTheme' )
    );

    $args = array(
        'labels' => $labels,
        'description' => 'A list of Services that we provide  which will be held in the database',
        'public' => true,
        'show_in_nav_menus' => false,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-filter',
        'taxonomies'  => array( 'category' ),
        'supports' => array('title', 'thumbnail', 'editor', 'post-formats', 'excerpt', 'wp-block-styles')
    );


    register_post_type('Services', $args);
}

add_action('init', 'add_services_post_type');