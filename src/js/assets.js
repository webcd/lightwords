// ASSETS HELPER

import "../../node_modules/normalize.css/normalize.css"
import "../../node_modules/select2/dist/css/select2.css"
import "../../node_modules/jarallax/dist/jarallax.css"

import "../scss/main.scss"
// import "jquery";

// SVG sprites
// See: https://community.wia.io/d/6-generating-an-svg-sprite-sheet-with-webpack
function requireAll(r) {
  r.keys().forEach(r)
}

requireAll(require.context("../img/sprites/", true, /\.svg$/))

const assets = () => {}

export default assets
