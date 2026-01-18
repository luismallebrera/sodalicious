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
	}

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-awards.default',
			VLTJS.awards.init
		);
	});

})(jQuery);