# Lightwords

> Wordpress theming done right. By coders, for coders.

A not-so-minimal WordPress starter theme. Powered by Twig, Webpack and Sass, based on Timber-starter-theme!

## Main features

* Maximum Twig templating (hail to [Timber](https://github.com/timber/timber)), no more ugly markup from evil hooks!
* Webpack modular build with Sass, ES6/Babel, BrowserSync...
* Docker and docker-compose support ([WPDC](https://github.com/nezhar/wordpress-docker-compose))
* Theme admin options for configuring high-level features

### Layout

* Mobile-first, touch friendly UI
* Responsive layout with wrappers, containers and row/col patterns (ala Bootstrap)
* [Cyanid](https://github.com/Chmood/cyanid) responsive flex grid
* Doesn't look bad when admin bar is visible

### Elements

* Typography base styling: scalable headings, solid font-size system, vertical rhythm
* Form inputs: rich radio/checkbox, [Select2](https://github.com/select2/select2)
* Transparent, compressible, sticky header. Searchbar, dropdown sub-menus and mobile panels.
* Parallax images and content with [Jarallax](https://github.com/nk-o/jarallax) + simple custom parallax hero
* SVG sprites generation and inlining
* Lightbox image viewer with [Smart Photo](https://github.com/appleple/SmartPhoto)
* Fullscreen, parallax hero with video support and enhanced content
* [Font Awesome 5](https://fontawesome.com/) support + simple CSS control button icons
* Contact infos widget
* Some FX like animated links, big text, 3D hover or ripple effect

### WooCommerce support

* Fully twig-templated pages and partials (single, archive, teasers, cart, checkout, account sub-pages)
* Mega dropdowns/panels for cart and account
* Easy integration with [WOOF](https://fr.wordpress.org/plugins/woocommerce-products-filter/) product filter

### Easy to dev with

* Out-of-the-box styleguide page
* Many Sass helper function, mixins and classes
* Front-end debug widget (showing current breakpoint infos, touch zones...)
* Full ES6 JavaScript toolkit: debounce/throttle helpers, image cover/wall, scroll tracking, page load transitions, ripple touch effect, toggler tool...

## Requirements

* WordPress
* Timber plugin (from Composer)

## Installation

### Install the theme

* cd into your WordPress theme directory
* git clone this repo
* activate the theme in the WordPress admin panel

### Install dependencies

```sh
npm install
```

* Composer (mostly for Timber plugin)

```sh
composer install
```

### Build the theme

```sh
npm run build
```

### Local live server

```sh
npm run watch
```

### Docker and docker-compose

[TODO]