<template>
    <div v-if="show" id="add-flag" class="panel panel-primary">
      <div class="panel-heading">
        <!-- <button type="button" class="close" @click="show = false"><span aria-hidden="true">&times;</span></button> -->
        <h5 class="panel-title">
            <span>Add Flags</span>
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
                <label class="form-label col-md-3">Flag Type</label>
                <div class="col-md-9">
                    <v-select :options="flagTypes" placeholder="Select" v-model="flag.flag_type">
                    </v-select>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label col-md-3">Notes</label>
                <div class="col-md-9">
                    <v-textarea
                        v-model="flag.notes"
                        @update:note="flag.notes = $event"
                        model="note"
                        rows="2"
                        :limit="255"
                        classes="no-resize form-control">
                    </v-textarea>
                </div>
            </div>
            <div class="clear"></div>
            <div class="alert alert-success mt-20" v-if="success" role="alert">
               <i class="fa fa-check"></i> Flag Added successfully! 
            </div>
        </div>
      </div>
    </div>
</template>
<script>
    import axios from 'axios';
    import Bus from '../../Bus.js';
    const moment = require('moment');
    import VSelect from 'vue-select';
    import Textarea from '../../helpers/Textarea.vue';
    export default {
        components: {
            'v-select': VSelect,
            'v-textarea': Textarea,
        },

        data () {
            return {
                show: false,
                success: false,
                saved: false,
                buttons: {},
                patient_id: '',
                flag: {
                    flag_type: '',
                    notes: '',
                },
                flagTypes: [
                    'Low',
                    'Medium',
                    'High'
                ],
                base_url: `/profile/patients/flags`,
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
                axios.post(url, this.flag)
                    .then(res => {
                        self.success = true;
                        setTimeout(function() {
                            self.clear();
                            self.$emit('flagadded', res.data.flag);
                        }, 3000);

                    });

            },

            clear() {
                // clear all forms
                this.show = false;
                this.flag.flag_type = '';
                this.flag.notes = '';
                this.success = false;
            },
           
        },


        watch: {
           

        },
            



    }
</script>
