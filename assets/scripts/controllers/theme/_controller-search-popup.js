/***********************************************
 * THEME: SEARCH POPUP
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof gsap == 'undefined') {
		return;
	}

	var searchIsOpen = false;

	VLTJS.searchPopup = {
		config: {
			easing: 'power2.out'
		},
		init: function () {

			var search = $('.vlt-search-popup'),
				searchOpen = $('.js-search-form-open'),
				searchClose = $('.js-search-form-close'),
				siteOverlay = $('.vlt-site-overlay');

			searchOpen.on('click', function (e) {
				e.preventDefault();
				if (!searchIsOpen) {
					VLTJS.searchPopup.open_search(search, siteOverlay);
				}
			});

			searchClose.on('click', function (e) {
				e.preventDefault();
				if (searchIsOpen) {
					VLTJS.searchPopup.close_search(search, siteOverlay);
				}
			});

			siteOverlay.on('click', function (e) {
				e.preventDefault();
				if (searchIsOpen) {
					VLTJS.searchPopup.close_search(search, siteOverlay);
				}
			});

			VLTJS.document.on('keyup', function (e) {
				if (e.keyCode === 27 && searchIsOpen) {
					e.preventDefault();
					VLTJS.searchPopup.close_search(search, siteOverlay);
				}
			});

		},
		open_search: function (search, siteOverlay) {
			searchIsOpen = true;
			setTimeout(function () {
				search.find('input[type="text"]').focus();
			}, 50);
			gsap.timeline({
					defaults: {
						ease: this.config.easing
					}
				})
				// set overflow for html
				.set(VLTJS.html, {
					overflow: 'hidden'
				})
				// overlay animation
				.to(siteOverlay, .3, {
					autoAlpha: 1
				})
				// search animation
				.fromTo(search, .6, {
					y: '-100%'
				}, {
					y: 0,
					visibility: 'visible'
				}, '-=.3');

			if (VLT_LOCALIZE_DATAS.open_click_sound && typeof Howl !== 'undefined') {

				new Howl({
					src: [VLT_LOCALIZE_DATAS.open_click_sound],
					autoplay: true,
					loop: false,
					volume: 0.3
				});

			}
		},
		close_search: function (search, siteOverlay) {
			searchIsOpen = false;
			gsap.timeline({
					defaults: {
						ease: this.config.easing
					}
				})
				// set overflow for html
				.set(VLTJS.html, {
					overflow: 'inherit'
				})
				// search animation
				.to(search, .6, {
					y: '-100%'
				})
				// set search visiblity after hide
				.set(search, {
					visibility: 'hidden'
				})
				// overlay animation
				.to(siteOverlay, .3, {
					autoAlpha: 0,
				}, '-=.6');

			if (typeof VLT_LOCALIZE_DATAS.close_click_sound && typeof Howl !== 'undefined') {

				new Howl({
					src: [VLT_LOCALIZE_DATAS.close_click_sound],
					autoplay: true,
					loop: false,
					volume: 0.3
				});

			}
		}
	}

	VLTJS.searchPopup.init();

})(jQuery);