<template>
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" aria-label="Close" @click="cancel">
            <span aria-hidden="true">×</span>
        </button>
        <p>Are you sure you want to delete this ?</p>
        <div>
            <button type="button" class="btn btn-sm btn-danger" @click="confirm">Yes</button>
            <button type="button" class="btn btn-sm btn-default" @click="cancel">Cancel</button>
        </div>
    </div>
</template>
<script>
export default {
    methods: {
        confirm () {
            this.$parent.deleteAppointment();
        },
        cancel () {
            this.$parent.showDelete = false;
        }
    },
}
</script>
