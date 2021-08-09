const swiper = new Swiper('.swiper-container', {
	slidesPerView: 1,
	spaceBetween: 20,
	loop: true,
	
	autoplay: {
	   delay: 5000,
	},

	pagination: {
		el: '.swiper-pagination',
	},

	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},

	breakpoints: {
		769: {
			slidesPerView: 2
		},

		1024: {
			slidesPerView: 3,
		}
	}
});