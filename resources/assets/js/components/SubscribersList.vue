<template>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Subscribed on</th>

                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <subscriber :subscriber="subscriber" v-for="subscriber in subscribers"></subscriber>
        </tbody>
    </table>
</template>

<script>
    import subscriber from '../templates/payments/subscriber.vue';

    export default {
        components: {
            'subscriber': subscriber,
        },
        data () {
            return {
                subscribers: [],
            }
        },
        mounted () {
            var self = this;
            $.get('/api/subscribers')
                .done(response => {
                    self.subscribers = response.data;
                });
        },
    }
</script>
