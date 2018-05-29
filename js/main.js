/**
 * Created with thierry_portfolio.
 * User: thierryrene
 * Date: 2014-09-09
 * Time: 09:31 PM
 */

$(document).ready(function() {

	// if('serviceWorker' in navigator) {
	// 	navigator.serviceWorker
	// 	.register('https://' + window.location.hostname + '/sw.js')
	// 	.then(function(registration) {
	// 		console.log('Excellent, registered with scope: ', registration.scope);
	// 	});
	// }

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

	$('img#thierry-photo')
	  .mouseenter(function() {
	  	var el = $(this);
	    n += 1;
	    ga('send', 'event', 'Imagem Animada', 'Passou o Mouse', 'Campanha do Nada');
	    console.log('passou o mouse hahaha! [' + n + ']');
	  });

	$(document).on('click', 'i.fa.fa-facebook', function () {
		ga('send', 'event', 'social-link-click', 'facebook-link-click');
		console.log('facebook link click!');
	});

	$(document).on('click', 'i.fa.fa-linkedin', function () {
		ga('send', 'event', 'social-link-click', 'linkedin-link-click');
		console.log('linkedin link click!');
	});

	$(document).on('click', 'i.fa.fa-twitter', function () {
		ga('send', 'event', 'social-link-click', 'twitter-link-click');
		console.log('twitter link click!');
	});

	$(document).on('click', 'i.fa.fa-google-plus', function () {
		ga('send', 'event', 'social-link-click', 'google-plus-link-click');
		console.log('google-plus link click!');
	});

	$(document).on('click', 'i.fa.fa-github', function () {
		ga('send', 'event', 'social-link-click', 'github-plus-link-click');
		console.log('github link click!');
	});

	$(".animsition").animsition({
	    inClass: 'fade-in',
	    outClass: 'fade-out',
	    inDuration: 1500,
	    outDuration: 800,
	    // linkElement: '.animsition-link',
	    // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
	    loading: true,
	    loadingParentElement: 'body', //animsition wrapper element
	    loadingClass: 'animsition-loading',
	    loadingInner: '', // e.g '<img src="loading.svg" />'
	    timeout: false,
	    timeoutCountdown: 5000,
	    onLoadEvent: true,
	    browser: [ 'animation-duration', '-webkit-animation-duration'],
	    // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
	    // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
	    overlay : false,
	    overlayClass : 'animsition-overlay-slide',
	    overlayParentElement : 'body',
	    transition: function(url){ window.location.href = url; }
	  });

});

