<?php

function add_custom_files(){
    wp_enqueue_style('my_bootstrap_file', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '4.3.1');

    wp_enqueue_style('my_custom_stylesheet', get_template_directory_uri() . '/assets/css/custom_theme_style.css', array(), '0.1');

    wp_enqueue_script('jquery');

    wp_enqueue_script('my_bootstrap_script', get_template_directory_uri() . '/assets/js/bootstrap.js', array(), '4.3.1', true);
};

add_action('wp_enqueue_scripts', 'add_custom_files');


function add_admin_styles(){
    wp_enqueue_style('my_admin_styles', get_template_directory_uri() . '/assets/css/admin.css' , array(), '0.1');
}
add_action('admin_enqueue_scripts', 'add_admin_styles');

function register_my_menu() {
    register_nav_menu('header_menu','The menu which appears at the top of the page');
    register_nav_menu('footer_menu','The menu which appears at the bottom of the page');
}
add_action('init', 'register_my_menu');

//registering custom navigation walker
require_once get_template_directory() . '/assets/class-wp-bootstrap-navwalker.php';



//default block styles needed for gutenberg editor
add_theme_support('wp-block-styles');

add_theme_support('post-thumbnails');
add_theme_support( 'custom-header');

function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

add_theme_support( 'post-formats', array( 'Services' ) );

add_image_size('icon', 50, 50, true);

require get_template_directory() . '/inc/custom_post_types.php';

require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/custom_fields.php';