<?php
// WOOCOMMERCE

if (class_exists('WooCommerce')) {
    Timber\Integrations\WooCommerce\WooCommerce::init();
}

// ACTIONS AND FILTERS

// GLOBAL

// Don't load WooCommerce default CSS
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

// Don't load WooCommerce Filter (aka WOOF) CSS
add_action('wp_print_styles', 'woof_deregister_styles', 100);
function woof_deregister_styles()
{
    wp_deregister_style('woof');
}

add_action('after_setup_theme', function () {
    add_theme_support('woocommerce');
});

// MY-ACCOUNT ITEMS ICONS
function getMyAccountItemIcon($item)
{
    $fontAwesome = array(
        "dashboard" => 'fa-user',
        "orders" => 'fa-file-alt',
        "downloads" => 'fa-cloud-download-alt',
        "edit-address" => 'fa-map-marker-alt',
        "edit-account" => 'fa-user-plus',
        "customer-logout" => 'fa-power-off',
    );

    return (array_key_exists($item, $fontAwesome)) ? $fontAwesome[$item] : "";
}

// CART PAGE

// Add a title to the product table
// TODO: template needed!
add_action('woocommerce_before_cart_table', 'display_cart_product_list_title', 1);
function display_cart_product_list_title()
{
    echo '<h2>Produits</h2>';
}

// CHECKOUT PAGE

// Add a title to the billing section
// TODO: template needed!
add_action('woocommerce_review_order_before_payment', 'display_checkout_billing_title', 1);
function display_checkout_billing_title()
{
    echo '<h3 class="payment-title">Paiement</h3>';
}

// Fix context for products in the loop
// See: https://github.com/timber/timber/blob/master/docs/guides/woocommerce.md#tease-product
function timber_set_product($post)
{
    global $product;

    if (is_woocommerce()) {
        $product = wc_get_product($post->ID);
    }
}

// Show cart contents / total Ajax
// See: https://docs.woocommerce.com/document/show-cart-contents-total/
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment($fragments)
{
    global $woocommerce;
    ob_start();
    ?>
	<!-- <a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes');?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a> -->
	<span class="btn-cart-counter"><?php echo $woocommerce->cart->cart_contents_count ?></span>
	<?php
$fragments['span.btn-cart-counter'] = ob_get_clean();
    return $fragments;
}

// Display category image on category archive item
add_action('display_category_image', 'display_category_image');
function display_category_image($category)
{

    $thumbnail_id = get_woocommerce_term_meta($category->term_id, 'thumbnail_id', true);
    $link_image = wp_get_attachment_url($thumbnail_id);

    if ($link_image) {
        echo $link_image;
    }
    else {
        echo wc_placeholder_img_src();
    }
}

// We don't use the default WooCommerce stock code
// The stock HTML that we will use is located in partials/woocommerce/stock.twig
add_filter('woocommerce_get_stock_html', 'disable_default_woocommerce_stock_html');
function disable_default_woocommerce_stock_html($html) {
    return '';
}

/**
 * Output the pagination.
 */
function woocommerce_pagination() {
    if ( ! wc_get_loop_prop( 'is_paginated' ) || ! woocommerce_products_will_display() ) {
        return;
    }

    $total   = wc_get_loop_prop( 'total_pages' );
    $current = wc_get_loop_prop( 'current_page' );
    $base    = esc_url_raw( add_query_arg( 'product-page', '%#%', false ) );
    $format  = '?product-page=%#%';
    
    if ( ! wc_get_loop_prop( 'is_shortcode' ) ) {
        $format = '';
        $base = esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
    }
    
    if ( $total <= 1 ) {
        return;
    }
    
    echo '<nav class="woocommerce-pagination">';
    $links = paginate_links( apply_filters( 'woocommerce_pagination_args', array( // WPCS: XSS ok.
        'base'         => $base,
        'format'       => $format,
        'add_args'     => false,
        'current'      => max( 1, $current ),
        'total'        => $total,
        'prev_text'    => '&larr;',
        'next_text'    => '&rarr;',
        'type'         => 'list',
        'end_size'     => 3,
        'mid_size'     => 3
    ) ) );

    $links = str_replace('<a class="prev', '<a rel="prev" class="prev', $links);
    $links = str_replace('<a class="next', '<a rel="next" class="next', $links);
    $links = str_replace("<a class='page-numbers", "<a rel='no-follow' class='page-numbers", $links);

    echo $links;
    echo '</nav>';
}