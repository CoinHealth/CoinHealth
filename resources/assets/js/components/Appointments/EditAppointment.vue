<template>
    <div class="modal fade modal-blue" ref="modal" id="modal-add-appointment" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" @click="shown = false" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        Edit Appointment
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="">
                                <div class="form-group">
                                    <label for="">Doctor's name</label>
                                    <input type="text" disabled class="form-control" :value="doctor ? doctor.full_name : ''">
                                </div>
                                <div class="form-group">
                                    <label for="">Appointment Profile</label>
                                    <input type="text" v-model="appointment.appointment_profile" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Reason for visit</label>
                                    <v-textarea
                                        v-model="appointment.reason"
                                        @update:reason="appointment.reason = $event"
                                        model="reason"
                                        rows="3"
                                        :limit="150"
                                        :value="appointment.reason"
                                        classes="no-resize form-control">
                                    </v-textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Schedule</label>
                                    <input type="datetime-local" class="form-control datepicker" name="scheduled_on" v-model="appointment.scheduled_on">
                                    <!-- <input type="text" class="form-control" v-model="appointment.scheduled_on" ref="datetimepicker" id="datetimepicker"> -->
                                </div>
                                <div class="form-group">
                                    <label for="">Duration</label>
                                    <select name="minutes" v-model="appointment.minutes" class="form-control">
                                      <option value="15">15 minutes</option>
                                      <option value="20">20 minutes</option>
                                      <option value="25">25 minutes</option>
                                      <option value="30">30 minutes</option>
                                      <option value="35">35 minutes</option>
                                      <option value="40">40 minutes</option>
                                      <option value="45">45 minutes</option>
                                      <option value="50">50 minutes</option>
                                      <option value="55">55 minutes</option>
                                      <option value="60">60 minutes</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Exam room</label>
                                    <select v-model="appointment.exam_room" name="" id="" class="form-control">
                                        <option>Room 1</option>
                                        <option>Room 2</option>
                                        <option>Room 3</option>
                                        <option>Room 4</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Location</label>
                                    <select v-model="appointment.provider_id" name="" id="" class="form-control">
                                        <option v-for="location in providers" :value="location.id">{{ location.full_address }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Doctor's note</label>
                                    <v-textarea
                                        v-model="appointment.doctors_note"
                                        @update:note="appointment.doctors_note = $event"
                                        model="note"
                                        rows="3"
                                        :limit="100"
                                        :value="appointment.doctors_note"
                                        classes="no-resize form-control">
                                    </v-textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" @click="shown = false">Cancel</button>
                    <button type="button" class="btn btn-primary" @click="save">Save</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Bus from '../../Bus.js';
    import axios from 'axios';
    import VueTextArea from '../../helpers/Textarea.vue';
    import moment from 'moment';
    export default {
        components: {
            'v-textarea': VueTextArea,
        },
        props: {
            doctor: {
                type: Object,
                default () {
                    return {
                        full_name: '',
                    }
                },
            },
        },

        data () {
            return {
                appointment: {
                    appointment_profile: '',
                    exam_room: 'Room 1',
                    minutes: 0,
                    provider_id: 0,
                    patient_id: 0,
                    reason: '',
                    scheduled_on: moment().format('YYYY-MM-DD kk:mm'),
                    doctors_note: '',
                },
                shown: false,
                providers: {},
            }
        },

        created () {
            Bus.$on('appointment-modal-show-edit', this.show);
            Bus.$on('appointment-modal-hide-edit', this.hide);
        },

        beforeDestroy () {
            Bus.$off('appointment-modal-show-edit');
            Bus.$off('appointment-modal-hide-edit');
        },

        methods: {
            show (appointment) {
                this.shown = true;
                this.getProviderLocations();
                this.appointment = appointment;
                Bus.$emit('textarea-update:note', this.appointment.doctors_note);
                Bus.$emit('textarea-update:reason', this.appointment.reason);
            },
            hide () {
                this.shown = false;
            },
            save () {
                console.log(this.appointment);
                this.$emit('update-appointment', this.appointment);
            },
            getProviderLocations () {
                let self = this;
                axios.get(`/api/providers/${self.doctor.id}`)
                    .then( (res) => {
                        self.providers  = res.data;
                    });
            },
        },

        watch: {
            shown (newShown) {
                if (newShown) {
                    $(this.$el).modal({
                        backdrop: 'static',
                        keyboard: false,
                    });
                }
                else {
                    $(this.$el).modal('hide');
                }
            }
        }
    }
</script>
