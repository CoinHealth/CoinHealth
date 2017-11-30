import axios from 'axios';
import SigBuilder from './helpers/SigBuilder.vue';
import MultiSelect from 'vue-multiselect';
import Algolia from './Mixins/Algolia.js';
import VTextArea from './helpers/Textarea.vue';
import Datepicker from 'vuejs-datepicker';

import ToggleButton from 'vue-js-toggle-button';
Vue.use(ToggleButton);
const Erx = new Vue({
	el: '#patient_erx',

	mixins: [Algolia],
	
	components: {
		'multi-select': MultiSelect,
		'sig-builder': SigBuilder,
		'v-textarea': VTextArea,
		'date-picker': Datepicker
	},

	data: {
        patient_id: $('#patient_id').val(),
		medications: [],
		loading: false,
		isPicking: false,
		form: {
			medication_id: '',
			medication_name: '',
			sig: '',
			pharmacy_note: '',
			dispense:  '',
			refills: '',
			indication: '',
			daw: false,
			prn: false,
			internal_notes: '',
			start_date: new Date(),
            end_date: new Date(),
		},

		patientMedication: [],
	},

	mounted () {
		this.initAlgolia();
		this.getPatientMedication();
	},

	computed: {
		pickingText () {
			return this.isPicking ? 'Cancel' : 'Pick Medication'
		},
		pickingCss () {
			return this.isPicking ? 'active' : ''
		},

		canSend () {
			let form = this.form;
			return form.medication_name && form.sig;
		},
	},

	methods: {
		picked (medication) {
			this.form = medication;
			this.medication_name = medication.generic_name
			// this.isPicking = false;
		},

		setMedication (medication) {
			this.form.medication_id = medication.id
			this.form.medication_name = medication.generic_name
		},

		getPatientMedication () {
			let self = this;
            axios.get(`/profile/patients/medications/api/${this.patient_id}`)
                .then((response) => {
                	let medications = response.data.medications;
                    self.patientMedication = medications.filter((medication) => {
                    	return medication.active;
                    });
                    self.pageStarted = true;
                });
		},

		getMedicationsName (val) {
            let self = this;
            this.loading = true;
            let param = {
                query: val,
                hitsPerPage: 20,
            };
            this.algolia.index.search(param, (err, hits) => {
                if (err)
                    return;
                self.medications = hits.hits;
                self.loading = false;
            });
        },

        toggleDaw ({value}) {
        	this.form.daw = value
        },

        togglePrn ({value}) {
        	this.form.prn = value
        },

        preview () {
        	let baseUrl = `/profile/patients/erx/${this.patient_id}/preview`;
        	let params = $.param(this.form);
        	window.open(`${baseUrl}?${params}`, '_blank');

        },

        send () {
        	axios.post(`/profile/patients/erx/${this.patient_id}`, this.form)
        		.then(res => {
        			console.log(res);
        		})
        }

	},
});