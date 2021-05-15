jQuery(function($) {
	
	'use strict';
	
	$("#search-icon").click(function (e) {
	 
	   e.preventDefault();
      web_log_search();
	});

	function web_log_search(e) {
        $('#search-popup').addClass('popup-box-on');
	    //$('#search-popup').find('.pop-up-form').focus();
	    $('.top-bar-search form input[type="search"]').focus();
        var focusableEls = $('.top-bar-search a[href]:not([disabled]), .top-bar-search button:not([disabled]), .top-bar-search input:not([disabled])');
        var firstFocusableEl = focusableEls[0];
        var lastFocusableEl = focusableEls[focusableEls.length - 1];
        var KEYCODE_TAB = 9;
        $('.top-bar-search').on('keydown', function (e) {
            if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
                if (e.shiftKey) /* shift + tab */ {
                    if (document.activeElement === firstFocusableEl) {
                        lastFocusableEl.focus();
                        e.preventDefault();
                    }
                } else /* tab */ {
                    if (document.activeElement === lastFocusableEl) {
                        firstFocusableEl.focus();
                        $('.top-bar-search form input[type="search"]').focus();
                        e.preventDefault();
                    }
                }
            }
        });
    }
	  
	$("#search-popup .close").click(function () {
		$('#search-popup').removeClass('popup-box-on');
	});
	
	$("#mobile-search").click(function (e) {
		e.preventDefault();
        web_log_mobile_search();
	  
	  return false;
	});


function web_log_mobile_search(e) {
        $('#mobile-search-popup').addClass('popup-box');
	    //$('#mobile-search-popup').find('.pop-up-form').focus();

	    $('#mobile-search-popup .top-bar-search form input[type="search"]').focus();
        var focusableEls = $('#mobile-search-popup .top-bar-search a[href]:not([disabled]),#mobile-search-popup .top-bar-search button:not([disabled]), #mobile-search-popup .top-bar-search input:not([disabled])');
        var firstFocusableEl = focusableEls[0];
        var lastFocusableEl = focusableEls[focusableEls.length - 1];
        var KEYCODE_TAB = 9;
        $('#mobile-search-popup .top-bar-search').on('keydown', function (e) {
            if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
                if (e.shiftKey) /* shift + tab */ {
                    if (document.activeElement === firstFocusableEl) {
                        lastFocusableEl.focus();
                        e.preventDefault();
                    }
                } else /* tab */ {
                    if (document.activeElement === lastFocusableEl) {
                        firstFocusableEl.focus();
                         $('#mobile-search-popup .top-bar-search form input[type="search"]').focus();
                         e.preventDefault();
                    }
                }
            }
        });
    }



	$("#close-icon").click(function () {
		$('#mobile-search-popup').removeClass('popup-box');
	});
	
	
	$('.main-menu').clone().appendTo('.mobile-menu');
	$( ".menu-icon" ).on( "click", function() {

		$(".mobile-menu").slideToggle();
	
		$('ul.main-menu').find('li').find('a').first().focus();// set focus to first anchor
		

	});	


 


	$(".mobile-nav").on('keydown',function(e) {

		$('ul.main-menu').find('li').find('a').first().focus();// set focus to first anchor
		

		$(".main-menu").find("li:first a").focus().addClass("active");

		if(e.which == 13) {
			
			$(".mobile-menu").slideToggle();

			$(".main-menu").find("li:first a").focus().addClass("active");


		
			
		}

	});




 $("li.menu-item-has-children").on('click',function(e) {
	

     $(this).children(".mobile-menu ul.sub-menu").slideToggle();


 	  $( this ).find('.zmm-dropdown-toggle').toggleClass('fa-minus');
		


	});


	$('.mobile-menu').find('.menu-item-has-children').append('<span class="zmm-dropdown-toggle fa fa-plus"></span>');
	$( ".mobile-menu .main-menu" ).find('.sub-menu').slideToggle();
	
	

	
	$('.mobile-menu-wrap').find('.mobile-menu').append('<a href="#" class="menu-close"><i class="fa fa-times"></i></a>');
	
	$('.mobile-menu-wrap .menu-close').on("click", function() { $(".mobile-menu").removeAttr("style") } );
	
	if ($(window).width() <= 1024) {
		
		//$( "body" ).addClass( "zmm-open" );
		if($('.menu-icon').on('click', function () {
			$( "body" ).addClass( "zmm-open" ); })
		);
		if($('.menu-close').on('click', function(){
			$( "body" ).removeClass( "zmm-open" ); })
		);
			
	}
	
	
		
});


