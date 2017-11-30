<template>
    <div :class="['panel', panelCss]">
        <div class="panel-heading">
            <div class="pull-right buttons">
                <a href="#"
                    class="btn btn-xs"
                    title="Edit"
                    @click.stop.prevent="editAppointment">
                    <i class="fa fa-pencil"></i>
                </a>
                <a href="#"
                    class="btn btn-xs"
                    title="Delete"
                    @click.stop.prevent="showDelete = true">
                    <i class="fa fa-times"></i>
                </a>
            </div>
            <h3 class="panel-title">
                {{ schedule }}
            </h3>
        </div>
        <div class="panel-body">
            <transition name="popup">
                <div class="alert-container" v-if="showDelete">
                    <delete-appointment :object-id="appointment.id"></delete-appointment>
                </div>
            </transition>
            <ul class="list-unstyled">
                <li>Appointment Profile: {{ appointment.appointment_profile }}</li>
                <li>Time: {{ appointment.minutes }} mins</li>
                <li>Doctor: {{ appointment.provider.full_title }}</li>
                <li>Reason for Visit: {{ appointment.reason }}</li>
                <li>Location: {{ appointment.provider.full_address }}</li>
            </ul>
        </div>
    </div>
</template>
<script>
import moment from 'moment';
import DeleteAppointment from './Delete.vue';
export default {
    components: {
        'delete-appointment': DeleteAppointment,
    },

    props: {
        appointment: {
            type: Object,
            required: true,
        },
    },
    data () {
        return {
            showDelete: false,
            editModal: null,
        };
    },

    methods: {
        editAppointment () {
            this.$emit('onedit', this.appointment);
        },

        deleteAppointment () {
            let url = window.location.pathname;
            this.$http.post(`${url}/delete`, {
                    id: this.appointment.id,
                }).then(({body}) => {
                    if (body.success) {
                        this.$emit('ondeleted', this.appointment.id);
                    }
                });
        },
    },

    beforeDestroy () {
        this.showDelete = false;
    },

    computed: {
        schedule () {
            return moment(this.appointment.scheduled_on).calendar();
        },

        panelCss () {
            let isPast = moment().isSameOrAfter(this.appointment.scheduled_on);
            return {
                'panel-primary': !isPast,
                'panel-warning': isPast,
                'is-past': isPast
            };
        },

        address () {
            let address = this.appointment.patient.current_address;
            if (typeof address == 'object')
                return `${address.street_1} ${address.street_2} ${address.city}, ${address.state_abbr} ${address.zip}`;
            return '';
        },
    }
}
</script>
