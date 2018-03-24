;(function($) {
  // DOM IS READY!

  $(function() {
    // See: https://select2.org/configuration
    $('select').select2({
      minimumResultsForSearch: Infinity
    })

    console.log('select2.js is loaded')
  })
})(jQuery)
