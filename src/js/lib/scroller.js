import $ from "jquery"

// SCROLLER

const scroller = (() => {
  const $scrollers = $("[data-scroll]")

  $scrollers.on("click", function() {
    const scrollTarget = $(this).attr("data-scroll")
    const $scrollTarget = $(scrollTarget)

    if ($scrollTarget.length === 0) {
      console.warn('scroller.js: no such target "' + scrollTarget + '"!')
    } else {
      let headerHeight = 0
      if ($("body").hasClass("sticky-header")) {
        // TODO: shouldn't take hidden topbar into account on mobile
        headerHeight = $(".site-header").height() / 2
        console.log("header height (half)", headerHeight)
      }
      $("html, body").animate(
        {
          scrollTop: $scrollTarget.offset().top - headerHeight
        },
        500
      )
    }
  })

  console.log("scroller.js is loaded")
})()

export default scroller
