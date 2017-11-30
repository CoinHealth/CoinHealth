<template>
    <div>
        <approval
            @completed="completed = true"
            :action="action"
            :activity="activity"
        >
        </approval>
        <suggest
            @completed="completed = true"
            :activity="activity"
        >
        </suggest>
        <div class="col-xs-9">
            <p class="message">
                <span v-if="isPatient">
                    <strong>
                        {{ activity.data.sender }} 
                    </strong>
                    set an appointment to 
                    <strong>
                        {{ activity.data.provider }}
                    </strong>
                    <br> 
                    Scheduled on <strong>{{ date }}</strong> at 
                    <strong>{{ activity.data.location }}</strong>
                </span>
                <span v-else>
                    <strong>
                        {{ activity.data.sender }}
                    </strong>
                    set an appointment to you.
                    <br> 
                    Scheduled on <strong>{{ date }}</strong> at 
                    <strong>{{ activity.data.location }}</strong>

                </span>
            </p>
        </div>
        <div class="col-xs-3 text-right">
            <div class="buttons" v-if="isProvider">
                <button class="btn btn-primary btn-xs"
                    :disabled="activity.read_at || completed"
                    @click="action = 'accept'"
                    data-toggle="modal"
                    data-target="#modal-approval"
                    >
                    Accept
                </button>
                <button class="btn btn-primary btn-xs"
                    :disabled="activity.read_at || completed"
                    @click="action = 'decline'"
                    data-toggle="modal"
                    data-target="#modal-approval"
                    >
                    Decline
                </button>

              <!--   <button class="btn btn-primary btn-xs"
                    :disabled="activity.read_at || completed"
                    @click=""
                    data-toggle="modal"
                    data-target="#modal-suggest"
                    >
                    Suggest
                </button> -->
            </div>
            <p><small class="date">{{ timestamp }}</small></p>
        </div>
    </div>

    
     
</template>
<script>
    import mixinType from '../../mixins/type.js';
    import axios from 'axios';
    import Bus from '../../../../Bus.js';
    import moment from 'moment';
    import Approval from './Approval.vue';
    import Suggest from './Suggest.vue';
    export default {
        mixins: [mixinType],
        components: {
            'approval': Approval,
            'suggest': Suggest,
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
