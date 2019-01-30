import $ from "jquery"

// DROPDOWN MENU

const dropdownMenu = (() => {
  if (!Lightwords.CONFIG.expandDropdownsOnHover) {
    // Click / touch to open submenus
    const $togglers = $("[data-dropdown]")

    $togglers.on("click", function() {
      const $dropdown = $(this).parent(".menu-item--dropdown")
      $dropdown.toggleClass("active")
    })
  } else {
    // Mouse hover auto-opens submenus
    const $dropdowns = $(".menu-item--dropdown")

    function onMouseChange(e) {
      const $this = $(this)
      $this.toggleClass("active")
    }

    $dropdowns.on("mouseenter", onMouseChange)
    $dropdowns.on("mouseleave", onMouseChange)

    console.log("Dropdowns will auto-expand on mouse hover")
  }

  console.log("dropdown-menu.js is loaded")
})()

export default dropdownMenu
