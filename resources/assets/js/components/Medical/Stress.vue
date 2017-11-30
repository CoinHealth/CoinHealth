 <template>
    <div class="stress-form">
        <editable-panel :data="form" v-cloak  model="stress" @save:stress="save($event, 'stress')">
            <span slot="panel-header">Stress Management</span>
            <div slot="view-body" class="view-form">
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Current major stressors or life changes in your life:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="stressors"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Major changes in family health:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.changes_in_family_health"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Handle stress:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.handle_stress"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Activities to relax:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.relaxing_activities"></span>
                    </div>
                </div>
               
            </div>

            <div slot="edit-body" class="edit-form">
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>What are the current major stressors or life changes in your life?</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.major_stressors"
                            :multiple="true"
                            :options="defaults.major_stressors"
                        >
                        </multi-select>
                        <textarea class="form-control" v-show="showOtherType" v-model="form.other_stressors" maxlength="60">
                        </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Any major changes in the family health during the past year? (If yes, please explain)</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.had_changes_in_family_health"
                            :options="defaults.yesno"
                        >
                        </multi-select>
                        <input type="text" v-show="showText" placeholder class="form-control input-sm" v-model="form.changes_in_family_health">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>How do you handle stress?</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.handle_stress"
                            :options="defaults.handle_stress"
                        >
                        </multi-select>
                        
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>What do you do to relax?</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" v-model="form.relaxing_activities">
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
                major_stressors: [],
                other_stressors: '',
                changes_in_family_health: '',
                had_changes_in_family_health: '',
                handle_stress: '',
                relaxing_activities: '',
            },
            form: {
                major_stressors: [],
                other_stressors: '',
                changes_in_family_health: '',
                had_changes_in_family_health: '',
                handle_stress: '',
                relaxing_activities: '',
            },

           defaults: {
                yesno: "Yes,No".split(','),
                handle_stress: "Very well,Moderately well,Poorly".split(','),
                major_stressors: [
                    'Accident',
                    'Begin or end school',
                    'Business or work-related stress',
                    'Change in eating habits',
                    'Change in financial state',
                    'Change in health of family member',
                    'Change in living conditions',
                    'Change in number of family reunions',
                    'Change in recreation',
                    'Change in residence',
                    'Change in responsibilities at work',
                    'Change in schools',
                    'Change in sleeping habits',
                    'Change in social activities',
                    'Change in working hours or conditions',
                    'Child leaving home',
                    'Death of a close family member',
                    'Death of a spouse',
                    'Dismissal from work',
                    'Divorce',
                    'Foreclosure of mortgage or loan',
                    'Imprisonment',
                    'Marital separation',
                    'Marriage',
                    'Mortgage Loan',
                    'Personal injury or illness',
                    'Pregnancy',
                    'Retirement',
                    'Revision of personal habits',
                    'Sexual difficulties',
                    'Spouse starts or stops work',
                    'Trouble with in-laws',
                    'Violation of law',
                    'Other',
                ],
           },

        }
    },
    mounted () {
        Bus.$on('stress-data', this.fill);
    },
    methods: {
        fill (data) {
            if ((typeof(data) !== 'undefined') && (data !== null)) {
                this.patient = data;
                this.form = _.clone(data);
                this.patient.had_changes_in_family_health = (data.changes_in_family_health !== 'undefined' && data.other_tobacco !== null) ? 'Yes' : 'No';
                this.form.had_changes_in_family_health = _.clone(this.patient.had_changes_in_family_health);
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
      showText () {
            let val = this.form.had_changes_in_family_health;
            if(val == 'No') {
                this.form.changes_in_family_health = '';
            }
            return this.form.had_changes_in_family_health !== 'No';
        },
        showOtherType () {
            let val = this.form.major_stressors;
            if (val !== '') {
                if ( $.inArray("Other", val) >= 0) {
                    return true;
                }
                else {
                    this.form.other_stressors = '';
                    return false;
                }
                
            }
            return false;
        },
        stressors () {
            let val = this.patient.major_stressors;
            let val2 = this.patient.other_stressors;
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
