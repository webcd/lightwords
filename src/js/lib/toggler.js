;(function($) {
  // DOM IS READY!

  $(function() {
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

    console.log('toggler.js is loaded')
  })
})(jQuery)
