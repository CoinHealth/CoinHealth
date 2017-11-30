 <template>
    <div class="habits-form">
        <editable-panel :data="form" model="habits" @save:habits="save($event, 'habits')">
            <span slot="panel-header">Personal Habits</span>
            <div slot="view-body" class="view-form">
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Health Status:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.health_status"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Exercise Frequency:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.exercise_frequency"></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Exercise:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.type_of_exercise"></span>
                    </div>
                </div>
            </div>

            <div slot="edit-body" class="edit-form">
                
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Do you consider your health to be:</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.health_status"
                            :options="defaults.habits"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>How often do you exercise (If you exercise, what do you do?):</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.exercise_frequency"
                            :options="defaults.exercises"
                        >
                        </multi-select>
                        <input type="text" v-show="showText" placeholder="For how long and what kind of exercise?" class="form-control input-sm" v-model="form.type_of_exercise">
                        

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
               health_status: '',
               exercise_frequency: '',
               type_of_exercise: '',
            },
            form: {
              health_status: '',
              exercise_frequency: '',
              type_of_exercise: '',
            },

           defaults: {
                yesno: "Yes,No".split(','),
                exercises: "Almost daily,At least 3x/week,Occasionally,Rarely,Never".split(','),
                habits: "Excellent,Good,Fair,Poor".split(','),
           },

        }
    },
    mounted () {
        Bus.$on('habits-data', this.fill);
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
        showText () {
            let val = this.form.exercise_frequency;
            if(val == 'Never') {
                this.form.type_of_exercise = '';
            }
            return this.form.exercise_frequency !== 'Never';
        }
      
    },
    watch: {
        // showText () {
        //     return this.form.exercise_frequency != 'Never';
        // }
    },
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
