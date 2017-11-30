import VSelect from 'vue-select';
import axios from 'axios';
import CheckButton from './helpers/CheckButton.vue';
import EditablePanel from './helpers/EditablePanel2.vue';
import SelectDefault from './helpers/SelectDefault.vue';
import MultiSelect from './helpers/MultiSelect.vue';
import FamilyMembers from './components/FamilyMembers.vue';
import SelectDefault from './helpers/SelectDefault.vue';

import Vitals from './components/Medical/Vitals.vue';
import Problems from './components/Medical/Problems.vue';
import Allergies from './components/Medical/Allergies.vue';
import Medication from './components/Medical/Medication.vue';
import FamilyHistory from './components/Medical/FamilyHistory.vue';
import Injuries from './components/Medical/Injury.vue';
import Caffeine from './components/Medical/Caffeine.vue';
import Habits from './components/Medical/Habits.vue';
import Diet from './components/Medical/Diet.vue';
import Tobacco from './components/Medical/Tobacco.vue';
import AlcoholDrug from './components/Medical/AlcoholDrug.vue';
import Abuse from './components/Medical/Abuse.vue';
import Stress from './components/Medical/Stress.vue';
import Surgery from './components/Medical/Surgery.vue';
import Questionnaire from './components/Medical/Questionnaire.vue';
import Bus from './Bus.js';
// import MultiSelect from 'vue-multiselect';
const Medical = new Vue({
    el: '#medical',
    components: {
        'v-select': VSelect,
        'check-button': CheckButton,
        'editable-panel': EditablePanel,
        'select-default': SelectDefault,
        'multi-select': MultiSelect,
        'family-members': FamilyMembers,
        
        'vitals': Vitals,
        'problems': Problems,
        'allergies': Allergies,
        'medications': Medication,
        'family-history': FamilyHistory,
        'injuries': Injuries,
        'caffeine': Caffeine,
        'habits': Habits,
        'diet': Diet,
        'tobacco': Tobacco,
        'alcohol-drug': AlcoholDrug,
        'abuse': Abuse,
        'stress': Stress,
        'surgeries': Surgery,
        'questionnaire' : Questionnaire,
    },

    data: {
        sample: [],
        blood_type: {
            group: '',
            rh_factor: '',
          },
        patient: {
            vitals: {
              blood_type: {
                group: '',
                rh_factor: '',
              },
              blood_pressure: {
                systolic: '',
                diastolic: '',
                blood_pressure: '',
              },
              height: {
                feet: '',
                inch: '',
                height: '',
              },
              weight: '',
            },
        },
        form: {
            vitals: {},
            problems: {},
            allergies: {},
            habits: {},
            diets: {},
            tobacco: {},
            caffeine: {},
            alcohol_drugs: {},
            abuse: {},
            stress: {},
            surgeries: {},
            questionnaire: {},
        },

        defaults: {
            medical_problems: [],
            family_members_list: "Father,Mother,Brother,Sister,Grandfather,Grandmother,Uncle,Aunt".split(','),
            family_members: [
                {
                    member: 'Father',
                    age: 48,
                },
                {
                    member: 'Mother',
                    age: 58,
                },
                {
                    member: 'Sister',
                    age: 38,
                },
            ],
            exercises: "Almost daily,At least 3x/week,Occasionally,Rarely,Never".split(','),
            habits: "Excellent,Good,Fair,Poor".split(','),
            yesno: "Yes,No".split(','),
            yesnonotsure: "Yes,No,Not sure".split(','),
            yesnoalittlebit: "Yes,No,A Little Bit".split(','),
            blood_types: [],
            special_diet: "Low fat,Low carbohydrate,High protein,Vegetarian".split(','),
            dairy: "Milk,Cheese,Yogurt,Other".split(','),
            handle_stress: "Very well,Moderatel y well,Poorly".split(','),
        }
    },

    mounted () {
        // this.init();
        this.prepare();
    },

    computed: {
        // blood_pressure () {
        //     let vital = this.form.vitals[0];
        //     return `${vital.blood_pressure.systolic} / ${vital.blood_pressure.diastolic}`;
        // },
        // height () {
        //     let vital = this.form.vitals[0];
        //     console.log(vital.height);
        //     return `${vital.height.feet}'${vital.height.inch}"`;
        // },
        // weight () {
        //     let vital = this.form.vitals[0];
        //     console.log(vital.weight);
        //     return ''
        // },
    },

    methods: {
        init () {
            // this.getMedical();
            this.getMedicalProblems();
            this.getBloodTypes();
        },

        prepare () {
            let self = this;
            axios.get(`/profile/medical/api`)
                .then(response => {
                    self.form = response.data.patient;
                    // self.patient = _.clone(response.data.patient);
                    
                    let blood_type = response.data.patient.blood_type;
                    let vitals = (response.data.patient.latest_vital !== null) ? response.data.patient.latest_vital : self.patient.vitals;
                    vitals['blood_type']  = ((typeof(blood_type) == 'undefined') && blood_type == '' || blood_type == null ) ? this.blood_type : blood_type;
                    Bus.$emit('vitals-data', vitals);
                    Bus.$emit('problems-data', response.data.patient.problems);
                    Bus.$emit('allergies-data', response.data.patient.allergies);
                    Bus.$emit('injuries-data', response.data.patient.injuries);
                    Bus.$emit('medications-data', response.data.patient.medications);
                    Bus.$emit('family-history-data', response.data.patient.family_history);
                    Bus.$emit('injuries-data', response.data.patient.injuries);
                    Bus.$emit('caffeine-data', response.data.patient.caffeine);
                    Bus.$emit('habits-data', response.data.patient.habits);
                    Bus.$emit('diet-data', response.data.patient.diets);
                    let tobacco = response.data.patient.tobacco;
                    if(tobacco !== null) {
                        tobacco.used_other_tobacco = (tobacco.other_tobacco !== null) ? 'Yes' : 'No';
                        Bus.$emit('tobacco-data', tobacco);
                    }
                    Bus.$emit('alcohol-drug-data', response.data.patient.alcohol_drugs);
                    Bus.$emit('abuse-data', response.data.patient.abuse);
                    let stress = response.data.patient.stress;
                    if (stress !== null) {
                        stress.had_changes_in_family_health = (stress.changes_in_family_health !== null) ? 'Yes' : 'No'; 
                        Bus.$emit('stress-data', stress);
                    }
                    // let surgeries = response.data.patient.surgeries;
                    // if(surgeries !== null) {
                    //     surgeries.had_surgery = (surgeries !== null) ? 'Yes' : 'No';
                    //     Bus.$emit('surgeries-data', surgeries);
                    // }
                    Bus.$emit('questionnaire-data', response.data.patient.questionnaire);
                });
        },
       
        getMedicalProblems () {
            let self = this;
            axios.get('/api/categories/00017')
                .then(res => {
                    self.defaults.medical_problems = res.data.data.map((item) => {
                        return item.title;
                    });
                });
        },

        getBloodTypes () {
            let self = this;
            axios.get('/api/categories/00018')
                .then(res => {
                    self.defaults.blood_types = res.data.data.map(item => {
                        return item.title;
                    });
                })
        },

        saveVitals () {

        },

        sort () {
            // this.medical_problems.sort
        },
    }
});
