const swiper = new Swiper('.swiper-container', {
	slidesPerView: 1,
	spaceBetween: 35,
	loop: true,
	autoplay: {
	   delay: 7000,
	},
	pagination: {
		el: '.swiper-pagination',
	},
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	}
});