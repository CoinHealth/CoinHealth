import Subscribe from './helpers/Subscribe.vue';
var tellme = new Vue({
    el: '#tellme',
    data: {
        type: $('.row-ehr').length ? 'ehr': 'crm',
        url: `/api/subscriptions/`,
    },

    components: {
        'subscribe': Subscribe,
    },

    mounted: function() {
        this.url += `/${this.type}`;
    },

    methods: {
        showModal (e) {
            $(e.target.hash).modal('show');
        },
    },
});
