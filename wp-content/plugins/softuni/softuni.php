<?php
/*
 * Plugin Name: SoftUni
 * Author: Atanas Vasilev
 * Version: 0.1
 * Description: This will be my main plugin for SoftUni course!
 */

 if ( ! defined( 'SOFTUNI_PLUGIN_VERSION' ) ) {
    define( 'SOFTUNI_PLUGIN_VERSION' , '0.1' );
 };

 if ( ! defined( 'SOFTUNI_PLUGIN_ASSETS_URL' ) ) {
    define( 'SOFTUNI_PLUGIN_ASSETS_URL' , plugin_dir_url( __FILE__ ) . 'assets' );
 };

//  var_dump( SOFTUNI_PLUGIN_ASSETS_URL ); die();
 require 'includes/cpt-products.php';
 require 'includes/cpt-testimonial.php';