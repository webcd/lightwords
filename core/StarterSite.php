<?php

namespace App;

class StarterSite extends \TimberSite
{

    function __construct()
    {
        // Add filters
        $this->filters();
        // Load classes sites (Admin, front and plugin ...)
        $this->loadClassesSite();
        parent::__construct();
    }

    private function theme_setup()
    {
        // Text Domain
        load_theme_textdomain(PROJECT_NAME, get_template_directory() . '/languages');
        //  Thumbnails
        set_post_thumbnail_size(380, 230, true);
        add_theme_support('post-formats');
        add_theme_support('post-thumbnails');
        add_theme_support('menus');
        // Page Title
        add_theme_support('title-tag');
        // Editor Tiny MCE custom styles
        add_editor_style(array('css/editor-style.css'));
        // Enable HTML5
        add_theme_support('html5',
            array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
        // RSS
        add_theme_support('automatic-feed-links');

        // Remove post format
        remove_theme_support('post-formats');
    }

    /**
     * Add filters
     */
    private function filters()
    {
        add_filter('timber_context', array($this, 'add_to_context'));
        add_filter('get_twig', array($this, 'add_to_twig'));
        add_filter('xmlrpc_enabled', '__return_false'); // Remove XML RPC
    }

    // Global context, available to all templates
    function add_to_context($context)
    {
        $context['site'] = $this;

        // MENUS
        $context['menu']     = new \TimberMenu();
        $context['menu_top'] = new \TimberMenu('menu-top');

        // BREADCRUMB
        // From: https://github.com/timber/timber/issues/719
        if (function_exists('yoast_breadcrumb')) {
            $context['breadcrumb'] = yoast_breadcrumb('<nav class="breadcrumb">', '</nav>', false);
        } else {
            // TODO: stock WordPress breadcrumb
        }
        // DEBUG
        $context['do_debug_zone'] = WP_DEBUG;
        
        // WIDGETS AREAS
        $context['widgets_footer_1'] = \Timber::get_widgets('footer1');
        $context['widgets_footer_2'] = \Timber::get_widgets('footer2');
        $context['widgets_footer_3'] = \Timber::get_widgets('footer3');
        $context['widgets_footer_4'] = \Timber::get_widgets('footer4');
        // Inline SVG
        $context['do_inlinesvg'] = file_exists(get_template_directory().'/dist/img/sprite.symbol.svg.twig');

        return $context;
    }

    // Demo Twig filter
    // This filter doesn't work anymore, see below
    // TODO: fix it or remove it
    // function myfoo($text)
    // {
    //     $text .= ' <= Timber custom-filtered thing!';

    //     return $text;
    // }

    // Pimp my Twig
    function add_to_twig($twig)
    {
        // this is where you can add your own functions to twig
        $twig->addExtension(new \Twig_Extension_StringLoader());
        // This filter throw a 500 error
        // $twig->addFilter('myfoo', new \Twig_SimpleFilter('myfoo', array($this, 'myfoo')));
        return $twig;
    }

    /**
     * Load classes
     * @return boolean
     */
    private function loadClassesSite()
    {
        if (!is_dir(get_template_directory().'/core/Classes')) {
            return false;
        }

        $dir = new \RecursiveDirectoryIterator(get_template_directory().'/core/Classes', \FilesystemIterator::SKIP_DOTS);
        // Flatten the recursive iterator, folders come before their files
        $it  = new \RecursiveIteratorIterator($dir, \RecursiveIteratorIterator::SELF_FIRST);
        // Maximum depth is 1 level deeper than the base folder
        $it->setMaxDepth(0);

        foreach ($it as $fileinfo) {
            if ($fileinfo->isFile() && $fileinfo->getExtension() == 'php') {
                $this->setClassSite($fileinfo);
            }
        }
    }

    /**
     * Instance class
     * @param object $fileinfo
     */
    protected function setClassSite($fileinfo)
    {
        $loader      = new \App\Lib\SiteLoader();
        $file        = str_replace('.php', '', $fileinfo->getFilename());
        $class       = new \ReflectionClass("App\\Classes\\".$file);
        $classParent = $class->getParentClass();
        if (isset($classParent->name) && $classParent->name == 'App\Lib\SiteCore' && $class->hasMethod('actions') && $class->hasMethod('filters')
            && $class->hasMethod('__construct')) {
            $class->newInstance($loader);
        }
    }
}
