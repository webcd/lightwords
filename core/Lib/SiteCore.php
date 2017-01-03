<?php

namespace App\Lib;

abstract class SiteCore
{
    /**
     * @var \Site\Loaders\SiteLoader
     */
    public $loader;

    function __construct(\App\Lib\SiteLoader $loader)
    { 
        // Loader action and filters
        $this->loader = $loader;
        // Add actions
        $this->actions();
        // Add filters
        $this->filters();
        // Run
        $this->loader->run();
    }

    abstract public function actions();

    abstract public function filters();

}