/***********************************************
 * WIDGET: SIMPLE GIST
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.gistsimple === 'undefined') {
		return;
	}

	VLTJS.simpleGist = {
		init: function ($scope) {

			var gist = $scope.find('.gist-simple'),
				match = /^https:\/\/gist.github.com?.+\/(.+)/g.exec(gist.data('url'));

			if (match && 'undefined' !== typeof match[1]) {

				gist.gistsimple({
					id: match[1],
					file: gist.data('file'),
					lines: gist.data('lines'),
					caption: gist.data('caption'),
					highlightLines: gist.data('highlight-lines'),
					showFooter: gist.data('show-footer') == 'yes' ? true : false,
					showLineNumbers: gist.data('show-line-numbers') == 'yes' ? true : false
				});
			}

		}

	};

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-simple-gist.default',
			VLTJS.simpleGist.init
		);
	});

})(jQuery);