<template>
    <div class="modal fade modal-blue" id="modal-add-appointment" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" @click="shown = false" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        {{ modalTitle }}
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="">
                                <div class="form-group">
                                    <label for="">Doctor's name</label>
                                    <input type="text" v-model="doctor" disabled class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Appointment Profile</label>
                                    <input type="text" v-model="appointmentProfile" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Reason for visit</label>
                                    <v-textarea @update:reason="reason = $event.target.value" model="reason" v-model="reason" rows="3" classes="no-resize form-control"></v-textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Schedule</label>
                                </div>
                                <div class="form-group">
                                    <label for="">Duration</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Exam room</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Room 1</option>
                                        <option value="">Room 2</option>
                                        <option value="">Room 3</option>
                                        <option value="">Room 4</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Doctor's note</label>
                                    <v-textarea @update:note="note = $event.target.value" model="note" rows="2" :limit="100" classes="no-resize form-control"></v-textarea>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" @click="shown = false">Cancel</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Bus from '../../Bus.js';
    import VueTextArea from '../../helpers/Textarea.vue';
    import moment from 'moment';
    export default {
        components: {
            'v-textarea': VueTextArea,
        },
        props: {
            doctor: {
                type: String,
                default: null,
            },
        },

        data () {
            return {
                appointment: {
                    appointment_profile: '',
                    exam_room: '',
                    minutes: 0,
                    provider_id: 0,
                    patient_id: 0,
                    reason: '',
                    scheduled_on: moment(),
                },
                shown: false,
            }
        },

        created () {
            Bus.$on('appointment-modal-show', this.show);
        },

        beforeDestroy () {
            Bus.$off('appointment-modal-show');
        },

        computed: {
            modalTitle () {
                return this.appointment ? 'Edit Appointment' : 'New Appointment';
            }
        },

        methods: {
            show (appointment) {
                this.shown = true;
                this.appointment = appointment;
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
