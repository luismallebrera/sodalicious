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
				prevEl: $(anchor).find('.vlt-swiper-button-prev').get(0),
			},
			pagination: {
				el: $(anchor).find('.vlt-swiper-pagination').get(0),
				clickable: false,
				type: 'fraction',
				renderFraction: function (currentClass, totalClass) {
					return '<span class="' + currentClass + '"></span>' +
						'<span class="sep">/</span>' +
						'<span class="' + totalClass + '"></span>';
				}
			},
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

	}

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-showcase-1.default',
			showcaseStyle1
		);
	});

})(jQuery);