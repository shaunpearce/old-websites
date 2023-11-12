// JavaScript Document

$(window).bind('scroll', function() {
        var navHeight = 0;
        if ($(window).scrollTop() > navHeight) {
            $('.navbar').addClass('on');
        } else {
            $('.navbar').removeClass('on');
        }
    });
	


$('.menu a').click(function(){
 
  $('.trigger').toggle();
  $('.menu').toggleClass('round');
  $('.close').toggle();
  $('.drop-down').toggleClass('down');
  
 
});


$(function() {
  if($(window).width() <= 992) {
    $("img").each(function() {
      $(this).attr("src", $(this).attr("src").replace("images/620x410/", "images/310x205/"));
    });
  }
});