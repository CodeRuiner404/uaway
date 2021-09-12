/*
 * jQuery Sheeba Lite theme functions file
 * https://www.themeinprogress.com
 *
 * Copyright 2019, ThemeinProgress
 * Licensed under MIT license
 * https://opensource.org/licenses/mit-license.php
 */

jQuery.noConflict()(function($){

	"use strict";
	
/* ===============================================
   HEADER CART
   ============================================= */
	
	$('div.header-cart').hover(
		
		function () {
			$(this).children('div.header-cart-widget').stop(true, true).fadeIn(100);
		}, 
		function () {
			$(this).children('div.header-cart-widget').stop(true, true).fadeOut(400);		
		}
			
	);
	
/* ===============================================
   FIXED HEADER
   =============================================== */

	function sheeba_lite_header() {

		if( $('body').hasClass('sticky_header') ) {

			var menuHeight = $('#menu-wrapper').innerHeight();
			var headerHeight = $('#logo-wrapper').innerHeight();
		
			if( $(window).scrollTop() > headerHeight ) {
				$('#menu-wrapper').addClass('fixed');
				$('body').css({'padding-top': menuHeight});
			} else {
				$('#menu-wrapper').removeClass('fixed');
				$('body').css({'padding-top': 0});
			}
		
		}
	
	}
	
	$( document ).ready(sheeba_lite_header);
	$( window ).scroll(sheeba_lite_header);
	$( window ).resize(sheeba_lite_header);

/* ===============================================
   SCROLL SIDEBAR
   =============================================== */

	$(document).ready(function() {

		$("#scroll-sidebar").niceScroll(".wrap", {
			cursorwidth: "5px",
			cursorborder: "1px solid #333",
			railpadding: {
				top: 0,
				left: 0,
				bottom: 0,
				right: 0
			}
		});

		$('nav#mobilemenu ul > li > a').click(function(){
			setTimeout(function(){
			  $("#scroll-sidebar").getNiceScroll().resize();
			}, 500);
		});
		
	});

	$(window).load(function() {

		$(".mobile-navigation").click(function() {

			$('#overlay-body').fadeIn(500).addClass('visible');
			$('body').addClass('overlay-active').addClass('no-scrolling');
			$('#wrapper').addClass('open-sidebar');

		});

		if ( $(window).width() < 992 ) {

			$("#overlay-body").swipe({
	
				swipeLeft:function() {
					$('#overlay-body').fadeOut(500);
					$('body').removeClass('overlay-active').removeClass('no-scrolling');
					$('#wrapper').removeClass('open-sidebar');
				},
	
				threshold:0
		
			});

			$("#sidebar-wrapper .mobile-navigation").click(function() {
				
				$('#overlay-body').fadeOut(600);
				$('body').removeClass('overlay-active').removeClass('no-scrolling');
				$('#wrapper').removeClass('open-sidebar');
		
			});

		} else if ( $(window).width() > 992 ) {

			$("#sidebar-wrapper .mobile-navigation, #overlay-body").click(function() {
				$('#overlay-body').fadeOut(600);
				$('body').removeClass('overlay-active').removeClass('no-scrolling');
				$('#wrapper').removeClass('open-sidebar');
			});

		}
		
	});

/* ===============================================
   Mobile menu
   =============================================== */

	$('nav#mobilemenu ul > li').each(function(){
		
		if( $('ul', this).length > 0 ) {
			
			$(this)
				.children('a')
				.append('<span class="sf-sub-indicator"><i class="fa fa-caret-down"></i></span>'); 
		
		}
	
	});

/* ===============================================
   Mobile menu 1
   =============================================== */

	$('nav#mobilemenu.mobile-menu-1 ul > li .sf-sub-indicator, nav#mobilemenu.mobile-menu-1 ul > li > ul > li .sf-sub-indicator ').click(function(e){
		
		e.preventDefault();

		if(
			$(this).closest('a').next('ul.sub-menu').css('display') === 'none' ||
			$(this).closest('a').next('ul.children').css('display') === 'none' ||
			$(this).next('ul.children').css('display') === 'none'
		) {	
			$(this).html('<i class="fa fa-caret-up"></i>');
		} else {	
			$(this).html('<i class="fa fa-caret-down"></i>');
		}
		
		$(this)
			.closest('a')
			.next('ul.sub-menu')
			.stop(true,false)
			.slideToggle(500);
	
		$(this)
			.closest('a')
			.next('ul.children')
			.stop(true,false)
			.slideToggle(500);
	
	});

/* ===============================================
   Mobile menu 2
   =============================================== */

	$('nav#mobilemenu.mobile-menu-2 > ul ').children('li').each(function(){
		if( $('ul', this).length > 0 ) {
			$(this).addClass('submenuitem-level-1'); 
		}
	});

	$('nav#mobilemenu.mobile-menu-2 ul > li > a').click(function(e){
		
		e.preventDefault();

		if(
			$(this).next('ul.sub-menu').css('display') === 'none' ||
			$(this).next('ul.children').css('display') === 'none'
		) {	
			
			$(this)
				.find('.sf-sub-indicator')
				.html('<i class="fa fa-caret-up"></i>');
			
			$('nav#mobilemenu.mobile-menu-2 > ul > li')
				.not($(this)
				.parents('.submenuitem-level-1:visible'))
				.children('a')
				.children('.sf-sub-indicator')
				.html('<i class="fa fa-caret-down"></i>');

			$('nav#mobilemenu.mobile-menu-2 > ul > li')
				.not($(this)
				.parents('.submenuitem-level-1:visible'))
				.find('ul.sub-menu')
				.slideUp(500)
				.find('.sf-sub-indicator')
				.html('<i class="fa fa-caret-down"></i>');

			$(this)
				.next('ul.sub-menu')
				.stop(true,false)
				.slideDown('slow');
			$(this)
				.next('ul.children')
				.stop(true,false)
				.slideDown(500);
			
			return false;

		} else {	
		
			if ( $(this).attr('href') === '#' ) {
				
				$(this)
					.find('.sf-sub-indicator')
					.html('<i class="fa fa-caret-down"></i>');
				
				$(this)
					.next('ul')
					.stop(true,false)
					.slideUp(500);
				
				return false;

			} else {
				
				window.location.href = $(this).attr('href');
				return true;
			
			}

		}

	});

/* ===============================================
   Open header search
   =============================================== */

	function sheeba_lite_open_search_form() {

		$('.header-search .search-form').addClass('is-open');
		$('body').addClass('no-scrolling');
		setTimeout(function(){
		   $('.search-form  #header-searchform input#header-s').filter(':visible').focus();
		}, 100);

		return false;
	}

	$( ".header-search a.open-search-form").on("click", sheeba_lite_open_search_form);

/* ===============================================
   Close header search
   =============================================== */

	function sheeba_lite_close_search_form() {
		$('.header-search .search-form').removeClass('is-open');
		$('body').removeClass('no-scrolling');
	}

	$( ".header-search a.close-search-form").on("click", sheeba_lite_close_search_form);

/* ===============================================
   TRAP TAB FOCUS ON MODAL SEARCH
   ============================================= */

	$('.search-form  #header-searchform :input').on('keydown', function (e) {
	    if ($("this:focus") && (e.which === 9)) {
	        e.preventDefault();
	        $(this).blur();
	        $('.search-form a.close-search-form').focus();

	    }
	});

	$('.search-form  a.close-search-form').on('keydown', function (e) {
	    if ($("this:focus") && (e.which === 9)) {
	        e.preventDefault();
	        $(this).blur();
	        $('.search-form  #header-searchform :input').focus();

	    }
	});

/* ===============================================
   Header menu fix
   =============================================== */

	function sheeba_lite_header_menu_fix() {

		if ( $('.header-cart').is(":visible")) {
			$('.header-menu').addClass('visible-header-cart');
		}
		
		if ( $('.header-search .search-form').is(":visible")) {
			$('.header-menu').addClass('visible-header-form');
		}
		
	}

	$(window).load(sheeba_lite_header_menu_fix);
	$(document).ready(sheeba_lite_header_menu_fix);
	
/* ===============================================
   Footer fix
   =============================================== */

	function sheeba_lite_footer() {
	
		var footerHeight = $('#footer').innerHeight();
		$('#wrapper').css({'padding-bottom':footerHeight});
	
	}
	
	$( document ).ready(sheeba_lite_footer);
	$( window ).resize(sheeba_lite_footer);

/* ===============================================
   Scroll to top Plugin
   =============================================== */

	$(window).scroll(function() {
		
		if( $(window).scrollTop() > 400 ) {
			$('#back-to-top').fadeIn(500);
		} else {
			$('#back-to-top').fadeOut(500);
		}
		
	});

	$('#back-to-top').click(function(){
		$("html, body").animate({scrollTop: 0}, 700);
		return false;
	});

/* ===============================================
   Masonry
   =============================================== */

	function sheeba_lite_masonry() {
		
		$('.masonry').imagesLoaded(function () {
	
			$('.masonry').masonry({
				itemSelector: '.masonry-item',
				isAnimated: true
			});
	
		});

	}
   
	$(document).ready(function(){
		sheeba_lite_masonry();
	});

	$(window).resize(function(){
		sheeba_lite_masonry();
	});

/* ===============================================
   fitVids
   =============================================== */

	function sheeba_lite_embed() {

		$('#wrapper').imagesLoaded(function () {
			$('.embed-container, .video-container, .maps-container').fitVids();
			sheeba_lite_masonry();
		});
		
	}

	$(window).load(sheeba_lite_embed);
	$(document).ready(sheeba_lite_embed);

/* ===============================================
   Swipebox gallery
   =============================================== */

	$(document).ready(function(){
		
		var counter = 0;

		$('div.gallery').each(function(){
			
			counter++;
			
			$(this).find('.swipebox').attr('data-rel', 'gallery-' + counter );
		
		});
		
		$('.swipebox').swipebox();

	});

/* ===============================================
   OWL CAROUSEL
   ============================================= */

	$(document).ready(function(){

	/* ===============================================
		HOMEPAGE CAROUSEL
		============================================= */
	
		$('.owl-carousel-slideshow').each(function(){
	
			var stagepadding;
			
			if ( $(this).attr('data-stagepadding') === "1" ) {
				stagepadding = 30;
			} else {
				stagepadding = 0;
			}
			
			var colums = parseInt($(this).attr('data-columns'));
	
			$(this).children('.owl-home-slideshow').owlCarousel({
			
				items:colums,
				nav:true,
				dots:false,
				margin:10,
				loop:true,
				stagePadding: stagepadding,
				navText:[
					'<div class="owl-carousel-arrow prev-arrow"><span class="dashicons dashicons-arrow-left-alt"></span></div>',
					'<div class="owl-carousel-arrow next-arrow"><span class="dashicons dashicons-arrow-right-alt"></span></div>'
				],
				responsive:{
					600:{
						items:1,
						nav:true,
					},
					992:{
						items:colums,
						nav:true,
					}
				}
			
			});
		
		});
		
	});

});          