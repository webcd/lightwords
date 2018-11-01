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
        // TODO: not working!
    }

    /**
     * Scripts front
     * */
    public function enqueue_scripts()
    {
        // No hash assets
        wp_enqueue_script('site_main_js', get_template_directory_uri() . '/dist/js/main.js', array('jquery'), null, true);
        wp_enqueue_style('site_main_css', get_template_directory_uri() . '/dist/css/main.css');

        // // Hash assets

        // $jsFilePath = glob(get_template_directory() . '/dist/js/main.*.js');
        // $jsFileURI = get_template_directory_uri() . '/dist/js/' . basename($jsFilePath[0]);
        // wp_enqueue_script('site_main_js', $jsFileURI, array('jquery'), null, true);

        // // TODO: Move this!
        // $cssFilePath = glob(get_template_directory() . '/dist/css/main.*.css');
        // $cssFileURI = get_template_directory_uri() . '/dist/css/' . basename($cssFilePath[0]);
        // wp_enqueue_style('site_main_css', $cssFileURI);
    }

    /**
     * Dequeue scripts front
     * */
    public function dequeue_scripts()
    {

    }
}
