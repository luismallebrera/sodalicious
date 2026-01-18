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
				})
				.fromTo(navItem, {
					autoAlpha: 0,
					translateY: 30,
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
				})
				.to(siteOverlay, .3, {
					autoAlpha: 0,
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