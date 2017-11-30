var sidebar = {

	init: function() {
		var self= this;
		$('.sidebar-btn').on('click', function() {
			if ($('#sidebar').is(':hidden')) {
				$('#sidebar').fadeIn('fast');
			}
			else if ($('#sidebar').is(':visible')) {
				$('#sidebar').hide();
				$('#sidebar').fadeOut('fast');
			}
		});

		$('.sidebar-btn').click(function(){
			$(this).toggleClass('open');
		});
		$('[data-toggle="tooltip"]').tooltip();

	},




};
