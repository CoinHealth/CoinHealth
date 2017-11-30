import AddPatient from './components/Patients/AddPatient.vue';
import PatientList from './components/Patients/List.vue';
import NewAppointment from './components/Patients/NewAppointment.vue';

const patient = new Vue({
    components: {
        modalAddPatient: AddPatient,
        modalNewAppointment: NewAppointment,
        patientList: PatientList,
    },

    el: '#patient',

    data: {
        patients: [],
    },

    mounted () {
        this.getPatients();
    },

    methods: {
        getPatients () {
            let vm = this;
            this.$http.get('/profile/patients/api/list')
                .then((response) => {
                    vm.patients = response.body.data;
                });
        },

        closeOther () {
            this.$children.forEach((item) => {
                item.opened = false;
            });
        },

        patientAdded (data) {
            console.log(data);
            this.patients.unshift(data);
            // this.sort(this.patients);
        }


    },
});
