'use strict';

/*
 * Importing functions ..
 */

import jQuery from 'jquery';
import Shuffle from 'shufflejs';
import astro from 'Astro';
import Awesomplete from 'awesomplete';

window.$ = window.jQuery = jQuery;

var shit = require('jquery-accessible-hide-show-aria');

/*
 * .. defining functions ..
 */

function shuffleItems() {
  var shuffle = new Shuffle($('.artist-list'), {
    itemSelector: '.artist-item',
    columnWidth: 210,
    isCentered: true,
  });

  var filterList = $('.filters');
  var filterLinks = filterList.find('a');

  filterLinks.click(function() {

    if ($(this).hasClass('is-active') ) {
      return false;
    }

    filterList.find('.is-active').removeClass('is-active');
    $(this).addClass('is-active');

    var selector = $(this).attr('data-filter');
    shuffle.filter(selector);

    if ($(this).hasClass('reset')) {
      shuffle.filter();
    }

    return false;
  });
};

function featureDetection() {
  let className = '';
  let html = '';
  html = document.documentElement;
  className = html.className.replace('no-js', 'js');
  html.className = className;
};


/*
 * .. and executing them
 */

$(document).ready(function() {

	featureDetection();
	astro.init();

	// function smoothScroll() {
	  $('a[href*="#"]:not([href="#"])').click(function() {
	    if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html, body').animate({
	          scrollTop: target.offset().top
	        }, 750);
	        return false;
	      }
	    }
	  });
	// }

  if ($('body').hasClass('home')) {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", window.location.href + "/api", true);
    ajax.onload = function() {
      var input = document.getElementById('awesomplete');
      var list = JSON.parse(ajax.responseText).map(function(i) { return i.title; });
      new Awesomplete(input, {
        list: list,
        filter: function(text, input) {
          return Awesomplete.FILTER_CONTAINS(text, input.match(/[^,]*$/)[0]);
        },

        item: function(text, input) {
          return Awesomplete.ITEM(text, input.match(/[^,]*$/)[0]);
        },

        replace: function(text) {
          var before = this.input.value.match(/^.+,\s*|/)[0];
          this.input.value = before + text + ", ";
        }
      });
    };
    ajax.send();
  }

	if ($('body').hasClass('volume') && $('.artist-list').length > 0) {
		shuffleItems();
	}

});
