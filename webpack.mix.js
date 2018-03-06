let mix = require('laravel-mix');
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;

mix.sass('src/scss/main.scss', 'dist')
   .js('src/js/main.js', 'dist')
   .extract([
    'bootstrap-sass/assets/javascripts/bootstrap/transition.js',
    'bootstrap-sass/assets/javascripts/bootstrap/dropdown.js',
    // 'parallax.js/src/parallax.js'
    // "bootstrap-sass/assets/javascripts/bootstrap/collapse.js",
    // "bootstrap-sass/assets/javascripts/bootstrap/affix.js",
    // "bootstrap-sass/assets/javascripts/bootstrap/alert.js",
    // "bootstrap-sass/assets/javascripts/bootstrap/button.js",
    // "bootstrap-sass/assets/javascripts/bootstrap/carousel.js",
    // "bootstrap-sass/assets/javascripts/bootstrap/modal.js",
    // "bootstrap-sass/assets/javascripts/bootstrap/tooltip.js",
    // "bootstrap-sass/assets/javascripts/bootstrap/popover.js",
    // "bootstrap-sass/assets/javascripts/bootstrap/scrollspy.js",
    // "bootstrap-sass/assets/javascripts/bootstrap/tab.js",
  ])
  .copy('src/img', 'dist/img')
  .setPublicPath('dist');

mix.webpackConfig(webpack => {
  return {
      plugins: [ 
        new BundleAnalyzerPlugin({
          openAnalyzer: false,
          defaultSizes: 'gzip',
          analyzerMode: 'static'
        }),  
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery', 
            'window.jQuery': 'jquery'
        })   
      ]  
  }    
})

mix.browserSync({
  proxy: 'babychou-emploi.' + process.env.USER + '.ct.webcd.lan'
})  
  
  // Versioning only in prod
if(mix.inProduction()) {
  mix.version()
}
// Source maps
if (!mix.inProduction()) {
  mix.webpackConfig({ devtool: "inline-source-map" });
}  