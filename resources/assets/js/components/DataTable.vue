<template>
    <table></table>
</template>

<script>
    export default {
        props: [
            data: {
                type: Array,
                required: true,
            },
            headers: {
                type: Array,
                required: true,
            }
        ],
        data () {
            rows: [] ,
            dtHandle: null
        }
    }
</script>
