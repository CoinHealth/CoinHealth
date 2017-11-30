import Appointment from './components/Appointments/Appointment.vue';
import AppointmentModal from './components/Appointments/AppointmentModal.vue';
import EditAppointment from './components/Appointments/EditAppointment.vue';
import NewAppointment from './components/Appointments/NewAppointment.vue'
import Bus from './Bus.js';

var HashId = require('hashids');
let hasher = new HashId();

const patientAppointments = new Vue({
    components: {
        'appointment': Appointment,
        'appointment-modal': AppointmentModal,
        'new-appointment-modal': NewAppointment,
        'edit-appointment-modal': EditAppointment,
    },
    el: '#patient_appointments',

    data: {
        appointments: [],
        patient_id: $('#patient_id').val(),
        doctor: null,
        patient: null,
    },

    mounted () {
        this.getAppointments();
        this.getDoctor();
    },

    methods: {
        getAppointments () {
            let vm = this;
            vm.$http.get(`/profile/patients/api/appointments/${this.patient_id}`)
                .then(({body}) => {
                    vm.appointments = this.sort(body.appointments);
                    vm.patient = body.patient;
                });
        },

        getDoctor () {
            let vm = this;
            this.$http.get('/profile/api/doctor')
                .then(({body}) => {
                    vm.doctor = body;
                })
                .catch(response => {
                    console.error(response);
                });

        },

        removeAppointment (id) {
            this.appointments.some((item,index) => {
                if (item.id == id) {
                    this.appointments.splice(index, 1);
                    this.reSort();
                    return true;
                }
            });

        },

        editAppointment (appointment) {
            Bus.$emit('appointment-modal-show-edit', appointment);
        },

        updateAppointment (appointment) {
            appointment['patient_id'] = this.patient.id;

            this.$http.post(`/profile/patients/appointments/${this.patient_id}/edit`, appointment)
                .then(({body}) => {
                    Bus.$emit('appointment-modal-hide-edit');
                    this.appointments.push(body.appointment);
                    this.reSort();
                });

            // this.appointments.some( (item,index) => {
            //     if (item.id == appointment.id) {
            //         Vue.set(this.appointments, index, item);
            //         Bus.$emit('appointment-modal-hide-edit');
            //         this.reSort();
            //     }
            // });
        },

        sort (data) {
            return data.sort( (a,b) => {
                var key1 = new Date(a.scheduled_on);
                var key2 = new Date(b.scheduled_on);
                return key1 - key2;
            }).reverse();
        },

        reSort () {
            this.appointments = this.sort(this.appointments);
        },

        newAppointment () {
            Bus.$emit('appointment-modal-show-new');
        },

        createAppointment (appointment) {
            // appointment['provider_id'] = this.doctor.id;
            appointment['patient_id'] = this.patient.id;

            this.$http.post(`/profile/patients/appointments/${this.patient_id}`, appointment)
                .then(({body}) => {
                    Bus.$emit('appointment-modal-hide-new');
                    this.appointments.push(body.appointment);
                    this.reSort();
                });
        }
    },
});
