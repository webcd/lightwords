<?php

namespace App\Classes;

class SiteAdmin extends \App\Lib\SiteCore
{

    public function __construct($loader)
    {
        parent::__construct($loader);
    }

    /**
     * Add actions
     */
    public function actions()
    {
        $this->loader->add_action('wp_dashboard_setup', $this, 'webcd_add_dashboard_widget', 1);
        $this->loader->add_action('widgets_init', $this, 'register_widget_areas');
        $this->loader->add_action('widgets_init', $this, 'register_widget_areas');
        $this->loader->add_action('init', $this, 'disable_wp_emojicons', '', true);
        //$this->loader->add_action('init', $this, 'create_post_types', '', true);
        //$this->loader->add_action('init', $this, 'create_taxonomy', '', true);
    }

    /**
     * add filters
     */
    public function filters()
    {
        $this->loader->add_filter('tiny_mce_plugins', $this, 'disable_emojicons_tinymce');
        $this->loader->add_filter('tiny_mce_before_init', $this, 'customize_tinymce');
        $this->loader->add_filter('upload_mimes', $this, 'allow_mime_types');
    }

    /**
     * Add widget company infos 
     */
    public function webcd_dashboard_widget_function($post, $callback_args)
    {
        echo "<p>Votre site est géré par <strong>WebCD</strong>.</p>";
        echo '<p style="text-align: center"><a href="https://webcd.fr"><img width="220" height="65" src="'.get_bloginfo('template_url').'/dist/img/logo-webcd.svg" /></a></p>';
        echo "<p><strong>Nous contacter : </strong>";
        echo "03 88 95 00 01<br>";
        echo '<a href="mailto:projet@webcd.fr">projet@webcd.fr</a>';
    }

    /**
     * Add widget dashboard
     */
    public function webcd_add_dashboard_widget()
    {
        wp_add_dashboard_widget('webcd_dashboard_widget', 'WebCD', array($this, 'webcd_dashboard_widget_function'));
    }

    /**
     * Add widget footer and menu
     */
    public function register_widget_areas()
    {
        register_sidebar(array(
            'name' => 'Sidebar 1',
            'id' => 'sidebar-1',
            'description' => 'The first sidebar widget zone',
            'before_widget' => '<article id="%1$s" class="widget %2$s">',
            'after_widget' => '</article>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => 'Sidebar 2',
            'id' => 'sidebar-2',
            'description' => 'The second sidebar widget zone',
            'before_widget' => '<article id="%1$s" class="widget %2$s">',
            'after_widget' => '</article>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => 'Woo Sidebar 1',
            'id' => 'woo-sidebar-1',
            'description' => 'The first WooCommerce sidebar widget zone',
            'before_widget' => '<article id="%1$s" class="widget %2$s">',
            'after_widget' => '</article>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => 'Woo Sidebar 2',
            'id' => 'woo-sidebar-2',
            'description' => 'The second WooCommerce sidebar widget zone',
            'before_widget' => '<article id="%1$s" class="widget %2$s">',
            'after_widget' => '</article>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => 'Footer 1',
            'id' => 'footer1',
            'description' => 'The first footer widget zone',
            'before_widget' => '<article id="%1$s" class="widget %2$s">',
            'after_widget' => '</article>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => 'Footer 2',
            'id' => 'footer2',
            'description' => 'The second footer widget zone',
            'before_widget' => '<article id="%1$s" class="widget %2$s">',
            'after_widget' => '</article>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => 'Footer 3',
            'id' => 'footer3',
            'description' => 'The third footer widget zone',
            'before_widget' => '<article id="%1$s" class="widget %2$s">',
            'after_widget' => '</article>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => 'Footer 4',
            'id' => 'footer4',
            'description' => 'The fourth footer widget zone',
            'before_widget' => '<article id="%1$s" class="widget %2$s">',
            'after_widget' => '</article>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));

        register_nav_menus(array(
            'menu-main' => 'The main, primary navbar',
            'menu-top' => 'The top, secondary navbar',
            'menu-legal' => 'The post-footer, legal links',
        ));
    }

    /**
     * Disabled emojicons tinymce
     * @param type $plugins
     * @return array
     */
    public function disable_emojicons_tinymce($plugins)
    {
        return (is_array($plugins)) ? array_diff($plugins, array('wpemoji')) : array();
    }

    /**
     * 
     * @param type $init
     * @return array
     */
    public function customize_tinymce($init)
    {
        // Keep only useful styles
        $init['block_formats']        = 'Paragraphe=p;Titre 2=h2;Titre 3=h3;Titre 4=h4';
        $init['toolbar2']             = 'strikethrough,hr,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help';
        // Force second line toolbar
        $init['wordpress_adv_hidden'] = false;

        return $init;
    }

    /**
     *  
     * @param array $mimes
     * @return Array
     */
    public function allow_mime_types($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }

    /**
     * Disabled emojicons
     * */
    public function disable_wp_emojicons()
    {
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
    }

    /**
     * Create custom post type
     */
    public function create_post_types()
    {
        // Post Type
        $labels = array(
            'name' => '#CPT#s',
            'all_items' => __( 'All #CPT#s' ),
            'singular_name' => __( '#CPT#' ),
            'add_new_item' => __( 'Add New  #CPT#' ),
            'edit_item' => __( 'Update  #CPT#' ),
            'menu_name' => __( '#CPT#s' )
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_position' => 5,
            'menu_icon' => 'dashicons-portfolio', // https://developer.wordpress.org/resource/dashicons/
        );

        register_post_type('#CPTSLUG#', $args);
    }

    /**
     * Create taxonomy
     */
    public function create_taxonomy()
    {
        $labels = array(
            'name'              => _x( '#Taxo#s', 'taxonomy general name' ),
            'singular_name'     => _x( '#Taxo#', 'taxonomy singular name' ),
            'search_items'      => __( 'Search #Taxo#s' ),
            'all_items'         => __( 'All #Taxo#s' ),
            'parent_item'       => __( 'Parent #Taxo#' ),
            'parent_item_colon' => __( 'Parent #Taxo#:' ),
            'edit_item'         => __( 'Edit #Taxo#' ),
            'update_item'       => __( 'Update #Taxo#' ),
            'add_new_item'      => __( 'Add New #Taxo#' ),
            'new_item_name'     => __( 'New #Taxo# Name' ),
            'menu_name'         => __( '#Taxo#' ),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => '#Taxo#s' ),
            'show_in_rest'       => true,
            'rest_base'          => '#Taxo#s',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
        );
        
        register_taxonomy( '#Taxo#s', array( '#CPTSLUG#' ), $args );
    }
}