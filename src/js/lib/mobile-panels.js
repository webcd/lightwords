import $ from "jquery"

// MOBILE PANELS

const mobilePanels = (() => {
  const $body = $("body")
  const $togglers = $("[data-panel-toggle]")
  const $overlay = $("#overlay-panels")

  const panelNames = []
  $togglers.each(function() {
    panelNames.push($(this).attr("data-panel-target"))
  })

  function closeAllPanels() {
    $togglers.removeClass("is-toggled")
    $body.removeClass("panel-expanded")

    for (let i = 0; i < panelNames.length; i++) {
      $body.removeClass(panelNames[i] + "-expanded")
    }
  }

  $togglers.on("click", function() {
    const $this = $(this)
    const panelName = $this.attr("data-panel-target")

    if ($this.hasClass("is-toggled")) {
      closeAllPanels()
    } else {
      $togglers.removeClass("is-toggled")
      $this.addClass("is-toggled")
      $body.addClass("panel-expanded")

      for (let i = 0; i < panelNames.length; i++) {
        $body.removeClass(panelNames[i] + "-expanded")
      }

      $body.addClass(panelName + "-expanded")
    }
  })

  $overlay.on("click", function() {
    closeAllPanels()
  })

  console.log("mobile-panels.js is loaded")
})()

export default mobilePanels
