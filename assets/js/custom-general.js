jQuery(document).ready(function($){

	// fixed nav
	var topH = $('.ui-main-navbar').height();
	$(window).scroll(function(){
		if($(this).scrollTop() > topH) {
			$('.ui-main-navbar').addClass('navFixed');
		} else {
			$('.ui-main-navbar').removeClass('navFixed');
		}
	});

	
	// Social media sharing window
	share_post_on_social_media();

	function share_post_on_social_media() {
		var left_win = (screen.width - 540)/2;
		var top_win = (screen.height - 540)/2;
		var params = "menubar=no, toolbar=no, status=no, width=540, height=450, top=" + top_win + ", left=" + left_win;

		$('a.social_share_link').on('click', function(event){
			event.preventDefault();
			var href = $(this).attr('href');
			window.open(href, "NewWindow", params);
		});
	}
	

}); // end jquery