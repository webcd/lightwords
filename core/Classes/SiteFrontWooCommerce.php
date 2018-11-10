<?php

namespace App\Classes;

class SiteFrontWooCommerce extends \App\Lib\SiteCore
{

    public function __construct($loader)
    {
        $this->includes();
        parent::__construct($loader);
    }

    public function includes()
    {
        include_once get_template_directory() . '/core/includes/functions-woocommerce.php';
        include_once get_template_directory() . '/core/includes/functions-woocommerce-hooks.php';
    }
    /**
     * Add actions
     */
    public function actions()
    {

    }

    /**
     * add filters
     */
    public function filters()
    {
        $this->loader->add_filter('timber/twig', $this, 'add_to_twig');
    }

    public function add_to_twig($twig)
    {
        // Filters
        //$twig->addFilter(new Twig_SimpleFilter('myfoo', array($this, 'myfoo')));
        $twig->addFilter(new \Twig_SimpleFilter('formatPrice', array($this, 'formatPrice')));

        return $twig;
    }

    // Price text formatting - Twig filter
    public function formatPrice($price, $args = array())
    {
        $args = apply_filters(
            'wc_price_args', wp_parse_args(
                $args, array(
                    'ex_tax_label' => false,
                    'currency' => '',
                    'decimal_separator' => wc_get_price_decimal_separator(),
                    'thousand_separator' => wc_get_price_thousand_separator(),
                    'decimals' => wc_get_price_decimals(),
                    'price_format' => get_woocommerce_price_format(),
                )
            )
        );

        $negative = $price < 0;
        $price = apply_filters('raw_woocommerce_price', floatval($negative ? $price * -1 : $price));
        $price = apply_filters('formatted_woocommerce_price', number_format($price, $args['decimals'], $args['decimal_separator'], $args['thousand_separator']), $price, $args['decimals'], $args['decimal_separator'], $args['thousand_separator']);

        if (apply_filters('woocommerce_price_trim_zeros', false) && $args['decimals'] > 0) {
            $price = wc_trim_zeros($price);
        }

        $price_fractions = explode($args['decimal_separator'], $price);

        $context = \Timber::get_context();
        $context['negative'] = $negative;
        $context['price_symbol'] = get_woocommerce_currency_symbol($args['currency']);
        $price_fractions = explode($args['decimal_separator'], $price);
        $context['price_whole'] = $price_fractions[0];
        $context['price_cents'] = $price_fractions[1];
        $context['price_args'] = $args;

        if ($args['ex_tax_label'] && wc_tax_enabled()) {
            $context['tax_label'] = WC()->countries->ex_tax_or_vat();
        }

        // Compile twig template
        return \Timber::compile('woocommerce/price.twig', $context);
    }
}
