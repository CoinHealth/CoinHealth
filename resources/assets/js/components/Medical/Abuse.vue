<style scoped>
    select {
        margin-bottom: 10px;
    }
</style>
 <template>
    <div class="abuse-form">
        <editable-panel :data="form" v-cloak  model="abuse" @save:abuse="save($event, 'abuse')">
            <span slot="panel-header">Abuse</span>

            <div slot="view-body" class="view-form">
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Physically hurt by someone:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.physically_abused"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Forced to have sexual activities:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.sexually_abused"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Verbally or emotionally abused by someone:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.verbally_abused"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Abuse counselling:</label>
                    </div>
                    <div class="col-md-9">
                        <span v-text="patient.had_abuse_counseling"></span>
                    </div>
                </div>
            </div>

            <div slot="edit-body" class="edit-form">
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Within the last year, have you been hit, slapped, kicked or physically hurt by someone?</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.physically_abused"
                            :options="defaults.yesno"
                        >
                        </multi-select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Within the last year, has anyone ever forced you to have sexual activities?</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.sexually_abused"
                            :options="defaults.yesno"
                        >
                        </multi-select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Do you feel you are verbally or emotionally abused by someone?</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.verbally_abused"
                            :options="defaults.yesno"
                        >
                        </multi-select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Have you had counseling for these issues?</label>
                    </div>
                    <div class="col-md-9">
                        <multi-select
                            v-model="form.had_abuse_counseling"
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
                physically_abused: '',
                sexually_abused: '',
                verbally_abused: '',
                had_abuse_counseling: '',
            },
            form: {
                physically_abused: '',
                sexually_abused: '',
                verbally_abused: '',
                had_abuse_counseling: '',
            },

           defaults: {
                yesno: "Yes,No".split(','),
           },

        }
    },
    mounted () {
        Bus.$on('abuse-data', this.fill);
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

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
