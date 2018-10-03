<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

if ( ! class_exists( 'Timber' ) ) {
	echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
	return;
}

$context = Timber::get_context();

////////////////////////////////////////////////////////////////////////////////
// 404

if ( is_404() ) {

	$templates = array( '404.twig' );
	$context['title'] = "Oups, petit problème !";

////////////////////////////////////////////////////////////////////////////////
// ARCHIVE

} else if ( is_archive() ) {

	// AUTHOR
	if ( is_author() ) {
		$templates = array( 'author.twig', 'archive.twig' );
		$context['posts'] = Timber::get_posts();

		if ( isset( $wp_query->query_vars['author'] ) ) {
			$author = new TimberUser( $wp_query->query_vars['author'] );
			$context['author'] = $author;
			$context['title'] = 'Articles de ' . $author->name();
		}

	// ARCHIVE
	} else {
		$templates = array( 'archive.twig', 'index.twig' );
		$context['title'] = 'Articles';
		$context['posts'] = Timber::get_posts();
		
		if ( is_day() ) {
			$context['title'] = 'Articles par date : '.get_the_date( 'D M Y' );
		} else if ( is_month() ) {
			$context['title'] = 'Articles par date : '.get_the_date( 'M Y' );
		} else if ( is_year() ) {
			$context['title'] = 'Articles par date : '.get_the_date( 'Y' );
		} else if ( is_tag() ) {
			$context['title'] = 'Articles avec le tag "'.single_tag_title( '', false ). '"';
		} else if ( is_category() ) {
			$context['title'] = 'Articles dans la catégorie '.single_cat_title( '', false );
			array_unshift( $templates, 'archive-' . get_query_var( 'cat' ) . '.twig' );
		} else if ( is_post_type_archive() ) {
			$context['title'] = post_type_archive_title( '', false );
			array_unshift( $templates, 'archive-' . get_post_type() . '.twig' );
		}
	}

////////////////////////////////////////////////////////////////////////////////
// SINGLE

} else if ( is_single() ) { // Or is_singular()?

	if ( post_password_required( $post->ID ) ) {
		$templates = array( 'single-password.twig' );

	} else {
		$templates = array(
			'single-' . $post->ID . '.twig', 
			'single-' . $post->post_type . '.twig', 
			'single.twig' 
		);
	}

	$post = Timber::query_post();
	$context['post'] = $post;

////////////////////////////////////////////////////////////////////////////////
// PAGE

} else if( is_page() ) {

	$post = new TimberPost();
	$context['post'] = $post;
	
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
	
////////////////////////////////////////////////////////////////////////////////
// INDEX

} else {

	$templates = array( 'index.twig' );
	$context['title'] = 'Tous les articles';
	$context['posts'] = Timber::get_posts();
}

////////////////////////////////////////////////////////////////////////////////
// TIMBER TEMPLATES RENDERING

Timber::render( $templates, $context );

