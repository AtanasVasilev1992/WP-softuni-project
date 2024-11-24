<?php

add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_post_type_support( 'excerpt' , array() );

add_action( 'wp_enqueue_scripts' , 'softuni_enqueue_assets' );
function softuni_enqueue_assets()
{
    wp_enqueue_style( 'softuni' , get_stylesheet_directory_uri() . './style.css');
};

function fruits_display_latest_posts( $number_of_posts = 3 ) {
    include 'latest-posts.php';
};

/**
 * Adding extra class in body tag.
 */

function my_softuni_body_class( $classes ) {
    $classes[] = 'my-softuni-test-class';

    return $classes;
};

add_action( 'body_class' , 'my_softuni_body_class');


/**
 * This is main function to register navigation menus
 */
function softuni_navigation_menus() {
    
}