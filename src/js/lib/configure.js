import $ from "jquery"

// CONFIGURE

const configure = (() => {
  // Get the JSON configuration from markup
  const configJSON = JSON.parse(JSON.stringify($("body").data("config")))

  window.Lightwords = {}
  window.Lightwords.CONFIG = configJSON

  console.log("configure.js is loaded")
  console.log("config.json", configJSON)
})()

export default configure
