/**
 * Created with thierry_portfolio.
 * User: thierryrene
 * Date: 2014-09-09
 * Time: 09:31 PM
 */

$(document).ready(function() {

	navigator.serviceWorker && navigator.serviceWorker.register('./js/sw.js').then(function(registration) {
		console.log('Excellent, registered with scope: ', registration.scope);
	});

	$('.navbar').addClass('animated fadeInUp').css('animation-delay', '1s');

	$('header').addClass('animated fadeInUp').css('animation-delay', '2s');

});

