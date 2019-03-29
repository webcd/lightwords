<?php

namespace App\Classes;

class SiteSEO extends \App\Lib\SiteCore
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
        $this->loader->add_action('term_link', $this, 'lw_product_cat_permalink', 10, 3);
        $this->loader->add_action('init', $this, 'lw_product_category_rewrite_rules', 10, 3);
        $this->loader->add_action('create_term', $this, 'lw_new_product_cat_edit_success', 10, 3);
        $this->loader->add_action('post_type_link', $this, 'lw_remove_slug', 10, 2);
        $this->loader->add_action('init', $this, 'lw_woo_product_rewrite_rules', 10, 2);
        $this->loader->add_action('wp_insert_post', $this, 'lw_woo_new_product_post_save');

    }

    /**
     * add_filter THEME
     * */
    public function filters()
    {

    }

    /*
     * Remove product-category in URL
     */
    public function lw_product_cat_permalink($url, $term, $taxonomy)
    {
        switch ($taxonomy):
    case 'product_cat':
        $taxonomy_slug = 'categorie-produit'; //Change product-category to your product category slug
        if (strpos($url, $taxonomy_slug) === false) {
                break;
        }

        $url = str_replace('/' . $taxonomy_slug, '', $url);
        break;
        endswitch;
        return $url;
    }
    // Add our custom product cat rewrite rules
    public function lw_product_category_rewrite_rules($flash = false)
    {
        $terms = get_terms(array(
            'taxonomy' => 'product_cat',
            'post_type' => 'product',
            'hide_empty' => false,
        ));
        if ($terms && !is_wp_error($terms)) {
            $siteurl = esc_url(home_url('/'));
            foreach ($terms as $term) {
                $term_slug = $term->slug;
                $baseterm = str_replace($siteurl, '', get_term_link($term->term_id, 'product_cat'));
                add_rewrite_rule($baseterm . '?$', 'index.php?product_cat=' . $term_slug, 'top');
                add_rewrite_rule($baseterm . 'page/([0-9]{1,})/?$', 'index.php?product_cat=' . $term_slug . '&paged=$matches[1]', 'top');
                add_rewrite_rule($baseterm . '(?:feed/)?(feed|rdf|rss|rss2|atom)/?$', 'index.php?product_cat=' . $term_slug . '&feed=$matches[1]', 'top');
            }
        }
        if ($flash == true) {
            flush_rewrite_rules(false);
        }

    }
    /*Fix 404 when creat new term*/
    public function lw_new_product_cat_edit_success($term_id, $taxonomy)
    {
        $this->lw_product_category_rewrite_rules(true);
    }

    /*
     * Remove /product/ or /shop/ ... support %product_cat%
     */
    public function lw_remove_slug($post_link, $post)
    {
        if (!in_array(get_post_type($post), array('product')) || 'publish' != $post->post_status) {
            return $post_link;
        }
        if ('product' == $post->post_type) {
            $post_link = str_replace('/produit/', '/', $post_link); //replace "product" to your slug
        } else {
            $post_link = str_replace('/' . $post->post_type . '/', '/', $post_link);
        }
        return $post_link;
    }

    public function lw_woo_product_rewrite_rules($flash = false)
    {
        global $wp_post_types, $wpdb;
        $siteLink = esc_url(home_url('/'));
        foreach ($wp_post_types as $type => $custom_post) {
            if ($type == 'product') {
                if ($custom_post->_builtin == false) {
                    $querystr = "SELECT {$wpdb->posts}.post_name, {$wpdb->posts}.ID
                                FROM {$wpdb->posts}
                                WHERE {$wpdb->posts}.post_status = 'publish'
                                AND {$wpdb->posts}.post_type = '{$type}'";
                    $posts = $wpdb->get_results($querystr, OBJECT);
                    foreach ($posts as $post) {
                        $current_slug = get_permalink($post->ID);
                        $base_product = str_replace($siteLink, '', $current_slug);
                        add_rewrite_rule($base_product . '?$', "index.php?{$custom_post->query_var}={$post->post_name}", 'top');
                    }
                }
            }
        }
        if ($flash == true) {
            flush_rewrite_rules(false);
        }

    }

    /*Fix 404*/
    public function lw_woo_new_product_post_save($post_id)
    {
        global $wp_post_types;
        $post_type = get_post_type($post_id);
        foreach ($wp_post_types as $type => $custom_post) {
            if ($custom_post->_builtin == false && $type == $post_type) {
                $this->lw_woo_product_rewrite_rules(true);
            }
        }
    }

}
