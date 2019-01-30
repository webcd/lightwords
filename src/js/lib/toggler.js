// TOGGLE HELPER

const toggler = (() => {
  const $togglers = document.querySelectorAll("[data-toggle]")

  Array.prototype.forEach.call($togglers, function($toggler) {
    const targetsSelector = $toggler.getAttribute("data-toggle")
    // Target self by default
    let $targets = [$toggler]
    // Otherwise use provided selector
    if (targetsSelector) {
      $targets = document.querySelectorAll(targetsSelector)
    }

    const classname = $toggler.getAttribute("data-toggle-classname")

    Array.prototype.forEach.call($targets, function($target) {
      $toggler.addEventListener("click", function() {
        toggleStuff(this, $target, classname)
      })
    })

    const toggleStuff = function($el, $target, classname) {
      const activeClassname = "active"
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

  console.log("toggler.js is loaded")
})()

export default toggler
