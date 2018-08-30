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

  fixedWidthContainers: false,
  fixedWidthHeader: true,
  fixedWidthFooter: true,
  fixedWidthContent: true,

  woocommerce: true,

  rippleEffect: true,
  rippleSelector: '.btn, .hero__scroll-down'
}

console.log(CONFIG)
