////////////////////////////////////////
// GULPFILE.JS
////////////////////////////////////////

////////////////////////////////////////
// CONFIGURATION

global.config = {

	// Server config

	browsersyncProxyURL: "localhost/wordpress", // put your wordpress dev URL here
	serverport: 3000,
	openBrowser: false,
	openBrowsers: ["google chrome", "firefox"],

	// Directory names

	path: {
		src:    "src/",
    dist:   "dist/",
		tmp:    ".tmp/",
    doc:    ".doc/",
		css:    "css/",
		scss:   "scss/",
		js:     "js/",
		img:    "img/",
		fonts:  "fonts/",
	},

	// Order-dependant javascript files static build

  filesJs: [
    // "node_modules/jquery/dist/jquery.js", // not needed, provided by WordPress
    "node_modules/bootstrap-sass/assets/javascripts/bootstrap/transition.js",
    // "node_modules/bootstrap-sass/assets/javascripts/bootstrap/collapse.js",
    // "node_modules/bootstrap-sass/assets/javascripts/bootstrap/affix.js",
    // "node_modules/bootstrap-sass/assets/javascripts/bootstrap/alert.js",
    // "node_modules/bootstrap-sass/assets/javascripts/bootstrap/button.js",
    // "node_modules/bootstrap-sass/assets/javascripts/bootstrap/carousel.js",
    "node_modules/bootstrap-sass/assets/javascripts/bootstrap/dropdown.js",
    // "node_modules/bootstrap-sass/assets/javascripts/bootstrap/modal.js",
    // "node_modules/bootstrap-sass/assets/javascripts/bootstrap/tooltip.js",
    // "node_modules/bootstrap-sass/assets/javascripts/bootstrap/popover.js",
    // "node_modules/bootstrap-sass/assets/javascripts/bootstrap/scrollspy.js",
    // "node_modules/bootstrap-sass/assets/javascripts/bootstrap/tab.js",
		"src/js/parallax.js",
    "src/js/main.js"
  ],
};

// COMPOSITE PATHS

// Misc paths
config.pathTmp =        config.path.src + config.path.tmp;
config.pathCssTmp =     config.pathTmp + config.path.css;
config.pathDoc =        config.path.src + config.path.doc;

// Source paths
config.pathJs =         [config.path.src + config.path.js + "**/*.js"];
config.pathScss =       [config.path.src + config.path.scss + "**/*.scss"];
config.pathSpritesSVG = [config.path.src + config.path.img + "sprites/*.svg"];
config.pathImages =     [config.path.src + config.path.img + "*.*", "!" + config.pathSpritesSVG];
config.pathHtml =       [config.path.src + "*.html", config.pathStyleguide + "*.html"];
config.pathTemplates =  ["*.php", "lib/**/*.php", "templates/**/*.twig"];

// Destination
config.pathJsDest =     config.path.dist + config.path.js;
// config.pathCssDest =    config.path.dist + config.path.css;
config.pathCssDest =    "./";
config.pathFontsDest =  config.path.dist + config.path.fonts;
config.pathImagesDest = config.path.dist + config.path.img;

// Clean
config.pathClean =      [
  config.path.dist,
  config.pathTmp + config.path.js,
  config.pathTmp + config.path.css
];


////////////////////////////////////////
// MODULES

var gulp =        	require("gulp"),
		// auto-load all gulp plugins
    plugins =     	require("gulp-load-plugins")(),
		// non-gulp tools
    browserSync = 	require("browser-sync"),
    reload =      	browserSync.reload,
		del =         	require("del"),
    fs =     	    	require("node-fs"),
    vinylPaths =  	require("vinyl-paths"),
    autoprefixer = 	require("autoprefixer"),
    runSequence  = 	require("run-sequence"),
		colors  = 			require("colors"),
		beep = 					require("beepbeep");

require("gulp-stats")(gulp);


////////////////////////////////////////
// ERROR HANDLING

var onError = function (e) {
	beep();	// Ubuntu MATE needs love
	if (e) {
		console.log(e);
		// LibSass
		if (e.plugin) console.log("ERROR".bold.red + " - " + e.plugin.bold.yellow);
		if (e.file) console.log("Error in: " + e.file);
		if (e.line && e.column) console.log("Error at: line " + e.line + " - column " + e.column);
//		if (e.messageFormatted) console.log(e.messageFormatted.red);
		// Babel
		if (e.name) console.log((e.name + " " + e.message).bold.red);
		if (e.codeFrame) console.log(e.codeFrame);

		// ommit this and watch task will stop working!
		this.emit("end");
	}
};


////////////////////////////////////////
// INTERNAL TASKS

// UTILS

// Clean

gulp.task("clean", function () {
	return gulp.src(config.pathClean)
    .pipe(vinylPaths(del))
});

// Copy

gulp.task("copy", ["copy-fonts"]);

gulp.task("copy-fonts", function () {
	return gulp.src([
		  "node_modules/font-awesome/fonts/*"
		])
		.pipe(gulp.dest(config.pathFontsDest))
});


// IMAGES

gulp.task("images", function() {
	return gulp.src(config.pathImages)
  .pipe(plugins.newer(config.pathImagesDest))

  // prod
  .pipe(plugins.imagemin({
    progressive: true,  // jpeg
    interlaced: true,   // gif
    multipass: true,    // svg
    // svgoPlugins: [{removeViewBox: false}],
    // use: [pngquant()]
  }))
  .pipe(gulp.dest(config.pathImagesDest))
  .pipe(reload({stream: true}));
});

// SVG sprites

gulp.task("sprites", function() {
  return gulp.src(config.pathSpritesSVG)

    // prod
    .pipe(plugins.svgSprite({
        log: null,
        mode: {inline: true, symbol: true}
    }))
    // .pipe(gulp.dest(config.path.src + config.path.img))
		.pipe(plugins.rename("sprite.symbol.svg.twig"))
    .pipe(gulp.dest(config.pathImagesDest))
    .pipe(reload({stream: true}))
});

gulp.task("sprites-reload", ["sprites"], reload);


// STYLES

gulp.task("styles", function(){

  return gulp.src([config.path.src + config.path.scss + "main.scss"])
		.pipe(plugins.plumber(onError))
    // .pipe(plugins.scssLint({"config": "scsslint.yml"}))
    .pipe(plugins.sourcemaps.init())
    .pipe(plugins.sass({outputStyle: "expanded"}))
    .pipe(plugins.postcss([
	    autoprefixer({
	      browsers: ["last 2 version"]
	    })
	  ]))
    .pipe(plugins.sourcemaps.write({sourceRoot: "."}))
		.pipe(plugins.rename("style.css"))
		.pipe(gulp.dest(config.pathCssDest))
    .pipe(reload({stream: true}))
});


// SCRIPTS

gulp.task("scripts", function() {
	/*	ADD THIS TO package.json TO ENABLE ES6
			(and gain 130+ megs of node_modules/)

		"babel-preset-es2015": "^6.3.13",
		"eslint-config-standard": "^4.4.0",
		"eslint-plugin-standard": "^1.3.1",
		"gulp-babel": "^6.1.1",
		"gulp-eslint": "^1.1.1",
	*/
	return gulp.src(config.filesJs)
		.pipe(plugins.plumber(onError))
    // .pipe(plugins.eslint())
    // .pipe(plugins.eslint.format())
    .pipe(plugins.sourcemaps.init())
    // .pipe(plugins.babel({
    //       presets: ["es2015"],
    //       compact: false
    //     }))
    .pipe(plugins.concat("main.js"))
    .pipe(plugins.sourcemaps.write({sourceRoot: "."}))
    .pipe(gulp.dest(config.pathTmp + config.path.js))

    // prod
		// .pipe(plugins.rename({suffix: ".min"}))
		.pipe(plugins.uglify({outSourceMaps: true}))
		.pipe(gulp.dest(config.pathJsDest))
    .pipe(reload({stream: true}))
});


// PHP / TEMPLATES

gulp.task("templates", function() {
	return gulp.src(config.pathTemplates)
		// Do nothing by now, just reload the page
		.pipe(reload({stream: true}))
});


// SERVER

gulp.task("serve", function() {
  browserSync({
		proxy: config.browsersyncProxyURL,
			// serveStatic: ["app/static"],
		files: [
			// '{lib,templates}/**/*.php', '*.php',
      '*.css',
      '**/*.php',
      // dest + '/**',
      '!**/*.map'
    ],
    open: config.openBrowser,
    browser: config.openBrowsers
  });
});

// WATCH

gulp.task("watch", function () {
	gulp.watch(config.pathJs, ["scripts"]);
	gulp.watch(config.pathScss, ["styles"]);
  gulp.watch(config.pathTemplates, ["templates"]);
  gulp.watch(config.pathImages, ["images"]);
	gulp.watch(config.pathSpritesSVG, ["sprites-reload"]);
});


////////////////////////////////////////
// USER TASKS

gulp.task("compile", ["scripts", "styles", "templates"]);
gulp.task("graphics", ["images", "sprites"]);
gulp.task("swatch", ["serve", "watch"]);

gulp.task("build", function() {
  runSequence(
    "clean",
    ["compile", "graphics"]
  );
});

gulp.task("default", ["swatch"]);
