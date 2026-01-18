/***********************************************
 * THEME: SITE FULLSCREEN
 ***********************************************/
(function ($) {

	'use strict';

	var isFullscreen = false;

	VLTJS.fullscreenSite = {
		init: function () {
			var fullscreenToggle = $('.js-site-fullscreen-toggle'),
				documentElement = document.documentElement;
			fullscreenToggle.on('click', function (e) {
				e.preventDefault();
				if (!isFullscreen) {
					VLTJS.fullscreenSite.open_fullscreen(fullscreenToggle, documentElement);
				} else {
					VLTJS.fullscreenSite.close_fullscreen(fullscreenToggle);
				}
			});
		},
		open_fullscreen: function (fullscreenToggle, documentElement) {
			isFullscreen = true;
			fullscreenToggle.find('i').removeClass('ri-fullscreen-fill').addClass('ri-fullscreen-exit-fill');
			if (documentElement.requestFullscreen) {
				documentElement.requestFullscreen();
			} else if (documentElement.mozRequestFullScreen) {
				/* Firefox */
				documentElement.mozRequestFullScreen();
			} else if (documentElement.webkitRequestFullscreen) {
				/* Chrome, Safari and Opera */
				documentElement.webkitRequestFullscreen();
			} else if (documentElement.msRequestFullscreen) {
				/* IE/Edge */
				documentElement.msRequestFullscreen();
			}
		},
		close_fullscreen: function (fullscreenToggle) {
			isFullscreen = false;
			fullscreenToggle.find('i').removeClass('ri-fullscreen-exit-fill').addClass('ri-fullscreen-fill');
			if (document.exitFullscreen) {
				document.exitFullscreen();
			} else if (document.mozCancelFullScreen) {
				/* Firefox */
				document.mozCancelFullScreen();
			} else if (document.webkitExitFullscreen) {
				/* Chrome, Safari and Opera */
				document.webkitExitFullscreen();
			} else if (document.msExitFullscreen) {
				/* IE/Edge */
				document.msExitFullscreen();
			}
		}

	}

	VLTJS.fullscreenSite.init();

})(jQuery);