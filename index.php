<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

if (!class_exists('Timber')) {
    echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
    return;
}

$templates = array('index.twig');
$context = Timber::get_context();
$context['posts'] = Timber::get_posts(); // Can be empty! (404, single, page)
$context['pagination'] = Timber::get_pagination();

////////////////////////////////////////////////////////////////////////////////
// 404

if (is_404()) {
    array_unshift($templates, '404.twig');
    $context['title'] = "Oups, petit problème !";

////////////////////////////////////////////////////////////////////////////////
    // SINGLE

} else if (is_single()) { // Or is_singular()?
    if (post_password_required($post->ID)) {
        array_unshift($templates, 'single-password.twig');

    } else {
        array_unshift($templates,
            'single-' . $post->ID . '.twig',
            'single-' . $post->post_type . '.twig',
            'single.twig'
        );
    }

    $post = Timber::query_post();
    $context['post'] = $post;

////////////////////////////////////////////////////////////////////////////////
    // PAGE

} else if (is_page()) {
    array_unshift($templates,
        'page-' . $post->post_name . '.twig',
        'page.twig',
        'index.twig'
    );

    $post = new TimberPost();
    $context['post'] = $post;

    if (is_front_page()) {
        array_unshift($templates, 'front-page.twig');

        $args = array(
            'posts_per_page' => 6,
            'orderby' => 'date',
        );
        $context['latest_posts'] = Timber::get_posts($args);
    }

////////////////////////////////////////////////////////////////////////////////
    // ARCHIVE

} else if (is_archive()) {
    array_unshift($templates, 'archive.twig');
    $context['title'] = 'Articles';

    // Archive by period
    if (is_day()) {
        $context['title'] = 'Articles par date : ' . get_the_date('D M Y');
    } else if (is_month()) {
        $context['title'] = 'Articles par date : ' . get_the_date('M Y');
    } else if (is_year()) {
        $context['title'] = 'Articles par date : ' . get_the_date('Y');

        // Archive by tag or category
    } else if (is_tag()) {
        $context['title'] = 'Articles avec le tag "' . single_tag_title('', false) . '"';

    } else if (is_category()) {
        array_unshift($templates, 'archive-' . get_query_var('cat') . '.twig');
        $context['title'] = 'Articles dans la catégorie ' . single_cat_title('', false);

        // Archive by author
    } else if (is_author()) {
        array_unshift($templates, 'author.twig');

        if (isset($wp_query->query_vars['author'])) {
            $author = new TimberUser($wp_query->query_vars['author']);
            $context['author'] = $author;
            $context['title'] = $author->name();
        }

        // Archive by custom post type
    } else if (is_post_type_archive()) {
        array_unshift($templates, 'archive-' . get_post_type() . '.twig');
        $context['title'] = post_type_archive_title('', false);
    }

////////////////////////////////////////////////////////////////////////////////
    // SEARCH

} else if (is_search()) {
    array_unshift($templates,
        'search.twig',
        'archive.twig'
    );
    $post_types = get_post_types();

    //Display Product results in first
    if (in_array('product', $post_types)) {     
      unset($post_types['product']);
      array_unshift($post_types, 'product');
    }
   
    // Results group by post_type
    foreach($context['posts'] as $post) {     
      $context['post_type_'.$post->post_type][] = $post;     
    }

    $context['post_types'] = $post_types;
    $context['title'] = count(Timber::get_posts()) . ' résultat(s) de recherche pour "' . get_search_query() . '"';

////////////////////////////////////////////////////////////////////////////////
    // INDEX

} else {
    $context['title'] = 'Blog';
}

////////////////////////////////////////////////////////////////////////////////
// TIMBER TEMPLATES RENDERING

Timber::render($templates, $context);
