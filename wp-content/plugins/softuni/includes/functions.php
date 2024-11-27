<?php

/**
 * This is assets function where we'll enqueue our scripts and styles.
 */

function softuni_plugin_enqueue_assets() {
    wp_enqueue_script( 
        'ajax-script' , 
        plugins_url( '../assets/scripts/script.js', __FILE__ ), 
        array(), 
        1.1
    );

    wp_localize_script(
        'ajax-script', 
        'my_ajax_object', 
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}

add_action('wp_enqueue_scripts', 'softuni_plugin_enqueue_assets');


/**
 * This is our dynamic function that handle AJAX function for upvote.
 */
function product_item_like() {
    // TODO: try to make a cookie check for preventing multi likes
    // TODO: try to make some different logic to show something dynamic... -> 

    $id = esc_attr( $_POST[ 'product_id' ] ) ;
    // var_dump( $_POST );
    // var_dump( $id );
    
    $like_number = get_post_meta( $id, 'likes', true );
    if ( empty ( $like_number ) ) {
        $like_number = 0 ;
    };

    update_post_meta( $id, 'likes', $like_number + 1 );
    var_dump( $like_number );
    die();

}

add_action('wp_ajax_nopriv_product_item_like', 'product_item_like');
add_action('wp_ajax_product_item_like', 'product_item_like');

/**
 * This is the callback function to display a product title with shortcode
 */
function display_product_title( $atts) {
    $atts = shortcode_atts( array(
		'id' => 'id',
        'show_image' => '',
	), $atts, 'bartag' );

    if ( ! empty( $atts[ 'id' ] ) ) {
        $title = get_the_title( $atts[ 'id' ] );
    };

    if ( ! empty( $atts[ 'show_image' ] ) ) {
        $image = get_the_post_thumbnail_url( $atts[ 'id'] );
    };

    $content = '<div class="shortcode-class">';

    if ( ! empty($title)) {
        $content .= $title ;
    }

    if ( ! empty( $image ) ) {
        $content .= '<img src="'. $image .'">';
    }

    $content .= '</div>';

    return $content;
}

add_shortcode( 'display_product_title' , 'display_product_title');