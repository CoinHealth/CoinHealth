<template>
    <div class="modal fade modal-blue" 
            id="modal-appointment" 
            tabindex="-1" 
            ref="modal"
            role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        Set Appointment
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" disabled class="form-control" v-model="doctor.full_name">
                            </div>

                            <div class="form-group">
                                <label for="">Reason for visit</label>
                                <textarea rows="3" maxlength="250" class="no-resize form-control" v-model="form.reason"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Schedule</label>
                                <input type="datetime-local" class="form-control datepicker" v-model="form.date">
                            </div>
                             <div class="form-group">
                                <label for="">Doctor's Address</label>
                                <select class="form-control" v-model="form.provider_id">
                                     <option v-for="location in providers" :value="location.id">{{ location.full_address }}</option>
                                </select>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" :disabled="isDisabled" class="btn btn-primary" @click="request">Request</button>
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
           
            activity : {
                type: Object,
                required: true,
            },
        },
        data () {
            return {
                doctor: {},
                providers: {},
                form: {
                    reason : '',
                    date: '',
                    provider_id: '',
                },
                isDisabled: false,
            }
        },

        mounted () {
            Bus.$on('modal-appointment', this.getProviderLocations);
        }, 

        methods: {
            request () {
                let self = this;
                let url = '/profile/directory/setAppointment';
                self.isDisabled = true;
                axios.post(url, self.form)
                    .then(res => {
                        this.clearAll();
                        $(self.$refs.modal).modal('hide');
                        Bus.$emit('notification-recieved', {
                            message: "Appointment request!" ,
                            title: "CareParrot"
                        });
                    });

            },

            clearAll () {
                this.isDisabled = false;
                this.form.reason = '';
                this.form.date = '';
                this.form.provider_id = '';
            },

            getProviderLocations (data) {
                let self = this;
                self.doctor = data;
                axios.get(`/api/providers/${self.doctor.id}`)
                .then( (res) => {
                    self.providers  = res.data;
                });
               
            },
            
        },
    }
</script>



