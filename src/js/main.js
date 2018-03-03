;(function($) {
  console.log('main.js in action 😀')

  // CONFIGURATION

  if (!window[CONFIG.namespace]) {
    // Create the app main object
    window[CONFIG.namespace] = {}
    // Attach the configuration to it
    Lightwords.CONFIG = CONFIG
  } else {
    console.error('OUCH! window.' + CONFIG.namespace + ' already exists!')
  }

  // console.log('Lightwords.CONFIG:');
  // console.log(Lightwords.CONFIG);

  // DOM IS READY!

  $(function() {
    // CONFIGURATION BODY TAG CLASSES

    var $body = $('body')

    // Debug classes

    if (Lightwords.CONFIG.debug) {
      $body.addClass('debug')

      if (Lightwords.CONFIG.debuggers) {
        Lightwords.CONFIG.debuggers.forEach(function(debug) {
          $body.addClass('debug--' + debug)
        })
      }
    }

    if (Lightwords.CONFIG.search) {
      $body.addClass('search')
    }
    if (Lightwords.CONFIG.stickyHeader) {
      $body.addClass('sticky-header')
    }
    if (Lightwords.CONFIG.parallaxHero) {
      $body.addClass('parallax-hero')
    }

    // TOGGLE HELPER

    var $togglers = document.querySelectorAll('[data-toggle]')

    Array.prototype.forEach.call($togglers, function($toggler) {
      var $targets = document.querySelectorAll(
        $toggler.getAttribute('data-toggle')
      )
      var classname = $toggler.getAttribute('data-toggle-classname') // TODO : name for data-attributes too

      Array.prototype.forEach.call($targets, function($target) {
        $toggler.addEventListener('click', function() {
          toggleStuff(this, $target, classname)
        })
      })

      var toggleStuff = function($el, $target, classname) {
        var activeClassname = 'active'
        if ($el.classList.contains(activeClassname)) {
          $el.classList.remove(activeClassname)
        } else {
          $el.classList.add(activeClassname)
        }

        if ($target.classList.contains(classname)) {
          $target.classList.remove(classname)
        } else {
          $target.classList.add(classname)
        }
      }
    })

    // PARALLAX JS
    // See: http://pixelcog.github.io/parallax.js/

    var $hero = $('.parallax-hero .hero')
    var $heroImg = $('.parallax-hero .hero > img')

    $heroImg.css({ display: 'none' })
    $hero.css({ height: '56.25vw' })

    $hero.parallax({
      imageSrc: $heroImg.attr('src'),
      positionY: 'top',
      positionX: 'center',
      speed: 0.5,
      androidFix: true
    })

    // SEARCH HELPERS

    var $search = $('.searchform')
    var $searchInput = $(".searchform input[type='text']")
    var $searchSubmit = $(".searchform input[type='submit']")

    function setSearchSubmit(l) {
      if (l > 2) {
        $searchSubmit.removeAttr('disabled')
      } else {
        $searchSubmit.attr('disabled', 'disabled')
      }
    }

    function checkSearchValue(e) {
      setSearchSubmit($(this).val().length)
    }

    setSearchSubmit($searchInput.val().length)

    $searchInput.on('keyup', checkSearchValue)
    // checkSearchValue();

    // RIPPLE EFFECT

    if (Lightwords.CONFIG.rippleEffect) {
      $(Lightwords.CONFIG.rippleSelector).addClass('ripple')

      $('.ripple').click(function(e) {
        var rippler = $(this)

        // create .ink element if it doesn't exist
        if (rippler.find('.ink').length == 0) {
          rippler.append("<span class='ink'></span>")
        }

        var ink = rippler.find('.ink')

        // prevent quick double clicks
        ink.removeClass('animate')

        // set .ink diametr
        if (!ink.height() && !ink.width()) {
          var d = Math.max(rippler.outerWidth(), rippler.outerHeight())
          ink.css({ height: d, width: d })
        }

        // get click coordinates
        var x = e.pageX - rippler.offset().left - ink.width() / 2
        var y = e.pageY - rippler.offset().top - ink.height() / 2

        // set .ink position and add class .animate
        ink
          .css({
            top: y + 'px',
            left: x + 'px'
          })
          .addClass('animate')
      })
    }
  })
})(jQuery)
