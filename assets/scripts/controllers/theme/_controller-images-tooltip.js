/***********************************************
 * THEME: IMAGES TOOLTIP
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof gsap == 'undefined') {
		return;
	}

	VLTJS.imagesTooltip = {
		init: function () {

			$('.vlt-hover-reveal').remove();

			$('[data-tooltip-image]').each(function (index) {

				var $this = $(this),
					size = $this.data('tooltip-size') ? $this.data('tooltip-size').split('x') : false;

				VLTJS.body.append('<div class="vlt-hover-reveal" data-id="' + index + '"><div class="vlt-hover-reveal__inner"><div class="vlt-hover-reveal__img" style="background-image: url(' + $this.data('tooltip-image') + ');"></div></div></div>');

				if (size) {
					$('.vlt-hover-reveal').eq(index).css({
						'width': size[0] + 'px',
						'height': size[1] + 'px'
					});
				}

				var reveal = $('.vlt-hover-reveal[data-id="' + index + '"]'),
					revealInner = reveal.find('.vlt-hover-reveal__inner'),
					revealImg = reveal.find('.vlt-hover-reveal__img'),
					revealImgWidth = revealImg.outerWidth(),
					revealImgHeight = revealImg.outerHeight();

				function position_element(ev) {

					var mousePos = VLTJS.getMousePos(ev),
						docScrolls = {
							left: VLTJS.body.scrollLeft() + VLTJS.document.scrollLeft(),
							top: VLTJS.body.scrollTop() + VLTJS.document.scrollTop()
						};

					gsap.set(reveal, {
						top: mousePos.y - revealImgHeight * 0.5 - docScrolls.top + 'px',
						left: mousePos.x - revealImgWidth * 0.25 - docScrolls.left + 'px'
					});

				}

				function mouse_enter(ev) {
					position_element(ev)
					show_image();
				}

				function mouse_move(ev) {
					requestAnimationFrame(function () {
						position_element(ev);
					});
				}

				function mouse_leave() {
					hide_image();
				}

				$this.on('mouseenter', mouse_enter);
				$this.on('mousemove', mouse_move);
				$this.on('mouseleave', mouse_leave);

				function show_image() {
					gsap.killTweensOf(revealInner);
					gsap.killTweensOf(revealImg);

					gsap.timeline({
							onStart: function () {
								gsap.set(reveal, {
									opacity: 1
								});
							}
						})
						.fromTo(revealInner, 1, {
							x: '-100%',
						}, {
							x: '0%',
							ease: Quint.easeOut,
						})
						.fromTo(revealImg, 1, {
								x: '100%',
							}, {
								x: '0%',
								ease: Quint.easeOut,
							},
							'-=1');
				}

				function hide_image() {
					gsap.killTweensOf(revealInner);
					gsap.killTweensOf(revealImg);
					gsap.timeline({
							onComplete: function () {
								gsap.set(reveal, {
									opacity: 0
								});
							}
						})
						.to(revealInner, 0.5, {
							x: '100%',
							ease: Quint.easeOut,
						})
						.to(revealImg, 0.5, {
							x: '-100%',
							ease: Quint.easeOut,
						}, '-=0.5');
				}

			});
		}
	}

	VLTJS.imagesTooltip.init();

	VLTJS.document.on('init.vpf endLoadingNewItems.vpf', function (e) {
		VLTJS.imagesTooltip.init();
	});

})(jQuery);