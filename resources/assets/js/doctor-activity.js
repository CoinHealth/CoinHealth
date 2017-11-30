var doctorActivity = {
	init: function() {
		var self = this;
		self.appointments();
	},

	appointments: function() {
		var start = function() {
			$('.btnEditActivity').on('click', setData);
			$('.btnDoneSetAppointment').on('click', setAppointment);
		},
		setData = function() {
				$('.alert-setting').hide();
				var id = $(this).attr('data-activity-id');
				$('[name="activity_id"]').val(id);
			$.get('/profile/getActivity/'+id, function(data) {
					// console.log(data);
					$('#physician_name').val(data.provider.full_title);
					$('[name="appointment_profile"]').val(data.user.full_name);
					$('[name="reason"]').val(data.reason);
					console.log(data.app_date);
					
					$('[name="scheduled_on"]').val(data.app_date);

					if(data.status == 0) {
						$('.btnDoneSetAppointment').show();
					} 
					else {
						$('.btnDoneSetAppointment').hide();
					}
				});
		},
		setAppointment = function() {
			var data = {},
					modal = $('#modal-appointment'); 
			modal.find('input, textarea, select').each(function(index, value) {
          	data[value.name]  = value.value
        });
			$.post('/profile/postActivity', data).done(done);

		},
		done = function(data) {
		  var alert = $('.alert-setting'),
          label = $('.alert-label');
          alert.fadeIn();
          if(data.success == true) {
              alert.removeClass('alert-warning');
              alert.addClass('alert-success');
          }
          else {
              alert.removeClass('alert-success');
              alert.addClass('alert-warning');
          }
          label.text(data.message);
          setTimeout(function() {
	          	var panel = $('.panel[data-id="'+ data.id +'"]');
          		panel.removeClass('panel-warning')
          							.addClass('panel-primary');
          		panel.find('.scheduled_on').text(data.appointment.scheduled_on.scheduled_date);
          		panel.find('.status').text('Confirmed');
              	$('#modal-appointment').modal('hide');

          }, 3000);
		};
		start();
	},



};
doctorActivity.init();