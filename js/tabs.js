( function($) {
	let tabsTitles = $('.section-image-with-tabs .section__tabs-titles a');

	if (!tabsTitles.length) {
		return;
	}

	tabsTitles.on('click', function(e) {
		e.preventDefault();

		let $this = $(this);

		if ($this.hasClass('active')) {
			return;
		}

		let index = $this.attr('href');

		let $thisTabTitle = $this.parent();
		let $thisTabContent = $('.section-image-with-tabs .section__tab-content[data-tab-index="' + index + '"]');

		if (!$thisTabContent.length) {
			return;
		}

		let $currentlyActiveTabTitle = $('.section-image-with-tabs .section__tabs-titles .active');
		let $currentlyActiveTabContent = $('.section-image-with-tabs .section__tab-content--active');

		$currentlyActiveTabTitle.removeClass('active');
		$currentlyActiveTabContent.removeClass('section__tab-content--active');

		$thisTabTitle.addClass('active');
		$thisTabContent.addClass('section__tab-content--active');
	});
}(jQuery) );