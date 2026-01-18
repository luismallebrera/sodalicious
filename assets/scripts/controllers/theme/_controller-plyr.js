/***********************************************
 * THEME: PLYR
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof Plyr === 'undefined') {
		return;
	}

	VLTJS.plyr = {

		init: function () {

			var audio = $('.vlt-post-media__audio'),
				video = $('.vlt-post-media__video');

			if (audio.length) {

				audio.each(function () {

					var audioPlayer = new Plyr($(this).find('.player'), {
						tooltips: {
							controls: true,
							seek: true
						}
					});

					audioPlayer.on('ready', function () {
						VLTJS.document.trigger('vlt.plyr-ready');
					});

				});

			}

			if (video.length) {

				video.each(function () {

					var videoPlayer = new Plyr($(this).find('.player'), {
						tooltips: {
							controls: true,
							seek: true
						},
						ratio: '16:9',
						youtube: {
							modestbranding: false
						}
					});

					videoPlayer.on('ready', function () {
						VLTJS.document.trigger('vlt.plyr-ready');
					});

				});

			}

		}

	};

	VLTJS.plyr.init();

	VLTJS.document.on('loadedNewItems.vpf', function (event, vpObject) {
		if ('vpf' !== event.namespace) {
			return;
		}
		VLTJS.plyr.init();
	});

})(jQuery);