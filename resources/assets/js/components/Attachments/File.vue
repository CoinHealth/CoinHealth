<template>
    <div class="attachment-wrapper">
        <a :href="href" class="btn-link">
            <div v-if="file.is_image" class="image">
                <img :src="src" :alt="file.title">
            </div>
            <div v-else class="file">
                <p>
                    <i :class="['fa', faType]"></i> {{ file.title }}
                </p>
            </div>
        </a>
    </div>
</template>
<script>

export default {
    props: {
        file: {
            type: Object,
            required: true,
        },
        size: {
            type: String,
            default: '',
        }
    },

    mounted () {
        $('[data-toggle=tooltip]').tooltip();
    },

    data () {
        return {
            mime_types: {
                word: [
                    'application/vnd.ms-word.document.macroEnabled.12',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
                ],
                excel: [
                    'application/vnd.ms-excel.addin.macroEnabled.12',
                    'application/vnd.ms-excel.sheet.macroEnabled.12',
                    'application/vnd.ms-excel.template.macroEnabled.12',
                    'application/vnd.ms-excel.sheet.binary.macroEnabled.12',
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.template',
                ],
                powerpoint: [
                    'application/vnd.ms-powerpoint.addin.macroEnabled.12',
                    'application/vnd.ms-powerpoint.slide.macroEnabled.12',
                    'application/vnd.ms-powerpoint.template.macroEnabled.12',
                    'application/vnd.ms-powerpoint.slideshow.macroEnabled.12',
                    'application/vnd.ms-powerpoint.presentation.macroEnabled.12',
                    'application/vnd.openxmlformats-officedocument.presentationml.slide',
                    'application/vnd.openxmlformats-officedocument.presentationml.template',
                    'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
                    'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                ],
            }
        }
    },

    computed: {
        href () {
            return `/attachments/${this.file.hashed_id}/download`;
        },
        src () {
            let size = this.size ? `-${this.size}` : '';
            let regex = /(?:\.([^.]+))?$/;
            let ext = regex.exec(this.file.path)[0];
            let filename = this.file.path.replace(new RegExp(ext), "");
            return `${filename}${size}${ext}`;
        },

        faType () {
            let mime = this.file.mime_type;
            let icon = 'fa-file-o';
            let mime_types = this.mime_types;
            // _.forEach(mime_types, (value, key) => {
            //     if (_.includes(value, mime)) {
            //         icon = `fa-file-${key}-o`;
            //         return;
            //     }
            //     else {
            //         icon = 'fa-file-o';
            //     }
            // });


            return icon;
        }
    }
}
</script>
