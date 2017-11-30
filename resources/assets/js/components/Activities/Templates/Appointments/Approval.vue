<template>
    <div class="modal fade modal-blue" 
        id="modal-approval" 
        tabindex="-1" 
        ref="modal"
        role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        Appointments
                    </h4>
                </div>
                <div class="modal-body text-center">
                    <h4>
                        Are you sure you want to {{ action }} this appointment?
                    </h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" @click="approval" :disabled="isDisabled">Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import Bus from '../../../../Bus.js';
    import moment from 'moment';
    export default {
        components: {
        },
        props: {
            action : {
                type: String,
                required: true,
            },

            activity : {
                type: Object,
                required: true,
            },
        },

        data () {
            return {
                isDisabled: false,
            }
        },

        methods: {
            approval() {
                let self = this;
                let status = self.action == 'accept' ? 1 : 2;
                let url = '/profile/appointments/provider-approval/' + status;
                self.isDisabled = true;
                axios.post(url, self.activity)
                    .then(res => {
                        $(self.$refs.modal).modal('hide');
                        self.isDisabled = false;
                        Bus.$emit('notification-recieved', {
                            message: "Appointment confirmation!" ,
                            title: "CareParrot"
                        });
                        self.$emit('completed');
                    });

            }
        },


    }
</script>
