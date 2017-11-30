<div class="modal fade" id="modal-pricing" tabindex="-1" role="dialog">
    <div id="checkout" class="modal-dialog modal-pl" role="document">
        <button type="button" class="btn btn-default close-btn" data-dismiss="modal">&#215;</button>
        <div class="modal-content">
            <form action="/api/payment" method="post" id="" @submit.prevent="submit">
            <div class="modal-body">
                <div class="modal-title row">
                    <p>CRM Subscription</p>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="row row-premium">

                            <div class="alert alert-success" v-if="status == 200" role="alert">
                                <strong>CareParrot</strong>
                                <p>
                                    Order submitted, we will send your CRM access via email in about 24 hours. You will now be redirected back to home
                                </p>
                            </div>
                            <div class="alert alert-danger" v-if="status != 200 && status != 0" role="alert">
                                <strong>CareParrot</strong> Oops! somewhing went wrong. please try again.
                                <p v-if="response" v-text="response.error.message"></p>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Subscription: </label>
                                <select  required v-model="subscription" name="subscription" id="subscription" class="form-control select2 premium">
                                    <option value="crm-free">Free (30 days)</option>
                                    <option value="crm-pro">Pro ($69.00/month)</option>
                                    <option value="crm-premium">Premium ($99.00/month)</option>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-md-6">
                                <label for="name">Full Name: *</label>
                                <input type="text" required id="name" v-model="name" class="form-control premium">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Active Email Address: *</label>
                                <input type="email" required id="email" v-model="email" class="form-control premium">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Credit Card Number: *</label>
                                <input type="text" required id="credit_card_number" v-model="credit_card_number" class="form-control premium" name="payment_info[credit_card_number]">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Expiration Date *</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <select required @change="expiration" class="form-control" id="exp_month" v-model="exp_month">
                                            <option :value="index+1" v-for="(month,index) in months">@{{ month }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select required @change="expiration" class="form-control" id="exp_year" v-model="exp_year">
                                            <option :value="year" v-for="year in years">@{{ year }}</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" v-model="expiration_date" id="expiration_date">
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
                            <div class="form-group col-md-12">
                                <label for="agree">
                                    <input id="agree" type="checkbox" name="agree" />
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
