<template>
    <!-- Modal -->
    <div class="modal fade" id="pl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-pl" role="document">
            <img src="/assets/icons/modal-logo.png" alt="" class="modal-logo">
            <button type="button" class="btn btn-default close-btn" data-dismiss="modal">&#215;</button>
            <div class="modal-content">

                <div class="modal-body">

                    <div v-if="!is_subscribing">
                        <div class="row row-info">
                            <div class="col-md-6 nopadding">
                                <div class="ds-1"></div>
                            </div>
                            <div class="col-md-6 nopadding">
                                <div class="ds-2">
                                    <p class="modal-title">
                                        Make ‘YOU’ Viral
                                    </p>
                                    <p class="modal-p">
                                        Get noticed by more than 15,000 CareParrot
                                        members for only 0.99 cents a month through
                                        our premium listing.
                                    </p>
                                    <p class="modal-sub">
                                        Why is it worth it?
                                    </p>
                                    <p class="modal-p">
                                        By subscribing to our Premium Listing, we can get your name on TOP of
                                        our Triage search results based on user location.
                                    </p>
                                    <p class="modal-sub">
                                        Standout from the crowd
                                    </p>
                                    <p class="modal-p">
                                        This also means CareParrot will design a virtual business
                                        card for you to attract more potential clients. All for just
                                        0.99 cents a month. You can go annual too if you wish,
                                        for only $ 9.99
                                    </p>
                                    <div class="center mt-25">
                                        <a href="#" @click.prevent="subscribe" class="btn-primary btn-blue">Sounds good, Let's do it</a><br>
                                        <a href="#" @click.prevent="claim" aria-label="Close" class="not-now">Just Claim</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success" role="alert" style="display: none; margin-left: 50px;">
                                    <strong>{{ status }}</strong>
                                    <p>{{ response.message }}</p>
                                    <button v-if="!response.sucess" data-dismiss="modal" type="button" class="btn btn-xs btn-primary">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-if="is_subscribing">
                        <subscribe @payment-successful="claim"></subscribe>
                    </div>
                </div>

            </div>
        </div>
    </div>

</template>
<script>
import Bus from '../../Bus.js';
import Subscribe from '../../helpers/SubscribePremiumListing.vue';
export default {
    components: {
        'subscribe': Subscribe,
    },
    data () {
        return {
            purpose: 1,
            provider_id: 0,
            response: {
                message: '',
                success: false,
            },
            is_subscribing: false,
        };
    },

    mounted () {
        Bus.$on('modal-premium', this.offer);
        Bus.$on('modal-premium-back', () => this.is_subscribing = false);
        $(this.$el).on('hidden.bs.modal', this.hidden);
    },

    methods: {
        offer (data) {
            this.provider_id = data.provider_id,
            this.purpose = data.purpose;
            $(this.$el).modal('show');
        },

        subscribe () {
            this.is_subscribing = true;
        },

        claim (fromSubscription = false) {
            let self = this;
            this.$http.post('/directory/doctors', {
                provider_id: self.provider_id,
            }).then(({body}) => {
                self.response = body;

                $(self.$el).find('.alert')
                    .addClass(body.success ? 'alert-success' : 'alert-danger').fadeIn();
                if (!fromSubscription) {
                    setTimeout(() => window.location.reload(), 3000);
                }
            });
        },

        hidden () {
            this.is_subscribing = false;
            this.purpose = 1;
            this.provider_id = 0;
            this.response.message = '';
            this.response.success = '';
            $(this.$el).find('.alert').hide()
                .removeClass('alert-success alert-danger');
        },
    },

    computed: {
        status () {
            return this.response.success ? 'Well done!' : 'Oh snap!';
        }
    },
}
</script>
