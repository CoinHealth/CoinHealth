<template>
    <div v-if="show" class="panel panel-primary">
      <div class="panel-heading">
        <h5 class="panel-title">
            <span>Add Allergy</span>
            <div class="pull-right">
                <button @click.prevent="submit" class="btn btn-xs btn-success">
                    <i class="fa fa-floppy-o"></i> <span>Save</span>
                </button>
                 <button @click="show = false" class="btn btn-xs btn-danger">
                    <i class="fa fa-ban"></i> <span>Cancel</span>
                </button>
            </div>
        </h5>
      </div>
      <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="form-label col-md-3">Type</label>
                <div class="col-md-9">
                    <select v-model="allergy.allergy_type" class="form-control">
                        <option v-for="type in allergyTypes" v-bind:value="type.value">{{ type.label }}</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label col-md-3 col-xs-12">Name</label>
                <div class="col-md-7 col-xs-7">
                    <input type="text" class="form-control" v-model="allergy.name">
                </div>
                <div class="col-md-2 col-xs-5">
                    <!-- <toggle-button :width="100" :labels="defaults.toggle_button.labels" :value="Boolean(allergy.active)" v-model="allergy.active" @change="changeStatus" /> -->
                    <toggle-button :width="100" :labels="defaults.toggle_button.labels" :value="Boolean(allergy.active)"/>

                     
                </div>
            </div>

            <div class="form-group">
                <label class="form-label col-md-3">Reaction</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" v-model="allergy.reaction">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label col-md-3">Notes</label>
                <div class="col-md-9">
                    <div class="textarea-counter">
                        <textarea class="form-control" v-model="allergy.notes" maxlength="255"></textarea>
                         <div class="counter pull-right">
                            <span class="small">{{ counterText }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="alert alert-success mt-20" v-if="success" role="alert">
               <i class="fa fa-check"></i>Allergy Added! 
            </div>
        </div>
      </div>
    </div>
</template>
<script>
    import axios from 'axios';
    import ToggleButton from 'vue-js-toggle-button';
    import Bus from '../../Bus.js';
    Vue.use(ToggleButton);
    const moment = require('moment');
    import VSelect from 'vue-select';
    export default {
        components: {
            'v-select': VSelect,
        },
        props: {
            enabledButtons: {
                type: String,
                default () {
                    return 'edit.save.cancel';
                },
            },
            hiddenButtons: {
                type: String,
                required: false,
            }
        },

        data () {
            return {
                show: false,
                success: false,
                saved: false,
                buttons: {},
                patient_id: '',
                base_url: `/profile/patients/allergies`,

                defaults: {
                    toggle_button: {
                        labels: {
                            checked: 'Active',
                            unchecked: 'Inactive',
                        },
                    }
                },

                allergy: {
                    allergy_type: '',
                    name: '',
                    reaction: '',
                    notes: '',
                    active: true,
                },

                allergyTypes: [
                    {value: "1", label: "Specific Drug"},
                    {value: "2", label: "Class of Drugs"},
                    {value: "3", label: "Other Allergy"},
                ],


            };
        },

        mounted () {
            Bus.$on('show', this.showData);
        },

        methods: {
            showData(data) {
                this.show = data.show;
                this.patient_id = data.patient_id;
            },
            submit() {
                let self = this;
                let url = `${this.base_url}/${this.patient_id}`
                axios.post(url, this.allergy)
                    .then(res => {
                        self.success = true;
                        setTimeout(function() {
                            self.clear();
                            self.$emit('allergyadded', res.data.allergy);
                        }, 3000);

                    });
            },

            clear() {
                this.show = false;
                this.allergy.allergy_type = '';
                this.allergy.name= '';
                this.allergy.reaction = '';
                this.allergy.notes = '';
                this.allergy.active = 1;
                this.success = false;
            },
            
            changeStatus() {
                   
            },
           
        },


        watch: {
           

        },

        computed: {
            counterText () {
                return `${this.allergy.notes.length}/255`;
            },
        },
            



    }
        
</script>
