(function($) {
    "use strict";
     $(document).on('ready', function() {	
	
		// 	Search JS
		$('.search a').on( "click", function(){
			$('.search-form, .search-area').toggleClass('active');
		});		
	
		/*====================================
			Mobile Menu
		======================================*/ 	

		$('.menu').slicknav({
			prependTo:".mobile-nav",
			allowParentLinks: true,
			duration: 600,
			closeOnClick:true,
		});

		$('.slicknav_menu li:last a').focusout(function(event){
 	 		$('.menu').slicknav('close');
		}); 
	
		/*===============================
			Home Slider JS
		=================================*/ 
		$(".slider-active").owlCarousel({
			loop:true,
			autoplay:false,
			smartSpeed: 700,
			autoplayTimeout:3500,
			singleItem: true,
			autoplayHoverPause:true,
			center:false,
			nav:true,
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			dots:false,
			items:1,
		});	
		
		/*===============================
			Trips Slider
		=================================*/ 
		$(".trips-slider").owlCarousel({
			loop:true,
			autoplay:false,
			smartSpeed: 500,
			autoplayTimeout:3500,
			singleItem: true,
			autoplayHoverPause:true,
			margin:30,
			dots:false,
			nav:true,
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			responsive:{
				300: {
					items:1,
				},
				480: {
					items:2,
				},
				768: {
					items:2,
				},
				1170: {
					items:3,
				},
			}
		});		
		
		/*===============================
			Trips Slider
		=================================*/ 
		$(".destinations-slider").owlCarousel({
			loop:true,
			autoplay:false,
			smartSpeed: 500,
			autoplayTimeout:3500,
			singleItem: true,
			autoplayHoverPause:true,
			margin:30,
			dots:false,
			nav:true,
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			responsive:{
				300: {
					items:1,
				},
				480: {
					items:2,
				},
				768: {
					items:3,
				},
				1170: {
					items:3,
				},
			}
		});	
		
		/*===============================
			Clients Carousel JS
		=================================*/ 
		$(".clients-slider").owlCarousel({
			loop:true,
			autoplay:true,
			smartSpeed: 500,
			autoplayTimeout:2000,
			singleItem: true,
			autoplayHoverPause:true,
			center:false,
			margin:30,
			nav:false,
			dots:false,
			responsive:{
				300: {
					items:1,
				},
				480: {
					items:2,
				},
				768: {
					items:4,
				},
				1170: {
					items:5,
				},
			}
		});	
		
		/*====================================
			Flex Slider JS
		======================================*/
		(function($) {
			'use strict';	
				$('.flexslider-thumbnails').flexslider({
					animation: "slide",
					controlNav: "thumbnails",
				});
		})(jQuery);
		
		
		
		/*=====================================
			Video Popup
		======================================*/ 
		$('.video-popup').magnificPopup({
			type: 'iframe',
			removalDelay: 300,
			mainClass: 'mfp-fade'
		});
		
		/*=====================================
			Date Picker JS
		======================================*/ 
		$( function() {
			$( "#datepicker" ).datepicker();
			$( "#datepicker2" ).datepicker();
		} );
		
		
		/*======================================
		14.	Parallax JS
		======================================*/ 
		$(window).stellar({
            responsive: true,
            positionProperty: 'position',
			horizontalOffset: 0,
			verticalOffset: 0,
            horizontalScrolling: false
        });
		
		/*====================================
			Nice Select JS
		======================================*/	
		$('select').niceSelect();
	
	});
		/*=====================================
			Scroll Up
		======================================*/ 
		$.scrollUp({
			scrollName: 'scrollUp',      // Element ID
			scrollDistance: 300,         // Distance from top/bottom before showing element (px)
			scrollFrom: 'top',           // 'top' or 'bottom'
			scrollSpeed: 1000,            // Speed back to top (ms)
			easingType: 'easeInQuad',        // Scroll to top easing (see http://easings.net/)
			animation: 'slide',           // Fade, slide, none
			animationSpeed: 200,         // Animation speed (ms)
			scrollTrigger: false,        // Set a custom triggering element. Can be an HTML string or jQuery object
			scrollTarget: false,         // Set a custom target element for scrolling to. Can be element or number
			scrollText: ["<i class='fa fa-angle-up'></i>"], // Text for element, can contain HTML
			scrollTitle: false,          // Set a custom <a> title if required.
			scrollImg: false,            // Set true to use image
			activeOverlay: false,        // Set CSS color to display scrollUp active point, e.g '#00FFFF'
			zIndex: 323332           // Z-Index for the overlay
		});
		
		$(window).on('load', function() {
				$('.preeloader').fadeOut('slow', function(){
				$(this).remove();
			});
		});
		$('.trip-tab-inner ul.nav-tabs li a:first').addClass('active');

		var tabActive = $('ul.nav-tabs li a.active').attr('href');

		$(tabActive).addClass('show');
		$(tabActive).addClass('active');
})(jQuery);
