
<template>
    <div class="col-md-12 payment-item">
        <div class="panel-group" id="accordion">
            <div class="payment-header">

                <div class="pull-right">
                    <button class="btn btn-primary btn-xs" @click.prevent="openModalStatus(patient.payments[0] )" data-target="#change_status" data-toggle="modal" ><i class="glyphicon glyphicon-usd"></i></button>
                </div>
                <h3 class="name">{{ patient.name }}</h3>
            </div>

            <div class="payment-body">
                <p>Invoice No.: <a :href="'/profile/payments/'+patient.payments[0].hashed_id+'/pdf'" target="_blank">{{ patient.payments[0].invoice_no }}</a></p>
                <p class="type">Billed to: {{ patient.payments[0].billed_to }}</p>
                <p>Amount: {{ formatPrice(patient.payments[0].total_charges) }}</p>
                <p>Created by: {{ (patient.payments[0].created_by != 0 || patient.payments[0].created_by != null) ? patient.payments[0].created_by.full_name : '' }}</p>
                <p class="payed_at">Date: {{ date(patient.payments[0].created_at) }}</p>
                <p>Status: {{ patient.payments[0].payment_status }}</p>
            </div>

            <div class="payment-header logs-container">
                <div class="pull-right">
                    <a data-toggle="collapse" data-parent="#accordion" :href="'#collapseLogs'+patient.id"><i class="glyphicon glyphicon-menu-down"></i></a>
                </div>
                <h5 class="name">Logs</h5>
            </div>
            <div class="payment-body log-body panel-collapse collapse" v-bind:id="'collapseLogs'+patient.id">
                <div class="row" v-for="log in patient.payment_logs">
                    <div class="col-md-9">
                        <span>{{ log.description }}</span>
                    </div>
                    <div class="col-md-3">
                        <span>{{ date(log.created_at) }}</span>
                    </div>
                </div>
                
            </div>

            <div v-show="showContainer" class="invoice-container" v-for="(item, index) in patient.payments" >
                <div class="payment-header " v-if="index > 0">
                    <div class="pull-right">
	                    <a class="btn btn-primary btn-xs" @click.prevent="openModalStatus(item)" data-target="#change_status" data-toggle="modal"><i class="glyphicon glyphicon-usd"></i></a>
                        <a data-toggle="collapse" data-parent="#accordion" :href="'#collapseInvoice'+item.invoice_no"><i class="glyphicon glyphicon-menu-down"></i></a>
                    </div>
                    <h5 class="name">Invoice No.: <a :href="'/profile/payments/'+item.hashed_id+'/pdf'" target="_blank">{{ item.invoice_no }}</a></h5>
                </div>
                <div class="payment-body panel-collapse collapse" v-if="index > 0" v-bind:id="'collapseInvoice'+item.invoice_no">
                    <p class="type">Billed to: {{ item.billed_to }}</p>
                    <p class="type">Amount: {{ formatPrice(item.total_charges) }}</p>
                    <p>Created by: {{ (item.created_by != 0 || item.created_by != null) ? item.created_by.full_name : '' }}</p>
                    <p>Date: {{ date(item.created_at) }}</p>
                    <p>Status: {{ item.payment_status }}</p>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import Bus from '../../Bus.js';
import moment from 'moment';
export default {
    props: {
    	patient: {
            type: Object,
            required: true,
        },
        
    },
    methods: {
        formatPrice(value) {
            let val = (value/1).toFixed(2).replace(',', '.');
            return '$ '+val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        },

        date(data) {
            return moment(data).calendar();
        },

        prePage() {

        },

        openModalStatus (data) {
            Bus.$emit('bill-status', {
            	invoice_no: data.invoice_no,
            	status: data.status,
            });
        },
        
    },

    computed: {

        showContainer () {
            return this.patient.payments.length > 1 ;
        },
    },
}
</script>
