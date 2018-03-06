# TODO

## URGENT

* Page template for all posts
* CSS parallax
* Disable features from config:
  * topbar

## LATER

* Split styles into "base" and "skin"
* Move from Gulp to Webpack build process
* Get rid off Bootstrap
  * scaffolding,
  * type,
  * buttons,
  * responsive-utilities
  * ...
* Use Aramid grid / layout
* Get rid off jQuery?
* Simple breadcrumbs (no YoastSEO) (see: https://gist.github.com/tinotriste/5387124)
* Member account links / login page
* i18n / translate ALL text
* forms styling (including Cravity Forms)
* admin theme options?
* JS ripple effect
* Laravel mix sprite svg

# KNOWN bugs

* still an issue with file_exists on the SVG twig template (/lib/timber.php)
* fixed-positioned elements aren't fixed!
* js sourcemaps must be fixed
* dual topbar sometimes renders 'stacked' (on resize it seems)
* parallax needs security offset in the settings
* BrowserSync not reload