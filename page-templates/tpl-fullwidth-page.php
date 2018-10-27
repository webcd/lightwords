<?php
/**
 * Template Name: Full Width Page
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

// TODO: use page.php with a $fullwidth_content variable and keep it DRY

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$context['fullwidth_content'] = true;

$templates = array( 
  'page-' . $post->post_name . '.twig', 
  'page.twig',
  'index.twig'
);

if (is_front_page()) {

  $args = array(
    'posts_per_page' => 6,
    'orderby' => 'date'
   );
  $context['latest_posts'] = Timber::get_posts($args);

  array_unshift($templates, 'front-page.twig');
}

Timber::render( $templates, $context );
