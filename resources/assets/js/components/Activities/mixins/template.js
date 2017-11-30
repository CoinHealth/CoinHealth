let template = {
	props: {
		activity: Object,
		type: String,
	},

	computed: {
		templateType () {
			let activity = this.activity;
			let type = activity.type.substr(activity.type.lastIndexOf('\\') + 1);
			return type.kebab();
		},

    	
	},
}

export default template;