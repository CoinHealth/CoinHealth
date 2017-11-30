<style scoped>
    select {
        margin-bottom: 10px;
    }
</style>
<template>
    <div>
        <multi-select
            ref="select"
            :hide-selected="false"
            :close-on-select="true"
            placeholder="Select one"
            :data="options"
            @input="input"
            :searchable="false"
            v-model="selected"
            :value="value"
            :allow-empty="true">
        </multi-select>
        <slot v-if="matched"></slot>
    </div>
</template>
<script>
import MultiSelect from './MultiSelect.vue';
export default {
    components: {
        'multi-select': MultiSelect,
    },
    props: {
        exclude: String,
        classes: String,
        options: {
            type: [Array, Object],
            required: true,
        },
        value: String,
        matchValue: String,
        exclude: String,
    },
    data () {
        return {
            selected: this.value || this.matchValue,
        };
    },
    mounted () {
        $(this.$refs.select).trigger('input');
    },
    methods: {
        input (value) {
            // console.log(value);
            this.$emit('input', value);
        },
    },
    computed: {
        matched () {
            return (this.selected == this.matchValue) || (this.selected != this.exclude);
        }
    },
}
</script>
