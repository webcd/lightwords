<?php

namespace App;

class StarterSite extends \TimberSite
{

    public function __construct()
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

        // See: https://developer.wordpress.org/reference/functions/add_theme_support/#post-thumbnails
        // add_theme_support( 'post-thumbnails' ); // Should be enough fors posts
        add_theme_support('post-thumbnails', array('post', 'page'));

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

        // Remove Gallery Inline Styling
        // See: https://css-tricks.com/snippets/wordpress/remove-gallery-inline-styling/
        add_filter('use_default_gallery_style', '__return_false');
    }

    // Body configuration classes
    private function getBodyConfigurationClassesString($config)
    {
        $body_class_config = '';
        $body_classes_config = array();

        // Debug classes
        if ($config->debug) {array_push($body_classes_config, 'debug');

            if ($config->debugBreakpoints) {
                array_push($body_classes_config, 'debug--breakpoints');
            }
        }

        // Has header features
        if ($config->stickyHeader) {array_push($body_classes_config, 'has-sticky-header');
            if ($config->compressHeader) {array_push($body_classes_config, 'has-compressible-header');
                if ($config->compressHeaderLogoSwap) {array_push($body_classes_config, 'has-compressible-header-logo-swap');}
                if ($config->transparentHeader) {array_push($body_classes_config, 'has-transparent-header');}
            }
        }

        // Has fixed-width containers
        if ($config->fixedWidthContainers) {array_push($body_classes_config, 'has-fixed-width-containers');
        } else {
            if ($config->fixedWidthHeader) {array_push($body_classes_config, 'has-fixed-width-header');}
            if ($config->fixedWidthFooter) {array_push($body_classes_config, 'has-fixed-width-footer');}
            if ($config->fixedWidthContent) {array_push($body_classes_config, 'has-fixed-width-content');}
        }

        // Has scroll top
        if ($config->hasScrollTop) {array_push($body_classes_config, 'has-scroll-top');}

        return implode(' ', $body_classes_config);
    }

    // Global context, available to all templates
    public function add_to_context($context)
    {
        $context['site'] = $this;

        // THEME OPTIONS

        $config = (object)NULL;

        // Get config from theme settings
        $config->debug = get_theme_mod( 'lw_settings_debug', true );
        $config->debugBreakpoints = get_theme_mod( 'lw_settings_debugBreakpoints', true );
        $config->search = get_theme_mod( 'lw_settings_search', true );
        $config->breadcrumbs = get_theme_mod( 'lw_settings_breadcrumbs', true );
        $config->breadcrumbsInContent = get_theme_mod( 'lw_settings_breadcrumbsInContent', true );
        $config->hero = get_theme_mod( 'lw_settings_hero', true );
        $config->hasScrollDirectionTracking = get_theme_mod( 'lw_settings_hasScrollDirectionTracking', true );
        $config->stickyHeader = get_theme_mod( 'lw_settings_stickyHeader', true );
        $config->compressHeader = get_theme_mod( 'lw_settings_compressHeader', true );
        $config->compressHeaderOffset = get_theme_mod( 'lw_settings_compressHeaderOffset', true );
        $config->compressHeaderLogoSwap = get_theme_mod( 'lw_settings_compressHeaderLogoSwap', true );
        $config->transparentHeader = get_theme_mod( 'lw_settings_transparentHeader', true );
        $config->expandDropdownsOnHover = get_theme_mod( 'lw_settings_expandDropdownsOnHover', true );
        $config->hasScrollTop = get_theme_mod( 'lw_settings_hasScrollTop', true );
        $config->scrollTopOffset = get_theme_mod( 'lw_settings_scrollTopOffset', 400 );
        $config->fixedWidthContainers = get_theme_mod( 'lw_settings_fixedWidthContainers', false );
        $config->fixedWidthHeader = get_theme_mod( 'lw_settings_fixedWidthHeader', true );
        $config->fixedWidthFooter = get_theme_mod( 'lw_settings_fixedWidthFooter', true );
        $config->fixedWidthContent = get_theme_mod( 'lw_settings_fixedWidthContent', true );
        $config->menuCartDropdown = get_theme_mod( 'lw_settings_menuCartDropdown', true );
        $config->menuMyAccountDropdown = get_theme_mod( 'lw_settings_menuMyAccountDropdown', true );
        $config->rippleEffect = get_theme_mod( 'lw_settings_rippleEffect', true );
        $config->rippleSelector = get_theme_mod( 'lw_settings_rippleSelector', ".btn, .scroll-btn, .rrssb-button > a" );
        $config->pageTransitions = get_theme_mod( 'lw_settings_pageTransitions', false );

        // Contact infos
        $config->contactInfos = get_theme_mod( 'lw_contact_infos', true );
        $config->contactInfosAddressFirmName = get_theme_mod( 'lw_contact_infos_addressFirmName', "" );
        $config->contactInfosAddress1 = get_theme_mod( 'lw_contact_infos_address1', "" );
        $config->contactInfosAddress2 = get_theme_mod( 'lw_contact_infos_address2', "" );
        $config->contactInfosAddressZipcode = get_theme_mod( 'lw_contact_infos_addressZipcode', "" );
        $config->contactInfosAddressCity = get_theme_mod( 'lw_contact_infos_addressCity', "" );
        $config->contactInfosAddressCountry = get_theme_mod( 'lw_contact_infos_addressCountry', "" );
        $config->contactInfosPhone1 = get_theme_mod( 'lw_contact_infos_phone1', "" );
        $config->contactInfosPhone2 = get_theme_mod( 'lw_contact_infos_phone2', "" );
        $config->contactInfosFax = get_theme_mod( 'lw_contact_infos_fax', "" );
        $config->contactInfosOpening = get_theme_mod( 'lw_contact_infos_opening', true );
        $config->contactInfosOpening1 = get_theme_mod( 'lw_contact_infos_opening1', "" );
        $config->contactInfosOpening2 = get_theme_mod( 'lw_contact_infos_opening2', "" );
        $config->contactInfosOpening3 = get_theme_mod( 'lw_contact_infos_opening3', "" );
        $config->contactInfosEmail = get_theme_mod( 'lw_contact_infos_email', "" );
        $config->contactInfosLinkToContactPage = get_theme_mod( 'lw_contact_infos_linkToContactPage', true );

        // Social links
        $config->socialLinks = get_theme_mod( 'lw_social_links', true );
        $config->socialLinksTopbar = get_theme_mod( 'lw_social_links_topbar', true );
        $config->socialLinksFacebook = get_theme_mod( 'lw_social_links_facebook', "" );
        $config->socialLinksTwitter = get_theme_mod( 'lw_social_links_twitter', "" );
        $config->socialLinksGooglePlus = get_theme_mod( 'lw_social_links_googlePlus', "" );
        $config->socialLinksLinkedin = get_theme_mod( 'lw_social_links_linkedin', "" );
        $config->socialLinksYoutube = get_theme_mod( 'lw_social_links_youtube', "" );
        $config->socialLinksViadeo = get_theme_mod( 'lw_social_links_viadeo', "" );
        $config->socialLinksEmail = get_theme_mod( 'lw_social_links_email', "" );
        $config->socialLinksTumblr = get_theme_mod( 'lw_social_links_tumblr', "" );
        $config->socialLinksReddit = get_theme_mod( 'lw_social_links_reddit', "" );
        $config->socialLinksPinterest = get_theme_mod( 'lw_social_links_pinterest', "" );
        $config->socialLinksPocket = get_theme_mod( 'lw_social_links_pocket', "" );
        $config->socialLinksGithub = get_theme_mod( 'lw_social_links_github', "" );

        $context['CONFIG'] = $config;

        $context['config_JSON'] = htmlspecialchars(json_encode($config), ENT_QUOTES, 'UTF-8');

        // Body configuration classes
        $context['body_class_config'] = $this->getBodyConfigurationClassesString($config);

        // MENUS
        $context['menu_main'] = new \TimberMenu('menu-main');
        $context['menu_top'] = new \TimberMenu('menu-top');
        $context['menu_legal'] = new \TimberMenu('menu-legal');

        // BREADCRUMB
        // From: https://github.com/timber/timber/issues/719
        if (function_exists('yoast_breadcrumb')) {
            $context['breadcrumb'] = yoast_breadcrumb('<nav class="breadcrumb">', '</nav>', false);
        } else {
            // TODO: stock WordPress breadcrumb
        }

        // DEBUG
        $context['do_debug_zone'] = WP_DEBUG;
        // Force debug (/!\ WARNING: remove when in production)
        $context['do_debug_zone'] = true;

        // WIDGETS AREAS
        $context['widgets_sidebar_1'] = \Timber::get_widgets('sidebar-1');
        $context['widgets_sidebar_2'] = \Timber::get_widgets('sidebar-2');

        $context['widgets_woo_sidebar_1'] = \Timber::get_widgets('woo-sidebar-1');
        $context['widgets_woo_sidebar_2'] = \Timber::get_widgets('woo-sidebar-2');

        $context['widgets_footer_1'] = \Timber::get_widgets('footer1');
        $context['widgets_footer_2'] = \Timber::get_widgets('footer2');
        $context['widgets_footer_3'] = \Timber::get_widgets('footer3');
        $context['widgets_footer_4'] = \Timber::get_widgets('footer4');

        // Inline SVG
        $context['do_inlinesvg'] = file_exists(get_template_directory() . '/dist/img/sprite.symbol.svg.twig');

        // WOOCOMMERCE
        // See also /woocommerce.php at theme root

        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        $has_woocommerce = is_plugin_active('woocommerce/woocommerce.php');
        $context['is_woocommerce_active'] = $has_woocommerce;

        if ($has_woocommerce) {
            $context['my_account_link'] = get_permalink(get_option('woocommerce_myaccount_page_id'));
            $context['my_account_items'] = wc_get_account_menu_items();
        }

        return $context;
    }

    // Phone number text formatting - Twig filter
    public function formatPhone($number, $separator = '.')
    {
        $result =
        substr($number, 0, 2) . $separator .
        substr($number, 2, 2) . $separator .
        substr($number, 4, 2) . $separator .
        substr($number, 6, 2) . $separator .
        substr($number, 8, 2);

        return $result;
    }

    // Phone number link formatting - Twig filter
    public function formatPhoneLink($number)
    {
        $result = '033' . substr($number, 1);

        return $result;
    }

    // Demo Twig filter
    public function myfoo($text)
    {
        $text .= ' <= Timber custom-filtered thing!';

        return $text;
    }

    // Pimp my Twig
    public function add_to_twig($twig)
    {
        // this is where you can add your own functions to twig
        $twig->addExtension(new \Twig_Extension_StringLoader());

        // Enable dump() in templates
        // See: https://twig.symfony.com/doc/2.x/functions/dump.html
        $twig->addExtension(new \Twig_Extension_Debug());

        // Filters
        // $twig->addFilter(new \Twig_SimpleFilter('myfoo', array($this, 'myfoo')));

        $twig->addFilter(new \Twig_SimpleFilter('formatPhone', array($this, 'formatPhone')));
        $twig->addFilter(new \Twig_SimpleFilter('formatPhoneLink', array($this, 'formatPhoneLink')));

        return $twig;
    }

    /**
     * Load classes
     * @return boolean
     */
    private function loadClassesSite()
    {
        if (!is_dir(get_template_directory() . '/core/Classes')) {
            return false;
        }

        $dir = new \RecursiveDirectoryIterator(get_template_directory() . '/core/Classes', \FilesystemIterator::SKIP_DOTS);
        // Flatten the recursive iterator, folders come before their files
        $it = new \RecursiveIteratorIterator($dir, \RecursiveIteratorIterator::SELF_FIRST);
        // Maximum depth is 1 level deeper than the base folder
        $it->setMaxDepth(0);

        foreach ($it as $fileinfo) {

            if ($fileinfo->isFile() && $fileinfo->getExtension() == 'php') {
                if ($fileinfo->getFileName() == 'SiteWooCommerce.php') {
                    if (class_exists('WooCommerce')) {
                        $this->setClassSite($fileinfo);
                    }
                } else {
                    $this->setClassSite($fileinfo);
                }

            }
        }
    }

    /**
     * Instance class
     * @param object $fileinfo
     */
    protected function setClassSite($fileinfo)
    {
        $loader = new \App\Lib\SiteLoader();
        $file = str_replace('.php', '', $fileinfo->getFilename());
        $class = new \ReflectionClass("App\\Classes\\" . $file);
        $classParent = $class->getParentClass();
        if (isset($classParent->name) && $classParent->name == 'App\Lib\SiteCore' && $class->hasMethod('actions') && $class->hasMethod('filters')
            && $class->hasMethod('__construct')) {
            $class->newInstance($loader);
        }
    }
}
