webpackJsonp([0],[
/* 0 */,
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(2);
module.exports = __webpack_require__(8);


/***/ }),
/* 2 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(3);
__webpack_require__(4);
__webpack_require__(5);
__webpack_require__(6);
__webpack_require__(7);

/***/ }),
/* 3 */
/***/ (function(module, exports) {

///////////////////////////////////////////////////////////////////////////////
// MAIN CONFIGURATION FILE

console.log('Loading configuration file...');

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
};

console.log(CONFIG);

/***/ }),
/* 4 */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {;(function ($) {
  // CONFIGURATION

  if (!window[CONFIG.namespace]) {
    // Create the app main object
    window[CONFIG.namespace] = {};
    // Attach the configuration to it
    Lightwords.CONFIG = CONFIG;
  } else {
    console.error('OUCH! window.' + CONFIG.namespace + ' already exists!');
  }

  // DOM IS READY!

  $(function () {
    // CONFIGURATION BODY TAG CLASSES

    var $body = $('body');
    var bodyClasses = [];

    // Debug classes

    if (Lightwords.CONFIG.debug) {
      $body.addClass('debug');
      bodyClasses.push('debug');

      if (Lightwords.CONFIG.debuggers) {
        Lightwords.CONFIG.debuggers.forEach(function (debug) {
          $body.addClass('debug--' + debug);
          bodyClasses.push('debug--' + debug);
        });
      }
    }

    // Has feature

    if (!Lightwords.CONFIG.search) {
      $body.addClass('has-no-search');
      bodyClasses.push('has-no-search');
    }
    if (!Lightwords.CONFIG.breadcrumbs) {
      $body.addClass('has-no-breadcrumbs');
      bodyClasses.push('has-no-breadcrumbs');
    }
    if (Lightwords.CONFIG.stickyHeader) {
      $body.addClass('sticky-header');
      bodyClasses.push('sticky-header');
    }
    if (Lightwords.CONFIG.parallaxHero) {
      $body.addClass('parallax-hero');
      bodyClasses.push('parallax-hero');
    }

    console.log('Configuring body classes', bodyClasses);
  });
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(0)))

/***/ }),
/* 5 */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {;(function ($) {
  // DOM IS READY!

  $(function () {
    // TOGGLE HELPER

    var $togglers = document.querySelectorAll('[data-toggle]');

    Array.prototype.forEach.call($togglers, function ($toggler) {
      var $targets = document.querySelectorAll($toggler.getAttribute('data-toggle'));
      var classname = $toggler.getAttribute('data-toggle-classname'); // TODO : name for data-attributes too

      Array.prototype.forEach.call($targets, function ($target) {
        $toggler.addEventListener('click', function () {
          toggleStuff(this, $target, classname);
        });
      });

      var toggleStuff = function toggleStuff($el, $target, classname) {
        var activeClassname = 'active';
        if ($el.classList.contains(activeClassname)) {
          $el.classList.remove(activeClassname);
        } else {
          $el.classList.add(activeClassname);
        }

        if ($target.classList.contains(classname)) {
          $target.classList.remove(classname);
        } else {
          $target.classList.add(classname);
        }
      };
    });

    console.log('toggler.js is loaded');
  });
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(0)))

/***/ }),
/* 6 */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {;(function ($) {
  // DOM IS READY!

  $(function () {
    // RIPPLE EFFECT

    if (Lightwords.CONFIG.rippleEffect) {
      $(Lightwords.CONFIG.rippleSelector).addClass('ripple');

      $('.ripple').click(function (e) {
        var rippler = $(this);

        // create .ink element if it doesn't exist
        if (rippler.find('.ink').length == 0) {
          rippler.append("<span class='ink'></span>");
        }

        var ink = rippler.find('.ink');

        // prevent quick double clicks
        ink.removeClass('animate');

        // set .ink diametr
        if (!ink.height() && !ink.width()) {
          var d = Math.max(rippler.outerWidth(), rippler.outerHeight());
          ink.css({ height: d, width: d });
        }

        // get click coordinates
        var x = e.pageX - rippler.offset().left - ink.width() / 2;
        var y = e.pageY - rippler.offset().top - ink.height() / 2;

        // set .ink position and add class .animate
        ink.css({
          top: y + 'px',
          left: x + 'px'
        }).addClass('animate');
      });
    }
    console.log('ripple.js is loaded');
  });
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(0)))

/***/ }),
/* 7 */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {;(function ($) {
  // DOM IS READY!

  $(function () {
    // SEARCH HELPERS

    var $search = $('.searchform');
    var $searchInput = $(".searchform input[type='text']");
    var $searchSubmit = $(".searchform input[type='submit']");

    function setSearchSubmit(l) {
      if (l > 2) {
        $searchSubmit.removeAttr('disabled');
      } else {
        $searchSubmit.attr('disabled', 'disabled');
      }
    }

    function checkSearchValue(e) {
      setSearchSubmit($(this).val().length);
    }

    setSearchSubmit($searchInput.val().length);

    $searchInput.on('keyup', checkSearchValue);
    // checkSearchValue();

    console.log('search.js is loaded');
  });
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(0)))

/***/ }),
/* 8 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
],[1]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9zcmMvanMvbWFpbi5qcyIsIndlYnBhY2s6Ly8vLi9zcmMvanMvbGliL2NvbmZpZy5qcyIsIndlYnBhY2s6Ly8vLi9zcmMvanMvbGliL2NvbmZpZ3VyZS5qcyIsIndlYnBhY2s6Ly8vLi9zcmMvanMvbGliL3RvZ2dsZXIuanMiLCJ3ZWJwYWNrOi8vLy4vc3JjL2pzL2xpYi9yaXBwbGUuanMiLCJ3ZWJwYWNrOi8vLy4vc3JjL2pzL2xpYi9zZWFyY2guanMiLCJ3ZWJwYWNrOi8vLy4vc3JjL3Njc3MvbWFpbi5zY3NzIl0sIm5hbWVzIjpbInJlcXVpcmUiLCJjb25zb2xlIiwibG9nIiwid2luZG93IiwiQ09ORklHIiwibmFtZXNwYWNlIiwiZGVidWciLCJkZWJ1Z2dlcnMiLCJzZWFyY2giLCJicmVhZGNydW1icyIsInN0aWNreUhlYWRlciIsInBhcmFsbGF4SGVybyIsInJpcHBsZUVmZmVjdCIsInJpcHBsZVNlbGVjdG9yIiwiJCIsIkxpZ2h0d29yZHMiLCJlcnJvciIsIiRib2R5IiwiYm9keUNsYXNzZXMiLCJhZGRDbGFzcyIsInB1c2giLCJmb3JFYWNoIiwialF1ZXJ5IiwiJHRvZ2dsZXJzIiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yQWxsIiwiQXJyYXkiLCJwcm90b3R5cGUiLCJjYWxsIiwiJHRvZ2dsZXIiLCIkdGFyZ2V0cyIsImdldEF0dHJpYnV0ZSIsImNsYXNzbmFtZSIsIiR0YXJnZXQiLCJhZGRFdmVudExpc3RlbmVyIiwidG9nZ2xlU3R1ZmYiLCIkZWwiLCJhY3RpdmVDbGFzc25hbWUiLCJjbGFzc0xpc3QiLCJjb250YWlucyIsInJlbW92ZSIsImFkZCIsImNsaWNrIiwiZSIsInJpcHBsZXIiLCJmaW5kIiwibGVuZ3RoIiwiYXBwZW5kIiwiaW5rIiwicmVtb3ZlQ2xhc3MiLCJoZWlnaHQiLCJ3aWR0aCIsImQiLCJNYXRoIiwibWF4Iiwib3V0ZXJXaWR0aCIsIm91dGVySGVpZ2h0IiwiY3NzIiwieCIsInBhZ2VYIiwib2Zmc2V0IiwibGVmdCIsInkiLCJwYWdlWSIsInRvcCIsIiRzZWFyY2giLCIkc2VhcmNoSW5wdXQiLCIkc2VhcmNoU3VibWl0Iiwic2V0U2VhcmNoU3VibWl0IiwibCIsInJlbW92ZUF0dHIiLCJhdHRyIiwiY2hlY2tTZWFyY2hWYWx1ZSIsInZhbCIsIm9uIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7Ozs7O0FBQUEsbUJBQUFBLENBQVEsQ0FBUjtBQUNBLG1CQUFBQSxDQUFRLENBQVI7QUFDQSxtQkFBQUEsQ0FBUSxDQUFSO0FBQ0EsbUJBQUFBLENBQVEsQ0FBUjtBQUNBLG1CQUFBQSxDQUFRLENBQVIsRTs7Ozs7O0FDSkE7QUFDQTs7QUFFQUMsUUFBUUMsR0FBUixDQUFZLCtCQUFaOztBQUVBQyxPQUFPQyxNQUFQLEdBQWdCO0FBQ2RDLGFBQVcsWUFERzs7QUFHZEMsU0FBTyxJQUhPO0FBSWRDLGFBQVcsQ0FBQyxhQUFELENBSkc7O0FBTWRDLFVBQVEsSUFOTTtBQU9kQyxlQUFhLElBUEM7QUFRZEMsZ0JBQWMsSUFSQTs7QUFVZEMsZ0JBQWMsSUFWQTtBQVdkQyxnQkFBYyxJQVhBO0FBWWRDLGtCQUFnQjtBQVpGLENBQWhCOztBQWVBWixRQUFRQyxHQUFSLENBQVlFLE1BQVosRTs7Ozs7O0FDcEJBLCtDQUFDLENBQUMsVUFBU1UsQ0FBVCxFQUFZO0FBQ1o7O0FBRUEsTUFBSSxDQUFDWCxPQUFPQyxPQUFPQyxTQUFkLENBQUwsRUFBK0I7QUFDN0I7QUFDQUYsV0FBT0MsT0FBT0MsU0FBZCxJQUEyQixFQUEzQjtBQUNBO0FBQ0FVLGVBQVdYLE1BQVgsR0FBb0JBLE1BQXBCO0FBQ0QsR0FMRCxNQUtPO0FBQ0xILFlBQVFlLEtBQVIsQ0FBYyxrQkFBa0JaLE9BQU9DLFNBQXpCLEdBQXFDLGtCQUFuRDtBQUNEOztBQUVEOztBQUVBUyxJQUFFLFlBQVc7QUFDWDs7QUFFQSxRQUFJRyxRQUFRSCxFQUFFLE1BQUYsQ0FBWjtBQUNBLFFBQUlJLGNBQWMsRUFBbEI7O0FBRUE7O0FBRUEsUUFBSUgsV0FBV1gsTUFBWCxD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RixJQUFJLElBRE47QUFFSEQsZ0JBQU1ILElBQUk7QUFGUCxTQURQLEVBS0d2QyxRQUxILENBS1ksU0FMWjtBQU1ELE9BOUJEO0FBK0JEO0FBQ0RsQixZQUFRQyxHQUFSLENBQVkscUJBQVo7QUFDRCxHQXZDRDtBQXdDRCxDQTNDQSxFQTJDRW9CLE1BM0NGLEU7Ozs7Ozs7QUNBRCwrQ0FBQyxDQUFDLFVBQVNSLENBQVQsRUFBWTtBQUNaOztBQUVBQSxJQUFFLFlBQVc7QUFDWDs7QUFFQSxRQUFJbUQsVUFBVW5ELEVBQUUsYUFBRixDQUFkO0FBQ0EsUUFBSW9ELGVBQWVwRCxFQUFFLGdDQUFGLENBQW5CO0FBQ0EsUUFBSXFELGdCQUFnQnJELEVBQUUsa0NBQUYsQ0FBcEI7O0FBRUEsYUFBU3NELGVBQVQsQ0FBeUJDLENBQXpCLEVBQTRCO0FBQzFCLFVBQUlBLElBQUksQ0FBUixFQUFXO0FBQ1RGLHNCQUFjRyxVQUFkLENBQXlCLFVBQXpCO0FBQ0QsT0FGRCxNQUVPO0FBQ0xILHNCQUFjSSxJQUFkLENBQW1CLFVBQW5CLEVBQStCLFVBQS9CO0FBQ0Q7QUFDRjs7QUFFRCxhQUFTQyxnQkFBVCxDQUEwQjdCLENBQTFCLEVBQTZCO0FBQzNCeUIsc0JBQWdCdEQsRUFBRSxJQUFGLEVBQVEyRCxHQUFSLEdBQWMzQixNQUE5QjtBQUNEOztBQUVEc0Isb0JBQWdCRixhQUFhTyxHQUFiLEdBQW1CM0IsTUFBbkM7O0FBRUFvQixpQkFBYVEsRUFBYixDQUFnQixPQUFoQixFQUF5QkYsZ0JBQXpCO0FBQ0E7O0FBRUF2RSxZQUFRQyxHQUFSLENBQVkscUJBQVo7QUFDRCxHQXpCRDtBQTBCRCxDQTdCQSxFQTZCRW9CLE1BN0JGLEU7Ozs7Ozs7QUNBRCx5QyIsImZpbGUiOiIvbWFpbi5qcyIsInNvdXJjZXNDb250ZW50IjpbInJlcXVpcmUoJy4vbGliL2NvbmZpZycpXG5yZXF1aXJlKCcuL2xpYi9jb25maWd1cmUnKVxucmVxdWlyZSgnLi9saWIvdG9nZ2xlcicpXG5yZXF1aXJlKCcuL2xpYi9yaXBwbGUnKVxucmVxdWlyZSgnLi9saWIvc2VhcmNoJylcblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gLi9zcmMvanMvbWFpbi5qcyIsIi8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy8vLy9cbi8vIE1BSU4gQ09ORklHVVJBVElPTiBGSUxFXG5cbmNvbnNvbGUubG9nKCdMb2FkaW5nIGNvbmZpZ3VyYXRpb24gZmlsZS4uLicpXG5cbndpbmRvdy5DT05GSUcgPSB7XG4gIG5hbWVzcGFjZTogJ0xpZ2h0d29yZHMnLFxuXG4gIGRlYnVnOiB0cnVlLFxuICBkZWJ1Z2dlcnM6IFsnYnJlYWtwb2ludHMnXSxcblxuICBzZWFyY2g6IHRydWUsXG4gIGJyZWFkY3J1bWJzOiB0cnVlLFxuICBzdGlja3lIZWFkZXI6IHRydWUsXG5cbiAgcGFyYWxsYXhIZXJvOiB0cnVlLFxuICByaXBwbGVFZmZlY3Q6IHRydWUsXG4gIHJpcHBsZVNlbGVjdG9yOiAnLmJ0bidcbn1cblxuY29uc29sZS5sb2coQ09ORklHKVxuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIC4vc3JjL2pzL2xpYi9jb25maWcuanMiLCI7KGZ1bmN0aW9uKCQpIHtcbiAgLy8gQ09ORklHVVJBVElPTlxuXG4gIGlmICghd2luZG93W0NPTkZJRy5uYW1lc3BhY2VdKSB7XG4gICAgLy8gQ3JlYXRlIHRoZSBhcHAgbWFpbiBvYmplY3RcbiAgICB3aW5kb3dbQ09ORklHLm5hbWVzcGFjZV0gPSB7fVxuICAgIC8vIEF0dGFjaCB0aGUgY29uZmlndXJhdGlvbiB0byBpdFxuICAgIExpZ2h0d29yZHMuQ09ORklHID0gQ09ORklHXG4gIH0gZWxzZSB7XG4gICAgY29uc29sZS5lcnJvcignT1VDSCEgd2luZG93LicgKyBDT05GSUcubmFtZXNwYWNlICsgJyBhbHJlYWR5IGV4aXN0cyEnKVxuICB9XG5cbiAgLy8gRE9NIElTIFJFQURZIVxuXG4gICQoZnVuY3Rpb24oKSB7XG4gICAgLy8gQ09ORklHVVJBVElPTiBCT0RZIFRBRyBDTEFTU0VTXG5cbiAgICB2YXIgJGJvZHkgPSAkKCdib2R5JylcbiAgICB2YXIgYm9keUNsYXNzZXMgPSBbXVxuXG4gICAgLy8gRGVidWcgY2xhc3Nlc1xuXG4gICAgaWYgKExpZ2h0d29yZHMuQ09ORklHLmRlYnVnKSB7XG4gICAgICAkYm9keS5hZGRDbGFzcygnZGVidWcnKVxuICAgICAgYm9keUNsYXNzZXMucHVzaCgnZGVidWcnKVxuXG4gICAgICBpZiAoTGlnaHR3b3Jkcy5DT05GSUcuZGVidWdnZXJzKSB7XG4gICAgICAgIExpZ2h0d29yZHMuQ09ORklHLmRlYnVnZ2Vycy5mb3JFYWNoKGZ1bmN0aW9uKGRlYnVnKSB7XG4gICAgICAgICAgJGJvZHkuYWRkQ2xhc3MoJ2RlYnVnLS0nICsgZGVidWcpXG4gICAgICAgICAgYm9keUNsYXNzZXMucHVzaCgnZGVidWctLScgKyBkZWJ1ZylcbiAgICAgICAgfSlcbiAgICAgIH1cbiAgICB9XG5cbiAgICAvLyBIYXMgZmVhdHVyZVxuXG4gICAgaWYgKCFMaWdodHdvcmRzLkNPTkZJRy5zZWFyY2gpIHtcbiAgICAgICRib2R5LmFkZENsYXNzKCdoYXMtbm8tc2VhcmNoJylcbiAgICAgIGJvZHlDbGFzc2VzLnB1c2goJ2hhcy1uby1zZWFyY2gnKVxuICAgIH1cbiAgICBpZiAoIUxpZ2h0d29yZHMuQ09ORklHLmJyZWFkY3J1bWJzKSB7XG4gICAgICAkYm9keS5hZGRDbGFzcygnaGFzLW5vLWJyZWFkY3J1bWJzJylcbiAgICAgIGJvZHlDbGFzc2VzLnB1c2goJ2hhcy1uby1icmVhZGNydW1icycpXG4gICAgfVxuICAgIGlmIChMaWdodHdvcmRzLkNPTkZJRy5zdGlja3lIZWFkZXIpIHtcbiAgICAgICRib2R5LmFkZENsYXNzKCdzdGlja3ktaGVhZGVyJylcbiAgICAgIGJvZHlDbGFzc2VzLnB1c2goJ3N0aWNreS1oZWFkZXInKVxuICAgIH1cbiAgICBpZiAoTGlnaHR3b3Jkcy5DT05GSUcucGFyYWxsYXhIZXJvKSB7XG4gICAgICAkYm9keS5hZGRDbGFzcygncGFyYWxsYXgtaGVybycpXG4gICAgICBib2R5Q2xhc3Nlcy5wdXNoKCdwYXJhbGxheC1oZXJvJylcbiAgICB9XG5cbiAgICBjb25zb2xlLmxvZygnQ29uZmlndXJpbmcgYm9keSBjbGFzc2VzJywgYm9keUNsYXNzZXMpXG4gIH0pXG59KShqUXVlcnkpXG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gLi9zcmMvanMvbGliL2NvbmZpZ3VyZS5qcyIsIjsoZnVuY3Rpb24oJCkge1xuICAvLyBET00gSVMgUkVBRFkhXG5cbiAgJChmdW5jdGlvbigpIHtcbiAgICAvLyBUT0dHTEUgSEVMUEVSXG5cbiAgICB2YXIgJHRvZ2dsZXJzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnW2RhdGEtdG9nZ2xlXScpXG5cbiAgICBBcnJheS5wcm90b3R5cGUuZm9yRWFjaC5jYWxsKCR0b2dnbGVycywgZnVuY3Rpb24oJHRvZ2dsZXIpIHtcbiAgICAgIHZhciAkdGFyZ2V0cyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoXG4gICAgICAgICR0b2dnbGVyLmdldEF0dHJpYnV0ZSgnZGF0YS10b2dnbGUnKVxuICAgICAgKVxuICAgICAgdmFyIGNsYXNzbmFtZSA9ICR0b2dnbGVyLmdldEF0dHJpYnV0ZSgnZGF0YS10b2dnbGUtY2xhc3NuYW1lJykgLy8gVE9ETyA6IG5hbWUgZm9yIGRhdGEtYXR0cmlidXRlcyB0b29cblxuICAgICAgQXJyYXkucHJvdG90eXBlLmZvckVhY2guY2FsbCgkdGFyZ2V0cywgZnVuY3Rpb24oJHRhcmdldCkge1xuICAgICAgICAkdG9nZ2xlci5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uKCkge1xuICAgICAgICAgIHRvZ2dsZVN0dWZmKHRoaXMsICR0YXJnZXQsIGNsYXNzbmFtZSlcbiAgICAgICAgfSlcbiAgICAgIH0pXG5cbiAgICAgIHZhciB0b2dnbGVTdHVmZiA9IGZ1bmN0aW9uKCRlbCwgJHRhcmdldCwgY2xhc3NuYW1lKSB7XG4gICAgICAgIHZhciBhY3RpdmVDbGFzc25hbWUgPSAnYWN0aXZlJ1xuICAgICAgICBpZiAoJGVsLmNsYXNzTGlzdC5jb250YWlucyhhY3RpdmVDbGFzc25hbWUpKSB7XG4gICAgICAgICAgJGVsLmNsYXNzTGlzdC5yZW1vdmUoYWN0aXZlQ2xhc3NuYW1lKVxuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICRlbC5jbGFzc0xpc3QuYWRkKGFjdGl2ZUNsYXNzbmFtZSlcbiAgICAgICAgfVxuXG4gICAgICAgIGlmICgkdGFyZ2V0LmNsYXNzTGlzdC5jb250YWlucyhjbGFzc25hbWUpKSB7XG4gICAgICAgICAgJHRhcmdldC5jbGFzc0xpc3QucmVtb3ZlKGNsYXNzbmFtZSlcbiAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAkdGFyZ2V0LmNsYXNzTGlzdC5hZGQoY2xhc3NuYW1lKVxuICAgICAgICB9XG4gICAgICB9XG4gICAgfSlcblxuICAgIGNvbnNvbGUubG9nKCd0b2dnbGVyLmpzIGlzIGxvYWRlZCcpXG4gIH0pXG59KShqUXVlcnkpXG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gLi9zcmMvanMvbGliL3RvZ2dsZXIuanMiLCI7KGZ1bmN0aW9uKCQpIHtcbiAgLy8gRE9NIElTIFJFQURZIVxuXG4gICQoZnVuY3Rpb24oKSB7XG4gICAgLy8gUklQUExFIEVGRkVDVFxuXG4gICAgaWYgKExpZ2h0d29yZHMuQ09ORklHLnJpcHBsZUVmZmVjdCkge1xuICAgICAgJChMaWdodHdvcmRzLkNPTkZJRy5yaXBwbGVTZWxlY3RvcikuYWRkQ2xhc3MoJ3JpcHBsZScpXG5cbiAgICAgICQoJy5yaXBwbGUnKS5jbGljayhmdW5jdGlvbihlKSB7XG4gICAgICAgIHZhciByaXBwbGVyID0gJCh0aGlzKVxuXG4gICAgICAgIC8vIGNyZWF0ZSAuaW5rIGVsZW1lbnQgaWYgaXQgZG9lc24ndCBleGlzdFxuICAgICAgICBpZiAocmlwcGxlci5maW5kKCcuaW5rJykubGVuZ3RoID09IDApIHtcbiAgICAgICAgICByaXBwbGVyLmFwcGVuZChcIjxzcGFuIGNsYXNzPSdpbmsnPjwvc3Bhbj5cIilcbiAgICAgICAgfVxuXG4gICAgICAgIHZhciBpbmsgPSByaXBwbGVyLmZpbmQoJy5pbmsnKVxuXG4gICAgICAgIC8vIHByZXZlbnQgcXVpY2sgZG91YmxlIGNsaWNrc1xuICAgICAgICBpbmsucmVtb3ZlQ2xhc3MoJ2FuaW1hdGUnKVxuXG4gICAgICAgIC8vIHNldCAuaW5rIGRpYW1ldHJcbiAgICAgICAgaWYgKCFpbmsuaGVpZ2h0KCkgJiYgIWluay53aWR0aCgpKSB7XG4gICAgICAgICAgdmFyIGQgPSBNYXRoLm1heChyaXBwbGVyLm91dGVyV2lkdGgoKSwgcmlwcGxlci5vdXRlckhlaWdodCgpKVxuICAgICAgICAgIGluay5jc3MoeyBoZWlnaHQ6IGQsIHdpZHRoOiBkIH0pXG4gICAgICAgIH1cblxuICAgICAgICAvLyBnZXQgY2xpY2sgY29vcmRpbmF0ZXNcbiAgICAgICAgdmFyIHggPSBlLnBhZ2VYIC0gcmlwcGxlci5vZmZzZXQoKS5sZWZ0IC0gaW5rLndpZHRoKCkgLyAyXG4gICAgICAgIHZhciB5ID0gZS5wYWdlWSAtIHJpcHBsZXIub2Zmc2V0KCkudG9wIC0gaW5rLmhlaWdodCgpIC8gMlxuXG4gICAgICAgIC8vIHNldCAuaW5rIHBvc2l0aW9uIGFuZCBhZGQgY2xhc3MgLmFuaW1hdGVcbiAgICAgICAgaW5rXG4gICAgICAgICAgLmNzcyh7XG4gICAgICAgICAgICB0b3A6IHkgKyAncHgnLFxuICAgICAgICAgICAgbGVmdDogeCArICdweCdcbiAgICAgICAgICB9KVxuICAgICAgICAgIC5hZGRDbGFzcygnYW5pbWF0ZScpXG4gICAgICB9KVxuICAgIH1cbiAgICBjb25zb2xlLmxvZygncmlwcGxlLmpzIGlzIGxvYWRlZCcpXG4gIH0pXG59KShqUXVlcnkpXG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gLi9zcmMvanMvbGliL3JpcHBsZS5qcyIsIjsoZnVuY3Rpb24oJCkge1xuICAvLyBET00gSVMgUkVBRFkhXG5cbiAgJChmdW5jdGlvbigpIHtcbiAgICAvLyBTRUFSQ0ggSEVMUEVSU1xuXG4gICAgdmFyICRzZWFyY2ggPSAkKCcuc2VhcmNoZm9ybScpXG4gICAgdmFyICRzZWFyY2hJbnB1dCA9ICQoXCIuc2VhcmNoZm9ybSBpbnB1dFt0eXBlPSd0ZXh0J11cIilcbiAgICB2YXIgJHNlYXJjaFN1Ym1pdCA9ICQoXCIuc2VhcmNoZm9ybSBpbnB1dFt0eXBlPSdzdWJtaXQnXVwiKVxuXG4gICAgZnVuY3Rpb24gc2V0U2VhcmNoU3VibWl0KGwpIHtcbiAgICAgIGlmIChsID4gMikge1xuICAgICAgICAkc2VhcmNoU3VibWl0LnJlbW92ZUF0dHIoJ2Rpc2FibGVkJylcbiAgICAgIH0gZWxzZSB7XG4gICAgICAgICRzZWFyY2hTdWJtaXQuYXR0cignZGlzYWJsZWQnLCAnZGlzYWJsZWQnKVxuICAgICAgfVxuICAgIH1cblxuICAgIGZ1bmN0aW9uIGNoZWNrU2VhcmNoVmFsdWUoZSkge1xuICAgICAgc2V0U2VhcmNoU3VibWl0KCQodGhpcykudmFsKCkubGVuZ3RoKVxuICAgIH1cblxuICAgIHNldFNlYXJjaFN1Ym1pdCgkc2VhcmNoSW5wdXQudmFsKCkubGVuZ3RoKVxuXG4gICAgJHNlYXJjaElucHV0Lm9uKCdrZXl1cCcsIGNoZWNrU2VhcmNoVmFsdWUpXG4gICAgLy8gY2hlY2tTZWFyY2hWYWx1ZSgpO1xuXG4gICAgY29uc29sZS5sb2coJ3NlYXJjaC5qcyBpcyBsb2FkZWQnKVxuICB9KVxufSkoalF1ZXJ5KVxuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIC4vc3JjL2pzL2xpYi9zZWFyY2guanMiLCIvLyByZW1vdmVkIGJ5IGV4dHJhY3QtdGV4dC13ZWJwYWNrLXBsdWdpblxuXG5cbi8vLy8vLy8vLy8vLy8vLy8vL1xuLy8gV0VCUEFDSyBGT09URVJcbi8vIC4vc3JjL3Njc3MvbWFpbi5zY3NzXG4vLyBtb2R1bGUgaWQgPSA4XG4vLyBtb2R1bGUgY2h1bmtzID0gMCJdLCJzb3VyY2VSb290IjoiIn0=