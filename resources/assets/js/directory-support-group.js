import Paginate from 'vuejs-paginate';

let SupportGroup = new Vue({

	el: '#support',

	components: {
        'paginate': Paginate,
	},

	data: {
        page: 0,
        pages: 0,
	},

	mounted () {
		this.pageStarted = true
	},

	methods: {
		changePage () {

		}
	},

	computed: {
		empty () {
			return false;
		},
	}
});