# TODO

## PHP

### PHP WordPress

* [PHP][Bug]: Latest posts add sticky posts to max count
* [PHP] Insert body tag configuration classes (from JSON config) via PHP, then remove configure.js
* [PHP] Move all .php files at projet root into a sub-folder (.htaccess redirection?)
* [PHP] Vast amount of PHP code (only) works in functions.php. Move/plit this elsewhere!
* [PHP] Inject author datas (ex: avatar) into post templates (single and archive) + comments
* [PHP] Simple breadcrumbs (no YoastSEO) (see: https://gist.github.com/tinotriste/5387124)

### PHP Woocommerce

* [PHP][Bug] Display products availability ('en stock')
* [PHP] Global config string/slug for "products" (URL, breadcrumb, page title...)

#### At shop root

* [PHP] title (+ image + description)
* [PHP][Bug] categories won't show up

#### Products archive

* [PHP] Display "N results per page" select

#### Single product page

* [PHP][Bug] Fix stock display
* [PHP][Bug] Fix metas (ratings, reviews + term links)

#### Dynamize (default) theme options

* [PHP] "Choisir ce qui sera affiché sur la page principale de la boutique." (products and/or categories)
* [PHP] "Choisir ce qui sera affiché sur les pages de catégories de produits." (products and/or categories)
* [PHP] N products per line & N lines per page ? (non-responsive / desktop 3-4-6 choices + interpolation?)

### Twig templates needed

* [PHP][TPL] All account pages / login and forgotten password forms

## CSS Base

* [TPL] All post/page/product image MUST use srcset
* [CSS] Fix some button colors (focus, disabled...)

## Build

* [Build] Move from Gulp to Webpack build process (or fix Mix build)

## JS

* [JS] JS handler for resize and scroll events

## Probably not

* admin theme options?
* Get rid off jQuery?
* i18n / translate ALL text? (_e() function?)

# KNOWN BUGS

* [CSS][Bug]"transparent header" option is plain broken

## To be confirmed bugs

* js sourcemaps must be fixed
