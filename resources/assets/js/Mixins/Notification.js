
import Notifications from 'vue-notification';
import Bus from '../Bus.js';
Vue.use(Notifications);

let Notification = {
	data () {
		return {
	        notifier: {
	            hasNew: false,
	            message: '',
	            title: '',
	        },
		}
	},

	methods: {
		notify (message, title) {
            this.notifier = {
                hasNew: true,
                message: message,
                title: title,
            };
        },

        notifyBroadcast(data) {
            if (!data) {
                data = {
                    message: 'New Notification recieved',
                    title: 'CareParrot'
                }
            }
            this.notify(data.message, data.title)
        }
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
                    this.notifier.message = '';
                    this.notifier.title = '';
                }, 1000);
            }
        },
	},

	computed: {
        hasNewNotification () {
            return this.notifier.hasNew;
        },
	},

    mounted () {
        Bus.$on('notification-recieved', this.notifyBroadcast);
    }
};

export default Notification;