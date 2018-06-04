'use strict';

require('./libs/jquery.min.js');

require('./cache-polyfill.min.js');

require('./libs/anijs.min.js');

require('./libs/swiper.min.js');

require('./plugins.min.js');

$(document).ready(function () {

	$('.navbar').addClass('animated fadeInUp').css('animation-delay', '1s');

	$('header').addClass('animated fadeInUp').css('animation-delay', '2s');

	function initFirebase() {
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
	}

	initFirebase();

	$('img#thierry-photo').mouseenter(function () {
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
}); /**
     * Created with thierry_portfolio.
     * User: thierryrene
     * Date: 2014-09-09
     * Time: 09:31 PM
     */

// import _ from 'lodash';