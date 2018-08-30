# TODO

## Urgent

* All post/page/product image MUST use srcset
* Fix breadcrumb on transparent header
* Fix some button colors (focus, disabled...)
* Forms styling
  * Finalize common form styles
  * Style radios and checkboxes
  * File upload?

## Woocommerce

* Rating, "my account" pages
* Config string for "products" (URL, breadcrumb, page title...)
* Display products availability ('en stock')

### Products archive

* title (+ image + description) when at shop root
* categories won't show up when at shop root
* display "N results per page" select

### Single product page

* Fix stock display
* Fix metas (ratings, reviews + term links)

### Dynamize (default) theme options

* "Choisir ce qui sera affiché sur la page principale de la boutique." (products and/or categories)
* "Choisir ce qui sera affiché sur les pages de catégories de produits." (products and/or categories)
* N products per line & N lines per page ? (non-responsive / desktop 3-4-6 choices + interpolation?)

## Later

* Inject author datas (ex: avatar) into post templates (single and archive) + comments
* Element in viewport detection on scroll (like Waypoints)
  * animation helper lib
  * 'back to top' button
* Disable features from config:
  * topbar
* Move from Gulp to Webpack build process (or fix Mix build)
* Move all .php files at projet root into a sub-folder (.htaccess redirection?)
* Bug: Latest posts add sticky posts to max count
* JS handler for resize and scroll events

## Probably not

* CSS parallax
* Simple breadcrumbs (no YoastSEO) (see: https://gist.github.com/tinotriste/5387124)
* admin theme options?
* Get rid off jQuery?
* i18n / translate ALL text?
* Header menus: more than 2 level of deepness

# KNOWN BUGS

* add_theme_support( 'post-thumbnails' ) only works in functions.php

## To be confirmed bugs

* still an issue with file_exists on the SVG twig template (/lib/timber.php)
* fixed-positioned elements aren't fixed!
* js sourcemaps must be fixed
* dual topbar sometimes renders 'stacked' (on resize it seems)
* parallax needs security offset in the settings
