import CardPicture from './components/CardPicture.vue';
import Notifications from 'vue-notification';
import axios from 'axios';
Vue.use(Notifications);
const CoverageInsurance = new Vue({
    components: {
        CardPicture,
    },
    el: '#insurance-card',
    data: {
        notifier: {
            hasNew: false,
            message: '',
            title: '',
        },
        coverage: {
            card_front: {
                path: '',
            }
        },
        cardFront: $('#cardFrontPath').val(),
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
        cardRemoved () {
            console.log('card deleted');
            this.notify('Insurance Card removed.', 'Insurance Card');
        },

        cardUploaded () {
            console.log('card uploaded');
            this.notify('Insurance Card uploaded', 'Insurance Card');
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
    }
});
