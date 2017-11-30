<template>
    <div class="modal fade modal-blue" id="add-payment" ref="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Add Payment</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input v-model="name" type="text" class="form-control"> 
                                </div>
                                <div class="form-group">
                                    <label for="">Date</label>
                                    <date-picker
                                        v-model="date"
                                        input-class="form-control">
                                    </date-picker>
                                </div>
                                <div class="form-group">
                                    <label for="">Type</label>
                                    <select v-model="type" class="form-control">
                                        <option disabled>Select one</option>
                                        <option>General Check-Up</option>
                                        <option>Consultation</option>
                                        <option>Follow up</option>
                                        <option>Urgent Care</option>
                                        <option>Emergency</option>
                                        <option>Others</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>
                                                <label>Insured</label>
                                            </p>
                                        </div>
                                        <div class="col-md-8">
                                            <label for="insured-yes">
                                                <input type="radio"
                                                        id="insured-yes"
                                                        v-model="insured"
                                                        value="yes" />
                                                Yes
                                            </label>
                                            <label for="insured-no">

                                                <input type="radio"
                                                        id="insured-no"
                                                        v-model="insured"
                                                        value="no" />
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div v-show="insured == 'yes'">
                                    <p>Insurance Details</p>
                                    <div class="form-group">

                                    </div>
                                </div>
                            </form>

                            <div class="clear mt-30"></div>
                            <div class="alert alert-success" v-if="success" role="alert">
                                Success! <i class="fa fa-check"></i>
                            </div>
                            <div class="pull-right float-responsive">
                                <a @click.prevent="add" class="btn-blue">Confirm</a>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    const moment = require('moment');
    export default {
        components: {
            datePicker: Datepicker,
        },

        data () {
            return {
                success: false,

                name: '',
                date: '',
                type: '',
                insured: "no",
            };
        },

        mounted () {
            this.initModal();
            this.date = new Date();
        },

        methods: {
            add () {
                var vm = this;
                this.$http.post('/profile/payments', {
                    name: this.name,
                    payed_at: this.date,
                    type: this.type,
                }).then(response => {
                    vm.success = response.body.success;
                    setTimeout(() => {
                        $(vm.$refs.modal).modal('hide');
                        vm.$emit('paymentadded', response.body.payment);
                    }, 1000);
                });
            },

            initModal () {
                var vm = this;
                $(vm.$refs.modal)
                    .on('hidden.bs.modal', (e) => {
                        vm.success = false;
                        vm.name = '';
                        vm.date = new Date();
                        vm.type = '';
                        vm.insured = 'no';
                    });
            },
        },
    }
</script>
