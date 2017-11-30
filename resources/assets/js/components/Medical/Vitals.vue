 <template>
   <div class="vital-form">
        <editable-panel id="vitals" :data="form" model="vitals" @save:vitals="save($event, 'vitals')">
            <span slot="panel-header">Vitals</span>
            <div slot="view-body" class="view-form">
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Height:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="height"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Weight:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="weight"></span> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Blood Type:</label>
                    </div>
                    <div class="col-md-9">
                        <p v-text="blood_type"></p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Blood Pressure:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="blood_pressure"></span>
                    </div>
                </div>
            </div>

            <div slot="edit-body" class="edit-form">
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Height:</label>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select v-model="form.height.feet" class="form-control"  aria-describedby="aria-feet">
                                        <option v-for="n in 8">{{ n }}</option>
                                    </select>
                                    <span class="input-group-addon" id="aria-feet">feet</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select v-model="form.height.inch" class="form-control"  aria-describedby="aria-inch">
                                        <option v-for="n in 12">{{ n-1 }}</option>
                                    </select>
                                    <span class="input-group-addon" id="aria-inch">inch</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Weight:</label>
                    </div>
                    <div class="col-md-9">
                        <div class="input-group">
                            <input type="number" class="form-control input-sm" v-model="form.weight.lbs" aria-describedby="aria-pounds">
                          <span class="input-group-addon" id="aria-pounds">lbs</span>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Blood Type:</label>
                    </div>
                    <div class="col-md-9">
                      <!--   <multi-select placeholder="Select Blood Type"
                            v-model="form.blood_type"
                            :close-on-select="true"
                            :hide-selected="false"
                            :options="defaults.blood_types">
                        </multi-select> -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select v-model="form.blood_type.group" class="form-control"  aria-describedby="aria-group">
                                        <option v-for="group in defaults.blood_types.groups">{{ group }}</option>
                                    </select>
                                    <span class="input-group-addon" id="aria-group">group</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select v-model="form.blood_type.rh_factor" class="form-control"  aria-describedby="aria-rh">
                                        <option v-for="rh in defaults.blood_types.rh_factors">{{ rh }}</option>
                                    </select>
                                    <span class="input-group-addon" id="aria-rh">Rh</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Blood Pressure:</label>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="number" v-model="form.blood_pressure.systolic" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <input type="number" v-model="form.blood_pressure.diastolic" class="form-control">
                            </div>
                        </div>
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
              blood_type: {
                group: '',
                rh_factor: '',
              },
              blood_pressure: {
                systolic: '',
                diastolic: '',
                blood_pressure: '',
              },
              height: {
                feet: '',
                inch: '',
                height: '',
              },
              weight: {
                lbs: '',
              },
            },
            form: {
              blood_type: {
                group: '',
                rh_factor: '',
              },
              blood_pressure: {
                systolic: '',
                diastolic: ''
              },
              height: {
                feet: '',
                inch: '',
              },
              weight: '',
            },

           defaults: {
                blood_types: {
                    groups: "A,B,AB,O,Not Sure".split(','),
                    rh_factors: "+,-,Not Sure".split(','),
                }
           },

        }
    },
    mounted () {
        this.init();
        Bus.$on('vitals-data', this.fill);
    },
    methods: {
        init() {
            // this.getBloodTypes();
        },

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

        },

        getBloodTypes () {
            let self = this;
            axios.get('/api/categories/00018')
                .then(res => {
                    self.defaults.blood_types = res.data.data.map(item => {
                        return item.title;
                    });
                })
        },
    },
    computed: {
        height () {
            let feet = this.patient.height.feet;
            let inch = this.patient.height.inch;

            if (feet !== '' && inch !== '') {
                return feet + "' " + inch + '" ';
            }
            return '';
        },

        blood_type () {
            let blood_group = this.patient.blood_type.group;
            let blood_rh = this.patient.blood_type.rh_factor;

            if (blood_group !== '' && blood_rh !== '') {
                return blood_group + " " + blood_rh;
            }
            return '';
        },

        blood_pressure () {
            let systolic = this.patient.blood_pressure.systolic;
            let diastolic = this.patient.blood_pressure.diastolic;

            if (systolic !== '' && diastolic !== '') {
                return systolic + " / " + diastolic;
            }
            return '';
        },

        weight () {
            let weight = this.patient.weight.lbs;
            if (weight !== '') {
                return weight + ' lbs.';
            }
            return '';
        },
    },
    watch: {
      
    },
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
