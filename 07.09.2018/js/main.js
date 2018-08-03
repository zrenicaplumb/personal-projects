$.fn.ajaxSubmit = function(finishCallback, settings){
	 	$(this).on('submit', function(e){
	 		// e.preventDefault();
			var rand = Math.ceil(Math.random()*10000);
			if($(this).attr("enctype")== "multipart/form-data"){
				console.log('submitting with iframe');
				var name = 'iframe_form_'+rand;
				var iframe = $('<iframe name="'+name+'" style="display:none;">').appendTo('body');
				$(this).attr("target", name);
				
				iframe.load(function(){
					var response = $(this).contents().find('body').text();
                    console.log(response);
                    response = JSON.parse(response);
                    if(typeof finishCallback == "function"){
                    	finishCallback(response);
                    }
				});
				
				return true;

			} else {
				e.preventDefault();
				var data = {};
				$(this).find('input, select, textarea, submit').each(function(){
					var name = $(this).attr('name');
					if(name){
						data[name] = $(this).val();
					}
				});
				$.ajax({
					url: $(this).attr("action"),
					method: $(this).attr("method"), 
					data: data,
					dataType: "json",
					success:function(result){
						if(typeof finishCallback == "function"){
							finishCallback(result);
						}
					},
				});
			}
		});
	 };



$(document).ready(function(){
	musicBtn = $('#music-btn');
	bookBtn = $('#book-btn');
	movieBtn = $('#movie-btn');
	infoBtn = $('.info-btn');
	musicForm = $('.music-form');
	bookForm = $('.book-form');
	movieForm = $('.movie-form');
	loginForm = $('#login-form');
	signupBtn = $('#signup-btn');
	loginBtn = $('#login-btn');
	signupForm = $('#signup-form');
	username = $('.username');
	thankBackground = $('.thank-background');
	thankyouBox = $('.thank-you');
	closeBtn = $('.close-btn');
	galleryForm = $('.gallery-form');
	deleteBtn = $('.delete-btn');
	galleryImg = $('.gallery-background img');
	galleryShadow = $('.gallery-shadow');
	shoppingCartLink = $('.cart-link');

	
	$('.gal-img').click(function(){
		var src = $(this).attr('src');
		var title = $(this).siblings('p').text();
		console.log(title);
		$('.shadow-img').attr('src', src);
		$('.shadow-img').siblings('h5').text(title);
		galleryShadow.show();
	});
	shoppingCartLink.click(function(){
		$('.cart-shadow').show();
		$('.cart-div').css({
			'right':'0px'
		});
	});
	$('.close-x').click(function(){
		$('.cart-shadow').hide();
		$('.cart-div').css({
			'right':'-320px'
		})
	});
		

		

	
	galleryShadow.click(function(){
		galleryShadow.hide();

		
	});
	$('.cart-shadow').click(function(){
		$('.cart-shadow').hide();
		$('.cart-div').css({
			'right':'-320px'
		})
		
	});
	// deleteBtn.click(function() {
	// 	var imgWrap = $(this).parent();
	// 	var btn = $(this);
	// 	var id = $(this).siblings('img').attr("id");
	// 	var action = "delete";
		
	// 	$.ajax({
	// 		url: "delete.php",
	// 		type: "POST",
	// 		data: {
	// 			id: id,
	// 			action: action
	// 		},
	// 		cache: false,
	// 		success: function(data){
	// 			// fetch_data();
	// 			imgWrap.slideUp('fast', function() {
	// 				$(this).remove();
	// 			});
	// 		}
	// 	});
	// });

	
	closeBtn.click(function(){
		thankyouBox.hide();
		thankBackground.hide();
	});
	thankBackground.click(function(){
		thankyouBox.hide();
		thankBackground.hide();
	});
	musicBtn.click(function(){
		bookForm.hide();
		movieForm.hide();
		musicForm.show();
	});
	bookBtn.click(function(){
		bookForm.show();
		movieForm.hide();
		musicForm.hide()
	});
	movieBtn.click(function(){
		bookForm.hide();
		movieForm.show();
		musicForm.hide();
	});
	signupBtn.click(function(){
		loginForm.hide();
		signupForm.show();
	});
	loginBtn.click(function(){
		signupForm.hide();
		loginForm.show();
	});
	
	
	 

	


	
});

