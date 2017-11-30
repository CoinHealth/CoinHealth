<template>
    <timeago :since="since"
        :locale="locale"
        :auto-update="autoUpdate"
    ></timeago>
</template>
<script>
import VueTimeago from 'vue-timeago';
const Locales = {};
Vue.use(VueTimeago, {
    name: 'timeago',
    locales: {
        'en-US': [
            "just now",
            ["%s second ago", "%s seconds ago"],
            ["%s minute ago", "%s minutes ago"],
            ["%s hour ago", "%s hours ago"],
            ["%s day ago", "%s days ago"],
            ["%s week ago", "%s weeks ago"],
            ["%s month ago", "%s months ago"],
            ["%s year ago", "%s years ago"]
        ]
    }
})
export default {
    props: {
        since: [String],
        locale: {
            type: String,
            default: 'en-US',
        },
        format: {
            type: Function,
        },
        autoUpdate: {
            type: Number,
            default: 0,
        }
    },
}
</script>
