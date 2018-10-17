;(function($) {

  // window.navigateTo = function(url) {
  //   setTimeout(function() {
  //     window.location.href = url;
  //   }, 500);
  // }
  
  $(function() {
    // PAGE TRANSITION

    if (Lightwords.CONFIG.pageTransitions) {

      var $pageTransitionIn = $(".page-transition-in");
      var $pageTransitionOut = $(".page-transition-out");
  
      $pageTransitionIn.removeClass("active");
  
      setTimeout(function() {
        $pageTransitionIn.remove();
        // console.warn('ON PAGE IN');
      }, 2000);
  
      function onPageOut(e) {
        var url = $(this).attr("href");

        if (! url) {
          url = $(this).attr("data-onclick-url");
        }

        // console.warn('ON PAGE OUT', url);
        e.preventDefault();
  
        $pageTransitionOut.addClass("active");
    
        setTimeout(function() {
          window.location.href = url;
        }, 1000);
      }
  
      $("a[href], [data-onclick-url]").not("a[href^='#']").click(onPageOut);

      // ONCLICK ELEMENTS
      // $("[data-onclick-url]").click(function(e) {
      //   var url = $(this).attr("data-onclick-url");
      //   navigateTo(url);
      // });

    } else {
      // Default "onclick" behavior
      $("[data-onclick-url]").click(function() {
        var url = $(this).attr("data-onclick-url");
        window.location.href = url;
      });
    }

    console.log('page-transitions.js is loaded')
  });
})(jQuery);
