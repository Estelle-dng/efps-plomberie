// Set unique values for the array "ar"
function uniqueArray(ar) {
	var j = {};

	ar.forEach(function (v) {
		j[v + '::' + typeof v] = v;
	});

	return Object.keys(j).map(function (v) {
		return j[v];
	});
}

// Equalize blocks height by setting the same min-height value
function equalizeBlocks() {
	var blockArray = $('[data-eq]').map(function () {
		return $(this).data('eq');
	}).get();
	var blocks = uniqueArray(blockArray);

	blocks.forEach(function (elem) {
		var prev = 0;
		$('[data-eq="' + elem + '"]')
			.css('min-height', '')
			.each(function () {
				if ($(this).outerHeight() > prev) {
					prev = $(this).outerHeight();
				}
			})
			.css('min-height', prev + 'px');
	});
}

// Square blocks height
function squareBlocks() {
	$('[data-square]').css('min-height', '');
	$('[data-square]').each(function(ev){
		$(this).css('min-height', $(this).outerWidth());
	});
}

// ----------------------------------------- //
// DOM READY
$(document).ready(function ($) {
	"use strict";

	// Block Ref - Slider
	var $slider = $('.slider-ref');
	var $progressBar = $('.progress__item');
	var $progressItem = $('.progress__item');

	$slider.on('init', function(event, slick) {
		var calc = ( 1 / (slick.slideCount) ) * 100;
		$progressItem.css('width', calc + '%');
	});

	$slider.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
		//var calc = ( (nextSlide) / (slick.slideCount - 1) ) * 100;
		var calc = nextSlide * (1 / (slick.slideCount)) * 100;
		$progressBar.css('left', calc + '%');
	});
});

// WINDOW LOAD
$(window).on('load', function() {

	$.fn.createlogo();

	// Activate Animation On Scroll
	AOS.init();

	equalizeBlocks();
	squareBlocks();

	// Fade in slider on page load
	$('.pp-slider').on('init', function(event, slick) {
		$(this).css({
			'opacity': 1,
			'visibility': 'visible'
		});
	});

	// Home Slider
	$('.slider-home').slick({
		infinite: true,
		fade: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 3000,
		speed: 1000,
	});

	$('.slider-ref').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: false,
		autoplaySpeed: 3000,
		speed: 1000,
		dots: true,
		arrows: false,
	});

});

// WINDOW RESIZE
$(window).resize(function () {
	squareBlocks();
	equalizeBlocks();
});
