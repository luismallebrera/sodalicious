/***********************************************
 * WIDGET: TYPES LIST
 ***********************************************/
(function ($) {

	'use strict';

	VLTJS.typesList = {
		init: function ($scope) {

			var types = $scope.find('.vlt-types'),
				typesList = types.find('.vlt-types-list'),
				typesListItem = typesList.find('.vlt-types-list__item'),
				background = types.find('.vlt-types-background'),
				backgroundImage = background.find('.vlt-types-background__image');

			typesListItem.on('mouseenter', function () {

				var $this = $(this),
					index = $this.index(),
					nearby = $this.siblings('.vlt-types-list__item');

				VLTJS.typesList.add_opacity(nearby);
				VLTJS.typesList.current_background(index, backgroundImage);

			}).on('mouseleave', function () {

				VLTJS.typesList.remove_opacity(typesListItem);

			});

			typesList.on('mouseenter', function () {
				typesList.addClass('is-active');
				background.addClass('is-active');
			}).on('mouseleave', function () {
				typesList.removeClass('is-active');
				backgroundImage.removeClass('is-active');
				background.removeClass('is-active');
			});

		},
		add_opacity: function (nearby) {

			nearby.each(function () {
				$(this).addClass('is-opacity');
			});

		},
		current_background: function (index, backgroundImage) {

			backgroundImage.removeClass('is-active');
			backgroundImage.eq(index).addClass('is-active');

		},
		remove_opacity: function (typesListItem) {

			typesListItem.removeClass('is-opacity');

		}
	};

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-types-list.default',
			VLTJS.typesList.init
		);
	});

})(jQuery);