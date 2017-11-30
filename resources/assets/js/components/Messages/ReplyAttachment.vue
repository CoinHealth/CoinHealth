<template>
    <div :key="attachment.id" class="message-attachment">
        <a :href="href" target="_blank" class="attachment-download">
            <img class="attachment-image" :src="src" :alt="attachment.title" v-if="attachment.is_image">
            <p class="attachment-name" v-else>
                {{ attachment.title }} <i class="fa fa-download"></i>
            </p>
        </a>
    </div>
</template>
<script>
export default {
    props: {
        attachment: {
            type: Object,
            required: true,
        }
    },

    data () {
        return {

        };
    },

    methods: {
        canSuffix (mime) {
            return Boolean(mime.match(/image/));
        },
    },

    computed: {
        href () {
            return `/attachments/${this.attachment.hashed_id}/download`
        },

        src () {
            let attachment = this.attachment;
            let names = attachment.path.split('.');
            let ext = names.pop();
            let name = names.shift();

            let suffix = this.canSuffix(attachment.mime_type) ? '-small':'';
            return `${name}${suffix}.${ext}`;
        },
    },
}
</script>
