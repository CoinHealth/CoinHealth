<template>
    <div class="form-group row">
        <div class="col-xs-6 col-md-3">
            <label>
                <input type="checkbox" ref="inputCheckbox" :checked="isChecked" @change="toggle">
                <slot></slot>
            </label>
        </div>
        <div class="col-xs-6 col-md-3">
            <input :value="inputValue" :disabled="!isChecked" type="text" ref="inputText" class="form-control input-sm" maxlength="3">
        </div>
    </div>
</template>
<script>
export default {
    props: {
        checked: {
            type: [Boolean, Number],
            default: false,
        },
        inputValue: {
            type: Number,
            default: 0,
        }
    },

    data () {
        return {
            isChecked: this.checked,
        };
    },

    methods: {
        toggle () {
            this.isChecked = !this.isChecked;
        }
    },
}
</script>
