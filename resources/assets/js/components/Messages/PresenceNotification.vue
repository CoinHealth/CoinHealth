<template id="">
    <div class="presence-notification-wrapper">
        {{ message }}
    </div>
</template>
<script>
export default {
    props: {
        user: Object,
        action: String,
    },

    computed: {
        message () {
            return `${this.user.full_name} has ${this.action}`
        }
    },
}
</script>
