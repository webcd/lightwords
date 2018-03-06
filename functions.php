<?php

require_once(__DIR__ . '/vendor/autoload.php');

require_once(__DIR__ . '/core/helpers.php');
    
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

// TODO: move this into /core/StarterSite.php (and make it work)
add_theme_support( 'post-thumbnails', array( 'post', 'article' ));