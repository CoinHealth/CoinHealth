import axios from 'axios';
import Notifications from 'vue-notification';
import CareParrotCard from './components/CareParrotCard.vue';
Vue.use(Notifications);

const Coverage = new Vue({
    el: '#coverage',
    components: {
        'careparrot-card': CareParrotCard,
    },
    data: {
        coverage: {
            card_front: {
                path: '',
            }
        },

        notifier: {
            hasNew: false,
            message: '',
            title: '',
        },
    },
    mounted () {
        this.getCoverage();
    },
    methods: {

        getCoverage() {
            let self = this;
            axios.get('/profile/coverage/api')
                .then(res => {
                    self.coverage = res.data.coverage;
                });
        },

        edit () {
            window.location.replace('/profile/coverage/form');
        },

        remove () {
            let self = this;
            axios.delete('/profile/coverage')
                .then(res => {
                    if (res.data.success) {
                        self.notify('Coverage removed', 'Coverage');
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    }
                });
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
        hasNewNotification (val) {
            if (val) {
                this.$notify({
                    title: this.notifier.title,
                    text: this.notifier.message,
                });
                setTimeout(() => {
                    this.notifier.hasNew = false;
                }, 1000);
            }
        }
    },
    computed: {
        cardFront () {
            let card_front = this.coverage.card_front;
            return card_front ? card_front.path : '/images/man.png';
        },
        hasCoverage () {
            return this.coverage ? this.coverage.has_coverage : false;
        },
        hasNewNotification () {
            return this.notifier.hasNew;
        },
    }
});
