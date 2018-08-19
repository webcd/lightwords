<?php
/**
 * Template Name: Full Width Post
 * Template Post Type: post
 * 
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

if ( ! class_exists( 'Timber' ) ) {
	echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
	return;
}

// TODO: use single.php with a $fullwidth_content variable and keep it DRY

$context = Timber::get_context();
$post = Timber::query_post();
$context['post'] = $post;

$context['fullwidth_content'] = true;

if ( post_password_required( $post->ID ) ) {
	Timber::render( 'single-password.twig', $context );
} else {
	Timber::render( array(
		'single-' . $post->ID . '.twig', 
		'single-' . $post->post_type . '.twig', 
		'single.twig' 
	), $context );
}
