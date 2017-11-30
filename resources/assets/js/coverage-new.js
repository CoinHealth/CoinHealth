import axios from 'axios';
import Notifications from 'vue-notification';
import moment from 'moment';
import CareParrotCard from './components/CareParrotCard.vue';
import PictureInput from 'vue-picture-input';
import NotificationMixin from './Mixins/Notification.js';
Vue.use(Notifications);

const Coverage = new Vue({
    el: '#coverage',
    components: {
        'careparrot-card': CareParrotCard,
        'picture-input': PictureInput,
    },
    mixins: [NotificationMixin],
    data: {
        form: {
            careparrot: {
                first_name: '',
                last_name: '',
                dob: '',
                email: '',
                gender: '',
            },

            insurance: {
                provider_name: '',
                policy_no: '',
                insured_name: '',
                group_no: '',
                insured_dob: '',
                relationship: '',
                email: '',
                contact: '',
                id: '',
            },

            secondary_insurance: {
                provider_name: '',
                policy_no: '',
                insured_name: '',
                group_no: '',
                insured_dob: '',
                relationship: '',
                email: '',
                contact: '',
                id: '',
            },
            careparrot_id: {
                path: '',
            },
            primary_insurance_id: {
                path: '',
            },
            secondary_insurance_id: {
                path: '',
            },
            card_front: {
                path: '',
                // NOTE: remove this
            }
        },

        coverage: {
            careparrot: {
                first_name: '',
                last_name: '',
                dob: '',
                email: '',
                gender: '',
            },

            insurance: {
                provider_name: '',
                policy_no: '',
                insured_name: '',
                group_no: '',
                insured_dob: '',
                relationship: '',
                email: '',
                contact: '',
                id: '',
            },

            secondary_insurance: {
                provider_name: '',
                policy_no: '',
                insured_name: '',
                group_no: '',
                insured_dob: '',
                relationship: '',
                email: '',
                contact: '',
                id: '',
            },
            careparrot_id: {
                path: '',
            },
            primary_insurance_id: {
                path: '',
            },
            secondary_insurance_id: {
                path: '',
            },
            card_front: { 
                path: '',
                // NOTE: remove this
            }
        },

        files: {
            careparrot_id: null,
            secondary_insurance_id: null, 
            primary_insurance_id: null,
        },
        editMode: false,
    },

    mounted () {
        this.getCoverage();
    },

    methods: {
        changeCardId () {
            console.log(this.$refs.pictureInputCard.file);
            this.files.careparrot_id = this.$refs.pictureInputCard.file;
        },

        changePrimaryInsuranceId () {
            let ref = this.$refs.pictureInputPrimaryInsurance.file;
            
            this.files.primary_insurance_id = ref;
        },

        changeSecondaryInsuranceId () {
            let ref = this.$refs.pictureInputSecondaryInsurance.file;
            
            this.files.secondary_insurance_id = ref;
        },

        getCoverage () {
            let self = this;
            axios.get('/profile/coverage/api')
                .then(res => {
                    if (res.data.coverage) {
                        let coverage = res.data.coverage;
                        self.coverage.careparrot = coverage.careparrot;
                        self.coverage.careparrot_id = coverage.careparrot_id;
                        self.coverage.primary_insurance_id = coverage.primary_insurance_card_front;
                        self.coverage.secondary_insurance_id = coverage.secondary_insurance_card_front;
                        self.coverage.careparrot['contact'] = coverage.insurance.contact | '';
                        self.coverage.careparrot['control_id'] = coverage.id  | '';
                        self.coverage.careparrot['careparrot_id'] = coverage.careparrot_id ?
                                                    coverage.careparrot_id.path :
                                                    null;
                        self.coverage.insurance = coverage.insurance;
                        self.coverage.secondary_insurance = coverage.secondary_insurance;

                        // self.form.careparrot = _.clone(coverage.careparrot);
                        // self.form.insurance = _.clone(coverage.insurance);
                        // self.form.careparrot_id = _.clone(coverage.careparrot_id);
                        // self.form.card_front = _.clone(coverage.card_front);
                        self.form = _.clone(coverage);
                        self.form.careparrot['contact'] = coverage.insurance.contact || '';
                        self.form.careparrot['control_id'] = coverage.id  | '';
                        self.form.careparrot['careparrot_id'] =
                                coverage.careparrot_id ?
                                    coverage.careparrot_id.path :
                                    null;
                        
                    }
                });
        },

        save () {
            let self = this;
            let data = self.format(self.coverage);
            axios.post('/profile/coverage', data)
                .then(res => {
                    if (res.data.success) {
                        self.notify('Coverage updated!', 'Coverage');
                        setTimeout(() => {
                            // location.reload();
                        }, 1000);
                    }
                });
        },

        format () {
            let fd = new FormData();
            _.each(this.form.careparrot, (value, key) => {
                fd.append(`careparrot[${key}]`, value);
            });
            _.each(this.form.insurance, (value, key) => {
                fd.append(`insurance[${key}]`, value);
            });
            _.each(this.form.secondary_insurance, (value, key) => {
                fd.append(`secondary_insurance[${key}]`, value);
            });

            // append images
            fd.append("careparrot_id", this.files.careparrot_id);
            fd.append("primary_insurance_card_front", this.files.primary_insurance_id);
            fd.append("secondary_insurance_card_front", this.files.secondary_insurance_id);

            return fd;
        },
    },

    watch: {
        editMode (val) {
            if (!val) {
                this.form = _.clone(this.coverage);
            }
        }
    },
    computed: {
        hasFilesForPreview () {
            return this.coverage.insurance.id.length;
        },

        //////////////////////////
        // Remove this block    //
        //////////////////////////
        insuranceCardPath () {
            if (!this.coverage.card_front)
                return;
            return this.coverage.card_front.path;
        }, 
        formInsuranceCardPath () {
            if (!this.form.card_front)
                return;
            return this.form.card_front.path;
        },
        //////////////////
        // NOTE: end remove //
        //////////////////

        // for primary insurance
        primaryInsuranceCardPath () {
            if (!this.coverage.primary_insurance_id)  
                return;
            return this.coverage.primary_insurance_id.path;
        }, 

        formPrimaryInsuranceCardPath () {
            if (!this.form.primary_insurance_id)  
                return;
            return this.form.primary_insurance_id.path;
        },

        // for secondary insurance
        secondaryInsuranceCardPath () {
            if (!this.coverage.secondary_insurance_id)
                return;

            return this.coverage.secondary_insurance_id.path;
        },

        formSecondaryInsuranceCardPath () {
            if (!this.form.secondary_insurance_id)
                return;

            return this.form.secondary_insurance_id.path;
        },


        // for careparrot card
        careparrotCardPath () {
            if (!this.coverage.card_front)
                return;
            return this.coverage.card_front.path;
        },
        formCareparrotCardPath () {
            if (!this.coverage.careparrot_id)
                return;
            return this.coverage.careparrot_id.path;
        }
    }
});
