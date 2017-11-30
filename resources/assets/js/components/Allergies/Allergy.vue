<template>
    <div class="panel panel-default">
        <div class="panel-heading" @mouseenter="hovering = true;" @mouseleave="hovering = false;">
            <h5>
                <span>{{ allergy.name }}</span>
                <span><i :class="['fa', 'fa-circle', activeClass]"></i></span>
                <div class="pull-right">
                    <transition name="popup">
                        <button ref="btnEdit" v-show="buttons.edit" key="a-edit" @click="editing = true" v-if="!editing && hovering" class="btn btn-xs btn-primary">
                            <i class="fa fa-pencil"></i> <span>Edit</span>
                        </button>
                    </transition>
                    <transition name="popup">
                        <button ref="btnDelete" v-show="buttons.delete" key="a-delete" v-if="!editing && hovering" class="btn btn-xs btn-danger">
                            <i class="fa fa-times"></i> <span>Delete</span>
                        </button>
                    </transition>
                    <transition name="popup">
                        <button ref="btnSave" v-show="buttons.save" key="a-save" v-if="editing" class="btn btn-xs btn-success">
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
                    <p>
                        <label>Reaction: </label>
                        <span v-text="allergy.reaction"></span>
                    </p>
                    <p>
                        <label>Notes</label>
                        <span class="small" v-text="allergy.notes"></span>
                    </p>
                </div>
            </transition>

            <transition name="popup">
                <div v-if="editing" class="form-horizontal">
                    <div class="form-group">
                        <label class="form-label col-md-3">Type</label>
                        <div class="col-md-9">
                            <select ref="selectAllergyType" class="form-control">
                                <option value="1">Specific Drug</option>
                                <option value="2">Class of Drugs</option>
                                <option value="3">Other Allergy</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label col-md-3 col-xs-12">Name</label>
                        <div class="col-md-7 col-xs-7">
                            <input type="text" class="form-control" v-model="allergy.name">
                        </div>
                        <div class="col-md-2 col-xs-5">
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
                            <v-textarea
                                v-model="allergy.notes"
                                @update:notes="allergy.notes = $event"
                                model="notes"
                                rows="3"
                                :limit="255"
                                value=""
                                classes="no-resize form-control">
                            </v-textarea>
                        </div>
                    </div>
                </div>
            </transition>
        </div>
    </div>
</template>
<script>
import Textarea from '../../helpers/Textarea.vue';
import ToggleButton from 'vue-js-toggle-button';
import Bus from '../../Bus.js';
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
            editing: false,
            hovering: false,
            saved: false,
            buttons: {},
            allergy: this.data,
            defaults: {
                toggle_button: {
                    labels: {
                        checked: 'Active',
                        unchecked: 'Inactive',
                    },
                }
            }
        };
    },

    mounted () {
        this.enabledButtons.split('.').forEach(item => this.buttons[item] = true);
        if (this.hiddenButtons)
            this.hiddenButtons.split('.').forEach(item => this.buttons[item] = false);
        Bus.$emit('textarea-update:notes', this.allergy.notes);
    },

    computed: {
        activeClass () {
            return this.allergy.active ? 'text-success' : 'text-danger';
        }
    },

    methods: {

    },

}
</script>
