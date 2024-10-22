/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        $('body>header nav>ul>li>a').on('click', function(event) {
          var header  = $(this).parents('header');
          var target  = $(this).attr('href').replace('#', '');

          event.preventDefault();

          header.removeClass('open');

          $('html, body')
              .animate(
                {
                  scrollTop: ((target.length) ? ($('a[name="' + target + '"]').position().top - header.outerHeight(true)) : 0)
                },
                750);
        });
        $('body>header a.toggle').on('click', function() {
          var header  = $(this).parents('header');

          if (header) {
            header.toggleClass('open');
          }
        });
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // check for galleries
        $('.fragment--galleries .fragment--galleries__tile').on('click', 'a[data-group]', function() {
          Fresco.show($('a[data-fresco-group="' + $(this).data('group') + '"]')[0]);
        });

        // check for map elements
        var elements  = $('.fragment--contact .contact--location');

        if (elements.length) {
          elements.each(function(index, element) {
            var map       = $('.contact--location__map', element);

            if (map) {
              var latlng    = new google.maps.LatLng(map.data('latitude'), map.data('longitude'));
              var options   = {
                center: latlng,
                zoom: 17,
                scrollwheel: false,
                draggable: false
              };

              map         = new google.maps.Map(map[0], options);

              var marker  = new google.maps.Marker({
                position: latlng,
                icon: {
                  url: '/content/themes/quinco/assets/images/marker.png',
                  size: new google.maps.Size(80, 80),
                  origin: new google.maps.Point(0, 0),
                  anchor: new google.maps.Point(40, 40)
                }
              });
              marker.setMap(map);
            }
          });
        }
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
