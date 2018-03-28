# TODO

## Urgent

* Forms styling
  * Finalize common form styles
  * Prevent Gravity Forms css's (4 stylesheets) from loading
  * Style radios and checkboxes
  * File upload?
* Modals

## Later

* Element in viewport detection on scroll (like Waypoints) + animation helper lib
* Page template for archive listing ALL the posts (not only a category)
* Disable features from config:
  * topbar
* Move from Gulp to Webpack build process (or fix Mix build)
* WooCommerce support

## Probably not

* CSS parallax
* Simple breadcrumbs (no YoastSEO) (see: https://gist.github.com/tinotriste/5387124)
* admin theme options?
* Get rid off jQuery?
* i18n / translate ALL text?

# KNOWN BUGS

* add_theme_support( 'post-thumbnails' ) only works in functions.php

## To be confirmed bugs

* still an issue with file_exists on the SVG twig template (/lib/timber.php)
* fixed-positioned elements aren't fixed!
* js sourcemaps must be fixed
* dual topbar sometimes renders 'stacked' (on resize it seems)
* parallax needs security offset in the settings
