<style scoped>
    select {
        margin-bottom: 10px;
    }
</style>
 <template>
    <div class="surgery-form">
        <editable-panel :data="form" v-cloak  model="surgeries" @save:surgeries="save($event, 'surgeries')">
            <span slot="panel-header">Surgery</span>
            
            <div slot="view-body" class="view-form">
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Had a surgery:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.had_surgery"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Reason for having surgery:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.problem"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Type of surgery:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.type"></span>
                    </div>
                </div>
            </div>

            <div slot="edit-body" class="edit-form">
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Have you had any surgeries done? (If yes, what type of surgery?)</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.had_surgery"
                            :options="defaults.yesno"
                        >
                        </multi-select>
                        <input type="text" v-show="showText" placeholder="Reason for having surgery" class="form-control input-sm" v-model="form.problem">
                        <input type="text" v-show="showText" placeholder="Type of surgery" class="form-control input-sm mt-5" v-model="form.type">
                       
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
                problem: '', 
                type: '',
                had_surgery: '',
            },
            form: {
                problem: '', 
                type: '',
                had_surgery: '',
            },

           defaults: {
                yesno: "Yes,No".split(','),
              
           },

        }
    },
    mounted () {
        Bus.$on('surgeries-data', this.fill);
    },
    methods: {
        fill (data) {
            if ((typeof(data) !== 'undefined') && (data !== null)) {
                this.patient = data;
                this.form = _.clone(data);
            }
        },
        save (data, model) {
            let self = this;
            // console.log(self.form);
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
            let val = this.form.had_surgery;
            if(val !== 'Yes') {
                this.form.problem = '';
                this.form.type = '';
            }
            return this.form.had_surgery == 'Yes';
        }
    },
    watch: {
        
    },
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
