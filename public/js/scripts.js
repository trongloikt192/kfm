// Empty JS for your own code to be here

// Google Analytics
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-69353945-1', 'auto');
ga('send', 'pageview');



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