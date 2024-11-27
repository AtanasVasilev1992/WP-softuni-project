<?php 
add_action( 'wp_enqueue_scripts', 'twentytwentyfour_child_enqueue_styles' );

function twentytwentyfour_child_enqueue_styles() {
	wp_enqueue_style( 
		'twentytwentyfour-parent-style', 
		get_parent_theme_file_uri( 'style.css' )
	);
};