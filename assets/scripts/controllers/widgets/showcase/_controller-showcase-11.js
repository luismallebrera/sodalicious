/***********************************************
 * SHOWCASE: STYLE 11
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof tippy === 'undefined') {
		return;
	}

	var showcaseStyle11 = function ($scope, $) {

		var showcase = $scope.find('.vlt-showcase--style-11'),
			item = showcase.find('.vlt-showcase-item');

		item.each(function () {
			tippy(this, {
				arrow: false,
				distance: '1rem',
				duration: [500, 0],
				maxWidth: 800,
				allowHTML: true
			});
		});

	};

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-showcase-11.default',
			showcaseStyle11
		);
	});

})(jQuery);