<template>
    <span class="check-button">
        <input ref="checkbox" type="checkbox" class="hidden" :checked="checked"/>
        <button @click="toggle" type="button" :class="[classes, active]">
            <i :class="['fa', icon]"></i> <slot name="text"></slot>
        </button>
    </span>
</template>

<script>

export default {
    props: {
        classes: String,
        checked: {
            type: Boolean,
            default () {
                return false;
            }
        },
        activeClass: {
            type: String,
            default () {
                return `btn-primary`;
            },
        },
        value: String,
    },

    data () {
        return {
            isChecked: this.checked,
        }
    },

    methods: {
        toggle () {
            this.isChecked = !this.isChecked;
            this.$emit('checked', this.isChecked);
        },
    },

    computed: {
        icon () {
            return this.isChecked ? 'fa-check-square-o' : 'fa-square-o';
        },
        active () {
            return this.isChecked ? `active ${this.activeClass}` : '';
        },
    },
}
</script>
