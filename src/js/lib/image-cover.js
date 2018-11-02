// IMAGE COVER
// Transform a child img into a background-image,
// with background-size: cover; applied to it.

const imageCover = (() => {
  const setImagesSize = $items => {
    for (let $item of $items) {
      const $itemImg = $item.querySelector("img[src]")

      if ($itemImg) {
        $itemImg.addEventListener("load", function() {
          this.style.transform = "translateX(100000rem)"

          const URL = this.getAttribute("src")

          this.parentNode.style.backgroundImage = `url("${URL}")`
          this.parentNode.style.backgroundSize = "cover"
          this.parentNode.style.backgroundRepeat = "no-repeat"
          this.parentNode.style.backgroundPosition = "50% 50%"
        })
      }
    }
  }

  const selector = ".image-cover, .wall a"
  const $items = document.querySelectorAll(selector)

  if ($items.length) {
    // console.warn("IMAGE COVERS", $items)
    setImagesSize($items)
  }
})()

export default imageCover
