<style scoped>
    select {
        margin-bottom: 10px;
    }
</style>
 <template>
    <div class="injuries-form">
        <div :class="[adding ? 'panel-primary': 'panel-default', 'panel']">
            <div class="panel-heading">
                <h5>
                    Major illness and injury history
                </h5>
            </div>
            <div class="panel-body">
                <!-- No data available. -->
               <div class="injury-wrapper">
                   <injury-edit v-for="(injury,index) in patient" 
                        :data="injury" 
                        :key="injury.id" 
                        :index="index" 
                    >
                    </injury-edit>
               </div>

               <div v-if="adding" class="div-add-allergy">
                    <h5 class="subtitle">Add Injury</h5>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label col-md-3">
                                    Reason for Medical Procedure:
                                </label>
                                <div class="col-md-9">
                                    <input type="text" 
                                        class="form-control input-sm" 
                                        v-model="injury.major_injuries">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label col-md-3">
                                    Operation: 
                                </label>
                                <div class="col-md-9">
                                    <input type="text" 
                                        class="form-control input-sm" 
                                        v-model="injury.operation">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label col-md-3">
                                    When:
                                </label>
                                <div class="col-md-9">
                                    <input type="date" 
                                        class="form-control input-sm" 
                                        v-model="injury.date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label col-md-3">
                                    Where:
                                </label>
                                <div class="col-md-9">
                                    <input type="text" 
                                        class="form-control input-sm" 
                                        v-model="injury.hospitalizations">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label col-md-3">
                                    Performed By: 
                                </label>
                                <div class="col-md-9">
                                    <input type="text" 
                                        class="form-control input-sm" 
                                        v-model="injury.illnesses">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label col-md-3">
                                    Frequency:
                                </label>
                                <div class="col-md-9">
                                    <multi-select
                                        v-model="injury.psychological_therapy"
                                        :options="defaults.frequencies"
                                    >
                                    </multi-select>
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
import InjuryEdit from './InjuryEdit.vue';
import MultiSelect from 'vue-multiselect';
import axios from 'axios';
import Bus from '../../Bus.js';
const moment = require('moment');
import VSelect from 'vue-select';

export default {
    components: {
        'injury-edit': InjuryEdit,
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
            patient: {},
            defaults: {
                frequencies: ['Once', 'Weekly', 'Monthly', 'Yearly', 'As advised by doctor'],
            },
            injury: {
                operation: '',
                hospitalizations: '',
                psychological_therapy: '',
                major_injuries: '',
                illnesses: '',
                date: '',
            },


        }
    },
    mounted () {
        Bus.$on('injuries-data', this.fill);
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
            let url = '/profile/medical/injury/add';
            // alert('save');
            axios.post(url, this.injury)
                .then(res => {
                    self.success = true;
                    setTimeout(function() {
                        self.clear();
                        self.patient.unshift(res.data.injury);
                    }, 3000);
                });
        },
        clear() {
            this.adding = false;
            this.injury.operation = '';
            this.injury.hospitalizations = '';
            this.injury.psychological_therapy = '';
            this.injury.major_injuries = '';
            this.injury.illnesses = '';
            this.injury.date = '';
            this.success = false;
        },

        cancel () {
            this.adding = false; 
        },

    },
    computed: {
      
    },
    watch: {
        
    },
}

</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
