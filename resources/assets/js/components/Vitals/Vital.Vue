<template>
    <div class="modal fade modal-blue" id="modal-vitals" ref="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Vitals</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form>
                               <div class="form-group">
                                    <label>Temperature <small>(F)</small></label>
                                    <input type="text" v-model="form.temperature" class="form-control input-sm">
                                </div>
                                <div class="form-group">
                                    <label>Pulse <small>(bpm)</small></label>
                                    <input type="text" v-model="form.pulse" class="form-control input-sm">
                                </div>
                                <div class="form-group">
                                    <label>Blood Pressure <small>(F)</small></label>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <input type="text" v-model="form.blood_pressure.systolic" class="form-control input-sm">
                                        </div>
                                        <label class="control-label col-md-2 text-center">/</label>
                                        <div class="col-md-5">
                                            <input type="text" v-model="form.blood_pressure.diastolic" class="form-control input-sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Respiratory Rate</label>
                                    <select v-model="form.respiratory_rate" class="form-control input-sm">
                                        <option v-for="respiratory_rate in defaults.respiratory_rates">{{ respiratory_rate }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Oxygen Saturation <small>(%)</small></label>
                                    <select v-model="form.oxygen_saturation" class="form-control input-sm">
                                        <option v-for="saturation in defaults.oxygen_saturations">{{ saturation }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Height</label> 
                                    <label class="ml-20">
                                        <input type="radio" v-model="byCentimeters" :value="true"> <small>Centimeters</small>
                                        <input type="radio" v-model="byCentimeters" :value="false"> <small>Feet Inches</small> 
                                    </label> 
                                     <div class="row" v-if="byCentimeters">
                                        <div class="col-md-12">
                                            <label>Centimeters</label>
                                            <input type="text" v-model="form.height.cm" @keyup="convertCentimeters" class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="row" v-else="byCentimeters">
                                        <div class="col-md-6">
                                            <label>Feet</label>
                                            <select v-model="form.height.feet" @change="convertFtInches" class="form-control input-sm">
                                                <option v-for="n in 9">{{ n-1 }}</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Inch</label>
                                            <select v-model="form.height.inch" @change="convertFtInches" class="form-control input-sm">
                                                <option v-for="n in 12">{{ n-1 }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Weight</label>
                                    <label class="ml-20">
                                        <input type="radio" v-model="byPounds" :value="true"> <small>Pounds</small>
                                        <input type="radio" v-model="byPounds" :value="false"> <small>Kilograms</small> 
                                    </label> 
                                    <div class="row" v-if="byPounds">
                                        <div class="col-md-12">
                                            <label>Pounds</label>
                                            <input type="text" name="" @keyup="convertLbs" v-model="form.weight.lbs" class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="row" v-else="byPounds">
                                        <div class="col-md-12">
                                            <label>Kilogram</label>
                                            <input type="text" name="" @keyup="convertKg" v-model="form.weight.kg" class="form-control input-sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>BMI</label>
                                    <input type="text" name="" :value="Bmi" class="form-control input-sm" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Pain</label>
                                    <input type="number" name="" v-model="form.pain" min="1" max="10" class="form-control input-sm">
                                </div>
                                <div class="form-group">
                                    <label>Smoking</label>
                                    <select v-model="form.smoking" class="form-control input-sm">
                                        <option v-for="smoke in defaults.default">{{ smoke }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Alcohol</label>
                                    <select v-model="form.alcohol" class="form-control input-sm">
                                        <option v-for="alcohol in defaults.default">{{ alcohol }}</option>
                                    </select>
                                </div>
                                <div class="form-group" v-if="age <= 0">
                                    <label>Head Circumference</label>
                                    <input type="text" name="" v-model="form.head_circumference" class="form-control input-sm">
                                </div>


                                <div class="pull-right">
                                    <button class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
                                    <button class="btn btn-sm btn-primary" @click.prevent="submitVitals">Done</button>
                                </div>

                            </form>

                            <div class="clear mt-30"></div>
                            <div class="alert alert-success" v-if="success" role="alert">
                               <i class="fa fa-check"></i> Vitals saved!
                            </div>
                            <div class="pull-right float-responsive">


                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Bus from '../../Bus.js';
    import axios from 'axios';
    const moment = require('moment');
    export default {
        props: {
            age: {
                type: Number,
                required: true,
            },
            patientId: {
                type: String,
                required: true,
            }
        },

        data () {
            return {
                success: false,
                byCentimeters: false,
                byPounds: false,
                form: {
                    patient_id: this.patientId,
                    temperature: '',
                    pulse: '',
                    blood_pressure: {
                        systolic: '',
                        diastolic: '',
                    },
                    respiratory_rate: '',
                    oxygen_saturation: '',
                    height: {
                        feet: '',
                        inch: '',
                        cm: '',
                        meters: '',
                    },
                    weight: {
                        lbs: '',
                        kg: '',
                    },
                    bmi: '',
                    pain: '',
                    smoking: '',
                    alcohol: '',
                    head_circumference: '',
                    customs: {},
                },

                defaults:  {
                    default: [
                        // 'Smokes daily (currently)',
                        // 'Smokes on some days (currently)',
                        // 'Former smoker',
                        // 'Never smoked',
                        // 'Smoker',
                        // 'current status unknown',
                        // 'Unknown if ever smoked',
                        // 'Heavy smoker',
                        // 'Light tobacco smoker',
                        'Never',
                        'Occassional',
                        'Regular',
                        'Heavy',
                    ], 
                    respiratory_rates: [
                        'Adult Normal: 12-25 breaths per minute',
                        'Adult Abnormal: Under 12, Over 25 breaths per minute',
                        'Child (6-12 years old) Normal: 12-20 breaths per minute',
                        'Child (6-12 years old) Abnormal: Under 12, over 20 breaths per minute',
                        'Child (1-5 years old) Normal: 20-30 breaths per minute',
                        'Child (1-5 years old) Abnormal: Under 20, over 30 breaths per minute',
                    ],
                    oxygen_saturations: [
                        'Normal (above 90%)',
                        'Abnormal (below 90%)',
                    ],
                    pains: [
                        'Acute',
                        'Chronic',
                        'Breakthrough',
                        'Bone Pain',
                        'Soft Tissue Pain',
                        'Nerve Pain',
                        'Referred Pain',
                        'Phantom Pain',
                        'Total Pain',
                    ],

                }

            };
        },

        mounted () {
            Bus.$on('modal-vitals', this.show);
            $(this.$el).on('show.bs.modal', this.shown);
            console.log(this.age);
        },

        methods: {
            shown () {
                $(this.$el).find('.alert').hide();
            },
            submitVitals() {
                var self = this;
               this.$http.post('/profile/patients/vitals', self.form)
                    .then(response => {
                        self.success = response.body.success;
                        setTimeout(() => {
                                    $(self.$refs.modal).modal('hide');
                                    self.clear();
                                }, 3000);
                    });
            },

            clear() {
                // clear all forms
            },

            numberOnly () {

            },

            convertFtInches () {
                let feet = this.form.height.feet != '' ? this.form.height.feet : 0;
                let inch = this.form.height.inch != '' ? this.form.height.inch : 0;
                // convert ft/inch to meters
                let meter_feet = feet * 0.3048;
                let meter_inch = inch * 0.0254;
                this.form.height.meters = meter_feet + meter_inch;
                // convert meters to cm
                this.form.height.cm = this.form.height.meters * 100;

            },

            convertCentimeters () {
                let self = this;
                let cm = self.form.height.cm != '' ? self.form.height.cm : 0;
                // convert meters to cm
                self.form.height.meters = cm / 100;
                // convert meters to ft/inch
                // let inch = meters / 0.0254;
                // let feet = inch / 12;
                let meters = self.form.height.meters != '' ? self.form.height.meters : 0;
                let m_feet = meters / 0.3048;
                let inch = (m_feet%1) ;
                inch = inch * 12;
                self.form.height.feet = Math.floor(m_feet);
                self.form.height.inch = Math.round(inch);
            },

            convertLbs () {
                let lbs = this.form.weight.lbs != '' ? this.form.weight.lbs : 0;
                let kg = lbs * 0.45359237;
                this.form.weight.kg = kg;
            },

            convertKg () {
                let kg = this.form.weight.kg != '' ? this.form.weight.kg : 0;
                let lbs = kg / 0.45359237;
                this.form.weight.lbs = lbs;
            },

        },

        computed: {
            Bmi : function () {
                let kg = this.form.weight.kg != '' ? this.form.weight.kg : 0;
                let meters = this.form.height.meters != '' ? this.form.height.meters : 0;
                let bmi = '';
                let bmi_count = 0;
                bmi_count = (kg / meters) / meters;
                this.form.bmi = bmi_count;

                if (bmi_count <= 18.5)
                    bmi = 'Underweight';
                else if (bmi_count > 18.5 && bmi_count <= 25)
                    bmi = 'Normal Weight';
                else if (bmi_count > 25 && bmi_count <= 30)
                    bmi = 'Overweight';
                else if (bmi_count > 30)
                    bmi = 'Obese';

                return !isNaN(bmi_count) ? bmi + ' (' + bmi_count + ' kg/m2)' : '' ;               
            },
        },

        watch: {
            form: {
                handler: function(newValue) {

                  
                },
                deep: true
            },

        },




    }
</script>
