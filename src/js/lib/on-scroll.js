import $ from "jquery"
import { debounce } from "./debounce-throttle"

// ON-SCROLL

const onScroll = (() => {
  const $window = $(window)
  const $body = $("body")

  let lastScrollTop = 0

  const updateHeader = debounce(function() {
    const scrollTop = $window.scrollTop()

    // Detect scroll direction
    if (Lightwords.CONFIG.hasScrollDirectionTracking) {
      // From: https://stackoverflow.com/questions/31223341/detecting-scroll-direction

      if (scrollTop > lastScrollTop) {
        // Scrolling down
        $body.addClass("scroll-down")
        $body.removeClass("scroll-up")
      } else {
        // Scrolling up
        $body.addClass("scroll-up")
        $body.removeClass("scroll-down")
      }

      lastScrollTop = scrollTop <= 0 ? 0 : scrollTop // For Mobile or negative scrolling
    }

    // Header compress
    if (Lightwords.CONFIG.compressHeader) {
      if (scrollTop > Lightwords.CONFIG.compressHeaderOffset) {
        $body.addClass("header-compressed")
        $body.removeClass("header-uncompressed")
      } else {
        $body.removeClass("header-compressed")
        $body.removeClass("header-uncompressed")
      }
    }

    // Scroll-to-top button
    if (Lightwords.CONFIG.hasScrollTop) {
      if (scrollTop > Lightwords.CONFIG.scrollTopOffset) {
        $body.addClass("has-scroll-top-active")
      } else {
        $body.removeClass("has-scroll-top-active")
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

  console.log("on-scroll.js is loaded")
})()

export default onScroll
