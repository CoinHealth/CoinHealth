// var $       = require( 'jquery' );
// var dt      = require( 'datatables.net' )( window, $ );
// var buttons = require( 'datatables.net-buttons' )( window, $ );
// $(function() {
//     console.log($);
// })
var leads = {
	init: function() {
		var self = this;
		$('.dataTable').dataTable({});
		self.patientLeads();
	},

	patientLeads: function() {
		var modal = $('#modal-set-patient');
		var start = function() {
			$('.btnSetAs').on('click', setModal);
			$('.btn-submit').on('click', submit);
			modal.find('.alert').hide();
		},
		setModal = function() {
			var id = $(this).attr('data-id');
			// alert(id);
			modal.find('[name="user_id"]').val(id);
		},
		submit = function() {

			$.post('/profile/leads/setPatient', {
				user_id: modal.find('[name="user_id"]').val(),
			}).done(done);

		},
		done = function(data) {
			console.log(data);
			modal.find('.alert').fadeIn();

			setTimeout(function() {
				// remove to list
				$('.dataTable').dataTable().fnDeleteRow($('tr[data-id="'+data.id+'"]'));
				modal.find('.alert').hide();
				modal.modal('hide');
			}, 2000);

		};
		start();
	},

};
leads.init();