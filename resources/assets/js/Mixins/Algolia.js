import algoliasearch from 'algoliasearch/lite';
let algoliaClient = null;
let algoliaIndex = null;

let Algolia = {
	data: {
		algolia: {
			client: null,
			index: null,
		}
	},

	methods: {
		initAlgolia () {
			this.algolia.client = algoliasearch(Laravel.algolia.id, Laravel.algolia.key);
        	this.algolia.index = this.algolia.client.initIndex('medications');
		}
	},
};

export default Algolia;