<template>
	<div class="col-md-12 payment-item" v-if="show">
    
        	<div class="payment-header">
	        	<button type="button" class="close" @click="closeAdd"><span aria-hidden="true">&times;</span></button>
    		 	<h5>Add Payment</h5>
        	</div>
        	<div class="payment-body">
        		 <div class="row">
                    <div class="col-md-12">
                        <form>
                            <div class="form-group">
                                <label>Name</label>
                                <v-select :options="patients" v-model="form.patient"></v-select>
                            </div>

                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="date" v-model="form.date" class="form-control">
                            </div>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>Fee</th>
                                        <!-- <th>Qty.</th> -->
                                        <!-- <th>Total</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(row, index) in form.fees">
                                        <td class="col-md-8">
                                            <input type="text" class="form-control capitalize" v-model="row.description">
                                        </td>
                                        <td class="col-md-4">
                                            <div class="input-group input-group-md">
                                              <span class="input-group-addon" id="sizing-addon1">$</span>
                                              <input type="text" class="form-control numberOnly" v-on:keyup="feeTotal(index)" v-model="row.fee"  aria-describedby="sizing-addon1">
                                            </div>
                                        </td>
                                       <!--  <td class="col-md-2">
                                            <input type="number" class="form-control numberOnly" min="1" v-on:change="feeTotal(index)" v-model="row.quantity" name="">
                                        </td> -->
                                       <!--  <td class="col-md-3">
                                            <label class="label-control">$ {{ row.total }}</label>
                                        </td> -->
                                    </tr>
                                   
                                </tbody>
                            </table>
                            <div class="pull-right">
                                <button type="button" class="btn button btn-primary btn-xs" @click="addItem"><i class="fa fa-plus"></i> Add item</button>
                            </div>

                            <div class="clear"></div>
                            
                            <div class="row divTotal mt-30">
                                <div class="col-md-10">
                                    
                                    <div class="row form-group">
                                        <div class="col-md-5 text-right">
                                            <label>TOTAL CHARGES: </label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="input-group input-group-md">
                                              <span class="input-group-addon" id="sizing-addon1">$</span>
                                              <input type="text" class="form-control numberOnly" aria-describedby="sizing-addon1" v-model="form.total_charges" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-5 text-right">
                                            <label>TOTAL DISCOUNTS: </label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="input-group input-group-md">
                                              <span class="input-group-addon" id="sizing-addon1">$</span>
                                              <input type="text" class="form-control numberOnly" aria-describedby="sizing-addon1"  v-model="form.total_discounts">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-5 text-right">
                                            <label>PATIENT PAID: </label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="input-group input-group-md">
                                              <span class="input-group-addon" id="sizing-addon1">$</span>
                                              <input type="text" class="form-control numberOnly" aria-describedby="sizing-addon1" v-model="form.patient_paid">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-5 text-right">
                                            <label>INSURANCE PAID: </label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="input-group input-group-md">
                                              <span class="input-group-addon" id="sizing-addon1">$</span>
                                              <input type="text" class="form-control numberOnly" aria-describedby="sizing-addon1" v-model="form.insurance_paid">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-5 text-right">
                                            <label>PATIENT BALANCE DUE: </label>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="input-group input-group-md">
                                              <span class="input-group-addon" id="sizing-addon1">$</span>
                                              <input type="text" class="form-control numberOnly" aria-describedby="sizing-addon1" v-model="form.patient_balance_due" disabled>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>

                        <div class="clear mt-30"></div>
                        <div class="alert alert-success" v-if="success" role="alert">
                           <i class="fa fa-check"></i> Payment processed successfully! 
                        </div>

                        <div class="pull-right float-responsive button-bottom">
                            <!-- <h4>$ {{ form.patient_balance_due }}</h4> -->
                            <a @click.prevent="submit('Bill Insurance')" class="btn btn-blue">Bill Insurance</a>
                            <a @click.prevent="submit('Patient will pay')" class="btn btn-blue">Patient will pay</a>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
        	</div>
        
	</div>
</template>

<script>
    import VSelect from 'vue-select';
    import axios from 'axios';
    const moment = require('moment');
    export default {
        components: {
            'v-select': VSelect,
        },

        data () {
            return {
            	show: false,
                success: false,
                patients: [],
                form: {
                    patient: '',
                    date: moment().format('YYYY-MM-DD'),
                    fees: [],
                    total_charges: 0,
                    total_discounts: 0,
                    patient_paid: 0,
                    insurance_paid: 0, 
                    patient_balance_due: 0,
                    billed_to: '',
                },
            };
        },

        mounted () {
        	this.init();
            this.fillPatient();
            this.addItem();
        },

        methods: {
        	init () {
        		let self = this;
        		$('.btnAdd').on('click', function() {
        			// alert('fgvewgvew');
        			self.show = true;
        		});
        	},
            fillPatient () {
                let self = this;
                axios.get('/profile/payments/api/getPatients')
                    .then( (response) =>  {
                        let data = response.data.patients;
                        self.patients = data.map(item => {
                            var val = {};
                            val.value = item.id;
                            val.label = item.name;
                            return val;
                        });

                    });
            },
            addItem () {
                var $el = document.createElement('tr');
                    this.form.fees.push({
                        description: "",
                        fee: 0,
                        // quantity: 1,
                        // total: 0,
                    });
            },

            feeTotal (index) {
                var row = this.form.fees[index],
                    fee = row.fee;
                    // quantity = row.quantity;
                fee = (fee == "") ? 0 : fee;
                // quantity = (quantity == "") ? 0 : quantity;
                // row.total = fee * quantity;
            },
         
            submit (text) {
                var self = this;
                self.form.billed_to = text;
               
                $.ajax({
                    async: false,
                    type: "POST",
                    url: '/profile/payments',
                    data: this.form,
                    dataType: 'json',
                    success: function(data) {
                        self.success = data.success;
                        window.open('/profile/payments/'+data.id+'/pdf', '_blank');
                        setTimeout(function() {
                                // $(self.$refs.modal).modal('hide');
                                window.location.reload();
                                self.show = false;
                                self.clear();
                                self.addItem();
                                self.$emit('paymentadded', data.patient);
                            }, 3000);
                    },
                });


            },

            clear () {
                this.success = false;
                this.form.patient = '';
                this.form.date = moment().format('YYYY-MM-DD');
                this.form.fees = [];
                this.form.total_charges = 0;
                this.form.total_discounts = 0;
                this.form.patient_paid = 0;
                this.form.insurance_paid = 0;
                this.form.patient_balance_due = 0;
                this.form.billed_to = '';
            },

            closeAdd () {
            	this.show = false;
            },

        },


        watch: {
            form: {
                handler: function(newValue) {
                    var totalCharges = 0;
                    this.form.fees.forEach((item, index) => {
                        totalCharges = totalCharges + parseInt(item.fee);
                    });
                    this.form.total_charges = totalCharges;
                    var discount = parseInt(this.form.total_discounts),
                        patient_paid = parseInt(this.form.patient_paid),
                        insurance_paid = parseInt(this.form.insurance_paid),
                        less = 0,
                        balance_due = 0;
                    less = discount + patient_paid + insurance_paid;
                    balance_due = totalCharges - less;
                    this.form.patient_balance_due = balance_due;
                },
                deep: true
            },

        },
            



    }
</script>
