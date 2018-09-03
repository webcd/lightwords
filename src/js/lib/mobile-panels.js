;(function($) {
  // DOM IS READY!

  
  $(function() {
    var $body = $('body')
    var $togglers = $('[data-panel-toggle]')
    var $overlay = $('#overlay-panels')
    
    var panelNames = []
    $togglers.each(function () {
      panelNames.push($(this).attr('data-panel-target'))
    })
    
    function closeAllPanels() {
      $togglers.removeClass('is-toggled')
      $body.removeClass('panel-expanded')
     
      for (var i = 0; i < panelNames.length; i++) {
        $body.removeClass(panelNames[i] + '-expanded')
      }
    }

    $togglers.on('click', function() {
      var $this = $(this)
      var panelName = $this.attr('data-panel-target')

      if ($this.hasClass('is-toggled')) {

        closeAllPanels()

      } else {
        $togglers.removeClass('is-toggled')
        $this.addClass('is-toggled')
        $body.addClass('panel-expanded')

        for (var i = 0; i < panelNames.length; i++) {
          $body.removeClass(panelNames[i] + '-expanded')
        }

        $body.addClass(panelName + '-expanded')
      }

      // var $panel = $('#' + panelName)
    })

    $overlay.on('click', function() {
      closeAllPanels()
    })

    console.log('mobile-panels.js is loaded')
  })
})(jQuery)
