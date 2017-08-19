/**
* Created with thierry_portfolio.
* User: thierryrene
* Date: 2014-09-10
* Time: 11:15 AM
* To change this template use Tools | Templates.
*/

/********************************************************/
/********************************************************/

/*!
 * classie - class helper functions
 * from bonzo https://github.com/ded/bonzo
 * 
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */

/*jshint browser: true, strict: true, undef: true */
/*global define: false */

( function( window ) {

'use strict';

// class helper functions from bonzo https://github.com/ded/bonzo

function classReg( className ) {
  return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
}

// classList support for class management
// altho to be fair, the api sucks because it won't accept multiple classes at once
var hasClass, addClass, removeClass;

if ( 'classList' in document.documentElement ) {
  hasClass = function( elem, c ) {
    return elem.classList.contains( c );
  };
  addClass = function( elem, c ) {
    elem.classList.add( c );
  };
  removeClass = function( elem, c ) {
    elem.classList.remove( c );
  };
}
else {
  hasClass = function( elem, c ) {
    return classReg( c ).test( elem.className );
  };
  addClass = function( elem, c ) {
    if ( !hasClass( elem, c ) ) {
      elem.className = elem.className + ' ' + c;
    }
  };
  removeClass = function( elem, c ) {
    elem.className = elem.className.replace( classReg( c ), ' ' );
  };
}

function toggleClass( elem, c ) {
  var fn = hasClass( elem, c ) ? removeClass : addClass;
  fn( elem, c );
}

var classie = {
  // full names
  hasClass: hasClass,
  addClass: addClass,
  removeClass: removeClass,
  toggleClass: toggleClass,
  // short names
  has: hasClass,
  add: addClass,
  remove: removeClass,
  toggle: toggleClass
};

// transport
if ( typeof define === 'function' && define.amd ) {
  // AMD
  define( classie );
} else {
  // browser global
  window.classie = classie;
}

})( window );

/********************************************************/
/********************************************************/

/**
 * cbpAnimatedHeader.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2013, Codrops
 * http://www.codrops.com
 */

var cbpAnimatedHeader = (function() {

	var docElem = document.documentElement,
		header = document.querySelector( '.navbar-fixed-top' ),
		didScroll = false,
		changeHeaderOn = 300;

	function init() {
		window.addEventListener( 'scroll', function( event ) {
			if( !didScroll ) {
				didScroll = true;
				setTimeout( scrollPage, 250 );
			}
		}, false );
	}

	function scrollPage() {
		var sy = scrollY();
		if ( sy >= changeHeaderOn ) {
			classie.add( header, 'navbar-shrink' );
		}
		else {
			classie.remove( header, 'navbar-shrink' );
		}
		didScroll = false;
	}

	function scrollY() {
		return window.pageYOffset || docElem.scrollTop;
	}

	init();

})();

/********************************************************/
/********************************************************/

/* SMOOTH SCROLL CSS TRICKS CODE SNIPPET */

$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1500);
        return false;
      }
    }
  });
});

/********************************************************/
/********************************************************/

// /* MANDRIL EMAIL API HUB */

// // Criada uma função para armazenar o log da API do Mandrill

// function log(obj) {
//   $('#response').text(JSON.stringify(obj));
// }

// // Criada uma nova instancia da class Mandrill, com base na biblioteca do Mandrill. 
// //Aqui é necessário informar a API KEY.
// var m = new mandrill.Mandrill('nRsrJlO-ZN7rIe78Re0Hhw');


// // Testamos a conta com o metodo ping

// // * m.users.ping(function(res) {
// //   log(res);
// // }, function(err) {
// //   log(err);
// // });

// // Variável params utilizada para determinar as ações da API

// var params = {
//   "message": {
//     "from_email": "ola@thierryrenewebdev.com",
//     "to": [{
//       "email": "contato@thierryrenewebdev.com"
//     }],
//     "subject": "Confirmation for Social Media Course.",
//     "html": "<p>texto html</p>",
//     "autotext": true,
//     "track_opens": true,
//     "track_clicks": true
//   }
// };

// function sendTheMail() {
//   // Função para enviar email

//   m.messages.send(params, function(res) {
//     log(res);
//   }, function(err) {
//     log(err);
//   });
// }







