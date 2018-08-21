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
	       	$('.top-bar .ham-menu-white div').css({
	       		'background':'black'
	       	});
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
	        	$('.top-bar .ham-menu-white div').css({
	       		'background':'#fff'
	       	});
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

	updateContainer();

    $(window).on('resize', function() {

        updateContainer();

    });

	function updateContainer(){

		try {
			$('.carousel').slick('destroy');
		} catch(e){
			
		}
		var win = window.innerWidth;
		switch(true){
			case win > 990:
				var slides = 4;
				break;
			case win <= 990 && win > 760:
				var slides = 3;
				break;
			case win <= 760 && win > 560:
				var slides = 2;
				break;
			case win <= 560:
				var slides = 1;
				break;
		}
		$('.carousel').slick({
		  	slidesToShow: slides,
		  	slidesToScroll: 1,
		  	autoplay: true,
			arrows:false,  
		});
	}
	// $('.underline').slick({
	// 	arrows:false,
	// 	infinite: true,
	// 	autoplaySpeed: 1500,
	// 	fade: true,
	// 	cssEase: 'linear',
	// 	autoplay: true,
	// 	speed:200,
	//   });
	var words = ['CONTESTING','PHILOSOPHIZING','EATING','SLEEPING','SWIMMING'];
	var index = 0;
	$('.underline').css({
		'transition': 'all 1s linear'
	})
	function rotate() {
		$('.underline').html(words[(index++) % (words.length)]);
		
	}
	setInterval(rotate, 2000);
	
	
	
	
});