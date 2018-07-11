$(document).ready(function(){
	musicBtn = $('#music-btn');
	bookBtn = $('#book-btn');
	movieBtn = $('#movie-btn');
	infoBtn = $('.info-btn');
	musicForm = $('.music-form');
	bookForm = $('.book-form');
	movieForm = $('.movie-form');

	
	if (musicBtn.click) {

	}
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


	
});