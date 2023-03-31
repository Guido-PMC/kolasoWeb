/*global jQuery */
/* Contents
// ------------------------------------------------>
	1.  LOADING SCREEN
	2.  BACKGROUND INSERT
	3.	MODULE SEARCH
	4.  MODULE SIDEAREA
	5.  MODULE CART
	6.  MODULE CANCEL
	7.  MOBILE MENU
	8.  NAVBAR TOGGLER
	9.  COUNTER UP
	10. COUNTDOWN DATE
	11. OWL CAROUSEL
	12. MAGNIFIC POPUP
	13. ROUNDED SKILL
	14. BACK TO TOP
	15. PORTFOLIO FLITER
	16. SCROLL TO
	17. PROGRESS BAR
	18. GOOGLE MAP
	19. FIXED TOP
	20. TESTIONMAILS SLIDER

*/
(function ($) {
  "use strict";

  /* ------------------  LOADING SCREEN ------------------ */

  $(window).on("load", function () {
    $(".preloader").fadeOut(5000);
    $(".preloader").remove();
  });

  /* ------------------  Background INSERT ------------------ */

  var $bgSection = $(".bg-section");
  var $bgPattern = $(".bg-pattern");
  var $colBg = $(".col-bg");

  $bgSection.each(function () {
    var bgSrc = $(this).children("img").attr("src");
    var bgUrl = "url(" + bgSrc + ")";
    $(this).parent().css("backgroundImage", bgUrl);
    $(this).parent().addClass("bg-section");
    $(this).remove();
  });

  $bgPattern.each(function () {
    var bgSrc = $(this).children("img").attr("src");
    var bgUrl = "url(" + bgSrc + ")";
    $(this).parent().css("backgroundImage", bgUrl);
    $(this).parent().addClass("bg-pattern");
    $(this).remove();
  });

  $colBg.each(function () {
    var bgSrc = $(this).children("img").attr("src");
    var bgUrl = "url(" + bgSrc + ")";
    $(this).parent().css("backgroundImage", bgUrl);
    $(this).parent().addClass("col-bg");
    $(this).remove();
  });

  /* ------------------  MODULE SEARCH  ------------------ */

  var $moduleSearch = $("#moduleSearch");

  $moduleSearch.on("click", function () {
    $(this).parent().addClass("module-active");
    $(this).parent().siblings().removeClass("module-active");
    $(".module-search-warp").addClass("active");
  });

  /* ------------------  MODULE SIDEAREA  ------------------ */

  var $moduleSideArea = $("#moduleSideArea");

  $moduleSideArea.on("click", function () {
    $(this).parent().addClass("module-active");
    $(this).parent().siblings().removeClass("module-active");
    $(".module-sidearea-wrap").addClass("active");
  });

  /* ------------------  MODULE CART ------------------ */

  var $moduleCart = $("#moduleCart");

  $moduleCart.on("click", function () {
    $(this).parent().toggleClass("module-active");
    $(this).parent().siblings().removeClass("module-active");
  });

  /* ------------------  MODULE CANCEL ------------------ */

  var $module = $(".module"),
    $moduleWarp = $(".module-warp"),
    $moduleCancel = $(".module-cancel");
  $moduleCancel.on("click", function (e) {
    $(this).parent().removeClass("active");
    $module.removeClass("module-active");
    e.stopPropagation();
    e.preventDefault();
  });

  $(document).keyup(function (e) {
    if (e.key === "Escape") {
      $module.removeClass("module-active");
      $moduleWarp.removeClass("active");
    }
  });

  /* ------------------  MOBILE MENU ------------------ */

  var $w = $(window),
      $wWidth = $w.width(),
      mobile_resolution_size = '991',
      $dropToggle = $(".dropdown-toggle[href*='#']"),
      $dropToggleRemoveLink = $(".dropdown-toggle[href*='javascript']"),
      $menuToggle = $(".menu-toggle"),
      $subMenu = $(".dropdown-submenu");

      if($wWidth <= mobile_resolution_size ){

        $('.navbar-nav li.menu-item-has-children').prepend('<span class="menu-toggle"></span>');

        $(".menu-toggle").on("click", function (event) {
          $(this).parent().siblings().removeClass("show");
          $(this).parent().toggleClass("show");
        });

        $dropToggle.on("click", function (event) {
          event.preventDefault();
          event.stopPropagation();
          $(this).parent().siblings().removeClass("show");
          $(this).parent().toggleClass("show");
        });

        $dropToggleRemoveLink.on("click", function (event) {
          $(this).parent().siblings().removeClass("show");
          $(this).parent().toggleClass("show");
        });
      
      }
 
  $subMenu.on("click", function (event) {
    event.stopPropagation();
    $(this).siblings().removeClass("show");
    $(this).toggleClass("show");
  });

  /* ------------------  NAVBAR TOGGLER ------------------ */

  var $toggler = $(".navbar-toggler");

  $toggler.on("click", function () {
    $(this).toggleClass("toggler-active");
  });

  /* ------------------  COUNTER UP ------------------ */
  $(document).ready(function () {
    if ($(".counting").length > 0) {
      $(".counting").counterUp({delay: 10, time: 1000});
    }
  });

  /* ------------------ COUNTDOWN DATE ------------------ */

  $(document).ready(function () {
    if ($(".countdown").length > 0) {
      $(".countdown").each(function () {
        var $countDown = $(this),
          countDate = $countDown.data("count-date"),
          newDate = new Date(countDate);
        $countDown.countdown({until: newDate, format: "MMMM Do , h:mm:ss a"});
      });
    }
  });

  /* ------------------ OWL CAROUSEL ------------------ */

  $(document).ready(function () {
    var $carouselDirection = $("html").attr("dir"),
      $activeThumb = $("thumb-active");

    if ($carouselDirection == "rtl") {
      var carouselrtl = true;
    } else {
      var carouselrtl = false;
    }

    $(".carousel").each(function () {
      var $Carousel = $(this);
      $Carousel.owlCarousel({
        loop: $Carousel.data("loop"),
        autoplay: $Carousel.data("autoplay"),
        autoplayTimeout: $Carousel.data("speed"),
        margin: $Carousel.data("space"),
        nav: $Carousel.data("nav"),
        dots: $Carousel.data("dots"),
        center: $Carousel.data("center"),
        dotsSpeed: $Carousel.data("speed"),
        rtl: carouselrtl,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: $Carousel.data("slide-rs")
          },
          1000: {
            items: $Carousel.data("slide")
          }
        }
      });
    });

    if ($activeThumb.length > 0) {
      $activeThumb.owlCarousel({thumbs: true, thumbsPrerendered: true});
    }

    $(".slider").each(function () {
      var $Slider = $(this);
      $Slider.owlCarousel({
        thumbs: true,
        thumbsPrerendered: true,
        loop: true,
        margin: 0,
        autoplay: $Slider.data("autoplay"),
        nav: $Slider.data("nav"),
        dots: $Slider.data("dots"),
        center: true,
        dotsSpeed: $Slider.data("speed"),
        rtl: rtlVal,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1000: {
            items: 1
          }
        }
      });
    });
  });

  /* ------------------ MAGNIFIC POPUP ------------------ */

  $(document).ready(function () {
    var $imgPopup = $(".img-popup"),
      $videoPopup = $(".popup-video"),
      $imgPopupG = $(".img-gallery-item");

    if ($imgPopup.length > 0) {
      $imgPopup.magnificPopup({type: "image"});
    }

    if ($imgPopupG.length > 0) {
      $imgPopupG.magnificPopup({
        type: "image",
        gallery: {
          enabled: true
        }
      });
    }

    if ($(".popup-video").length > 0) {
      $(".popup-video").magnificPopup({
        disableOn: 700,
        mainClass: "mfp-fade",
        removalDelay: 0,
        preloader: false,
        fixedContentPos: false,
        type: "iframe",
        iframe: {
          markup: '<div class="mfp-iframe-scaler">' + '<div class="mfp-close"></div>' + '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' + "</div>",
          patterns: {
            youtube: {
              index: "youtube.com/",
              id: "v=",
              src: "//www.youtube.com/embed/%id%?autoplay=1"
            },
            vimeo: {
              index: "vimeo.com/",
              id: "/",
              src: "//player.vimeo.com/video/%id%?autoplay=1"
            }
          },
          srcAction: "iframe_src"
        }
      });
    }
  });

  /* ------------------  ROUNDED SKILL ------------------ */

  $(document).ready(function () {
    $(window).on("scroll", function () {
      var skill = $(".skill"),
        scrollTop = $(window).scrollTop(),
        windowHeight = $(window).height(),
        roundedSkill = $(".rounded-skill");
      if (roundedSkill.length) {
        var wScroll = scrollTop + windowHeight,
          skillScroll = skill.offset().top + skill.outerHeight();
        if (wScroll > skillScroll) {
          roundedSkill.each(function () {
            $(this).easyPieChart({
              duration: 1000,
              enabled: true,
              scaleColor: false,
              size: $(this).attr("data-size"),
              trackColor: false,
              lineCap: $(this).attr("data-line"),
              lineWidth: $(this).attr("data-width"),
              barColor: $(this).attr("data-color"),
              animate: 5000,
              onStep: function (from, to, percent) {
                $(this.el).find(".prcent").text(Math.round(percent));
              }
            });
          });
        }
      }
    });
  });

  /* ------------------  BACK TO TOP ------------------ */

  var backTop = $("#backTop");

  if (backTop.length) {
    var scrollTrigger = 200, // px
      backToTop = function () {
        var scrollTop = $(window).scrollTop();
        if (scrollTop > scrollTrigger) {
          backTop.addClass("show");
        } else {
          backTop.removeClass("show");
        }
      };
    backToTop();
    $(window).on("scroll", function () {
      backToTop();
    });
    backTop.on("click", function (e) {
      e.preventDefault();
      $("html,body").animate({
        scrollTop: 0
      }, 700);
    });
  }

  /* ------------------ PORTFOLIO FLITER ------------------ */

  $(document).ready(function () {
    var $portfolioFilter = $(".portfolio-filter"),
      portfolioLength = $portfolioFilter.length,
      portfolioFinder = $portfolioFilter.find("a"),
      $portfolioAll = $("#portfolio-all"),
      $portfolioMasonry = $("#portfolioMasonry");

    // init Isotope For gallery
    if (portfolioFinder.length > 0) {
      portfolioFinder.on("click", function (e) {
        e.preventDefault();
        $portfolioFilter.find("a.active-filter").removeClass("active-filter");
        $(this).addClass("active-filter");
      });

      portfolioFinder.on("click", function (e) {
        e.preventDefault();
        var $selector = $(this).attr("data-filter");
        $portfolioAll.imagesLoaded().progress(function () {
          $portfolioAll.isotope({
            filter: $selector,
            animationOptions: {
              duration: 750,
              itemSelector: ".portfolio-item",
              easing: "linear",
              queue: false
            }
          });
          return false;
        });
      });
    }

    if (portfolioLength > 0) {
      $portfolioAll.imagesLoaded().progress(function () {
        $portfolioAll.isotope({
          filter: "*",
          animationOptions: {
            duration: 750,
            itemSelector: ".portfolio-item",
            easing: "linear",
            queue: false
          }
        });
      });
    }

    if ($portfolioMasonry.length > 0) {
      // show all items
      $portfolioMasonry.isotope({filter: "*"});

      $portfolioMasonry.imagesLoaded().progress(function () {
        $portfolioMasonry.isotope({
          filter: "*",
          animationOptions: {
            duration: 750,
            itemSelector: ".portfolio-item",
            easing: "linear",
            queue: false
          }
        });
      });
    }
  });

  /* ------------------  SCROLL TO ------------------ */

  var aScroll = $('a[data-scroll="scrollTo"]');
  aScroll.on("click", function (event) {
    var target = $($(this).attr("href"));
    if (target.length) {
      event.preventDefault();
      $("html, body").animate({
        scrollTop: target.offset().top
      }, 1000);
      if ($(this).hasClass("menu-item")) {
        $(this).parent().addClass("active");
        $(this).parent().siblings().removeClass("active");
      }
    }
  });

  /* ------------------ PROGRESS BAR ------------------ */

  var $htmlDirection = $("html").attr("dir");
  if ($(".skills").length > 0) {
    $(".progress-bar").each(function () {
      $(this).width($(this).attr("aria-valuenow") + "%");
    });

    $(".progress-title .value").each(function () {
      if ($htmlDirection == "rtl") {
        $(this).css({
          opacity: 1,
          right: $(this).data("value") + "%"
        });
      } else {
        $(this).css({
          opacity: 1,
          left: $(this).data("value") + "%"
        });
      }
    });
  }

  /* ------------------ GOOGLE MAP ------------------ */

  $(document).ready(function () {
    if ($(".googleMap").length > 0) {
      $(".googleMap").each(function () {
        var $gmap = $(this);
        $gmap.gMap({
          latitude: $gmap.data("map-latitude"),
          longitude: $gmap.data("map-longitude"),
          address: $gmap.data("map-address"),
          zoom: $gmap.data("map-zoom"),
          maptype: $gmap.data("map-type"),
          markers: [
            {
              address: $gmap.data("map-address"),
              maptype: $gmap.data("map-type"),
              html: $gmap.data("map-info"),
              icon: {
                image: $gmap.data("map-maker-icon"),
                iconsize: [
                  76, 61
                ],
                iconanchor: [76, 61]
              }
            }
          ]
        });
      });
    }
  });

  /* ------------------ FIXED TOP ------------------ */

  $(window).scroll(function () {
    /* affix after scrolling 100px */
    if ($(document).scrollTop() > $(window).height() || $(document).scrollTop() > 100) {
      $(".fixed-top").addClass("affix");
    } else {
      $(".fixed-top").removeClass("affix");
    }
  });

  if ($(".nav-tabs").length > 0) {
    $(".nav-tabs li a").on("click", function (e) {
      e.preventDefault();
      $(this).tab("show");
    });
  }

  /* ------------------ TESTIONMAILS SLIDER ------------------ */

  $(document).ready(function () {
    if ($(".testimonial-3").length > 0) {
      var galleryTop = new Swiper(".testimonial-top", {
        spaceBetween: 0,
        loop: true,
        loopedSlides: 4,
        pagination: {
          el: ".swiper-pagination",
          type: "bullets",
          clickable: true
        }
      });
      var galleryThumbs = new Swiper(".testimonial-thumbs", {
        spaceBetween: 0,
        centeredSlides: true,
        slidesPerView: "auto",
        touchRatio: 0.2,
        slideToClickedSlide: true,
        loop: true,
        loopedSlides: 3
      });
      galleryTop.controller.control = galleryThumbs;
      galleryThumbs.controller.control = galleryTop;
    }
  });
})(jQuery);
