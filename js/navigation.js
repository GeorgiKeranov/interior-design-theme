/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function($) {
	const $header = $('.header');

	// Add header--scroll class if window is not at the top or
	// remove the class if we are on the top of the window
	$(window).on('load, scroll', function() {
		if($(document).scrollTop() > 0) {
			$header.addClass('header--scroll');
		} else {
			$header.removeClass('header--scroll');
		}
	});

}(jQuery) );
