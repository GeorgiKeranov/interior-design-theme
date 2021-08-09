const swiper = new Swiper('.swiper-container', {
	slidesPerView: 3,
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
});