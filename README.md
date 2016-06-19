# Lightwords

A minimal WordPress starter theme. Powered by Twig, Gulp and Bootstrap, inspired by Sage, based on Timber-starter-theme!

## Requirements

* WordPress
* Timber plugin

## Installation

### Install the theme

* cd into your WordPress theme directory
* git clone this repo

### Install dependencies

```sh
npm install
```

* optional Composer

```sh
composer install
```

### Build the theme

```sh
gulp build
```

### Local live server

```sh
gulp
```

## Usage

### Gulp tasks

* `(default)` : see `swatch`
* `build` : clean and build all assets
* `swatch` : `serve` and `watch`
* `serve` : launch a local proxy web server
* `watch` : do things when a file change
* `graphics` : `images` and `sprites`
* `images` : optimise images
* `sprites` : build sprites
* `compile` : `scripts`, `styles` and `templates`
* `scripts` : handles javascript
* `styles` : CSS pipeline
* `templates` : void - just refresh the page
