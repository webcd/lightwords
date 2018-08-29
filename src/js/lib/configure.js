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

      if (Lightwords.CONFIG.debuggers) {
        Lightwords.CONFIG.debuggers.forEach(function(debug) {
          bodyClasses.push('debug--' + debug)
        })
      }
    }

    // Has feature

    if (!Lightwords.CONFIG.search) {
      bodyClasses.push('has-no-search')
    }
    if (!Lightwords.CONFIG.breadcrumbs) {
      bodyClasses.push('has-no-breadcrumbs')
    } else {
      if (Lightwords.CONFIG.breadcrumbsInContent) {
        bodyClasses.push('has-breadcrumbs-in-content')
      } else {
        bodyClasses.push('has-breadcrumbs-in-header')
      }
    }
    if (Lightwords.CONFIG.stickyHeader) {
      bodyClasses.push('sticky-header')
      if (Lightwords.CONFIG.compressHeader) {
        bodyClasses.push('compressible-header')
        if (Lightwords.CONFIG.transparentHeader) {
          bodyClasses.push('transparent-header')
        }
      }
    }

    if (Lightwords.CONFIG.woocommerce) {
      bodyClasses.push('has-woocommerce-support')
    }

    console.log('Configuring body classes', bodyClasses)

    for (var i = 0; i < bodyClasses.length; i++) {
      $body.addClass(bodyClasses[i])
    }
  })
})(jQuery)
