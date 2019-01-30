import $ from "jquery"

// SEARCH HELPERS

const search = ((minLength = 3) => {
  if (Lightwords.CONFIG.search) {
    // const $search = $('.searchform')
    const $searchInput = $(".searchform input[type='text']")
    const $searchSubmit = $(".searchform [type='submit']")

    function setSearchSubmit(l) {
      if (l >= minLength) {
        $searchSubmit.removeAttr("disabled")
      } else {
        $searchSubmit.attr("disabled", "disabled")
      }
    }

    function checkSearchValue(e) {
      setSearchSubmit($(this).val().length)
    }

    if ($searchInput.val()) {
      setSearchSubmit($searchInput.val().length)
    }

    $searchInput.on("keyup", checkSearchValue)
    // checkSearchValue();

    console.log("search.js is loaded")
  }
})()

export default search
