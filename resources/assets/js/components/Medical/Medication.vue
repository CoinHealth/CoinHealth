 <template>
    <div class="medications-form">
        <editable-panel :data="form" v-cloak  model="medications" @save:medications="">
            <span slot="panel-header">Medication History</span>
            <div slot="view-body" class="view-form">
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Dose:</label>
                    </div>
                    <div class="col-md-9">
                        123cm
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Frequency:</label>
                    </div>
                    <div class="col-md-9">
                        70lbs
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Date started:</label>
                    </div>
                    <div class="col-md-9">
                        c
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Date stopped:</label>
                    </div>
                    <div class="col-md-9">
                        20
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Why stopped:</label>
                    </div>
                    <div class="col-md-9">
                        20
                    </div>
                </div>
            </div>

            <div slot="edit-body" class="edit-form">
                <p>Please indicate the medications and supplements (such as vitamins, calcium, herbs, soy) you are currently using. Include prescription drugs and those purchased without a prescription. Medication / Supplement:</p>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Dose:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Frequency:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Date started:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Date stopped:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3 label-col">
                        <label>Why stopped:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control">
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
               
            },
            form: {
               
            },

           defaults: {
                yesno: "Yes,No".split(','),
           },

        }
    },
    mounted () {
        Bus.$on('medications-data', this.fill);
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
