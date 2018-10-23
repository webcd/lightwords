;(function($) {
  // DOM IS READY!

  $(function() {

    if (! Lightwords.CONFIG.expandDropdownsOnHover) {

      // Click / touch to open submenus
      var $togglers = $('[data-dropdown]')

      $togglers.on('click', function() {
        $(this).toggleClass('active')

        var $dropdownMenu = $(this).next('.dropdown-menu')
        $dropdownMenu.toggleClass('active')

        var $dropdown = $(this).parent('.menu-item--dropdown')
        $dropdown.toggleClass('active')
      })

    } else {

      // Mouse hover auto-opens submenus
      var $dropdowns = $('.menu-item--dropdown')
  
      $dropdowns.on('mouseenter', function() {
        var $this = $(this)
        $this.addClass('active')
        var $dropdownToggle = $this.children('.dropdown-toggle')
        $dropdownToggle.addClass('active')
        var $dropdownMenu = $this.children('.dropdown-menu')
        $dropdownMenu.addClass('active')
      })

      $dropdowns.on('mouseleave', function() {
        var $this = $(this)
        $this.removeClass('active')
        var $dropdownToggle = $this.children('.dropdown-toggle')
        $dropdownToggle.removeClass('active')
        var $dropdownMenu = $this.children('.dropdown-menu')
        $dropdownMenu.removeClass('active')
      })

      console.log('Dropdowns will auto-expand on mouse hover')
    }

    console.log('dropdown-menu.js is loaded')
  })
})(jQuery)
