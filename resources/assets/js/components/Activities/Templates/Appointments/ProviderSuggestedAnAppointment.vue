<template>
    <div >
        <div class="col-xs-9">
            <p class="message">
                 <span v-if="isPatient">
                    <strong>
                        {{ activity.data.sender }} 
                    </strong>
                    suggested an appointment to you.
                    <br> 
                    Scheduled on <strong>{{ date }}</strong> at 
                    <strong>{{ activity.data.location }}</strong>
                </span>
                <span v-else>
                    <strong>
                        {{ activity.data.sender }}
                    </strong>
                    suggested an appointment to 
                    <strong>
                        {{ activity.data.patient }}
                    </strong>
                    <br> 
                    Scheduled on <strong>{{ date }}</strong> at 
                    <strong>{{ activity.data.location }}</strong>

                </span>
            </p>
        </div>
        <div class="col-xs-3 text-right">
            <div class="buttons" v-if="isPatient">
                <button class="btn btn-primary btn-xs">
                    Accept
                </button>
                <button class="btn btn-primary btn-xs">
                    Decline
                </button>
            </div>
            <p><small class="date">{{ timestamp }}date</small></p>
        </div>
    </div>
</template>
<script>
    import mixinType from '../../mixins/type.js';
    import axios from 'axios';
    import Bus from '../../../../Bus.js';
    import moment from 'moment';
    import Approval from './Approval.vue';
    export default {
        mixins: [mixinType],
        components: {
            'approval': Approval
        },
        data () {
            return {
                show: false,
                completed: false,
                action: '',
            }
        },

        computed: {
            date () {
                return  moment(this.activity.data.appointment.date)
                            .format('LLL') 
                        ? moment(this.activity.data.appointment.date)
                            .format('LLL') 
                        :  '';
            },
        },
    } 
        
</script>
