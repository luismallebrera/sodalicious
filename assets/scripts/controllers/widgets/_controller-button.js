/***********************************************
 * WIDGET: BUTTON
 ***********************************************/
(function ($) {

	'use strict';

	VLTJS.button = {

		init: function ($scope) {

			var el = $scope.find('.vlt-btn.vlt-btn--effect');

			el.each(function () {

				var $this = $(this);

				if (!$this.find('.vlt-btn__content').length) {
					$this.wrapInner('<span class="vlt-btn__content"></span>');
					$this.find('.vlt-btn__content').clone().attr('aria-hidden', true).appendTo($this);
				}

			});

		}

	}

	VLTJS.window.on('elementor/frontend/init', function () {

		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-button.default',
			VLTJS.button.init
		);

		elementorFrontend.hooks.addAction(
			'frontend/element_ready/wp-widget-mc4wp_form_widget.default',
			VLTJS.button.init
		);

		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-showcase-2.default',
			VLTJS.button.init
		);

		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-showcase-3.default',
			VLTJS.button.init
		);

		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-showcase-5.default',
			VLTJS.button.init
		);

		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-showcase-7.default',
			VLTJS.button.init
		);

	});

	VLTJS.button.init(VLTJS.body);

	VLTJS.document.on('init.vpf endLoadingNewItems.vpf', function (e) {
		VLTJS.button.init(VLTJS.body);
	});

})(jQuery);