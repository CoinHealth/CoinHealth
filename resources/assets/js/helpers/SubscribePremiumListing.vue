<template>
    <div style="padding-left: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h4>Premium Listing Subscription</h4>
            </div>
        </div>
        <div class="row row-premium">
            <div class="col-md-6 form-group ">
                <p class="small"><i class="fa fa-lock"></i> Secure Transaction</p>
                <p class="small">Bank fees and applicable taxes may change your final amount</p>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-md-6">
                <label>Website: </label>
                <input type="text" v-model="form.website" id="website" class="form-control premium" name="title">
            </div>
            <div class="form-group col-md-6">
                <label>Subscription: </label>
                <select v-model="form.subscription" name="subscription" id="subscription" class="form-control select2 premium">
                    <option value="listing-monthly">Monthly ($0.99)</option>
                    <option value="listing-annual">Annual ($9.99)</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label>Full Name: </label>
                <input v-model="form.full_name" type="text" id="full_name" class="form-control premium">
            </div>
            <div class="form-group col-md-6">
                <label>Active Email Address: </label>
                <input v-model="form.email" type="email" id="email" class="form-control premium" name="email">
            </div>
            <div class="form-group col-md-6">
                <label>Credit Card Number: </label>
                <input v-model="form.credit_card_number" type="text" id="credit_card_number" class="form-control premium">
            </div>
            <div class="form-group col-md-6">
                <label>Expiration Date</label>
                <div>
                    <select v-model="form.exp_month"  class="form-control" id="exp_month" style="width:49%;display:inline-block;">
                        <option v-for="(month, index) in months" :key="month" :value="index+1">{{ month }}</option>
                    </select>
                    <select v-model="form.exp_year" class="form-control" id="exp_year" style="width:49%;display:inline-block;">
                        <option v-for="year in years">{{ year }}</option>
                    </select>
                </div>
                <input type="hidden" id="expiration_date">
            </div>
            <div class="form-group col-md-6">
                <label>Credit Card Type: </label>
                <select  v-model="form.card_type" class="form-control">
                    <option value="visa">VISA</option>
                    <option value="american_express">American Express card</option>
                    <option value="mastercard">MasterCard</option>
                    <option value="discover_network">Discover Network</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label>CVV / CID <span class="lblsec"> (Security Code) </span></label>
                <input v-model="form.cvv_cid" type="text" id="cvv_cid" class="form-control premium" maxlength="3" data-toggle="tooltip" data-placement="top" title="The last 3 digits on the back of your card." >
            </div>
        </div>
        <div class="row" v-show="response.clicked">
            <div class="col-md-12">
                <div class="alert alert-danger" v-if="!response.success" role="alert">
                    <strong>Oh snap!</strong>
                    <p>{{ response.error.message }}</p>
                </div>
                <div class="alert alert-success" id="alert-success" role="alert" style="display: none;">
                    <!-- <strong>Well done!</strong> -->
                    <!-- <p>You are now subscribed to our Premium Listing.</p> -->  
                    <strong>Thank you for joining the Careparrot Network!</strong>
                    <p>You will receive an E-Receipt via e-mail in 24 hours. </p>
                </div>

            </div>
        </div>
        <div class="row">
            <div class=" col-md-12">
                <div class="pull-right">
                  <button type="button" class="btn-back btn btn-default" @click="back"><i class="fa fa-chevron-left"></i> Back</button>
                  <button type="button" @click="subscribe" class="btn btn-primary btn-submit">Submit</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import moment from 'moment';
import Bus from '../Bus.js';
export default {
    data () {
        return {
            form: {
                website: '',
                subscription: 'listing-monthly',
                full_name: '',
                email: '',
                credit_card_number: '',
                card_type: '',
                cvv_cid: '',
                exp_year: moment().month(),
                exp_month:moment().year(),
            },
            months: moment.months(),
            years: [
                2017,
                2018,
                2019,
                2020,
                2021,
            ],
            response: {
                error: {
                    message: ''
                },
                success: true,
                clicked: false,
            },
        };
    },

    mounted () {
        $(this.$el).find('[data-toggle="tooltip"]').tooltip();
        // this.prefill(); // prefill
    },

    methods: {
        subscribe () {
            $(this.$el).find('.btn-submit').attr('disabled', true);
            $(this.$el).find('.btn-submit').text('Please wait...');
            this.reset();
            Stripe.card.createToken({
                number: this.form.credit_card_number,
                cvc: this.form.cvv_cid,
                exp_month: this.form.exp_month,
                exp_year: this.form.exp_year
            }, this.stripeResponseHandler);
        },

        prefill () {
            console.log('prefill....');
            this.form = {
                website: 'careparrot.com',
                subscription: 'listing-monthly',
                full_name: 'Eric Locop',
                email: 'ejlocop@gmail.com',
                credit_card_number: '4242424242424242',
                card_type: 'visa',
                cvv_cid: '123',
                exp_year: moment().month(),
                exp_month:moment().year(),
            };
        },

        reset () {
            this.response.error.message = '';
            this.response.success = true;
        },

        stripeResponseHandler (status, response) {
            let self = this;
            self.response.clicked = true;
            if (response.error) {
                self.response.error.message = response.error.message;
                self.response.success = false;
                $(this.$el).find('.btn-submit').attr('disabled', false)
                    .text('Submit');
                return;
            }
            self.submit(response);
        },

        submit (response) {
            let self = this;
            this.$http.post('/api/subscriptions/premium-listing', {
                name: this.form.full_name,
                email: this.form.email,
                subscription: this.form.subscription,
                creditCardToken: response.id,
            }).then((result) => {
                    if (result.body.success) {
                        let seconds = 3;
                        $(this.$el).find('#alert-success').fadeIn();
                        $(this.$el).find('.btn-submit').attr('disabled', true)
                            .text(`this page will reload after ${seconds} ${seconds > 1 ? 'seconds' : 'second'}`);
                        $(this.$el).find('btn-back').hide();

                        self.$emit('payment-successful', true);

                        let loader = setInterval(()=>{
                            seconds--;
                            $(this.$el).find('.btn-submit').text(`this page will reload after ${seconds} ${seconds > 1 ? 'seconds' : 'second'}`);
                            if (seconds <= 0) {
                                $(this.$el).find('.btn-submit').text('reloading..');
                                window.location.reload();
                                clearInterval(loader);
                            }
                        }, (seconds * 1000));

                    }
                    else {
                        self.response.error.message = result.body.message;
                        self.response.success = false;
                        $(this.$el).find('.btn-submit').text('Submit');
                    }
            }).catch(response => {
                self.response.error.message = response.statusText;
                self.response.success = false;
            });

        },

        back () {
            Bus.$emit('modal-premium-back');
        },
    },
}
</script>
