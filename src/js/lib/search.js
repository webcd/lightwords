;(function($) {
  
  // SEARCH HELPERS

  $(function() {
    
    if (Lightwords.CONFIG.search) {
  
      // var $search = $('.searchform')
      var $searchInput = $(".searchform input[type='text']")
      var $searchSubmit = $(".searchform input[type='submit']")
  
      function setSearchSubmit(l) {
        if (l > 2) {
          $searchSubmit.removeAttr('disabled')
        } else {
          $searchSubmit.attr('disabled', 'disabled')
        }
      }
  
      function checkSearchValue(e) {
        setSearchSubmit($(this).val().length)
      }
  
      if ($searchInput.val()) {
        setSearchSubmit($searchInput.val().length)
      }
  
      $searchInput.on('keyup', checkSearchValue)
      // checkSearchValue();
  
      console.log('search.js is loaded')
    }
  })
  
})(jQuery)
