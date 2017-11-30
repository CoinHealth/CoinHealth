<template>
    <div class="modal fade modal-blue" id="change_status" ref="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Change Payment Status</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Invoice Number: <strong>{{ invoice_no }}</strong></h4>
                            <div class="actions">
                                <div class="radio">
                                  <label><input type="radio" name="status" v-model="status" value="0">Unpaid</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="status" v-model="status" value="1">Paid</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="status" v-model="status" value="2">Cancelled</label>
                                </div>
                            </div>
                            <div class="clear mt-30"></div>
                            <div class="alert alert-success" v-if="success" role="alert">
                               <i class="fa fa-check"></i> Payment changed status. 
                            </div>
                            <div class="pull-right float-responsive button-bottom">
                                <a data-dismiss="modal" aria-label="Close" class="btn btn-default">Cancel</a>
                                <a @click.prevent="submit" class="btn btn-primary">Change</a>
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
    import Bus from '../../Bus.js';
    import axios from 'axios';
    const moment = require('moment');
    export default {
        components: {

        },

        data () {
            return {
                success: false,
                invoice_no: '',
                status: '',
            };
        },

        mounted () {
           Bus.$on('bill-status', this.getBill); 
        },

        methods: {
            getBill (data) {
                this.invoice_no = data.invoice_no;
                this.status = data.status;
            },

            submit () {
                let self = this;
                var data = {
                        invoice_no: self.invoice_no,
                        status: self.status,
                    };
                axios.post('/profile/payments/changeStatus', data)
                      .then(res => {
                        self.success = true;
                        setTimeout(function() {
                            self.clear();
                            // $(vm0.$refs.modal).modal('hide');
                            $('#change_status').modal('hide');
                            window.location.reload();
                        }, 3000);
                      });
            },

            clear () {
                this.success = false;
                this.invoice_no = '';
                this.status = '';
            },
        },


    }
</script>
