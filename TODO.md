# TODO

## PHP

* [PHP] Insert body tag configuration classes (from JSON config) via PHP, then remove configure.js
* [PHP] Move all .php files at projet root into a 'controller' (or something) sub-folder (.htaccess redirection?)
* [PHP] Vast amount of PHP code (only) works in functions.php. Move/plit this elsewhere!
* [PHP][Bug][Never] Latest posts add sticky posts to max count
* [PHP][Bug][Never] i18n / translate ALL text? (_e() function for stock text broken?)
* [PHP][Never] Inject author datas (ex: avatar) into post templates (single and archive) + comments
* [PHP][Never] Simple breadcrumbs (no YoastSEO) (see: https://gist.github.com/tinotriste/5387124)
* [PHP][Never] Admin theme options?

### Twig templates needed

* [PHP][TPL] Cart, checkout and order validation page
* [PHP][TPL] All account pages / login and forgotten password forms

### PHP Woocommerce

* [PHP] Global config string/slug for "products" (URL, breadcrumb, page title...)
* [PHP][Bug] Display products availability ('en stock')

#### At shop root

* [PHP] title and description (from global config strings) (get page content as description?)
* [PHP][Bug] Shop page thumbail image

#### Products archive

* [PHP] Display "N results per page" selector (hook probably)

#### Single product page

* [PHP][Bug] Fix stock display
* [PHP][Bug] Fix metas (ratings, reviews + term links)

#### Dynamize (default) theme options

* [PHP] "Choisir ce qui sera affiché sur la page principale de la boutique." (products and/or categories)
* [PHP] "Choisir ce qui sera affiché sur les pages de catégories de produits." (products and/or categories)
* [PHP] N products per line & N lines per page ? (non-responsive / desktop 3-4-6 choices + interpolation?)

## CSS

* [CSS][JS] Improve / config for scroll up/down buttons
* [TPL] All post/page/product image MUST use srcset
* [CSS] Fix some button colors (focus, disabled...)
* [CSS][Bug]"transparent header" option is plain broken

## Build

* [Build] Move from Gulp to Webpack build process (or fix Mix build)
* [Build] Get rid off jQuery?

## JS

* [JS] Compressed header: track for up & down scroll, not only absolute value
* [JS] Handler (throttle/debounce) for resize and scroll events

## Probably not


## To be confirmed bugs

* js sourcemaps must be fixed
