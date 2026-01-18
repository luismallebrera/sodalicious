/***********************************************
 * INIT THIRD PARTY SCRIPTS
 ***********************************************/
(function ($) {
  'use strict';

  /**
   * Remove overflow for sticky
   */
  if ($('.sticky-column, .has-sticky-column').length) {
    $('.vlt-main').css('overflow', 'inherit');
  }

  /**
   * Add nofollow to child menu link
   */
  $('.menu-item-has-children>a').attr('rel', 'nofollow');

  /**
   * Widget menu
   */
  if (typeof $.fn.superclick !== 'undefined') {
    $('.widget_pages > ul, .widget_nav_menu ul.menu').superclick({
      delay: 300,
      cssArrows: false,
      animation: {
        opacity: 'show',
        height: 'show'
      },
      animationOut: {
        opacity: 'hide',
        height: 'hide'
      }
    });
  }

  /**
   * Sticky sidebar
   */
  // TODO

  /**
   * Jarallax
   */
  if (typeof $.fn.jarallax !== 'undefined') {
    $('.jarallax, .elementor-section.jarallax, .elementor-column.jarallax>.elementor-column-wrap').jarallax({
      speed: 0.8
    });
  }

  /**
   * Fitvids
   */
  if (typeof $.fn.fitVids !== 'undefined') {
    VLTJS.body.fitVids();
  }

  /**
   * AOS animation
   */
  if (typeof AOS !== 'undefined') {
    function aos() {
      AOS.init({
        disable: 'mobile',
        offset: 120,
        once: true,
        duration: 1000,
        easing: 'ease'
      });
      function aos_refresh() {
        AOS.refresh();
      }
      aos_refresh();
      VLTJS.debounceResize(aos_refresh);
    }
    VLTJS.window.on('vlt.site-loaded', aos);
  }

  /**
   * Back button
   */
  $('.btn-go-back').on('click', function (e) {
    e.preventDefault();
    window.history.back();
  });

  /**
   * Lax
   */
  if (typeof lax !== 'undefined') {
    VLTJS.body.imagesLoaded(function () {
      lax.setup();
      const updateLax = function () {
        lax.update(window.scrollY);
        window.requestAnimationFrame(updateLax);
      };
      window.requestAnimationFrame(updateLax);
      VLTJS.debounceResize(function () {
        lax.updateElements();
      });
    });
  }

  /**
   * Fancybox
   */
  if (typeof $.fn.fancybox !== 'undefined') {
    $.fancybox.defaults.btnTpl = {
      close: '<button data-fancybox-close class="fancybox-button fancybox-button--close">' + '<i class="ri-close-fill"></i>' + '</button>',
      arrowLeft: '<a data-fancybox-prev class="fancybox-button fancybox-button--arrow_left" href="javascript:;">' + '<i class="ri-arrow-left-line"></i>' + '</a>',
      arrowRight: '<a data-fancybox-next class="fancybox-button fancybox-button--arrow_right" href="javascript:;">' + '<i class="ri-arrow-right-line"></i>' + '</a>',
      smallBtn: '<button type="button" data-fancybox-close class="fancybox-button fancybox-close-small">' + '<i class="ri-close-fill"></i>' + '</button>'
    };
    $.fancybox.defaults.buttons = ['close'];
    $.fancybox.defaults.infobar = false;
    $.fancybox.defaults.transitionEffect = 'slide';
  }

  /**
   * Material input
   */
  if ($('.vlt-form-group').length) {
    $('.vlt-form-group .vlt-form-control').each(function () {
      if ($(this).val().length > 0 || $(this).attr('placeholder') !== undefined) {
        $(this).closest('.vlt-form-group').addClass('active');
      }
    });
    $('.vlt-form-group .vlt-form-control').on({
      mouseenter: function () {
        $(this).closest('.vlt-form-group').addClass('active');
      },
      mouseleave: function () {
        if ($(this).val() == '' && $(this).attr('placeholder') == undefined && !$(this).is(':focus')) {
          $(this).closest('.vlt-form-group').removeClass('active');
        }
      }
    });
    $('.vlt-form-group .vlt-form-control').focus(function () {
      $(this).closest('.vlt-form-group').addClass('active');
    });
    $('.vlt-form-group .vlt-form-control').blur(function () {
      if ($(this).val() == '' && $(this).attr('placeholder') == undefined) {
        $(this).closest('.vlt-form-group').removeClass('active');
      }
    });
    $('.vlt-form-group .vlt-form-control').change(function () {
      if ($(this).val() == '' && $(this).attr('placeholder') == undefined) {
        $(this).closest('.vlt-form-group').removeClass('active');
      } else {
        $(this).closest('.vlt-form-group').addClass('active');
      }
    });
  }
})(jQuery);
/***********************************************
 * HEDAER: DROP EFFECTS
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof gsap == 'undefined') {
    return;
  }
  if (typeof $.fn.superclick == 'undefined') {
    return;
  }
  VLTJS.submenuEffectStyle1 = {
    config: {
      easing: 'power2.out'
    },
    init: function () {
      var effect = $('[data-submenu-effect="style-1"]'),
        $navbars = effect.find('ul.sf-menu');

      // prepend back button
      if (VLT_LOCALIZE_DATAS.menu_back_text) {
        $navbars.find('ul.sub-menu').prepend('<li class="sub-menu-back"><a href="#"><span>' + VLT_LOCALIZE_DATAS.menu_back_text + '</span></a></li>');
      }
      function _update_submenu_height($item) {
        var $nav = $item.closest(effect);
        var $sfMenu = $nav.find('ul.sf-menu');
        var $submenu = $sfMenu.find('li.menu-item-has-children.open > ul.sub-menu:not(.closed)');
        var submenuHeight = '';
        if ($submenu.length) {
          submenuHeight = $submenu.innerHeight();
        }
        $sfMenu.css({
          height: submenuHeight,
          minHeight: submenuHeight
        });
      }

      // open / close submenu
      function _toggle_submenu(open, $submenu, clickedLink) {
        var $newItems = $submenu.find('> ul.sub-menu > li > a');
        var $oldItems = $submenu.parent().find('> li > a');
        if (open) {
          $submenu.addClass('open').parent().addClass('closed');
        } else {
          $submenu.removeClass('open').parent().removeClass('closed');
          var tmp = $newItems;
          $newItems = $oldItems;
          $oldItems = tmp;
        }
        gsap.timeline({
          defaults: {
            ease: VLTJS.submenuEffectStyle1.config.easing
          }
        }).to($oldItems, .3, {
          autoAlpha: 0,
          onComplete: function () {
            $oldItems.css('display', 'none');
          }
        }).set($newItems, {
          autoAlpha: 0,
          display: 'block',
          y: 30,
          onComplete: function () {
            _update_submenu_height(clickedLink);
          }
        }).to($newItems, .3, {
          y: 0,
          delay: .3,
          autoAlpha: 1,
          stagger: {
            amount: .15
          }
        });
      }
      $navbars.on('click', 'li.menu-item-has-children > a', function (e) {
        _toggle_submenu(true, $(this).parent(), $(this));
        e.preventDefault();
      });
      $navbars.on('click', 'li.sub-menu-back > a', function (e) {
        _toggle_submenu(false, $(this).parent().parent().parent(), $(this));
        e.preventDefault();
      });
    }
  };
  VLTJS.submenuEffectStyle1.init();
  VLTJS.submenuEffectStyle2 = {
    config: {
      easing: 'power2.out'
    },
    init: function () {
      var effect = $('[data-submenu-effect="style-2"]'),
        $navbars = effect.find('ul.sf-menu');
      $navbars.superclick({
        delay: 300,
        cssArrows: false,
        animation: {
          opacity: 'show',
          height: 'show'
        },
        animationOut: {
          opacity: 'hide',
          height: 'hide'
        }
      });
    }
  };
  VLTJS.submenuEffectStyle2.init();
})(jQuery);
/***********************************************
 * HEDAER: MENU DEFAULT
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof $.fn.superfish == 'undefined') {
    return;
  }
  VLTJS.menuDefault = {
    init: function () {
      var menu = $('.vlt-nav--default'),
        navigation = menu.find('ul.sf-menu');
      navigation.superfish({
        popUpSelector: 'ul.sub-menu',
        delay: 0,
        speed: 300,
        speedOut: 300,
        cssArrows: false,
        animation: {
          opacity: 'show',
          marginTop: '0',
          visibility: 'visible'
        },
        animationOut: {
          opacity: 'hide',
          marginTop: '10px',
          visibility: 'hidden'
        },
        onInit: function () {
          var megaMenuParent = $(this).find('> li.menu-item-has-megamenu'),
            megaMenuColumn = megaMenuParent.find('ul ul');
          // remove has children class
          megaMenuParent.find('li').removeClass('menu-item-has-children');
          // remove attr from megamenu column
          megaMenuColumn.removeAttr('class style');
          // remove label from column
          if (megaMenuParent.hasClass('menu-item-has-megamenu-hide-label')) {
            megaMenuParent.find('> ul > li > a').remove();
          } else {
            megaMenuParent.find('> ul > li > a').addClass('label');
          }
        }
      });
      function correctDropdownPosition($item) {
        $item.removeClass('left');
        var $dropdown = $item.children('ul.sub-menu');
        if ($dropdown.length) {
          var rect = $dropdown[0].getBoundingClientRect();
          if (rect.left + rect.width > VLTJS.window.width()) {
            $item.addClass('left');
          }
        }
      }
      navigation.on('mouseenter', 'li.menu-item-has-children', function () {
        correctDropdownPosition($(this));
      });
    }
  };
  VLTJS.menuDefault.init();
})(jQuery);
/***********************************************
 * HEADER: MENU FULLSCREEN
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof gsap == 'undefined') {
    return;
  }
  var menuIsOpen = false;
  VLTJS.menuFullscreen = {
    init: function () {
      var menu = $('.vlt-nav--fullscreen'),
        menuToggle = $('.js-fullscreen-menu-toggle'),
        navItem = menu.find('ul.sf-menu > li');
      menuToggle.on('click', function (e) {
        e.preventDefault();
        if (!menuIsOpen) {
          menuToggle.addClass('vlt-menu-burger--opened');
          VLTJS.menuFullscreen.open_menu(menu, navItem);
        } else {
          menuToggle.removeClass('vlt-menu-burger--opened');
          VLTJS.menuFullscreen.close_menu(menu);
        }
      });
      VLTJS.document.keyup(function (e) {
        if (e.keyCode === 27 && menuIsOpen) {
          e.preventDefault();
          VLTJS.menuFullscreen.close_menu(menu);
        }
      });
      menu.find('a[href^="#"]').not('[href="#"]').not('[rel="nofollow"]').on('click', function (e) {
        if (menuIsOpen) {
          VLTJS.menuFullscreen.close_menu(menu);
        }
      });
    },
    open_menu: function (menu, navItem) {
      menuIsOpen = true;
      menu.addClass('is-open');
      gsap.fromTo(navItem, {
        autoAlpha: 0,
        y: 30
      }, {
        autoAlpha: 1,
        y: 0,
        duration: .3,
        delay: .3,
        stagger: {
          amount: .3
        }
      });
      if (VLT_LOCALIZE_DATAS.open_click_sound && typeof Howl !== 'undefined') {
        new Howl({
          src: [VLT_LOCALIZE_DATAS.open_click_sound],
          autoplay: true,
          loop: false,
          volume: 0.3
        });
      }
    },
    close_menu: function (menu) {
      menuIsOpen = false;
      menu.removeClass('is-open');
      if (typeof VLT_LOCALIZE_DATAS.close_click_sound && typeof Howl !== 'undefined') {
        new Howl({
          src: [VLT_LOCALIZE_DATAS.close_click_sound],
          autoplay: true,
          loop: false,
          volume: 0.3
        });
      }
    }
  };
  VLTJS.menuFullscreen.init();
})(jQuery);
/***********************************************
 * HEADER: MENU MOBILE
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof $.fn.superclick == 'undefined') {
    return;
  }
  var menuIsOpen = false;
  VLTJS.menuMobile = {
    config: {
      easing: 'power2.out'
    },
    init: function () {
      var menu = $('.vlt-nav--mobile'),
        navbar = menu.parent('.vlt-navbar'),
        menuToggle = $('.js-mobile-menu-toggle');
      menuToggle.on('click', function (e) {
        e.preventDefault();
        if (navbar.hasClass('vlt-navbar--transparent') && navbar.hasClass('vlt-navbar--sticky')) {
          if (!menuIsOpen) {
            navbar.addClass('vlt-navbar--temp-solid');
          } else {
            navbar.removeClass('vlt-navbar--temp-solid');
          }
        }
        if (!menuIsOpen) {
          VLTJS.menuMobile.open_menu(menu, menuToggle);
        } else {
          VLTJS.menuMobile.close_menu(menu, menuToggle);
        }
      });
      VLTJS.document.keyup(function (e) {
        if (e.keyCode === 27 && menuIsOpen) {
          e.preventDefault();
          VLTJS.menuMobile.close_menu(menu, menuToggle);
        }
      });
    },
    open_menu: function (menu, menuToggle) {
      menuIsOpen = true;
      menuToggle.addClass('vlt-menu-burger--opened');
      menuToggle.find('i').removeClass('ri-menu-fill').addClass('ri-close-fill');
      menu.slideDown(300);
    },
    close_menu: function (menu, menuToggle) {
      menuIsOpen = false;
      menuToggle.removeClass('vlt-menu-burger--opened');
      menuToggle.find('i').toggleClass('ri-close-fill').addClass('ri-menu-fill');
      menu.slideUp(300);
    }
  };
  VLTJS.menuMobile.init();
})(jQuery);
/***********************************************
 * HEADER: MENU OFFCANVAS
 ***********************************************/

(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof gsap == 'undefined') {
    return;
  }
  var menuIsOpen = false;
  VLTJS.menuOffcanvas = {
    config: {
      easing: 'power2.out'
    },
    init: function () {
      var menu = $('.vlt-nav--offcanvas'),
        menuToggle = $('.js-offcanvas-menu-toggle'),
        navItem = menu.find('ul.sf-menu > li'),
        siteOverlay = $('.vlt-site-overlay');
      menuToggle.on('click', function (e) {
        e.preventDefault();
        if (!menuIsOpen) {
          VLTJS.menuOffcanvas.open_menu(menuToggle, menu, navItem, siteOverlay);
        } else {
          VLTJS.menuOffcanvas.close_menu(menuToggle, menu, siteOverlay);
        }
      });
      VLTJS.document.keyup(function (e) {
        if (e.keyCode === 27 && menuIsOpen) {
          e.preventDefault();
          VLTJS.menuOffcanvas.close_menu(menuToggle, menu, siteOverlay);
        }
      });
      siteOverlay.on('click', function () {
        if (menuIsOpen) {
          VLTJS.menuOffcanvas.close_menu(menuToggle, menu, siteOverlay);
        }
      });
      menu.find('a[href^="#"]').not('[href="#"]').not('[rel="nofollow"]').on('click', function (e) {
        if (menuIsOpen) {
          VLTJS.menuOffcanvas.close_menu(menuToggle, menu, siteOverlay);
        }
      });
    },
    open_menu: function (menuToggle, menu, navItem, siteOverlay) {
      menuIsOpen = true;
      menuToggle.addClass('vlt-menu-burger--opened');
      menu.addClass('is-open');
      gsap.timeline({
        defaults: {
          ease: this.config.easing
        }
      })
      // set overflow for html
      .set(VLTJS.html, {
        overflow: 'hidden'
      })
      // overlay animation
      .to(siteOverlay, .3, {
        autoAlpha: 1
      }).fromTo(navItem, {
        autoAlpha: 0,
        translateY: 30
      }, {
        autoAlpha: 1,
        translateY: 0,
        duration: .3,
        delay: .5,
        stagger: {
          amount: .2
        }
      }, '-.3');
      if (VLT_LOCALIZE_DATAS.open_click_sound && typeof Howl !== 'undefined') {
        new Howl({
          src: [VLT_LOCALIZE_DATAS.open_click_sound],
          autoplay: true,
          loop: false,
          volume: 0.3
        });
      }
    },
    close_menu: function (menuToggle, menu, siteOverlay) {
      menuIsOpen = false;
      menuToggle.removeClass('vlt-menu-burger--opened');
      menu.removeClass('is-open');
      gsap.timeline({
        defaults: {
          ease: this.config.easing
        }
      })
      // set overflow for html
      .set(VLTJS.html, {
        overflow: 'inherit'
      }).to(siteOverlay, .3, {
        autoAlpha: 0
      });
      if (typeof VLT_LOCALIZE_DATAS.close_click_sound && typeof Howl !== 'undefined') {
        new Howl({
          src: [VLT_LOCALIZE_DATAS.close_click_sound],
          autoplay: true,
          loop: false,
          volume: 0.3
        });
      }
    }
  };
  VLTJS.menuOffcanvas.init();
})(jQuery);
/***********************************************
 * HEADER: MENU SLIDE
 ***********************************************/

(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof gsap == 'undefined') {
    return;
  }
  var menuIsOpen = false;
  VLTJS.menuSlide = {
    config: {
      easing: 'power2.out'
    },
    init: function () {
      var menu = $('.vlt-nav--slide'),
        menuToggle = $('.js-slide-menu-toggle'),
        navItem = menu.find('ul.sf-menu > li'),
        siteOverlay = $('.vlt-site-overlay');
      menuToggle.on('click', function (e) {
        e.preventDefault();
        if (!menuIsOpen) {
          VLTJS.menuSlide.open_menu(menuToggle, menu, navItem, siteOverlay);
        } else {
          VLTJS.menuSlide.close_menu(menuToggle, menu, siteOverlay);
        }
      });
      VLTJS.document.keyup(function (e) {
        if (e.keyCode === 27 && menuIsOpen) {
          e.preventDefault();
          VLTJS.menuSlide.close_menu(menuToggle, menu, siteOverlay);
        }
      });
      siteOverlay.on('click', function () {
        if (menuIsOpen) {
          VLTJS.menuSlide.close_menu(menuToggle, menu, siteOverlay);
        }
      });
      menu.find('a[href^="#"]').not('[href="#"]').not('[rel="nofollow"]').on('click', function (e) {
        if (menuIsOpen) {
          VLTJS.menuSlide.close_menu(menuToggle, menu, siteOverlay);
        }
      });
    },
    open_menu: function (menuToggle, menu, navItem, siteOverlay) {
      menuIsOpen = true;
      menuToggle.addClass('vlt-menu-burger--opened');
      menuToggle.find('i').removeClass('ri-menu-fill').addClass('ri-close-fill');
      menu.addClass('is-open');
      gsap.timeline({
        defaults: {
          ease: this.config.easing
        }
      })
      // set overflow for html
      .set(VLTJS.html, {
        overflow: 'hidden'
      })
      // overlay animation
      .to(siteOverlay, .3, {
        autoAlpha: 1
      }).fromTo(navItem, {
        autoAlpha: 0,
        translateY: 30
      }, {
        autoAlpha: 1,
        translateY: 0,
        duration: .3,
        delay: .5,
        stagger: {
          amount: .2
        }
      }, '-.3');
      if (VLT_LOCALIZE_DATAS.open_click_sound && typeof Howl !== 'undefined') {
        new Howl({
          src: [VLT_LOCALIZE_DATAS.open_click_sound],
          autoplay: true,
          loop: false,
          volume: 0.3
        });
      }
    },
    close_menu: function (menuToggle, menu, siteOverlay) {
      menuIsOpen = false;
      menuToggle.removeClass('vlt-menu-burger--opened');
      menuToggle.find('i').toggleClass('ri-close-fill').addClass('ri-menu-fill');
      menu.removeClass('is-open');
      gsap.timeline({
        defaults: {
          ease: this.config.easing
        }
      })
      // set overflow for html
      .set(VLTJS.html, {
        overflow: 'inherit'
      }).to(siteOverlay, .3, {
        autoAlpha: 0
      });
      if (typeof VLT_LOCALIZE_DATAS.close_click_sound && typeof Howl !== 'undefined') {
        new Howl({
          src: [VLT_LOCALIZE_DATAS.close_click_sound],
          autoplay: true,
          loop: false,
          volume: 0.3
        });
      }
    }
  };
  VLTJS.menuSlide.init();
})(jQuery);
/***********************************************
 * THEME: AJAX LIVE SEARCH FORM
 ***********************************************/
(function ($) {
  'use strict';

  class AjaxLiveSearchForm {
    constructor() {
      this.onInit();
      this.bindEvents();
    }
    getElements() {
      return {
        $form: $('.vlt-search-form--ajax'),
        $input: $('.vlt-search-form--ajax input[type="text"]'),
        $resultsArea: $('.vlt-search-form__results'),
        ajaxURL: VLT_LOCALIZE_DATAS.admin_ajax
      };
    }
    bindEvents() {
      this.getElements().$input.on('keyup', VLTJS.debounce(this.startSearch.bind(this), 500));
      this.getElements().$form.on('submit', function (event) {
        event.preventDefault();
      }.bind(this));
      VLTJS.document.on('click', function (event) {
        if (this.visible) {
          if (!event.target.classList[0].includes('vlt-search-form--ajax')) {
            this.visible = false;
            this.getElements().$input.val('');
            this.getElements().$resultsArea.fadeOut();
            setTimeout(() => {
              this.getElements().$resultsArea.html('');
            }, 600);
          }
        }
      }.bind(this));
    }
    startSearch(event) {
      var currentInput = $(event.target),
        datas = [currentInput.siblings('input[name="post_type"]').val(), currentInput.siblings('input[name="post_taxonomy"]').val(), currentInput.siblings('input[name="post_term_id"]').val()],
        self = this;
      if (currentInput.val().length >= 3) {
        self.getElements().$resultsArea.fadeIn();
        self.runAjaxFiltering(currentInput.val(), datas);
        self.visible = true;
      } else {
        self.getElements().$resultsArea.fadeOut();
        self.visible = false;
      }
    }
    runAjaxFiltering(searchTarget, datas) {
      var self = this;
      $.ajax({
        type: 'POST',
        url: this.getElements().ajaxURL,
        data: {
          action: 'ajax-search-results',
          searchType: datas[0],
          searchTaxonomy: datas[1],
          searchTermID: datas[2],
          searchTarget: searchTarget
        },
        beforeSend: function () {
          self.getElements().$resultsArea.html(VLT_LOCALIZE_DATAS.search_loading);
        },
        success: function (data) {
          if (data.length) {
            self.getElements().$resultsArea.html(data);
          } else {
            self.getElements().$resultsArea.html(VLT_LOCALIZE_DATAS.search_no_found);
          }
        },
        error: function (request, status, error) {}
      });
    }
    onInit() {
      this.visible = false;
    }
  }
  new AjaxLiveSearchForm();
})(jQuery);
/***********************************************
 * THEME: BLOG
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof Swiper === 'undefined') {
    return;
  }
  VLTJS.blog = {
    init: function () {
      VLTJS.blog.postFormatGallerySlider();
      VLTJS.blog.widgetPostlistSlider();
      VLTJS.document.on('loadedNewItems.vpf', function (event, vpObject) {
        if ('vpf' !== event.namespace) {
          return;
        }
        VLTJS.blog.postFormatGallerySlider();
        VLTJS.blog.reinitMediaElementPostFormats('.vp-portfolio__item');
        if (typeof $.fn.fitVids !== 'undefined') {
          VLTJS.body.fitVids();
        }
      });
    },
    postFormatGallerySlider: function () {
      $('.vlt-post-media__gallery').each(function () {
        new Swiper($(this).get(0), {
          loop: true,
          autoplay: {
            delay: 5000
          },
          slidesPerView: 1,
          grabCursor: true,
          speed: 600,
          mousewheel: true,
          pagination: {
            el: '.vlt-swiper-pagination',
            type: 'bullets',
            bulletClass: 'vlt-swiper-pagination-bullet',
            bulletActiveClass: 'vlt-swiper-pagination-bullet-active',
            clickable: true
          }
        });
      });
    },
    reinitMediaElementPostFormats: function (scope) {
      if (typeof $.fn.mediaelementplayer !== 'undefined') {
        $(scope).find('.wp-audio-shortcode, .wp-video-shortcode').not('.mejs-container').filter(function () {
          return !$(this).parent().hasClass('.mejs-mediaelement');
        }).mediaelementplayer();
      }
    },
    widgetPostlistSlider: function () {
      $('.vlt-widget-post-slider').each(function () {
        new Swiper($(this).get(0), {
          spaceBetween: 30,
          loop: true,
          autoplay: {
            delay: 5000
          },
          slidesPerView: 1,
          grabCursor: true,
          speed: 600,
          mousewheel: true,
          pagination: {
            el: '.vlt-swiper-pagination',
            type: 'bullets',
            bulletClass: 'vlt-swiper-pagination-bullet',
            bulletActiveClass: 'vlt-swiper-pagination-bullet-active',
            clickable: true
          }
        });
      });
    }
  };
  VLTJS.blog.init();
})(jQuery);
/***********************************************
 * THEME: CURSOR
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof gsap == 'undefined') {
    return;
  }
  if (VLTJS.isMobile.any()) {
    return;
  }
  VLTJS.cursor = {
    init: function () {
      VLTJS.body.append('<div class="vlt-cursor"><div class="circle"><span></span></div></div>');
      var cursor = $('.vlt-cursor'),
        circle = cursor.find('.circle'),
        startPosition = {
          x: 0,
          y: 0
        },
        endPosition = {
          x: 0,
          y: 0
        },
        delta = .25;
      if (!cursor.length) {
        return;
      }
      gsap.set(circle, {
        xPercent: -50,
        yPercent: -50
      });
      VLTJS.document.on('mousemove', function (e) {
        var offsetTop = window.pageYOffset || document.documentElement.scrollTop;
        startPosition.x = e.pageX;
        startPosition.y = e.pageY - offsetTop;
      });
      gsap.ticker.add(function () {
        endPosition.x += (startPosition.x - endPosition.x) * delta;
        endPosition.y += (startPosition.y - endPosition.y) * delta;
        gsap.set(circle, {
          x: endPosition.x,
          y: endPosition.y
        });
      });
      VLTJS.document.on('mouseenter', '[data-cursor]', function () {
        circle.find('span').html($(this).data('cursor'));
        cursor.addClass('is-active is-visible');
      }).on('mouseleave', '[data-cursor]', function () {
        cursor.removeClass('is-active is-visible');
        circle.find('span').html('');
      });
    }
  };
  VLTJS.cursor.init();
})(jQuery);
/***********************************************
 * THEME: DEVIDE SECTION
 ***********************************************/
(function ($) {
  'use strict';

  VLTJS.devideSection = {
    init: function () {
      $('.vlt-devide-section').each(function () {
        var $this = $(this),
          elHeight = $this.find('>*').outerHeight() * 0.5;
        $this.css('margin-top', elHeight * -1);
        $this.closest('section:not(.elementor-inner-section)').css('margin-top', elHeight);
      });
    }
  };
  VLTJS.devideSection.init();
  VLTJS.debounceResize(function () {
    VLTJS.devideSection.init();
  });
})(jQuery);

/***********************************************
 * THEME: DEVIDE ELEMENT
 ***********************************************/
(function ($) {
  'use strict';

  VLTJS.devideElement = {
    init: function () {
      $('.vlt-devide-element').each(function () {
        var $this = $(this),
          elHeight = $this.outerHeight() / 2;
        $this.find('>*').css('margin-top', -elHeight);
        if ($this.hasClass('reset-mobile') && VLTJS.window.outerWidth() <= 768) {
          $this.find('>*').css('margin-top', '');
        }
      });
    }
  };
  VLTJS.devideElement.init();
  VLTJS.debounceResize(function () {
    VLTJS.devideElement.init();
  });
})(jQuery);

/***********************************************
 * THEME: COLUMN SPACE TO CONTAINER
 ***********************************************/
(function ($) {
  'use strict';

  VLTJS.columnSpaceToContainer = {
    init: function () {
      var wndW = VLTJS.window.width();
      $('.vlt-column-space-to-container').each(function () {
        var $this = $(this),
          container = $('.container'),
          containerWidth = container.outerWidth(),
          containerOffset = container.offset(),
          left = containerOffset.left + (parseFloat(container.css('padding-left')) || 0),
          right = wndW - containerWidth + (parseFloat(container.css('padding-right')) || 0);
        if ($this.hasClass('to-left')) {
          $this.css({
            'padding-left': left
          });
        } else {
          $this.css({
            'padding-right': right / 2
          });
        }
      });
    }
  };
  VLTJS.columnSpaceToContainer.init();
  VLTJS.debounceResize(function () {
    VLTJS.columnSpaceToContainer.init();
  });
})(jQuery);
/***********************************************
 * THEME: ELEMENTOR COLUMN
 ***********************************************/
(function ($) {
  'use strict';

  VLTJS.stickyColumn = {
    init: function ($scope) {
      var parent = $scope.filter('.has-sticky-column');
      if (parent.length) {
        parent.find('.elementor-widget-wrap').addClass('sticky-parent').find('.elementor-element').wrapAll('<div class="sticky-column">');
      }
    }
  };
  VLTJS.stretchColumn = {
    init: function ($scope) {
      if (!$scope) {
        $scope = $('div[class^="col-"]');
      }
      resizeDebounce();
      VLTJS.debounceResize(resizeDebounce);
      function resizeDebounce() {
        var winW = VLTJS.window.outerWidth(),
          stretchBlock = $scope.filter('.has-stretch-column');
        if (stretchBlock.length) {
          var rect = stretchBlock[0].getBoundingClientRect(),
            offsetLeft = rect.left,
            offsetRight = winW - rect.right,
            elWidth = rect.width;
          if (stretchBlock.hasClass('to-left')) {
            stretchBlock.find('>*').css('margin-left', -offsetLeft);
            stretchBlock.find('>*').css('width', elWidth + offsetLeft + 'px');
          }
          if (stretchBlock.hasClass('to-right')) {
            stretchBlock.find('>*').css('margin-right', -offsetRight);
            stretchBlock.find('>*').css('width', elWidth + offsetRight + 'px');
          }
          if (stretchBlock.hasClass('has-reset-mobile') && VLTJS.window.outerWidth() <= 768) {
            stretchBlock.find('>*').css({
              'margin-left': '',
              'margin-right': '',
              'width': '100%'
            });
          }
        }
      }
    }
  };
  VLTJS.stretchColumn.init();
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/column', VLTJS.stretchColumn.init);
  });
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/column', VLTJS.stickyColumn.init);
  });
})(jQuery);
/***********************************************
 * THEME: FIXED FOOTER
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof gsap == 'undefined') {
    return;
  }
  if (VLTJS.isMobile.any()) {
    return;
  }
  VLTJS.fixedFooterEffect = {
    init: function () {
      var footer = $('.vlt-footer').filter('.vlt-footer--fixed'),
        delta = .75,
        translateY = 0;
      if (footer.length && VLTJS.window.outerWidth() >= 768) {
        VLTJS.window.on('load scroll', function () {
          var footerHeight = footer.outerHeight(),
            windowHeight = VLTJS.window.outerHeight(),
            documentHeight = VLTJS.document.outerHeight();
          translateY = delta * (Math.max(0, $(this).scrollTop() + windowHeight - (documentHeight - footerHeight)) - footerHeight);
        });
        gsap.ticker.add(function () {
          gsap.set(footer, {
            translateY: translateY,
            translateZ: 0
          });
        });
      }
    }
  };
  VLTJS.fixedFooterEffect.init();
  VLTJS.debounceResize(function () {
    VLTJS.fixedFooterEffect.init();
  });
})(jQuery);
/***********************************************
 * THEME: FOLLOW INFO
 ***********************************************/
(function ($) {
  'use strict';

  VLTJS.followInfo = {
    init: function ($scope) {
      if (!$('.vlt-follow-info').length) {
        VLTJS.body.append('\
			<div class="vlt-follow-info">\
			<div class="vlt-follow-info__title"></div><br>\
			<div class="vlt-follow-info__subtitle"></div>\
			</div>\
			');
      }
      var getFollowInfo = $scope.find('[data-follow-info]'),
        followInfo = $('.vlt-follow-info'),
        title = followInfo.find('.vlt-follow-info__title'),
        subtitle = followInfo.find('.vlt-follow-info__subtitle');
      getFollowInfo.each(function () {
        var currentPortfolioItem = $(this);
        currentPortfolioItem.on('mousemove', function (e) {
          followInfo.css({
            top: e.clientY,
            left: e.clientX
          });
        });
        currentPortfolioItem.on({
          mouseenter: function () {
            var $this = $(this),
              title_text = $this.find('[data-follow-info-title]').html(),
              subtitle_text = $this.find('[data-follow-info-content]').html();
            if (!followInfo.hasClass('is-active')) {
              followInfo.addClass('is-active');
              title.html(title_text).wrapInner('<h5>');
              subtitle.html(subtitle_text).wrapInner('<span>');
            }
          },
          mouseleave: function () {
            if (followInfo.hasClass('is-active')) {
              followInfo.removeClass('is-active');
              title.html('');
              subtitle.html('');
            }
          }
        });
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-team-member.default', VLTJS.followInfo.init);
  });
  VLTJS.followInfo.init(VLTJS.body);
  VLTJS.document.on('init.vpf endLoadingNewItems.vpf', function (e) {
    VLTJS.followInfo.init(VLTJS.body);
  });
})(jQuery);
/***********************************************
 * THEME: IMAGES TOOLTIP
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof gsap == 'undefined') {
    return;
  }
  VLTJS.imagesTooltip = {
    init: function () {
      $('.vlt-hover-reveal').remove();
      $('[data-tooltip-image]').each(function (index) {
        var $this = $(this),
          size = $this.data('tooltip-size') ? $this.data('tooltip-size').split('x') : false;
        VLTJS.body.append('<div class="vlt-hover-reveal" data-id="' + index + '"><div class="vlt-hover-reveal__inner"><div class="vlt-hover-reveal__img" style="background-image: url(' + $this.data('tooltip-image') + ');"></div></div></div>');
        if (size) {
          $('.vlt-hover-reveal').eq(index).css({
            'width': size[0] + 'px',
            'height': size[1] + 'px'
          });
        }
        var reveal = $('.vlt-hover-reveal[data-id="' + index + '"]'),
          revealInner = reveal.find('.vlt-hover-reveal__inner'),
          revealImg = reveal.find('.vlt-hover-reveal__img'),
          revealImgWidth = revealImg.outerWidth(),
          revealImgHeight = revealImg.outerHeight();
        function position_element(ev) {
          var mousePos = VLTJS.getMousePos(ev),
            docScrolls = {
              left: VLTJS.body.scrollLeft() + VLTJS.document.scrollLeft(),
              top: VLTJS.body.scrollTop() + VLTJS.document.scrollTop()
            };
          gsap.set(reveal, {
            top: mousePos.y - revealImgHeight * 0.5 - docScrolls.top + 'px',
            left: mousePos.x - revealImgWidth * 0.25 - docScrolls.left + 'px'
          });
        }
        function mouse_enter(ev) {
          position_element(ev);
          show_image();
        }
        function mouse_move(ev) {
          requestAnimationFrame(function () {
            position_element(ev);
          });
        }
        function mouse_leave() {
          hide_image();
        }
        $this.on('mouseenter', mouse_enter);
        $this.on('mousemove', mouse_move);
        $this.on('mouseleave', mouse_leave);
        function show_image() {
          gsap.killTweensOf(revealInner);
          gsap.killTweensOf(revealImg);
          gsap.timeline({
            onStart: function () {
              gsap.set(reveal, {
                opacity: 1
              });
            }
          }).fromTo(revealInner, 1, {
            x: '-100%'
          }, {
            x: '0%',
            ease: Quint.easeOut
          }).fromTo(revealImg, 1, {
            x: '100%'
          }, {
            x: '0%',
            ease: Quint.easeOut
          }, '-=1');
        }
        function hide_image() {
          gsap.killTweensOf(revealInner);
          gsap.killTweensOf(revealImg);
          gsap.timeline({
            onComplete: function () {
              gsap.set(reveal, {
                opacity: 0
              });
            }
          }).to(revealInner, 0.5, {
            x: '100%',
            ease: Quint.easeOut
          }).to(revealImg, 0.5, {
            x: '-100%',
            ease: Quint.easeOut
          }, '-=0.5');
        }
      });
    }
  };
  VLTJS.imagesTooltip.init();
  VLTJS.document.on('init.vpf endLoadingNewItems.vpf', function (e) {
    VLTJS.imagesTooltip.init();
  });
})(jQuery);
/***********************************************
 * THEME: ISOTOPE
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof Isotope == 'undefined') {
    return;
  }
  VLTJS.initIsotope = {
    init: function () {
      $('.vlt-isotope-grid').each(function () {
        var $this = $(this),
          setLayout = $this.data('layout'),
          setXGap = $this.data('x-gap').split('|'),
          setYGap = $this.data('y-gap').split('|');
        function sodalicious_set_gaps(el, xGap, yGap) {
          if (VLTJS.window.width() >= 992) {
            el.css({
              'margin-top': -yGap[0] / 2 + 'px',
              'margin-right': -xGap[0] / 2 + 'px',
              'margin-bottom': -yGap[0] / 2 + 'px',
              'margin-left': -xGap[0] / 2 + 'px'
            });
            el.find('.grid-item').css({
              'padding-top': yGap[0] / 2 + 'px',
              'padding-right': xGap[0] / 2 + 'px',
              'padding-bottom': yGap[0] / 2 + 'px',
              'padding-left': xGap[0] / 2 + 'px'
            });
          } else {
            el.css({
              'margin-top': -yGap[1] / 2 + 'px',
              'margin-right': -xGap[1] / 2 + 'px',
              'margin-bottom': -yGap[1] / 2 + 'px',
              'margin-left': -xGap[1] / 2 + 'px'
            });
            el.find('.grid-item').css({
              'padding-top': yGap[1] / 2 + 'px',
              'padding-right': xGap[1] / 2 + 'px',
              'padding-bottom': yGap[1] / 2 + 'px',
              'padding-left': xGap[1] / 2 + 'px'
            });
          }
        }
        sodalicious_set_gaps($this, setXGap, setYGap);
        VLTJS.debounceResize(function () {
          sodalicious_set_gaps($this, setXGap, setYGap);
        });
        var $grid = $this.isotope({
          itemSelector: '.grid-item',
          layoutMode: setLayout,
          masonry: {
            columnWidth: '.grid-sizer'
          },
          cellsByRow: {
            columnWidth: '.grid-sizer'
          }
        });
        $grid.imagesLoaded().progress(function () {
          $grid.isotope('layout');
        });
        $grid.on('layoutComplete', function () {
          sodalicious_set_gaps($this, setXGap, setYGap);
        });
      });
    }
  };
  VLTJS.initIsotope.init();
})(jQuery);
/***********************************************
 * THEME: PLYR
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof Plyr === 'undefined') {
    return;
  }
  VLTJS.plyr = {
    init: function () {
      var audio = $('.vlt-post-media__audio'),
        video = $('.vlt-post-media__video');
      if (audio.length) {
        audio.each(function () {
          var audioPlayer = new Plyr($(this).find('.player'), {
            tooltips: {
              controls: true,
              seek: true
            }
          });
          audioPlayer.on('ready', function () {
            VLTJS.document.trigger('vlt.plyr-ready');
          });
        });
      }
      if (video.length) {
        video.each(function () {
          var videoPlayer = new Plyr($(this).find('.player'), {
            tooltips: {
              controls: true,
              seek: true
            },
            ratio: '16:9',
            youtube: {
              modestbranding: false
            }
          });
          videoPlayer.on('ready', function () {
            VLTJS.document.trigger('vlt.plyr-ready');
          });
        });
      }
    }
  };
  VLTJS.plyr.init();
  VLTJS.document.on('loadedNewItems.vpf', function (event, vpObject) {
    if ('vpf' !== event.namespace) {
      return;
    }
    VLTJS.plyr.init();
  });
})(jQuery);
/***********************************************
 * THEME: PORTFOLIO
 ***********************************************/
(function ($) {
  $('.elementor-widget-visual-portfolio').addClass('elementor-widget-theme-post-content');
  $('[data-vp-items-style="sodalicious_product_style_1"]').addClass('woocommerce');
  VLTJS.document.on('beforeInitSwiper.vpf', function (event, vpObject, options) {
    if ('vpf' !== event.namespace) {
      return;
    }
    var setStretchToContainer = $(event.target).data('vp-slider-stretch-to-container');
    var setNavigationAnchor = $(event.target).data('vp-slider-navigation-anchor');
    if (setStretchToContainer && $('.container').length) {
      options.slidesOffsetBefore = $('.container').get(0).getBoundingClientRect().left + 15;
      options.slidesOffsetAfter = $('.container').get(0).getBoundingClientRect().left + 15;
    }
    if (setNavigationAnchor) {
      options.navigation = {
        nextEl: setNavigationAnchor + ' .vlt-swiper-button-next',
        prevEl: setNavigationAnchor + ' .vlt-swiper-button-prev'
      };
    }
  });
  VLTJS.document.on('initSwiper.vpf', function (event, vpObject, options) {
    if ('vpf' !== event.namespace) {
      return;
    }
    var setNavigationAnchor = $(event.target).data('vp-slider-navigation-anchor');
    if (setNavigationAnchor) {
      var swiper = vpObject.$items_wrap.parent()[0].swiper;
      swiper.on('resize slideChange', function () {
        var el = $(setNavigationAnchor),
          current = swiper.realIndex || 0,
          total = vpObject.$items_wrap.find('.swiper-slide:not(.swiper-slide-duplicate)').length,
          scale = (current + 1) / total;
        if (el.data('direction') == 'vertical') {
          el.find('.current').text(VLTJS.addLedingZero(current + 1));
          el.find('.total').text(VLTJS.addLedingZero(total));
        } else {
          el.find('.current').text(current + 1);
          el.find('.total').text(total);
        }
        if (el.length && el.find('.bar > span').length) {
          el.find('.bar > span')[0].style.setProperty('--scaleX', scale);
          el.find('.bar > span')[0].style.setProperty('--speed', swiper.params.speed + 'ms');
        }
      });
    }
  });
  VLTJS.document.on('init.vpf', function (e) {
    if (typeof gsap !== 'undefined') {
      $('[data-vp-pagination-type="load-more"]').each(function () {
        var loadMorePagination = $(this);
        loadMorePagination.find('.vp-pagination__item').mouseleave(function (e) {
          gsap.to(this, .3, {
            scale: 1
          });
          gsap.to(loadMorePagination.find('.vp-pagination__load-more'), .3, {
            scale: 1,
            x: 0,
            y: 0
          });
        });
        loadMorePagination.find('.vp-pagination__item').mouseenter(function (e) {
          gsap.to(this, .3, {
            transformOrigin: '0 0',
            scale: 1
          });
        });
        loadMorePagination.find('.vp-pagination__item').mousemove(function (e) {
          callParallax(e);
        });
        function callParallax(e) {
          parallaxIt(e, loadMorePagination.find('.vp-pagination__load-more'), 60);
        }
        function parallaxIt(e, target, movement) {
          var $this = loadMorePagination.find('.vp-pagination__item');
          var boundingRect = $this[0].getBoundingClientRect();
          var relX = e.pageX - boundingRect.left;
          var relY = e.pageY - boundingRect.top;
          var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
          gsap.to(target, .3, {
            x: (relX - boundingRect.width / 2) / boundingRect.width * movement,
            y: (relY - boundingRect.height / 2 - scrollTop) / boundingRect.width * movement
          });
        }
      });
    }
  });
  VLTJS.document.on('init.vpf endLoadingNewItems.vpf', function (e) {
    var portfolioItem = $(e.target).filter('[data-vp-items-style="sodalicious_work_style_1"]').find('.vp-portfolio__item');
    var popupItems = $(e.target).filter('[data-vp-items-click-action="popup_gallery"]').find('.vp-portfolio__item-popup');
    if (portfolioItem.length) {
      portfolioItem.on('mouseenter', function () {
        portfolioItem.not($(this)).addClass('has-opacity');
      }).on('mouseleave', function () {
        portfolioItem.removeClass('has-opacity');
      });
    }
    if (popupItems.length) {
      popupItems.parents('.vp-portfolio__item-wrap').find('a').attr('rel', 'nofollow');
    }
  });
  VLTJS.document.on('init.vpf endLoadingNewItems.vpf', function (e) {
    var tiltPortfolio = $(e.target).filter('[data-vp-tilt-effect="true"]'),
      portfolioStyle = tiltPortfolio.attr('data-vp-items-style'),
      expectStyles = !/^default$/g.test(portfolioStyle),
      items = tiltPortfolio.find((expectStyles ? '.vp-portfolio__item' : '.vp-portfolio__item-img') + ':not(.vp-portfolio__item-tilt)');
    if (items.length) {
      items.each(function () {
        var $this = $(this),
          meta = $this.find('.vp-portfolio__item-meta');
        if (expectStyles && meta.length) {
          $this.on('change', function (e, transforms) {
            var x = 1.5 * parseFloat(transforms.tiltX),
              y = 1.5 * -parseFloat(transforms.tiltY);
            meta.css('transform', 'translateY(' + y + 'px) translateX(' + x + 'px)');
          }).on('tilt.mouseLeave', function () {
            meta.css('transform', 'translateY(0) translateX(0)');
          });
        }
        $this.addClass('vp-portfolio__item-tilt').tilt({
          speed: 1000
        });
      });
    }
  });
})(jQuery);
/***********************************************
 * THEME: SCROLL TO SECTION
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof $.fn.scrollTo === 'undefined') {
    return;
  }
  $('a[href^="#"]').not('[href="#"]').not('[rel="nofollow"]').on('click', function (e) {
    e.preventDefault();
    VLTJS.html.scrollTo($(this).attr('href'), 500);
  });
})(jQuery);

/***********************************************
 * THEME: SITE TO TOP
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof $.fn.scrollTo === 'undefined') {
    return;
  }
  var backToTopBtn = $('.vlt-site-back-to-top'),
    footer = $('.vlt-footer'),
    isLight = false;
  if (backToTopBtn.length && footer.length) {
    VLTJS.window.on('scroll', function () {
      if (footer.hasClass('vlt-footer--fixed')) {
        if (backToTopBtn.offset().top + backToTopBtn.outerHeight() >= VLTJS.body.outerHeight() - footer.outerHeight()) {
          _light_btn();
        } else {
          _dark_btn();
        }
      } else {
        if (backToTopBtn.offset().top + backToTopBtn.height() >= footer.offset().top) {
          _light_btn();
        } else {
          _dark_btn();
        }
      }
    });
  }
  function _light_btn() {
    if (!isLight) {
      backToTopBtn.addClass('is-light');
      isLight = true;
    }
  }
  function _dark_btn() {
    if (isLight) {
      backToTopBtn.removeClass('is-light');
      isLight = false;
    }
  }
  function _show_btn() {
    backToTopBtn.removeClass('is-hidden').addClass('is-visible');
  }
  function _hide_btn() {
    backToTopBtn.removeClass('is-visible').addClass('is-hidden');
  }
  _hide_btn();
  VLTJS.throttleScroll(function (type, scroll) {
    var offset = VLTJS.window.outerHeight() + 100;
    if (scroll > offset) {
      if (type === 'down') {
        _hide_btn();
      } else if (type === 'up') {
        _show_btn();
      }
    } else {
      _hide_btn();
    }
  });
  backToTopBtn.on('click', function (e) {
    e.preventDefault();
    VLTJS.html.scrollTo(0, 500);
  });
})(jQuery);
/***********************************************
 * THEME: SEARCH POPUP
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof gsap == 'undefined') {
    return;
  }
  var searchIsOpen = false;
  VLTJS.searchPopup = {
    config: {
      easing: 'power2.out'
    },
    init: function () {
      var search = $('.vlt-search-popup'),
        searchOpen = $('.js-search-form-open'),
        searchClose = $('.js-search-form-close'),
        siteOverlay = $('.vlt-site-overlay');
      searchOpen.on('click', function (e) {
        e.preventDefault();
        if (!searchIsOpen) {
          VLTJS.searchPopup.open_search(search, siteOverlay);
        }
      });
      searchClose.on('click', function (e) {
        e.preventDefault();
        if (searchIsOpen) {
          VLTJS.searchPopup.close_search(search, siteOverlay);
        }
      });
      siteOverlay.on('click', function (e) {
        e.preventDefault();
        if (searchIsOpen) {
          VLTJS.searchPopup.close_search(search, siteOverlay);
        }
      });
      VLTJS.document.on('keyup', function (e) {
        if (e.keyCode === 27 && searchIsOpen) {
          e.preventDefault();
          VLTJS.searchPopup.close_search(search, siteOverlay);
        }
      });
    },
    open_search: function (search, siteOverlay) {
      searchIsOpen = true;
      setTimeout(function () {
        search.find('input[type="text"]').focus();
      }, 50);
      gsap.timeline({
        defaults: {
          ease: this.config.easing
        }
      })
      // set overflow for html
      .set(VLTJS.html, {
        overflow: 'hidden'
      })
      // overlay animation
      .to(siteOverlay, .3, {
        autoAlpha: 1
      })
      // search animation
      .fromTo(search, .6, {
        y: '-100%'
      }, {
        y: 0,
        visibility: 'visible'
      }, '-=.3');
      if (VLT_LOCALIZE_DATAS.open_click_sound && typeof Howl !== 'undefined') {
        new Howl({
          src: [VLT_LOCALIZE_DATAS.open_click_sound],
          autoplay: true,
          loop: false,
          volume: 0.3
        });
      }
    },
    close_search: function (search, siteOverlay) {
      searchIsOpen = false;
      gsap.timeline({
        defaults: {
          ease: this.config.easing
        }
      })
      // set overflow for html
      .set(VLTJS.html, {
        overflow: 'inherit'
      })
      // search animation
      .to(search, .6, {
        y: '-100%'
      })
      // set search visiblity after hide
      .set(search, {
        visibility: 'hidden'
      })
      // overlay animation
      .to(siteOverlay, .3, {
        autoAlpha: 0
      }, '-=.6');
      if (typeof VLT_LOCALIZE_DATAS.close_click_sound && typeof Howl !== 'undefined') {
        new Howl({
          src: [VLT_LOCALIZE_DATAS.close_click_sound],
          autoplay: true,
          loop: false,
          volume: 0.3
        });
      }
    }
  };
  VLTJS.searchPopup.init();
})(jQuery);
/***********************************************
 * THEME: SITE FULLSCREEN
 ***********************************************/
(function ($) {
  'use strict';

  var isFullscreen = false;
  VLTJS.fullscreenSite = {
    init: function () {
      var fullscreenToggle = $('.js-site-fullscreen-toggle'),
        documentElement = document.documentElement;
      fullscreenToggle.on('click', function (e) {
        e.preventDefault();
        if (!isFullscreen) {
          VLTJS.fullscreenSite.open_fullscreen(fullscreenToggle, documentElement);
        } else {
          VLTJS.fullscreenSite.close_fullscreen(fullscreenToggle);
        }
      });
    },
    open_fullscreen: function (fullscreenToggle, documentElement) {
      isFullscreen = true;
      fullscreenToggle.find('i').removeClass('ri-fullscreen-fill').addClass('ri-fullscreen-exit-fill');
      if (documentElement.requestFullscreen) {
        documentElement.requestFullscreen();
      } else if (documentElement.mozRequestFullScreen) {
        /* Firefox */
        documentElement.mozRequestFullScreen();
      } else if (documentElement.webkitRequestFullscreen) {
        /* Chrome, Safari and Opera */
        documentElement.webkitRequestFullscreen();
      } else if (documentElement.msRequestFullscreen) {
        /* IE/Edge */
        documentElement.msRequestFullscreen();
      }
    },
    close_fullscreen: function (fullscreenToggle) {
      isFullscreen = false;
      fullscreenToggle.find('i').removeClass('ri-fullscreen-exit-fill').addClass('ri-fullscreen-fill');
      if (document.exitFullscreen) {
        document.exitFullscreen();
      } else if (document.mozCancelFullScreen) {
        /* Firefox */
        document.mozCancelFullScreen();
      } else if (document.webkitExitFullscreen) {
        /* Chrome, Safari and Opera */
        document.webkitExitFullscreen();
      } else if (document.msExitFullscreen) {
        /* IE/Edge */
        document.msExitFullscreen();
      }
    }
  };
  VLTJS.fullscreenSite.init();
})(jQuery);
/***********************************************
 * THEME: PRELOADER
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof $.fn.animsition == 'undefined') {
    VLTJS.window.trigger('vlt.site-loaded');
    VLTJS.html.addClass('vlt-is-page-loaded');
    return;
  }
  var preloader = $('.animsition'),
    preloaderStyle = VLTJS.body.data('animsition-style'),
    //animsition-bounce, animsition-image
    loadingInner;
  switch (preloaderStyle) {
    case 'animsition-bounce':
      loadingInner = '<span class="double-bounce-one"></span><span class="double-bounce-two"></span>';
      break;
    case 'animsition-image':
      if (VLT_LOCALIZE_DATAS.preloader_image) {
        loadingInner = '<img src="' + VLT_LOCALIZE_DATAS.preloader_image + '" alt="preloader">';
      }
      break;
  }
  if (preloader.length) {
    preloader.animsition({
      inDuration: 500,
      outDuration: 500,
      loadingParentElement: 'html',
      linkElement: 'a:not(.remove):not(.vp-pagination__load-more):not(.elementor-accordion-title):not([href="javascript:;"]):not([role="slider"]):not([data-elementor-open-lightbox]):not([data-fancybox]):not([data-vp-filter]):not([target="_blank"]):not([href^="#"]):not([rel="nofollow"]):not([href~="#"]):not([href^=mailto]):not([href^=tel]):not(.sf-with-ul):not(.elementor-toggle-title)',
      loadingClass: preloaderStyle,
      loadingInner: loadingInner
    });
    preloader.on('animsition.inEnd', function () {
      VLTJS.window.trigger('vlt.site-loaded');
      VLTJS.html.addClass('vlt-is-page-loaded');
    });
  } else {
    VLTJS.window.trigger('vlt.site-loaded');
    VLTJS.html.addClass('vlt-is-page-loaded');
  }
})(jQuery);
/***********************************************
 * THEME: SITE PROTECTION
 ***********************************************/
(function ($) {
  'use strict';

  if (!VLTJS.html.hasClass('vlt-is--site-protection')) {
    return;
  }
  var isClicked = false;
  VLTJS.document.bind('contextmenu', function (e) {
    e.preventDefault();
    if (!isClicked) {
      $('.vlt-site-protection').addClass('is-visible');
      VLTJS.body.addClass('is-right-clicked');
      isClicked = true;
    }
    VLTJS.document.on('mousedown', function () {
      $('.vlt-site-protection').removeClass('is-visible');
      VLTJS.body.removeClass('is-right-clicked');
      isClicked = false;
    });
    isClicked = false;
  });
})(jQuery);
/***********************************************
 * THEME: STICKY NAVBAR
 ***********************************************/
(function ($) {
  'use strict';

  VLTJS.stickyNavbar = {
    init: function () {
      var navbarMain = $('.vlt-header:not(.vlt-header--slide) .vlt-navbar--main'),
        topBarHeight = $('.vlt-top-bar').outerHeight() || 0;
      navbarMain.each(function () {
        var $this = $(this);

        // sticky navbar
        var navbarHeight = $this.length ? $this.outerHeight() : 0,
          navbarMainOffset = $this.hasClass('vlt-navbar--offset') ? VLTJS.window.outerHeight() : navbarHeight + topBarHeight;

        // fake navbar
        var navbarFake = $('<div class="vlt-fake-navbar">').hide();
        function _fixed_navbar() {
          $this.addClass('vlt-navbar--fixed');
          navbarFake.show();
        }
        function _unfixed_navbar() {
          $this.removeClass('vlt-navbar--fixed');
          navbarFake.hide();
        }
        function _on_scroll_navbar() {
          if (VLTJS.window.scrollTop() >= navbarMainOffset) {
            _fixed_navbar();
          } else {
            _unfixed_navbar();
          }
        }
        if ($this.hasClass('vlt-navbar--sticky')) {
          VLTJS.window.on('scroll resize', _on_scroll_navbar);
          _on_scroll_navbar();

          // append fake navbar
          $this.after(navbarFake);

          // fake navbar height after resize
          navbarFake.height($this.innerHeight());
          VLTJS.debounceResize(function () {
            navbarFake.height($this.innerHeight());
          });
        }

        // hide navbar on scroll
        var navbarHideOnScroll = $this.filter('.vlt-navbar--hide-on-scroll');
        VLTJS.throttleScroll(function (type, scroll) {
          var start = 450;
          function _show_navbar() {
            navbarHideOnScroll.removeClass('vlt-on-scroll-hide').addClass('vlt-on-scroll-show');
          }
          function _hide_navbar() {
            navbarHideOnScroll.removeClass('vlt-on-scroll-show').addClass('vlt-on-scroll-hide');
          }

          // hide or show
          if (type === 'down' && scroll > start) {
            _hide_navbar();
          } else if (type === 'up' || type === 'end' || type === 'start') {
            _show_navbar();
          }

          // add solid color
          if ($this.hasClass('vlt-navbar--transparent') && $this.hasClass('vlt-navbar--sticky')) {
            scroll > navbarHeight ? $this.addClass('vlt-navbar--solid') : $this.removeClass('vlt-navbar--solid');
          }

          // sticky column fix
          if ($this.hasClass('vlt-navbar--fixed') && $this.hasClass('vlt-navbar--sticky') && !$this.hasClass('vlt-on-scroll-hide')) {
            VLTJS.html.addClass('vlt-is--header-fixed');
          } else {
            VLTJS.html.removeClass('vlt-is--header-fixed');
          }
        });
      });
    }
  };
  VLTJS.stickyNavbar.init();
})(jQuery);
/***********************************************
 * THEME: WOOCOMMERCE
 ***********************************************/
(function ($) {
  'use strict';

  VLTJS.wooCommerce = {
    init: function () {
      VLTJS.document.on('click', '.vlt-quantity .plus, .vlt-quantity .minus', function () {
        var $this = $(this),
          $qty = $this.siblings('.qty'),
          current = parseInt($qty.val(), 10),
          min = parseInt($qty.attr('min'), 10),
          max = parseInt($qty.attr('max'), 10),
          step = parseInt($qty.attr('step'), 10);
        min = min ? min : 1;
        max = max ? max : current + step;
        if ($this.hasClass('minus') && current > min) {
          $qty.val(current - step);
          $qty.trigger('change');
        }
        if ($this.hasClass('plus') && current < max) {
          $qty.val(current + step);
          $qty.trigger('change');
        }
        return false;
      });
    }
  };
  VLTJS.wooCommerce.init();
})(jQuery);
/***********************************************
 * WIDGET: ALERT MESSAGE
 ***********************************************/
(function ($) {
  'use strict';

  VLTJS.alertMessage = {
    init: function ($scope) {
      var alert = $scope.find('.vlt-alert-message');
      alert.on('click', '.vlt-alert-message__dismiss', function (e) {
        e.preventDefault();
        $scope.fadeOut(500);
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-alert-message.default', VLTJS.alertMessage.init);
  });
})(jQuery);
/***********************************************
 * WIDGET: AWARDS
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof Swiper === 'undefined') {
    return;
  }
  VLTJS.awards = {
    init: function ($scope) {
      var awards = $scope.find('.vlt-awards'),
        speed = awards.data('speed');
      new Swiper(awards.get(0), {
        spaceBetween: 0,
        loop: false,
        slidesPerView: 'auto',
        grabCursor: true,
        speed: speed,
        freeMode: true
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-awards.default', VLTJS.awards.init);
  });
})(jQuery);
/***********************************************
 * WIDGET: BUTTON
 ***********************************************/
(function ($) {
  'use strict';

  VLTJS.button = {
    init: function ($scope) {
      var el = $scope.find('.vlt-btn.vlt-btn--effect');
      el.each(function () {
        var $this = $(this);
        if (!$this.find('.vlt-btn__content').length) {
          $this.wrapInner('<span class="vlt-btn__content"></span>');
          $this.find('.vlt-btn__content').clone().attr('aria-hidden', true).appendTo($this);
        }
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-button.default', VLTJS.button.init);
    elementorFrontend.hooks.addAction('frontend/element_ready/wp-widget-mc4wp_form_widget.default', VLTJS.button.init);
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-showcase-2.default', VLTJS.button.init);
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-showcase-3.default', VLTJS.button.init);
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-showcase-5.default', VLTJS.button.init);
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-showcase-7.default', VLTJS.button.init);
  });
  VLTJS.button.init(VLTJS.body);
  VLTJS.document.on('init.vpf endLoadingNewItems.vpf', function (e) {
    VLTJS.button.init(VLTJS.body);
  });
})(jQuery);
/***********************************************
 * WIDGET: CONTENT SLIDER
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof Swiper === 'undefined') {
    return;
  }
  VLTJS.contentSlider = {
    init: function ($scope) {
      var slider = $scope.find('.vlt-content-slider'),
        anchor = slider.data('navigation-anchor'),
        gap = slider.data('gap') || 0,
        loop = slider.data('loop') == 'yes' ? true : false,
        speed = slider.data('speed') || 1000,
        autoplay = slider.data('autoplay') == 'yes' ? true : false,
        centered = slider.data('slides-centered') == 'yes' ? true : false,
        freemode = slider.data('free-mode') == 'yes' ? true : false,
        slider_offset = slider.data('slider-offset') == 'yes' ? true : false,
        mousewheel = slider.data('mousewheel') == 'yes' ? true : false,
        autoplay_speed = slider.data('autoplay-speed'),
        settings = slider.data('slide-settings');
      var swiper = new Swiper(slider.get(0), {
        init: false,
        spaceBetween: gap,
        grabCursor: true,
        initialSlide: settings.initial_slide ? settings.initial_slide : 0,
        loop: loop,
        speed: speed,
        centeredSlides: centered,
        freeMode: freemode,
        mousewheel: mousewheel,
        autoplay: autoplay ? {
          delay: autoplay_speed,
          disableOnInteraction: false
        } : false,
        autoHeight: true,
        slidesOffsetBefore: slider_offset ? $('.container').get(0).getBoundingClientRect().left + 15 : false,
        slidesOffsetAfter: slider_offset ? $('.container').get(0).getBoundingClientRect().left + 15 : false,
        navigation: {
          nextEl: $(anchor).find('.vlt-swiper-button-next').get(0),
          prevEl: $(anchor).find('.vlt-swiper-button-prev').get(0)
        },
        pagination: {
          el: $(anchor).find('.vlt-swiper-pagination').get(0),
          clickable: false,
          type: 'fraction',
          renderFraction: function (currentClass, totalClass) {
            return '<span class="' + currentClass + '"></span>' + '<span class="sep">/</span>' + '<span class="' + totalClass + '"></span>';
          }
        },
        breakpoints: {
          // when window width is >= 576px
          576: {
            slidesPerView: settings.slides_to_show_mobile || settings.slides_to_show_tablet || settings.slides_to_show || 1,
            slidesPerGroup: settings.slides_to_scroll_mobile || settings.slides_to_scroll_tablet || settings.slides_to_scroll || 1
          },
          // when window width is >= 768px
          768: {
            slidesPerView: settings.slides_to_show_tablet || settings.slides_to_show || 1,
            slidesPerGroup: settings.slides_to_scroll_tablet || settings.slides_to_scroll || 1
          },
          // when window width is >= 992px
          992: {
            slidesPerView: settings.slides_to_show || 1,
            slidesPerGroup: settings.slides_to_scroll || 1
          }
        }
      });
      swiper.on('init slideChange', function () {
        var el = $(anchor).find('.vlt-slider-controls'),
          current = swiper.realIndex,
          total = slider.find('.swiper-slide:not(.swiper-slide-duplicate)').length,
          scale = (current + 1) / total;
        if (el.data('direction') == 'vertical') {
          el.find('.current').text(VLTJS.addLedingZero(current + 1));
          el.find('.total').text(VLTJS.addLedingZero(total));
        } else {
          el.find('.current').text(current + 1);
          el.find('.total').text(total);
        }
        if (el.length && el.find('.bar > span').length) {
          el.find('.bar > span')[0].style.setProperty('--scaleX', scale);
          el.find('.bar > span')[0].style.setProperty('--speed', swiper.params.speed + 'ms');
        }
      });
      swiper.init();
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-content-slider.default', VLTJS.contentSlider.init);
  });
})(jQuery);
/***********************************************
 * WIDGET: COUNTDOWN
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof $.fn.countdown === 'undefined') {
    return;
  }
  VLTJS.countdown = {
    init: function ($scope) {
      var countdown = $scope.find('.vlt-countdown'),
        due_date = countdown.data('due-date') || false;
      countdown.countdown(due_date, function (event) {
        countdown.find('[data-weeks]').html(event.strftime('%W'));
        countdown.find('[data-days]').html(event.strftime('%D'));
        countdown.find('[data-hours]').html(event.strftime('%H'));
        countdown.find('[data-minutes]').html(event.strftime('%M'));
        countdown.find('[data-seconds]').html(event.strftime('%S'));
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-countdown.default', VLTJS.countdown.init);
  });
})(jQuery);
/***********************************************
 * WIDGET: COUNTER UP
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof $.fn.numerator == 'undefined') {
    return;
  }
  VLTJS.counterUp = {
    init: function ($scope) {
      var counterUp = $scope.find('.vlt-counter-up'),
        animation_duration = counterUp.data('animation-speed') || 1000,
        ending_number = counterUp.find('.counter'),
        ending_number_value = ending_number.text(),
        delimiter = counterUp.data('delimiter') ? counterUp.data('delimiter') : ',';
      if (counterUp.hasClass('vlt-counter-up--style-2')) {
        ending_number.css({
          'min-width': ending_number.outerWidth() + 'px'
        });
      }
      counterUp.one('inview', function () {
        ending_number.text('0');
        ending_number.numerator({
          easing: 'linear',
          duration: animation_duration,
          delimiter: delimiter,
          toValue: ending_number_value
        });
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-counter-up.default', VLTJS.counterUp.init);
  });
})(jQuery);
/***********************************************
 * WIDGET: FANCY TEXT
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof Typed == 'undefined') {
    return;
  }

  // check if plugin defined
  if (typeof $.fn.Morphext == 'undefined') {
    return;
  }
  VLTJS.fancyText = {
    init: function ($scope) {
      var fancyText = $scope.find('.vlt-fancy-text'),
        strings = fancyText.find('.strings'),
        fancy_text = fancyText.data('fancy-text') || '',
        fancy_text = fancy_text.split('|'),
        animation_type = fancyText.data('animation-type') || '',
        typing_speed = fancyText.data('typing-speed') || '',
        delay = fancyText.data('delay') || '',
        type_cursor = fancyText.data('type-cursor') == 'yes' ? true : false,
        type_cursor_symbol = fancyText.data('type-cursor-symbol') || '|',
        typing_loop = fancyText.data('typing-loop') == 'yes' ? true : false;
      if (animation_type == 'typing') {
        new Typed(strings.get(0), {
          strings: fancy_text,
          typeSpeed: typing_speed,
          backSpeed: 0,
          startDelay: 300,
          backDelay: delay,
          showCursor: type_cursor,
          cursorChar: type_cursor_symbol,
          loop: typing_loop
        });
      } else {
        strings.show().Morphext({
          animation: animation_type,
          separator: ', ',
          speed: delay,
          complete: function () {
            // Overrides default empty function
          }
        });
      }
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-fancy-text.default', VLTJS.fancyText.init);
  });
})(jQuery);
/***********************************************
 * WIDGET: GOOGLE MAP
 ***********************************************/
(function ($) {
  'use strict';

  VLTJS.googleMap = {
    init: function ($scope) {
      var googleMap = $scope.find('.vlt-google-map'),
        map_lat = googleMap.data('map-lat'),
        map_lng = googleMap.data('map-lng'),
        map_zoom = googleMap.data('map-zoom'),
        map_gesture_handling = googleMap.data('map-gesture-handling'),
        map_zoom_control = googleMap.data('map-zoom-control') ? true : false,
        map_zoom_control_position = googleMap.data('map-zoom-control-position'),
        map_default_ui = googleMap.data('map-default-ui') ? false : true,
        map_type = googleMap.data('map-type'),
        map_type_control = googleMap.data('map-type-control') ? true : false,
        map_type_control_style = googleMap.data('map-type-control-style'),
        map_type_control_position = googleMap.data('map-type-control-position'),
        map_streetview_control = googleMap.data('map-streetview-control') ? true : false,
        map_streetview_position = googleMap.data('map-streetview-position'),
        map_info_window_width = googleMap.data('map-info-window-width'),
        map_locations = googleMap.data('map-locations'),
        map_styles = googleMap.data('map-style') || '',
        infowindow,
        map;
      function initMap() {
        var myLatLng = {
          lat: parseFloat(map_lat),
          lng: parseFloat(map_lng)
        };
        if (typeof google === 'undefined') {
          return;
        }
        var map = new google.maps.Map(googleMap[0], {
          center: myLatLng,
          zoom: map_zoom,
          disableDefaultUI: map_default_ui,
          zoomControl: map_zoom_control,
          zoomControlOptions: {
            position: google.maps.ControlPosition[map_zoom_control_position]
          },
          mapTypeId: map_type,
          mapTypeControl: map_type_control,
          mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle[map_type_control_style],
            position: google.maps.ControlPosition[map_type_control_position]
          },
          streetViewControl: map_streetview_control,
          streetViewControlOptions: {
            position: google.maps.ControlPosition[map_streetview_position]
          },
          styles: map_styles,
          gestureHandling: map_gesture_handling
        });
        $.each(map_locations, function (index, googleMapement, content) {
          var content = '\
					<div class="vlt-google-map__container">\
					<h6>' + googleMapement.title + '</h6>\
					<div>' + googleMapement.text + '</div>\
					</div>';
          var icon = '';
          if (googleMapement.pin_icon !== '') {
            if (googleMapement.pin_icon_custom) {
              icon = googleMapement.pin_icon_custom;
            } else {
              icon = '';
            }
          }
          var marker = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng(parseFloat(googleMapement.lat), parseFloat(googleMapement.lng)),
            animation: google.maps.Animation.DROP,
            icon: icon
          });
          if (googleMapement.title !== '' && googleMapement.text !== '') {
            addInfoWindow(marker, content);
          }
          google.maps.event.addListener(marker, 'click', toggleBounce);
          function toggleBounce() {
            if (marker.getAnimation() != null) {
              marker.setAnimation(null);
            } else {
              marker.setAnimation(google.maps.Animation.BOUNCE);
            }
          }
        });
      }
      function addInfoWindow(marker, content) {
        google.maps.event.addListener(marker, 'click', function () {
          if (!infowindow) {
            infowindow = new google.maps.InfoWindow({
              maxWidth: map_info_window_width
            });
          }
          infowindow.setContent(content);
          infowindow.open(map, marker);
        });
      }
      initMap();
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-google-map.default', VLTJS.googleMap.init);
  });
})(jQuery);
/***********************************************
 * WIDGET: IMAGES COMPARE
 ***********************************************/
(function ($) {
  'use strict';

  VLTJS.imagesCompare = {
    init: function ($scope) {
      var imagesCompare = $scope.find('.vlt-images-compare'),
        disabledTransition = false,
        currentImageCompare = false;
      function _move_position(e) {
        if (currentImageCompare) {
          const rect = currentImageCompare[0].getBoundingClientRect();
          const offsetX = Math.max(0, Math.min(1, (e.clientX - rect.left) / rect.width));
          currentImageCompare.css('--vlt-image-compare__position', 100 * offsetX + '%');
        }
      }
      imagesCompare.on('mousedown', function (e) {
        e.preventDefault();
        currentImageCompare = $(this);
      });
      VLTJS.document.on('mouseup', function (e) {
        if (currentImageCompare) {
          _move_position(e);
          imagesCompare.css('--vlt-image-compare__transition-duration', '');
          currentImageCompare = false;
          disabledTransition = false;
        }
      });
      VLTJS.document.on('mousemove', function (e) {
        if (currentImageCompare) {
          e.preventDefault();
          if (!disabledTransition) {
            currentImageCompare.css('--vlt-image-compare__transition-duration', '0s');
            disabledTransition = true;
          }
        }
      });
      VLTJS.document.on('mousemove', function (e) {
        _move_position(e);
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-images-compare.default', VLTJS.imagesCompare.init);
  });
})(jQuery);
/***********************************************
 * WIDGET: JUSTIFIED GALLERY
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof $.fn.justifiedGallery == 'undefined') {
    return;
  }
  VLTJS.justifiedGallery = {
    init: function ($scope) {
      var justifiedGallery = $scope.find('.vlt-justified-gallery'),
        row_height = justifiedGallery.data('row-height') || 360,
        margins = justifiedGallery.data('margins') || 0;
      justifiedGallery.imagesLoaded(function () {
        justifiedGallery.justifiedGallery({
          rowHeight: row_height,
          margins: margins,
          captions: false,
          border: 0
        });
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-justified-gallery.default', VLTJS.justifiedGallery.init);
  });
})(jQuery);
/***********************************************
 * WIDGET: MARQUEE TEXT
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof gsap == 'undefined') {
    return;
  }
  VLTJS.marqueeEffect = {
    init: function ($scope) {
      $scope.find('[data-marquee]').each(function () {
        var $this = $(this),
          speed = $this.data('marquee') || 0.5,
          marqueeText = $this.find('[data-marquee-text]'),
          elWidth = marqueeText.outerWidth(),
          elHeight = marqueeText.outerHeight(),
          duration = elWidth / elHeight * speed + 's';
        gsap.set(marqueeText, {
          animationDuration: duration
        });
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-marquee-text.default', VLTJS.marqueeEffect.init);
  });
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-team-member.default', VLTJS.marqueeEffect.init);
  });
  VLTJS.marqueeEffect.init(VLTJS.body);
  VLTJS.document.on('init.vpf endLoadingNewItems.vpf', function (e) {
    VLTJS.marqueeEffect.init(VLTJS.body);
  });
})(jQuery);
/***********************************************
 * WIDGET: PIE CHART
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof $.fn.circleProgress === 'undefined') {
    return;
  }
  if (typeof gsap === 'undefined') {
    return;
  }
  VLTJS.pieChart = {
    init: function ($scope) {
      var chart = $scope.find('.vlt-pie-chart'),
        bar = chart.find('.vlt-pie-chart__bar'),
        chart_value = chart.data('chart-value') || 0,
        chart_animation_duration = chart.data('chart-animation-duration') || 0,
        chart_height = chart.data('chart-height') || 0,
        chart_thickness = chart.data('chart-thickness') || 0,
        chart_track_color = chart.data('chart-track-color') || '',
        chart_bar_color = chart.data('chart-bar-color') || '',
        delay = 150,
        obj = {
          count: 0
        };

      // predraw
      bar.circleProgress({
        startAngle: -Math.PI / 2,
        value: 0,
        size: chart_height,
        thickness: chart_thickness,
        fill: chart_bar_color,
        emptyFill: chart_track_color,
        animation: {
          duration: chart_animation_duration,
          easing: 'circleProgressEasing',
          delay: delay
        }
      });
      chart.one('inview', function () {
        bar.circleProgress({
          value: chart_value / 100
        });
        gsap.to(obj, chart_animation_duration / 1000, {
          count: chart_value,
          delay: delay / 1000,
          onUpdate: function () {
            chart.find('.vlt-pie-chart__title > .counter').text(Math.round(obj.count));
          }
        });
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-pie-chart.default', VLTJS.pieChart.init);
  });
})(jQuery);
/***********************************************
 * WIDGET: PROGRESS BAR
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof gsap === 'undefined') {
    return;
  }
  VLTJS.progressBar = {
    init: function ($scope) {
      var progressBar = $scope.find('.vlt-progress-bar'),
        final_value = progressBar.data('final-value') || 0,
        animation_duration = progressBar.data('animation-speed') || 0,
        delay = 150,
        obj = {
          count: 0
        };
      progressBar.one('inview', function () {
        gsap.to(obj, animation_duration / 1000 / 2, {
          count: final_value,
          delay: delay / 1000,
          onUpdate: function () {
            progressBar.find('.vlt-progress-bar__title > .counter').text(Math.round(obj.count));
          }
        });
        gsap.to(progressBar.filter('.vlt-progress-bar--default').find('.vlt-progress-bar__track > .bar'), animation_duration / 1000, {
          width: final_value + '%',
          delay: delay / 1000
        });
        gsap.to(obj, animation_duration / 1000, {
          count: final_value,
          delay: delay / 1000,
          onUpdate: function () {
            progressBar.filter('.vlt-progress-bar--dotted').find('.vlt-progress-bar__track > .bar').css('clip-path', 'inset(0 ' + (100 - Math.round(obj.count)) + '% 0 0)');
          }
        });
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-progress-bar.default', VLTJS.progressBar.init);
  });
})(jQuery);
/***********************************************
 * WIDGET: SIMPLE GIST
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof $.fn.gistsimple === 'undefined') {
    return;
  }
  VLTJS.simpleGist = {
    init: function ($scope) {
      var gist = $scope.find('.gist-simple'),
        match = /^https:\/\/gist.github.com?.+\/(.+)/g.exec(gist.data('url'));
      if (match && 'undefined' !== typeof match[1]) {
        gist.gistsimple({
          id: match[1],
          file: gist.data('file'),
          lines: gist.data('lines'),
          caption: gist.data('caption'),
          highlightLines: gist.data('highlight-lines'),
          showFooter: gist.data('show-footer') == 'yes' ? true : false,
          showLineNumbers: gist.data('show-line-numbers') == 'yes' ? true : false
        });
      }
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-simple-gist.default', VLTJS.simpleGist.init);
  });
})(jQuery);
/***********************************************
 * WIDGET: TYPES LIST
 ***********************************************/
(function ($) {
  'use strict';

  VLTJS.typesList = {
    init: function ($scope) {
      var types = $scope.find('.vlt-types'),
        typesList = types.find('.vlt-types-list'),
        typesListItem = typesList.find('.vlt-types-list__item'),
        background = types.find('.vlt-types-background'),
        backgroundImage = background.find('.vlt-types-background__image');
      typesListItem.on('mouseenter', function () {
        var $this = $(this),
          index = $this.index(),
          nearby = $this.siblings('.vlt-types-list__item');
        VLTJS.typesList.add_opacity(nearby);
        VLTJS.typesList.current_background(index, backgroundImage);
      }).on('mouseleave', function () {
        VLTJS.typesList.remove_opacity(typesListItem);
      });
      typesList.on('mouseenter', function () {
        typesList.addClass('is-active');
        background.addClass('is-active');
      }).on('mouseleave', function () {
        typesList.removeClass('is-active');
        backgroundImage.removeClass('is-active');
        background.removeClass('is-active');
      });
    },
    add_opacity: function (nearby) {
      nearby.each(function () {
        $(this).addClass('is-opacity');
      });
    },
    current_background: function (index, backgroundImage) {
      backgroundImage.removeClass('is-active');
      backgroundImage.eq(index).addClass('is-active');
    },
    remove_opacity: function (typesListItem) {
      typesListItem.removeClass('is-opacity');
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-types-list.default', VLTJS.typesList.init);
  });
})(jQuery);
/***********************************************
 * SHOWCASE: STYLE 1
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof Swiper === 'undefined') {
    return;
  }
  var showcaseStyle1 = function ($scope, $) {
    var showcase = $scope.find('.vlt-showcase--style-1'),
      anchor = showcase.data('navigation-anchor');
    var swiper = new Swiper(showcase.get(0), {
      init: false,
      lazy: true,
      speed: 1000,
      loop: true,
      grabCursor: true,
      spaceBetween: 100,
      slidesPerView: 1,
      navigation: {
        nextEl: $(anchor).find('.vlt-swiper-button-next').get(0),
        prevEl: $(anchor).find('.vlt-swiper-button-prev').get(0)
      },
      pagination: {
        el: $(anchor).find('.vlt-swiper-pagination').get(0),
        clickable: false,
        type: 'fraction',
        renderFraction: function (currentClass, totalClass) {
          return '<span class="' + currentClass + '"></span>' + '<span class="sep">/</span>' + '<span class="' + totalClass + '"></span>';
        }
      }
    });
    swiper.on('init slideChange', function () {
      var el = $(anchor).find('.vlt-swiper-progress'),
        current = swiper.realIndex,
        total = showcase.find('.swiper-slide').not('.swiper-slide-duplicate').length,
        scale = (current + 1) / total;
      if (el.data('direction') == 'vertical') {
        el.find('.current').text(VLTJS.addLedingZero(current + 1));
        el.find('.total').text(VLTJS.addLedingZero(total));
      } else {
        el.find('.current').text(current + 1);
        el.find('.total').text(total);
      }
      if (el.length && el.find('.bar > span').length) {
        el.find('.bar > span')[0].style.setProperty('--scaleX', scale);
        el.find('.bar > span')[0].style.setProperty('--speed', swiper.params.speed + 'ms');
      }
    });
    swiper.init();
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-showcase-1.default', showcaseStyle1);
  });
})(jQuery);
/***********************************************
 * SHOWCASE: STYLE 10
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof Swiper === 'undefined') {
    return;
  }
  var showcaseStyle10 = function ($scope, $) {
    var showcase = $scope.find('.vlt-showcase--style-10'),
      anchor = showcase.data('navigation-anchor');
    var swiper = new Swiper(showcase.get(0), {
      init: false,
      lazy: true,
      loop: false,
      mousewheel: {
        releaseOnEdges: true
      },
      slidesPerView: 1,
      speed: 1000,
      touchReleaseOnEdges: true,
      breakpoints: {
        // when window width is >= 576px
        576: {
          slidesPerView: 1
        },
        // when window width is >= 768px
        768: {
          slidesPerView: 2
        },
        // when window width is >= 992px
        992: {
          slidesPerView: 3
        }
      },
      navigation: {
        nextEl: $(anchor).find('.vlt-swiper-button-next').get(0),
        prevEl: $(anchor).find('.vlt-swiper-button-prev').get(0)
      },
      pagination: {
        el: $(anchor).find('.vlt-swiper-pagination').get(0),
        clickable: false,
        type: 'fraction',
        renderFraction: function (currentClass, totalClass) {
          return '<span class="' + currentClass + '"></span>' + '<span class="sep">/</span>' + '<span class="' + totalClass + '"></span>';
        }
      }
    });
    VLTJS.document.on('keyup', function (e) {
      if (e.keyCode == 37) {
        // left
        swiper.slidePrev();
      } else if (e.keyCode == 39) {
        // right
        swiper.slideNext();
      }
    });
    swiper.on('init slideChange', function () {
      var el = $(anchor).find('.vlt-swiper-progress'),
        current = swiper.realIndex,
        total = showcase.find('.swiper-slide').not('.swiper-slide-duplicate').length,
        scale = (current + 1) / total;
      if (el.data('direction') == 'vertical') {
        el.find('.current').text(VLTJS.addLedingZero(current + 1));
        el.find('.total').text(VLTJS.addLedingZero(total));
      } else {
        el.find('.current').text(current + 1);
        el.find('.total').text(total);
      }
      if (el.length && el.find('.bar > span').length) {
        el.find('.bar > span')[0].style.setProperty('--scaleX', scale);
        el.find('.bar > span')[0].style.setProperty('--speed', swiper.params.speed + 'ms');
      }
    });
    swiper.init();
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-showcase-10.default', showcaseStyle10);
  });
})(jQuery);
/***********************************************
 * SHOWCASE: STYLE 11
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof tippy === 'undefined') {
    return;
  }
  var showcaseStyle11 = function ($scope, $) {
    var showcase = $scope.find('.vlt-showcase--style-11'),
      item = showcase.find('.vlt-showcase-item');
    item.each(function () {
      tippy(this, {
        arrow: false,
        distance: '1rem',
        duration: [500, 0],
        maxWidth: 800,
        allowHTML: true
      });
    });
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-showcase-11.default', showcaseStyle11);
  });
})(jQuery);
/***********************************************
* SHOWCASE: STYLE 12
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof Swiper === 'undefined') {
    return;
  }
  var showcaseStyle12 = function ($scope, $) {
    var showcase = $scope.find('.vlt-showcase--style-12'),
      showcaseInfo = showcase.find('.vlt-showcase-info'),
      listItem = showcase.find('.vlt-showcase-link');
    var swiper = new Swiper(showcaseInfo.get(0), {
      init: false,
      lazy: true,
      spaceBetween: 30,
      speed: 1000,
      allowTouchMove: false
    });
    swiper.init();
    listItem.eq(0).addClass('is-active');
    listItem.on('mouseenter', function () {
      var $this = $(this);
      listItem.removeClass('is-active');
      $this.addClass('is-active');
      swiper.slideTo($this.index());
    });
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-showcase-12.default', showcaseStyle12);
  });
})(jQuery);
/***********************************************
 * SHOWCASE: STYLE 2
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof Swiper === 'undefined') {
    return;
  }
  var showcaseStyle2 = function ($scope, $) {
    var showcase = $scope.find('.vlt-showcase--style-2'),
      anchor = showcase.data('navigation-anchor');
    var swiper = new Swiper(showcase.get(0), {
      init: false,
      direction: 'vertical',
      lazy: true,
      loop: false,
      parallax: true,
      slidesPerView: 1,
      grabCursor: true,
      speed: 1000,
      navigation: {
        nextEl: $(anchor).find('.vlt-swiper-button-next').get(0),
        prevEl: $(anchor).find('.vlt-swiper-button-prev').get(0)
      },
      pagination: {
        el: $(anchor).find('.vlt-swiper-pagination').get(0),
        clickable: false,
        type: 'fraction',
        renderFraction: function (currentClass, totalClass) {
          return '<span class="' + currentClass + '"></span>' + '<span class="sep">/</span>' + '<span class="' + totalClass + '"></span>';
        }
      }
    });
    VLTJS.document.on('keyup', function (e) {
      if (e.keyCode == 37) {
        // left
        swiper.slidePrev();
      } else if (e.keyCode == 39) {
        // right
        swiper.slideNext();
      }
    });
    swiper.on('init slideChange', function () {
      var el = $(anchor).find('.vlt-swiper-progress'),
        current = swiper.realIndex,
        total = showcase.find('.swiper-slide').not('.swiper-slide-duplicate').length,
        scale = (current + 1) / total;
      if (el.data('direction') == 'vertical') {
        el.find('.current').text(VLTJS.addLedingZero(current + 1));
        el.find('.total').text(VLTJS.addLedingZero(total));
      } else {
        el.find('.current').text(current + 1);
        el.find('.total').text(total);
      }
      if (el.length && el.find('.bar > span').length) {
        el.find('.bar > span')[0].style.setProperty('--scaleX', scale);
        el.find('.bar > span')[0].style.setProperty('--speed', swiper.params.speed + 'ms');
      }
    });
    swiper.init();
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-showcase-2.default', showcaseStyle2);
  });
})(jQuery);
/***********************************************
 * SHOWCASE: STYLE 3
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof Swiper === 'undefined') {
    return;
  }
  var showcaseStyle3 = function ($scope, $) {
    var showcase = $scope.find('.vlt-showcase--style-3'),
      anchor = showcase.data('navigation-anchor');
    var swiper = new Swiper(showcase.get(0), {
      init: false,
      direction: 'vertical',
      lazy: true,
      loop: false,
      parallax: true,
      mousewheel: {
        releaseOnEdges: true
      },
      slidesPerView: 1,
      speed: 1000,
      touchReleaseOnEdges: true,
      navigation: {
        nextEl: $(anchor).find('.vlt-swiper-button-next').get(0),
        prevEl: $(anchor).find('.vlt-swiper-button-prev').get(0)
      },
      pagination: {
        el: $(anchor).find('.vlt-swiper-pagination').get(0),
        clickable: false,
        type: 'fraction',
        renderFraction: function (currentClass, totalClass) {
          return '<span class="' + currentClass + '"></span>' + '<span class="sep">/</span>' + '<span class="' + totalClass + '"></span>';
        }
      }
    });
    swiper.on('init slideChange', function () {
      var el = $(anchor).find('.vlt-swiper-progress'),
        current = swiper.realIndex,
        total = showcase.find('.swiper-slide').not('.swiper-slide-duplicate').length,
        scale = (current + 1) / total;
      if (el.data('direction') == 'vertical') {
        el.find('.current').text(VLTJS.addLedingZero(current + 1));
        el.find('.total').text(VLTJS.addLedingZero(total));
      } else {
        el.find('.current').text(current + 1);
        el.find('.total').text(total);
      }
      if (el.length && el.find('.bar > span').length) {
        el.find('.bar > span')[0].style.setProperty('--scaleX', scale);
        el.find('.bar > span')[0].style.setProperty('--speed', swiper.params.speed + 'ms');
      }
    });
    swiper.init();
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-showcase-3.default', showcaseStyle3);
  });
})(jQuery);
/***********************************************
 * SHOWCASE: STYLE 4
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof Swiper === 'undefined') {
    return;
  }
  var showcaseStyle4 = function ($scope, $) {
    var showcase = $scope.find('.vlt-showcase--style-4'),
      links = showcase.find('.vlt-showcase-links'),
      images = showcase.find('.vlt-showcase-images');

    // add active class
    links.find('li').eq(0).addClass('is-active');
    var swiper = new Swiper(images.get(0), {
      loop: false,
      effect: 'fade',
      lazy: true,
      slidesPerView: 1,
      allowTouchMove: false,
      speed: 1000,
      on: {
        init: function () {
          links.on('mouseenter', 'li', function (e) {
            e.preventDefault();
            var currentLink = $(this);
            links.find('li').removeClass('is-active');
            currentLink.addClass('is-active');
            swiper.slideTo(currentLink.index());
          });
        }
      }
    });
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-showcase-4.default', showcaseStyle4);
  });
})(jQuery);
/***********************************************
 * SHOWCASE: STYLE 5
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof Swiper === 'undefined') {
    return;
  }
  var showcaseStyle5 = function ($scope, $) {
    var showcase = $scope.find('.vlt-showcase--style-5'),
      anchor = showcase.data('navigation-anchor');
    var swiper = new Swiper(showcase.get(0), {
      init: false,
      direction: 'vertical',
      lazy: true,
      loop: false,
      mousewheel: true,
      slidesPerView: 1,
      speed: 1000,
      navigation: {
        nextEl: $(anchor).find('.vlt-swiper-button-next').get(0),
        prevEl: $(anchor).find('.vlt-swiper-button-prev').get(0)
      },
      pagination: {
        el: $(anchor).find('.vlt-swiper-pagination').get(0),
        clickable: false,
        type: 'fraction',
        renderFraction: function (currentClass, totalClass) {
          return '<span class="' + currentClass + '"></span>' + '<span class="sep">/</span>' + '<span class="' + totalClass + '"></span>';
        }
      }
    });
    swiper.on('init slideChange', function () {
      var el = $(anchor).find('.vlt-swiper-progress'),
        current = swiper.realIndex,
        total = showcase.find('.swiper-slide').not('.swiper-slide-duplicate').length,
        scale = (current + 1) / total;
      if (el.data('direction') == 'vertical') {
        el.find('.current').text(VLTJS.addLedingZero(current + 1));
        el.find('.total').text(VLTJS.addLedingZero(total));
      } else {
        el.find('.current').text(current + 1);
        el.find('.total').text(total);
      }
      if (el.length && el.find('.bar > span').length) {
        el.find('.bar > span')[0].style.setProperty('--scaleX', scale);
        el.find('.bar > span')[0].style.setProperty('--speed', swiper.params.speed + 'ms');
      }
    });
    swiper.init();
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-showcase-5.default', showcaseStyle5);
  });
})(jQuery);
/***********************************************
 * SHOWCASE: STYLE 6
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof Swiper === 'undefined') {
    return;
  }
  var showcaseStyle6 = function ($scope, $) {
    var showcase = $scope.find('.vlt-showcase--style-6'),
      images = showcase.find('.vlt-showcase-images'),
      links = showcase.find('.vlt-showcase-links');

    // add active class
    links.find('li').eq(0).addClass('is-active');
    new Swiper(links.get(0), {
      direction: 'vertical',
      slidesPerView: 'auto',
      freeMode: true,
      mousewheel: true
    });
    var swiper = new Swiper(images.get(0), {
      loop: false,
      effect: 'fade',
      lazy: true,
      slidesPerView: 1,
      allowTouchMove: false,
      speed: 1000,
      on: {
        init: function () {
          links.on('mouseenter', 'li', function (e) {
            e.preventDefault();
            var currentLink = $(this);
            links.find('li').removeClass('is-active');
            currentLink.addClass('is-active');
            swiper.slideTo(currentLink.index());
          });
        }
      }
    });
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-showcase-6.default', showcaseStyle6);
  });
})(jQuery);
/***********************************************
 * SHOWCASE: STYLE 8
 ***********************************************/
(function ($) {
  'use strict';

  // check if plugin defined
  if (typeof Swiper === 'undefined') {
    return;
  }
  var showcaseStyle8 = function ($scope, $) {
    var showcase = $scope.find('.vlt-showcase--style-8'),
      anchor = showcase.data('navigation-anchor');
    var swiper = new Swiper(showcase.get(0), {
      init: false,
      speed: 1000,
      loop: false,
      grabCursor: true,
      spaceBetween: 0,
      direction: 'vertical',
      centeredSlides: true,
      slidesPerView: 'auto',
      mousewheel: true,
      navigation: {
        nextEl: $(anchor).find('.vlt-swiper-button-next').get(0),
        prevEl: $(anchor).find('.vlt-swiper-button-prev').get(0)
      },
      pagination: {
        el: $(anchor).find('.vlt-swiper-pagination').get(0),
        clickable: false,
        type: 'fraction',
        renderFraction: function (currentClass, totalClass) {
          return '<span class="' + currentClass + '"></span>' + '<span class="sep">/</span>' + '<span class="' + totalClass + '"></span>';
        }
      }
    });
    swiper.on('init slideChange', function () {
      var el = $(anchor).find('.vlt-swiper-progress'),
        current = swiper.realIndex,
        total = showcase.find('.swiper-slide:not(.swiper-slide-duplicate)').length,
        scale = (current + 1) / total;
      if (el.data('direction') == 'vertical') {
        el.find('.current').text(VLTJS.addLedingZero(current + 1));
        el.find('.total').text(VLTJS.addLedingZero(total));
      } else {
        el.find('.current').text(current + 1);
        el.find('.total').text(total);
      }
      if (el.length && el.find('.bar > span').length) {
        el.find('.bar > span')[0].style.setProperty('--scaleX', scale);
        el.find('.bar > span')[0].style.setProperty('--speed', swiper.params.speed + 'ms');
      }
    });
    swiper.init();
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-showcase-8.default', showcaseStyle8);
  });
})(jQuery);