function adventure_travelling_open_nav() {
  window.adventure_travelling_responsiveMenu=true;
  jQuery(".sidenav").addClass('show');
}
function adventure_travelling_close_nav() {
  window.adventure_travelling_responsiveMenu=false;
  jQuery(".sidenav").removeClass('show');
}

jQuery(function($){
  "use strict";
  $('.menu-nav > ul').superfish({
    delay:       500,
    animation:   {opacity:'show',height:'show'},
    speed:       'fast'
  });
  $('.search-box span a').click(function(){
    $(".serach_outer").toggle();
  });
});

jQuery(function($){
  $(window).scroll(function(){
    var scrollTop = $(window).scrollTop();
    if( scrollTop > 100 ){
      $('.menubar').addClass('scrolled');
    }else{
      $('.menubar').removeClass('scrolled');
    }
      $('.main-header').css('background-position', 'center ' + (scrollTop / 2) + 'px');
  });
});

// ===== Scroll to Top ==== 
jQuery(function($){
  $(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {
      $('#return-to-top').fadeIn(200);
    } else {
      $('#return-to-top').fadeOut(200);
    }
  });
  $('#return-to-top').click(function() {
    $('body,html').animate({
      scrollTop : 0
    }, 500);
  });
});