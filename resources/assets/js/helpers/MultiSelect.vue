<template>
    <div>
        <multi-select
            :placeholder="placeholder"
            :options="options"
            @input="input"
            :multiple="multiple"
            :value="selected"
            :hide-selected="hideSelected"
            :close-on-select="closeOnSelect">
        </multi-select>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'

    export default {
        props: {
            placeholder: String,
            data: {
                type: Array,
                required: true,
            },
            multiple: {
                type: Boolean,
                default: false
            },
            searchable: {
                type: Boolean,
                default: true,
            },
            allowEmpty: {
                default: false,
                type:Boolean,
            },
            hideSelected: {
                default: true,
                type: Boolean,
            },
            closeOnSelect: {
                default: false,
                type:Boolean,
            },
            value: [Number,Object,Array,String],
        },
        components: {
            'multi-select': Multiselect
        },
        data () {
            return {
                selected: this.value,
                options: this.data,
            }
        },
        methods: {
            input (value) {
                this.$emit('input', value);
            }
        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
