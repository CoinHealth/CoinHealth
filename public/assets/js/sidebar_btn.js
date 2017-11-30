$(document).ready(function() {

	$('#select_lang').on('click', function() {
		$('#languagesModal').modal('toggle');
	});

	$('.sidebar-btn').click(function(){
		$(this).toggleClass('open');
	});

	$('.sidebar-btn').on('click', function() {
		if ($('#sidebar').is(':hidden')) {
			$('#sidebar').fadeIn('fast');
		}
		else if ($('#sidebar').is(':visible')) {
			$('#sidebar').hide();
			$('#sidebar').fadeOut('fast');

		$('#sidebar')}
	});

	$("[data-toggle='tooltip']").tooltip();
});
