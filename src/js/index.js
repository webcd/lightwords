import '../../node_modules/normalize.css/normalize.css';
import '../../node_modules/select2/dist/css/select2.css';
import '../../node_modules/jarallax/dist/jarallax.css';

import "../scss/main.scss";
// import "jquery";

import configure from "./lib/configure";
import toggler from "./lib/toggler";
import dropdownMenu from "./lib/dropdown-menu";
import mobilePanels from "./lib/mobile-panels";
import scroller from "./lib/scroller";
import ripple from "./lib/ripple";
import pageTransitions from "./lib/page-transitions";
import search from "./lib/search";
import select from "./lib/select2";
import onScroll from "./lib/on-scroll";
import imageWall from "./lib/image-wall";
import parallaxHero from "./lib/parallax-hero";
import modal from "./lib/modal";

// import { jarallax, jarallaxElement, jarallaxVideo } from "jarallax";

import main from "./main";

configure();
toggler();
dropdownMenu();
mobilePanels();
scroller();
ripple();
pageTransitions();
search();
select();
onScroll();
imageWall();
parallaxHero();
modal();

// jarallax(document.querySelectorAll(".jarallax"), {
//   // TODO
//   speed: 0.2
// });

main();

// SVG sprites
// See: https://community.wia.io/d/6-generating-an-svg-sprite-sheet-with-webpack
function requireAll(r) {
  r.keys().forEach(r);
}

requireAll(require.context('../img/sprites/', true, /\.svg$/));
