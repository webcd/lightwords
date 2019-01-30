import $ from "jquery"
import { debounce } from "./debounce-throttle"
import select2 from "select2"

// SELECT2

const select = (() => {
  const initSelect2 = debounce(function($selects) {
    // See: https://select2.org/configuration
    $selects.select2({
      minimumResultsForSearch: Infinity
    })

    console.log("Select2 resized")
  }, 250)

  const $selects = $("select")

  if ($selects.length) {
    initSelect2($selects)

    window.addEventListener("resize", function() {
      initSelect2($selects)
    })
  }

  console.log("select2.js is loaded")
})()

export default select
