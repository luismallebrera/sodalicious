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
			mousewheel: true,
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
				},
			}
		});

	};

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-showcase-6.default',
			showcaseStyle6
		);
	});

})(jQuery);