<template>
    
<div class="injury-template">
    <transition name="slide-fade">
        <div v-if="!editing" class="div-injury view-form">
            <h5 class="subtitle">Case #{{ index + 1 }}</h5>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Reason for Medical Procedure:</label>
                        </div>
                        <div class="col-md-7">
                            <p v-text="patient.major_injuries"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Operation:</label>
                        </div>
                        <div class="col-md-7">
                            <p v-text="patient.operation"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>When:</label>
                        </div>
                        <div class="col-md-7">
                            <p v-text="date"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Where:</label>
                        </div>
                        <div class="col-md-7">
                            <p v-text="patient.hospitalizations"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Performed By:</label>
                        </div>
                        <div class="col-md-7">
                            <p v-text="patient.illnesses"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Frequency:</label>
                        </div>
                        <div class="col-md-7">
                            <p v-text="patient.psychological_therapy"></p>
                        </div>
                    </div>
                    <div class="text-right">
                        <button ref="btnEdit" @click="editing = true" 
                                class="btn btn-xs btn-primary">
                            <i class="fa fa-pencil"></i> <span>Edit</span>
                        </button>
                    </div>

                </div>
            </div>
           
        </div>
    </transition>
    <transition name="slide-fade">
        <div v-if="editing" class="div-edit-injury edit-form">
            <h5 class="subtitle">Edit Case #{{ index + 1 }}</h5>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Reason for Medical Procedure:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control input-sm" 
                                v-model="form.major_injuries">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Operation:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control input-sm" 
                                v-model="form.operation">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>When:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="date" class="form-control input-sm" 
                                v-model="form.date">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Where:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control input-sm" 
                                v-model="form.hospitalizations">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Performed By:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control input-sm" 
                                v-model="form.illnesses">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Frequency:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control input-sm" 
                                v-model="form.psychological_therapy">
                        </div>
                    </div>

                    <div class="text-right">
                        <button @click="save" 
                            class="btn btn-xs btn-success">
                            <i class="fa fa-floppy-o"></i> <span>Save</span>
                        </button>

                        <button @click="editing = false" 
                            class="btn btn-xs btn-danger">
                            <i class="fa fa-ban"></i> <span>Cancel</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </transition>

</div>


</template>
<script>
import Bus from '../../Bus.js';
import axios from 'axios';
import moment from 'moment';

export default {
    components: {},
    props: {
        data: {
            type: Object,
            required: true,
        },
        index: {
            type: Number,
            required: false,
        },
        
    },

    data () {
        return {
            editing: false,
            hovering: false,
            saved: false,
            injury: this.data,
            patient: {},
            form: {},
            defaults: {
               
            },

            

        };
    },

    mounted () {
        // console.log(Boolean(this.data.active));
       this.patient = this.data;
       this.form = _.clone(this.data);
    },

    methods: {
        save () {
            // save result = this.patient;
            let self = this;
            let url = '/profile/medical/injury/edit';
            axios.post(url, self.form)
                .then(res => {
                    self.patient = _.clone(self.form);
                    self.editing = false;
                });
        },

        
    },

    computed: {
        date () {
            return  moment(this.patient.date, 'YYYY-MM-DD h:i:s').isValid() ? moment(this.patient.date).format('L') : '';
        }
        
    },

}
</script>
