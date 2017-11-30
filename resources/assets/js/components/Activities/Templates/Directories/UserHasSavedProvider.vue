<template>
    <div>
        <div class="col-xs-9">
            <p class="message">
                <span v-if="isPatient">
                    <strong>
                        {{ activity.data.sender }} 
                    </strong>
                    saved 
                    <strong>{{ activity.data.provider }}</strong> 
                </span>
                <span v-else>
                    <strong>
                        {{ activity.data.sender }}
                    </strong>
                    saved you on their directory. 
                </span>
            </p>
        </div>
        <div class="col-xs-3 text-right">
            <div class="buttons" v-if="isPatient">
                <button class="btn btn-primary btn-xs"
                    v-if="isSubscribed"
                    :disabled="activity.read_at || completed"
                    @click="openAppointment"
                    data-toggle="modal"
                    data-target="#modal-appointment"
                    >
                    Set An Appointment
                </button>
            </div>
            <p><small class="date">{{ timestamp }}</small></p>
        </div>

        <appointment
            :activity="activity"
        >
        </appointment>
    </div>
</template>
<script>
    import mixinType from '../../mixins/type.js';
    import axios from 'axios';
    import Bus from '../../../../Bus.js';
    import moment from 'moment';
    import Appointment from './Appointment.vue';

    export default {
        mixins: [mixinType],
        components: {
            'appointment': Appointment,
        },
        data () {
            return {
                completed: false,
                isSubscribed: false,
                provider_id: this.activity.data.directory.saveable_id,
                doctor: '',
            }
        },
        mounted () {
            this.checkSubscription();
        },

        methods: {
            checkSubscription () {
                let self = this;
                axios.get('/api/providers/checkSubscription/'+self.provider_id)
                        .then( (res) => {
                        self.isSubscribed = res.data.isSubscribed;
                        self.doctor = res.data.doctor;
                });

            },

            openAppointment () {
                Bus.$emit('modal-appointment', this.doctor);
            }

        },

        computed: {

           
        },
    } 
</script>
