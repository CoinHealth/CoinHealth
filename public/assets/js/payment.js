var checkout = new Vue({
    el: '#checkout',

    data: {
        years: [],
        months: ["Jan", "Feb", "Mar", "Apr","May","Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"],
        subscription: 'crm-free',
        name: '',
        email: '',
        credit_card_number: '',
        exp_month: 1,
        exp_year: 0,
        credit_card_type: '',
        cvv_cid: '',
        expiration_date: '',
        error: 200,
        success: false,
    },

    mounted: function() {
        var nowY = new Date().getFullYear();

        this.exp_year = nowY;
        for(var y=(nowY-5); y<=(nowY+5); y++) {
            this.years.push(y);
        }

        this.expiration();

    },

    methods: {
        submit: function()  {
            if (Laravel.isAuthenticated) {
                var self = this;
                $.post('/api/payment', {
                    _token: csrf_token,
                    name: self.name,
                    email: self.email,
                    credit_card_number: self.credit_card_number,
                    exp_month: self.exp_month,
                    exp_year: self.exp_year,
                    credit_card_type: self.credit_card_type,
                    cvv_cid: self.cvv_cid,
                    subscription: self.subscription,
                }).done(self.ajxSuccess)
                .fail(self.failed)
            }
            else {
                inspect
            }
        },

        ajxSuccess: function(response) {
            var self = checkout;
            self.success = response.success;
            $('button[type="submit"]').attr('disabled', true);
        },

        failed: function(response) {
            var self = checkout;
            self.error = response.status;

        },

        expiration: function() {
            var self = checkout || this;
            self.expiration_date = self.exp_month+'/'+self.exp_year;
        },
    },

});
