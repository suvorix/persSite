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
		var id = $(this).attr('data-id');
		$('.i-show-photos').removeClass('hidden');
		$('body').css('overflow-y', 'hidden');
		$('.i-show-photos .swiper-wrapper').removeAttr('style');
		var photos = '';
		$.ajax({
			type: "POST",
			url: '/api/album/getPhotos',
			data: 'id=' + id,
			success: function(result)
			{
				(result.data).forEach(function(item, i, arr){
					photos = result.data[0].pht_img;
					$('.i-show-photos .swiper-wrapper').append('<div class="swiper-slide"><div class="swiper-zoom-container"><img src="' + $.parseJSON(item.pht_img).max + '"></div></div>');
				});
				gallery = new Swiper('.swiper-container-gellery', {
					zoom: true,
					navigation: {
						nextEl: '.swiper-button-next-gellery',
						prevEl: '.swiper-button-prev-gellery',
					},
				});
			},
			error: function(){
					console.error('AJAX Fatal error');
			}
		});
	});
	
	//Sign
	$('.sign_button').click(function(){
		$('.sign_form .sign_content').empty();
		if($(this).hasClass('sign_button_main')){
			$('.sign_form h2').text('Вход');
			$('.sign_form .sign_content').append('<p><input type="text" name="login" placeholder="Введите логин..."></p><p><input type="password" name="password" placeholder="Введите пароль..."></p><p><button>Авторизироваться</button></p>');
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
	$('test').click();
});