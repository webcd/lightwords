<?php
  // WooCommerce default hooks
	// Removing things we display "by hand" (in templates files)
	// (See: https://businessbloomer.com/woocommerce-visual-hook-guide-single-product-page/#tab-additional_information)

  ////////////////////////////////////////
  // GLOBAL

  // Remove woocommerce breadcrumb (we use global Yoast breadcrumb instead)
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

  ////////////////////////////////////////
	// SINGLE PRODUCT PAGE

	// Remove product notices
	// remove_action( 'woocommerce_before_single_product', 'wc_print_notices', 10 );

	// Remove product on-sale
	// remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
	// Remove product images
	// remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );

	// Remove product title
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	// Remove product rating
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	// Remove product price(s)
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	// Remove product exerpt
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
  // Remove product add-to-cart form
	// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	// Remove product metas
  remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	// Remove product sharing
	// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

  // Remove product data tabs
	// remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
	// Remove product upsell display
	// remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	// Remove related products
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
  
  ////////////////////////////////////////
	// PRODUCT ARCHIVE PAGE

	// Remove archive wrapper div opening
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
  
	// Remove archive taxonomy description
	remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
	// Remove archive product description
	remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );

  // Remove archive notices
	// remove_action( 'woocommerce_before_shop_loop', 'wc_print_notices', 10 );
  // Remove archive result count
	// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
  // Remove archive catalog ordering
  // remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

  // Remove archive no-product-found
  // remove_action( 'woocommerce_no_products_found', 'wc_no_products_found', 10 );

  // Remove archive pagination
  // remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );

  // Remove archive sidebar
  // remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
  
	// Remove archive wrapper div closing
  remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper', 10 );

  ////////////////////////////////////////
	// PRODUCT TEASER COMPONENT
	
	// Remove teaser on sale
	// remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
	// Remove teaser thumbnail
	// remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
	
	// Remove teaser title
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
	
	// Remove teaser rating
	// remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	// Remove teaser price
	// remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

	// Remove teaser... link close thing???
	// remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
	// Remove teaser add-to-cart button
	// remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
  
  
