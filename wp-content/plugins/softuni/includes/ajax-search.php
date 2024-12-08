<?php
/*
Plugin Name: My AJAX Search
Description: Custom AJAX search functionality for WordPress
Version: 1.0
Author: Atanas Vasilev
*/

if ( ! defined ( 'ABSPATH' ) ) exit; // Prevent direct access

class My_AJAX_Search {
    public function __construct() {
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
        add_action( 'wp_ajax_ajax_search', [ $this, 'ajax_search_handler' ] );
        add_action( 'wp_ajax_nopriv_ajax_search', [ $this, 'ajax_search_handler' ] );
    }

    public function enqueue_scripts() {
        wp_enqueue_script( 'ajax-search', plugin_dir_url(__FILE__) . '../assets/scripts/script.js', [ 'jquery' ], '1.0', true);
        wp_localize_script( 'ajax-search', 'ajaxsearch', [
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'nonce'    => wp_create_nonce( 'ajax_search_nonce' )
        ]);
        
    }

    public function ajax_search_handler() {
        // Verify nonce for security
        check_ajax_referer( 'ajax_search_nonce', 'nonce' );
    
        $search_query = sanitize_text_field( $_POST[ 'search_query' ] );
        
        $args = [
            'post_type'      => 'any',
            'posts_per_page' => 10,
            's'              => $search_query
        ];
    
        $query = new WP_Query( $args );
    
        ob_start();
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
                get_template_part('templates/search-results');
            }
            wp_reset_postdata();
        } else {
            echo '<p>No results found.</p>';
        }
        $response = ob_get_clean();
    
        wp_send_json_success( $response );
        wp_die();
    }
}

new My_AJAX_Search();