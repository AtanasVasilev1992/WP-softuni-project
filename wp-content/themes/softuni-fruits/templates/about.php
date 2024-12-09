<?php

/**
 * Template name: About us
 */
?>

<?php get_header(); ?>

<?php get_template_part( 'partials/page' , 'header' ) ; ?>

<?php get_template_part( 'partials/feature' , 'about' ) ; ?>

<?php get_template_part( 'partials/shop' , 'banner' ) ; ?>

<?php get_template_part( 'partials/team' , 'section' ) ; ?>

<?php fruits_display_latest_testimonials(3); ?>

<?php get_footer(); ?>