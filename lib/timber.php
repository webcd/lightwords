<?php
////////////////////////////////////////////////////////////////////////////////
// Timber-starter-theme function.php
////////////////////////////////////////////////////////////////////////////////

// All is fucked up without Timber installed /!\
if ( ! class_exists( 'Timber' ) ) {
  add_action( 'admin_notices', function() {
    echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
  } );
  return;
}

////////////////////////////////////////////////////////////////////////////////
// CONFIG

// Templates search path
Timber::$dirname = array(
  'templates',
  'templates/views',
  'templates/partials',
  'dist/img'
);

////////////////////////////////////////////////////////////////////////////////
// TIMBER SITE OBJECT

class StarterSite extends TimberSite {

  function __construct() {
    add_theme_support( 'post-formats' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'menus' );
    add_filter( 'timber_context', array( $this, 'add_to_context' ) );
    add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
    add_action( 'init', array( $this, 'register_post_types' ) );
    add_action( 'init', array( $this, 'register_taxonomies' ) );
    parent::__construct();
  }

  function register_post_types() {
    //this is where you can register custom post types
  }

  function register_taxonomies() {
    //this is where you can register custom taxonomies
  }

  // Global context, available to all templates
  function add_to_context( $context ) {
    $context['site'] = $this;

    // MENUS
    $context['menu'] = new TimberMenu();
    $context['menu_top'] = new TimberMenu('menu-top');

    $context['login_url'] = wp_login_url();

    $context['is_homepage'] = is_front_page();

    // BREADCRUMB
    // From: https://github.com/timber/timber/issues/719
    if ( function_exists( 'yoast_breadcrumb' ) ) {
      $context['breadcrumb'] = yoast_breadcrumb('<nav class="breadcrumb">','</nav>', false );
    } else {
      // TODO: stock WordPress breadcrumb
    }

    // SEARCH FORM

    $context['searchform'] = get_search_form ( false );

    // WIDGETS AREAS
    $context['widgets_footer_1'] = Timber::get_widgets('footer1');
    $context['widgets_footer_2'] = Timber::get_widgets('footer2');
    $context['widgets_footer_3'] = Timber::get_widgets('footer3');
    $context['widgets_footer_4'] = Timber::get_widgets('footer4');

    // Inline SVG
    $context['do_inlinesvg'] = file_exists( get_template_directory_uri().'/dist/img/sprite.symbol.svg.twig' );
    $context['do_inlinesvg'] = true;
/*
    ?><pre><?php var_dump($context['menu']->items); ?></pre><?php
*/
    return $context;
  }

  // Demo Twig filter
  function myfoo( $text ) {
    $text .= ' <= Timber custom-filtered thing!';

    return $text;
  }

  // Pimp my Twig
  function add_to_twig( $twig ) {
    // this is where you can add your own functions to twig
    $twig->addExtension( new Twig_Extension_StringLoader() );
    $twig->addFilter('myfoo', new Twig_SimpleFilter('myfoo', array($this, 'myfoo')));

    return $twig;
  }

}

// Let the magic happen!
new StarterSite();
