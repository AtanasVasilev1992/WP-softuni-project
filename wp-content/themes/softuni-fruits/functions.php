<?php

if ( ! defined( 'SOFTUNI_FRUITS_THEME_VER' ) ) {
    define('SOFTUNI_FRUITS_THEME_VER', '1.0.0');
}

add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_post_type_support( 'excerpt' , array() );

add_action( 'wp_enqueue_scripts' , 'softuni_enqueue_assets' );
function softuni_enqueue_assets() {
    wp_enqueue_style( 'softuni', get_stylesheet_directory_uri() . '/style.css', array(), SOFTUNI_FRUITS_THEME_VER );
    
    // From Header
    wp_enqueue_style( 'main.css', get_stylesheet_directory_uri() . '/assets/css/main.css', array(), SOFTUNI_FRUITS_THEME_VER );
    wp_enqueue_style( 'all.min.css', get_stylesheet_directory_uri() . '/assets/css/all.min.css', array(), SOFTUNI_FRUITS_THEME_VER );
    wp_enqueue_style( 'bootstrap.min.css', get_stylesheet_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css', array(), SOFTUNI_FRUITS_THEME_VER );
    wp_enqueue_style( 'owl.carousel.css', get_stylesheet_directory_uri() . '/assets/css/owl.carousel.css', array(), SOFTUNI_FRUITS_THEME_VER );
    wp_enqueue_style( 'magnific-popup.css', get_stylesheet_directory_uri() . '/assets/css/magnific-popup.css', array(), SOFTUNI_FRUITS_THEME_VER );
    wp_enqueue_style( 'animate.css', get_stylesheet_directory_uri() . '/assets/css/animate.css', array(), SOFTUNI_FRUITS_THEME_VER );
    wp_enqueue_style( 'meanmenu.min.css', get_stylesheet_directory_uri() . '/assets/css/meanmenu.min.css', array(), SOFTUNI_FRUITS_THEME_VER );
    wp_enqueue_style( 'responsive.css', get_stylesheet_directory_uri() . '/assets/css/responsive.css', array(), SOFTUNI_FRUITS_THEME_VER );

    // From Footer
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'jquery-1.11.3', get_stylesheet_directory_uri() . '/assets/js/jquery-1.11.3.min.js', array('jquery'), SOFTUNI_FRUITS_THEME_VER );
    wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array('jquery'), SOFTUNI_FRUITS_THEME_VER );
    wp_enqueue_script( 'jquery-countdown', get_stylesheet_directory_uri() . '/assets/js/jquery.countdown.js', array('jquery'), SOFTUNI_FRUITS_THEME_VER );
    wp_enqueue_script( 'isotope', get_stylesheet_directory_uri() . '/assets/js/jquery.isotope-3.0.6.min.js', array('jquery'), SOFTUNI_FRUITS_THEME_VER );
    wp_enqueue_script( 'waypoints', get_stylesheet_directory_uri() . '/assets/js/waypoints.js', array('jquery'), SOFTUNI_FRUITS_THEME_VER );
    wp_enqueue_script( 'owl-carousel', get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), SOFTUNI_FRUITS_THEME_VER );
    wp_enqueue_script( 'magnific-popup', get_stylesheet_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), SOFTUNI_FRUITS_THEME_VER );
    wp_enqueue_script( 'meanmenu', get_stylesheet_directory_uri() . '/assets/js/jquery.meanmenu.min.js', array('jquery'), SOFTUNI_FRUITS_THEME_VER );
    wp_enqueue_script( 'sticker', get_stylesheet_directory_uri() . '/assets/js/sticker.js', array('jquery'), SOFTUNI_FRUITS_THEME_VER );
    wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), SOFTUNI_FRUITS_THEME_VER );

}

function fruits_display_latest_posts( $number_of_posts = 3 ) {
    include 'latest-posts.php';
};

function fruits_display_latest_products( $number_of_posts = 3 ) {
    include 'partials/product-section.php';
};

function fruits_display_latest_testimonials( $number_of_posts = 3 ) {
    include 'partials/testimonial-section.php';
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
    // register_nav_menus(
    //     array(
    //     'primary_menu'          => __( 'Primary Menu', 'textdomain' ),
    //     'primary_menu_mobile'   => __( 'Primary Menu Mobile', 'textdomain' ),
    //     'footer_menu_site_info' => __( 'Footer Menu Site Info', 'textdomain' ),
    //     )
    //     );

    register_nav_menu( 'primary' , 'Primary menu');
}

add_action( 'after_setup_theme', 'softuni_navigation_menus', 0 );

function softuni_register_sidebars() {
    register_sidebar(
        array(
            'id'            => 'footer-1',
            'name'          => __( 'Footer 1 Sidebar' ),
            'description'   => __( 'A short description of the sidebar.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
            )
    );

    register_sidebar(
        array(
            'id'            => 'footer-2',
            'name'          => __( 'Footer 2 Sidebar' ),
            'description'   => __( 'A short description of the sidebar.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
            )
    );

    register_sidebar(
        array(
            'id'            => 'footer-3',
            'name'          => __( 'Footer 3 Sidebar' ),
            'description'   => __( 'A short description of the sidebar.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
            )
    );

    register_sidebar(
        array(
            'id'            => 'footer-4',
            'name'          => __( 'Footer 4 Sidebar' ),
            'description'   => __( 'A short description of the sidebar.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
            )
    );
}
add_action( 'widgets_init', 'softuni_register_sidebars' );