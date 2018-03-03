;(function($) {
  // DOM IS READY!

  $(function() {
    // PARALLAX JS
    // See: http://pixelcog.github.io/parallax.js/

    var $hero = $('.parallax-hero .hero')
    var $heroImg = $('.parallax-hero .hero > img')

    $heroImg.css({ display: 'none' })
    $hero.css({ height: '56.25vw' })

    $hero.parallax({
      imageSrc: $heroImg.attr('src'),
      positionY: 'top',
      positionX: 'center',
      speed: 0.5,
      androidFix: true
    })
    console.log('parallax.js is loaded')
  })
})(jQuery)
