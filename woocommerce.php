<?php

if (!class_exists('Timber')) {
    echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
    return;
}

$context = Timber::get_context();

// WooCommerce custom sidebar
$context['sidebar'] = Timber::get_widgets('shop-sidebar');

// TODO: don't send all the cart (huge datas)
$context['cart'] = $woocommerce->cart;

// // DEBUG
// echo '<pre>', var_dump($context['cart']) , '</pre>';
// die();

if (is_singular('product')) {

    // SINGLE PRODUCT

    // The product
    $product = Timber::get_post();
    $context['post'] = $product;

    // Related products
    $related_limit = wc_get_loop_prop('columns');
    $related_ids = wc_get_related_products($context['post']->id, $related_limit);
    $context['related_products'] = Timber::get_posts($related_ids);

    // Restore the context and loop back to the main query loop.
    // TODO: find source!
    wp_reset_postdata();

    // Get product categories and tags
    $context['categories'] = get_the_terms($post->ID, 'product_cat');
    $context['tags'] = get_the_terms($post->ID, 'product_tag');

    Timber::render('views/woocommerce/single-product.twig', $context);

} else {

    // ARCHIVE PRODUCT

    $posts = Timber::get_posts();
    $context['post'] = $posts;

    // Sub-categories
    if (is_product_category()) {
        $category = new TimberTerm();
    }

    $context['subcategories'] = Timber::get_terms(array(
        'taxonomy' => 'product_cat',
        'orderby' => 'term_id',
        'hide_empty' => true,
        'parent' => $category->ID,
    ));

    // Shop root or category?
    if (!is_product_category()) {

        // SHOP ROOT ARCHIVE

        // Default title and description
        // TODO: Use the magic shop strings ("produits" / "boutique" / whatever)
        $context['title'] = 'Produits';
        $context['category_description'] = 'Découvrez nos produits&nbsp;!';

        // TODO: get the shop page thumbnail
        $image = get_the_post_thumbnail_url();
        $context['category_image'] = $image;

    } else {

        // CATEGORY ARCHIVE

        // Current category
        $context['category'] = $category;

        // Category title
        $context['title'] = single_term_title('', false);
        // Queried object
        $queried_object = get_queried_object();

        // Category image
        // Get category image URL
        global $wp_query;
        $cat = $wp_query->get_queried_object();
        $thumbnail_id = get_woocommerce_term_meta($cat->term_id, 'thumbnail_id', true);
        $image = wp_get_attachment_url($thumbnail_id);

        if ($image) {
            $context['category_image'] = $image;
        }

        // Category description
        $context['category_description'] = $queried_object->description;
    }

    Timber::render('views/woocommerce/archive-product.twig', $context);
}
