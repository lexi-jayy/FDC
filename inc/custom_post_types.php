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
        'description' => 'A list of Services that we provide',
        'public' => true,
        'show_in_nav_menus' => false,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-filter',
        'taxonomies'  => array( 'category' ),
        'supports' => array('title', 'thumbnail', 'editor', 'post-formats', 'excerpt', 'wp-block-styles')
    );


    register_post_type('Services', $args);
}

add_action('init', 'add_services_post_type');


function add_Contact_post_type(){
    $labels = array(
        'name' => _x('Contacts', 'post type name', 'FDCTheme'),
        'singular_name' => _x('Contact', 'post types singluar name', 'FDCTheme'),
        'add_new_item' => _x('Add New Contact', 'adding new contact', 'FDCTheme')
    );
    $args = array(
        'labels' => $labels,
        'description' => 'users that want to interact with us that come through our website will be stored here',
        'public' => true,
        'menu_position' => 20,
        'query_var' => true,
        'menu_icon' => 'dashicons-email',
        'supports' => array(
            'title',
            'editor'
        ),
    );
    register_post_type('Contacts', $args);
}
add_action('init', 'add_Contact_post_type');



function add_Joinus_post_type(){
    $labels = array(
        'name' => _x('Join Us', 'post type name', 'FDCTheme'),
        'singular_name' => _x('Joinus', 'post types singluar name', 'FDCTheme'),
        'add_new_item' => _x('Add New Joinus', 'adding new Joinus', 'FDCTheme')
    );
    $args = array(
        'labels' => $labels,
        'description' => 'users that want to become members of our site will send a application form that come through our website will be stored here',
        'public' => true,
        'menu_position' => 21,
        'query_var' => true,
        'menu_icon' => 'dashicons-universal-access',
        'supports' => array(
            'title',
            'editor'
        ),
    );
    register_post_type('Joinus', $args);
}
add_action('init', 'add_Joinus_post_type');

function add_Login_post_type(){
    $labels = array(
        'name' => _x('Login', 'post type name', 'FDCTheme'),
        'singular_name' => _x('Login', 'post types singluar name', 'FDCTheme'),
        'add_new_item' => _x('Add New Login', 'adding new Login', 'FDCTheme')
    );
    $args = array(
        'labels' => $labels,
        'description' => 'members of our site can log in here and the login will be stored',
        'public' => true,
        'menu_position' => 22,
        'query_var' => true,
        'menu_icon' => 'dashicons-migrate',
        'supports' => array(
            'title',
            'editor'
        ),
    );
    register_post_type('Login', $args);
}
add_action('init', 'add_Login_post_type');


function add_Support_post_type(){
    $labels = array(
        'name' => _x('Support', 'post type name', 'FDCTheme'),
        'singular_name' => _x('Support', 'post types singluar name', 'FDCTheme'),
        'add_new_item' => _x('Add New Support', 'adding new Support', 'FDCTheme')
    );
    $args = array(
        'labels' => $labels,
        'description' => 'users that want to interact with us that come through our website will be stored here',
        'public' => true,
        'menu_position' => 21,
        'query_var' => true,
        'menu_icon' => 'dashicons-tickets-alt',
        'supports' => array(
            'title',
            'editor'
        ),
    );
    register_post_type('Supports', $args);
}
add_action('init', 'add_Support_post_type');
