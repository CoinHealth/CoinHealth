import Add from './components/Problem/Add.vue';
import EditList from './components/Problem/EditList.vue';

import axios from 'axios';
import moment from 'moment';
import Bus from './Bus.js';
const patientLaboratory = new Vue({

    components: {
        'add': Add,
        'edit-list': EditList,       
    },

    el: '#patient_problems',

    data: {
        addNew: false,
        patient_id: $('#patient_id').val(),
        problems: {},
    },

    mounted () {
        this.prepare();
        Bus.$on('close-aded-new', this.closeAddNew);
        Bus.$on('problem-added', this.addProblem);

    },

    filters: {

    },

    computed: {
       
    },

    methods: {
        prepare () {
            let self = this;
            axios.get(`/profile/patients/problems/api/${this.patient_id}`)
                .then((response) => {
                    self.problems = response.data;
                });
        },

        closeAddNew () {
            this.addNew = false;
        },

        addProblem (data) {
            this.problems.unshift(data);
        },

    },
});
