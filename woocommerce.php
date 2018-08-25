<?php

if ( ! class_exists( 'Timber' ) ){
	echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
	return;
}

$context            = Timber::get_context();
$context['sidebar'] = Timber::get_widgets( 'shop-sidebar' );

if ( is_singular( 'product' ) ) {
	$product = Timber::get_post();
	$context['post'] = $product;
	  
	Timber::render( 'views/woocommerce/single-product.twig', $context );
	
} else { 
	   
	$posts = Timber::get_posts();
	$context['post'] = $posts;

	if ( is_product_category() ) {
		$queried_object = get_queried_object();
		$term_id = $queried_object->term_id;

		// Current category
		$category = new TimberTerm();
		$context['category'] = $category;

		// Children categories
		$context['subcategories'] = Timber::get_terms( array(
		  'taxonomy' => 'product_cat',
		  'orderby' => 'term_id',
		  'hide_empty' => false,
		  'parent' => $category->ID
		));

		$context['title'] = single_term_title( '', false );

		// echo '<pre>' , var_dump($context['categories'][0]) , '</pre>';
		// die();
	}

	Timber::render( 'views/woocommerce/archive-product.twig', $context );
}
