// setup global ajax setting
$.ajaxSetup({
	// Disable caching of AJAX responses
	cache: false,
	// Good: disable javascript detection globally (https://github.com/jquery/jquery/issues/2432#issuecomment-140038536)
	contents: {
		javascript: false
	}
});

var rawurlencode = function(str) {
	str = (str+'').toString();        
    
	return encodeURIComponent(str).replace(/!/g, '%21').replace(/'/g, '%27').replace(/\(/g, '%28').replace(/\)/g, '%29').replace(/\*/g, '%2A');
};

var loadAvatar = function () {
	// initialize avatar
	$('.avatar').initial({
		width: 500,
		height: 500,
		fontSize: 232,
		fontWeight: 500,
		color: [
			'#3298db',
			'#32c270',
			// '#50bbc4',
			'#9e75db',
			'#a5a5ab',
			'#ac735f',
			'#e6463c',
			'#f069b1',
			'#f07e21',
			'#f0ce0e',
		],
	});
};

var UIWait = function () {
	// block the page
	var message = $('.blockui-message');
	$.blockUI({
		message: message,
		overlayCSS: {
			backgroundColor: '#000',
			opacity: 0.8,
			zIndex: 1200,
			cursor: 'wait',
		},
		css: {
			border: 0,
			padding: '10px 15px',
			color: '#000',
			width: '7%',
			left: '46.5%',
			'-webkit-border-radius': 2,
			'-moz-border-radius': 2,
			backgroundColor: '#ececec',
			zIndex: 1201,
		},
		onBlock: function () {
			clearTimeout();
		},
		cursorReset: 'default',
	});

	window.setTimeout(function () {
		message.html('<i class="icon-spinner10 spinner position-left"></i> <span class="text-semibold">&nbsp;Please wait</span>');
	}, 0);

	window.setTimeout(function () {
		message.html('<i class="icon-spinner10 spinner position-left"></i> <span class="text-semibold">&nbsp;Progress<span id="loading-dots">.</span></span>');
	}, 1000);

	var x = 0;
	// dot animation
	setInterval(function () {
		var dots = "";
		x++;
		for (var y = 0; y < x % 3; y++) {
			dots += ".";
		}
		$("#loading-dots").text(dots);
	}, 500);
};

$(function () {

	// load avatar
	loadAvatar();

	// add shadow scrolled to navbar
	var elm = $(".navbar-fixed-top");

	$(document).scroll(function () {
		elm.toggleClass("shadow", elm.offset().top > 0);
	});
});