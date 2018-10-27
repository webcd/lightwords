;(function($) {
  // DOM IS READY!

  $(function() {
    // TOGGLE HELPER

    var $togglers = document.querySelectorAll('[data-toggle]')

    Array.prototype.forEach.call($togglers, function($toggler) {
      var targetsSelector = $toggler.getAttribute('data-toggle')
      // Target self by default
      var $targets = [$toggler]
      // Otherwise use provided selector
      if (targetsSelector) {
        $targets = document.querySelectorAll(targetsSelector)
      }

      var classname = $toggler.getAttribute('data-toggle-classname')

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
        
        if (classname) {
          if ($target.classList.contains(classname)) {
            $target.classList.remove(classname)
          } else {
            $target.classList.add(classname)
          }
        }
      }
    })

    console.log('toggler.js is loaded')
  })
})(jQuery)
