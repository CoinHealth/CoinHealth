<style scoped>
    [class*="col-md"] {
        margin-bottom: 15px;
    }
    .v-select input[type="search"] {
        width: 30% !important;
   }

</style>
<template>
    <div class="row">
        <div class="col-md-6">
            <label for="">State</label>
            <v-select :on-change="changeState" :options="states"></v-select>
        </div>
        <div class="col-md-6">
            <label for="">City</label>
            <v-select :on-change="changeCity" label="city" :options="cities" disabled></v-select>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-4">
            <label for="">Zip</label>
            <input @change="emit" v-model="location.zip" type="text" maxlength="5" class="form-control input-sm" placeholder="Zip code">
        </div>
        <div class="col-md-4">
            <label for="">Street 1</label>
            <input @change="emit" v-model="location.street_1" type="text" placeholder="Street Address 1" class="form-control input-sm">
        </div>
        <div class="col-md-4">
            <label for="">Street 2</label>
            <input @change="emit" v-model="location.street_2" type="text" placeholder="Street Address 2" class="form-control input-sm">
        </div>
    </div>

</template>
<script>
import Bus from '../Bus.js';
import VSelect from 'vue-select';
import axios from 'axios';
export default {
    components: {
        'v-select': VSelect,
    },

    data () {
        return {
            cities: [],
            states: [],
            location: this.data,
        };
    },
    props: {
        data: {
            required: true,
            type: Object,
        },
        model: {
            required: true,
            type: String,
        },
    },

    mounted () {
        this.prepare();
    },

    methods: {
        prepare () {
            let self = this;
            axios.get('/api/locations/state')
                .then((response) => {
                    let data = response.data.data;
                    self.states = data.map(item => {
                        var loc = {};
                        loc.value = item.state_abbr;
                        loc.label = item.pretty_name;
                        return loc;
                    });
                })
        },

        changeCity (val) {
            this.location.city = val.city;
            this.emit();
        },

        emit () {
            this.$emit(`update:${this.model}`, this.location);
        },

        changeState (val) {
            let self = this;
            self.location.state = val.value;
            self.prepCities();
            this.emit();
            this.city = null;
        },

        prepCities () {
            let self = this;
            axios.get(`/api/locations/${self.location.state}/cities`)
                .then(response => {
                    let data = response.data.data;
                    self.cities = data;
                });
        }
    },

}
</script>
