;(function($) {
  // DOM IS READY!

  // TODO: ES6 here => https://codepen.io/jh3y/pen/opNYWy?editors=0010

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

  // TODO: event throttling helper too!

  function throttle(func, limit) {
    var lastFunc = 0,
        lastRan = 0

    return function () {
      var context = this
      var args = arguments
      if (!lastRan) {
        func.apply(context, args)
        lastRan = Date.now()
      } else {
        clearTimeout(lastFunc)
        lastFunc = setTimeout(function () {
          if (Date.now() - lastRan >= limit) {
            func.apply(context, args)
            lastRan = Date.now()
          }
        }, limit - (Date.now() - lastRan))
      }
    }
  }
  

  $(function() {
    var $window = $(window)
    var $body = $('body')

    var lastScrollTop = 0;

    var updateHeader = debounce(function() {
      var scrollTop = $window.scrollTop()

      // Detect scroll direction
      if (Lightwords.CONFIG.hasScrollDirectionTracking) {
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
      }
        

      // Header compress
      if (Lightwords.CONFIG.compressHeader) {
        if (scrollTop > Lightwords.CONFIG.compressHeaderOffset) {
          $body.addClass('header-compressed')
          $body.removeClass('header-uncompressed')
        } else {
          $body.removeClass('header-compressed')
          $body.removeClass('header-uncompressed')
        }
      }

      // Scroll-to-top button
      if (Lightwords.CONFIG.hasScrollTop) {
        if (scrollTop > Lightwords.CONFIG.scrollTopOffset) {
          $body.addClass('has-scroll-top-active')
        } else {
          $body.removeClass('has-scroll-top-active')
        }
      }
      
    }, 50)

    if (
      Lightwords.CONFIG.hasScrollDirectionTracking ||
      Lightwords.CONFIG.compressHeader ||
      Lightwords.CONFIG.hasScrollTop
    ) {
      $(window).scroll(updateHeader)
    }

    console.log('on-scroll.js is loaded')
  })
})(jQuery)
