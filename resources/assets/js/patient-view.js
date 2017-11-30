import Vital from './components/Vitals/Vital.vue';
import axios from 'axios';
import PermissionRequest from './components/Permissions/Request.vue';
import NotificationMixin from './Mixins/Notification.js';

const PatientAllergy = new Vue({

    el: '#patient_view',

    mixins: [NotificationMixin],

    components: {
        'modal-vitals': Vital,
        'permission-request': PermissionRequest
    },
    data: {
        patient: {
            vitals: [],
        },
        patient_id: $('#patient_id').val(),
        open_vital: false,
        url: '/profile',
        userType: 'patient',
        providerInfo: null,
        patientInfo: null,

    },
    mounted () {
        this.getUrl();
        this.getRole();
        this.getUserInfo();
        // this.getPatientInfo();
        // this.openVitals();
    },

    methods: {
        getUrl() {
            let base = this.url;
            if (Laravel.userRole == 1)
                this.url = `${base}/patient-info`;
            else if (Laravel.userRole == 2 || Laravel.userRole == 4)
                this.url = `${base}/provider-info`;
            else if (Laravel.userRole == 3)
                this.url = `${base}/agent-info`;
        },

        // getPatientInfo () {
        //     let self = this;
        //     axios.get(`/profile/patients/api/get/${this.patient_id}`)
        //         .then(({data}) => {
        //             self.patientInfo = data;
        //         });
        // },

        getRole() {
            if (Laravel.userRole == 1)
                this.userType = `patient`;
            else if (Laravel.userRole == 2 || Laravel.userRole == 4)
                this.userType = `providers`;
            else if (Laravel.userRole == 3)
                this.userType = `agent`;
        },

        openVitals () {
            $('#modal-vitals').modal('show');
        },

        getUserInfo () {
            var vm = this;
            axios.get(vm.url)
                .then(({data}) => {
                    vm.providerInfo = data.user;
                });
        },

        openPermission () {
            $('#permissionModal').modal('show');
        },

        back() {
            window.history.back();
        },

        urlify (path = '') {
            path = path ? `${path}` : path;
            let base = '/profile/patients/';
            let newPath = `${base}${path}`;
            return `${newPath}/${this.patient_id}`;
        }
    },

});
