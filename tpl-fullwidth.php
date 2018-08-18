<?php
/**
 * Template Name: Full Width Page
 * Template Post Type: page
 * 
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

Timber::render( array( 
  'page-' . $post->post_name . '-fullwidth.twig', 
  'page-fullwidth.twig',
  'page-' . $post->post_name . '.twig', 
  'page.twig' 
), $context );
