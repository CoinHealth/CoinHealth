<template>
<div>
    <div class="col-xs-9">
        <p class="message">
            <span v-if="isPatient">
                <strong>
                    {{ activity.data.sender }} 
                </strong>
                confirmed your appointment  
                <br> 
                Scheduled on <strong>{{ date }}</strong> at 
                <strong>{{ activity.data.location }}</strong>
            </span>
            <span v-else>
                <strong>
                    {{ activity.data.sender }}
                </strong>
                confirmed appointment of 
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
        <p><small class="date">{{ timestamp }}</small></p>
    </div>
</div>
    
     
</template>
<script>
    import mixinType from '../../mixins/type.js';
    import axios from 'axios';
    import Bus from '../../../../Bus.js';
    import moment from 'moment';
    export default {
        mixins: [mixinType],
        components: {
        },
        data () {
            return {
                completed: false,
            }
        },

        computed: {
            date () {
                return  moment(this.activity.data.appointment.scheduled_on)
                            .format('LLL') 
                        ? 
                        moment(this.activity.data.appointment.scheduled_on)
                            .format('LLL') 
                        :  '';
            },
        },
    } 
        
</script>
