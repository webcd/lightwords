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

  expandDropdownsOnHover: true,

  stickyHeader: true,
  compressHeader: true,
  compressHeaderLogoSwap: true,
  transparentHeader: false,

  hasScrollTop: true,

  fixedWidthContainers: false,
  fixedWidthHeader: true,
  fixedWidthFooter: true,
  fixedWidthContent: true,

  woocommerce: true,

  rippleEffect: true,
  rippleSelector: '.btn, .scroll-btn'
}

console.log(CONFIG)
