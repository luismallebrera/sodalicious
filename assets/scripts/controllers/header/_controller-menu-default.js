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
	}

	VLTJS.menuDefault.init();

})(jQuery);