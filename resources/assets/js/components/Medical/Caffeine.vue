 <style scoped>
    select {
        margin-bottom: 10px;
    }
</style>
 <template>
    <div class="caffeine-form">
        <editable-panel :data="form" v-cloak model="caffeine" @save:caffeine="save($event, 'caffeine')">
            <span slot="panel-header">Caffeine Use</span>
                <div slot="view-body" class="view-form">
                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Drink caffeine:</label>
                        </div>
                        <div class="col-md-9">
                            <span v-text="patient.drinking"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Servings a day:</label>
                        </div>
                        <div class="col-md-9">
                            <span v-text="patient.number_of_glasses"></span>
                        </div>
                    </div>
                </div>

                <div slot="edit-body" class="edit-form">
                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Do you consume drinks with caffeine (coffee tea, soda drinks)? (If yes, how many drinks each day?)</label>
                        </div>
                        <div class="col-md-9">
                            <multi-select
                                v-model="form.drinking"
                                :options="defaults.yesno"
                            >
                            </multi-select>
                            <input type="text" v-show="showText" placeholder="How many drinks each day?" class="form-control input-sm" v-model="form.number_of_glasses">

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
            },
            form: {
                drinking: '',
                number_of_glasses: '',
            },

           defaults: {
                yesno: "Yes,No".split(','),
           },

        }
    },
    mounted () {
        Bus.$on('caffeine-data', this.fill);
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