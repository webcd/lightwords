///////////////////////////////////////////////////////////////////////////////
// MAIN CONFIGURATION FILE

console.log('Loading configuration file...')

window.CONFIG = {
  namespace: 'Lightwords',

  debug: true,
  debuggers: ['breakpoints'],

  search: true,
  breadcrumbs: true,
  breadcrumbsInContent: true,

  stickyHeader: true,
  compressHeader: true,
  transparentHeader: false,

  rippleEffect: true,
  rippleSelector: '.btn, .hero__scroll-down'
}

console.log(CONFIG)
