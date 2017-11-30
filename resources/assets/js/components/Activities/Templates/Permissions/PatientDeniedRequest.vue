<template>
<div>
    <div class="col-xs-9">
        <p class="message">
            <span  v-if="isPatient">
                {{ activity.data.sender }} denied the Permission Request of 
                {{ activity.data.provider }}.
            </span>
            <span v-else>
                {{ activity.data.sender }} denied your Permission Request
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
    
export default {
    mixins: [mixinType],
}

</script>
