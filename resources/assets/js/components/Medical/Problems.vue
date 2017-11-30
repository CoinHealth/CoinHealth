 <style scoped>
    select {
        margin-bottom: 10px;
    }
</style>
 <template>
    <div class="problems-form">
        <editable-panel :data="form" v-cloak model="problems" @save:problems="save($event, 'problems')">
            <span slot="panel-header">Problems</span>
            <div slot="view-body" class="view-form">
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Conditions:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-for="(item, index) in patient.problems">
                            <span>{{ item }}</span><span v-if="index < patient.problems.length - 1">,&nbsp;</span>
                        </span>
                    </div>
                </div>
            </div>

            <div slot="edit-body" class="edit-form">
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Please check if you have had problems with:</label>
                    </div>
                    <div class="col-md-9">
                        <check-button
                            @checked="checked(problem, $event)"
                            value="problem"
                            key="problem"
                            v-for="(problem, index) in defaults.medical_problems"
                            :checked="false"
                            classes="btn btn-default btn-xs"
                            active-class="btn-info">
                                <span slot="text">{{ problem }}</span>
                        </check-button>
                    </div>
                </div>
            </div>
        </editable-panel>
    </div>
</template>

<script>
import EditablePanel from '../../helpers/EditablePanel2.vue';
import SelectDefault from '../../helpers/SelectDefault.vue';
import CheckButton from '../../helpers/CheckButton.vue';
import MultiSelect from 'vue-multiselect';
import axios from 'axios';
import Bus from '../../Bus.js';
export default {
    components: {
        'editable-panel': EditablePanel,
        'select-default': SelectDefault,
        'multi-select': MultiSelect,
        'check-button': CheckButton,
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
               problems: [],
            },
            form: {
              problems: [], 
            },

           defaults: {
                yesno: "Yes,No".split(','),
                medical_problems: [],
           },

        }
    },
    mounted () {
        this.getMedicalProblems();
        Bus.$on('problems-data', this.fill);
    },
    methods: {
        fill (data) {
            if ((typeof(data) !== 'undefined') && (data !== null)) {
                this.patient.problems = data;
                // this.form = _.clone(data);
            }
        },
        getMedicalProblems () {
            let self = this;
            axios.get('/api/categories/00017')
                .then(res => {
                    self.defaults.medical_problems = res.data.data.map((item) => {
                        return item.title;
                    });
                    self.defaults.medical_problems.sort();
                });

        },
        save (data, model) {
            console.log(data);
            let self = this;
            console.log(self.form);
            axios.post(`/profile/medical/${model}`, data)
                .then(response => {
                    if (response.data.success) {
                        this.patient = _.clone(this.form);
                        this.form.problems = [];
                        Bus.$emit(`form-saved:${model}`);
                    }
                })
                .catch(response => {
                    console.error(response);
                });
        } ,

        checked (data, checked) {
            
            if(checked == true) {
                this.form.problems.push(data);
            }
            else {
                this.remove(this.form.problems, data);
            }

        },

        remove(arr) {
            var data, a = arguments, L = a.length, ax;
            while (L > 1 && arr.length) {
                data = a[--L];
                while ((ax= arr.indexOf(data)) !== -1) {
                    arr.splice(ax, 1);
                }
            }
            return arr;
        },


    },
    computed: {
      
    },
    watch: {

    },
}
</script>
