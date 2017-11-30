import Allergy from './components/Allergies/Allergy.vue';
import AllergyAdd from './components/Allergies/Add.vue';
import axios from 'axios';
import Bus from './Bus.js';
const PatientAllergy = new Vue({
    el: '#patient_allergies',
    components: {
        'allergy': Allergy,
        'add-allergy': AllergyAdd, 
    },
    data: {
        patient: {
            allergies: [],
        },
        patient_id: $('#patient_id').val(),
        base_url: `/profile/patients/flags`,
    },
    mounted () {
        this.prepare();
    },

    methods: {
        prepare() {
            this.getAllergies();
        },

        getAllergies() {
            let self = this;
            axios.get(`/profile/patients/allergies/api/${this.patient_id}`)
            .then((res) => {
                self.patient = res.data.patient;
            });
        },

        createAllergy (data) {
            Bus.$emit('show', {
                show: data,
                patient_id: this.patient_id,
            });
        },

        addAllergy (data) {
            this.patient.allergies.unshift(data);
        },

    }
});
