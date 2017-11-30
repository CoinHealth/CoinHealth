var eventHub = new Vue();

var triageApp = new Vue({
    el: '#triage',
    data: {
        searchInput: typeof input == 'undefined' ? '':input,
        isDirect: typeof input == 'undefined' || !input,
        searchCategory: typeof category == 'undefined' ? 'Select Category':category,
        algoliaClient: null,
        algoliaIndex: null,
        suggestion: null,
        // get current location via IP
        location: null,

        data: [],
        sortedData: [],
        currentIndex: '',
        nextIndex: '',

        current: '',
        dataSymptoms: [],
        dataConditions: [],
        dataMedications: [],
        paginatedData: [],
        dataDoctor: null,
        dataFacility: null,
        dataMedication: null,
        dataCondition: null,
        dataSymptom: null,

        doctorChecked: [],
        facilityChecked: [],

        // infinite scroll
        busy: false,
        // Pagination
        page: 0,
        endOfData: false,
        pages: 0,
    },

    mounted: function() {
        console.log(alid);
        this.algoliaClient = algoliasearch(alid, alkey);
        this.setCurrentIndex();
        this.setIndex(this.currentIndex);
        this.input();
        var self = this;
        $.get('https://timezoneapi.io/api/ip', function(response) {
            self.location = response.data;
        });
    },
    methods: {

        bookmark: function(url, id, target) {
            var self = this;

            var start = function() {
                $.post('/api/bookmark/'+url, {
                    _token: csrf_token,
                    id: id,
                })
                .done(done)
                .fail(fail);
            },
            done = function(data) {
                if (data.success == 'OK') {
                    $(target).text('SAVED TO YOUR PROFILE!');
                }
            },
            fail = function(response) {
                if (response.status == 401) {
                    $('.modal:not(#modal-authenticate)').modal('hide');
                    $('#modal-authenticate').modal('show');
                    // window.location = '/auth/login?continue=/triage?category='+self.searchCategory+'&input='+self.searchInput;
                }
            };

            start();
        },

        titleCase: function(text) {
            return text.replace(/_/g, ' ');
        },

        search: function(input,hitsPerPage = 100, isPaginated=false, fromList = false, letter = '') {
            // using algoliasearch for fast searching
            var _this = this;
            this.algoliaIndex.search({
                query: input,
                hitsPerPage: hitsPerPage,
                page: this.page,
            }, function(err, hits) {
                if (err)
                    return false;
                _this.pages = hits.nbPages;
                if (!isPaginated) {
                    _this.data = hits.hits;
                    _this.load(fromList, letter);
                }
                else {
                    _this.paginatedData = hits.hits;
                }
                _this.busy = false;
            });
        },

        loadMore: function() {
            var self = this;
            if (self.page < self.pages) {
                self.busy = true;
                self.page++;
                self.search(self.searchInput, 100, true);

                if (self.paginatedData.length) {
                    self.addToChunk(self[self.current],self.paginatedData, self.current == 'dataMedications' ? 'generic_name' : 'name');
                }

                if ( (self.page+1) === self.pages ) {
                    self.endOfData = true;
                }

                self.busy = false;
            }
        },

        load: function(fromList = false, letter = '') {
            if (this.searchCategory == 'Condition') {
                this.current = 'dataConditions';
                this.dataConditions = this.chunkAlphabetically(this.data,'name',fromList, letter);
            }
            else if (this.searchCategory == 'Symptom') {
                this.current = 'dataSymptoms';
                this.dataSymptoms = this.chunkAlphabetically(this.data,'name',fromList, letter);
            }
            else if (this.searchCategory == 'Medication') {
                this.current = 'dataMedications';
                this.dataMedications = this.chunkAlphabetically(this.data, 'generic_name', fromList, letter);
            }
        },

        input: function() {
            if (this.isDirect)
                this.isDirect = false;
            if (this.endOfData)
                this.endOfData = false;
            this.page=0;
            this.search(this.searchInput);
        },

        clear: function() {
            this.dataSymptoms = [];
            this.dataConditions = [];
            this.dataMedications = [];
            this.dataDoctor = null;
            this.dataFacility = null;
            this.dataMedication = null;
            this.suggestion = null;
            this.page = 0;
            this.pages = 0;
            this.endOfData = false;
            // this.listData = [];
            this.searchInput = '';
            this.search(this.searchInput);
        },

        showConditions: function(obj, e) {
            this.searchInput = e.target.outerText;
            this.input();
            this.dataConditions = this.chunkAlphabetically(obj.possible_conditions);
        },

        conditionModal: function(condition) {
            this.dataCondition = condition;
            setTimeout(function() {
                $('#conditions').modal('show');
            },500);
        },

        symptomModal: function(symptom) {
            this.dataSymptom = symptom;
            setTimeout(function() {
                $('#causes').modal('show');
            },500);
        },

        doctorModal: function(doctor) {
            this.dataDoctor = doctor;
            setTimeout(function() {
                $('#doctor-single').modal('show');
            },500);
        },

        facilityModal: function(facility) {
            this.dataFacility = facility;
            setTimeout(function() {
                $('#facility-single').modal('show');
            },500);
        },

        medicationModal: function(medication) {
            this.dataMedication = medication;
            setTimeout(function() {
                $('#medications-single').modal('show');
            },500);
        },

        countDoctorChecked: function(doctor) {
            this.doctorChecked = doctor.id;
        },

        countFacilityChecked: function(facility) {
            console.log(facility);
        },

        getIndex: function(type) {

            switch (type.toLowerCase()) {
                case 'condition':
                return 'medical_conditions'
                break;
                case 'symptom':
                return 'symptoms'
                break;
                case 'medication':
                return 'medications'
                break;
                default:
                return '';
                break;
            }
        },

        setIndex: function(index) {
            this.algoliaIndex = this.algoliaClient.initIndex(index);
        },

        setCurrentIndex: function() {
            this.currentIndex = this.getIndex(this.searchCategory);
            this.setIndex(this.currentIndex);
        },

        setCategory: function(value) {
            this.searchCategory = value;
            this.setCurrentIndex();
            this.clear();
        },

        showDetails: function(obj,e) {
            this.searchInput = e.target.outerText;
            this.input();
            this.suggestion = obj;
        },

        addToChunk: function(stack, arr, sorter = 'name') {
            var letter = "A";
            arr.map(function(el, i) {
                var first = el[sorter].charAt(0).toUpperCase();

                if (letter != first) {
                    letter = first;
                }
                stack.forEach(function(obj) {
                    if (obj.letter == letter) {
                        obj.data.push(el);
                    }
                });
            });
            return arr;
        },

        scrollToItem: function(el) {
            var hash = el.hash,
                letter = hash.substr(1);

            this.search(letter, 100, false, true, letter);
        },

        chunkAlphabetically: function(arr,  sorter = 'name', fromList = false, filterLetter = '') {

            var structure = this.createArr();
            var tmp = [],
                letter = "A",
                _this = this;

            if (fromList) {
                arr = arr.filter(function(el) {
                    var first = el[sorter].charAt(0);
                    return first === filterLetter.toUpperCase();
                });
            }

            arr.map(function(el,i) {
                var first = el[sorter].charAt(0).toUpperCase();
                if (letter != first) {
                    letter = first;
                }
                structure.forEach(function(obj) {
                    if (obj.letter == letter) {
                        obj.data.push(el);
                    }
                });
            });
            return structure;

        },

        createArr: function() {
            var letters = [
                    "A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"
                ],
                arr = [];
            for(var l=0;l<letters.length;l++) {
                var obj = {
                    letter: letters[l],
                    data: [],
                };
                arr.push(obj);
            }
            return arr;
        },

    },
});
