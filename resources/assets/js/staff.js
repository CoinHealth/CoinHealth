const staff = new Vue({
    el: '#staff',
    data: {
        staffData: [],
    },

    mounted() {
        this.init();
        this.getStaff();
        this.addStaff();
    },

    methods: {
        init() {
            this.dataTable = $('.datatable').DataTable({
                responsive: true,
            });
        },

        getStaff() {
            var self = this;
            self.dataTable = $('.datatable');
            $.get('/profile/staff/api/getStaff')
                .done((response) => {
                        self.staffData = response;
                        self.dataTable.dataTable().fnClearTable();
                        response.forEach((item, index) => {
                            self.dataTable.dataTable().fnAddData([
                                  item.user.full_name,
                                  item.user.email,
                                  'Active',
                                  '',
                            ]);
                        });
                });
        },

        addStaff() {
            let self = this;
            var modal = $('#add-staff'),
                alert = modal.find('.alert-setting');
                alert.hide();
            modal.find('.btnSubmit').on('click',  function() {
                $.post('/profile/staff/add', {
                    'email': modal.find('[name="email"]').val(),
                }).done(function(data) {
                    var label = alert.find('.alert-label');
                    label.text(data.message);
                    alert.fadeIn();
                    if(data.success == true) {
                        alert.removeClass('alert-warning');
                        alert.addClass('alert-success');
                        self.getStaff();
                        setTimeout(function() {
                            modal.modal('hide');
                            alert.hide();
                            modal.find('[name="email"]').val('');
                        }, 2000);
                    }
                    else {
                        alert.removeClass('alert-success');
                        alert.addClass('alert-warning');
                    }


                });
            });
            
        },

        

    },

});
