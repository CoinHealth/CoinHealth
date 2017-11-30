<template>
    
<div class="allergy-template">
    <transition name="slide-fade">
        <div v-if="!editing" class="div-allergy  view-form">
            <h5 class="subtitle">Allergy #{{ index + 1 }}</h5>
            <div class="row">
                <div class="col-md-12">

                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Type:</label>
                        </div>
                        <div class="col-md-9">
                            <p v-text="patient.type"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Name:</label>
                        </div>
                        <div class="col-md-7">
                            <p v-text="patient.name"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Reaction:</label>
                        </div>
                        <div class="col-md-9">
                            <p v-text="patient.reaction"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Status:</label>
                        </div>
                        <div class="col-md-9">
                            <p v-text="patient.status"></p>
                        </div>
                    </div>
                    
                    <div class="text-right">
                        <button ref="btnEdit" @click="editing = true" 
                                class="btn btn-xs btn-primary">
                            <i class="fa fa-pencil"></i> <span>Edit</span>
                        </button>
                    </div>

                </div>
            </div>
           
        </div>
    </transition>
    <transition name="slide-fade">
        <div v-if="editing" class="div-edit-allergy edit-form">
            <h5 class="subtitle">Edit Allergy #{{ index + 1 }}</h5>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Type:</label>
                        </div>
                        <div class="col-md-9">
                            <select v-model="form.allergy_type" 
                                    class="form-control input-sm">
                                <option v-for="type in allergyTypes" 
                                    v-bind:value="type.value">
                                    {{ type.label }}
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Name:</label>
                        </div>
                        <div class="col-md-7 col-xs-7">
                            <input type="text" class="form-control input-sm" 
                                v-model="form.name">
                        </div>
                        <div class="col-md-2 col-xs-5">
                            <toggle-button :width="100" 
                                :labels="defaults.toggle_button.labels" 
                                :value="Boolean(form.active)"
                                @change="change($event)"
                                />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3 label-col">
                            <label>Reaction:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control input-sm" 
                                v-model="form.reaction">
                        </div>
                    </div>

                    <div class="text-right">
                        <button @click="save" 
                            class="btn btn-xs btn-success">
                            <i class="fa fa-floppy-o"></i> <span>Save</span>
                        </button>

                        <button @click="editing = false" 
                            class="btn btn-xs btn-danger">
                            <i class="fa fa-ban"></i> <span>Cancel</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </transition>

</div>


</template>
<script>
import Textarea from '../../helpers/Textarea.vue';
import ToggleButton from 'vue-js-toggle-button';
import Bus from '../../Bus.js';
import axios from 'axios';
Vue.use(ToggleButton);

export default {
    components: {
        'v-textarea': Textarea,
    },
    props: {
        data: {
            type: Object,
            required: true,
        },
        index: {
            type: Number,
            required: false,
        }
    },

    data () {
        return {
            editing: false,
            hovering: false,
            saved: false,
            buttons: {},
            allergy: this.data,
            patient: {},
            form: {},
            defaults: {
                toggle_button: {
                    labels: {
                        checked: 'Active',
                        unchecked: 'Inactive',
                    },
                },
            },

            allergyTypes: [
                {value: "1", label: "Specific Drug"},
                {value: "2", label: "Class of Drugs"},
                {value: "3", label: "Other Allergy"},
            ],

        };
    },

    mounted () {
        // console.log(Boolean(this.data.active));
       this.patient = this.data;
       this.form = _.clone(this.data);
    },

    methods: {
        save () {
            // save result = this.patient;
            let self = this;
            let url = '/profile/medical/allergy/edit';
            axios.post(url, self.form)
                .then(res => {
                    self.patient = _.clone(self.form);
                    self.editing = false;
                });
        },

        change (data) {
            this.form.active = data.value;
            this.form.status = (data.value == true) ? 'Active' : 'Inactive';
        },
    },

    computed: {
        
    },

}
</script>
