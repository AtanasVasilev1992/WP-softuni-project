<?php

if ( !class_exists( 'Softuni_Banner' ) ) :
    class Softuni_Banner {
        public function __construct() {
            add_action( 'init', array($this, 'register_banner_cpt' ) );
            add_action( 'add_meta_boxes', array( $this, 'add_product_meta_boxes' ) );
            add_action( 'save_post', array( $this, 'save_product_meta_boxes' ) );
        }

        public function register_banner_cpt() {
            $labels = array(
                'name'          => 'Banners',
                'singular_name' => 'Banner',
                'menu_name'     => 'Banners',
                'add_new_item'  => 'Add New Banner',
                'edit_item'     => 'Edit Banner',
            );
            $args = array(
                'labels'        => $labels,
                'public'        => true,
                'show_in_rest'  => true,
                'supports'      => array( 'title', 'editor', 'thumbnail' ),
            );
            register_post_type( 'banner', $args );
        }

        public function add_product_meta_boxes() {
            add_meta_box(
                'banner_product_meta_box',
                'Product Information',
                array( $this, 'render_product_meta_box' ),
                'banner',
                'normal',
                'high'
            );
        }

        public function render_product_meta_box( $post ) {
            $product_name = get_post_meta( $post -> ID, '_product_name', true );
            $product_image = get_post_meta( $post -> ID, '_product_image', true );
            $product_description = get_post_meta( $post -> ID, '_product_description', true );
            $product_link = get_post_meta( $post -> ID, '_product_link', true );
            $product_discount = get_post_meta( $post -> ID, '_product_discount', true );
            $product_countdown = get_post_meta( $post -> ID, '_product_countdown', true );

            wp_nonce_field( 'product_meta_nonce', 'product_meta_nonce' );
            ?>
            <p>
                <label for="product_name">Product Name:</label><br>
                <input type="text" name="product_name" id="product_name" value="<?php echo esc_attr( $product_name ); ?>" style="width:100%;">
            </p>
            <p>
                <label for="product_image">Product Image URL:</label><br>
                <input type="text" name="product_image" id="product_image" value="<?php echo esc_attr( $product_image ); ?>" style="width:100%;">
            </p>
            <p>
                <label for="product_description">Product Description:</label><br>
                <textarea name="product_description" id="product_description" style="width:100%;"><?php echo esc_textarea( $product_description ); ?></textarea>
            </p>
            <p>
                <label for="product_link">Product Link:</label><br>
                <input type="text" name="product_link" id="product_link" value="<?php echo esc_attr( $product_link ); ?>" style="width:100%;">
            </p>
            <p>
                <label for="product_discount">Discount (%):</label><br>
                <input type="number" name="product_discount" id="product_discount" value="<?php echo esc_attr( $product_discount ); ?>" style="width:100%;" min="0" max="100">
            </p>
            <p>
                <label for="product_countdown">Countdown Date (YYYY/MM/DD):</label><br>
                <input type="text" name="product_countdown" id="product_countdown" value="<?php echo esc_attr( $product_countdown ); ?>" style="width:100%;">
            </p>
            <?php
        }

        public function save_product_meta_boxes( $post_id ) {
            if ( ! isset( $_POST[ 'product_meta_nonce' ] ) || ! wp_verify_nonce( $_POST[ 'product_meta_nonce' ], 'product_meta_nonce' ) ) {
                return;
            }

            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return;
            }

            $product_fields = array( 'product_name', 'product_image', 'product_description', 'product_link', 'product_discount', 'product_countdown' );

            foreach ( $product_fields as $field ) {
                if ( isset( $_POST[ $field ] ) ) {
                    update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
                }
            }
        }
    }

    $softuni_Banner = new Softuni_Banner();

endif;