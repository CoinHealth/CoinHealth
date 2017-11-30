import Add from './components/Laboratory/Add.vue';
import EditList from './components/Laboratory/EditList.vue';

import axios from 'axios';
import moment from 'moment';
import Bus from './Bus.js';
const patientLaboratory = new Vue({

    components: {
        'add': Add,
        'edit-list': EditList,       
    },

    el: '#patient_laboratory',

    data: {
        addNew: false,
        patient_id: $('#patient_id').val(),
        laboratories: {},
        procedures: [],
    },

    mounted () {
        this.prepare();
        Bus.$on('close-aded-new', this.closeAddNew);
        Bus.$on('laboratory-added', this.addLaboratory);

    },

    filters: {

    },

    computed: {
       
    },

    methods: {
        prepare () {
            let self = this;
            axios.get(`/profile/patients/laboratories/api/${this.patient_id}`)
                .then((response) => {
                    self.laboratories = response.data.laboratories;
                    $.each(response.data.procedures, function (i, v) {
                        self.procedures.push(v.name);
                    });
                    Bus.$emit('lab-procedures', self.procedures);
                });
        },

        closeAddNew () {
            this.addNew = false;
        },

        addLaboratory (data) {
            this.laboratories.unshift(data);
        },

    },
});
