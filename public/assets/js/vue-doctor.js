var EventHub = new Vue();

var doctor = new Vue({
    el: '#doctor',
    data: {
        algoliaClient: null,
        algoliaIndex: null,
        doctors: [],
        pages: 0,
        page: 0, // zero based

        // search attribute
        searchInput: '',
        searchState: '',
        searchCity: '',

    },

    mounted: function() {
        this.algoliaClient = algoliasearch(alid, alkey);
        this.algoliaIndex = this.algoliaClient.initIndex('providers');
        this.search();
    },

    methods: {
        search: function() {
            var self = this;
            var query = self.searchInput + ' ' + self.searchState +' '+self.searchCity;
            this.algoliaIndex.search({
                query: query,
                hitsPerPage: 20,
                page: self.page,
            }, function(err, hits) {
                if (err)
                    return false;
                self.doctors = hits.hits;
                self.pages = hits.nbPages;
                self.page = hits.page;
            });
        },

        changePage: function(page) {
            this.page = (page - 1);
            this.search();
        },

        clear: function() {
            this.searchInput = '';
            this.searchState = '';
            this.searchCity = '';
            this.search();
        }
    },
});
