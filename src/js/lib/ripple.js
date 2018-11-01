import $ from "jquery"

// RIPPLE EFFECT

const ripple = (() => {
  if (Lightwords.CONFIG.rippleEffect) {
    $(Lightwords.CONFIG.rippleSelector).addClass("ripple")

    $(".ripple").click(function(e) {
      const rippler = $(this)

      // create .ink element if it doesn't exist
      if (rippler.find(".ink").length == 0) {
        rippler.append("<span class='ink'></span>")
      }

      const ink = rippler.find(".ink")

      // prevent quick double clicks
      ink.removeClass("animate")

      // set .ink diametr
      if (!ink.height() && !ink.width()) {
        const d = Math.max(rippler.outerWidth(), rippler.outerHeight())
        ink.css({ height: d, width: d })
      }

      // get click coordinates
      const x = e.pageX - rippler.offset().left - ink.width() / 2
      const y = e.pageY - rippler.offset().top - ink.height() / 2

      // set .ink position and add class .animate
      ink
        .css({
          top: y + "px",
          left: x + "px"
        })
        .addClass("animate")
    })
  }
  console.log("ripple.js is loaded")
})()

export default ripple
