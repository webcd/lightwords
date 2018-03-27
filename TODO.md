# TODO

## Urgent

* Allow full-width .container on tablet ('xs')
* Fix padding-top on light skin (with AND without hero image)
* Sticky footer broken (main content too tall)
* Forms styling
  * Finalize common form styles
  * Prevent Gravity Forms css's (4 stylesheets) from loading
  * Style radios and checkboxes
  * File upload?
* Modals
* Variable heading font-size (depending on screen-size)
* Scroll helpers ("down", "to-top", to element)

## Later

* Find a way to include the styleguide template by default
* WooCommerce support
* Page template for archive listing ALL the posts (not only a category)
* CSS parallax
* Disable features from config:
  * topbar
* Member account links / login page
* Move from Gulp to Webpack build process (or fix Mix build)

* Simple breadcrumbs (no YoastSEO) (see: https://gist.github.com/tinotriste/5387124)

## Probably not

* admin theme options?
* Get rid off jQuery?
* i18n / translate ALL text?

# KNOWN BUGS

* add_theme_support( 'post-thumbnails' ) only works in functions.php
* Select2 seems to only work on the last select of the page? (and data-placeholder is broken)

## To be confirmed bugs

* still an issue with file_exists on the SVG twig template (/lib/timber.php)
* fixed-positioned elements aren't fixed!
* js sourcemaps must be fixed
* dual topbar sometimes renders 'stacked' (on resize it seems)
* parallax needs security offset in the settings
