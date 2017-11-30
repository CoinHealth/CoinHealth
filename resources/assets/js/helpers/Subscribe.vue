<template>
    <div class="modal fade" id="subscribe" tabindex="-1" role="dialog">
        <div id="checkout" class="modal-dialog modal-pl" role="document">
            <button type="button" class="btn btn-default close-btn" data-dismiss="modal">&#215;</button>
            <div class="modal-content">
                <form :action="url" method="post" @submit.prevent="submit">
                    <div class="modal-body">
                        <div class="modal-title row">
                            <p>
                                <span>{{ type.toUpperCase() }}</span> Subscription
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="row row-premium">
                                    <div v-if="returned.started">
                                        <div class="alert alert-success" id="alert-success" role="alert" style="display:none;">
                                            <strong>CareParrot</strong>
                                            <p>
                                                Order submitted, we will send your {{ type.toUpperCase() }} access via email in about 24 hours. You will now be redirected back to home
                                            </p>
                                        </div>
                                        <div class="alert alert-danger" id="alert-error" role="alert" style="display:none;">
                                            <strong>Oh snap!</strong>
                                            <p v-text="returned.message"></p>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Subscription: </label>
                                        <select required v-model="form.subscription" name="subscription" id="subscription" class="form-control select2">
                                            <option :value="s.value" v-for="s in subscriptions">{{ s.text }}</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Full Name: *</label>
                                        <input type="text" required v-model="form.name" class="form-control premium">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Active Email Address: *</label>
                                        <input type="email" required v-model="form.email" class="form-control premium">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Credit Card Number: *</label>
                                        <input type="text" required v-model="form.credit_card_number" class="form-control premium">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Expiration Date *</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select required class="form-control" id="exp_month" v-model="form.exp_month">
                                                    <option :value="month.value" v-for="month in months">{{ month.text }}</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select required class="form-control" id="exp_year" v-model="form.exp_year">
                                                    <option :value="year" v-for="year in years">{{ year }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Credit Card Type: </label>
                                        <select class="form-control" v-model="credit_card_type">
                                            <option value="visa">VISA</option>
                                            <option value="american_express">American Express card</option>
                                            <option value="mastercard">MasterCard</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>CVV / CID <span class="lblsec"> (Security Code) *</span></label>
                                        <input type="text" required v-model="cvv_cid" id="cvv_cid" class="form-control premium" maxlength="3" data-toggle="tooltip" data-placement="top" title="The last 3 digits on the back of your card." >
                                    </div>
                                    <div class="form-group col-md-12" v-if="">
                                        <label for="agree">
                                            <input id="agree" v-model="form.authorized" type="checkbox" name="agree" />
                                            I authorize Careparrot to charge my card automatically after my 7-day trial period.
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>
<script>
import moment from 'moment';
export default {
    data () {
        return {
            years: [],
            months: [],
            status: 0,
            returned: {
                started: false,
                success: true,
                message: '',
            },
            url: `/api/subscriptions/${this.type}`,
            form: {
                subscription: 'crm-free',
                name: '',
                email: '',
                credit_card_number: '',
                exp_month: moment().format('MM'),
                exp_year: Number(moment().format('gggg')),
                cvv_cid: '',
                errors: [],
                authorized: false,
            },
            subscriptions: [
                {
                    value: 'crm-free',
                    text:'Free ($0/mo, 30 Days)'
                },
                {
                    value: 'crm-pro',
                    text:'Pro ($60/mo)'
                },
                {
                    value: 'crm-premium',
                    text:'Premium ($99/mo)'
                }
            ],
        };
    },
    props: {
        'type' : {
            type: String,
            required: true,
            default () {
                return 'crm';
            }
        }
    },
    mounted () {
        this.setupProperties();
    },
    methods: {
        setupProperties () {
            let cur_year = this.form.exp_year,
            y = cur_year,
            months = moment.monthsShort();

            for (y = cur_year; y <= (cur_year+6); y++) {
                this.years.push(y);
            }

            for (let m = 0; m < months.length; m++) {
                this.months.push({
                    value: _.padStart(String(m+1), 2, '0'),
                    text: months[m]
                });
            }

            if (this.type == 'ehr') {
                this.form.subscription = 'ehr-pro';
                this.subscriptions = [
                    {
                        value: 'ehr-pro',
                        text:'PRO ($69/mo)'
                    },
                    {
                        value: 'ehr-premium',
                        text: 'Premium ($99/mo)'
                    },
                    {
                        value: 'ehr-vip',
                        text:'VIP ($299/mo)'
                    },
                ];
            }
        },
        submit ()  {

            if (!Laravel.isAuthenticated)
                window.location = '/auth/login';

            var self = this;
            self.returned.started = true;
            Stripe.card.createToken({
                number: self.form.credit_card_number,
                cvc: self.form.cvv_cid,
                exp_month: self.form.exp_month,
                exp_year: self.form.exp_year,
            }, self.stripeResponseHandler);
        },

        stripeResponseHandler (status, response) {
            var self = this;
            if (status == 200) {
                $(self.$el).find('[type="submit"]').attr('disabled', true);
                let data = {
                    subscription: self.form.subscription,
                    name: self.form.name,
                    email: self.form.email,
                    creditCardToken: response.id,
                };
                self.$http.post(self.url, data)
                    .then (self.processResponse)
                    .catch((response) => {
                        console.error(response);
                    });
            } else {
                $(self.$el).find('[type="submit"]').attr('disabled', self);
                self.returned.success = false;
                self.returned.message = 'Something went wrong. try again later.';
            }
        },

        processResponse (data) {
            var self = this;
            console.log(self);
            var $el = $(self.$el);
            self.returned.message = data.body.message;
            self.returned.success = data.body.success;
            if (!data.body.success) {
                $el.find('.alert').hide()
                    .filter('#alert-error').fadeIn();
                $el.find('[type="submit"]').attr('disabled', false);
            }
            else {
                $el.find('.alert').hide()
                    .filter('#alert-success').fadeIn();
                setTimeout(() => {
                    window.location.reload()
                }, 2000);
            }
        },
    },
}
</script>
