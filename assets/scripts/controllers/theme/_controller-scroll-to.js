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

				if (backToTopBtn.offset().top + backToTopBtn.height() >= footer.offset().top ) {
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