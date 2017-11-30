import Bus from './Bus.js';
import MedicationPanel from './components/Medications/MedicationPanel.vue';
import EditablePanel from './helpers/EditablePanel.vue';
import axios from 'axios';
import VSelect from 'vue-select';
import algoliasearch from 'algoliasearch/lite';
import VTextarea from './helpers/Textarea.vue';
import ToggleButton from 'vue-js-toggle-button';
import Datepicker from 'vuejs-datepicker';
import SigBuilder from './helpers/SigBuilder.vue';
import MultiSelect from './helpers/MultiSelect.vue'
import NotificationMixin from './Mixins/Notification.js';
Vue.use(ToggleButton);
let algoliaClient = null;
let algoliaIndex = null;

const patientMedication = new Vue({
    el: '#patient_medication',
    components: {
        // 'medication-panel': MedicationPanel,
        'editable-panel': EditablePanel,
        'v-select': VSelect,
        'multi-select': MultiSelect,
        'v-textarea': VTextarea,
        'date-picker': Datepicker,
        'sig-builder': SigBuilder,
    },
    mixins: [NotificationMixin],

    data: {
        menuNew: false,
        patient: {
            medications: [],
        },
        medications: [],
        patient_id: $('#patient_id').val(),
        defaults: {
            date: {
                start_date: new Date(),
                end_date: new Date(),
            },
            toggle_button: {
                colors: {
                    checked: '#337ab7',
                    unchecked: '#204d74',
                },
                labels: {
                    checked: 'Yes',
                    unchecked: 'No',
                },
                labelActive: {
                    checked: 'Active',
                    unchecked: 'Inactive',
                }
            }
        },
        form: {
            medication_name: '',
            sig: '',
            pharmacy_note: '',
            dispense: '',
            refills: '',
            daw: false,
            indication: '',
            start_date: new Date(),
            end_date: new Date(),
            internal_notes: '',
            prn: false,
            active: true,
        },
    },

    mounted () {
        this.prepare();
    },

    methods: {
        prepare () {
            algoliaClient = algoliasearch(Laravel.algolia.id, Laravel.algolia.key);
            algoliaIndex = algoliaClient.initIndex('medications');
            this.getMedications();
        },

        getMedications () {
            let self = this;
            axios.get(`/profile/patients/medications/api/${this.patient_id}`)
                .then((response) => {
                    self.patient = response.data;
                });
        },

        checkify(value) {
            return value ? 'fa-check-square-o' : 'fa-times';
        },

        getMedicationsName(search, loading) {
            loading(true);
            let self = this;
            let param = {
                query: search,
                hitsPerPage: 20,
            };
            algoliaIndex.search(param, (err, hits) => {
                if (err)
                    return;
                self.medications = hits.hits;
                loading(false);
            })
        },

        create ($event) {
            let self = this;
            let form = this.form;
            $event.target.disabled = true;
            form.medication_name = this.form.medication_name.generic_name;
            axios.post(`/profile/patients/medications/${this.patient_id}`, form)
                .then(res => {
                    
                    $event.target.disabled = false;
                    self.notify('Medication Added', 'CareParrot');
                    self.menuNew = false;
                    self.clear();
                    self.patient.medications.unshift(res.data.medication);
                });
        },

        save (data) {
            console.log(data)
        },

        toggleDaw ({value}) {
            this.form.daw = value;
        },

        togglePrn ({value}) {
            this.form.prn = value
        },
        toggleActive ({value}) {
            this.form.active = value;
        },

        clear () {
            this.form = {
                medication_name: '',
                sig: '',
                pharmacy_note: '',
                dispense: '',
                refills: '',
                daw: false,
                indication: '',
                start_date: new Date(),
                end_date: new Date(),
                internal_notes: '',
                prn: false,
                active: true,
            };
        }
    },
});
