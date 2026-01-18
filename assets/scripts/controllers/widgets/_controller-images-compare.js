/***********************************************
 * WIDGET: IMAGES COMPARE
 ***********************************************/
(function ($) {

	'use strict';

	VLTJS.imagesCompare = {

		init: function ($scope) {

			var imagesCompare = $scope.find('.vlt-images-compare'),
				disabledTransition = false,
				currentImageCompare = false;

			function _move_position(e) {
				if (currentImageCompare) {
					const rect = currentImageCompare[0].getBoundingClientRect();
					const offsetX = Math.max( 0, Math.min( 1, ( e.clientX - rect.left ) / rect.width ) );
					currentImageCompare.css('--vlt-image-compare__position', 100 * offsetX + '%');
				}
			}

			imagesCompare.on('mousedown', function(e) {
				e.preventDefault();
				currentImageCompare = $(this);
			});

			VLTJS.document.on('mouseup', function(e) {
				if (currentImageCompare) {
					_move_position(e);
					imagesCompare.css('--vlt-image-compare__transition-duration', '');
					currentImageCompare = false;
					disabledTransition = false;
				}
			});

			VLTJS.document.on('mousemove', function (e) {
				if (currentImageCompare) {
					e.preventDefault();
					if (!disabledTransition) {
						currentImageCompare.css('--vlt-image-compare__transition-duration', '0s');
						disabledTransition = true;
					}
				}
			});

			VLTJS.document.on('mousemove', function (e) {
				_move_position(e);
			});

		}
	};

	VLTJS.window.on('elementor/frontend/init', function () {

		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-images-compare.default',
			VLTJS.imagesCompare.init
		);

	});

})(jQuery);