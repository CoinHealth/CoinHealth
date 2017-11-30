<template>
<div>
    
    <div v-if="isPatient">
        <div class="col-xs-9">
            <p class="message">
                You approved an appointment scheduled @
            </p>
        </div>
        <div class="col-xs-3 text-right">
            <p><small class="date">7:30pm June 14, 2017</small></p>
        </div>
    </div>

    <div v-if="isProvider">
        <div class="col-xs-9">
            <p class="message">
                Your appointment request on secduke was approved
            </p>
        </div>
        <div class="col-xs-3 text-right">
            <p><small class="date">7:30pm June 14, 2017</small></p>
        </div>
    </div>
</div>
    
     
</template>
<script>
    
    
    export default {
        components: {

        },
        props: {
            

        },

        data () {
            return {


            };
        },

        mounted () {
           
        },

        methods: {
            
        },


        watch: {
           

        },

        computed: {
           
        },

    }
        
</script>
