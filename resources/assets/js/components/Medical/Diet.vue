<style scoped>
    select {
        margin-bottom: 10px;
    }
</style>
 <template>
    <div class="diet-form">
        <editable-panel :data="form" v-cloak  model="diet" @save:diet="save($event, 'diet')">
            <span slot="panel-header">Diet</span>
            <div slot="view-body" class="view-form">
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Meals a day: </label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.meals"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Special Diet: </label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.special_diet"></span>
                    </div>
                </div>

                 <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Dairy products consumed(daily): </label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.dairy_products"></span>
                    </div>
                </div>

                 <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Lactose intolerant: </label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.lactose_intolerant"></span>
                    </div>
                </div>

                 <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Servings of fruits(daily): </label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.fruits"></span>
                    </div>
                </div>

                 <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Servings of soy foods(weekly): </label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.soy"></span>
                    </div>
                </div>

                 <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Servings of fish(weekly): </label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.fish"></span>
                    </div>
                </div>
            </div>

            <div slot="edit-body" class="edit-form">
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>How many meals do you consume each day?</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" v-model="form.meals">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Do you try to eat a special diet?</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.special_diet"
                            :options="defaults.special_diet"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>What dairy products do you consume each day? </label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.dairy_products"
                            :options="defaults.dairy"
                        >
                        </multi-select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Are you lactose intolerant?</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.lactose_intolerant"
                            :options="defaults.yesno"
                        >
                        </multi-select>
                       
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>How many servings of fruits do you consume each day?</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" v-model="form.fruits">
                        
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>How many servings of soy foods do you consume each week?</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" v-model="form.soy">
                       
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>How many servings of fish do you consume each week?</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" v-model="form.fish">
                        
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
                meals: '',
                special_diet: '',
                dairy_products: '',
                lactose_intolerant: '',
                fruits: '',
                soy: '',
                fish: '',
            },
            form: {
                meals: '',
                special_diet: '',
                dairy_products: '',
                lactose_intolerant: '',
                fruits: '',
                soy: '',
                fish: '',
            },

           defaults: {
                yesno: "Yes,No".split(','),
                special_diet: "Low fat,Low carbohydrate,High protein,Vegetarian".split(','),
                dairy: "Milk,Cheese,Yogurt,Other,Butter".split(','),
               
           },

        }
    },
    mounted () {
        Bus.$on('diet-data', this.fill);
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
            console.log(self.form);
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
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
