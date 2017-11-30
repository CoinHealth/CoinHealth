 <template>
    <div class="laboratory-form">
        <editable-panel :data="form" model="problem" @save:problem="save($event, 'problem')">
            <span slot="panel-header">Laboratory</span>
            <div slot="view-body" class="view-form">
                <div class="form-horizontal">
                    
                    <div class="form-group ">
                        <div class="col-md-3 label-col">
                            <label>Name:</label>
                        </div>
                        <div class="col-md-9">
                            <span v-text="patient.name"></span>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-md-3 label-col">
                            <label>Date Diagnosed:</label>
                        </div>
                        <div class="col-md-9">
                            <span v-text="patient.date_diagnosed"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Status:</label>
                        </div>
                        <div class="col-md-9">
                            <span v-text="patient.status"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Internal Notes:</label>
                        </div>
                        <div class="col-md-9">
                            <span v-text="patient.internal_notes"></span>
                        </div>
                    </div>

                </div>
            </div>

            <div slot="edit-body" class="edit-form">
                
                <div class="form-horizontal">

                    <div class="form-group">
                        <label class="form-label col-md-3">Name:</label>
                        <div class="col-md-9">
                            <multi-select
                                v-model="form.problem"
                                :options="med_conditions"
                                placeholder="Search condition"
                                key="id"
                                label="name"
                                @input="changeProblem"
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
                            <input type="text" class="form-control" v-model="form.internal_notes">
                        </div>
                    </div>
                   
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

        med_conditions: {
            type: Array,
            required: true,
        },

        data: {
            type: Object,
            required: true,
        },

    },
   
    data () {
        return {
            form: {},
            patient: {},
            defaults: {
                status : ['Active', 'Inactive', 'Resolved'],
            },
        };
    },
    mounted () {
        this.fill();
    },
    methods: {
        fill () {
            this.patient = this.data;
            this.form = _.clone(this.data);

            let problem = {
                'id': this.data.problem_id,
                'name': this.data.name,
            };
            this.form.problem = _.clone(problem);
        },
        
        save (data, model) {
            let self = this;
            console.log(self.form);
            let url = `/profile/patients/problems/${this.patient_id}/update`;
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

        changeProblem ()
        {
            let self = this;
            self.form.problem_id = self.form.problem.id;
            self.form.name = self.form.problem.name;
        },
    },
    computed: {
        
      
    },
    watch: {
       
    },
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>