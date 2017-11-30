
// <input type="checkbox" class="cb" v-on:click="triggerFacilityCheck(facility)">
// <button class="pull-right btn-xs btn btn-info" @click="bookmark(facility)">
//     <i class="fa fa-bookmark"></i> Save
// </button>
Vue.component('facilitiies', {
    template: `
    <div>
        <div class="list-group-item title">
            &raquo; {{ name }}
        </div>
        <div class="list-group-item" v-for="facility in facilities">

            <a href="#" @click.prevent="triggerModalFacility(facility)">
                {{ facility.name }}
            </a>
        </div>
    </div>
    `,

    props: ['name', 'location'],

    data: function() {
        return {
            algoliaClient: null,
            algoliaIndex: null,
            facilities: [],
        };
    },

    created: function() {
        this.algoliaClient = this.$parent.algoliaClient;
        this.algoliaIndex = this.algoliaClient.initIndex('medical_facilities');
        this.getFacilities();
    },

    methods: {

        getFacilities: function() {
            this.search(this.name);
        },

        search: function(input) {
            var _this = this;
            this.algoliaIndex.search({
                query: this.name,
                hitsPerPage: 100,
            }, function(err, hits) {
                _this.setFacilities(hits.hits);
            });
        },

        sortByLocation: function(sorter, arr) {
            return arr.sort(function(a,b) {
                if ( (sorter == b.address[0].state || sorter == a.address[0].state) )
                    return 1;
                return 0;
            });
        },

        setFacilities: function(data) {
            var state = this.location ? this.location.state_code : 'SC';
            // state = 'WV';
            this.facilities = this.sortByLocation(state, data);
        },
        triggerModalFacility: function(facility) {
            this.$emit('showmodalfacility', facility);
        },
        bookmark: function(data) {
            $.post('/api/bookmark', {
                _token: $('#csrf_token').val(),
                type: 'medical_facilities',
                // id: data,
            });
        },
    },
});
// <input type="checkbox" class="cb" v-on:click="triggerDoctorCheck(doctor)">
// <button class="pull-right btn-xs btn btn-info" @click="bookmark(doctor)">
//     <i class="fa fa-bookmark"></i> Save
// </button>
Vue.component('specialists', {
    template: `
    <div>
        <div class="list-group-item title">
            &raquo; {{ name }}
        </div>
        <div class="list-group-item" v-for="doctor in doctors">

            <a href="#" @click.prevent="triggerModalDoctor(doctor)">
                {{ doctor.full_name }}
            </a>
        </div>
    </div>
    `,

    props: ['name'],

    data: function() {
        return {
            algoliaClient: null,
            algoliaIndex: null,
            selectedDoctor: null,
            doctors: [],
        };
    },

    created: function() {
        this.algoliaClient = this.$parent.algoliaClient;
        this.algoliaIndex = this.algoliaClient.initIndex('medical_doctors');
    },

    mounted: function() {
        this.getDoctors();
    },

    methods: {
        getDoctors: function() {
            this.search(this.name);
        },

        search: function(input) {
            var _this = this;
            this.algoliaIndex.search(this.name, function(err, hits) {
                _this.setDoctors(hits.hits);
            });
        },

        setDoctors: function(data) {
            this.doctors = data;
        },
        triggerModalDoctor: function(doctor) {
            this.$emit('showmodaldoctor', doctor);
        },

        bookmark: function(data) {
            this.$emit('bookmarked', data);
        },
    },
});

Vue.component('medications', {
    template: `
    <div>
        <div class="list-group-item title">
            &raquo; {{ categoryTitle }}
        </div>
        <div class="list-group-item" v-for="medication in names">
            <a href="#" class="list-group-item-heading" @click.prevent="triggerModalMedication(medication)">
                {{ medication }}
            </a>
        </div>
    </div>
    `,

    props: ['names', 'category'],

    data: function() {
        return {
            algoliaClient: null,
            algoliaIndex: null,
            medication: null,
        };
    },

    computed: {
        categoryTitle: function() {
            return this.category.replace(/_/g,' ');
        }
    },

    created: function() {
        this.algoliaClient = this.$parent.algoliaClient;
        this.algoliaIndex = this.algoliaClient.initIndex('medications');
    },

    methods: {
        // triggerMedicationCheck: function(facility) {
        //     this.$emit('doctorchecked', facility);
        // },
        search: function(input) {
            var _this = this;
            this.algoliaIndex.search({
                query: input,
                restrictSearchableAttributes: ['generic_name'],
                typoTolerance: 'strict',
            }, function(err, hits) {
                // NOTE:160 we will get only the first result because it's the only one that exactly match our query.
                _this.setMedication(hits.hits[0]);
            });
        },

        setMedication: function(medication) {
            this.medication = medication;
            this.$emit('showmodalmedication', this.medication);
        },
        triggerModalMedication: function(medication) {
            this.search(medication);
        },
    },
});
