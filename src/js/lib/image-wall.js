;(function($) {

  function setImageSize($item) {

    var itemWidth = $item.getBoundingClientRect().width
    var itemHeight = $item.getBoundingClientRect().height
    var itemRatio = itemWidth / itemHeight

    var $itemImg = $item.firstChild // Risky!
    var itemImgWidth = $itemImg.getBoundingClientRect().width
    var itemImgHeight = $itemImg.getBoundingClientRect().height
    var itemImgRatio = itemImgWidth / itemImgHeight

    if (itemRatio < itemImgRatio) {
      $itemImg.style.width = Math.round(itemHeight / itemImgHeight * itemImgWidth) + 'px'
      $itemImg.style.height = Math.round(itemHeight) + 'px'

    } else {
      $itemImg.style.width = Math.round(itemWidth) + 'px'
      $itemImg.style.height = Math.round(itemWidth / itemImgWidth * itemImgHeight) + 'px'
    }
  }

  function setImagesSize($wallItems) {

    Array.prototype.forEach.call($wallItems, function($item) {
      setImageSize($item)
    })
  }

  $(function() {
    var selector = '.wall .gallery .gallery-item .gallery-icon a'
    var $wallItems = document.querySelectorAll(selector)

    // TODO: This break images resizing with lazyload!!!
    // setImagesSize($wallItems)

    window.addEventListener("resize", function(){
      setImagesSize($wallItems)
    })

    // Lazyload
    $items = $(selector)
    $items.on('lazyload', function (e, $el) {
      console.log('LAZY', $el[0].parentNode)
      setImageSize($el[0].parentNode)
    })

    console.log('image-wall.js is loaded')
  })
})(jQuery)
