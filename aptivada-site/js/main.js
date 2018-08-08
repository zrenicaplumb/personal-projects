$(document).ready(function(){
	$( ".nav-item-1" ).hover(function() {
    		$('.nav-submenu').addClass( "show" );
  		}, function() {
    		$('.nav-submenu').removeClass( "show" );
  		}
	);
	$(window).scroll(function(){
	    if ($(window).scrollTop() >= 15) {
	        $('.top-bar').addClass('position-fixed');
	         $('.nav-item a').css({
	         	'color':'#535353'
	         });
	       
	    }
	    else {
	        $('.top-bar').removeClass('position-fixed');
	        $('.nav-item a').css({
	         	'color':'#fff'
	         });
	    }
	});
});