;(function($) {

  
  $(function() {
    // PAGE TRANSITION

    if (Lightwords.CONFIG.pageTransitions) {

      var $pageTransitionIn = $(".page-transition-in");
      var $pageTransitionOut = $(".page-transition-out");
  
      $pageTransitionIn.removeClass("active");
  
      setTimeout(function() {
        $pageTransitionIn.remove();
      }, 2000);
  
      function onPageOut(e) {
        e.preventDefault();
  
        $pageTransitionOut.addClass("active");
  
        var url = $(this).attr("href");
  
        setTimeout(function() {
          window.location.href = url;
        }, 1000);
      }
  
      $("a").click(onPageOut);
    }

    console.log('page-transitions.js is loaded')
  });
})(jQuery);
