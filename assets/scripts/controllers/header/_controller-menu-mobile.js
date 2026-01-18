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
						navbar.addClass('vlt-navbar--temp-solid')
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