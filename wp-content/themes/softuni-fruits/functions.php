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