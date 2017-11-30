<template>
    <div class="modal fade modal-blue" id="modal-add-patient" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">New Patient</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <!-- <form action=""> -->
                                <h5>PATIENT</h5>
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control input-sm" v-model="form.first_name">
                                </div>
                                <div class="form-group">
                                    <label for="">Middle Name</label>
                                    <input type="text" class="form-control input-sm" v-model="form.middle_name">
                                </div>
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control input-sm" v-model="form.last_name">
                                </div>
                                <div class="form-group">
                                    <label for="">Date of Birth</label>
                                    <input type="date" class="form-control input-sm" v-model="form.dob">
                                </div>
                                <div class="form-group">
                                    <label for="">Gender</label>
                                    <select class="form-control input-sm" v-model="form.gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Preferred Language</label>
                                    <input type="text" class="form-control input-sm" v-model="form.language">
                                </div>
                                <div class="form-group">
                                    <label for="">Race</label>
                                    <input type="text" class="form-control input-sm" v-model="form.race">
                                </div>


                                <h5>CONTACT INFORMATION</h5>
                                <div class="form-group">
                                    <label for="">Phone Number</label>
                                    <input type="text" class="form-control input-sm" v-model="form.contact_home">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control input-sm" v-model="form.email">
                                </div>

                                <h5>EMERGENCY</h5>
                                <div class="form-group">
                                    <label for="">Contact Name</label>
                                    <input type="text" class="form-control input-sm" v-model="form.emergency_contact_person">
                                </div>
                                <div class="form-group">
                                    <label for="">Phone Number</label>
                                    <input type="text" class="form-control input-sm" v-model="form.emergency_contact_no">
                                </div>
                                <div class="form-group">
                                    <label for="">Contact Relation</label>
                                    <input type="text" class="form-control input-sm" v-model="form.emergency_contact_relation">
                                </div>

                                <div class="form-group">
                                    <h4>NOTES</h4>
                                    <textarea rows="4" class="form-control input-sm" v-model="form.patient_notes"></textarea>
                                </div>
                                <div class="alert alert-success" v-show="showAlert" role="alert">
                                    <p>{{ alert_message }}</p>
                                </div>
                                <div class="row buttons">
                                    <div class="col-md-12">
                                        <div class="pull-right">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary" @click="submit">Save</button>
                                        </div>
                                    </div>
                                </div>
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import Bus from '../../Bus.js';
    export default {
        data () {
            return {
                form: {
                    first_name: '',
                    middle_name: '',
                    last_name: '',
                    dob: '',
                    gender: '',
                    contact_home: '',
                    email: '',
                    patient_notes: '',
                    language: '',
                    race: '',
                    emergency_contact_person: '',
                    emergency_contact_relation: '',
                    emergency_contact_no: '',
                },
                success: false,
                alert_message: '',
            };
        },
        mounted () {

        },

        methods: {
            submit() {
                let self = this;
                this.$http.post('/profile/patients', self.form)
                    .then((result) => {
                        self.success = result.body.success;
                        self.alert_message = result.body.message;
                        setTimeout(function () {
                            $('#modal-add-patient').modal('hide');
                            self.$emit('add', result.body.patient);
                            self.clear();
                        }, 3000);
                    });
            },
            clear() {
                this.success = false;
                this.form.first_name = '';
                this.form.middle_name = '';
                this.form.last_name = '';
                this.form.dob = '';
                this.form.gender = '';
                this.form.contact_home = '';
                this.form.email = '';
                this.form.patient_notes = '';
                this.form.language = '';
                this.form.race = '';
                this.form.emergency_contact_person = '';
                this.form.emergency_contact_relation = '';
                this.form.emergency_contact_no = '';
            },
        },
        computed: {
            showAlert() {
                return this.success == true;
            },
        },
    }
</script>
