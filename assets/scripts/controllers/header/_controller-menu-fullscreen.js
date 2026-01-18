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