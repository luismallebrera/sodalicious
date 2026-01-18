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
				})
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