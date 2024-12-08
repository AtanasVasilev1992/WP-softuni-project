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

add_action( 'wp_enqueue_scripts', 'softuni_plugin_enqueue_assets' );


/**
 * This is our dynamic function that handle AJAX function for upvote.
 */
function product_item_like() {
    if ( isset( $_COOKIE[ 'liked_product_' . $_POST[ 'product_id' ] ] ) ) {
        wp_send_json_error( 'You have already liked this!' );
        die();
    }

    $id = esc_attr( $_POST['product_id' ] );
    
    $like_number = get_post_meta( $id, 'likes', true);
    if ( empty( $like_number ) ) {
        $like_number = 0;
    }
    
    $new_like_count = $like_number + 1;

    update_post_meta( $id, 'likes', $new_like_count );

    setcookie( 'liked_product_' . $id, 'true', time() + (30 * DAY_IN_SECONDS), COOKIEPATH, COOKIE_DOMAIN);

    wp_send_json_success( array(
        'likes' => $new_like_count
    ));

    var_dump( $like_number );
    die();

}

add_action( 'wp_ajax_nopriv_product_item_like', 'product_item_like' );
add_action( 'wp_ajax_product_item_like', 'product_item_like' );

/**
 * This is the callback function to display a product title with shortcode.
 */
function display_product_title( $atts ) {
    $atts = shortcode_atts( array(
		'id'         => 'id',
        'show_image' => '',
	), $atts, 'bartag' );

    if ( ! empty( $atts[ 'id' ] ) ) {
        $title = get_the_title( $atts[ 'id' ] );
    };

    if ( ! empty( $atts[ 'show_image' ] ) ) {
        $image = get_the_post_thumbnail_url( $atts[ 'id'] );
    };

    $content = '<div class="shortcode-class">';

    if ( ! empty( $title ) ) {
        $content .= $title ;
    }

    if ( ! empty( $image ) ) {
        $content .= '<img src="'. $image .'">';
    }

    $content .= '</div>';

    return $content;
}

add_shortcode( 'display_product_title' , 'display_product_title' );


/**
 * A custum function that filter our custum category arcive.
 */
function softuni_theme_category_archive_query( $query ) {
    $softuni_options = get_option( 'softuni_my_custom_options' );
    

    if ( ! is_admin() && $query -> is_main_query() && is_category() ) {
        // var_dump( $softuni_options); die;

        if ( ! empty ( $softuni_options[ 'softunit_category_products_per_page' ] ) ) {
            $query -> set( 'posts_per_page', esc_attr( $softuni_options[ 'softunit_category_products_per_page' ] ) );
        }
    }
};

add_action( 'pre_get_posts', 'softuni_theme_category_archive_query' );