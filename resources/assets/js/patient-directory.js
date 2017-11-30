const app = new Vue({
    el: '#profile',
    mounted () {
    	this.init();
        this.setModal();
        this.setAppoinment();
    },

    methods: {
    	init() {
			$('.datatable').dataTable();
            // $('.datepicker').datetimepicker();

    	},

        setModal() {

            $('.btnSetAppointment').on('click', function(){
                $('.alert-setting').hide();
                var id = $(this).attr('data-provider-id');
                $.get('/directory/doctors/api/'+id).done(function(data) {
                    // console.log(data.provider);
                    var address = $('[name="provider_id"]');
                    address.empty();

                    $.each(data.provider, function(i, v) {
                        $('#physician_name').val(v.full_title);
                        address.append('<option value="'+v.id+'">'+v.full_address+'</option>')
                    });

                });
            });
        },

        setAppoinment() {
            var self = this;
            $('.btnDoneSetAppointment').on('click', function() {
                var $this = $(this);
                $this.prop('disabled', true).text('Saving...');
                $.post('/profile/directory/setAppointment', {
                    reason: $('[name="reason"]').val(),
                    provider_id: $('[name="provider_id"]').val(),
                    date: $('[name="date"]').val(),
                }).done(function(data) {
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
                        $('#modal-set-appointment').modal('hide');
                        self.clearAll();
                        if(data.points != '') {
                            var modal = $('#modal-gamification');
                            modal.find('.points').text(data.points);
                            modal.find('.points-desc').text(data.award);
                            modal.modal('show');
                        }
                    }, 3000); 
                });
            });
        },

        clearAll() {
            $('.btnDoneSetAppointment').prop('disabled', false).text('Done');
            $('[name="reason"]').val('');
            $('[name="provider_id"]').val('');
            $('[name="date"]').val('');
        }


    },

});
