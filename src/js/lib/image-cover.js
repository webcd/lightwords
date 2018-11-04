// IMAGE COVER
// Transform a child img into a background-image,
// with background-size: cover; applied to it.

const imageCover = (() => {
  const setImagesSize = $items => {
    for (let $item of $items) {
      const $itemImg = $item.querySelector("img[src]")

      if ($itemImg) {
        $itemImg.addEventListener("load", function() {
          // this.style.transform = "translateX(100000rem)"
          this.style.opacity = "0"

          const $parent = this.parentNode
          const url = this.getAttribute("src")

          $parent.style.backgroundImage = `url("${url}")`
          $parent.style.backgroundSize = "cover"
          $parent.style.backgroundRepeat = "no-repeat"
          $parent.style.backgroundPosition = "50% 50%"
          $parent.style.display = "block"

          console.warn("image-cover.js: replaced", this)
        })
      }
    }
  }

  const selector = ".image-cover, .wall a"
  const $items = document.querySelectorAll(selector)

  if ($items.length) {
    setImagesSize($items)
  }

  console.log("image-cover.js is loaded")
})()

export default imageCover
