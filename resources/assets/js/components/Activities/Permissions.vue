<template>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h5 class="panel-title">
            Permissions
        </h5>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="wrapper">
                <div class="activity" v-if="!data.length">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="message">No data available.</p>
                        </div>
                    </div>
                </div>
                
                <activity-template 
                    :key="activity.id" 
                    type="Permissions" 
                    :activity="activity" 
                    v-for="activity in data">              
                </activity-template>
            </div>
        </div>
    </div>
</div>
</template>
<script>

import axios from 'axios';
import Bus from '../../Bus.js';
import mixinActivity from './mixins/activity.js'

import Template from './Templates/Permissions/Template.vue';
export default {
    mixins: [mixinActivity],
    components: {
        'activity-template': Template,
    },
}

</script>
