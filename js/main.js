/**
 * Created with thierry_portfolio.
 * User: thierryrene
 * Date: 2014-09-09
 * Time: 09:31 PM
 */

$(document).ready(function() {
	
	$('#thierry-photo, #name, #prof, #star-hr')
		.addClass('animated flipInX')
		.css({
			'animation-duration': '3s'
		});

	$('#skills, #custom-navbar')
		.addClass('animated fadeInUp')
		.css({
			'animation-duration': '3s'
		});
		
	$('.music-link').hover(
		function() {
			$(this).addClass('animated fadeInUp');
			console.log("AAAAAAAAH");
		},
		function() {
			$(this).removeClass('animated fadeInUp');
		}
	);

	navigator.serviceWorker && navigator.serviceWorker.register('./js/sw.js').then(function(registration) {
		console.log('Excellent, registered with scope: ', registration.scope);
	});

});
