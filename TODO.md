# TODO

## Elements

* isolate all root "controllers" .php files into a dedicated folder
* member account links / login link / post-type or category link / etc
* Timber helper for RICG images
* search form (need a dedicated partial)
* pagination
* comments
* native breadcrumb?

## CSS

* flex grid (to be continued)
* SVG fontawesome
* fixed ratio
* allow v-scroll on expanded mobile navbar
* Bootstrap removal
  * scaffolding,
  * type,
  * responsive-utilities
  * ...

## JS

* parallax on mobile?

## MISC

* i18n / translate ALL text
* custom post types
* forms
* admin theme options?


# KNOWN bugs

* still an issue with file_exists on the SVG twig template (/lib/timber.php)
* fixed-positioned elements aren't fixed on mobile!
* js sourcemaps are broken (fixed when babel activated)
* remove-emoji snippets is broken (temp disabled)
* dual topbar sometimes renders 'stacked' (on resize it seems)
* parallax needs security offset in the settings
