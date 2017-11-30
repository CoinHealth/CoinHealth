import Flag from './components/Flags/Flag.vue';
import FlagAdd from './components/Flags/Add.vue';
import axios from 'axios';
import Bus from './Bus.js';
const PatientFlag = new Vue({
    el: '#patient_flags',
    components: {
        'flag': Flag,
        'add-flag': FlagAdd,
    },
    data: {
        patient_id: $('#patient_id').val(),
        patient: {
            flags: []
        },
        base_url: `/profile/patients/flags`,
    },
    mounted () {
        this.prepare();
    },

    methods: {
        prepare () {
            this.getFlags();
        },
        addFlag (data) {
            Bus.$emit('show', {
                show: data,
                patient_id: this.patient_id,
            });
        },
        getFlags () {
            let self = this;
            axios.get(`${self.base_url}/api/${this.patient_id}`)
                .then((response) => {
                    self.patient = response.data.patient;
                });
        },
        save (data) {
            let self = this;
            let url = `${this.base_url}/${this.patient_id}/${data.id}/edit`
            axios.post(url, data)
                .then(res => {
                    let flag = res.data.flag;
                    self.patient.flags.some( (item,index) => {
                        if (item.id == flag.id) {
                            Vue.set(self.patient.flags, index, item);
                        }
                    });
                });
        },

        newFlag (flag) {
            console.log(flag);
            this.patient.flags.unshift(flag);
        },
    }
})
