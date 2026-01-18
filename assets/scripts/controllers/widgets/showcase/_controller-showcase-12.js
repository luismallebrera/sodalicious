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
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-showcase-12.default',
			showcaseStyle12
		);
	});

})(jQuery);