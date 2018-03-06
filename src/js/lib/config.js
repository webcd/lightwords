///////////////////////////////////////////////////////////////////////////////
// MAIN CONFIGURATION FILE

console.log('Loading configuration file...')

window.CONFIG = {
  namespace: 'Lightwords',

  debug: true,
  debuggers: ['breakpoints'],

  search: true,
  breadcrumbs: true,
  stickyHeader: true,

  parallaxHero: true,
  rippleEffect: true,
  rippleSelector: '.btn'
}

console.log(CONFIG)
