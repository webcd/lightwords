import $ from "jquery"

const pageTransitions = (() => {
  // PAGE TRANSITION

  if (Lightwords.CONFIG.pageTransitions) {
    const $pageTransitionIn = $(".page-transition-in")
    const $pageTransitionOut = $(".page-transition-out")

    $pageTransitionIn.removeClass("active")

    setTimeout(function() {
      $pageTransitionIn.remove()
      // console.warn('ON PAGE IN');
    }, 2000)

    function onPageOut(e) {
      let url = $(this).attr("href")

      if (!url) {
        url = $(this).attr("data-onclick-url")
      }

      // console.warn('ON PAGE OUT', url);
      e.preventDefault()

      $pageTransitionOut.addClass("active")

      setTimeout(function() {
        window.location.href = url
      }, 1000)
    }

    $("a[href], [data-onclick-url]")
      .not("a[href^='#']")
      .click(onPageOut)

    // ONCLICK ELEMENTS
    // $("[data-onclick-url]").click(function(e) {
    //   const url = $(this).attr("data-onclick-url");
    //   navigateTo(url);
    // });
  } else {
    // Default "onclick" behavior
    $("[data-onclick-url]").click(function() {
      const url = $(this).attr("data-onclick-url")
      window.location.href = url
    })
  }

  console.log("page-transitions.js is loaded")
})()

export default pageTransitions
