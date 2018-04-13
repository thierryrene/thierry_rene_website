/**
 * Created with thierry_portfolio.
 * User: thierryrene
 * Date: 2014-09-09
 * Time: 09:31 PM
 */

$(document).ready(function() {

	navigator.serviceWorker && navigator.serviceWorker.register('https://' + window.location.hostname + '/sw.js').then(function(registration) {
		console.log('Excellent, registered with scope: ', registration.scope);
	});

	$('.navbar').addClass('animated fadeInUp').css('animation-delay', '1s');

	$('header').addClass('animated fadeInUp').css('animation-delay', '2s');

		  // Initialize Firebase
		  var firebaseConfig = {
		    apiKey: "AIzaSyCCQm910VxUk43w0Psc40nhQPMUvAni18A",
		    authDomain: "thierryrenematos-webdev.firebaseapp.com",
		    databaseURL: "https://thierryrenematos-webdev.firebaseio.com",
		    projectId: "thierryrenematos-webdev",
		    storageBucket: "thierryrenematos-webdev.appspot.com",
		    messagingSenderId: "643792613259"
		  };

		  firebase.initializeApp(firebaseConfig);

		  var database = firebase.database();
		  
	
	var n = 0;
	
	$('body, img, div')
	  .mouseenter(function() {
	  	var el = $(this);
	    n += 1;
	    ga('send', 'event', 'Imagem Animada', 'Passou o Mouse', 'Campanha do Nada');
	    console.log('mouse hahaha! [' + n + ']' + el.attr('name'));
	  });

});

