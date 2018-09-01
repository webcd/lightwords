<?php

if ( ! class_exists( 'Timber' ) ){
	echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
	return;
}

$context = Timber::get_context();

// WooCommerce custom sidebar
$context['sidebar'] = Timber::get_widgets( 'shop-sidebar' );

// TODO: don't send all the cart (huge datas)
$context['cart'] = $woocommerce->cart;

// // DEBUG
// echo '<pre>', var_dump($context['cart']) , '</pre>';
// die();

// SINGLE PRODUCT

if ( is_singular( 'product' ) ) {

	// The product
	$product = Timber::get_post();
	$context['post'] = $product;
	  
	// Related products
	$related_limit = wc_get_loop_prop( 'columns' );
	$related_ids = wc_get_related_products( $context['post']->id, $related_limit );
	$context['related_products'] = Timber::get_posts( $related_ids );

	// Restore the context and loop back to the main query loop.
	// TODO: find source!
	wp_reset_postdata();

	// Get product categories and tags
	$context['categories'] = get_the_terms( $post->ID, 'product_cat' );
	$context['tags'] = get_the_terms( $post->ID, 'product_tag' );
	
	Timber::render( 'views/woocommerce/single-product.twig', $context );

// ARCHIVE PRODUCT

} else { 
	   
	$posts = Timber::get_posts();
	$context['post'] = $posts;

	// Default title
	// TODO: Use the magic shop string ("produits" / "boutique" / whatever)
	$context['title'] = 'Produits';

	// Category archive
	if ( is_product_category() ) {

		// Current category
		$category = new TimberTerm();
		$context['category'] = $category;

		// Category title
		$context['title'] = single_term_title( '', false );
		// Queried object
		$queried_object = get_queried_object();

		// CATEGORY

		// Get category image URL
		global $wp_query;
		$cat = $wp_query->get_queried_object();
		$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
		$image = wp_get_attachment_url( $thumbnail_id );

		if ( $image ) {
			$context['category_image'] = $image;
		}

		// Get category description
		$context['category_description'] = $queried_object->description;;

		// SUB-CATEGORIES

		$context['subcategories'] = Timber::get_terms( array(
		  'taxonomy' => 'product_cat',
		  'orderby' => 'term_id',
		  'hide_empty' => false,
		  'parent' => $category->ID
		));

	}

	Timber::render( 'views/woocommerce/archive-product.twig', $context );
}
