$(function(){	
	var ua = navigator.userAgent.toLowerCase();
    var ua = navigator.userAgent.toLowerCase();
     if (ua.indexOf('safari') != -1) {
         if (ua.indexOf('chrome') > -1) {
            if($('.parallax').hasClass('rellax')){
            	var rellax = new Rellax('.rellax', {
            		center: true
            	});
            }
//
// //            alert("1") // Chrome
         }
//         // else {
//         //     alert("2") // Safari
//         // }
//     }
	// 	}
}
	if($('.parallax').hasClass('rellax')){
		var rellax = new Rellax('.rellax', {
			center: true
		});
	}

	$('.hero-nav-lang__current').click(function(){
		$('.hero-nav-lang').toggleClass('is-active');
	})

	var scrollY = parseInt($(window).width()) * 0.62; 
	var scrollAnimate = parseInt($(window).width()) * 0.04;
	$( window ).resize(function() {
		scrollY = parseInt($(window).width()) * 0.62; 
		console.log('scrollY ', scrollY );
	});

	$('.header-scroll-down').click(function(){
		$('html, body').animate({
			scrollTop: scrollY
		}, 1000)
	});

	if($('.s5__slider').hasClass('owl-carousel')){
		$('.s5__slider').owlCarousel({
			items: 3,
			nav: true,
			dots: true,
			navText: '',
			slideBy: 1,
			dotsEach: true,
			navElement: '<div class="owl-arrow"><img src="img/chevron.png"></div>'
		});
	}
	
	if($('.s6-slider1').is('.owl-carousel')){
		var slider1 = $('.s6-slider1');

		slider1.owlCarousel({
			items: 7,
			nav: false,
			dots: false,
			slideBy: 1,
			dotsEach: true,
			slideSpeed: 500,
			paginationSpeed: 500,
			loop: true,
			navSpeed: 500,
			paginationSpeed: 500,
			dotsSpeed: 500,
			smartSpeed: 500
		});
	}
	
	if($('.s6-slider2').is('.owl-carousel')){
		var slider2 = $('.s6-slider2');

		slider2.owlCarousel({
			items: 1,
			nav: true,
			dots: false,
			slideBy: 1,
			dotsEach: true,
			navText: '',
			slideSpeed: 500,
			paginationSpeed: 500,
			navElement: '<div class="owl-arrow"><img src="img/chevron.png"></div>',
			animateIn: 'fadeIn',
			animateOut: 'fadeOut',
			navSpeed: 500,
			startPosition: 3,
			loop: true,
			paginationSpeed: 500,
			dotsSpeed: 500,
			smartSpeed: 500
		});
	}
	

	$('.s6-slider2 .owl-prev').not('.disabled').click(function(){
		slider1.trigger('prev.owl.carousel');
	});

	$('.s6-slider2 .owl-next').not('.disabled').click(function(){
		slider1.trigger('next.owl.carousel');
	});

	$('.header-nav_scroll .hero-nav__a').click(function(e){
		e.preventDefault();
		$('html, body').animate({
			scrollTop: $("#" + $(this).attr('data-id')).offset().top - scrollAnimate
		}, 800)
	})

	$('.hero-nav__icon_search').click(function(){
		$('.hero-nav__search').addClass('is-active');
	})

	$('.hero-nav__close').click(function(){
		$('.hero-nav__search').removeClass('is-active');
		setTimeout(function(){
			$('.hero-nav__input').val('');
		}, 250);
	})	
});























