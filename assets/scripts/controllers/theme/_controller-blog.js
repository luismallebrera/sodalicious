/***********************************************
 * THEME: BLOG
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof Swiper === 'undefined') {
		return;
	}

	VLTJS.blog = {
		init: function () {

			VLTJS.blog.postFormatGallerySlider();
			VLTJS.blog.widgetPostlistSlider();

			VLTJS.document.on('loadedNewItems.vpf', function (event, vpObject) {
				if ('vpf' !== event.namespace) {
					return;
				}
				VLTJS.blog.postFormatGallerySlider();
				VLTJS.blog.reinitMediaElementPostFormats('.vp-portfolio__item');
				if (typeof $.fn.fitVids !== 'undefined') {
					VLTJS.body.fitVids();
				}
			});

		},
		postFormatGallerySlider: function () {

			$('.vlt-post-media__gallery').each(function () {

				new Swiper($(this).get(0), {
					loop: true,
					autoplay: {
						delay: 5000,
					},
					slidesPerView: 1,
					grabCursor: true,
					speed: 600,
					mousewheel: true,
					pagination: {
						el: '.vlt-swiper-pagination',
						type: 'bullets',
						bulletClass: 'vlt-swiper-pagination-bullet',
						bulletActiveClass: 'vlt-swiper-pagination-bullet-active',
						clickable: true
					}
				});

			});

		},
		reinitMediaElementPostFormats: function (scope) {

			if (typeof $.fn.mediaelementplayer !== 'undefined') {
				$(scope).find('.wp-audio-shortcode, .wp-video-shortcode').not('.mejs-container').filter(function () {
					return !$(this).parent().hasClass('.mejs-mediaelement');
				}).mediaelementplayer();
			}

		},
		widgetPostlistSlider: function () {

			$('.vlt-widget-post-slider').each(function () {

				new Swiper($(this).get(0), {
					spaceBetween: 30,
					loop: true,
					autoplay: {
						delay: 5000,
					},
					slidesPerView: 1,
					grabCursor: true,
					speed: 600,
					mousewheel: true,
					pagination: {
						el: '.vlt-swiper-pagination',
						type: 'bullets',
						bulletClass: 'vlt-swiper-pagination-bullet',
						bulletActiveClass: 'vlt-swiper-pagination-bullet-active',
						clickable: true
					}
				});

			});

		}
	};

	VLTJS.blog.init();

})(jQuery);