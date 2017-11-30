<style scoped>
    .form-group {
        margin-bottom: 0 !important;
    }
</style>
<template>
    <div class="sig-builder">
        <div class="input-group">
            <span class="input-group-btn">
                <button ref="btnCustomize" type="button" @click="customize = !customize" class="btn btn-default">
                    <i class="text-info fa fa-pencil-square"></i> <span>{{ customizeText }}</span>
                </button>
            </span>
            <input 
                v-model="sigModel"
                @input="input"
                :disabled="customize"
                type="text" 
                class="form-control" 
                placeholder="SIG" 
                aria-describedby="sig">
        </div>

        <div class="" v-show="customize">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Dose</label>
                    <multi-select v-model="sig.dosages" 
                        :options="forms.dosages" 
                        placeholder="Dose" 
                        label="title" 
                        track-by="id">
                    </multi-select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Unit</label>
                    <multi-select v-model="sig.units" 
                        :options="forms.units" 
                        placeholder="Unit" 
                        label="title" 
                        track-by="id">
                    </multi-select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Route</label>
                    <multi-select v-model="sig.routes" 
                        :options="forms.routes" 
                        placeholder="Route" 
                        label="title" 
                        track-by="id">
                    </multi-select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Frequency</label>
                    <multi-select v-model="sig.frequencies" 
                        :options="forms.frequencies" 
                        placeholder="Frequency" 
                        label="title" 
                        track-by="id">
                    </multi-select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Direction</label>
                    <multi-select v-model="sig.directions" 
                        :options="forms.directions" 
                        placeholder="Direction" 
                        label="title"
                        track-by="id">
                    </multi-select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Duration</label>
                    <multi-select v-model="sig.durations" 
                        :options="forms.durations" 
                        placeholder="Duration" 
                        label="title" 
                        track-by="id">
                    </multi-select>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import VSelect from 'vue-select';
import MultiSelect from 'vue-multiselect'
export default {
    components: {
        'v-select': VSelect,
        'multi-select': MultiSelect,
    },
    props: {
        value: {
            type: String,
        },
    },
    data () {
        return {
            customize: false,
            forms: {
                dosages: [],
                units: [],
                routes: [],
                frequencies: [],
                directions: [],
                durations: [],
            },
            sig: {
                dosages: '',
                units: '',
                routes: '',
                frequencies: '',
                directions: '',
                durations: '',
            },
            sigModel: '',
        };
    },

    mounted () {
        this.prepare();
    },

    computed: {
        sigText () {
            let sig = this.sig,
                arr = [];
            let keys = Object.keys(sig);
            keys.forEach(item => {
                if (sig[item] && !sig[item].title.match(/None/))
                    arr.push(sig[item].title);
            });
            return arr.length ? arr.join(' ') : this.value;
        },

        customizeText () {
            return this.customize ? 'Close' : 'Customize';
        },
    },

    watch: {
        customize (newVal) {
            $(this.$refs.btnCustomize).toggleClass('active');
            
        },

        sigText (newVal)  {
            this.sigModel = newVal;
            this.$emit('input', this.sigModel);
        },
    },

    methods: {
        prepare() {
            let self = this;
            axios.get('/api/sig')
                .then((resp) => {
                    self.forms = resp.data;
                });
        },

        input () {
            this.$emit('input', this.sigModel)
        },
    },

}
</script>
