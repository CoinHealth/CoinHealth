<template>
    <div class="textarea-counter">

        <textarea
            :name="name"
            :id="id"
            :cols="cols"
            :rows="rows"
            :class="classes"
            :value="value"
            @input="input"
            :placeholder="placeholder">

        </textarea>
        <div class="counter">
            <span class="small">{{ counterText }}</span>
        </div>
    </div>
</template>

<script>
import Bus from '../Bus.js';
export default {
    props: {
        rows: String,
        placeholder: String,
        cols: String,
        id: String,
        name: String,
        classes: String,
        value: String,
        limit: {
            type: Number,
            default: () => {
                return 150;
            },
        },
        model: {
            type: String,
        }
    },

    mounted () {
        Bus.$on(`textarea-update:${this.model}`, this.edit);
        Bus.$on(`textarea-clear:${this.model}`, this.clear);

        this.currentValue = this.value;
    },

    data () {
        return {
            currentValue: "",
            counter: 0,
        }
    },

    computed: {
        counterText () {
            return `${this.counter}/${this.limit}`;
        }
    },

    methods: {
        input (e) {
            let val = e.target.value;
            this.currentValue = val;
            if ((val.length >= this.limit) && (this.counter >= this.limit)) {
                this.currentValue = val.slice(0,-1);
                return;
            }
            this.$emit(`update:${this.model}`, this.currentValue);

            // support v-model
            this.$emit('input', this.currentValue);
        },

        edit (value) {
            console.log(`editing ${this.model}`);
            this.currentValue = value;
        },

        clear () {
            this.currentValue = '';
        },
    },

    watch: {
        currentValue (newValue) {
            this.counter = newValue.length;

        }
    }
}
</script>

<style>
.textarea-counter {
    position: relative;
}
.textarea-counter .counter {
    position: absolute;
    right: 0;
}
</style>
