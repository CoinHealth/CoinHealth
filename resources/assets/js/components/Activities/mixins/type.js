import moment from 'moment';
let mixin = {
	props: {
		activity: {
			type: Object,
			required: true,
		},
	},

	computed: {
		timestamp () {
    		return moment(this.activity.created_at)
    			.format('h:mma MMMM D,YYYY')
    	}
	},
};
export default mixin;