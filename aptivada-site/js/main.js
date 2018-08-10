$(document).ready(function(){

	$( ".nav-item-1" ).hover(function() {
    		$('.nav-submenu').addClass( "show" );
  		}, function() {
    		$('.nav-submenu').removeClass( "show" );
  		}
	);

	$('.nav-item-1').on('click', function(){
		$('.slide-menu-shadow').css({
				'display':'none'
			});
			$('.slide-out-menu').css({
				'left':'-320px'
			});
			$('#products').scrollView();

		});


	$(window).scroll(function(){
	    if ($(window).scrollTop() >= 15) {
	        $('.top-bar').addClass('position-fixed');
	         $('.nav-item a').css({
	         	'color':'black'
	         });
	         $('.sign-in-btn').css({
	         	'color':'black',
	         	'border-color':'black'
	         });
	         $('#logo').attr('src', 'img/A_Black.png');
	         $('#logo2').attr('src', 'img/A_Black.png');
	       
	    }

	    else {
	        $('.top-bar').removeClass('position-fixed');
	        $('.nav-item a').css({
	         	'color':'#fff'
	         });
	        $('.sign-in-btn').css({
	         	'color':'#fff',
	         	'border-color':'#fff'
	         });
	        $('#logo').attr('src', 'img/A_White2.png');
	        $('#logo2').attr('src', 'img/A_White2.png');
	    }

	});
	
	$( ".hamburger-menu" ).on('click', function(){
		$('.slide-menu-shadow').css({
			'display':'initial'
		});
		$('.slide-out-menu').css({
			'left':'0px'
		});
		$('.slide-menu-shadow').on('click', function(){
			$(this).css({
				'display':'none'
			});
			$('.slide-out-menu').css({
				'left':'-320px'
			});
		});
	});


	$.fn.scrollView = function () {
	  	return this.each(function () {
		    $('html, body').animate({
		      	scrollTop: $(this).offset().top
		    }, 1000);
		});
	}

});