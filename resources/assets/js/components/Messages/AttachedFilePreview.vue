<template>
    <div class="preview-wrapper">
        <a href="#" class="btn-link btn-remove" @click.prevent="deletePreview">
            <i class="fa fa-times"></i>
        </a>
        <div class="preview-image" :style="imageStyle"></div>
    </div>
</template>

<script>
export default {
    props: {
        file: {
            type: [String,Object, File],
            required: true,
        },
        index: Number,
    },

    data () {
        return {
            imageStyle: {
                backgroundImage: `url(/images/broken-img-placeholder.jpg)`
            },
        };
    },

    mounted () {
        this.processFile();
    },

    methods: {
        deletePreview () {
            this.file.id = this.index;
            this.$emit('delete-preview', this.file);
        },
        processFile () {
            var image = new Image();
            var reader = new FileReader();
            var self = this;

            reader.onload = (e) => {
                self.setImage(e.target.result);
            };
            reader.readAsDataURL(self.file);
        },

        setImage (file_path) {
            this.imageStyle.backgroundImage = `url(${file_path})`;
        },
    }
}
</script>
