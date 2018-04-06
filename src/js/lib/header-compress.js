;(function($) {
  // DOM IS READY!

  // DEBOUNCE HELPER
  // See: https://davidwalsh.name/javascript-debounce-function

  // Returns a function, that, as long as it continues to be invoked, will not
  // be triggered. The function will be called after it stops being called for
  // N milliseconds. If `immediate` is passed, trigger the function on the
  // leading edge, instead of the trailing.
  function debounce(func, wait, immediate) {
    var timeout
    return function() {
      var context = this,
        args = arguments
      var later = function() {
        timeout = null
        if (!immediate) func.apply(context, args)
      }
      var callNow = immediate && !timeout
      clearTimeout(timeout)
      timeout = setTimeout(later, wait)
      if (callNow) func.apply(context, args)
    }
  }

  $(function() {
    var $window = $(window)
    var $body = $('body')

    var updateHeader = debounce(function() {
      // All the taxing stuff you do
      var scroll = $window.scrollTop()
      if (scroll > 200) {
        $body.addClass('header-compressed')
        $body.removeClass('header-uncompressed')
      } else {
        $body.removeClass('header-compressed')
        $body.removeClass('header-uncompressed')
      }
    }, 50)

    $(window).scroll(updateHeader)

    console.log('header-compress.js is loaded')
  })
})(jQuery)
