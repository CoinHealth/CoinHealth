<template>
    <div v-if="show" class="panel panel-primary">
      <div class="panel-heading">
        <h5 class="panel-title">
            <span>Add Problem</span>
            
        </h5>
      </div>
      <div class="panel-body">
        <div class="form-horizontal">

            <div class="form-group">
                <label class="form-label col-md-3">Procedure</label>
                <div class="col-md-9">
                    <multi-select
                        v-model="form.problem"
                        :options="med_conditions"
                        placeholder="Search condition"
                        key="id"
                        label="name"
                    >
                    </multi-select>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label col-md-3">Date Diagnosed</label>
                <div class="col-md-9">
                    <input type="date" class="form-control" v-model="form.date_diagnosed">
                </div>
            </div>
            <div class="form-group">
                <label class="form-label col-md-3">Status</label>
                <div class="col-md-9">
                     <multi-select
                        v-model="form.status"
                        :options="defaults.status"
                        placeholder="Select Status"
                    >
                    </multi-select>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label col-md-3">Internal Notes</label>
                <div class="col-md-9">
                   <textarea rows="3" class="form-control" v-model="form.internal_notes"></textarea>
                </div>
            </div>
           
            <div class="clear"></div>
            <div class="alert alert-success mt-20" v-if="success" role="alert">
               <i class="fa fa-check"></i>Patient Problem Added! 
            </div>

        </div>
      </div>
      <div class="panel-footer">
            <div class="text-right">
                <button @click.prevent="save" class="btn btn-xs btn-success" :disabled="isDisabled">
                    <i class="fa fa-floppy-o"></i> <span>Save</span>
                </button>
                 <button @click="close" class="btn btn-xs btn-danger">
                    <i class="fa fa-ban"></i> <span>Cancel</span>
                </button>
            </div>
      </div>
    </div>
</template>
<script>
    import axios from 'axios';
    import Bus from '../../Bus.js';
    const moment = require('moment');
    import MultiSelect from 'vue-multiselect';
    export default {
        components: {
            'multi-select': MultiSelect,
        },
        props: {
            patient_id: {
                type: String,
                required: true,
            },

            show: {
                type: Boolean,
                required: true,
            },

            med_conditions: {
                type: Array,
                required: true,
            },
        },

        data () {
            return {
                form: {
                    problem: {
                        id: '',
                        name: '',
                    },
                    date_diagnosed: '',
                    status: '', 
                    internal_notes: '',
                },
                defaults: {
                    status : ['Active', 'Inactive', 'Resolved'],

                },
                success: false,
                isDisabled: false,
            };
        },

        mounted () {
            
        },

        methods: {

            save () {
                let self = this;
                let url = `/profile/patients/problems/${this.patient_id}`;
                self.isDisabled = true;
                axios.post(url, self.form)
                    .then(res => {
                        self.success = true;
                        setTimeout(function() {
                            self.clear();
                            self.close();
                            Bus.$emit('problem-added', res.data.problem);
                        }, 3000);
                    });
               
            },

            clear () {
                this.success = false;
                this.isDisabled = false;
                this.form.problem = {
                    id: '',
                    name: '',
                };
                this.form.date_diagnosed = '';
                this.form.status = ''; 
                this.form.internal_notes = '';
            },

            close () {
                Bus.$emit('close-aded-new', false);
            },
        },


        watch: {
           

        },

        computed: {
            
        },
    }
        
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>