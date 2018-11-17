(function($) {

	"use strict";

	$(document).ready(function() {
		/* Loader */
		$('.wrapper.loading').removeClass('loading');
		$('.animsition-loading').remove();


		/* 	var TIMEOUT = 300; */
		if (window.location.hash) {
			goToHash(window.location.href);
		}	

		$('[data-link-href]').on('click', function(){
			window.location.href = $(this).data('link-href');
		});		
	});
	
	function goToHash(url) {
		var offsetTop, split_url = url.split('#');
		if (split_url.length > 1 && $.isValidSelector('#' + split_url[1]) && $('#' + split_url[1]).length) {
			offsetTop = $('#' + split_url[1]).offset().top;
			$('html, body').stop().animate({
				scrollTop: offsetTop
			}, 500);
			return false;
		}
	}

	$.extend({
		isValidSelector: function(selector) {
			if (typeof(selector) !== 'string') {
				return false;
			}
			try {
				var $element = $(selector);
			} catch (error) {
				return false;
			}
			return true;
		}
	});

})(jQuery);