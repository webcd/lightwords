;(function($) {

  $(function() {

    // DOM IS READY!

    // Get the JSON configuration from markup
    var configJSON = JSON.parse($("body").data("config"));

    window.Lightwords = {};
    window.Lightwords.CONFIG = configJSON;

    console.log("configure.js is loaded");
    console.log('config.json', configJSON)
  })

})(jQuery);
