<style scoped>
    select {
        margin-bottom: 10px;
    }
</style>
 <template>
    <div class="allergies-form">
        <div :class="[adding ? 'panel-primary': 'panel-default', 'panel']">
            <div class="panel-heading">
                <h5>
                    Allergies
                </h5>
            </div>
            <div class="panel-body">
                <!-- No data available. -->
               <div class="allergy-wrapper">
                   <!-- <allergy-edit :data="{}"></allergy-edit> -->
                   <allergy-edit v-for="(allergy,index) in patient" 
                        :key="allergy.id" 
                        :data="allergy" 
                        :index="index" 
                        
                    >
                    </allergy-edit>
               </div>

               <div v-if="adding" class="div-add-allergy">
                    <h5 class="subtitle">Add Allergy</h5>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label col-md-3">Type</label>
                                <div class="col-md-9">
                                    <select v-model="allergy.allergy_type" 
                                        class="form-control input-sm">
                                        <option v-for="type in allergyTypes" 
                                            v-bind:value="type.value">
                                            {{ type.label }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label col-md-3 col-xs-12">
                                    Name
                                </label>
                                <div class="col-md-7 col-xs-7">
                                    <input type="text" 
                                        class="form-control input-sm" 
                                        v-model="allergy.name">
                                </div>
                                <div class="col-md-2 col-xs-5">
                                    <toggle-button :width="100" 
                                        :labels="defaults.toggle_button.labels" 
                                        :value="Boolean(allergy.active)"
                                        @change="change($event)"
                                        />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label col-md-3">
                                    Reaction
                                </label>
                                <div class="col-md-9">
                                    <input type="text" 
                                        class="form-control input-sm" 
                                        v-model="allergy.reaction">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="panel-footer">
                <div class="text-right">
                    
                    <transition name="popup">
                        <button @click="add" 
                                v-if="!adding" class="btn btn-xs btn-primary">
                            <i class="fa fa-plus"></i> <span>Add</span>
                        </button>
                    </transition>

                    <transition name="popup">
                        <button @click="save" 
                                v-if="adding" class="btn btn-xs btn-success">
                            <i class="fa fa-floppy-o"></i> <span>Save</span>
                        </button>
                    </transition>

                    <transition name="popup">
                        <button @click="cancel" 
                                v-if="adding" class="btn btn-xs btn-danger">
                            <i class="fa fa-ban"></i> <span>Cancel</span>
                        </button>
                    </transition>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AllergyEdit from './AllergyEdit.vue';
import MultiSelect from 'vue-multiselect';
import ToggleButton from 'vue-js-toggle-button';
import axios from 'axios';
import Bus from '../../Bus.js';
Vue.use(ToggleButton);
const moment = require('moment');
import VSelect from 'vue-select';

export default {
    components: {
        'allergy-edit': AllergyEdit,
        'multi-select': MultiSelect,
        'v-select': VSelect,
    },

    props: {
        data: {
            type: Object,
            required: true,
        },
    },
   
    data () {
        return {
            adding: false,
            patient: {
               
            },
            defaults: {
                yesno: "Yes,No".split(','),
                toggle_button: {
                    labels: {
                        checked: 'Active',
                        unchecked: 'Inactive',
                    },
                },

            },

            allergy: {
                allergy_type: '',
                name: '',
                reaction: '',
                notes: '',
                active: true,
            },

            allergyTypes: [
                {value: "1", label: "Specific Drug"},
                {value: "2", label: "Class of Drugs"},
                {value: "3", label: "Other Allergy"},
            ],

        }
    },
    mounted () {
        Bus.$on('allergies-data', this.fill);
    },
    methods: {
        fill (data) {
            if ((typeof(data) !== 'undefined') && (data !== null)) {
                this.patient = data;
            }
        },
        add () {
            this.adding = true; 
        },

        save () {
            let self = this;
            let url = '/profile/medical/allergy/add';
            // alert('save');
            axios.post(url, this.allergy)
                .then(res => {
                    self.success = true;
                    setTimeout(function() {
                        self.clear();
                        self.patient.unshift(res.data.allergy);
                    }, 3000);
                });
        },
        clear() {
            this.adding = false;
            this.allergy.allergy_type = '';
            this.allergy.name= '';
            this.allergy.reaction = '';
            this.allergy.notes = '';
            this.allergy.active = 1;
            this.success = false;
        },

        cancel () {
            this.adding = false; 
        },

        change (data) {
            this.allergy.active = data.value;
        },

    },
    computed: {
      
    },
    watch: {
        
    },
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>