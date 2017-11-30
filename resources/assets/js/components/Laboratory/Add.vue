<template>
    <div v-if="show" class="panel panel-primary">
      <div class="panel-heading">
        <h5 class="panel-title">
            <span>Add Lab Result</span>
            
        </h5>
      </div>
      <div class="panel-body">
        <div class="form-horizontal">

            <div class="form-group">
                <label class="form-label col-md-3">Procedure</label>
                <div class="col-md-9">
                    <multi-select
                        v-model="form.procedure"
                        :options="procedures"
                        placeholder="Search lab procedure"
                    >
                    </multi-select>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label col-md-3">Date</label>
                <div class="col-md-9">
                    <input type="date" class="form-control" v-model="form.date">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label col-md-3">Where</label>
                <div class="col-md-9">
                    <!-- state -->
                    <multi-select
                        v-model="form.where"
                        :options="defaults.states"
                        placeholder="Select State"
                    >
                    </multi-select>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label col-md-3">Facility</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" v-model="form.facility">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label col-md-3">How Often</label>
                <div class="col-md-9">
                    <multi-select
                        v-model="form.how_often"
                        :options="defaults.often"
                    >
                    </multi-select>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label col-md-3">Result</label>
                <div class="col-md-9">
                   <textarea rows="3" class="form-control" v-model="form.result"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label col-md-3">Comments</label>
                <div class="col-md-9">
                   <textarea rows="3" class="form-control" v-model="form.comments"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label col-md-3">Upload File</label>
                <div class="col-md-9">
                   <!-- <input type="file" name="form-control"> -->
                    <dropzone 
                          ref="dropLabFile"
                          id="dropLabFile"
                          url="https://httpbin.org/post"
                          v-bind:dropzone-options="dropzoneOptions" 
                          v-bind:use-custom-dropzone-options="true"
                          >
                        <!-- v-on:vdropzone-success="showSuccess" -->
                        <!-- Optional parameters if any! -->
                        <!-- <input type="hidden" name="token" :value="Laravel.csrfToken"> -->
                    </dropzone>
                    <div class="text-right">
                        <small >(Maximum files: 3, Max file size: 2MB)</small>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="alert alert-success mt-20" v-if="success" role="alert">
               <i class="fa fa-check"></i>Laboratory Test Added! 
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
    import Dropzone from 'vue2-dropzone'
    export default {
        components: {
            'multi-select': MultiSelect,
            'dropzone': Dropzone,
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

            states: {
                type: Array,
                required: true,
            },
        },

        data () {
            return {
                procedures: [],
                token: Laravel.csrfToken,
                defaults: {
                    often: [
                        'hourly', 
                        'daily', 
                        'weekly', 
                        'monthly', 
                        'yearly', 
                        "as per doctor's advise",
                    ],
                    states: [],
                },

                dropzoneOptions: {
                    autoProcessQueue: false,
                    parallelUploads: 1000,
                    uploadMultiple: true,
                    addRemoveLinks: true,
                    maxFiles: 3,
                    maxFilesize: 2,
                },

                form: {
                    procedure: '',
                    date: '',
                    where: '',
                    facility: '',
                    how_often: '',
                    result: '',
                    comments: '',

                },
                success: false,
                isDisabled: false,


            };
        },

        mounted () {
            this.getStates();
            Bus.$on('lab-procedures', this.getProcedures);
        },

        methods: {
            getProcedures (data) {
                this.procedures = data;
            }, 
            getStates () {
                let self = this;
                $.each(self.states, function (i, v) {
                        self.defaults.states.push(v.pretty_name);
                    });
            },

            save () {
                let self = this;
                let url = `/profile/patients/laboratories/${this.patient_id}`;
                let dropzone = self.$refs.dropLabFile.dropzone;
                dropzone.processQueue();
                self.isDisabled = true;

                dropzone.on('queuecomplete', function (file) {
                    const data = new FormData();
                    data.append('form', JSON.stringify(self.form) );
                    $.each(dropzone.files, function(i,v) {
                        data.append('files[]', v);
                    });
                    axios.post(url, data)
                        .then(res => {
                            self.success = true;
                            setTimeout(function() {
                                self.clear();
                                self.close();
                                Bus.$emit('laboratory-added', res.data.laboratory);
                            }, 3000);
                        });
                });

               
            },

            clear () {
                this.success = false;
                this.isDisabled = false;
                this.form.procedure = '';
                this.form.date = '';
                this.form.where = '';
                this.form.facility = '';
                this.form.how_often = '';
                this.form.result = '';
                this.form.comments = '';
                this.$refs.dropLabFile.dropzone.removeAllFiles();
            },

            close () {
                Bus.$emit('close-aded-new', false);
            },

            // dropzone
            // showSuccess: function (file) {
            //     // console.log(this.$refs.dropLabFile);
            // },

        },


        watch: {
           

        },

        computed: {
            
        },
    }
        
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>
    .material-icons {
        display: none !important;
    }
</style>

