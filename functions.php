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