<template>
    <div class="panel panel-default">
        <div class="panel-heading" @mouseenter="hovering = true;" @mouseleave="hovering = false;">
            <h5>
                <span>Flag: {{ flag.flag_type }} <i :class="['fa','fa-circle', flagClass]"></i></span>

                <div class="pull-right">
                    <transition name="popup">
                        <button ref="btnEdit" v-show="buttons.edit" key="a-edit" @click="editing = true" v-if="!editing && hovering" class="btn btn-xs btn-primary">
                            <i class="fa fa-pencil"></i> <span>Edit</span>
                        </button>
                    </transition>
                    <transition name="popup">
                        <button ref="btnDelete" v-show="buttons.delete" key="a-delete" @click="remove" v-if="!editing && hovering" class="btn btn-xs btn-danger">
                            <i class="fa fa-times"></i> <span>Delete</span>
                        </button>
                    </transition>
                    <transition name="popup">
                        <button ref="btnSave" v-show="buttons.save" key="a-save" @click="save" v-if="editing"class="btn btn-xs btn-success">
                            <i class="fa fa-floppy-o"></i> <span>Save</span>
                        </button>
                    </transition>
                    <transition name="popup">
                        <button ref="btnCancel" v-show="buttons.cancel" key="a-cancel" v-if="editing" @click="editing = false" class="btn btn-xs btn-danger">
                            <i class="fa fa-ban"></i> <span>Cancel</span>
                        </button>
                    </transition>
                </div>
            </h5>
        </div>
        <div class="panel-body">
            <transition name="popup">
                <div v-if="!editing">
                    <div class="pull-right">
                        <p class="small">{{ time }}</p>
                    </div>
                    <p>Notes: {{ flag.notes }}</p>
                </div>
            </transition>
            <transition name="popup">
                <div v-if="editing" class="form-horizontal">
                    <div class="form-group">
                        <label class="form-label col-md-3">Flag Type</label>
                        <div class="col-md-9">
                            <v-select :on-change="changeFlagType" :value="flag.flag_type" :options="flagTypes" placeholder="Select">
                            </v-select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label col-md-3">Notes</label>
                        <div class="col-md-9">
                            <div class="textarea-counter">
                                <textarea class="form-control" v-model="flag.notes" maxlength="255"></textarea>
                                 <div class="counter pull-right">
                                    <span class="small">{{ counterText }}</span>
                                </div>
                            </div>
                           <!--  <v-textarea
                                v-model="flag.notes"
                                :value="flag.notes"
                                @update:note="flag.notes = $event"
                                model="note"
                                rows="2"
                                :limit="255"
                                classes="no-resize form-control">
                            </v-textarea> -->
                        </div>
                    </div>
                </div>
            </transition>
        </div>
    </div>
</template>
<script>
import moment from 'moment';
import VSelect from 'vue-select';
import Textarea from '../../helpers/Textarea.vue';
import axios from 'axios';
import Bus from '../../Bus.js';
export default {
    components: {
        'v-select': VSelect,
        'v-textarea': Textarea,
    },
    data () {
        return {
            editing: false,
            hovering: false,
            saved: false,
            buttons: {},
            flag: this.data,
            flagTypes: [
                'Low',
                'Medium',
                'High'
            ],
            baseUrl: '',

        };
    },

    props: {
        data: {
            type: Object,
            required: true,
        },
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

    mounted () {
        this.baseUrl = `/profile/patients/flags/${this.$parent.patient_id}/${this.flag.id}`;
        this.enabledButtons.split('.').forEach(item => this.buttons[item] = true);
        if (this.hiddenButtons)
            this.hiddenButtons.split('.').forEach(item => this.buttons[item] = false);
    },

    computed: {
        time () {
            return moment(this.flag.created_at).format("dddd, MMMM Do YYYY, h:mm a");
        },
        flagClass () {
            let type = this.flag.flag_type,
                color = 'text-success';
            switch (type) {
                case 'High':
                    color = 'text-danger';
                    break;
                case 'Medium':
                    color = 'text-warning'
                    break;
            }
            return color;
        },
        counterText () {
            return `${this.flag.notes.length}/255`;
        },

    },

    methods: {
        changeFlagType (data) {
            this.flag.flag_type = data;
        },

        remove () {

        },

        save () {
            let self = this;
            axios.post(`${this.baseUrl}/edit`, this.flag)
                .then(res => {
                    self.flag = res.data.flag;
                    this.$emit('flag-saved', self.flag);
                    self.editing = false;
                    self.saved = true;
                });
        },
    },

    watch: {
        editing (val) {
            if (!val) {
                this.flag.notes = this.data.notes;
                this.flag.flag_type = this.data.flag_type;
            }
        }
    },

}
</script>
