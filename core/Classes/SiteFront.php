<?php

namespace App\Classes;

class SiteFront extends \App\Lib\SiteCore
{

    public function __construct($loader)
    {
        parent::__construct($loader);
    }

    /**
     * add_action THEME
     * */
    public function actions()
    {
        $this->loader->add_action('wp_enqueue_scripts', $this, 'enqueue_scripts', '');
        $this->loader->add_action('wp_print_scripts', $this, 'dequeue_scripts', 100);
    }

    /**
     * add_filter THEME
     * */
    public function filters()
    {

    }

    /**
     * Styles front
     * */
    private function enqueue_styles()
    {

    }

    /**
     * Scripts front
     * */
    public function enqueue_scripts()
    {
        wp_enqueue_script('main', get_stylesheet_directory_uri() . '/dist/js/main.js', array('jquery'), '0.1.0', true);
    }

    /**
     * Dequeue scripts front
     * */
    public function dequeue_scripts()
    {

    }
}
