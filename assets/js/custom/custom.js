/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {

	/* Slideshow */
	var swiper = new Swiper('#slideshow', {
		slidesPerView: 1,
		spaceBetween: 0,
		effect: 'slide', /* "fade", "cube", "coverflow" or "flip" */
		loop: true,
		autoplay: {
			delay: 8000,
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
    });


	var newsCarousel = $("#news-carousel");
	newsCarousel.owlCarousel({
		items:1,
		margin:10,
		autoHeight:false,
		autoplay: true,
		autoplayTimeout: 10000,
		loop: true,
		dots: true,
		nav  : true,
		smartSpeed :2000,
		navText : ["<i class='custom-arrow left'><span class='sr'>Previous</span></i>","<i class='custom-arrow right'><span class='sr'>Next</span></i>"]
	});

	newsCarousel.on('changed.owl.carousel', function onSlide (event) {
		// var postId = newsCarousel.find(".owl-item.active").next().find(".news-item").attr("data-postid");
		$("ul#newsItemList li").removeClass('active');
		// $("#newsId" + postId).addClass("active");
		 newsCarousel.find(".owl-dot").each(function(k,v){
		 	var i = k + 1;
		 	if( $(this).hasClass('active') ) {
		 		$("ul#newsItemList li").eq(k).addClass('active');
		 	}
		 });
	});

	$(document).on("click",".news-items .customnav",function(e){
		e.preventDefault();
		var action = $(this).attr("data-action");
		$("#news-carousel " + action).trigger("click");
	});
	

	/*
	*
	*	Colorbox
	*
	------------------------------------*/
	$('a.gallery').colorbox({
		rel:'gal',
		width: '80%', 
		height: '80%'
	});
	

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();


	$(document).on("click",".menu-toggle",function(){
		$(this).toggleClass('open');
		$('.main-navigation').toggleClass('open');
		$('body').toggleClass('open-mobile-menu');
	});

	/* Sectional Template */
	$(".section-text-image").each( function() {
		var section = $(this);
		var colNum = section.find(".stcol").length;
		if ( section.find(".imagecol").length ) {
			var textCol = section.find(".textcol").outerHeight();
			var imageCol = section.find(".imagecol").outerHeight();
			if(textCol > imageCol) {
				section.find(".colwrap").addClass('alignTop');
			}
		}

		if(colNum==1) {
			section.removeClass("twocol");
			section.addClass("full");
		}
	});

	$(".gform_wrapper li#field_4_2 div.ginput_complex.ginput_container.gf_name_has_2 br").remove();
	

});// END #####################################    END