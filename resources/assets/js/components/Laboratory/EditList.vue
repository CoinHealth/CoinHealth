 <template>
    <div class="laboratory-form">
        <editable-panel :data="form" model="laboratory" @save:laboratory="save($event, 'laboratory')">
            <span slot="panel-header">Laboratory</span>
            <div slot="view-body" class="view-form">
                <div class="form-horizontal">
                    
                    <div class="form-group ">
                        <div class="col-md-3 label-col">
                            <label>Procedure:</label>
                        </div>
                        <div class="col-md-9">
                            <span v-text="patient.procedure"></span>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-md-3 label-col">
                            <label>Date:</label>
                        </div>
                        <div class="col-md-9">
                            <span v-text="patient.date"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Where:</label>
                        </div>
                        <div class="col-md-9">
                            <span v-text="patient.where"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Facility:</label>
                        </div>
                        <div class="col-md-9">
                            <span v-text="patient.facility"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>How Often:</label>
                        </div>
                        <div class="col-md-9">
                            <span v-text="patient.how_often"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Result:</label>
                        </div>
                        <div class="col-md-9">
                            <span v-text="patient.result"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Comments:</label>
                        </div>
                        <div class="col-md-9">
                            <span v-text="patient.comments"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label col-md-3">Uploads: </label>
                        <div class="col-md-9 ">
                            <div class="row">
                                <div class="col-md-12" v-for="file in patient.attachments">
                                    <label><small v-text="file.title"></small></label>
                                    <!-- <embed :src="file.path" width="100%" height="auto"></embed> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


               
            </div>

            <div slot="edit-body" class="edit-form">
                
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
                        <label class="form-label col-md-3">Uploads</label>
                        <div class="col-md-9 ">
                            <div class="row file-wrapper text-center">
                                <!-- <div class="col-md-4 text-center" v-for="file in form.attachments">
                                    <label><small v-text="file.title"></small></label>
                                    <embed :src="file.path" width="100%" height="auto"></embed>
                                    <a :href="file.path" :download="file.title" class="btn btn-primary btn-xs">Download</a>
                                </div> -->

                                 <div class="col-md-12" v-for="file in form.attachments">
                                    <div class="pull-left">
                                        <label><small v-text="file.title"></small></label>
                                    </div>
                                    <div class="pull-right">
                                        <a :href="file.path" :download="file.title" class="btn btn-primary btn-xs">Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label class="form-label col-md-3">Upload File</label>
                        <div class="col-md-9">
                            <dropzone 
                                  ref="myVueDropzone"
                                  id="dropzone"
                                  url="https://httpbin.org/post"
                                  v-on:vdropzone-success="showSuccess"
                                  v-bind:dropzone-options="dropzoneOptions" 
                                  v-bind:use-custom-dropzone-options="true"
                                  >
                                <input type="hidden" name="token" value="xxx">
                            </dropzone>
                            <div class="text-right">
                                <small >(Maximum files: 3, Max file size: 2MB)</small>
                            </div>
                        </div>
                    </div> -->

                   <!--  <div class="clear"></div>
                    <div class="alert alert-success mt-20" v-if="success" role="alert">
                       <i class="fa fa-check"></i>Laboratory Test Added! 
                    </div> -->

                </div>

            </div>

        </editable-panel>
    </div>
    
</template>

<script>
import EditablePanel from '../../helpers/EditablePanel2.vue';
import MultiSelect from 'vue-multiselect';
import axios from 'axios';
import Bus from '../../Bus.js';
export default {
    components: {
        'editable-panel': EditablePanel,
        'multi-select': MultiSelect,
    },

    props: {
        patient_id: {
            type: String,
            required: true,
        },

        lab_procedures: {
            type: Array,
            required: true,
        },

        data: {
            type: Object,
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
            form: {},
            patient: {},
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
        };
    },
    mounted () {
        this.fill();
        this.getProcedures();
        // Bus.$on('lab-procedures', this.getProcedures);
        this.getStates();

    },
    methods: {
        fill () {
            this.patient = this.data;
            this.form = _.clone(this.data);
        },
        getProcedures () {
            let self = this;
            $.each(self.lab_procedures, function (i, v) {
                    self.procedures.push(v.name);
                });
        },
        getStates () {
            let self = this;
            $.each(self.states, function (i, v) {
                    self.defaults.states.push(v.pretty_name);
                });
        },
        save (data, model) {
            let self = this;
            console.log(self.form);
            let url = `/profile/patients/laboratories/${this.patient_id}/update`;
            axios.post(url, self.form)
                .then(response => {
                    if (response.data.success) {
                        this.patient = _.clone(this.form);
                        Bus.$emit(`form-saved:${model}`);
                    }
                })
                .catch(response => {
                    console.error(response);
                });
        } ,
    },
    computed: {
        
      
    },
    watch: {
       
    },
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scope>
    embed {
        border-radius: 20px !important;
        overflow: scroll !important;
       
    }

    .file-wrapper {
        border-radius: 4px !important;
        border: 1px solid #ccc;
        padding: 30px 0px;
        margin-left: 0px;
        margin-right: 0px;
        width: 100%;
    }


</style>
