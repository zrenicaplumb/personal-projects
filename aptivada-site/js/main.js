$(document).ready(function(){
	$( ".nav-item-1" ).hover(function() {
    		$('.nav-submenu').addClass( "show" );
  		}, function() {
    		$('.nav-submenu').removeClass( "show" );
  		}
	);
});