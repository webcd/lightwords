<?php
/**
 * Template Name: Landing page
 * Template Post Type: page
 * 
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

if ( ! class_exists( 'Timber' ) ) {
	echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
	return;
}

// TODO: use page.php with a $landing_page variable and keep it DRY

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$context['fullwidth_content'] = true;
$context['landing_page'] = true;

$templates = array( 
  'page-' . $post->post_name . '.twig', 
  'page.twig',
  'index.twig'
);

Timber::render( $templates, $context );
