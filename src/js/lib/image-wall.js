import $ from "jquery"
import { debounce } from "./debounce-throttle"

// IMAGE WALL
// Not used anymore, kept for reference

const imageWall = (() => {
  const setImageSize = $item => {
    const itemWidth = $item.getBoundingClientRect().width
    const itemHeight = $item.getBoundingClientRect().height
    const itemRatio = itemWidth / itemHeight

    const $itemImg = $item.firstChild // Risky!
    const itemImgWidth = $itemImg.getBoundingClientRect().width
    const itemImgHeight = $itemImg.getBoundingClientRect().height
    const itemImgRatio = itemImgWidth / itemImgHeight

    if (itemRatio < itemImgRatio) {
      $itemImg.style.width =
        Math.round((itemHeight / itemImgHeight) * itemImgWidth) + "px"
      $itemImg.style.height = Math.round(itemHeight) + "px"
    } else {
      $itemImg.style.width = Math.round(itemWidth) + "px"
      $itemImg.style.height =
        Math.round((itemWidth / itemImgWidth) * itemImgHeight) + "px"
    }
  }

  const setImagesSize = debounce(function($wallItems) {
    Array.prototype.forEach.call($wallItems, function($item) {
      setImageSize($item)
    })

    console.log("ImageWall resized")
  }, 250)

  const selector = ".wall .gallery .gallery-item .gallery-icon a"
  const $wallItems = document.querySelectorAll(selector)

  if ($wallItems.length) {
    // TODO: This break images resizing with lazyload!!!
    // setImagesSize($wallItems)

    window.addEventListener("resize", function() {
      setImagesSize($wallItems)
    })

    // Lazyload
    const $items = $(selector)
    $items.on("lazyload", function(e, $el) {
      console.log("LAZY", $el[0].parentNode)
      setImageSize($el[0].parentNode)
    })
  }

  console.log("image-wall.js is loaded")
})()

export default imageWall
