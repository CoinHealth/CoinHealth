import vSelect from 'vue-select';
import axios from 'axios';
import moment from 'moment';
import Address from './helpers/Address.vue';
import Signature from './helpers/Signature.vue';
import Clinic from './components/Dashboard/Clinic.vue';
import NotificationMixin from './Mixins/Notification.js';
import Activity from './components/Activities/Activity.vue';
import Bus from './Bus.js';
const dashboard = new Vue({
    el: '#dashboard',
    mixins: [NotificationMixin],

    components: {
        'v-select': vSelect,
        'clinic': Clinic,
        'signature': Signature,
        'activity': Activity,
    },
    data: {
        editMode: false,
        agent: null,
        providers: {
            user: null,
            providers: null,
        },
        signature: '',
        patient: {
            'ssn': '',
            'gender': '',
            'marital_status' : '',
            'race': '',
            'dob': '',
            'contact_home': '',
            'contact_work': '',
            'contact_cell': '',
            'current_address': {
                'street_1':'',
                'city':'',
                'state':'',
                'zip':'',
            },
            'billing_address': {
                'street_1':'',
                'city':'',
                'state':'',
                'zip':'',
            },
            'email' : '',
            'preferred_communication': '',
            'employer': '',
            'spouse_name': '',
            'spouse_dob': '',
            'responsible_party': '',
            'parent_status': '',
            'referring_physician': '',
            'primary_care_physician': '',
            'pharmacy': '',
            'emergency_contact_person': '',
            'emergency_contact_relation': '',
            'emergency_contact_no': '',
        },
        defaults: {
            marital_status: 'Single,Married,Widowed,Separated,Divorced'.split(','),
            races: [
                'White American',
                'European American',
                'Middle Eastern American',
                'Native American or Alaska Native',
                'Native Hawaiians or Pacific Islander',
                'Latin American Ethnicity',
                'Asian',
            ],
            relations: 'Spouse,Parent,Sibling,Partner,Friend,Associate'.split(','),
            communications: 'Home Phone,Cell Phone,Work Number'.split(','),
            responsible_parties: 'Self,Spouse,Parent,Other'.split(','),
            parent_status: 'Married,Divorced,Custodial'.split(','),
            states: [],
        },
        signature: '',
        seeAll: false,
        specializations: [],
        userType: 'patient',
        url: '/profile'
    },
    methods: {

        getUrl () {
            let base = this.url;
            if (Laravel.userRole == 1)
                this.url = `${base}/patient-info`;
            else if (Laravel.userRole == 2 || Laravel.userRole == 4)
                this.url = `${base}/provider-info`;
            else if (Laravel.userRole == 3)
                this.url = `${base}/agent-info`;
        },

        getRole () {
            if (Laravel.userRole == 1)
                this.userType = `patient`;
            else if (Laravel.userRole == 2 || Laravel.userRole == 4)
                this.userType = `providers`;
            else if (Laravel.userRole == 3)
                this.userType = `agent`;
        },

        save () {
            let vm = this;
            axios.post(vm.url, {
                'data' : vm[vm.userType],
            }).then( (response) => {
                location.reload();
            });
        },

        saveSignature ($e,data) {
            let self = this;
            let btn = $e.target;
            let formData = new FormData();
            btn.disabled = true;
            formData.append('signature', data);
            axios.post('/profile/signature', formData)
                .then(res => {
                    btn.disabled = false;
                    if (res.data.success) {
                        self.notify('Signature Saved!', 'CareParrot');
                        location.reload();
                    }
                });
        },

        saveClinic (clinic) {
            console.log(clinic);
            axios.patch(`/profile/provider`, clinic)
                .then(res => {
                    location.reload();
                });
        },

        deleteClinic (clinic) {
            console.log(clinic);
            axios.delete(`/profile/`);
        },

        prefill () {
            var vm = this;
            axios.get(vm.url)
                .then(({data}) => {
                    if (vm.userType != 'providers') {
                        vm[vm.userType] = data.user[vm.userType];
                    }
                    else {
                        vm.providers = data;
                    }
                    vm.signature = data.user.signature;
                });
        },

        getSpecialties () {
            let vm = this;
            axios.get('/api/specializations')
                .then( ({body}) => {
                    vm.specializations = body
                });
        },
        toggleSeeMore () {
            this.seeAll = !this.seeAll;
        },

        getStates () {
            let self = this;
            axios.get('/api/locations/state')
                .then( (body) => {
                    self.defaults.states = body.data.data.map((item) => {
                        return item.pretty_name;
                    });
                });
        },
        textFormat() {
          $('.numberOnly').on('keypress', function(e){
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && (e.which != 46 && e.which >31)) {
              return false;
            }
          });
        },
    },

    filters: {
        birthday (value) {
            if (!value) return '';
            return moment(value).format('LL');
        },
    },

    computed: {
        // specializations () {
        //     if (this.providers.length)
        //         return this.providers.providers[0].specializations.join(',')
        //     return null;
        // },

        seemore () {
            return !this.seeAll ? 'See more' : 'See less';
        }
    },

    mounted () {
        this.getUrl();
        this.getRole();
        this.prefill();
        this.getSpecialties();
        this.getStates();
        this.textFormat();
    },

});
