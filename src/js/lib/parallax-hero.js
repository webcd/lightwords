import $ from "jquery"
// import { throttle } from "./debounce-throttle";

// PARALLAX HERO

const parallaxHero = (() => {
  console.log("parallax-hero.js is loaded")

  // PARALLAX HERO
  const $parallax = $("[data-parallax]")

  if ($parallax.length > 0) {
    const $parallax = document.querySelector("[data-parallax]"),
      pSpeed = parseFloat($parallax.dataset.parallax),
      pHeight = $parallax.offsetHeight,
      pTop = $parallax.offsetTop

    console.log("parallax-hero.js applied to: ", $parallax)

    // TODO: Throttling scroll event causes stuttering parallax!
    // window.addEventListener('scroll', throttle(onScroll, 1000 / 60));
    window.addEventListener("scroll", onScroll)

    function onScroll() {
      const scroll = window.scrollY
      let percent = ((scroll - pTop) / pHeight) * pSpeed

      // Constrain in [0-1] range
      percent = Math.max(0, percent)
      percent = Math.min(1, percent)

      $parallax.style.transform = "translateY(" + percent * 100 + "%)"

      // console.log('scroll', Math.round(scroll), "%", Math.round(percent * 100));
    }
  }
})()

export default parallaxHero
