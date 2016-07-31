<?php

function enqueue_assets() {

	wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/dist/js/main.js', array( 'jquery' ), '0.1.0', true );
}

add_action( 'wp_enqueue_scripts', 'enqueue_assets' );
