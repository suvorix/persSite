$(document).ready(function(){
	$('.main').css({'margin-bottom': ($('.footer').height() + 80) + 'px'});
	$(window).resize(function(){
		$('.main').css({'margin-bottom': ($('.footer').height() + 80) + 'px'});
	});
	
	var swiper = new Swiper('.swiper-container', {
		slidesPerView: 4,
		breakpoints: {
			1024: {
				slidesPerView: 3,
				spaceBetween: 30,
			},
			768: {
				slidesPerView: 2,
				spaceBetween: 20,
			},
			640: {
				slidesPerView: 1,
				spaceBetween: 10,
			}
		},
		spaceBetween: 30,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	});
	var gallery = new Swiper('.swiper-container-gellery', {
		zoom: true,
		navigation: {
			nextEl: '.swiper-button-next-gellery',
			prevEl: '.swiper-button-prev-gellery',
		},
	});
	
	//Menu
	$('.nav_menu-btn').click(function(){
		$('.nav_menu-list').addClass('active');
		$('.menu-dark_bg').removeClass('hidden');
		$('body').css('overflow-y', 'hidden');
	});
	$('.nav_close').click(function(){
		$('.nav_menu-list').removeClass('active');
		$('.menu-dark_bg').addClass('hidden');
		$('body').css('overflow-y', 'auto');
	});
	$('.menu-dark_bg').click(function(){
		$('.nav_menu-list').removeClass('active');
		$('.menu-dark_bg').addClass('hidden');
		$('body').css('overflow-y', 'auto');
	});
	$(window).resize(function(){
		if(window.innerWidth >= 992){
			$('.nav_menu-list').removeClass('active');
			$('.menu-dark_bg').addClass('hidden');
			$('body').css('overflow-y', 'auto');
		}
	});
	
	//Gallery
	$('.i-show-photos .gellery_close').click(function(){
		$('.i-show-photos').addClass('hidden');
		$('body').css('overflow-y', 'auto');
		$('.i-show-photos .swiper-wrapper').empty();
	});
	$('.i-photos .album').click(function(){
		$('.i-show-photos').removeClass('hidden');
		$('body').css('overflow-y', 'hidden');
		$('.i-show-photos .swiper-wrapper').removeAttr('style');
		$('.i-show-photos .swiper-wrapper').append('<div class="swiper-slide"><div class="swiper-zoom-container"><img src="/img/18.jpg"></div></div><div class="swiper-slide"><div class="swiper-zoom-container"><img src="/img/2.jpg"></div></div><div class="swiper-slide"><div class="swiper-zoom-container"><img src="/img/8.jpg"></div></div>');
		gallery = new Swiper('.swiper-container-gellery', {
			zoom: true,
			navigation: {
				nextEl: '.swiper-button-next-gellery',
				prevEl: '.swiper-button-prev-gellery',
			},
		});
	});
	
	//Sign
	$('.sign_button').click(function(){
		$('.sign_form .sign_content').empty();
		if($(this).hasClass('sign_button_main')){
			$('.sign_form h2').text('Вход');
			$('.sign_form .sign_content').append('<p><input type="email" placeholder="Введите E-mail..."></p><p><input type="password" placeholder="Введите пароль..."></p><p><button>Авторизироваться</button></p>');
		}
		else{
			$('.sign_form h2').text('Регистрация');
			$('.sign_form .sign_content').append('<p><input type="text" placeholder="Введите имя..."></p><p><input type="email" placeholder="Введите E-mail..."></p><p><input type="password" placeholder="Введите пароль..."></p><p><input type="password" placeholder="Повторите пароль..."></p><p><button>Зарегестрироваться</button></p>');
		}
		$('.sign_dark').removeClass('hidden');
		$('body').css('overflow-y', 'hidden');
	});
	$('.sign_dark .sign_close').click(function(){
		$('.sign_dark').addClass('hidden');
		$('body').css('overflow-y', 'auto');
	});
	
	$('.sidebar_item-name').click(function(){
		var ul = $(this).parent().children('ul');
		if(ul.hasClass('sidebar_item-drop')){	
			ul.slideToggle(); 
			$(this).children('.si-icon-drop').toggleClass('close');
		}
	});
});