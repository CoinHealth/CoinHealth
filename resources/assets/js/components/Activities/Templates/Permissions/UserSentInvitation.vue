<template>
<div>
    <!-- for patients -->
    <div v-if="isPatient">
        <div class="col-xs-9">
            <p class="message">
                User sent you an invitation to join their careteam.
            </p>
        </div>
        <div class="col-xs-3 text-right">
            <div class="buttons">
                <button class="btn btn-primary btn-xs">
                    Allow
                </button>
                <button class="btn btn-primary btn-xs">
                    Deny
                </button>
            </div>
            <p><small class="date">7:30pm June 14, 2017</small></p>
        </div>
    </div>
    <!-- for provider -->
    <div v-if="isProvider">
        <div class="col-xs-9">
            <p class="message">
                You sent an invitation to provider to join your careteam.
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
