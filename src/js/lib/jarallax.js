import { jarallax /*, jarallaxElement, jarallaxVideo*/ } from "jarallax"

const jarallaxModule = (() => {
  // Image parallax
  const jElements = document.querySelectorAll(".jarallax")
  for (let el of jElements) {
    jarallax(el, {
      speed: el.getAttribute("data-speed") || 0.5
    })
  }

  // // Video parallax
  // const jElementsVideo = document.querySelectorAll("[data-jarallax-video]")
  // for (let el of jElementsVideo) {
  //   jarallaxVideo(el, {
  //     speed: el.getAttribute('data-speed') || 0.5,
  //     videoSrc: el.getAttribute('data-jarallax-video')
  //   })
  // }

  // // Element parallax
  // jarallaxElement(document.querySelectorAll('[data-jarallax-element]'), {
  //   speed: 0.5
  // })
})()

export default jarallaxModule
