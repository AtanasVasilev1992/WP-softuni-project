<?php
/**
 * Template name: Homepage
 */
?>

<?php 
$fields = get_fields( get_the_ID() );
?>

<?php get_header(); ?>

<?php get_template_part( 'partials/feature' , 'list' ) ; ?>

<?php get_template_part( 'partials/product', 'section' ) ; ?>

<?php get_template_part( 'partials/cart' , 'section' ) ; ?>

<?php get_template_part( 'partials/testimonial' , 'section' ) ; ?>

<?php get_template_part( 'partials/advertisement' , 'section' , $fields ) ; ?>

<?php get_template_part( 'partials/shop' , 'banner' ) ; ?>

<?php fruits_display_latest_posts(6); ?>

<?php get_footer(); ?>