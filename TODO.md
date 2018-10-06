# TODO

## PHP

* [PHP] Auto-set variable for WooCommerce support
* [PHP][Bug] Translation function _e() not working + use it everywhere (and add translation to the dictionary)
* [PHP] /page-templates: use DRY includes (of page.php & single.php) with a `fullwidth_content` + `landing_page` variables
* [PHP] Make contact infos a dedicated plugin
* [PHP][Bug][Never] Latest posts add sticky posts to max count (see homepage)
* [PHP][Never] Inject author datas (ex: avatar) into post templates (single and archive) + comments
* [PHP][Never] Mark pages as "special" (like stock homepage, blog, my account...) (for contact page mostly)
* [PHP][Never] Simple breadcrumbs (no YoastSEO) (see: https://gist.github.com/tinotriste/5387124)

### PHP Woocommerce

* [PHP] Modify wc_price() filter to split euros from cents (see StarterSite.php)
* [PHP] Global config string/slug for "products" (singular/plurals, URL, breadcrumb, page title...)
* [PHP] Cart page: deleting products should (AJAX) update the menu cart icon counter

#### Twig templates needed

* [PHP][TPL] Cart, checkout and order validation page (the whole funnel)
* [PHP][TPL] All account pages / login and forgotten password forms

#### At shop root ("/produits")

* [PHP][Bug] Shop page thumbail image isn't the good one
* [PHP] Use dynamic title and description

#### Products archive

* [PHP][Bug] Sub-categories teaser product count is broken sometimes (ex: 'Hoodies')
* [PHP] Display "N results per page" selector (hook probably)
* [Misc] Facet filter sidebar: new/custom plugin?

#### Single product page

* [PHP][Bug] Fix stock display
* [PHP][Bug] Fix metas (ratings, reviews + term links)

#### Dynamize (default) theme options

* [PHP] "Choisir ce qui sera affiché sur la page principale de la boutique." (products and/or categories)
* [PHP] "Choisir ce qui sera affiché sur les pages de catégories de produits." (products and/or categories)
* [PHP] N products per line & N lines per page ? (non-responsive / desktop 3-4-6 choices + interpolation?)
* [PHP][Never] Add new admin theme options?

## CSS

* [CSS][Bug] Fix sidebars (default + WooCommerce)
* [CSS] Feature: default images (post thumbnail, product, avatar...)
* [CSS][Bug] Select2: sometimes too wide (breaking flex columns) - pixel rounding issue?
* [CSS] Video homepage hero + mega search bar
* [CSS][Bug] Navbar active item not working for "products" and cart / my-account custom items
* [CSS][Bug] Product tile images are stretched (archive page)?!
* [CSS][Bug] Navbar dropdown buttons: shadow when in panel mode
* [CSS] Navbar dropdown buttons: hide carret mode?
* [CSS][Bug] Panels / dropdowns: max-height + scroll wrapper
* [CSS] Jarallax causes horizontal scrolling (overflow hidden needed)
* [TPL] All post/page/product image MUST use srcset
* [CSS][Bug]"transparent header" option is plain broken

## JS

* [JS][Bug] Something eats CPU
* [JS] Lightbox-like carousel
* [JS] Handle resize events

## Build

* [Build] Move from Gulp to Webpack build process (or fix Mix build) (see below)
* [Build] Read config.json at build step, no through the DOM
* [Build] Get rid off jQuery?
* [Build][Bug][Never] js sourcemaps must be fixed (Webpack first)

## Probably not

* Woocommerce mega-dropdown-menu (walking through the shop categories & products)
* Search auto-complete/suggestions ala ElasticSearch

## To be confirmed bugs

## PLUGINS

* wordpress-seo (aka Yoast)
* wp-sitemap-page
* HTML Editor Syntax Highlighter

## WEBPACK DOC

* https://www.ibenic.com/configuring-webpack-wordpress/
* https://github.com/jaredpalmer/presspack
* https://www.kirstencassidy.com/incorporting-webpack-wordpress-theme-part-1/
* https://gist.github.com/wpscholar/261141cf7b2bf4efd45cb86ad0a43ff2
* https://taylor.callsen.me/using-webpack-4-and-sass-with-wordpress/