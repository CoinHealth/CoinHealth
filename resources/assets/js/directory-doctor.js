import algoliasearch from 'algoliasearch/lite';
import DoctorCard from './components/Directories/DoctorCard.vue';
import ModalPreview from './components/Directories/ModalPreview.vue';
import ModalSave from './components/Directories/ModalSave.vue';
import ModalPremium from './components/Directories/ModalPremium.vue';
import Bus from './Bus.js';
import Paginate from 'vuejs-paginate';
import axios from 'axios';
import MultiSelect from 'vue-multiselect'

let algoliaClient = null;
let algoliaIndex = null;
let Doctor = new Vue({

    el:'#doctor',

    components: {
        'multi-select': MultiSelect,
        'doctor-card': DoctorCard,
        'paginate': Paginate,
        'modal-preview': ModalPreview,
        'modal-save': ModalSave,
        'modal-premium': ModalPremium,
    },

    data: {
        doctors: new Array(1),
        pages: 1,
        page: 0, // zero based

        // search attribute
        searchInput: '',
        searchSpecialization: '',
        searchLocation: '',

        specializations: []
    },

    mounted () {
        this.preparePage();
    },

    computed: {
        empty () {
            return !this.pages || !this.doctors.length;
        },

        fixPage () {
            let page = (this.page + 1)
            return page >= this.pages ? 0 : this.page;
        }
    },

    methods: {
        preparePage () {
            let algoliaConfig = this.Laravel.algolia;

            this.getSpecializations();
            algoliaClient = algoliasearch(algoliaConfig.id, algoliaConfig.key);
            algoliaIndex = algoliaClient.initIndex('providers');
            this.search();
        },

        getSpecializations () {
            let self = this;
            axios.get('/api/specializations/doctor')
                .then((res) => {
                    self.specializations = res.data.sort();
                    // this.searchSpecialization = this.specializations[0].title || '';
                });
        },

        search () {
            let self = this;
            let searchSpecialization = self.searchSpecialization ? self.searchSpecialization : ''
            var query = `${self.searchInput} ${self.searchLocation} ${searchSpecialization}`;
            let param = {
                query: query,
                hitsPerPage: 21,
                page: self.page, // self.fixPage
            };

            algoliaIndex.search(param, (err, hits) => {
                if (err)
                    return;
                
                self.doctors = hits.hits;
                self.pages = hits.nbPages;

                if (!self.pageStarted)
                    self.pageStarted = true;

                if (self.pageStarted) {
                    self.page = hits.page;
                    self.$refs.pagination.selected = hits.page;

                    if (self.page >= self.pages && self.pages) {
                        console.log('lampasss');
                        
                        self.page = 0;
                    }
                }
            });
            
        },

        changePage (page) {
            this.page = (page - 1);
            this.search();
        },

        success (data) {
            setTimeout(() => {
                Bus.$emit('modal-close');
            }, 2000);
        },

        offerSubscription () {

        },

        clear () {
            this.searchInput = '';
            this.searchSpecialization = '';
            this.searchLocation = '';
            this.search();
            this.page = 0;
        },
    }

});
