<?php
/**
 * Search results page
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

$templates = array( 'search.twig', 'archive.twig', 'index.twig' );
$context = Timber::get_context();

$context['title'] = count(Timber::get_posts()).' résultat(s) de recherche pour "'. get_search_query().'"';
$context['posts'] = Timber::get_posts();

Timber::render( $templates, $context );
