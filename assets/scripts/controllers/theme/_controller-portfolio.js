/***********************************************
 * THEME: PORTFOLIO
 ***********************************************/
(function ($) {

	$('.elementor-widget-visual-portfolio').addClass('elementor-widget-theme-post-content');
	$('[data-vp-items-style="sodalicious_product_style_1"]').addClass('woocommerce');

	VLTJS.document.on('beforeInitSwiper.vpf', function (event, vpObject, options) {

		if ('vpf' !== event.namespace) {
			return;
		}

		var setStretchToContainer = $(event.target).data('vp-slider-stretch-to-container');
		var setNavigationAnchor = $(event.target).data('vp-slider-navigation-anchor');

		if (setStretchToContainer && $('.container').length) {
			options.slidesOffsetBefore = $('.container').get(0).getBoundingClientRect().left + 15;
			options.slidesOffsetAfter = $('.container').get(0).getBoundingClientRect().left + 15;
		}

		if (setNavigationAnchor) {
			options.navigation = {
				nextEl: setNavigationAnchor + ' .vlt-swiper-button-next',
				prevEl: setNavigationAnchor + ' .vlt-swiper-button-prev'
			};
		}

	});

	VLTJS.document.on('initSwiper.vpf', function (event, vpObject, options) {

		if ('vpf' !== event.namespace) {
			return;
		}

		var setNavigationAnchor = $(event.target).data('vp-slider-navigation-anchor');

		if (setNavigationAnchor) {

			var swiper = vpObject.$items_wrap.parent()[0].swiper;

			swiper.on('resize slideChange', function () {

				var el = $(setNavigationAnchor),
					current = swiper.realIndex || 0,
					total = vpObject.$items_wrap.find('.swiper-slide:not(.swiper-slide-duplicate)').length,
					scale = (current + 1) / total;

				if (el.data('direction') == 'vertical') {
					el.find('.current').text(VLTJS.addLedingZero(current + 1));
					el.find('.total').text(VLTJS.addLedingZero(total));
				} else {
					el.find('.current').text(current + 1);
					el.find('.total').text(total);
				}

				if (el.length && el.find('.bar > span').length) {
					el.find('.bar > span')[0].style.setProperty('--scaleX', scale);
					el.find('.bar > span')[0].style.setProperty('--speed', swiper.params.speed + 'ms');
				}

			});

		}

	});

	VLTJS.document.on('init.vpf', function (e) {

		if (typeof gsap !== 'undefined') {

			$('[data-vp-pagination-type="load-more"]').each(function () {

				var loadMorePagination = $(this);

				loadMorePagination.find('.vp-pagination__item').mouseleave(function (e) {

					gsap.to(this, .3, {
						scale: 1
					});

					gsap.to(loadMorePagination.find('.vp-pagination__load-more'), .3, {
						scale: 1,
						x: 0,
						y: 0
					});

				});

				loadMorePagination.find('.vp-pagination__item').mouseenter(function (e) {
					gsap.to(this, .3, {
						transformOrigin: '0 0',
						scale: 1
					});
				});

				loadMorePagination.find('.vp-pagination__item').mousemove(function (e) {
					callParallax(e);
				});

				function callParallax(e) {
					parallaxIt(e, loadMorePagination.find('.vp-pagination__load-more'), 60);
				}

				function parallaxIt(e, target, movement) {
					var $this = loadMorePagination.find('.vp-pagination__item');
					var boundingRect = $this[0].getBoundingClientRect();
					var relX = e.pageX - boundingRect.left;
					var relY = e.pageY - boundingRect.top;
					var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

					gsap.to(target, .3, {
						x: (relX - boundingRect.width / 2) / boundingRect.width * movement,
						y: (relY - boundingRect.height / 2 - scrollTop) / boundingRect.width * movement
					});
				}

			});

		}

	});

	VLTJS.document.on('init.vpf endLoadingNewItems.vpf', function (e) {

		var portfolioItem = $(e.target).filter('[data-vp-items-style="sodalicious_work_style_1"]').find('.vp-portfolio__item');
		var popupItems = $(e.target).filter('[data-vp-items-click-action="popup_gallery"]').find('.vp-portfolio__item-popup');

		if (portfolioItem.length) {
			portfolioItem.on('mouseenter', function () {
				portfolioItem.not($(this)).addClass('has-opacity');
			}).on('mouseleave', function () {
				portfolioItem.removeClass('has-opacity');
			});
		}

		if (popupItems.length) {
			popupItems.parents('.vp-portfolio__item-wrap').find('a').attr('rel', 'nofollow');
		}

	});

	VLTJS.document.on('init.vpf endLoadingNewItems.vpf', function (e) {

		var tiltPortfolio = $(e.target).filter('[data-vp-tilt-effect="true"]'),
			portfolioStyle = tiltPortfolio.attr('data-vp-items-style'),
			expectStyles = !/^default$/g.test(portfolioStyle),
			items = tiltPortfolio.find((expectStyles ? '.vp-portfolio__item' : '.vp-portfolio__item-img') + ':not(.vp-portfolio__item-tilt)');

		if (items.length) {

			items.each(function () {
				var $this = $(this),
					meta = $this.find('.vp-portfolio__item-meta');

				if (expectStyles && meta.length) {
					$this.on('change', function (e, transforms) {
						var x = 1.5 * parseFloat(transforms.tiltX),
							y = 1.5 * -parseFloat(transforms.tiltY);
						meta.css('transform', 'translateY(' + y + 'px) translateX(' + x + 'px)');
					}).on('tilt.mouseLeave', function () {
						meta.css('transform', 'translateY(0) translateX(0)');
					});
				}

				$this.addClass('vp-portfolio__item-tilt').tilt({
					speed: 1000
				});

			});

		}

	});

})(jQuery);