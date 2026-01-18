/***********************************************
 * THEME: DEVIDE SECTION
 ***********************************************/
(function ($) {

	'use strict';

	VLTJS.devideSection = {
		init: function () {

			$('.vlt-devide-section').each(function () {

				var $this = $(this),
					elHeight = $this.find('>*').outerHeight() * 0.5;

				$this.css('margin-top', elHeight * -1);
				$this.closest('section:not(.elementor-inner-section)').css('margin-top', elHeight);

			});

		}
	}

	VLTJS.devideSection.init();

	VLTJS.debounceResize(function () {
		VLTJS.devideSection.init();
	});

})(jQuery);

/***********************************************
 * THEME: DEVIDE ELEMENT
 ***********************************************/
(function ($) {

	'use strict';

	VLTJS.devideElement = {
		init: function () {

			$('.vlt-devide-element').each(function () {
				var $this = $(this),
					elHeight = $this.outerHeight() / 2;

				$this.find('>*').css('margin-top', -elHeight);

				if ($this.hasClass('reset-mobile') && VLTJS.window.outerWidth() <= 768) {
					$this.find('>*').css('margin-top', '');
				}

			});
		}
	}

	VLTJS.devideElement.init();

	VLTJS.debounceResize(function () {
		VLTJS.devideElement.init();
	});

})(jQuery);

/***********************************************
 * THEME: COLUMN SPACE TO CONTAINER
 ***********************************************/
(function ($) {

	'use strict';

	VLTJS.columnSpaceToContainer = {
		init: function () {

			var wndW = VLTJS.window.width();

			$('.vlt-column-space-to-container').each(function () {
				var $this = $(this),
					container = $('.container'),
					containerWidth = container.outerWidth(),
					containerOffset = container.offset(),
					left = containerOffset.left + (parseFloat(container.css('padding-left')) || 0),
					right = wndW - containerWidth + (parseFloat(container.css('padding-right')) || 0);

				if ($this.hasClass('to-left')) {

					$this.css({
						'padding-left': left
					});

				} else {

					$this.css({
						'padding-right': right / 2
					});

				}

			});

		}
	}

	VLTJS.columnSpaceToContainer.init();

	VLTJS.debounceResize(function () {
		VLTJS.columnSpaceToContainer.init();
	});

})(jQuery);