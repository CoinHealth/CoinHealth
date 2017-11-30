 <style scoped>
    select {
        margin-bottom: 10px;
    }
</style>
 <template>
    <div class="questionnaire-form">
        <editable-panel :data="form" v-cloak  model="questionnaire" @save:questionnaire="save($event, 'questionnaire')">
            <span slot="panel-header">Please answer "yes, no, a little bit" to the following: </span>
            <div slot="view-body" class="view-form">
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Hot flashes:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.hot_flashes"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Night Sweats:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.night_sweats"></span>
                    </div>
                </div>                    
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Difficulty getting to sleep:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.difficulty_getting_sleep"></span>
                    </div>
                </div>                    
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Difficulty staying asleep:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.difficulty_staying_asleep"></span>
                    </div>
                </div>                    
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Heart palpitations or a sensation of butterflies in my chest or stomach:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.heart_palpitations"></span>
                    </div>
                </div>                    
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Feel like skin is crawling or itching:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.skin_itching"></span>
                    </div>
                </div>                    
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Always feeling tired:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.feels_tired"></span>
                    </div>
                </div>                    
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Difficulty concentrating:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.difficulty_concentrating"></span>
                    </div>
                </div>                    
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Poor memory:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.poor_memory"></span>
                    </div>
                </div>                    
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>More irritable than usual:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.irritable"></span>
                    </div>
                </div>                    
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>More anxious than usual:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.anxious"></span>
                    </div>
                </div>                    
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>More depressed moods:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.depressed"></span>
                    </div>
                </div>                    
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Mood swings:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.mood_swings"></span>
                    </div>
                </div>                    
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Crying spells:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.crying_spells"></span>
                    </div>
                </div>                    
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Headaches:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.headaches"></span>
                    </div>
                </div>                    
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Urinating more often than usual:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.urine_often"></span>
                    </div>
                </div>                    
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Leak urine:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.urine_leak"></span>
                    </div>
                </div>                    
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Pain or burning when urinating:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.urine_pain"></span>
                    </div>
                </div>                    
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Bladder infections:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.bladder_infections"></span>
                    </div>
                </div>                    
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Uncontrollable loss of stool or gas:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.uncontrollable_loss_stool_gas"></span>
                    </div>
                </div>                    
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Pain during intercourse:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.intercourse_pain"></span>
                    </div>
                </div>                    
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Lack of desire or interest in sexual activity:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.lack_sexual_desire"></span>
                    </div>
                </div>                    
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Difficulty achieving orgasm:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.difficulty_orgasm"></span>
                    </div>
                </div>                    
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Opportunity for sexual activity is limited:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.limited_sexual_opportunity"></span>
                    </div>
                </div>                    
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Joint pains:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.joint_pains"></span>
                    </div>
                </div>                    
            </div>

            <div slot="edit-body" class="edit-form">
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Hot flashes:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.hot_flashes"
                            :options="defaults.yesnoalittlebit"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Night Sweats:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.night_sweats"
                            :options="defaults.yesnoalittlebit"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Difficulty getting to sleep:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.difficulty_getting_sleep"
                            :options="defaults.yesnoalittlebit"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Difficulty staying asleep:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.difficulty_staying_asleep"
                            :options="defaults.yesnoalittlebit"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Heart palpitations or a sensation of butterflies in my chest or stomach:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.heart_palpitations"
                            :options="defaults.yesnoalittlebit"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Feel like skin is crawling or itching:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.skin_itching"
                            :options="defaults.yesnoalittlebit"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Always feeling tired:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.feels_tired"
                            :options="defaults.yesnoalittlebit"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Difficulty concentrating:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.difficulty_concentrating"
                            :options="defaults.yesnoalittlebit"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Poor memory:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.poor_memory"
                            :options="defaults.yesnoalittlebit"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>More irritable than usual:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.irritable"
                            :options="defaults.yesnoalittlebit"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>More anxious than usual:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.anxious"
                            :options="defaults.yesnoalittlebit"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>More depressed moods:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.depressed"
                            :options="defaults.yesnoalittlebit"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Mood swings:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.mood_swings"
                            :options="defaults.yesnoalittlebit"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Crying spells:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.crying_spells"
                            :options="defaults.yesnoalittlebit"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Headaches:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.headaches"
                            :options="defaults.yesnoalittlebit"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Urinating more often than usual:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.urine_often"
                            :options="defaults.yesnoalittlebit"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Leak urine:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.urine_leak"
                            :options="defaults.yesnoalittlebit"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Pain or burning when urinating:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.urine_pain"
                            :options="defaults.yesnoalittlebit"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Bladder infections:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.bladder_infections"
                            :options="defaults.yesnoalittlebit"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Uncontrollable loss of stool or gas:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.uncontrollable_loss_stool_gas"
                            :options="defaults.yesnoalittlebit"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Pain during intercourse:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.intercourse_pain"
                            :options="defaults.yesnoalittlebit"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Lack of desire or interest in sexual activity:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.lack_sexual_desire"
                            :options="defaults.yesnoalittlebit"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Difficulty achieving orgasm:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.difficulty_orgasm"
                            :options="defaults.yesnoalittlebit"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Opportunity for sexual activity is limited:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.limited_sexual_opportunity"
                            :options="defaults.yesnoalittlebit"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Joint pains:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.joint_pains"
                            :options="defaults.yesnoalittlebit"
                        >
                        </multi-select>
                        <!-- temporary for css only (select-default) -->
                        <select-default classes="form-control input-sm"></select-default> 
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
        // classes: String,

    },
   
    data () {
        return {
            patient: {
                hot_flashes: '',
                night_sweats:'',
                difficulty_getting_sleep: '',
                difficulty_staying_asleep: '',
                heart_palpitations: '',
                skin_itching: '',
                feels_tired: '',
                difficulty_concentrating: '',
                poor_memory: '',
                irritable: '',
                anxious: '',
                depressed: '',
                mood_swings: '',
                crying_spells: '',
                headaches: '',
                urine_often: '',
                urine_leak: '',
                urine_pain: '',
                bladder_infections: '',
                uncontrollable_loss_stool_gas: '',
                intercourse_pain: '',
                lack_sexual_desire: '',
                difficulty_orgasm: '',
                limited_sexual_opportunity: '',
                joint_pains: '',
            },
            form: {
                hot_flashes: '',
                night_sweats:'',
                difficulty_getting_sleep: '',
                difficulty_staying_asleep: '',
                heart_palpitations: '',
                skin_itching: '',
                feels_tired: '',
                difficulty_concentrating: '',
                poor_memory: '',
                irritable: '',
                anxious: '',
                depressed: '',
                mood_swings: '',
                crying_spells: '',
                headaches: '',
                urine_often: '',
                urine_leak: '',
                urine_pain: '',
                bladder_infections: '',
                uncontrollable_loss_stool_gas: '',
                intercourse_pain: '',
                lack_sexual_desire: '',
                difficulty_orgasm: '',
                limited_sexual_opportunity: '',
                joint_pains: '',
            },

           defaults: {
                yesnoalittlebit: "Yes,No,A Little Bit".split(','),
           },

        }
    },
    mounted () {
        Bus.$on('questionnaire-data', this.fill);
    },
    methods: {
        fill (data) {
            if ((typeof(data) !== 'undefined') && (data !== null)) {
                this.patient = data;
                this.form = _.clone(data);
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
      
    },
    watch: {
        
    },
}
</script>
