import SmartPhoto from "smartphoto"

// LIGHTBOX

const lightbox = (() => {
  const selector = ".lightbox, .wall .gallery a"

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
