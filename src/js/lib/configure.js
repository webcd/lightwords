;(function($) {
  // CONFIGURATION

  if (!window[CONFIG.namespace]) {
    // Create the app main object
    window[CONFIG.namespace] = {}
    // Attach the configuration to it
    Lightwords.CONFIG = CONFIG
  } else {
    console.error('OUCH! window.' + CONFIG.namespace + ' already exists!')
  }

  // DOM IS READY!

  $(function() {
    // CONFIGURATION BODY TAG CLASSES

    var $body = $('body')
    var bodyClasses = []

    // Debug classes

    if (Lightwords.CONFIG.debug) {
      $body.addClass('debug')
      bodyClasses.push('debug')

      if (Lightwords.CONFIG.debuggers) {
        Lightwords.CONFIG.debuggers.forEach(function(debug) {
          $body.addClass('debug--' + debug)
          bodyClasses.push('debug--' + debug)
        })
      }
    }

    // Has feature

    if (!Lightwords.CONFIG.search) {
      $body.addClass('has-no-search')
      bodyClasses.push('has-no-search')
    }
    if (!Lightwords.CONFIG.breadcrumbs) {
      $body.addClass('has-no-breadcrumbs')
      bodyClasses.push('has-no-breadcrumbs')
    }
    if (Lightwords.CONFIG.stickyHeader) {
      $body.addClass('sticky-header')
      bodyClasses.push('sticky-header')
    }
    if (Lightwords.CONFIG.parallaxHero) {
      $body.addClass('parallax-hero')
      bodyClasses.push('parallax-hero')
    }

    console.log('Configuring body classes', bodyClasses)
  })
})(jQuery)
