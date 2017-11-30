import Address from './helpers/Address.vue';
import EditablePanel from './helpers/EditablePanel.vue';
import VueTextArea from './helpers/Textarea.vue';
import axios from 'axios';
import moment from 'moment';
import Bus from './Bus.js';
const patientInformation = new Vue({

    components: {
        'editable-panel': EditablePanel,
        'v-address': Address,
        'v-textarea': VueTextArea,
    },

    el: '#patient_information',

    data: {

        data: {
            backgroundData: {
                name: {
                    first_name: '',
                    middle_name: '',
                    last_name: ''
                },

                gender: '',
                marital_status: '',
                dob: '',
                current_address: {
                    state: '',
                    zip: '',
                    city: '',
                    street_1: '',
                    street_2: '',
                },
                billing_address: {
                    state: '',
                    zip: '',
                    city: '',
                    street_1: '',
                    street_2: '',
                },
                social_security_no: '',
                language: [],
                ethnicity: '',
                race: '',
            },
            contactInfo: {
                contact_home: '',
                contact_cell: '',
                contact_work: '',
                email: '',
                emergency_contact_person: '',
                emergency_contact_no: '',
                emergency_contact_relation: '',
                patient_notes: '',
            },
            insurances: [],

        },
        patient_id: $('#patient_id').val(),


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
        },
    },

    mounted () {
        this.prepare();
    },

    filters: {
        addressify (value) {
            if(value instanceof Object) {
                return `${!value.street_1 ?'': value.street_1} ${!value.street_2?'':value.street_2} ${!value.city?'':value.city} ${!value.state?'':value.state} ${!value.zip?'':value.zip}`;
            }
            else {
                return '';
            }
        },

    },

    computed: {
        name () {
            let name = this.data.backgroundData.name;
            return `${name.first_name} ${name.middle_name} ${name.last_name}`;
        },
        lang () {
            return this.data.backgroundData.language ? this.data.backgroundData.language.join(', ') : '';
        },
        dob () {
            return moment(this.data.backgroundData.dob).format('MMM DD, YYYY');
        },
    },

    methods: {
        prepare () {
            let self = this;
            axios.get(`/profile/patients/informations/api/${this.patient_id}`)
                .then((response) => {
                    self.map(response.data.data);
                });
        },

        map (data) {
            let insurances = null,
                backgroundData = {},
                contactInfo = {};

            insurances = data.insurances;
            _.forIn(this.data.contactInfo, (value, key) => {
                if (data.hasOwnProperty(key)) {
                    contactInfo[key] = data[key];
                }
            });
            _.forIn(this.data.backgroundData, (key, value) => {
                if (key instanceof Object) {
                    if (key instanceof Array)
                        backgroundData[value] = data[value];

                    else {

                        _.forIn(key, (kkey, vvalue) => {
                            if (!backgroundData[value])
                                backgroundData[value] = {};

                            if (data[value] instanceof Object) {
                                backgroundData[value][vvalue] = data[value][vvalue];
                            }
                            else {
                                backgroundData[value][vvalue] = data[vvalue];
                            }
                        });
                    }
                }
                else {
                    backgroundData[value] = data[value];
                }
            });
            this.data.insurances = insurances;
            this.data.contactInfo = contactInfo;
            this.data.backgroundData = backgroundData;
        },

        updateBillingAddress(data) {
            this.backgroundData.billing_address = data;
        },
        updateCurrentAddress(data) {
            this.backgroundData.current_address = data;
        },

        saveBackgroundData (data, model) {
            let name = data.name;
            data['first_name'] = name.first_name;
            data['last_name'] = name.last_name;
            data['middle_name'] = name.middle_name;
            this.save(data, model);
        },

        save (data, model) {
            axios.post(`/profile/patients/informations/api/${this.patient_id}`, data)
                .then(response => {
                    if (response.data.success) {
                        Bus.$emit(`form-saved:${model}`);
                    }
                })
                .catch(response => {
                    console.error(response);
                });
        }
    },
});
