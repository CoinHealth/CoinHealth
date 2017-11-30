<template>
    <div class="col-md-12 payment-item">
        <div class="panel-group" id="accordion">
            <div class="payment-header">

                <div class="pull-right">
                    <button class="btn btn-primary btn-xs" @click.prevent="openModalStatus"><i class="glyphicon glyphicon-usd"></i></button>
                </div>
                <h3 class="name">{{ payment[0].patient.name }}</h3>
            </div>
            
            <div class="payment-body">
                <p>Invoice No.: <a :href="'/profile/payments/'+payment[0].hashed_id+'/pdf'" target="_blank">{{ payment[0].invoice_no }}</a></p>
                <p class="type">Billed to: {{ payment[0].billed_to }}</p>
                <p>Amount: {{ formatPrice(payment[0].total_charges) }}</p>
                <p>Created by: {{ (payment[0].created_by != 0 || payment[0].created_by != null) ? payment[0].created_by.full_name : '' }}</p>
                <p class="payed_at">Date: {{ date(payment[0].created_at) }}</p>
                <p>Status: {{ payment[0].payment_status }}</p>
            </div>

            <div class="payment-header logs-container">
                <div class="pull-right">
                    <a data-toggle="collapse" data-parent="#accordion" :href="'#collapseLogs'+payment[0].patient.id"><i class="glyphicon glyphicon-menu-down"></i></a>
                </div>
                <h5 class="name">Logs</h5>
            </div>
            <div class="payment-body log-body panel-collapse collapse" v-bind:id="'collapseLogs'+payment[0].patient.id">
                <p>Provider change billing status to paid.</p>
                <p>{{ date(payment[0].created_at) }}</p>
                
            </div>

            <div v-show="showContainer" class="invoice-container" v-for="(item, index) in payment" >
                <div class="payment-header " v-if="index > 0">
                    <div class="pull-right">
                        <!-- <button class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-usd"></i></button> -->
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
import moment from 'moment';
export default {
    props: {
        payment: {
            type: Object,
            required: true,
        }

        // $record->morphable->patient
        // $record->morphable->getRecordData();
    },
    methods: {
        formatPrice(value) {
            let val = (value/1).toFixed(2).replace(',', '.');
            return '$ '+val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        },

        date(data) {
            return moment(data).calendar();
        }
        
    },

    computed: {
        // date () {
        //     return moment(this.payment.created_at).calendar();
        // },

        showContainer () {
            return this.payment.length > 1 ;
        },

        openModalStatus () {
            // let self = this;
            // this.$http.get(`/profile/payments/${this.invoice_no}`)
            //     .then( (response) => {
            //         console.log(response.body);
            //         Bus.$emit('change-status', response.body);
            //     });
            alert('bvretbrt');
        },



    },
}
</script>
