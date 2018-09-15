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

  // TODO: throttle helper too!

  $(function() {
    var $window = $(window)
    var $body = $('body')

    var lastScrollTop = 0;

    var updateHeader = debounce(function() {
      var scrollTop = $window.scrollTop()

      // Detect scroll direction
      // From: https://stackoverflow.com/questions/31223341/detecting-scroll-direction 

      if (scrollTop > lastScrollTop) {
        // Scrolling down
        $body.addClass("scroll-down");
        $body.removeClass("scroll-up");
      } else {
        // Scrolling up
        $body.addClass("scroll-up");
        $body.removeClass("scroll-down");
      }

      lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // For Mobile or negative scrolling

      // Header compress
      if (scrollTop > 200) {
        $body.addClass('header-compressed')
        $body.removeClass('header-uncompressed')
      } else {
        $body.removeClass('header-compressed')
        $body.removeClass('header-uncompressed')
      }

      // Scroll-to-top button
      if (scrollTop > 400) {
        $body.addClass('has-scroll-top-active')
      } else {
        $body.removeClass('has-scroll-top-active')
      }
      
    }, 50)

    $(window).scroll(updateHeader)

    console.log('on-scroll.js is loaded')
  })
})(jQuery)
