import Notifications from 'vue-notification';
import moment from 'moment';
import axios from 'axios';
Vue.use(Notifications);
const InsuranceForm = new Vue({
    el: '#coverage-form',
    data: {
        notifier: {
            hasNew: false,
            message: '',
            title: '',
        },
        form: {
            insurance: {
                name: '',
                first_name: '',
                last_name: '',
                id: '',
                contact: '',
            },
            careparrot: {
                first_name: '',
                last_name: '',
                dob: moment().format('YYYY-MM-DD'),
                email: '',
                gender: '',
            },
        },
        step: 1,
    },
    mounted () {

    },
    methods: {
        finish (e) {
            let self = this;
            let button = e.target;
            let data = this.form;
            button.disabled = true;
            axios.post('/profile/coverage/form', data)
                .then(res => {
                    if (res.data.success) {
                        self.notify('Coverage successfully saved','Coverage');
                        setTimeout(() => {
                            window.location.replace("/profile/coverage");
                        }, 2000);
                    }
                    button.disabled = false;
                })
        },

        notify (message, title) {
            this.notifier = {
                hasNew: true,
                message: message,
                title: title,
            };
        },
    },
    watch: {
        insurance () {
            this.step = 2;
        },
        hasNewNotification (val) {
            if (val) {
                this.$notify({
                    title: this.notifier.title,
                    text: this.notifier.message,
                    position: 'left bottom',
                    speed: 200,
                    duration: 5000,
                });
                setTimeout(() => {
                    this.notifier.hasNew = false;
                }, 1000);
            }
        }
    },
    computed: {
        hasNewNotification () {
            return this.notifier.hasNew;
        },
        insurance () {
            return this.form.insurance.name;
        },
        title () {
            let step = this.step;
            let text = 'Enter Manually';
            if (step < 3) {
                text = 'Enter Manually';
            }
            else if (step == 3 || step == 4) {
                text = 'CareParrot Digital ID';
            }
            else {
                text = '';
            }
            return text;
        },
    },
});
