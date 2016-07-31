(function ($) {
  console.log("main.js in action 😀");

  $(function() {

    // TOGGLE HELPER

    // TOGGLE HELPER

    var $togglers = document.querySelectorAll('[data-toggle]');

    Array.prototype.forEach.call($togglers, function($toggler) {

      var $targets = document.querySelectorAll($toggler.getAttribute('data-toggle'));
      var classname = $toggler.getAttribute('data-toggle-classname'); // TODO : name for data-attributes too

      Array.prototype.forEach.call($targets, function($target) {

        $toggler.addEventListener('click', function() {

          toggleStuff($target, classname);

        });
      });

      var toggleStuff = function ($target, classname) {
      //console.log($targets);

        if ($target.classList.contains(classname)) {
            $target.classList.remove(classname);

          } else {
            $target.classList.add(classname);
          }
      };
    });


    // PARALLAX JS
    // See: http://pixelcog.github.io/parallax.js/

    var $hero = $('.parallax-hero .hero');
    var $heroImg = $('.parallax-hero .hero > img');

    $heroImg.css({display: "none"});
    $hero.css({height: "56.25vw"});

    $hero.parallax(
      {
        imageSrc: $heroImg.attr("src"),
        positionY: 'top',
        positionX: 'center',
        speed: 0.5,
        androidFix: true
      }
    );

    // SEARCH HELPERS

    var $search = $(".searchform");
    var $searchInput = $(".searchform input[type='text']");
    var $searchSubmit = $(".searchform input[type='submit']");

    function setSearchSubmit(l) {
      if (l > 2) {
        $searchSubmit.removeAttr("disabled");
      } else {
        $searchSubmit.attr("disabled", "disabled");
      }
    }

    function checkSearchValue(e) {
      setSearchSubmit($(this).val().length)
    }

    setSearchSubmit($searchInput.val().length);

    $searchInput.on("keyup", checkSearchValue);
    // checkSearchValue();

  });

}(jQuery))
