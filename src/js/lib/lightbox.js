import SmartPhoto from "smartphoto"

// LIGHTBOX

const lightbox = (() => {

  // Prepare meta datas
  const setImagesDatas = $items => {
    for (let $item of $items) {
      const $itemImg = $item.querySelector("img[src]")

      if ($itemImg) {
        // Auto-set caption from img's alt attribute
        const alt = $itemImg.getAttribute("alt")

        if (alt && alt !== "") {
          $item.setAttribute("data-caption", alt)
        }

        // TODO: thumbnails broken with lazyload!
      }
    }
  }

  const selector = ".lightbox, .wall .gallery a, .woocommerce-product-gallery__image > a"
  const $items = document.querySelectorAll(selector)

  if ($items.length) {
    setImagesDatas($items)
  }

  // SmartPhoto
  // See: https://appleple.github.io/SmartPhoto/doc.html

  const mySmartPhoto = new SmartPhoto(selector, {
    // resizeStyle: 'fill'
  })

  // const updateCounter = () => {

  //   window.setTimeout(() => {
  //     const $count = document.querySelector(".smartphoto-count")
  //     const countText = $count.textContent
  //     const countCurrent = countText.split('/')[0]
  //     const countTotal = countText.split('/')[1]
  //     console.log("count", countCurrent, countTotal)

  //     while ($count.firstChild) {
  //       $count.removeChild($count.firstChild)
  //     }

  //     $count.innerHTML = `<span class="counter-current">${countCurrent}</span>/<span class="counter-total">${countTotal}</span>`
  //   }, 100)
  // }

  // mySmartPhoto.on("open", updateCounter)

  // mySmartPhoto.on("change", updateCounter)
})()

export default lightbox
