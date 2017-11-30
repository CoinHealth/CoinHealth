$(function(e) {
	$('.btn-solo[data-toggle=buttons]').on('change', 'input[type=radio]', btnSolo);
});


$.fn.fadeActive = function() {
	this.fadeIn().addClass('active');
};
$.fn.fadeOutActive = function() {
	this.fadeOut(100).removeClass('active');
};
function uid() {
	return 'xxxxxxxx-xxxx-4xxx'.replace(/[xy]/g, function(c) {
		var r = Math.random()*16|0,
		v = c == 'x' ? r : (r&0x3|0x8);
		return v.toString(16);
	});
}
function btnSolo() {
	var parent = $(this).parents('.btn-solo'),
	others = parent.find('.cp-btn-checkbox:not(.active)'),
	selected = parent.find('.cp-btn-checkbox.active');

	others.fadeOut('fast', function() {

	});
};

function getParameterByName(name,url) {
	if (!url) url = window.location.href;
	name = name.replace(/[\[\]]/g, "\\$&");
	var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
	results = regex.exec(url);
	if (!results) return null;
	if (!results[2]) return '';
	return decodeURIComponent(results[2].replace(/\+/g, " "));
};

String.prototype.capitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}
