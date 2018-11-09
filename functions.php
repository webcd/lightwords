<?php

require_once __DIR__ . '/vendor/autoload.php';

new \Timber\Timber();

if (!class_exists('Timber')) {
    add_action('admin_notices', function () {
        echo '<div class="error"><p>Timber not working. Run composer install in current path template</p></div>';
    });
    return;
}

// Templates search path
Timber::$dirname = array(
    'templates',
    'templates/views',
    'templates/partials',
    'dist/img',
);

// Run classes App
new App\StarterSite();

// DEBUG
// Shameless debug function
// Beware: will overide WP_DEBUG, and always dump
function ddump($what)
{
    echo '<pre>';
    var_dump($what);
    echo '</pre>';
}

// TODO: move this elsewhere

// Disable TinyMCE automatic paragraph removal
function remove_wpautop($content)
{
    global $post;
    // Remove the filter
    remove_filter('the_content', 'wpautop');
    return $content;
}

// Disable TinyMCE automatic paragraph removal
add_filter('the_content', 'remove_wpautop', 9);
