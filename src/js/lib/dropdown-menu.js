;(function($) {
  // DOM IS READY!

  $(function() {

    if (! Lightwords.CONFIG.expandDropdownsOnHover) {

      // Click / touch to open submenus
      var $togglers = $('[data-dropdown]')

      $togglers.on('click', function() {

        var $dropdown = $(this).parent('.menu-item--dropdown')
        $dropdown.toggleClass('active')
      })

    } else {

      // Mouse hover auto-opens submenus
      var $dropdowns = $('.menu-item--dropdown')
  
      function onMouseChange(e) {
        var $this = $(this)
        $this.toggleClass('active')
      }

      $dropdowns.on('mouseenter', onMouseChange)
      $dropdowns.on('mouseleave', onMouseChange)

      console.log('Dropdowns will auto-expand on mouse hover')
    }

    console.log('dropdown-menu.js is loaded')
  })
})(jQuery)
