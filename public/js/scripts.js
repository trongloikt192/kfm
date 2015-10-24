// Empty JS for your own code to be here

function backToTop() {
	var offset = 220;
	var duration = 500;

	jQuery(window).scroll(function() {
		if (jQuery(this).scrollTop() > offset) {
			jQuery('.back-to-top').fadeIn(duration);
		} else {
			jQuery('.back-to-top').fadeOut(duration);
		}
	});
	
	jQuery('.back-to-top').click(function(event) {
		event.preventDefault();
		jQuery('html, body').animate({scrollTop: 0}, duration);
		return false;
	});
}


function slideToggleSearchBtn() {
	$("#btn_search").on('click', function() {
		$("#textbox-search").animate({width:'toggle'}, 100);
		$("#textbox-search").focus();
	});
}


jQuery(document).ready(function() {
	slideToggleSearchBtn();

	backToTop();
});