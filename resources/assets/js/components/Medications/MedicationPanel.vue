<template>
<div :class="[editing ? 'panel-primary': 'panel-default', 'panel']">
    <div class="panel-heading" @mouseenter="hovering = true;" @mouseleave="hovering = false;">
        <h5>
                <slot name="panel-header"></slot>
                <div class="pull-right">
                    <transition name="popup">
                        <button ref="btnEdit" v-show="buttons.edit" key="a-edit" @click="editing = true" v-if="!editing && hovering" class="btn btn-xs btn-primary">
                            <i class="fa fa-pencil"></i> <span>Edit</span>
                        </button>
                    </transition>
                    <transition name="popup">
                        <button ref="btnDelete" v-show="buttons.delete" key="a-delete" @click="" v-if="!editing && hovering" class="btn btn-xs btn-danger">
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
            <slot name="view-body" v-if="!editing"></slot>
        </transition>
        <transition name="popup">
            <slot name="edit-body" v-if="editing"></slot>
        </transition>
    </div>
</div>
</template>

<script>
import Bus from '../../Bus.js';
export default {
    props: {
        data: {
            type: Object,
            required: true,
        },
        model: {
            type: String,
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
    data() {
        return {
            editing: false,
            hovering: false,
            buttons: {},
        };
    },
    mounted() {
        Bus.$on(`form-saved:${this.model}`, this.saved);
        this.enabledButtons.split('.').forEach(item => this.buttons[item] = true);
        if (this.hiddenButtons)
            this.hiddenButtons.split('.').forEach(item => this.buttons[item] = false);

    },
    methods: {

        saved() {
            $(this.$refs.btnSave).find('span').text('Saved!');
            setTimeout(() => {
                let btnSave = $(this.$refs.btnSave);
                $(this.$refs.btnSave)
                    .fadeOut(100, () => {
                        btnSave.fadeIn(400, () => {
                            btnSave.attr('disabled', false)
                                .find('span').text('Save');
                            $(this.$refs.btnCancel).attr('disabled', false);
                        });
                    });
            }, 1000);
        },

        clear() {

        },

        save() {
            $(this.$refs.btnSave).attr('disabled', true)
                .find('span').text('Saving..');
            $(this.$refs.btnCancel).attr('disabled', true);

        },
    },

    watch: {
        editing(val) {
            if (!val) {
                this.clear();
            }
        },
    }
}
</script>
