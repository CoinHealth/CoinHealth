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
        status: 0,
        response: null,
    },

    mounted: function() {
        var nowY = new Date().getFullYear();
        this.exp_year = nowY;
        for(var y=nowY; y<=(nowY+5); y++) {
            this.years.push(y);
        }
        this.expiration();
    },

    methods: {
        submit: function()  {
            if (!Laravel.isAuthenticated)
                window.location = '/auth/register';

            var self = this;

            Stripe.card.createToken({
                number: self.credit_card_number,
                cvc: self.cvv_cid,
                exp_month: self.exp_month,
                exp_year: self.exp_year
            }, self.stripeResponseHandler);
        },

        stripeResponseHandler (status, response) {
            var self = checkout || this;
            self.status = status;
            self.response = response;
            if (status == 200) {
                $('button[type="submit"]').attr('disabled', true);
                let data = {
                    subscription: self.subscription,
                    name: self.name,
                    email: self.email,
                    creditCardToken: response.id,
                    _token: Laravel.csrfToken,
                };
                $.post('/api/payment', data);
            }

        },

        expiration () {
            var self = checkout || this;
            self.expiration_date = self.exp_month+'/'+self.exp_year;
        },
    },

});
