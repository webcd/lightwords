# TODO

## URGENT

* utiliser une image "simple" pour le logo (sans texte)
* permettre des containers fluide (full-width)
* refactoring des sous-menu
* passer le parallaxe en full CSS (si possible ?)
* via la config :
  * masquer la breadcrumb
  * masquer la recherche
  * masquer la topbar
* utiliser les extrait dans le contenu des articles

## LATER

* séparer les styles "de base" de ceux de la "skin"
* passer de Gulp à Webpack
* Virer complètement Bootstrap
* Utiliser Aramid grid / layout
* Virer complètement jQuery ?
* Supprimer le styleguide automatique

## Elements

* member account links / login link / post-type or category link / etc
* sidebars?

## CSS

* color palette
* buttons variations (ternary, hollow)
* flex grid (to be continued)
* SVG fontawesome
* Bootstrap removal
  * scaffolding,
  * type,
  * buttons,
  * responsive-utilities
  * ...

## JS

* ripple effect
* parallax on mobile

## MISC

* i18n / translate ALL text
* forms
* admin theme options?

# KNOWN bugs

* still an issue with file_exists on the SVG twig template (/lib/timber.php)
* fixed-positioned elements aren't fixed!
* js sourcemaps must be fixed
* dual topbar sometimes renders 'stacked' (on resize it seems)
* parallax needs security offset in the settings
