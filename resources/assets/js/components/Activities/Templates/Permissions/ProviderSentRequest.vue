<template>
<div>
    <respond-permission ref="modalComponent" 
        :show="show"       
        @close="show = false"
        @completed="completed = true"
        :activity="activity">
    </respond-permission>
    <div class="col-md-9">
        <p class="message">
            <span v-if="isPatient">
                {{ activity.data.sender }} 
                requested to 
                <a href="#"
                    @click.prevent.stop="show = true" 
                    class="btn-link">
                    view
                </a>
                your medical information.
            </span>
            <span v-else>
                {{ activity.data.sender }}
                requested to
                <a href="#" 
                    @click.prevent.stop="show = true"
                    class="btn-link">
                    view
                </a> medical information of 
                <strong class="text-capitalize">
                    {{ activity.data.patient }}
                </strong>
            </span>
        </p>
    </div>
    <div class="col-md-3">
        <div class="buttons" v-if="isPatient">
            <button class="btn btn-primary btn-xs"
                :disabled="activity.read_at || completed"
                @click="show = true">
                Action
            </button>
        </div>
        <p><small class="date">{{ timestamp }}</small></p>
    </div>
</div>
</template>
<script>

import mixinType from '../../mixins/type.js';
import axios from 'axios';
import Bus from '../../../../Bus.js';
import Respond from '../../../Permissions/Respond.vue';
export default {
    mixins: [mixinType],
    components: {
        'respond-permission': Respond
    },
    data () {
        return {
            show: false,
            completed: false,
        }
    },
}
</script>
