// import AddPayment from './components/Payments/AddPayment.vue';
import AddPayment from './components/Payments/AddPayment2.vue';
// import AddPayment from './components/Payments/CreatePayment.vue';
import PaymentList from './components/Payments/List2.vue';
import ChangeStatus from './components/Payments/ChangeStatus.vue';
const payments = new Vue({
    components: {
        modalAddPayment: AddPayment,
        modalChangeStatus: ChangeStatus,
        paymentList: PaymentList,
    },


    el: '#payment',

    data: {
        payments: [],
        patients: [],
    },

    mounted () {
        this.getPayments();
    },

    methods: {
        getPayments () {
            let vm = this;
            this.$http.get('/profile/payments/api/list')
                .then((response) => {
                    // console.log(response.body.data);
                    vm.patients = response.body.data;
                });
        },

        addPayment (patient) {
            this.payments.unshift(patient);
        },

    },
});
