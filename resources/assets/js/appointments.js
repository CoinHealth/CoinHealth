var appointments = {

	init: function() {
		var self = this;
		self.updateStatus();
	},

	updateStatus: function() {
		var start = function() {
			$('.openStatus').on('click', getPatient);
		},
		getPatient = function() {
			var id = $(this).attr('data-id');
			$.get('/profile/appointments/api/getPatient/'+id).done(function(data) {
				$('[name="appointment_id"]').val(data.id);
				$('input[name="status"][value="'+data.status+'"]').prop('checked', true);
			});
		};
		start();
	},



};
appointments.init();