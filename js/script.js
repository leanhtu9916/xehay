jQuery(document).ready(function($){
	$('.home-slide .gallery').slick({
		dots: true,
		infinite: true,
		slidesToShow: 1,
		autoplay: true,
		speed: 600,
		slidesToScroll: 1,
		autoplaySpeed: 5000,
		centerMode: false,
		variableWidth: false,
		nextArrow: '<button type="button" class="slick-next slick-nav"><i class="fas fa-angle-right"></i></button>',
		prevArrow: '<button type="button" class="slick-prev slick-nav"><i class="fas fa-angle-left"></i></button>',
	});
	$('.product-feature_slide').slick({
	    dots: false,
	    infinite: true,
	    slidesToShow: 4,
	    autoplay: true,
	    speed: 600,
	    slidesToScroll: 1,
	    autoplaySpeed: 5000,
	    centerMode: false,
		variableWidth: false,
	   	nextArrow: '<button type="button" class="slick-next slick-nav"><i class="fa fa-angle-right"></i></button>',
		prevArrow: '<button type="button" class="slick-prev slick-nav"><i class="fa fa-angle-left"></i></button>',
		responsive: [
			{
			breakpoint: 992,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					
				}
			},{
			breakpoint: 576,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					
				}
			},
		],
	});
	function clickShow() {
		$('.showbar').click(function() {
			$('#mobile-nav').css('left','0');
			$('.overbg-mobile').show();
		})
		$('.overbg-mobile,.close-menu').click(function() {
			$('#mobile-nav').css('left','-999px');
			$('.overbg-mobile').hide();
		})
		$('.icon-search').click(function() {
			$('.header-mobile form.search-form').slideToggle();
		})
	}
	//sticky Header
	function stickyHeader() {
		$(window).scroll(function() {
			var headerHeigt = $('.header-sticky').height() + 100;
			if ($(window).scrollTop() > headerHeigt) {
				$('.header-sticky').addClass('stick-header');
			}else {
				$('.header-sticky').removeClass('stick-header');
			}
		})
	}
	$("ul.menu-scroll a").click(function() {
		var div = $(this).attr('href');
	    $('html, body').animate({
	        scrollTop: $(""+div).offset().top - 200
	    }, 2000);
	});
	stickyHeader();
	clickShow();
});