<style scoped>
    select {
        margin-bottom: 10px;
    }
</style>
 <template>
     <div class="alcohol-drug-form">
        <editable-panel :data="form" v-cloak  model="alcohol-drugs" @save:alcohol-drugs="save($event, 'alcohol-drugs')">
            <span slot="panel-header">Alcohol and Drug Use</span>
            <div slot="view-body" class="view-form">
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Drink alcohol:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.drinking"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Glasses a week:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.number_of_glasses"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Drink alcohol in the morning:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.drinks_in_morning"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Cut down drinking:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.cut_down_drinking"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Felt guilty on drinking:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.felt_guilty"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Alcoholic:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.alcoholic"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Illegal drugs:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.use_drugs"></span>
                    </div>
                </div>
            </div>

            <div slot="edit-body" class="edit-form">
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Do you drink alcohol? (If yes, how many drinks do you have each week?)</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.drinking"
                            :options="defaults.yesno"
                        >
                        </multi-select>
                        <input type="text" v-show="showGlasses" placeholder="How many drinks do you have each week?" class="form-control input-sm" v-model="form.number_of_glasses">

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Do you ever have a drink in the morning to get you going?</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.drinks_in_morning"
                            :options="defaults.yesno"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Have you ever tried to cut down on your drinking?</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.cut_down_drinking"
                            :options="defaults.yesno"
                        >
                        </multi-select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Have you ever felt guilty about the amount you drink?</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.felt_guilty"
                            :options="defaults.yesno"
                        >
                        </multi-select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Have you ever been an alcoholic?</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.alcoholic"
                            :options="defaults.yesno"
                        >
                        </multi-select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Do you use illegal drugs?</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.use_drugs"
                            :options="defaults.yesno"
                        >
                        </multi-select>
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
                drinking: '',
                number_of_glasses: '',
                drinks_in_morning: '',
                cut_down_drinking: '',
                felt_guilty: '',
                alcoholic: '',
                use_drugs: '',
            },
            form: {
                drinking: '',
                number_of_glasses: '',
                drinks_in_morning: '',
                cut_down_drinking: '',
                felt_guilty: '',
                alcoholic: '',
                use_drugs: '',
            },

           defaults: {
                yesno: "Yes,No".split(','),
           },

        }
    },
    mounted () {
        Bus.$on('alcohol-drug-data', this.fill);
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
       showGlasses () {
            let val = this.form.drinking;
            if(val !== 'Yes') {
                this.form.number_of_glasses = '';
            }
            return this.form.drinking == 'Yes';
        }
    },
    watch: {
        
    },
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
