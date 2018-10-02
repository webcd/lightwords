;(function($) {

  function setImagesSize($wallItems) {

    Array.prototype.forEach.call($wallItems, function($item) {
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
    })
  }

  $(function() {
    var $wallItems = document.querySelectorAll('.wall .gallery .gallery-item .gallery-icon a')

    setImagesSize($wallItems)

    window.addEventListener("resize", function(){
      setImagesSize($wallItems)
    });

    console.log('image-wall.js is loaded')
  })
})(jQuery)
