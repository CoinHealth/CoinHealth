<template>
    <div class="modal fade modal-blue"
         id="modal-suggest" 
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
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label for=""><small>Patient's Name</small></label>
                                <input type="text" class="form-control" disabled v-model="activity.data.sender">
                            </div>    

                            <div class="form-group">
                                <label for=""><small>Schedule</small></label>
                                <input type="datetime-local" class="form-control" v-model="activity.data.appointment.date">
                            </div>
                            <div class="form-group">
                                <label for=""><small>Clinic</small></label>
                                <select  class="form-control" v-model="activity.data.appointment.provider_id">
                                     <option v-for="location in providers" :value="location.id">{{ location.full_address }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" @click="suggest" :disabled="isDisabled">Suggest</button>
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
                doctor: '', 
                providers: {},
                isDisabled: false,
            }
        },

        mounted () {
            this.getProviderLocations();
        },

        methods: {
            suggest () {
                let self = this;
                let url = '/profile/appointments/suggest';
                self.isDisabled = true;
                axios.post(url, self.activity)
                    .then(res => {
                        $(self.$refs.modal).modal('hide');
                        self.isDisabled = true;
                        Bus.$emit('notification-recieved', {
                            message: "Appointment suggested!" ,
                            title: "CareParrot"
                        });
                        self.$emit('completed');
                    });

            },

            getProviderLocations () {
                let self = this;
                // let id = 
                // providerUser id
                this.$http.get('/profile/api/doctor')
                .then(({body}) => {
                    self.doctor = body;
                    axios.get(`/api/providers/${self.doctor.id}`)
                    .then( (res) => {
                        self.providers  = res.data;
                    });
                })
                .catch(response => {
                    console.error(response);
                });
            },
            
        },
    }
</script>
