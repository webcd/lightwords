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
	  
	// Get related products
	$related_limit               = wc_get_loop_prop( 'columns' );
	$related_ids                 = wc_get_related_products( $context['post']->id, $related_limit );
	$context['related_products'] =  Timber::get_posts( $related_ids );

	// Get product categories and tags
	$context['categories'] = get_the_terms( $post->ID, 'product_cat' );
	$context['tags'] = get_the_terms( $post->ID, 'product_tag' );
	
	// echo '<pre>' , var_dump($terms) , '</pre>';
	// die();

	// Restore the context and loop back to the main query loop.
	wp_reset_postdata();

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

		if ( is_product_category() ){
			// Get category image URL

			global $wp_query;
			$cat = $wp_query->get_queried_object();
			$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
			$image = wp_get_attachment_url( $thumbnail_id );
			if ( $image ) {
				// echo '<img class="term-image" src="' . $image . '" alt="' . $cat->name . '" />';
				$context['category_image'] = $image;
			}

			// Get category description
			
			$term_object = get_queried_object();
			$description = $term_object->description;

			if ( $description ) {
				$context['category_description'] = $description;
			}
		}


		// echo '<pre>' , var_dump($context['categories'][0]) , '</pre>';
		// die();
	}

	Timber::render( 'views/woocommerce/archive-product.twig', $context );
}
