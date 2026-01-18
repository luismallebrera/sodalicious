/***********************************************
 * THEME: STICKY NAVBAR
 ***********************************************/
(function ($) {

	'use strict';

	VLTJS.stickyNavbar = {

		init: function () {

			var navbarMain = $('.vlt-header:not(.vlt-header--slide) .vlt-navbar--main'),
				topBarHeight = $('.vlt-top-bar').outerHeight() || 0;

			navbarMain.each(function () {

				var $this = $(this);

				// sticky navbar
				var navbarHeight = $this.length ? $this.outerHeight() : 0,
					navbarMainOffset = $this.hasClass('vlt-navbar--offset') ? VLTJS.window.outerHeight() : navbarHeight + topBarHeight;

				// fake navbar
				var navbarFake = $('<div class="vlt-fake-navbar">').hide();

				function _fixed_navbar() {
					$this.addClass('vlt-navbar--fixed');
					navbarFake.show();
				}

				function _unfixed_navbar() {
					$this.removeClass('vlt-navbar--fixed');
					navbarFake.hide();
				}

				function _on_scroll_navbar() {
					if (VLTJS.window.scrollTop() >= navbarMainOffset) {
						_fixed_navbar();
					} else {
						_unfixed_navbar();
					}
				}

				if ($this.hasClass('vlt-navbar--sticky')) {

					VLTJS.window.on('scroll resize', _on_scroll_navbar);

					_on_scroll_navbar();

					// append fake navbar
					$this.after(navbarFake);

					// fake navbar height after resize
					navbarFake.height($this.innerHeight());

					VLTJS.debounceResize(function () {
						navbarFake.height($this.innerHeight());
					});

				}

				// hide navbar on scroll
				var navbarHideOnScroll = $this.filter('.vlt-navbar--hide-on-scroll');

				VLTJS.throttleScroll(function (type, scroll) {

					var start = 450;

					function _show_navbar() {
						navbarHideOnScroll.removeClass('vlt-on-scroll-hide').addClass('vlt-on-scroll-show');
					}

					function _hide_navbar() {
						navbarHideOnScroll.removeClass('vlt-on-scroll-show').addClass('vlt-on-scroll-hide');
					}

					// hide or show
					if (type === 'down' && scroll > start) {
						_hide_navbar();
					} else if (type === 'up' || type === 'end' || type === 'start') {
						_show_navbar();
					}

					// add solid color
					if ($this.hasClass('vlt-navbar--transparent') && $this.hasClass('vlt-navbar--sticky')) {
						scroll > navbarHeight ? $this.addClass('vlt-navbar--solid') : $this.removeClass('vlt-navbar--solid');
					}

					// sticky column fix
					if (($this.hasClass('vlt-navbar--fixed') && $this.hasClass('vlt-navbar--sticky')) && !$this.hasClass('vlt-on-scroll-hide')) {
						VLTJS.html.addClass('vlt-is--header-fixed');
					} else {
						VLTJS.html.removeClass('vlt-is--header-fixed');
					}

				});

			});

		}

	};

	VLTJS.stickyNavbar.init();

})(jQuery);