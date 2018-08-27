<?php

	require_once(__DIR__ . '/vendor/autoload.php');
    
	new \Timber\Timber();
	
	if ( ! class_exists( 'Timber' ) ) {
	  add_action( 'admin_notices', function() {
	    echo '<div class="error"><p>Timber not loaded. run composer install in current path template</p></div>';
	  } );
	  return;
	}

	// Templates search path
	Timber::$dirname = array(
	  'templates',
	  'templates/views',
	  'templates/partials',
	  'dist/img'
	);
    
  // Run classes App
  new App\StarterSite();

	// TODO: TO MOVE!!!

	// TODO: move this into /core/StarterSite.php (and make it work)
	// See: https://developer.wordpress.org/reference/functions/add_theme_support/#post-thumbnails
 	// add_theme_support( 'post-thumbnails' ); // Should be enough
 	add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

	// WOOCOMMERCE
	// TODO: move this elsewhere

	add_action( 'after_setup_theme', function() {
    add_theme_support( 'woocommerce' );
	} );

	if ( class_exists( 'WooCommerce' ) ) {
    Timber\Integrations\WooCommerce\WooCommerce::init();
	}

	// Don't load WooCommerce default CSS
	add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

	// WooCommerce default hooks
	// (See: https://businessbloomer.com/woocommerce-visual-hook-guide-single-product-page/#tab-additional_information)

	// SINGLE PRODUCT PAGE
	// Removing things we display "by hand" (in templates files)

	// Remove title
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	// Remove rating
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	// Remove price(s)
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	// Remove price(s)
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
	// Remove metas
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	
	// Remove related products
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
	

	// Fix context for products in the loop
	// See: https://github.com/timber/timber/blob/master/docs/guides/woocommerce.md#tease-product
	function timber_set_product( $post ) {
    global $product;
    
    if ( is_woocommerce() ) {
        $product = wc_get_product( $post->ID );
    }
	}

	function ddump( $what ) {
		echo '<pre>';
		var_dump( $what );
		echo '</pre>';
	}

 	// Display category image on category archive item
	add_action( 'display_category_image', 'display_category_image');
	function display_category_image($category) {
		
		$thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
		$link_image = wp_get_attachment_url( $thumbnail_id );

		if ( $link_image ) {
			echo $link_image;
		} 
	}
