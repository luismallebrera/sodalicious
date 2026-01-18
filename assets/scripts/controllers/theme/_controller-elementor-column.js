/***********************************************
 * THEME: ELEMENTOR COLUMN
 ***********************************************/
(function ($) {

	'use strict';

	VLTJS.stickyColumn = {
		init: function ($scope) {

			var parent = $scope.filter('.has-sticky-column');

			if (parent.length) {
				parent.find('.elementor-widget-wrap').addClass('sticky-parent').find('.elementor-element').wrapAll('<div class="sticky-column">');
			}

		}
	};

	VLTJS.stretchColumn = {
		init: function ($scope) {

			if (!$scope) {
				$scope = $('div[class^="col-"]');
			}

			resizeDebounce();
			VLTJS.debounceResize(resizeDebounce);

			function resizeDebounce() {

				var winW = VLTJS.window.outerWidth(),
					stretchBlock = $scope.filter('.has-stretch-column');

				if (stretchBlock.length) {

					var rect = stretchBlock[0].getBoundingClientRect(),
						offsetLeft = rect.left,
						offsetRight = winW - rect.right,
						elWidth = rect.width;

					if (stretchBlock.hasClass('to-left')) {
						stretchBlock.find('>*').css('margin-left', -offsetLeft);
						stretchBlock.find('>*').css('width', elWidth + offsetLeft + 'px');
					}

					if (stretchBlock.hasClass('to-right')) {
						stretchBlock.find('>*').css('margin-right', -offsetRight);
						stretchBlock.find('>*').css('width', elWidth + offsetRight + 'px');
					}

					if (stretchBlock.hasClass('has-reset-mobile') && VLTJS.window.outerWidth() <= 768) {
						stretchBlock.find('>*').css({
							'margin-left': '',
							'margin-right': '',
							'width': '100%'
						});
					}

				}

			}

		}

	}

	VLTJS.stretchColumn.init();

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/column',
			VLTJS.stretchColumn.init
		);
	});

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/column',
			VLTJS.stickyColumn.init
		);
	});

})(jQuery);