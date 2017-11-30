 <style scoped>
    select {
        margin-bottom: 10px;
    }
</style>
 <template>
    <div class="tobacco-form">
        <editable-panel :data="form" v-cloak  model="tobacco" @save:tobacco="save($event, 'tobacco')">
            <span slot="panel-header">Tobacco Use</span>
            <div slot="view-body" class="view-form">


                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Smoked:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.smoker"></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Currently smoking cigarretes: </label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.currently_smoking"></span>
                    </div>
                </div>

                 <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Sticks per day: </label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.sticks_per_day"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Smoking since: </label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.smoking_age"></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Feel about quitting smoking:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.about_quitting"></span>
                        
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Quit smoking since: </label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.quit_smoking_age"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Used other type of tobacco:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.used_other_tobacco"></span>
                        
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Different tobacco:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="tobacco_used"></span>
                        
                    </div>
                </div>
            </div>

            <div slot="edit-body" class="edit-form">
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Have you ever smoked? (If yes when did you start?)</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.smoker"
                            :options="defaults.yesno"
                        >
                        </multi-select>
                        <input type="text" v-show="showAge" placeholder="What age did you start smoking?" class="form-control input-sm" v-model="form.smoking_age">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Do you currently smoke cigarettes? </label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.currently_smoking"
                            :options="defaults.yesno"
                        >
                        </multi-select>
                    </div>
                </div>
               
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>How many per day?</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" class="form-control" v-model="form.sticks_per_day"> 
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>How do you feel about quitting smoking?</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.about_quitting"
                            :options="defaults.quitting"
                        >
                        </multi-select>

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>When did you stop? (Age)</label>
                    </div>
                    <div class="col-md-9">
                        <input type="number" class="form-control" v-model="form.quit_smoking_age">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Do you use any other type of tobacco? (If yes, please select all that applies.)</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.used_other_tobacco"
                            :options="defaults.yesno"
                        >
                        </multi-select>
                       <multi-select
                            v-show="showTobacco" 
                            placeholder="What kind of tobacco?"
                            :multiple="true"
                            return="form.other_tobacco"
                            v-model="form.other_tobacco"
                            :options="defaults.tobaccos"
                        >
                        </multi-select>
                        <textarea class="form-control" v-show="showOtherType" v-model="form.other_tobacco_type" maxlength="60">
                        </textarea>
                    </div>
                </div>
              
            </div>
        </editable-panel>
    </div>
</template>

<script>
import EditablePanel from '../../helpers/EditablePanel2.vue';
import SelectDefault from '../../helpers/SelectDefault.vue';
import MultiSelect from 'vue-multiselect';
import axios from 'axios';
import Bus from '../../Bus.js';
export default {
    components: {
        'editable-panel': EditablePanel,
        'select-default': SelectDefault,
        'multi-select': MultiSelect,
    },

    props: {
        data: {
            type: Object,
            required: true,
        },
    },
   
    data () {
        return {
            patient: {
                smoker: '',
                currently_smoking: '',
                sticks_per_day: '',
                smoking_age: '',
                quit_smoking_age: '',
                about_quitting: '',
                used_other_tobacco: '',
                other_tobacco: [],
                other_tobacco_type: '',
            },
            form: {
                smoker: '',
                currently_smoking: '',
                sticks_per_day: '',
                smoking_age: '',
                quit_smoking_age: '',
                about_quitting: '',
                used_other_tobacco: '',
                other_tobacco: [],
                other_tobacco_type: '',
            },

           defaults: {
                yesno: "Yes,No".split(','),
                quitting: [
                    "I don't want to quit for any reason.",
                    "I don't see the need to quit.",
                    'I will quit soon.',  
                    'I want to quit right now.',
                ],
                tobaccos: [
                    'Cigars',
                    'E-cigarette',
                    'Hookah',
                    'Kreteks',
                    'Pipe',
                    'Smokeless tobacco',
                    'Vape',
                    'Other',
                ],
           },

        }
    },
    mounted () {
        Bus.$on('tobacco-data', this.fill);
    },
    methods: {
        fill (data) {
            if ((typeof(data) !== 'undefined') && (data !== null)) {
                this.patient = data;
                this.form = _.clone(data);
                this.patient.used_other_tobacco = (data.other_tobacco !== 'undefined' && data.other_tobacco !== null || data.other_tobacco !== '') ? 'Yes' : 'No';
                this.form.used_other_tobacco = _.clone(this.patient.used_other_tobacco);
            }
        },
        save (data, model) {
            axios.post(`/profile/medical/${model}`, data)
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

        showAge () {
            let val = this.form.smoker;
            if(val !== 'Yes') {
                this.form.smoking_age = '';
            }
            return this.form.smoker == 'Yes';
        },

        showTobacco () {
            let val = this.form.used_other_tobacco;
            if(val !== 'Yes') {
                this.form.other_tobacco = [];
            }
            else {
                this.form.other_tobacco = _.clone(this.patient.other_tobacco);
            }
            return this.form.used_other_tobacco == 'Yes';
        },
        showOtherType () {
            let val = this.form.other_tobacco;
            if (val !== '') {
                if ( $.inArray("Other", val) >= 0) {
                    return true;
                }
                else {
                    this.form.other_tobacco_type = '';
                    return false;
                }
                
            }
            return false;
        },

        tobacco_used () {
            let val = this.patient.other_tobacco;
            let val2 = this.patient.other_tobacco_type;
            let used = '';
            if (val !== '' ) {
                used = (val2 !== 'undefined' && val2 !== null || val2 !== '') ? (val.join(', ') + ', ' + val2) : val.toString();
            }
            return used;
        },
      
    },
    watch: {
        
    },
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
