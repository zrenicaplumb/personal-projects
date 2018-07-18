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
	
thankyouBox.hide();
		thankBackground.hide();
	// loginForm.hide();
	// username.hide();
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
		musicForm.hide();
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