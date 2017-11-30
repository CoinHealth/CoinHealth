<template>
<div>
    
    <div class="col-xs-9">
        <p class="message">
            <span  v-if="isPatient">
                You accepted the Permission Request of 
                <strong>{{ activity.data.provider }}</strong>
            </span>
            <span v-else>
                <strong>{{ activity.data.sender }}</strong> 
                approved your Permission Request.
            </span>
        </p>
    </div>
    <div class="col-xs-3 text-right">
        <div class="buttons" v-if="isProvider">
            <a :href="href" target="_blank" class="btn btn-primary btn-xs">
                View
            </a>
            <a :href="download" target="_blank" class="btn btn-primary btn-xs">
                Download
            </a>
        </div>
        <p><small class="date">{{ timestamp }}</small></p>
    </div>
</div>
</template>

<script>
import mixinTemplate from '../../mixins/type.js';
    
export default {
    mixins: [mixinTemplate],

    computed: {
        download () {
            return `${this.href}/download`;
        },

        href () {
            let patientId = this.activity.data.url
            return `/profile/patients/${patientId}`
        }
    },
}
        
</script>
