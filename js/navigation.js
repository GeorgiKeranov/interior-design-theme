( function($) {
	$('.header .header__menu-toggle').on('click', function(e) {
		e.preventDefault();
		
		$(this).parent().toggleClass('header__menu-mobile--active');
	});

	if (!$('body.home').length) {
		return;	
	}

	const $header = $('.header');

	// Add header--transparent class if window is not at the top or
	// remove the class if we are on the top of the window
	$(window).on('load, scroll', function() {
		if($(document).scrollTop() > 0) {
			$header.removeClass('header--transparent');
		} else {
			$header.addClass('header--transparent');
		}
	});
}(jQuery) );
