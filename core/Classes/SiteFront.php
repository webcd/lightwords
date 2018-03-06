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
        wp_deregister_script('jquery');
        wp_enqueue_style('maincss', mix('main.css'));
        wp_enqueue_script('manifest', mix('manifest.js'), '', '', true);
        wp_enqueue_script('vendor', mix('vendor.js'), '', '', true);
        wp_enqueue_script('main', mix('main.js'), '', '', true);
    }

    /**
     * Dequeue scripts front
     * */
    public function dequeue_scripts()
    {
        
    }
}